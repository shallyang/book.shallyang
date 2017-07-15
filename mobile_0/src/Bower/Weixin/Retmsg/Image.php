<?php
/**
 * Created by PhpStorm.
 * User: Robin
 * Date: 2016/10/28
 * Time: 11:22
 */
namespace Bower\Weixin\Retmsg;

class Image extends Retmsg
{
    public $mediaId = '';

    protected $template = <<<EOT
<xml>
<ToUserName><![CDATA[%s]]></ToUserName>
<FromUserName><![CDATA[%s]]></FromUserName>
<CreateTime>%s</CreateTime>
<MsgType><![CDATA[image]]></MsgType>
<Image>
<MediaId><![CDATA[%s]]></MediaId>
</Image>
</xml>
EOT;

    public function toXml()
    {
        return sprintf($this->template, $this->toUser, $this->fromUser, $_SERVER['REQUEST_TIME'], $this->mediaId);
    }

}