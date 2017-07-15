<?php
/**
 * Created by PhpStorm.
 * User: Kingkong
 * Date: 2017/3/30
 * Time: 16:02
 */

define("APPID","wx3fa8ca7d41cbbad8");
define("SECRET","b8a19392eb97e3a245bd32368d25b02b");




function wx_get_token() {
    $token = empty($_COOKIE["access_token"])?'':$_COOKIE["access_token"];
    if (!$token) {
        $res = file_get_contents('https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid='.APPID.'&secret='.SECRET);
        $res = json_decode($res, true);
        $token = $res['access_token'];
        setcookie('access_token', $token, 3600*2);
    }
    return $token;
}

function wx_get_jsapi_ticket(){
    $ticket = "";
    do{
        $ticket = empty($_COOKIE["wx_ticket"])?'':$_COOKIE["wx_ticket"];
        if (!empty($ticket)) {
            break;
        }
        $token = wx_get_token();
        $url2 = sprintf("https://api.weixin.qq.com/cgi-bin/ticket/getticket?access_token=%s&type=jsapi",
            $token);
        $res = file_get_contents($url2);
        $res = json_decode($res, true);

        $ticket = $res['ticket'];
        setcookie('wx_ticket', $ticket, 3600*2);
    }while(0);
    return $ticket;
}

$timestamp = time();
$wxnonceStr = "111122233456435";
$wxticket = wx_get_jsapi_ticket();
$wxOri = sprintf("jsapi_ticket=%s&noncestr=%s&timestamp=%s&url=%s",
    $wxticket, $wxnonceStr, $timestamp,
    'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING']
);
$wxSha1 = sha1($wxOri);

