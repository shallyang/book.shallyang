<?php
/**
 * Created by PhpStorm.
 * User: Robin
 * Date: 2017/3/15
 * Time: 15:48
 */

namespace Bower\Base;

use Bower\Traits\Pdo;

class Auth
{
    use Pdo;

    const TYPE_USERNAME = 0;
    const TYPE_TELEPHONE = 1;
    const TYPE_EMAIL = 2;

    protected $tag;
    protected $isCache;
    protected $redis;

    public function __construct($tag = 'web')
    {
        $this->tag = $tag;
        if (config('Auth')['isCache'] === true) {
            $this->isCache = config('Auth')['isCache'];
            $this->redis = new \Redis();
            $this->redis->connect(config('Auth')['redisHost'], config('Auth')['redisPort']);
            $this->redis->select(config('Auth')['redisDbIndex']);
        }
    }

    public function isApp()
    {
        $userAgent = $_SERVER['HTTP_USER_AGENT'];
        return (empty($userAgent) or in_array($userAgent, config('Auth')['userAgentAppList'])) ? true : false;
    }

    public function login($user, $pass, $type = Auth::TYPE_USERNAME, $isLong = false)
    {
        $fieldArray = ['username', 'telephone', 'email'];
        $password = md5Hash($pass);
        $res = $this->where($fieldArray[$type], $user)->where('password', $password)->where('state',
            1)->selectAuto('auth_user');
        if (isset($res['uuid'])) {
            $uuid = $res['uuid'];
            if ($this->isCache) {
                $cacheTag = sprintf('auth_%s_list_%s', $this->tag, $uuid);
                $this->redis->set($cacheTag, $res['list']);
            }
            if ($this->isApp()) {
                $expire = time() + config('Auth')['longSaveTime'];
                $token = [$uuid, 'app', $expire];
                $tokenStr = aesEncrypt(json_encode($token));
                if ($this->isCache) {
                    $cacheTag = sprintf('auth_%s_app_%s', $this->tag, $uuid);
                    $this->redis->lPush($cacheTag, $tokenStr);
                    $this->redis->lTrim($cacheTag, 0, config('Auth')['clientAppMax'] - 1);
                }
                return $tokenStr;
            } else {
                $_SESSION["{$this->tag}_login"] = [
                    'uuid' => $uuid
                ];
                if ($isLong) {
                    $expire = time() + config('Auth')['longSaveTime'];
                    $token = [$uuid, 'web', $expire];
                    $tokenStr = aesEncrypt(json_encode($token));
                    setcookie("{$this->tag}_token", $tokenStr, $expire, '/', config('Auth')['cookieDomain']);
                    if ($this->isCache) {
                        $cacheTag = sprintf('auth_%s_web_%s', $this->tag, $uuid);
                        $this->redis->lPush($cacheTag, $tokenStr);
                        $this->redis->lTrim($cacheTag, 0, config('Auth')['clientAppMax'] - 1);
                    }
                }
                return true;
            }
        } else {
            return false;
        }
    }

    public function logout($uuid = '', $tokenStr = '')
    {
        if ($this->isApp()) {
            if ($this->isCache) {
                $cacheTag = sprintf('auth_%s_app_%s', $this->tag, $uuid);
                $num = $this->redis->lRem($cacheTag, $tokenStr, 0);
                return $num ? true : false;
            }
            return false;
        } else {
            unset($_SESSION["{$this->tag}_login"]);
            setcookie("{$this->tag}_token", null, time() - 1, '/', config('Auth')['cookieDomain']);
            if ($this->isCache) {
                $cacheTag = sprintf('auth_%s_web_%s', $this->tag, $uuid);
                $num = $this->redis->lRem($cacheTag, $tokenStr, 0);
                return $num ? true : false;
            }
            return true;
        }
    }

    public function cleanAll($uuid)
    {
        unset($_SESSION["{$this->tag}_login"]);
        setcookie("{$this->tag}_token", null, time() - 1, '/',config('Auth')['cookieDomain']);
        if ($this->isCache) {
            $cacheTagApp = sprintf('auth_%s_app_%s', $this->tag, $uuid);
            $cacheTagWeb = sprintf('auth_%s_web_%s', $this->tag, $uuid);
            $this->redis->del($cacheTagApp, $cacheTagWeb);
        }
    }

    public function checkLogined($tokenStr = '')
    {
        if ($this->isApp()) {
            $token = json_decode(aesDecrypt($tokenStr), true);
            if (is_array($token) and count($token) == 3 and $token[1] == 'app' and $token[2] > time()) {
                if ($this->isCache) {
                    $uuid = $token[0];
                    $cacheTag = sprintf('auth_%s_app_%s', $this->tag, $uuid);
                    $tokenArray = $this->redis->lRange($cacheTag, 0, -1);
                    if (!in_array($tokenStr, $tokenArray)) {
                        return false;
                    }
                }
                return true;
            }
            return false;
        } else {
            if (isset($_SESSION["{$this->tag}_login"]['uuid'])) {
                $uuid = $_SESSION["{$this->tag}_login"]['uuid'];
                return (strlen($uuid) == 32) ? true : false;
            } else {
                $tokenStr = isset($_COOKIE["{$this->tag}_token"]) ? $_COOKIE["{$this->tag}_token"] : '';
                $token = json_decode(aesDecrypt($tokenStr), true);
                if (is_array($token) and count($token) == 3 and $token[1] == 'web' and $token[2] > time()) {
                    if ($this->isCache) {
                        $uuid = $token[0];
                        $cacheTag = sprintf('auth_%s_web_%s', $this->tag, $uuid);
                        $tokenArray = $this->redis->lRange($cacheTag, 0, -1);
                        if (!in_array($tokenStr, $tokenArray)) {
                            return false;
                        }
                    }
                    $_SESSION["{$this->tag}_login"] = [
                        'uuid' => $token[0]
                    ];
                    return true;
                } else {
                    $this->logout();
                    return false;
                }
            }
        }
    }

    public function getUuid()
    {
        if ($this->isApp()) {
            return false;
        } else {
            return isset($_SESSION["{$this->tag}_login"]['uuid']) ? $_SESSION["{$this->tag}_login"]['uuid'] : null;
        }
    }

    public function checkPermission($uuid, array $permissionList)
    {
        static $listMax = 256;
        if ($this->isCache) {
            $cacheTag = sprintf('auth_%s_list_%s', $this->tag, $uuid);
            $list = $this->redis->get($cacheTag);
        } else {
            $list = $this->where('uuid', $uuid)->selectAuto('auth_user',['permission', 1]);
        }
        $list = str_repeat('0', $listMax - strlen($list)) . $list;
        $listBin = '';
        foreach (str_split($list) as $listItem) {
            $listItemBin = base_convert($listItem, 16, 2);
            $listBin .= str_repeat('0', 4 - strlen($listItemBin)) . $listItemBin;
        }
        foreach ($permissionList as $permissionItem) {
            if ($listBin[$listMax * 4 - $permissionItem - 1] != '1') {
                return false;
            }
        }
        return true;
    }

}