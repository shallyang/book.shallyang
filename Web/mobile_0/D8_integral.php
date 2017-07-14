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
        <a class="weui-navbar__item weui-bar__item--on" href="#tab1">我的积分</a>
        <a class="weui-navbar__item" href="#tab2">积分规则</a>
        <a class="weui-navbar__item" href="#tab3">积分商城</a>
        <a class="weui-navbar__item" href="#tab4">兑换记录</a>
    </div>
    <div class="weui-tab__bd integral">
        <div id="tab1" class="weui-tab__bd-item weui-tab__bd-item--active">
            <div class="tab-item">
            	<div class="weui-media-box__bd">
            		<h3 class="title">120</h3>
            		<a href="D9_integral_detail.php" class="detail">积分明细 > </a>
            		<div class="dec">
            			购买课程送<span>20</span>积分 
            		</div>
            		<a href="D9_integral_detail.php" class="more-integral">如何赚取更多积分 > </a>
            		<div class="weui-media-box__hd img-more">
                        <img class="weui-media-box__thumb" src="img/temp/hot2.jpg" alt="图片">
                    </div>
            	</div>
            </div>
        </div>
        <div id="tab2" class="weui-tab__bd-item">
            <div class="tab-item">
            	<div class="weui-media-box__bd">            		
            		<div class="item-text">
            			<span>* </span> 加入课程送<span class="em">10</span>个积分
            		</div>
            		<div class="item-text">
            			<span>* </span> 加入课程送<span class="em">10</span>个积分
            		</div>
            		<div class="item-text">
            			<span>* </span> 加入课程送<span class="em">10</span>个积分
            		</div>
            		<div class="item-text">
            			<span>* </span> 加入课程送<span class="em">10</span>个积分
            		</div>
            		<div class="weui-media-box__hd img-more">
                        <img class="weui-media-box__thumb" src="img/temp/hot2.jpg" alt="图片">
                    </div>
            	</div>
            </div>
        </div>
        <div id="tab3" class="weui-tab__bd-item">
            <div class="tab-item-product">
            	<h3 class="product-title">实物商品</h3>
            	<div class="weui-media-box__bd">	
            		<ul class="clearfix">
            			<li class="one-item">
            				<a href="D12_product_detail.php">
            					<img src="img/temp/333.jpg" alt="图片">
            					<div class="one-item-text">
            						婚庆策划与主持
            						<p>【电子书】</p>
            					</div>
            				</a>
            				<a href="D13_change_detail.php">
            					<div class="one-item-btn">
            						<span>190</span>积分兑
            					</div>
            				</a>
            			</li>
            			<li class="one-item">
            				<a href="D12_product_detail.php">
            					<img src="img/temp/news_3.jpg" alt="图片">
            					<div class="one-item-text">
            						婚庆策划与主持
            						<p>【电子书】</p>
            					</div>
            				</a>
            				<a href="D13_change_detail.php">
            					<div class="one-item-btn">
            						<span>190</span>积分兑
            					</div>
            				</a>
            			</li>
            			<li class="one-item">
            				<a href="D12_product_detail.php">
            					<img src="img/temp/news_3.jpg" alt="图片">
            					<div class="one-item-text">
            						婚庆策划与主持
            						<p>【电子书】</p>
            					</div>
            				</a>
            				<a href="D13_change_detail.php">
            					<div class="one-item-btn">
            						<span>190</span>积分兑
            					</div>
            				</a>
            			</li>
            			<li class="one-item">
            				<a href="D12_product_detail.php">
            					<img src="img/temp/news_3.jpg" alt="图片">
            					<div class="one-item-text">
            						婚庆策划与主持
            						<p>【电子书】</p>
            					</div>
            				</a>
            				<a href="D13_change_detail.php">
            					<div class="one-item-btn">
            						<span>190</span>积分兑
            					</div>
            				</a>
            			</li>
            		</ul>
            	</div>
            </div>
            <div class="weui-infinite-scroll">
                <div class="infinite-preloader"></div>
                正在加载
            </div>
        </div>
        <div id="tab4" class="weui-tab__bd-item">
    		<table  cellspacing="0" width="96%">
            	<tbody>
            		<tr>
            			<td>兑换内容：世界是熟悉的</td>
            		</tr>
            		<tr>
            			<td>兑换积分：490</td>
            		</tr>
            		<tr>
            			<td>兑换时间：2017-02-08 11:24:00</td>
            		</tr>
            		<tr>
            			<td>状&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;态：未领取</td>
            		</tr>
            	</tbody>
            </table>
            
        </div>
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
    // 上方点击弹出
    $(document).ready(function(){
        $("#show").click(function(){
            $(".dropdown-list").toggle(500);
        });
        $("#show").blur(function(){
            $(".dropdown-list").toggle(500);
        });
		//设置中间内容区最小高度
		var allHeight = $(window).height();
		var headerHeight = $('.top-height').height() + 1;
		var weuiHeight = $(".weui-tab").height();
		var weuiFooterHeight = 40;
		if((headerHeight + weuiHeight) < allHeight){
			$(".weui-tab").css('min-height',allHeight - headerHeight - weuiFooterHeight +'px');
		}
    });
    //滚动加载
    var loading = false;
    $(document.body).infinite().on("infinite", function() {
        if(loading) return;
        loading = true;
        setTimeout(function() {
            $("#tab3 ul").append('<li class="one-item">'+
					'<a href="D12_product_detail.php">'+
						'<img src="img/temp/news_3.jpg" alt="图片">'+
						'<div class="one-item-text">'+
							'婚庆策划与主持'+
							'<p>【电子书】</p>'+
						'</div>'+
					'</a>'+
					'<a href="D13_change_detail.php">'+
						'<div class="one-item-btn">'+
							'<span>190</span>积分兑'+
						'</div>'+
					'</a>'+
				'</li>'+
				'<li class="one-item">'+
					'<a href="D12_product_detail.php">'+
						'<img src="img/temp/news_3.jpg" alt="图片">'+
						'<div class="one-item-text">'+
							'婚庆策划与主持'+
							'<p>【电子书】</p>'+
						'</div>'+
					'</a>'+
					'<a href="D13_change_detail.php">'+
						'<div class="one-item-btn">'+
							'<span>190</span>积分兑'+
						'</div>'+
					'</a>'+
				'</li>'+ 
				'<li class="one-item">'+
					'<a href="D12_product_detail.php">'+
						'<img src="img/temp/news_3.jpg" alt="图片">'+
						'<div class="one-item-text">'+
							'婚庆策划与主持'+
							'<p>【电子书】</p>'+
						'</div>'+
					'</a>'+
					'<a href="D13_change_detail.php">'+
						'<div class="one-item-btn">'+
							'<span>190</span>积分兑'+
						'</div>'+
					'</a>'+
				'</li>'+
				'<li class="one-item">'+
					'<a href="D12_product_detail.php">'+
						'<img src="img/temp/news_3.jpg" alt="图片">'+
						'<div class="one-item-text">'+
							'婚庆策划与主持'+
							'<p>【电子书】</p>'+
						'</div>'+
					'</a>'+
					'<a href="D13_change_detail.php">'+
						'<div class="one-item-btn">'+
							'<span>190</span>积分兑'+
						'</div>'+
					'</a>'+
				'</li>');
            loading = false;
        }, 1500);
    });

</script>

</body>
</html>
