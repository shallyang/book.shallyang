<?php
/**
 * Created by PhpStorm.
 * User: Robin
 * Date: 2017/4/1
 * Time: 8:49
 */

namespace Bower\Mvc;

class Controller
{
    const CODE_OK = 0;
    const CODE_ACCESS_DENIED = 1;
    const CODE_PARAM_ERROR = 2;
    const CODE_ALREADY_EXIST = 3;
    const CODE_CREATED_FAILED = 4;
    const CODE_DELETED_FAILED = 5;
    const CODE_UPDATED_FAILED = 6;
    const CODE_RECORD_NOT_FOUND = 7;

    protected function output($data)
    {
        if (ob_get_length() and defined('__DEBUG__')) {
            $content = ob_get_clean();
            throw new \Exception("sys:ob_content invalid ($content)");
        }
        ob_clean();
        header("Content-Type: application/json;charset=utf-8");
        die(json_encode($data, JSON_UNESCAPED_UNICODE));
    }

    protected function errOutput($errcode, $errmsg)
    {
        if (ob_get_length() and defined('__DEBUG__')) {
            $content = ob_get_clean();
            throw new \Exception("sys:ob_content invalid ($content)");
        }
        ob_clean();
        header("Content-Type: application/json;charset=utf-8");
        $rest = new \stdClass();
        $rest->errcode = $errcode;
        $rest->errmsg = $errmsg;
        die(json_encode($rest, JSON_UNESCAPED_UNICODE));
    }
}