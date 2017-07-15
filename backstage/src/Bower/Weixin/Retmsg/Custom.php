<?php
/**
 * Created by PhpStorm.
 * User: Robin
 * Date: 2016/12/22
 * Time: 14:22
 */
namespace Bower\Weixin\Retmsg;

class Custom extends Retmsg
{
    public $kfAccount = '';
    protected $template = <<<EOT
<xml>
     <ToUserName><![CDATA[%s]]></ToUserName>
     <FromUserName><![CDATA[%s]]></FromUserName>
     <CreateTime>%s</CreateTime>
     <MsgType><![CDATA[transfer_customer_service]]></MsgType>
     %s
 </xml>
EOT;

    public function toXml()
    {
        static $kfAccount = "<TransInfo><KfAccount><![CDATA[%s]]></KfAccount></TransInfo>";
        $kfMsg = $this->kfAccount ? sprintf($kfAccount, $this->kfAccount) : '';
        return sprintf($this->template, $this->toUser, $this->fromUser, $_SERVER['REQUEST_TIME'], $kfMsg);
    }
}