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
    <link rel="stylesheet" href="css/jquery-weui.css">
</head>
<body>
<?php include("top.php");?>
<div class="roll-label">
    <ul>
        <li><a href="javascript:;">摄影</a></li>
        <li><a href="javascript:;">化妆</a></li>
        <li><a href="javascript:;">数码</a></li>
        <li><a href="javascript:;">经营</a></li>
        <li><a href="javascript:;">管理</a></li>
        <li><a href="javascript:;">营销</a></li>
        <li><a href="javascript:;">门市</a></li>
        <li><a href="javascript:;">婚庆</a></li>
        <li><a href="javascript:;">主持人</a></li>
    </ul>
</div>
<!-- 幻灯片 -->
<div class="swiper-container">
    <div class="swiper-wrapper">
        <!-- Slides -->
        <div class="swiper-slide"><img src="img/temp/banner_1.jpg" /></div>
        <div class="swiper-slide"><img src="img/temp/banner_1.jpg" /></div>
        <div class="swiper-slide"><img src="img/temp/banner_1.jpg" /></div>
    </div>
    <div class="swiper-pagination"></div>
</div>
<!-- 课程列表 -->
<div class="weui-panel weui-panel_access">
    <div class="screen weui-panel__hd">
        <span>共880门相关课程</span>
        <div class="form-inline pull-right">
            <div class="form-group">
                <label>筛选</label>
                <select class="form-control">
                    <option>全部</option>
                    <option>最热</option>
                </select>
            </div>
            <div class="form-group">
                <label>排序</label>
                <select class="form-control">
                    <option>全部</option>
                    <option>最热</option>
                </select>
            </div>
        </div>
    </div>
    <div class="weui-panel__bd">
        <a href="course_detail.php" class="weui-media-box weui-media-box_appmsg">
            <div class="weui-media-box__hd">
                <img class="weui-media-box__thumb" src="img/temp/class5.jpg" alt="">
            </div>
            <div class="weui-media-box__bd">
                <h4 class="weui-media-box__title">时尚彩妆基础</h4>
                <p class="weui-media-box__desc">
                    <span><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-empty"></i> 4</span>
                    <span>44271人学过</span>
                    <small>￥198</small>
                </p>
            </div>
        </a>
        <a href="course_detail.php" class="weui-media-box weui-media-box_appmsg">
            <div class="weui-media-box__hd">
                <img class="weui-media-box__thumb" src="img/temp/class5.jpg" alt="">
            </div>
            <div class="weui-media-box__bd">
                <h4 class="weui-media-box__title">女人必看的化妆教程</h4>
                <p class="weui-media-box__desc">
                    <span><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-empty"></i> 4</span>
                    <span>44271人学过</span>
                    <small>￥19.8</small>
                </p>
            </div>
        </a>
        <a href="course_detail.php" class="weui-media-box weui-media-box_appmsg">
            <div class="weui-media-box__hd">
                <img class="weui-media-box__thumb" src="img/temp/class5.jpg" alt="">
            </div>
            <div class="weui-media-box__bd">
                <h4 class="weui-media-box__title">化妆教程集锦--男神</h4>
                <p class="weui-media-box__desc">
                    <span><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-empty"></i> 4</span>
                    <span>44271人学过</span>
                    <small>免费</small>
                </p>
            </div>
        </a>
        <a href="course_detail.php" class="weui-media-box weui-media-box_appmsg">
            <div class="weui-media-box__hd">
                <img class="weui-media-box__thumb" src="img/temp/class5.jpg" alt="">
            </div>
            <div class="weui-media-box__bd">
                <h4 class="weui-media-box__title">女人必看的化妆教程</h4>
                <p class="weui-media-box__desc">
                    <span><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-empty"></i> 4</span>
                    <span>44271人学过</span>
                    <small>￥19.8</small>
                </p>
            </div>
        </a>
        <a href="course_detail.php" class="weui-media-box weui-media-box_appmsg">
            <div class="weui-media-box__hd">
                <img class="weui-media-box__thumb" src="img/temp/class5.jpg" alt="">
            </div>
            <div class="weui-media-box__bd">
                <h4 class="weui-media-box__title">化妆教程集锦--男神</h4>
                <p class="weui-media-box__desc">
                    <span><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-empty"></i> 4</span>
                    <span>44271人学过</span>
                    <small>免费</small>
                </p>
            </div>
        </a>
    </div>
    <!--
    <div class="weui-panel__ft">
        <a href="javascript:void(0);" class="weui-cell weui-cell_access weui-cell_link">
            <div class="weui-cell__bd">查看更多</div>
            <span class="weui-cell__ft"></span>
        </a>
    </div>
    -->
</div>

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