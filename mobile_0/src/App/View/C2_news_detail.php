<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>亚太结婚产业视频交流</title>
    <meta name="Keywords" content="亚太结婚产业视频交流" />
    <meta name="Description" content="亚太结婚产业视频交流" />
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
    <h1>【家·印记品鉴会特别报导】</h1>
    <div class="editor-content detail-con">
        <div class="video">
            <video controls autoplay>
                <source src="video/jiayinji.mp4"  type="video/mp4">
                <!--<source src="video/movie.ogg"  type="video/ogg">-->
                您的浏览器不支持 HTML5 video 标签。
            </video>
        </div>
        <p style="font-size: 14px;">
            【家·印记品鉴会特别报导】你在茫然，你在徘徊中，人家是在稳定中继续发展。<br><br>
            【家·印记】是以文化植根，情感营销，以影像家谱的方式，帮助消费者缔造自己特有的珍贵家族家谱，打造中国文化——家魂概念，24～25号[家·印记]
            品牌示范店启东名流婚纱摄影的首场参观品鉴会打动了现场参观的很多影楼总裁，大家都看得非常激动，数次被【家·印记】营造的影像文化概念和情感记
            录模式感动，真切感受到影楼经营确实需要转化了，婚纱摄影要长久的发展，一定要形成与消费者的情感认可，帮助消费者记录人生和家族的珍贵时刻，
            形成顾客多次消费的点和闭环概念，回归和找寻到影像存在的最宝贵价值，同时在经营上影楼应该真正的把顾客当作朋友，不仅仅是帮助消费者拍一次拍婚
            纱照，更是记录一个家族幸福和传承的开始，循环往复，次第蔓延，如此影楼才能长久经营，并且广泛传播，形成品牌，站稳市场。 [家·印记]以后每个
            月的月底都会开放一次品牌品鉴会，有兴趣的影楼总裁欢迎垂询。3月22－23日第二届品鉴会。<br><br>
            咨询:18912783099邓芸<br>
            13611775385张蕊<br>
            13393193323冯鑫<br>
            18912785199何平
        </p>
        <div class="more-news">
            欢迎收看影楼视觉新闻快播频道，想了解更多有价值的行业资讯，请扫码关注亚太结婚产业视频交流平台！
            <div class="text-center"><img src="img/temp/code.jpg" alt=""></div>
        </div>
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

</body>
</html>