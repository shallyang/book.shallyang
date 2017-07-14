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
<body class="bg-gray">
<?php include("top.php");?>
<!-- 课程详情 -->
<div class="weui-tab new-tab">
    <div class="weui-navbar">
        <a class="weui-navbar__item weui-bar__item--on" href="#tab1">开课通知 <i class="icon-dot action-dot"></i></a>
        <a class="weui-navbar__item" href="#tab2">课程推送</a>
    </div>
    <div class="weui-tab__bd notice-tab">
        <div id="tab1" class="weui-tab__bd-item weui-tab__bd-item--active">
            <div class="tab-item">
            	<div class="weui-media-box__bd notice">
            		<div class="notice-text">
                        <p>摄影课程</p>
                        <p>2月10日 20:07:00</p>
                        <p>循序渐进学摄影</p>
                    </div>
                    <div class="notice-right">
                        <i class="icon-arrow-left"></i>
                    </div>
            	</div>               
            </div>
            <div class="tab-item">
                <div class="weui-media-box__bd notice">
                    <div class="notice-text">
                        <p>摄影课程</p>
                        <p>2月10日 20:07:00</p>
                        <p>循序渐进学摄影</p>
                    </div>
                    <div class="notice-right">
                        <i class="icon-arrow-left"></i>
                    </div>
                </div>               
            </div>
            <div class="notice-footer active">
                全部标记为已读
            </div>
        </div>
        <div id="tab2" class="weui-tab__bd-item">
            <div class="tab-item">
                <div class="weui-media-box__bd notice">
                    <div class="notice-text">
                        <p>摄影课程</p>
                        <p>2月10日 20:07:00</p>
                        <p>循序渐进学摄影</p>
                    </div>
                    <div class="notice-right">
                        <i class="icon-arrow-left"></i>
                    </div>
                </div>               
            </div>
            <div class="tab-item">
                <div class="weui-media-box__bd notice">
                    <div class="notice-text">
                        <p>摄影课程</p>
                        <p>2月10日 20:07:00</p>
                        <p>循序渐进学摄影</p>
                    </div>
                    <div class="notice-right">
                        <i class="icon-arrow-left"></i>
                    </div>
                </div>               
            </div>
            <div class="notice-footer">
                全部标记为已读
            </div>
        </div>
    </div>
    
</div>

<!-- <?php include("footer.php");?> -->

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
    });

</script>

</body>
</html>
