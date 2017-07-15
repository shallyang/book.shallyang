<?php
/**
 * Created by PhpStorm.
 * User: Robin
 * Date: 2016/6/7
 */

namespace Bower\Traits;

trait Sms
{
    protected function smsSend($photoNumber, $content)
    {
        $argv = [
            'sn' => config('Sms')['sn'],
            //替换成您自己的序列号
            'pwd' => strtoupper(md5(config('Sms')['sn'] . config('Sms')['pwd'])),
            //此处密码需要加密 加密方式为 md5(sn+password) 32位大写
            'mobile' => $photoNumber,
            //手机号 多个用英文的逗号隔开 post理论没有长度限制.推荐群发一次小于等于10000个手机号
            'content' => iconv("UTF-8", "gb2312//IGNORE", $content . config('Sms')['suffix']),
            //短信内容
            'ext' => '',
            'stime' => '',
            //定时时间 格式为2011-6-29 11:09:21
            'rrid' => ''
        ];
        $params = http_build_query($argv);
        $ch = curl_init();
        $options = [
            CURLOPT_URL => 'http://sdk2.entinfo.cn:8060/webservice.asmx/mt',
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_HEADER => 0,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $params,
        ];
        curl_setopt_array($ch, $options);
        $ret = curl_exec($ch);
        curl_close($ch);
        return (int)(strip_tags($ret));
    }
}