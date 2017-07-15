<?php
/**
 * Created by PhpStorm.
 * User: Robin
 * Date: 2016/12/28
 * Time: 13:34
 */

namespace Bower\Weixin;

class Webscope
{
    public static $url = '';

    const TYPE_BASE = 'snsapi_base';
    const TYPE_INFO = 'snsapi_userinfo';

    const WX_STR_ACCESSTOKEN = 'web_accesstoken';
    const WX_STR_OPENID = 'web_openid';
    const WX_STR_USERINFO = 'web_userinfo';

    public static function start($type = Webscope::TYPE_BASE, $state = 0)
    {
        if (!isset($_SESSION[self::WX_STR_ACCESSTOKEN]['access_token'])) {
            if (isset($_GET['code']) and isset($_GET['state'])) {
                //redirect url
                $url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=APPID&secret=SECRET&code=CODE&grant_type=authorization_code";
                $url = str_replace(['APPID', 'SECRET', 'CODE'],
                    [config('Weixin')['appid'], config('Weixin')['appsecret'], $_GET['code']], $url);
                $ret = self::fetch($url);
                isset($ret->access_token) or die('auth faild by code');
                $_SESSION[self::WX_STR_ACCESSTOKEN]['access_token'] = $ret->access_token;
                $_SESSION[self::WX_STR_ACCESSTOKEN]['expires_in'] = $_SERVER['REQUEST_TIME'] + $ret->expires_in;
                $_SESSION[self::WX_STR_ACCESSTOKEN]['refresh_token'] = $ret->refresh_token;
                $_SESSION[self::WX_STR_OPENID] = isset($ret->openid) ? $ret->openid : null;
                return $_SESSION[self::WX_STR_ACCESSTOKEN]['refresh_token'];

            } else {
                //begin
                if (!Webscope::$url) {
                    throw new \Exception('please set redirect $url first');
                }
                $url = urlencode(Webscope::$url);
                $appid = config('Weixin')['appid'];
                $url = "https://open.weixin.qq.com/connect/oauth2/authorize?appid=$appid&redirect_uri=$url&response_type=code&scope=$type&state=$state#wechat_redirect";
                ob_clean();
                header("Location: $url");
                die();
            }
        }
        return $_SESSION[self::WX_STR_ACCESSTOKEN]['refresh_token'];
    }

    public static function getOpenid()
    {
        return isset($_SESSION[self::WX_STR_OPENID]) ? $_SESSION[self::WX_STR_OPENID] : null;
    }

    public static function getUserinfo()
    {
        if (!isset($_SESSION[self::WX_STR_USERINFO]) or !$_SESSION[self::WX_STR_USERINFO]) {
            if (!isset($_SESSION[self::WX_STR_ACCESSTOKEN]['access_token'])) {
                return false;
            } elseif ($_SESSION[self::WX_STR_ACCESSTOKEN]['expires_in'] < time()) {
                $url = 'https://api.weixin.qq.com/sns/oauth2/refresh_token?appid=APPID&grant_type=refresh_token&refresh_token=REFRESH_TOKEN';
                $url = str_replace(['APPID', 'REFRESH_TOKEN'],
                    [config('Weixin')['appid'], $_SESSION[self::WX_STR_ACCESSTOKEN]['refresh_token']], $url);
                $ret = self::fetch($url);
                $_SESSION[self::WX_STR_ACCESSTOKEN]['access_token'] = $ret->access_token;
                $_SESSION[self::WX_STR_ACCESSTOKEN]['expires_in'] = $_SERVER['REQUEST_TIME'] + $ret->expires_in;
                $_SESSION[self::WX_STR_ACCESSTOKEN]['refresh_token'] = $ret->refresh_token;
                $_SESSION[self::WX_STR_OPENID] = isset($ret->openid) ? $ret->openid : null;
            }
            $url = 'https://api.weixin.qq.com/sns/userinfo?access_token=ACCESS_TOKEN&openid=OPENID&lang=zh_CN';
            $url = str_replace(['ACCESS_TOKEN', 'OPENID'],
                [$_SESSION[self::WX_STR_ACCESSTOKEN]['access_token'], $_SESSION[self::WX_STR_OPENID]],
                $url);
            $ret = self::fetch($url, [], false);
            $_SESSION[self::WX_STR_USERINFO] = strpos($ret, 'errmsg') ? null : json_decode($ret, true);
        }
        return $_SESSION[self::WX_STR_USERINFO];
    }

    //base curl fetch
    protected static function fetch($url, $postData = '', $retDecode = true)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        if ($postData) {
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
        }
        $ret = curl_exec($ch);
        curl_close($ch);
        return $retDecode ? json_decode($ret) : $ret;
    }
}