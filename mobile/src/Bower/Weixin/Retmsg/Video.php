<?php
/**
 * Created by PhpStorm.
 * User: Robin
 * Date: 2016/10/28
 * Time: 11:22
 */
namespace Bower\Weixin\Retmsg;

class Video extends Retmsg
{
    public $mediaId = '';
    public $title = '';
    public $description = '';

    protected $template = <<<EOT
<xml>
<ToUserName><![CDATA[%s]]></ToUserName>
<FromUserName><![CDATA[%s]]></FromUserName>
<CreateTime>%s</CreateTime>
<MsgType><![CDATA[video]]></MsgType>
<Video>
<MediaId><![CDATA[%s]]></MediaId>
<Title><![CDATA[%s]]></Title>
<Description><![CDATA[%s]]></Description>
</Video> 
</xml>
EOT;

    public function toXml()
    {
        return sprintf($this->template, $this->toUser, $this->fromUser, $_SERVER['REQUEST_TIME'], $this->mediaId, $this->title,
            $this->description);
    }
}