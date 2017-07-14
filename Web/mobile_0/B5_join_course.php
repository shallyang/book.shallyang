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
    <style type="text/css">
        .weui-media-box:before{
            border-top: none;
        }
        .join-li{
            background-color: #f9fbfd;
            border-bottom: 4px solid #f1f1f1;
        }
        .join-li2{
            border-bottom: 1px solid #e9e8e8;
            padding: 5px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
<?php include("top.php");?>
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
<!-- 课程详情 -->
<div class="weui-tab">
    <div class="weui-navbar">
        <a class="weui-navbar__item weui-bar__item--on" href="#tab1">详情</a>
        <a class="weui-navbar__item" href="#tab2">目录</a>
        <a class="weui-navbar__item" href="#tab3">评价</a>
    </div>
    <div class="weui-tab__bd">
        <div id="tab1" class="weui-tab__bd-item weui-tab__bd-item--active">
            <div class="weui-media-box weui-media-box_appmsg">
                <div class="weui-media-box__bd">
                    <h4 class="weui-media-box__title">女人必看的化妆教程</h4>
                    <p class="weui-media-box__desc">
                        <span><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-empty"></i> 4</span>
                        <span>44271人学过</span>
                        <small>免费</small>
                        <span class="icons">
                            <a href="javascript:;" class="wechat"><i class="icon-wechat"></i></a>
                            <a href="javascript:;" class="heart"><i class="icon-heart"></i></a>
<!--                            <a href="javascript:;" class="heart font-red"><i class="icon-heart"></i></a>-->
                        </span>
                    </p>
                </div>
            </div>
            <div class="weui-media-box weui-media-box_text teacher-list">
                <h4 class="weui-media-box__title">机构讲师</h4>
                <div class="weui-media-box__desc">
                    <div class="card">
                        <div class="portrait"><img src="img/temp/1.jpg" alt=""></div>
                        <div class="info">
                            <h6>Wendy</h6>
                            <span>好评度 -</span>
                            <span>课程数 36</span>
                            <span>学生数 8 万</span>
                        </div>
                    </div>
                    钛网校首席美容美发讲师，培训总监2012年亚洲化妆发型大赛日常盘发组冠军，日常化妆组亚军，年度金奖作品
                </div>
            </div>
            <div class="weui-media-box weui-media-box_text">
                <h4 class="weui-media-box__title">概述</h4>
                <p class="weui-media-box__desc">人丑还素颜？活该你单身！看脸的时代，女神就是要会“妆”！《五分钟学会化妆》零基础入门，手残星人必备良品，约会妆、白领妆、OL妆、烟熏...更多</p>
            </div>
            <div class="weui-media-box weui-media-box_text">
                <h4 class="weui-media-box__title">适合人群</h4>
                <p class="weui-media-box__desc">白领，小白，零基础，妇女，美妆达人</p>
            </div>
            <a href="javascript:;" class="weui-btn weui-btn_warn open-popup" data-target="#full">加入学习</a>
        </div>
        <div id="tab2" class="weui-tab__bd-item">
            <div class="weui-panel">
                <div class="weui-panel__hd">章节1：生活OL妆</div>
                <div class="weui-panel__bd">
                    <div class="weui-media-box weui-media-box_small-appmsg">
                        <div class="weui-cells">
                            <a class="weui-cell weui-cell_access" href="javascript:;">
                                <div class="weui-cell__hd"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAC4AAAAuCAMAAABgZ9sFAAAAVFBMVEXx8fHMzMzr6+vn5+fv7+/t7e3d3d2+vr7W1tbHx8eysrKdnZ3p6enk5OTR0dG7u7u3t7ejo6PY2Njh4eHf39/T09PExMSvr6+goKCqqqqnp6e4uLgcLY/OAAAAnklEQVRIx+3RSRLDIAxE0QYhAbGZPNu5/z0zrXHiqiz5W72FqhqtVuuXAl3iOV7iPV/iSsAqZa9BS7YOmMXnNNX4TWGxRMn3R6SxRNgy0bzXOW8EBO8SAClsPdB3psqlvG+Lw7ONXg/pTld52BjgSSkA3PV2OOemjIDcZQWgVvONw60q7sIpR38EnHPSMDQ4MjDjLPozhAkGrVbr/z0ANjAF4AcbXmYAAAAASUVORK5CYII=" alt="" style="width:20px;margin-right:5px;display:block"></div>
                                <div class="weui-cell__bd weui-cell_primary">
                                    <p>1、时尚逛街妆</p>
                                </div>
                            </a>
                            <a class="weui-cell weui-cell_access" href="javascript:;">
                                <div class="weui-cell__hd"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAC4AAAAuCAMAAABgZ9sFAAAAVFBMVEXx8fHMzMzr6+vn5+fv7+/t7e3d3d2+vr7W1tbHx8eysrKdnZ3p6enk5OTR0dG7u7u3t7ejo6PY2Njh4eHf39/T09PExMSvr6+goKCqqqqnp6e4uLgcLY/OAAAAnklEQVRIx+3RSRLDIAxE0QYhAbGZPNu5/z0zrXHiqiz5W72FqhqtVuuXAl3iOV7iPV/iSsAqZa9BS7YOmMXnNNX4TWGxRMn3R6SxRNgy0bzXOW8EBO8SAClsPdB3psqlvG+Lw7ONXg/pTld52BjgSSkA3PV2OOemjIDcZQWgVvONw60q7sIpR38EnHPSMDQ4MjDjLPozhAkGrVbr/z0ANjAF4AcbXmYAAAAASUVORK5CYII=" alt="" style="width:20px;margin-right:5px;display:block"></div>
                                <div class="weui-cell__bd weui-cell_primary">
                                    <p>2、自然运动妆</p>
                                </div>
                            </a>
                            <a class="weui-cell weui-cell_access" href="javascript:;">
                                <div class="weui-cell__hd"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAC4AAAAuCAMAAABgZ9sFAAAAVFBMVEXx8fHMzMzr6+vn5+fv7+/t7e3d3d2+vr7W1tbHx8eysrKdnZ3p6enk5OTR0dG7u7u3t7ejo6PY2Njh4eHf39/T09PExMSvr6+goKCqqqqnp6e4uLgcLY/OAAAAnklEQVRIx+3RSRLDIAxE0QYhAbGZPNu5/z0zrXHiqiz5W72FqhqtVuuXAl3iOV7iPV/iSsAqZa9BS7YOmMXnNNX4TWGxRMn3R6SxRNgy0bzXOW8EBO8SAClsPdB3psqlvG+Lw7ONXg/pTld52BjgSSkA3PV2OOemjIDcZQWgVvONw60q7sIpR38EnHPSMDQ4MjDjLPozhAkGrVbr/z0ANjAF4AcbXmYAAAAASUVORK5CYII=" alt="" style="width:20px;margin-right:5px;display:block"></div>
                                <div class="weui-cell__bd weui-cell_primary">
                                    <p>3、五分钟日常生活妆</p>
                                </div>
                            </a>
                            <a class="weui-cell weui-cell_access" href="javascript:;">
                                <div class="weui-cell__hd"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAC4AAAAuCAMAAABgZ9sFAAAAVFBMVEXx8fHMzMzr6+vn5+fv7+/t7e3d3d2+vr7W1tbHx8eysrKdnZ3p6enk5OTR0dG7u7u3t7ejo6PY2Njh4eHf39/T09PExMSvr6+goKCqqqqnp6e4uLgcLY/OAAAAnklEQVRIx+3RSRLDIAxE0QYhAbGZPNu5/z0zrXHiqiz5W72FqhqtVuuXAl3iOV7iPV/iSsAqZa9BS7YOmMXnNNX4TWGxRMn3R6SxRNgy0bzXOW8EBO8SAClsPdB3psqlvG+Lw7ONXg/pTld52BjgSSkA3PV2OOemjIDcZQWgVvONw60q7sIpR38EnHPSMDQ4MjDjLPozhAkGrVbr/z0ANjAF4AcbXmYAAAAASUVORK5CYII=" alt="" style="width:20px;margin-right:5px;display:block"></div>
                                <div class="weui-cell__bd weui-cell_primary">
                                    <p>4、白领polo妆</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="weui-panel__hd">章节2：新娘妆</div>
                <div class="weui-panel__bd">
                    <div class="weui-media-box weui-media-box_small-appmsg">
                        <div class="weui-cells">
                            <a class="weui-cell weui-cell_access" href="javascript:;">
                                <div class="weui-cell__hd"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAC4AAAAuCAMAAABgZ9sFAAAAVFBMVEXx8fHMzMzr6+vn5+fv7+/t7e3d3d2+vr7W1tbHx8eysrKdnZ3p6enk5OTR0dG7u7u3t7ejo6PY2Njh4eHf39/T09PExMSvr6+goKCqqqqnp6e4uLgcLY/OAAAAnklEQVRIx+3RSRLDIAxE0QYhAbGZPNu5/z0zrXHiqiz5W72FqhqtVuuXAl3iOV7iPV/iSsAqZa9BS7YOmMXnNNX4TWGxRMn3R6SxRNgy0bzXOW8EBO8SAClsPdB3psqlvG+Lw7ONXg/pTld52BjgSSkA3PV2OOemjIDcZQWgVvONw60q7sIpR38EnHPSMDQ4MjDjLPozhAkGrVbr/z0ANjAF4AcbXmYAAAAASUVORK5CYII=" alt="" style="width:20px;margin-right:5px;display:block"></div>
                                <div class="weui-cell__bd weui-cell_primary">
                                    <p>1、新娘妆前护肤</p>
                                </div>
                            </a>
                            <a class="weui-cell weui-cell_access" href="javascript:;">
                                <div class="weui-cell__hd"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAC4AAAAuCAMAAABgZ9sFAAAAVFBMVEXx8fHMzMzr6+vn5+fv7+/t7e3d3d2+vr7W1tbHx8eysrKdnZ3p6enk5OTR0dG7u7u3t7ejo6PY2Njh4eHf39/T09PExMSvr6+goKCqqqqnp6e4uLgcLY/OAAAAnklEQVRIx+3RSRLDIAxE0QYhAbGZPNu5/z0zrXHiqiz5W72FqhqtVuuXAl3iOV7iPV/iSsAqZa9BS7YOmMXnNNX4TWGxRMn3R6SxRNgy0bzXOW8EBO8SAClsPdB3psqlvG+Lw7ONXg/pTld52BjgSSkA3PV2OOemjIDcZQWgVvONw60q7sIpR38EnHPSMDQ4MjDjLPozhAkGrVbr/z0ANjAF4AcbXmYAAAAASUVORK5CYII=" alt="" style="width:20px;margin-right:5px;display:block"></div>
                                <div class="weui-cell__bd weui-cell_primary">
                                    <p>2、花环浪漫新娘妆</p>
                                </div>
                            </a>
                            <a class="weui-cell weui-cell_access" href="javascript:;">
                                <div class="weui-cell__hd"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAC4AAAAuCAMAAABgZ9sFAAAAVFBMVEXx8fHMzMzr6+vn5+fv7+/t7e3d3d2+vr7W1tbHx8eysrKdnZ3p6enk5OTR0dG7u7u3t7ejo6PY2Njh4eHf39/T09PExMSvr6+goKCqqqqnp6e4uLgcLY/OAAAAnklEQVRIx+3RSRLDIAxE0QYhAbGZPNu5/z0zrXHiqiz5W72FqhqtVuuXAl3iOV7iPV/iSsAqZa9BS7YOmMXnNNX4TWGxRMn3R6SxRNgy0bzXOW8EBO8SAClsPdB3psqlvG+Lw7ONXg/pTld52BjgSSkA3PV2OOemjIDcZQWgVvONw60q7sIpR38EnHPSMDQ4MjDjLPozhAkGrVbr/z0ANjAF4AcbXmYAAAAASUVORK5CYII=" alt="" style="width:20px;margin-right:5px;display:block"></div>
                                <div class="weui-cell__bd weui-cell_primary">
                                    <p>3、2016春季阿玛尼同款新娘妆</p>
                                </div>
                            </a>
                            <a class="weui-cell weui-cell_access" href="javascript:;">
                                <div class="weui-cell__hd"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAC4AAAAuCAMAAABgZ9sFAAAAVFBMVEXx8fHMzMzr6+vn5+fv7+/t7e3d3d2+vr7W1tbHx8eysrKdnZ3p6enk5OTR0dG7u7u3t7ejo6PY2Njh4eHf39/T09PExMSvr6+goKCqqqqnp6e4uLgcLY/OAAAAnklEQVRIx+3RSRLDIAxE0QYhAbGZPNu5/z0zrXHiqiz5W72FqhqtVuuXAl3iOV7iPV/iSsAqZa9BS7YOmMXnNNX4TWGxRMn3R6SxRNgy0bzXOW8EBO8SAClsPdB3psqlvG+Lw7ONXg/pTld52BjgSSkA3PV2OOemjIDcZQWgVvONw60q7sIpR38EnHPSMDQ4MjDjLPozhAkGrVbr/z0ANjAF4AcbXmYAAAAASUVORK5CYII=" alt="" style="width:20px;margin-right:5px;display:block"></div>
                                <div class="weui-cell__bd weui-cell_primary">
                                    <p>4、韩式唯美新娘妆</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="tab3" class="weui-tab__bd-item infinite">
            <div class="common-list weui-panel__bd">
                <!-- 写评价 -->
                <div class="common-edit">
                    <h5>评价该课程<a href="javascript:;" class="pull-right open-popup" data-target="#half">编辑</a></h5>
                    <p><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-empty"></i></p>
                </div>

                <div class="weui-media-box weui-media-box_appmsg">
                    <div class="weui-media-box__hd">
                        <img class="weui-media-box__thumb" src="img/temp/1.jpg" alt="">
                    </div>
                    <div class="weui-media-box__bd">
                        <h4 class="weui-media-box__title">荒野90</h4>
                        <p class="weui-media-box__desc">必须好评</p>
                        <div class="icons">
                            <small>1月17日</small>
                            <small><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-empty"></i></small>
                        </div>
                    </div>
                </div>
                <div class="weui-media-box weui-media-box_appmsg">
                    <div class="weui-media-box__hd">
                        <img class="weui-media-box__thumb" src="img/temp/1.jpg" alt="">
                    </div>
                    <div class="weui-media-box__bd">
                        <h4 class="weui-media-box__title">荒野90</h4>
                        <p class="weui-media-box__desc">必须好评</p>
                        <div class="icons">
                            <small>1月17日</small>
                            <small><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-empty"></i></small>
                        </div>
                    </div>
                </div>
                <div class="weui-media-box weui-media-box_appmsg">
                    <div class="weui-media-box__hd">
                        <img class="weui-media-box__thumb" src="img/temp/1.jpg" alt="">
                    </div>
                    <div class="weui-media-box__bd">
                        <h4 class="weui-media-box__title">荒野90</h4>
                        <p class="weui-media-box__desc">必须好评</p>
                        <div class="icons">
                            <small>1月17日</small>
                            <small><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-empty"></i></small>
                        </div>
                    </div>
                </div>
                <div class="weui-media-box weui-media-box_appmsg">
                    <div class="weui-media-box__hd">
                        <img class="weui-media-box__thumb" src="img/temp/1.jpg" alt="">
                    </div>
                    <div class="weui-media-box__bd">
                        <h4 class="weui-media-box__title">荒野90</h4>
                        <p class="weui-media-box__desc">必须好评</p>
                        <div class="icons">
                            <small>1月17日</small>
                            <small><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-empty"></i></small>
                        </div>
                    </div>
                </div>
                <div class="weui-media-box weui-media-box_appmsg">
                    <div class="weui-media-box__hd">
                        <img class="weui-media-box__thumb" src="img/temp/1.jpg" alt="">
                    </div>
                    <div class="weui-media-box__bd">
                        <h4 class="weui-media-box__title">荒野90</h4>
                        <p class="weui-media-box__desc">必须好评</p>
                        <div class="icons">
                            <small>1月17日</small>
                            <small><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-empty"></i></small>
                        </div>
                    </div>
                </div>

            </div>
            <div class="weui-infinite-scroll">
                <div class="infinite-preloader"></div>
                正在加载...
            </div>

        </div>
    </div>
</div>

<?php include("footer.php");?>
<!-- 加入课程 pop -->
<div id="half" class="weui-popup__container popup-bottom">
    <div class="weui-popup__overlay"></div>
    <div class="weui-popup__modal weui-popup__modal-half">
        <div class="toolbar">
            <div class="toolbar-inner">
                <a href="javascript:;" class="picker-button close-popup"><i class="icon-close"></i></a>
                <span>
                    <i class="icon-star-full"></i>
                    <i class="icon-star-full"></i>
                    <i class="icon-star-full"></i>
                    <i class="icon-star-full"></i>
                    <i class="icon-star-empty"></i>
                </span>
                <span>推荐</span>
            </div>
        </div>
        <div class="modal-content">
            <div class="weui-grids">
                <textarea class="" rows="10"></textarea>
                <a href="javascript:;" id='show-alert' class="weui-btn weui-btn_plain-default" data-id="msg">保存</a>
            </div>
        </div>
    </div>
</div>
<!-- 加入学习 pop -->
<div id="full" class="weui-popup__container">
    <div class="weui-popup__overlay"></div>
    <div class="weui-popup__modal weui-popup__modal-pull">
        <div class="join-box">
            <a href="javascript:;" class="picker-button close-popup"><i class="icon-close"></i></a>
            <p>本次购买的课程仅属于各自对应的学期或有效期，请认真查看学期或课程有效时间范围，合理安排学习时间</p>
        </div>
        <div class="weui-panel__hd">机构 / 讲师</div>
        <div class="weui-panel__bd">

            <div class="weui-media-box weui-media-box_appmsg">
                <div class="weui-media-box__hd">
                    <img class="weui-media-box__thumb" src="img/temp/class5.jpg" alt="">
                </div>
                <div class="weui-media-box__bd">
                    <h4 class="weui-media-box__title">时尚彩妆基础</h4>
                    <p class="weui-media-box__desc">
                        <span>付款后365天内有效</span>
                        <small>￥19.8</small>
                    </p>
                </div>
            </div>
            <div class="weui-media-box weui-media-box_text text-right join-li">小计：¥ 198</div>
            <div class="weui-media-box weui-media-box_text text-right join-li2">总计：¥ 198</div>
            <div class="pay-amount">
                <span>实付金额：¥ 198</span>
                <a href="B10_order_list.php" class="submit-btn weui-btn_warn open-popup">提交订单</a>
            </div>
        </div>


    </div>
</div>
<!-- jquery 2.1.4 -->
<script src="js/jquery-2.1.4.js"></script>
<script src="js/jquery-weui.js"></script>
<!-- 幻灯片 -->
<script src="js/swiper.js"></script>
<script>
    //幻灯片初始化
    $(".swiper-container").swiper({
        loop: true,
        autoplay: 3000
    });
    $(document).on("click", "#show-alert", function() {
        $.alert("写完了？", "");
    });
    //滚动加载
    var loading = false;
    $(document.body).infinite().on("infinite", function() {
        if(loading) return;
        loading = true;
        setTimeout(function() {
            $(".common-list").append("<div class='weui-media-box weui-media-box_appmsg'><div class='weui-media-box__hd'><img class='weui-media-box__thumb' src='img/temp/1.jpg' alt=''></div> <div class='weui-media-box__bd'> <h4 class='weui-media-box__title'>荒野90</h4> <p class='weui-media-box__desc'>必须好评</p> <div class='icons'> <small>1月17日</small><small><i class='icon-star-full'></i><i class='icon-star-full'></i><i class='icon-star-full'></i><i class='icon-star-full'></i><i class='icon-star-empty'></i></small></div></div></div>");
            loading = false;
        }, 1500);
    });
    //pop窗口
    $(document).on("open", ".weui-popup-modal", function() {
        console.log("open popup");
    }).on("close", ".weui-popup-modal", function() {
        console.log("close popup");
    });

    // 点击变色
//    $(document).ready(function(){
//        $(".heart").click(function(){
//            if($(this).hasClass("font-red")){
//                $(".heart").css({"color":"#cfcfcf", "border":"1px solid #cfcfcf"});
//                $(this).removeClass("font-red")
//            }else{
//                $(".heart").css({"color":"#ff302d", "border":"1px solid #ff302d"});
//                $(this).addClass("font-red")
//            }
//        });
//    });

</script>

</body>
</html>