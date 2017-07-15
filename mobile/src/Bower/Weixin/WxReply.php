<?php
/**
 * Created by PhpStorm.
 * User: Robin
 * Date: 2016/5/18
 */

namespace Bower\Weixin;

use Bower\Weixin\Retmsg\Retmsg;
use Bower\Weixin\Retmsg\Text;

class WxReply
{
    protected static $format = '<xml><Encrypt><![CDATA[%s]]></Encrypt><MsgSignature><![CDATA[%s]]></MsgSignature><TimeStamp>%s</TimeStamp><Nonce><![CDATA[%s]]></Nonce></xml>';

    protected static function signature($timeStamp = '', $nonce = '', $msg = '')
    {
        $token = config('Weixin')['token'];
        $timeStamp = $timeStamp ?: easyGet('timestamp', '');
        $nonce = $nonce ?: easyGet('nonce', '');
        $tmpArray = [$token, $timeStamp, $nonce];
        $msg and $tmpArray[] = $msg;
        sort($tmpArray, SORT_STRING);

        return sha1(implode($tmpArray));
    }

    public static function run()
    {
        if (easyGet('signature', '') == self::signature()) {
            if (isset($_GET['echostr'])) {
                echo $_GET['echostr'];
            } else {
                $aesEnabled = config('Weixin')['aesEnabled'];
                libxml_disable_entity_loader(true);
                $raw_post_data = file_get_contents('php://input', 'r');
                //slog($raw_post_data);
                $data = simplexml_load_string($raw_post_data . '', 'SimpleXMLElement', LIBXML_NOCDATA);
                is_object($data) or self::output();
                if ($aesEnabled) {
                    $devMsgSignature = self::signature('', '', $data->Encrypt);
                    $msgSignature = easyGet('msg_signature');
                    $devMsgSignature == $msgSignature or self::output();
                    $msgData = self::decrypt($data->Encrypt, config('Weixin')['aesKey']);
                    $msgData = substr($msgData, 20, -1 * strlen(config('Weixin')['appid']));
                    $data = simplexml_load_string($msgData . '', 'SimpleXMLElement', LIBXML_NOCDATA);
                }
                is_object($data) or self::output();
                $data = json_decode(json_encode($data, JSON_UNESCAPED_UNICODE));
                //process mainline
                $retMsg = self::process($data);
                $retMsg or self::output();
                //process retmsg
                $retMsg->fromUser = $data->ToUserName;
                $retMsg->toUser = $data->FromUserName;
                $msg = $retMsg->toXml();
                if ($aesEnabled) {
                    $msg = str_repeat('a', 16) . pack("N", strlen($msg)) . $msg . config('Weixin')['appid'];
                    $msgEncrypt = self::encrypt($msg, config('Weixin')['aesKey']);
                    $timeStamp = $_SERVER['REQUEST_TIME'];
                    $nonce = easyGet('nonce');
                    $msgSignature = self::signature($timeStamp, $nonce, $msgEncrypt);
                    $newMsg = sprintf(WxReply::$format, $msgEncrypt, $msgSignature, $timeStamp, $nonce);
                    self::output($newMsg);
                } else {
                    self::output($msg);
                }
            }
        }
    }

    protected static function process(\stdClass $rsvData)
    {
        $retMsg = null;
        $pluginList = config('Weixin')[strtolower($rsvData->MsgType)];
        if ($pluginList) {
            foreach ($pluginList as $plugin) {
                $className = '\\Bower\\Weixin\\Plugins\\' . $plugin;
                if (class_exists($className)) {
                    $obj = new $className();
                    if (method_exists($obj, 'handle')) {
                        $retMsg = call_user_func([$obj, 'handle'], $rsvData);
                        if ($retMsg instanceof Retmsg) {
                            break;
                        }
                    }
                }
            }
        }
        if (!$retMsg) {
            $retMsg = new Text();
            $retMsg->content = config('Weixin')['null'];
        }

        return $retMsg;
    }

    protected static function output($msg = '')
    {
        $msg = $msg ?: 'success';
        ob_clean();
        //slog($msg);
        die($msg);
    }

    // AES 加密
    protected static function encrypt($str, $key)
    {
        $aesKey = base64_decode($key . '=');
        $iv = substr($aesKey, 0, 16);
        $padding = 32 - strlen($str) % 32;
        $padding_text = $str . str_repeat(chr($padding), $padding);
        $ciphertext = mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $aesKey, $padding_text, MCRYPT_MODE_CBC, $iv);
        return base64_encode($ciphertext);
    }

    //AES 解密
    protected static function decrypt($str, $key)
    {
        $aesKey = base64_decode($key . '=');
        $iv = substr($aesKey, 0, 16);
        $ciphertext = base64_decode($str);
        $orig_data = mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $aesKey, $ciphertext, MCRYPT_MODE_CBC, $iv);
        $length = strlen($orig_data);
        $unpadding = ord($orig_data[$length - 1]);
        return substr($orig_data, 0, $length - $unpadding);
    }
}