<?php
/**
 * Created by PhpStorm.
 * User: Robin
 * Date: 2016/12/23
 * Time: 8:38
 */
namespace Bower\Weixin\Reqmsg;

class Mpnews
{
    public $news;

    public function __construct(
        $title,
        $thumbMediaId,
        $author,
        $digest,
        $content,
        $contentSourceUrl,
        $showCoverPic = 1
    ) {
        $msg = '{"title":"%s","thumb_media_id":"%s","author":"%s","digest":"%s","show_cover_pic":"%s","content":"%s","content_source_url":"%s"}';
        $this->news = sprintf($msg, $title, $thumbMediaId, $author, $digest, $showCoverPic, $content,
            $contentSourceUrl);
    }
}