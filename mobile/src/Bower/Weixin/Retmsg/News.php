<?php
/**
 * Created by PhpStorm.
 * User: Robin
 * Date: 2016/10/28
 * Time: 11:22
 */
namespace Bower\Weixin\Retmsg;

use Bower\Weixin\WxBase;

class News extends Retmsg
{
    protected $news = [];

    protected $template = <<<EOT
<xml>
<ToUserName><![CDATA[%s]]></ToUserName>
<FromUserName><![CDATA[%s]]></FromUserName>
<CreateTime>%s</CreateTime>
<MsgType><![CDATA[news]]></MsgType>
<ArticleCount>%s</ArticleCount>
<Articles>
%s
</Articles>
</xml>
EOT;
    protected $templateItem = <<<EOT
<item>
<Title><![CDATA[%s]]></Title> 
<Description><![CDATA[%s]]></Description>
<PicUrl><![CDATA[%s]]></PicUrl>
<Url><![CDATA[%s]]></Url>
</item>
EOT;

    public function addNews($title, $description, $picUrl, $url)
    {
        $this->news[] = sprintf($this->templateItem, $title, $description, $picUrl, $url);
    }

    public function toXml()
    {
        if (empty($this->news)) {
            throw new \Exception(sprintf(WxBase::WX_ERROR_STANDARD, 0, 'no news added,use addnew() first'));
        }
        $this->news = array_slice($this->news, 0, 10);
        $count      = count($this->news);

        return sprintf($this->template, $this->toUser, $this->fromUser, $_SERVER['REQUEST_TIME'], $count,
            implode('', $this->news));
    }
}