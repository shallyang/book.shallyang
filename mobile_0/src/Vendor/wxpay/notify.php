<?php
/**
 * Created by PhpStorm.
 * User: Robin
 * Date: 2016/5/25
 */

date_default_timezone_set('Asia/Shanghai');
require __BOWER__.'/autoload.php';
include __VENDOR__.'/wxpay/lib/WxPay.Api.php';
include __VENDOR__.'/wxpay/lib/WxPay.Notify.php';

class PayNotifyCallBack extends WxPayNotify
{
    //查询订单
    public function Queryorder($transaction_id)
    {
        $input = new WxPayOrderQuery();
        $input->SetTransaction_id($transaction_id);
        $result = WxPayApi::orderQuery($input);
        if(array_key_exists("return_code", $result)
            && array_key_exists("result_code", $result)
            && $result["return_code"] == "SUCCESS"
            && $result["result_code"] == "SUCCESS")
        {
            return true;
        }
        return false;
    }

    //重写回调处理函数
    public function NotifyProcess($data, &$msg)
    {
        $notfiyOutput = array();

        if(!array_key_exists("transaction_id", $data)){
            $msg = "输入参数不正确";
            return false;
        }
        //查询订单，判断订单真实性
        if(!$this->Queryorder($data["transaction_id"])){
            $msg = "订单查询失败";
            return false;
        }
        //业务代码，更改订单状态


        return true;
    }
}

$notify = new PayNotifyCallBack();
$notify->Handle(false);
