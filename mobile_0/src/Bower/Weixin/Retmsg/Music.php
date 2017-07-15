<?php
/**
 * Created by PhpStorm.
 * User: Robin
 * Date: 2016/10/28
 * Time: 11:22
 */
namespace Bower\Weixin\Retmsg;

class Music extends Retmsg
{
    public $title = '';
    public $description = '';
    public $musicUrl = '';
    public $hQMusicUrl = '';
    public $thumbMediaId = '';

    protected $template = <<<EOT
<xml>
<ToUserName><![CDATA[%s]]></ToUserName>
<FromUserName><![CDATA[%s]]></FromUserName>
<CreateTime>%s</CreateTime>
<MsgType><![CDATA[music]]></MsgType>
<Music>
<Title><![CDATA[%s]]></Title>
<Description><![CDATA[%s]]></Description>
<MusicUrl><![CDATA[%s]]></MusicUrl>
<HQMusicUrl><![CDATA[%s]]></HQMusicUrl>
<ThumbMediaId><![CDATA[%s]]></ThumbMediaId>
</Music>
</xml>
EOT;

    public function toXml()
    {
        return sprintf($this->template, $this->toUser, $this->fromUser, $_SERVER['REQUEST_TIME'], $this->title,
            $this->description, $this->musicUrl, $this->hQMusicUrl, $this->thumbMediaId);
    }

}