<?=include 'wx.php';?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>首届虎丘婚纱城【虎丘杯】亚洲地区样片创新大赛</title>
    <meta name="Keywords" content="首届虎丘婚纱城【虎丘杯】亚洲地区样片创新大赛" />
    <meta name="Description" content="首届虎丘婚纱城【虎丘杯】亚洲地区样片创新大赛" />
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
    <h1>首届虎丘婚纱城【虎丘杯】亚洲地区样片创新大赛</h1>
    <div class="editor-content detail-con">
        <div class="video">
            <video controls autoplay>
                <source src="video/mov.mp4"  type="video/mp4">
                <!--<source src="video/movie.ogg"  type="video/ogg">-->
                您的浏览器不支持 HTML5 video 标签。
            </video>
        </div>
        <p style="font-size: 14px;">
            首届虎丘婚纱城【虎丘杯】亚洲地区样片创新大赛，来自全国及台湾、韩国等20位大伽样片老师，历经二个月的研发，给业界带来2017最具卖相的代表作品。
            20位参赛摄影师有黄超、杨勇、苏剑南、徐尚、陈明、田砹、马正、荣江鹏、冯世华、姜常慧、王明光、周海林、王晨、孙小丰、李俊行（韩国）、关健、
            孙向楠、刘荆、董宇，主办方虎丘婚纱城更提供了高额的奖励，所有样片在2月20－21日虎丘婚纱城A座的喜宫商城来展出及颁奖，总监制黄飞鸿，化妆
            造型总顾问晴晴老师，【苏州虎丘婚纱城喜宫集团这次不参加上海展会，省下投入成本，以超优惠的低额价格，来回馈给有兴趣的影楼选购】现在电话登记到现场采购另有2套服装免费送！
            <br><br>
            不会有，不再有。。。<br><br>
            巅峰20强，获奖作品，火爆销售中。。。
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