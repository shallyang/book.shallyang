<?php
/**
 * Created by PhpStorm.
 * User: Robin
 * Date: 2016/5/25
 */

date_default_timezone_set('Asia/Shanghai');
include '../autoload.php';
include 'lib/WxPay.Api.php';
include 'lib/WxPay.Notify.php';

class NativeNotifyCallBack extends WxPayNotify
{

    public function unifiedorder($openId, $orderId)
    {
        //统一下单，下面是业务代码,根据orderId获取订单信息
        //$orderInfo=new modelOrder();
        $body = '这是订单说明';
        $attach = '这是订单附件';
        $totalFee = 1;
        $goodsTag = '这是商品促销说明';
        $orderNo = '110';
        $url = 'http://商户地址/wxpay/notify.php';
        //上面是业务代码,下面不用修改
        $input = new WxPayUnifiedOrder();
        $input->SetBody($body);
        $input->SetAttach($attach);
        $input->SetOut_trade_no($orderNo);
        $input->SetTotal_fee($totalFee);
        $input->SetGoods_tag($goodsTag);
        $input->SetNotify_url($url);
        $input->SetTime_start(date("YmdHis"));
        $input->SetTime_expire(date("YmdHis", time() + 600));
        $input->SetTrade_type("NATIVE");
        $input->SetOpenid($openId);
        $input->SetProduct_id($orderId);
        $result = WxPayApi::unifiedOrder($input);
        return $result;
    }

    public function NotifyProcess($data, &$msg)
    {
        //echo "处理回调";
        if (!array_key_exists("openid", $data) ||
            !array_key_exists("product_id", $data)
        ) {
            $msg = "回调数据异常";
            return false;
        }

        $openid = $data["openid"];
        $product_id = $data["product_id"];

        //统一下单
        $result = $this->unifiedorder($openid, $product_id);
        if (!array_key_exists("appid", $result) ||
            !array_key_exists("mch_id", $result) ||
            !array_key_exists("prepay_id", $result)
        ) {
            $msg = "统一下单失败";
            return false;
        }

        $this->SetData("appid", $result["appid"]);
        $this->SetData("mch_id", $result["mch_id"]);
        $this->SetData("nonce_str", WxPayApi::getNonceStr());
        $this->SetData("prepay_id", $result["prepay_id"]);
        $this->SetData("result_code", "SUCCESS");
        $this->SetData("err_code_des", "OK");
        return true;
    }
}

$notify = new NativeNotifyCallBack();
$notify->Handle(true);
