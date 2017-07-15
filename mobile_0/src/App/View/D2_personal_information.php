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
    <link rel="stylesheet" href="css/jquery-weui.css">
</head>
<body class="bg-gray">
<?php include("top.php");?>
<div class="member-header">
    <div class="member-info">
        <dl>
            <dt><a href="javascript:;" title=""><img src="img/temp/tx.jpg" alt=""></a></dt>
            <dd>
                <h1>代用名<span>微信号：186****8586</span></h1>
            </dd>
        </dl>
    </div>
</div>
<!--个人资料-->
<div class="add_adress weui_cells_form">
    <div class="weui_cell weui_cell_warn">
        <div class="weui_cell_hd"><label class="weui_label">昵称</label></div>
        <div class="weui_cell_bd weui_cell_primary">
            <input class="weui_input" type="tel" placeholder="18660296803">
        </div>
    </div>
    <div class="weui_cell">
        <div class="weui_cell_hd"><label class="weui_label">真实姓名</label></div>
        <div class="weui_cell_bd weui_cell_primary">
            <input class="weui_input" type="tel" placeholder="代用名">
        </div>
    </div>
    <div class="weui_cell">
        <div class="weui_cell_hd"><label for="date" class="weui_label">性别</label></div>
        <div class="weui_cell_bd weui_cell_primary">
            <input class="weui_input" id="sex" type="text" placeholder="请选择性别">
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
    <div class="weui_cell">
        <div class="weui_cell_bd weui_cell_primary">
            <div class="weui_uploader up-con">
                <div class="weui_uploader_hd weui_cell">
                    <div class="weui_cell_bd weui_cell_primary"><label class="weui_label">头像</label></div>
<!--                    <div class="weui_cell_ft">0/4</div>-->
                </div>
                <div class="weui_uploader_bd pos-inhert">
<!--                    <ul class="weui_uploader_files">-->
<!--                        <li class="weui_uploader_file weui_uploader_pos" style="background-image:url(http://shp.qpic.cn/weixinsrc_pic/pScBR7sbqjOBJomcuvVJ6iacVrbMJaoJZkFUIq4nzQZUIqzTKziam7ibg/)">-->
<!--                            <div class="pos-top">-->
<!--                                <i class="icon-close"></i>-->
<!--                            </div>-->
<!--                        </li>-->
<!--                        <li class="weui_uploader_file weui_uploader_status" style="background-image:url(http://shp.qpic.cn/weixinsrc_pic/pScBR7sbqjOBJomcuvVJ6iacVrbMJaoJZkFUIq4nzQZUIqzTKziam7ibg/)">-->
<!--                            <div class="weui_uploader_status_content">-->
<!--                                <i class="weui_icon_warn"></i>-->
<!--                            </div>-->
<!--                        </li>-->
<!--                        <li class="weui_uploader_file weui_uploader_status" style="background-image:url(http://shp.qpic.cn/weixinsrc_pic/pScBR7sbqjOBJomcuvVJ6iacVrbMJaoJZkFUIq4nzQZUIqzTKziam7ibg/)">-->
<!--                            <div class="weui_uploader_status_content">50%</div>-->
<!--                        </li>-->
<!--                    </ul>-->
                    <ul class="weui_uploader_files">
                        <li class="weui_uploader_file weui_uploader_pos" style="background-image:url(http://shp.qpic.cn/weixinsrc_pic/pScBR7sbqjOBJomcuvVJ6iacVrbMJaoJZkFUIq4nzQZUIqzTKziam7ibg/)">
                            <div class="pos-top">
                                <div class="weui_uploader_input_wrp">
                                    <input class="weui_uploader_input" type="file" accept="image/jpg,image/jpeg,image/png,image/gif" multiple>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <div class="weui_uploader_input_wrp">
                        <input class="weui_uploader_input" type="file" accept="image/jpg,image/jpeg,image/png,image/gif" multiple>
                    </div>
<!--                    <h2>请上传证件照，最多可上传四张</h2>-->
                </div>
            </div>
        </div>
    </div>
</div>
<div class="search_height"></div>
<div class="app-btn">
    <a href="javascript:;" id="save-info">保存</a>
</div>

<!-- jquery 2.1.4 -->
<script src="js/jquery-2.1.4.js"></script>
<!-- 对话框 -->
<script src="js/modal.js"></script>
<script src="js/toast.js"></script>
<!-- 搜索 -->
<script src="js/search-bar.js"></script>
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

    <!--上方点击弹出-->
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
    $("#sex").picker({
        title: "请选择您的手机",
        cols: [
            {
                textAlign: 'center',
                values: ['男', '女', '保密']
            }
        ],
        onChange: function(p, v, dv) {
            console.log(p, v, dv);
        },
        onClose: function(p, v, d) {
            console.log("close");
        }
    });
</script>

</body>
</html>