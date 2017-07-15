<?php

/**
 * Created by PhpStorm.
 * User: Robin
 * Date: 2016/12/19
 */
class Bower
{
    protected static function init()
    {
        //init framework environment
        ob_start();
        ini_set('display_errors', defined("__DEBUG__") ? 'On' : 'Off');
        date_default_timezone_set('Asia/Shanghai');

        //autoload register
        spl_autoload_register(function ($class) {
            $file = '/' . str_replace('\\', '/', $class) . '.php';
            is_file(__ROOT__ . $file) and include __ROOT__ . $file;
        });

        //session start
        session_name('pk');
        session_start();

        is_file(__ROOT__ . '/bootstrap.php') and require __ROOT__ . '/bootstrap.php';
    }

    public static function start(array $modules = [])
    {
        Bower::init();
        $pathinfo = str_replace($_SERVER['SCRIPT_NAME'], '', $_SERVER['REQUEST_URI']);
        $pathinfo == '/favicon.ico' and die();
        $pathinfo = explode('?', $pathinfo);
        $pathinfo = $pathinfo[0] === '/' ? '/' : rtrim($pathinfo[0], '/');
        $routeTmp = array_filter(explode('/', $pathinfo), function ($var) {
            return $var === '' ? false : true;
        });
        unset($pathinfo);
        $handler = ['App', 'Controller'];
        //get module
        $moduleMatch = [];
        foreach ($modules as $module) {
            $moduleNum = count((array)$module);
            $moduleStr = implode('|', (array)$module);
            if (count($routeTmp) >= $moduleNum) {
                $routeArray = array_slice($routeTmp, 0, $moduleNum);
                $routeStr = implode('|', $routeArray);
                if ($routeStr == $moduleStr) {
                    $moduleMatch = (array)$module;
                    break;
                }
            }
        }
        unset($modules);
        if ($moduleMatch) {
            $handler = array_merge($handler, $moduleMatch);
            $routeTmp = array_slice($routeTmp, count($moduleMatch));
        }
        unset($moduleMatch);
        //get class
        if ($routeTmp) {
            $routeItem = array_shift($routeTmp);
            $handler[] = $routeItem;
        } else {
            $handler[] = 'Home';
        }
        $controller = '\\' . implode('\\', $handler);
        $viewPath = array_slice($handler, 2);
        unset($handler);
        //get method
        if ($routeTmp) {
            $routeItem = array_shift($routeTmp);
            $method = $routeItem;
        } else {
            $method = 'index';
        }
        $viewPath[] = $method;
        if (!class_exists($controller)) {
            if (defined('__DEBUG__')) {
                throw new Exception("bower:controller ($controller) not exist");
            } else {
                halt(404);
            }
        }
        $controllerObj = new $controller();
        if (!$controllerObj instanceof \Bower\Mvc\Controller) {
            if (defined('__DEBUG__')) {
                throw new Exception("bower:controller ($controller) not instenceof Controller class");
            } else {
                halt(404);
            }
        }
        if (!method_exists($controllerObj, $method)) {
            if (defined('__DEBUG__')) {
                throw new Exception("bower:method ($method) not exist");
            } else {
                halt(404);
            }
        }
        $methodObj = new ReflectionMethod($controllerObj, $method);
        if ($methodObj->getNumberOfRequiredParameters() > count($routeTmp)) {
            if (defined('__DEBUG__')) {
                throw new Exception("bower:required parameters not match");
            } else {
                halt(404);
            }
        }
        $controllerData = call_user_func_array([$controllerObj, $method], $routeTmp);
        unset($controllerObj);
        unset($methodObj);
        unset($routeTmp);
        $viewPath = implode('/', $viewPath) . '.php';
        if (!is_null($controllerData)) {
            is_array($controllerData) and extract($controllerData);
            unset($controllerData);
            if (is_file(__ROOT__ . '/App/View/' . $viewPath)) {
                if (ob_get_length() and defined('__DEBUG__')) {
                    $content = ob_get_clean();
                    throw new Exception("bower:content output before view");
                }
                ob_clean();
                header("Content-type:text/html;charset=utf-8");
                include __ROOT__ . '/App/View/' . $viewPath;
            } else {
                if (defined('__DEBUG__')) {
                    throw new Exception("bower:view ($viewPath) not exist");
                } else {
                    halt(404);
                }
            }
        }
        die();
    }
}

function halt($code = 404)
{
    switch ($code) {
        case 404:
            ob_get_clean();
            header("HTTP/1.1 404 Not Found");
            exit();
        case 405:
            ob_get_clean();
            header("HTTP/1.1 405 Method Not Allowed");
            exit();
        default:
            break;
    }
}

function config($configKey, $defaultValue = [])
{
    static $_config = [];
    $_base = __ROOT__ . '/Config/';
    if (isset($_config[$configKey])) {
        return $_config[$configKey];
    } elseif (is_file($_base . "$configKey.php")) {
        $_config[$configKey] = include($_base . "$configKey.php");
        return $_config[$configKey];
    } else {
        return $defaultValue;
    }
}

function easyPost($postKey, $defaultValue = null)
{
    return isset($_POST[$postKey]) ? $_POST[$postKey] : $defaultValue;
}

function easyGet($getKey, $defaultValue = null)
{
    return isset($_GET[$getKey]) ? $_GET[$getKey] : $defaultValue;
}

function easyCookie($cookieKey, $defaultValue = null)
{
    return isset($_COOKIE[$cookieKey]) ? $_COOKIE[$cookieKey] : $defaultValue;
}

function easyInput(array $keyRequired = [], array $keyOptional = [], $defaultValue = null)
{
    $data = file_get_contents('php://input');
    $dataDecoded = json_decode($data, true);
    if ($dataDecoded === false) return false;
    foreach ($keyRequired as $keyItem) {
        if (!isset($dataDecoded[$keyItem]) or $dataDecoded[$keyItem] === '') return false;
    }
    foreach ($keyOptional as $keyItem) {
        isset($dataDecoded[$keyItem]) or $dataDecoded[$keyItem] = $defaultValue;
    }
    return $dataDecoded;
}

function fetch($url, $data = [])
{
    $ch = curl_init();
    $opts[CURLOPT_URL] = $url;
    $opts[CURLOPT_RETURNTRANSFER] = true;
    if ($data and is_array($data)) {
        $opts[CURLOPT_POST] = true;
        $opts[CURLOPT_POSTFIELDS] = http_build_query($data);
    }
    if ($data and is_string($data)) {
        $opts[CURLOPT_POST] = true;
        $opts[CURLOPT_POSTFIELDS] = $data;
        $opts[CURLOPT_HTTPHEADER] = [
            'Content-type: application/json',
            'Content-length: ' . strlen($data)
        ];
    }
    curl_setopt_array($ch, $opts);
    $res = curl_exec($ch);
    $contentType = curl_getinfo($ch)['content_type'];
    strpos($contentType,'application/json') === 0 and $res = json_decode($res, true);
    curl_close($ch);
    return $res;
}

function uuid()
{
    return strtolower(md5(uniqid(rand(), true)));
}

function md5Hash($str)
{
    return md5(hash("sha256", $str));
}

// AES encode new version
function aesEncrypt($str, $key = 'aes key')
{
    list($aesKey, $ivKey) = str_split(md5($key), 16);
    $ciphertext = openssl_encrypt($str, 'AES-128-CBC', $aesKey, OPENSSL_RAW_DATA, $ivKey);
    return base64_encode($ciphertext);
}

// AES decode new version
function aesDecrypt($str, $key = 'aes key')
{
    list($aesKey, $ivKey) = str_split(md5($key), 16);
    $orig_data = openssl_decrypt(base64_decode($str), 'AES-128-CBC', $aesKey, OPENSSL_RAW_DATA, $ivKey);
    return $orig_data;
}

// RSA 私钥加密
function rsaEncryptPrivate($plainString, $key)
{
    if (!openssl_pkey_get_private($key)) {
        throw new \Exception("Rsa private key invalid!!");
    }
    $dataArray = str_split($plainString, 117);
    $outCipherString = "";
    foreach ($dataArray as $oneData) {
        openssl_private_encrypt($oneData, $output, $key);
        $outCipherString .= base64_encode($output);
    }
    return $outCipherString;
}

//RSA 公钥加密
function rsaEncryptPublic($plainString, $key)
{
    if (!openssl_pkey_get_public($key)) {
        throw new \Exception("Rsa public key invalid!!");
    }
    $dataArray = str_split($plainString, 117);
    $outCipherString = "";
    foreach ($dataArray as $oneData) {
        openssl_public_encrypt($oneData, $output, $key);
        $outCipherString .= base64_encode($output);
    }
    return $outCipherString;
}

//RSA 私钥解密
function rsaDecryptPrivate($cipherString, $key)
{
    if (!openssl_pkey_get_private($key)) {
        throw new \Exception("Rsa private key invalid!!");
    }
    $cipherArray = str_split($cipherString, 172);
    $result = "";
    foreach ($cipherArray as $oneCipher) {
        openssl_private_decrypt(base64_decode($oneCipher), $output, $key);
        $result .= $output;
    }
    return $result;
}

//RSA 公钥解密
function rsaDecryptPublic($cipherString, $key)
{
    if (!openssl_pkey_get_public($key)) {
        throw new \Exception("Rsa public key invalid!!");
    }
    $cipherArray = str_split($cipherString, 172);
    $result = "";
    foreach ($cipherArray as $oneCipher) {
        openssl_public_decrypt(base64_decode($oneCipher), $output, $key);
        $result .= $output;
    }
    return $result;
}
