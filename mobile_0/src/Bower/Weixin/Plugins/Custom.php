<?php
/**
 * Created by PhpStorm.
 * User: Robin
 * Date: 2016/12/22
 * Time: 14:27
 */
namespace Bower\Weixin\Plugins;

use Bower\Weixin\Retmsg\Custom as Cmsg;
use Bower\Weixin\WxConfig;

class Custom
{
    public function handle(\stdClass $data)
    {
        if ($data->Content == '客服') {
            $ret = new Cmsg();
            //$ret->kfAccount = 'kf2@' . WxConfig::$wxname;
            return $ret;
        } else {
            return null;
        }

    }
}