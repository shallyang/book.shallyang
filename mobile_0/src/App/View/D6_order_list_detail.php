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
<!--    <link rel="stylesheet" href="css/weui.css">-->
    <link rel="stylesheet" href="css/weui.min.css">
    <link rel="stylesheet" href="css/jquery-weui.css">
</head>
<body>
<?php include("top.php");?>
<!--<div class="banner"><img src="img/temp/banner_4.jpg"></div>-->
<!-- 订单列表 -->
<div class="weui_cells_form order-de">
    <div class="weui_cell">
        <div class="weui_cell_hd"><label class="weui_label">交易单号</label></div>
        <div class="weui_cell_bd">
            <P>1004219766</P>
        </div>
    </div>
    <div class="weui_cell">
        <div class="weui_cell_hd"><label class="weui_label">课      程</label></div>
        <dl class="or-img">
            <dt class="weui-media-box__hd">
                <img class="weui-media-box__thumb" src="img/temp/class3.jpg" alt="">
            </dt>
            <dd class="weui-media-box__bd">
                <h4 class="weui-media-box__title">时尚彩妆基础</h4>
                <div class="weui-media-box__desc">
                    <p>付款后365天内有效</p>
                    <p>共9课时</p>
                </div>
            </dd>
        </dl>
    </div>
    <div class="weui_cell">
        <div class="weui_cell_hd"><label for="" class="weui_label">类      型</label></div>
        <div class="weui_cell_bd">
            <P>点播</P>
        </div>
    </div>
    <div class="weui_cell">
        <div class="weui_cell_hd"><label for="" class="weui_label">交易价格</label></div>
        <div class="weui_cell_bd">
            <P class="font-red">¥ 198</P>
        </div>
    </div>
    <div class="weui_cell">
        <div class="weui_cell_hd"><label for="" class="weui_label">交易时间</label></div>
        <div class="weui_cell_bd">
            <P>2017 -02 -08 -11:24:00</P>
        </div>
    </div>
    <div class="weui_cell">
        <div class="weui_cell_hd"><label for="" class="weui_label">交易状态</label></div>
        <div class="weui_cell_bd">
            <P class="font-red">待付款</P>
        </div>
    </div>
</div>
<div class="app-btn">
    <a href="javascript:;" id="save-info">确认支付¥ 198</a>
</div>

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
    });
    //滚动加载
    var loading = false;
    $(document.body).infinite().on("infinite", function() {
        if(loading) return;
        loading = true;
        setTimeout(function() {
            $("#tab1 .weui-panel__bd").append("<a href='javascript:;' class='weui-media-box weui-media-box_appmsg'><div class='weui-media-box__hd'><img class='weui-media-box__thumb' src='img/temp/class4.jpg' alt=''></div><div class='weui-media-box__bd'><h4 class='weui-media-box__title'>时尚插花 教学</h4><div class='weui-media-box__desc'><h3>已学习6/9课时</h3><div class='weui_progress'><div class='weui_progress_bar'><div class='weui_progress_inner_bar js_progress' style='width: 66%;'></div></div></div></div></div></a><a href='javascript:;' class='weui-media-box weui-media-box_appmsg'><div class='weui-media-box__hd'><img class='weui-media-box__thumb' src='img/temp/class6.jpg' alt=''></div><div class='weui-media-box__bd'><h4 class='weui-media-box__title'>时尚插花 教学</h4><div class='weui-media-box__desc'><span class='start-learn'>开始学习</span></div></div></a>");
            $("#tab2 .weui-panel__bd").append("<div href='javascript:;' class='weui-media-box weui-media-box_appmsg'><div class='weui-media-box__hd'><img class='weui-media-box__thumb' src='img/temp/class6.jpg' alt=''></div><div class='weui-media-box__bd'><h4 class='weui-media-box__title'>金融街丽思卡尔顿酒店——“极光教堂·爱之飨宴”</h4><p class='weui-media-box__desc'><span><i class='icon-star-full'></i><i class='icon-star-full'></i><i class='icon-star-full'></i><i class='icon-star-full'></i><i class='icon-star-empty'></i> 4</span><span>44271人学过</span><small class='font-red'>免费</small><small class='pull-right heart-small'><a href='javascript:;'><i class='icon-heart'></i></a></small></p></div></div><div href='javascript:;' class='weui-media-box weui-media-box_appmsg'><div class='weui-media-box__hd'><img class='weui-media-box__thumb' src='img/temp/class2.jpg' alt=''></div><div class='weui-media-box__bd'><h4 class='weui-media-box__title'>柏悦酒店，囍悦之时光足迹主题婚礼秀</h4><p class='weui-media-box__desc'><span><i class='icon-star-full'></i><i class='icon-star-full'></i><i class='icon-star-full'></i><i class='icon-star-full'></i><i class='icon-star-empty'></i> 4</span><span>44271人学过</span><small class='font-green'>￥198</small><small class='pull-right heart-small'><a href='javascript:;'><i class='icon-solid-heart'></i></a></small></p></div></div>");
            loading = false;
        }, 1500);
    });
</script>

</body>
</html>