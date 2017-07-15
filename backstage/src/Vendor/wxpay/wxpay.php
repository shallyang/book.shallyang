<?php
/**
 * Created by PhpStorm.
 * User: Robin
 * Date: 2016/5/25
 */
include 'lib/WxPay.Api.php';
include 'lib/WxPay.Notify.php';
include 'qrcode/qrlib.php';

class Wxpay
{
    public static function nativeDirect($orderId)
    {
        date_default_timezone_set('Asia/Shanghai');
        $biz = new WxPayBizPayUrl();
        $biz->SetProduct_id($orderId);
        $values = WxpayApi::bizpayurl($biz);
        $url = "weixin://wxpay/bizpayurl?" . http_build_query($values);
        QRcode::png($url);
    }

    public static function nativeOrder($body, $attach, $orderNo, $totalFee, $goodsTag, $orderId, $notifyUrl)
    {
        date_default_timezone_set('Asia/Shanghai');
        $order = new WxPayUnifiedOrder();
        //简要描述
        $order->SetBody($body);
        //附加数据
        $order->SetAttach($attach);
        //订单号
        $order->SetOut_trade_no($orderNo);
        //订单总金额
        $order->SetTotal_fee($totalFee);
        //订单生成时间
        $order->SetTime_start(date("YmdHis"));
        //订单失效时间
        $order->SetTime_expire(date("YmdHis", time() + 600));
        //设置商品标记，代金券或立减优惠功能的参数
        $order->SetGoods_tag($goodsTag);
        //异步通知回调地址
        $order->SetNotify_url($notifyUrl);
        //设置取值如下：JSAPI，NATIVE，APP
        $order->SetTrade_type("NATIVE");
        //商品ID
        $order->SetProduct_id($orderId);
        $result = WxPayApi::unifiedOrder($order);
        if ($result['return_code'] == 'FAIL') {
            throw new Exception('wxpay:' . $result['return_msg']);
        }
        if (isset($result['err_code_des'])) {
            throw new Exception('wxpay:' . $result['err_code_des']);
        }
        $url = $result["code_url"];
        QRcode::png($url);
    }
}
