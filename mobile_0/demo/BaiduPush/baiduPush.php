<?php
/**
 * Created by PhpStorm.
 * User: Robin
 * Date: 2016/9/28
 * Time: 9:49
 */
define('BAIDU_PUSH_APIKEY', 'apikey');
define('BAIDU_PUSH_SECRETKEY', 'secretkey');

//globle inlcude first
require __ROOT__ . '/Vendor/baidupush/sdk.php';
$pushSdk = new PushSDK(BAIDU_PUSH_APIKEY, BAIDU_PUSH_SECRETKEY);

//push a single msg to android
$opts = ['msg_type' => 1];
$msg = [
    'title' => '这里是标题',
    'description' => '这里是内容',
    'custom_content' => [
        'key1' => 'value1',
        //......
    ]
];
$pushSdk->pushMsgToSingleDevice('channel_id', $msg, $opts);

//push a single msg to ios
$opts = [
    'msg_type' => 1,
    'deploy_status' => 2            //use 1 instead if develop
];
$msg = [
    'aps' => [
        'alert' => '这里是内容',
    ],
    'key1' => 'value1',
    //......
];
$pushSdk->pushMsgToSingleDevice('channel_id', $msg, $opts);