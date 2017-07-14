<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>婚庆教学平台</title>
    <meta name="Keywords" content="婚庆教学平台" />
    <meta name="Description" content="婚庆教学平台" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <!-- favicon -->
    <link rel="shortcut icon" href="img/favicon.ico">
    <!-- styles -->
    <link rel="stylesheet" href="css/weui.css">
<!--    <link rel="stylesheet" href="css/weui.min.css">-->
    <link rel="stylesheet" href="css/jquery-weui.css">
</head>
<body class="bg-gray">
<?php include("top.php");?>
<!--<div class="banner"><img src="img/temp/banner_4.jpg"></div>-->
<!-- 订单列表 -->
<div class="order-list-all">
    <div class="change-list-search">
        <div class="form-inline">
            <div class="form-group">
                <div class="select-title">
                    <span class="lable">全部</span><i class="icon-arrow-down"></i>
                </div>
                <div class="select-child hidden">
                    <p>全部</p>
                    <p>已领取</p>
                    <p>未领取</p>
                </div>
            </div>
        </div>
    </div>
    <div id="list">
        <div class="order-list">
            <div class="weui_cell">
                <p>2017 -02 -08 -11:24:00    订单号：1004219766</p>
            </div>
            <div class="confirm-order">
                <div class="weui-panel__bd">
                    <a href="D6_order_list_detail.php" class="weui-media-box weui-media-box_appmsg">
                        <div class="weui-media-box__hd">
                            <img class="weui-media-box__thumb" src="img/temp/class3.jpg" alt="">
                        </div>
                        <div class="weui-media-box__bd">
                            <h4 class="weui-media-box__title">美玲教你学化妆</h4>
                            <div class="weui-media-box__desc">
                                <p>永久有效</p>
                                <p>¥ 198</p>
                            </div>
                        </div>
                    </a>
                </div>
                <h3 class="confirm-total">实付：<span class="font-red">¥ 198</span></h3>
                <div class="order-look">
                    <h4 class="font-red pull-left">待支付</h4>
                    <a href="javascript:;" id="show-confirmer" class="weui_btn weui_btn_mini weui_btn_bl_primary">取消订单</a>
                    <a href="javascript:;" class="weui_btn weui_btn_mini weui_btn_or_primary">立即支付</a>
                </div>
            </div>
        </div>
        <div class="order-list">
            <div class="weui_cell">
                <p>2017 -02 -08 -11:24:00    订单号：1004219766</p>
            </div>
            <div class="confirm-order">
                <div class="weui-panel__bd">
                    <a href="javascript:;" class="weui-media-box weui-media-box_appmsg">
                        <div class="weui-media-box__hd">
                            <img class="weui-media-box__thumb" src="img/temp/class3.jpg" alt="">
                        </div>
                        <div class="weui-media-box__bd">
                            <h4 class="weui-media-box__title">美玲教你学化妆</h4>
                            <div class="weui-media-box__desc">
                                <p>永久有效</p>
                                <p>¥ 198</p>
                            </div>
                        </div>
                    </a>
                </div>
                <h3 class="confirm-total">实付：<span class="font-red">¥ 198</span></h3>
                <div class="order-look">
                    <h4 class="pull-left">交易关闭</h4>
                    <a href="javascript:;" class="weui_btn weui_btn_mini weui_btn_bl_primary">删除订单</a>
                </div>
            </div>
        </div>
        <div class="order-list">
            <div class="weui_cell">
                <p>2017 -02 -08 -11:24:00    订单号：1004219766</p>
            </div>
            <div class="confirm-order">
                <div class="weui-panel__bd">
                    <a href="D7_order_list_detail_look.php" class="weui-media-box weui-media-box_appmsg">
                        <div class="weui-media-box__hd">
                            <img class="weui-media-box__thumb" src="img/temp/class3.jpg" alt="">
                        </div>
                        <div class="weui-media-box__bd">
                            <h4 class="weui-media-box__title">美玲教你学化妆</h4>
                            <div class="weui-media-box__desc">
                                <p>永久有效</p>
                                <p>¥ 198</p>
                            </div>
                        </div>
                    </a>
                </div>
                <h3 class="confirm-total">实付：<span class="font-red">¥ 198</span></h3>
                <div class="order-look">
                    <h4 class="pull-left">交易成功</h4>
                    <a href="javascript:;" class="weui_btn weui_btn_mini weui_btn_bl_primary">删除记录</a>
                </div>
            </div>
        </div>
    </div>
    <div class="weui-infinite-scroll">
        <div class="infinite-preloader"></div>
        正在加载
    </div>
</div>


<?php include("footer.php");?>

<!-- jquery 2.1.4 -->
<script src="js/jquery-2.1.4.js"></script>
<script src="js/jquery-weui.js"></script>
<!-- 搜索 -->
<script src="js/search-bar.js"></script>
<!-- 滚动加载 -->
<script src="js/infinite.js"></script>
<!-- 幻灯片 -->
<script src="js/swiper.js"></script>
<script>
    //幻灯片初始化
    $(".swiper-container").swiper({
        loop: true,
        autoplay: 3000
    });
    <!--上方点击弹出-->
    $(document).ready(function(){
        $("#show").click(function(){
            $(".dropdown-list").toggle(500);
        });
        $("#show").blur(function(){
            $(".dropdown-list").toggle(500);
        });

        $('.select-title').click(function(){
            var has =  $('.select-child').hasClass('hidden');
            if(has){
                $('.select-child').removeClass('hidden');
            }else{
                $('.select-child').addClass('hidden');
            }
        })
        $('.select-child p').click(function(){
            var text = $(this).html();
            $('.select-title span').html(text);
            $('.select-child').addClass('hidden');
        })
    });
    //滚动加载
    var loading = false;
    $(document.body).infinite().on("infinite", function() {
        if(loading) return;
        loading = true;
        setTimeout(function() {
            $("#list").append("<div class='order-list'><div class='weui_cell'><p>2017 -02 -08 -11:24:00    订单号：1004219766</p></div><div class='confirm-order'><div class='weui-panel__bd'><a href='D6_order_list_detail.php' class='weui-media-box weui-media-box_appmsg'><div class='weui-media-box__hd'><img class='weui-media-box__thumb' src='img/temp/class3.jpg' alt=''></div><div class='weui-media-box__bd'><h4 class='weui-media-box__title'>美玲教你学化妆</h4><div class='weui-media-box__desc'><p>永久有效</p><p>¥ 198</p></div></div></a></div><h3 class='confirm-total'>实付：<span class='font-red'>¥ 198</span></h3><div class='order-look'><h4 class='font-red pull-left'>待支付</h4><a href='javascript:;' id='show-confirmer' class='weui_btn weui_btn_mini weui_btn_bl_primary'>取消订单</a><a href='javascript:;' class='weui_btn weui_btn_mini weui_btn_or_primary'>立即支付</a></div></div></div><div class='order-list'><div class='weui_cell'><p>2017 -02 -08 -11:24:00    订单号：1004219766</p></div><div class='confirm-order'><div class='weui-panel__bd'><a href='D6_order_list_detail.php' class='weui-media-box weui-media-box_appmsg'><div class='weui-media-box__hd'><img class='weui-media-box__thumb' src='img/temp/class3.jpg' alt=''></div><div class='weui-media-box__bd'><h4 class='weui-media-box__title'>美玲教你学化妆</h4><div class='weui-media-box__desc'><p>永久有效</p><p>¥ 198</p></div></div></a></div><h3 class='confirm-total'>实付：<span class='font-red'>¥ 198</span></h3><div class='order-look'><h4 class='font-red pull-left'>待支付</h4><a href='javascript:;' id='show-confirmer' class='weui_btn weui_btn_mini weui_btn_bl_primary'>取消订单</a><a href='javascript:;' class='weui_btn weui_btn_mini weui_btn_or_primary'>立即支付</a></div></div></div>");
            loading = false;
        }, 1500);
    });
</script>

</body>
</html>

