<?php
return [
    'cookieDomain' => '',
    //cookie域
    'userAgentAppList' => ['app', 'android', 'ios'],
    //app对应userAgent列表
    'longSaveTime' => 3600 * 24 * 15,
    //token长期存储时间
    'isCache' => false,
    //是否启动高级模式
    'redisHost' => '127.0.0.1',
    //高级模式--缓存地址
    'redisPort' => 6379,
    //高级模式--缓存端口
    'redisDbIndex' => 0,
    //高级模式--缓存数据库序号
    'clientAppMax' => 5,
    //高级模式--app客户端限制数
    'clientWebMax' => 5,
    //高级模式--web客户端限制数
];