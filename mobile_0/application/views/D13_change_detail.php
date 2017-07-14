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
<div class="change-detail">
    <table cellspacing="0" width="100%">
        <tbody>
            <tr>
                <td width="25%">兑换单号</td>
                <td>1004219766</td>
            </tr>
            <tr>
                <td>商      品</td>
                <td>
                    <div class="change-detail-img">
                        <div class="change-detail-left">
                            <img src="img/temp/news_3.jpg" alt="图片">
                        </div>
                        <div class="change-detail-right">
                            <p>世界是数字的【书】</p>
                            <div>
                                <span>490</span>积分兑
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>商品数量</td>
                <td>1</td>
            </tr>
            <tr>
                <td>消费积分</td>
                <td class="font-red">490</td>
            </tr>
            <tr>
                <td>兑换时间</td>
                <td>2017 -02 -08 11:24:00</td>
            </tr>
        </tbody>
    </table>
    <div class="gray"></div>
    <!-- <div class="connect">
        <div>
           <label><span class="font-red">*</span>姓名</label>
           <input type="text" placeholder="请输入姓名">
        </div>
        <div>
           <label><span class="font-red">*</span>联系电话</label>
           <input type="text" placeholder="请输入联系电话">
        </div>
        <div>
           <label><span class="font-red">*</span>收货地址</label>
           <input type="text" placeholder="请输入收货地址">
        </div>
    </div> -->
    <div class="add_adress weui_cells_form">
        <div class="weui_cell weui_cell_warn">
            <div class="weui_cell_hd"><label class="weui_label">真实姓名</label></div>
            <div class="weui_cell_bd weui_cell_primary">
                <input class="weui_input" type="tel" placeholder="真实姓名">
            </div>
        </div>
        <div class="weui_cell">
            <div class="weui_cell_hd"><label for="date" class="weui_label">所在城市</label></div>
            <div class="weui_cell_bd weui_cell_primary">
                <input class="weui_input" id="end" type="text" value="" placeholder="请选择省市区" readonly="">
            </div>
        </div>
        <div class="weui_cell adress-fix">
            <div class="weui_cell_hd"><label class="weui_label">详细地址</label></div>
            <div class="weui_cell_bd weui_cell_primary">
                <textarea class="weui_textarea" placeholder="请填写详细地址，不少于5字" rows="3"></textarea>
                <div class="weui_textarea_counter"><span>0</span>/200</div>
            </div>
        </div>
    </div>
    <div class="app-btn sure">
        <a href="javascript:;" id="save-info">确认消费积分：490</a>
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
<!--地区联动-->
<script src="js/city-picker.js"></script>
<script>
    //弹出窗口内容-确认
    $(document).on("click", "#save-info", function() {
        $.confirm("", "确定要保存吗?", function() {
            $.toast("保存成功!");
        }, function() {
            //取消操作
        });
    });
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
    //地区联动
    $("#end").cityPicker({
        title: "选择省市区"
    });
</script>

</body>
</html>