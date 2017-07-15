<?php
/**
 * Created by PhpStorm.
 * User: Robin
 * Date: 2016/6/6
 */

namespace Bower\Traits;

trait Redis
{
    protected function redis()
    {
        static $obj;
        if (!$obj) {
            $obj = new \Redis();
            $obj->connect(config('Redis')['host'], config('Redis')['port']);
            $obj->auth(config('Redis')['auth']);
            $obj->select(config('Redis')['dbIndex']);
        }
        return $obj;
    }
}