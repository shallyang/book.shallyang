<?php
/**
 * Created by PhpStorm.
 * User: Robin
 * Date: 2016/12/22
 * Time: 14:52
 */
namespace Bower\Weixin\Reqmsg;

class News
{
    public $news;

    public function __construct($title, $description, $picurl, $url)
    {
        $msg = '{"title":"%s","description":"%s","url":"%s","picurl":"%s"}';
        $this->news = sprintf($msg, $title, $description, $url, $picurl);
    }
}