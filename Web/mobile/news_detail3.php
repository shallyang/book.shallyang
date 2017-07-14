<?=include 'wx.php';?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>本期话题—婚纱摄影产业链升级</title>
    <meta name="Keywords" content="本期话题—婚纱摄影产业链升级" />
    <meta name="Description" content="本期话题—婚纱摄影产业链升级" />
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
    <h1>本期话题—婚纱摄影产业链升级</h1>
    <div class="editor-content detail-con">
        <div class="video">
            <video controls autoplay>
                <source src="video/video4.mp4"  type="video/mp4">
                <!--<source src="video/movie.ogg"  type="video/ogg">-->
                您的浏览器不支持 HTML5 video 标签。
            </video>
        </div>
        <p style="font-size: 14px;">
            影楼行业一直是比较单一经营模式，随着产业结构不断调整，新人对影楼的要求不断提升，不少影楼经营者也意识到产业升级的重要性与必要性，但实际运营过程的结果差强人意。许多走在前沿的影楼都在全面地进行品牌产业升级，让婚纱摄影形成多元化发展的方向；在本期节目我们特邀行业资深的礼服销售专家陈建华老师—婚品汇的运营总监，听听他对婚纱影楼产业链升级礼服版块运营的独到见解。
        </p>
        <p style="font-size: 14px;">
            希望本期分享的一个影楼产业升级非常成功的案例，能够帮助您，提升您的经营思路。
        </p>
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