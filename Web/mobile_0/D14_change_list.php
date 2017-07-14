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
    <link rel="stylesheet" href="css/weui.min.css">
    <link rel="stylesheet" href="css/weui.css">
    <link rel="stylesheet" href="css/jquery-weui.css">
</head>
<body  class="bg-gray">
<?php include("top.php");?>
<!-- 课程详情 -->
<div class="change-list all-min-height">
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
    <div class="change-list-item">
        <div class="list-title">
           2017 -02 -08 11:24:00&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;兑换单号：1004219766
        </div>
        <div class="list-content">
            <div class="list-content-left">
                <img src="img/temp/news_3.jpg" alt="图片">
            </div>
            <div class="list-content-right">
                <p>世界是数字的【书】</p>
                <div>
                    <span>490</span>积分兑
                </div>
                <p class="font-red">未领取</p>
            </div>
        </div>
        <div class="list-footer">
        <p>消费积分：<span class="font-red">490</span></p>
        </div>
    </div>
    <div class="change-list-item">
        <div class="list-title">
           2017 -02 -08 11:24:00&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;兑换单号：1004219766
        </div>
        <div class="list-content">
            <div class="list-content-left">
                <img src="img/temp/news_3.jpg" alt="图片">
            </div>
            <div class="list-content-right">
                <p>世界是数字的【书】</p>
                <div>
                    <span>490</span>积分兑
                </div>
                <p class="font-red">未领取</p>
            </div>
        </div>
        <div class="list-footer">
        <p>消费积分：<span class="font-red">490</span></p>
        </div>
    </div>
</div>

<?php include("footer.php");?>

<!-- jquery 2.1.4 -->
<script src="js/jquery-2.1.4.js"></script>
<script src="js/jquery-weui.js"></script>
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
    // 上方点击弹出
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
</script>

</body>
</html>