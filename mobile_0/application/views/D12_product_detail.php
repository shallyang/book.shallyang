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
<div class="detail">
    <div class="detail-img">
    	<img src="img/temp/news_3.jpg" alt="图片">
    </div>
    <h3>世界是数字的【书】</h3>
    <div class="detail-introduction">
    	<p>【美】 Brian W.Kernighan</p>
    	<p>《世界是数字的》(作者柯林汉)简明扼要但又深入全面地解释了计算机和通信系统背后的秘密，旨在让没有技术背景的读者*好地理解自己生活的这个数字世界。这本书解释了如今计算和通信的运作方式，包括硬件、软件、互联网，还有万维网，同时还探讨了新技术引发的社会、政治和法律问题，让你明白现实当中的一些难题和迫不得已的折中。</p>
    </div>
    <div class="detail-bottom">
    	<span class="font-red">490</span> 积分     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>已有积分：20</span>
    	<p class="shapping">【纯积分兑换商品邮费自付  快递公司  中通】</p>
    	<div class="detail-bottom-change">
    		<div class="change active">
    			马上兑换
    		</div>
    		<span>提示：您当前积分不足</span>
    	</div>
    </div>
    <h4>商品介绍</h4>
    <div class="introduction">
    	<p class="title">内容介绍</p>
    	<p>
    		家用电器、汽车、飞机、相机、手机、GPs导航 仪，还有游戏机，虽然你看不见，但这些设备都有计 算能力。手机通信网络、有线电视网络、空中交通管 制系统、电力系统、银行和金融服务系统等基础设施 背后无一不是计算机在支撑。如今的世界是数字的， 而计算机和计算无处不在。这本《世界是数字的》就 是要告诉大家数字世界有关计算机的一切。《世界是 数字的》(作者柯林汉)没有高深莫测的专业术语，但 它全面解释了当今计算和通信领域的工作方式，包括 硬件、软件、互联网、通信和数据安全，并且讨论了 新技术带来的社会、政治和法律问题
    	</p>
    	<p>
    		无论你有没有计算机背景，无论你从事什么职业 ，只要你认同自己生活在数字时代，这本书就是必读的！
    	</p>
    </div>
    <div class="introduction">
    	<p class="title">作者介绍</p>
    	<p>
    		家用电器、汽车、飞机、相机、手机、GPs导航 仪，还有游戏机，虽然你看不见，但这些设备都有计 算能力。手机通信网络、有线电视网络、空中交通管 制系统、电力系统、银行和金融服务系统等基础设施 背后无一不是计算机在支撑。如今的世界是数字的， 而计算机和计算无处不在。这本《世界是数字的》就 是要告诉大家数字世界有关计算机的一切。《世界是 数字的》(作者柯林汉)没有高深莫测的专业术语，但 它全面解释了当今计算和通信领域的工作方式，包括 硬件、软件、互联网、通信和数据安全，并且讨论了 新技术带来的社会、政治和法律问题
    	</p>
    	<p>
    		无论你有没有计算机背景，无论你从事什么职业 ，只要你认同自己生活在数字时代，这本书就是必读的！
    	</p>
    </div>
    <div class="list">
    	<p class="title">目录</p>
    	<p>开篇语／1</p>
    	<p>任何足够先进的技术都与魔术无异。——阿瑟·C．克拉克，“技术及未来前景”，《三号行星的报告》，1972年</p>
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
    });
</script>

</body>
</html>