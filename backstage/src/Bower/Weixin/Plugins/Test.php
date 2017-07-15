<?php
/**
 * Created by PhpStorm.
 * User: Robin
 * Date: 2016/10/29
 * Time: 17:36
 */
namespace Bower\Weixin\Plugins;

use Bower\Weixin\Retmsg\Text;

class Test
{
    public function handle(\stdClass $data)
    {
        $ret = new Text();
        $ret->content = $data->Content;
        return $ret;
    }
}