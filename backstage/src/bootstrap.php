<?php
include __ROOT__.'/Vendor/slog/slog.function.php';

//配置
slog(array(
    'host'                => 'slog.thinkphp.cn',//websocket服务器地址，默认localhost
    'optimize'            => true,//是否显示利于优化的参数，如果运行时间，消耗内存等，默认为false
    'show_included_files' => true,//是否显示本次程序运行加载了哪些文件，默认为false
    'error_handler'       => true,//是否接管程序错误，将程序错误显示在console中，默认为false
    'force_client_ids'    => array(//日志强制记录到配置的client_id,默认为空,client_id必须在allow_client_ids中
        'bower_dsdl_33',
        //'client_02',
    ),
    'allow_client_ids'    => array(//限制允许读取日志的client_id，默认为空,表示所有人都可以获得日志。
        'bower_dsdl_33',
        //'client_02',
        //'client_03',
    ),
),'config');
