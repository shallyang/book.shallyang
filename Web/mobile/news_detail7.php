<?=include 'wx.php';?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>【影楼视觉·新闻快播】名家专访—CLICK.C老师</title>
    <meta name="Keywords" content="【影楼视觉·新闻快播】名家专访—CLICK.C老师" />
    <meta name="Description" content="【影楼视觉·新闻快播】名家专访—CLICK.C老师" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <!-- favicon -->
    <link rel="shortcut icon" href="img/favicon.ico">
    <!-- styles -->
    <link rel="stylesheet" href="css/weui.css">
    <link rel="stylesheet" href="css/jquery-weui.css">
</head>
<body class="bg-gray">
<?php include("top.php");?>
<article class="weui_article">
    <h1>【影楼视觉·新闻快播】名家专访—CLICK.C老师</h1>
    <div class="editor-content detail-con">
        <div class="video">
            <video controls autoplay>
                <source src="video/video7.mp4"  type="video/mp4">
                <!--<source src="video/movie.ogg"  type="video/ogg">-->
                您的浏览器不支持 HTML5 video 标签。
            </video>
        </div>
        <p style="font-size: 14px;">
            《双影像时代，不得不重视》
        </p>
        <p style="font-size: 14px;">
            迎合市场，满足消费者！
        </p>
        <p style="font-size: 14px;">
            （精彩内容，建议：WiFi下观看，土豪随意哈）
            <img src="img/temp/img_8.jpg">
        </p>
        <p style="font-size: 14px;">
            <img src="img/temp/8.1.jpg">
        </p>
<!--        <p style="font-size: 14px;">-->
<!--            <img src="img/temp/8.2.jpg">-->
<!--        </p>-->
        <?php if($_GET['type'] == 1){ ?>
            <div class="more-news">
                欢迎收看影楼视觉新闻快播频道，想了解更多有价值的行业资讯，请扫码关注亚太佳典视频平台！
                <div class="text-center"><img src="img/temp/erweima.jpg" alt=""></div>
            </div>
        <?php }else{ ?>
            <div class="more-news">
                欢迎收看影楼视觉新闻快播频道，想了解更多有价值的行业资讯，请扫码关注亚太结婚产业视频交流平台！
                <div class="text-center"><img src="img/temp/code.jpg" alt=""></div>
            </div>
        <?php } ?>
    </div>
</article>

<?php include("footer.php");?>

<!-- jquery 2.1.4 -->
<script src="js/jquery-2.1.4.js"></script>
<!-- 搜索 -->
<script src="js/search-bar.js"></script>
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
</script>
<script type="text/javascript" src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script type="text/javascript">
    // 微信配置
    wx.config({
        debug: false,
        appId: "wx3fa8ca7d41cbbad8",
        timestamp: '<?=$timestamp?>',
        nonceStr: '<?=$wxnonceStr?>',
        signature: '<?=$wxSha1?>',
        jsApiList: ['onMenuShareTimeline', 'onMenuShareAppMessage'] // 功能列表，我们要使用JS-SDK的什么功能
    });
</script>
</body>
</html>