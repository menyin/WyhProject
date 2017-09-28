<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:71:"F:\fabaodou\public/../application/home/view/default/public\message.html";i:1505875525;s:68:"F:\fabaodou\public/../application/home/view/default/public\base.html";i:1505977442;}*/ ?>
﻿<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?php echo $metaTitle; ?>_法保兜保险网</title>
    <meta name="keywords" content="<?php echo $metaKeywords; ?>">
    <meta name="description" content="<?php echo $metaDescription; ?>">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">

<!--     <link rel="icon" type="image/x-icon" href="favicon.ico" /> -->
    <link rel="shortcut icon" href="/favicon.ico"/>
    <link rel="bookmark" href="/favicon.ico"/>
    <link rel="stylesheet" href="__CSS__/TopBottom.css" />
    <link rel="stylesheet" href="__CSS__/cityselect.css" />
    <link rel="stylesheet" href="__CSS__/gongyong.css" />
    
		<link href="__CSS__/free.css" rel="stylesheet">

    <script>
    	document.oncontextmenu=function(e){return false;}
    </script>
</head>
<body class="no-copy">
    <!--头部-->
    <div class="top-bar">
        <div class="container">
            <div class="top-login">
                 <span id="destoon-member ">
                    <span>您好，</span>
                    <span class="top-welcome">欢迎来到<span class="color1">法保兜</span>保险网</span>
                    <span class="shu">丨</span>
                   <!--  <a href="#">
                        <span class="onecolor">【会员登陆】</span>
                    </a>
                    <span class="shu">丨</span>
                    <a href="#">
                        <span class="onecolor">【会员注册】</span>
                    </a>
                    <span class="shu">丨</span>
                    <a href="#">
                        <span class="onecolor">【忘记密码】</span>
                    </a> -->
                    <a href="javascripr:void(0)">你当前所处位置是：</a>
                    <!-- <span class="shu">丨</span> -->
                 </span>

                <span class="city">
                    <!--<input type="text" class="cityinput" id="citySelect" value="<?php echo session('location.city_name'); ?>&nbsp;&nbsp;(切换城市)">-->
                    <em type="text" class="cityinput" id="citySelect"><?php echo session('location.city_name'); ?>&nbsp;&nbsp;</em>
                    <em style="font-size: 12px;color: #ff5500">(切换城市)</em>
                </span>


            </div>
        </div>
    </div>
    <!--搜索框部分-->
    <div id="header">
        <div class="container">
            <div class="logo">
                <a href="/"><img src="__IMG__/public/logo.png" alt="兜兜虫科技"></a>
            </div>
            <!--搜索框-->
            <div class="header-serch fl">
                <form action="<?php echo url('Insurance/index'); ?>" method="GET">
                    <div class="header-selct-box">
                        <div class="header-selct-text">&nbsp;找保险</div>
                        <img src="__IMG__/public/arrow3.png" id="up-down">
                        <ul class="header-selct-opation">
                            <li>找保险</li>
                            <li>找代理人</li>
<!--                             <li>找代理人</li>
                            <li>行业资讯</li>
                            <li>保险问吧</li> -->
                        </ul>
                    </div>
                    <input type="text" class="suchfeld" placeholder="请输入关键词" ; autocomplete="off" name="title" >
                    <button class="search-btn">搜索</button>
                </form>
                <ul class="hotword">
                    <li><a>热门搜索：  </a></li>
                    <?php foreach($hotCates as $row): ?>
                    <li><a href="<?php echo $row['link']; ?>"><?php echo $row['name']; ?> </a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <a href="#" class="call-me" alt="你好保险">
                <img src="__IMG__/public/telbg.png" width="63" height="63">
                <span>
                    <p>客服电话：</p>
                    <p>159-6020-9233</p>
                </span>
            </a>


        </div>
    </div>
    <!--nav导航区域-->
    <div id="nav">
        <div class="container">
            <ul class="nav-main">
                <li><a href="/">首页</a></li>
                <li><a href="<?php echo url('home/insurance/index'); ?>">找保险</a></li>
                <li><a href="<?php echo url('home/agent/index'); ?>">找代理人</a></li>
                <li><a href="<?php echo url('home/insurance/know'); ?>">了解保险</a></li>
                <!-- <li><a href="#">保险问吧</a></li> -->
                <li><a href="<?php echo url('home/about/about'); ?>">关于平台</a></li>
            </ul>
            <ul class="nav-little">
                <!-- <li><a href="#">会员中心</a></li>
                <li><a href="#">会员服务</a></li> -->
                <li><a href="#" id="payback">支付中心</a></li>
                <li><a href="#" id="callback">联系方式</a></li>
            </ul>
        </div>
    </div>
    
    <div class="FreeIMG">
		<!-- 此处为背景大图 -->

	</div>
	<div id="FreeMade">
		<div class="container">
			<div class="FreeMade">
				<form action="" method="post" id="">
					<div class="free_main">
					<?php if($agentId > 0): ?>
						<!--预约设计师-->
						<div class="free_main_choose">
							<span>预约设计师：</span>
							<label>
								<?php echo $agent['name']; ?>
							</label>
						</div>
					<?php endif; ?>
						<input type="hidden" name="data[agent_id]" value="<?php echo $agentId; ?>" />
						<!--性别-->
						<div class="free_main_choose">
							<span>您的性别：</span>
							<label>
								<input type="radio" name="data[sex]" value="1" checked="checked" />男
							</label>
							<label>
								<input type="radio" name="data[sex]" value="2" />女
							</label>
							<label>
								<input type="radio" name="data[sex]" value="3" />保密
							</label>
						</div>
						<!--出生年月-->
						<div class="free_main_choose">
							<span>出生年月：</span>
							<span id="date">
								<select name="data[year]" id="year">
									<option value="">选择年份</option>
								</select>
								<select name="data[month]" id="month">
									<option value="">选择月份</option>
								</select>
								<select name="data[day]" id="days" class="day">
									<option value="">选择日期</option>
								</select>
							</span>
						</div>
						<!--居住地-->
						<div class="free_main_choose">
							<span>现居住地：</span>
							       <select name="data[province_id]" id="province_id" style="width:150px;">
						                <?php foreach($provinces as $k=>$row): ?>
						                    <option value="<?php echo $k; ?>"><?php echo $row; ?></option>
						                <?php endforeach; ?>
						            </select>
						            <select name="data[city_id]"  id="city_id" style="width:150px;" >
						                <option>--请选择--</option>
						            </select>
						            <select name="data[area_id]"  id="area_id" style="width:150px;" >
						                <option value="0">--请选择--</option>
						            </select>
						</div>
						<!--保障需求-->
						<div class="free_main_choose">
							<span>保险需求：</span>
							<?php foreach($needInsurances as $k=>$v): ?>
							<span><input type="checkbox" value="<?php echo $k; ?>" name="data[insurance][]"><?php echo $v; ?></span>
							<?php endforeach; ?>
						    <span class="tips">(可多选)</span>
						</div>
						<!--文字说明-->
						<div class="free_main_choose notes">
							填写联系方式，免费获取专业推荐
						</div>
						<!--称呼-->
						<div class="free_main_choose">
							<span>您的称呼：</span>
							<input type="text" placeholder="必填" name="data[name]" class="freeN"/>
						</div>
						<!--手机号码-->
						<div class="free_main_choose">
							<span>手机号码：</span>
							<input type="text" placeholder="必填" name="data[mobile]" id="mobilephone" class="freeN"/>
						</div>
							<!--验证码-->
		<!-- 				<div class="free_main_choose">
							<span>短信验证码：</span>
							<input type="text" placeholder="必填" name="data[code]" id="code" class="freeN"/> <input type="button" value="获取验证码" onclick='time(this)' class="Getyzm"/>
						</div> -->
						<div class="free_main_choose contac">
							<input type="checkbox" value="1" name="data[need]" checked="checked">安排保险人联系我
						</div>
						<div class="free_main_choose">
							<input type="submit" value="完成定制" class="finir"/>
						</div>
					</div>

				</form>
			</div>
		</div>
	</div>

    <div class="company-footer">
            <div class="container">
                <div class="links">
                    <a href="<?php echo url('home/about/about'); ?>">关于我们</a>
                    <span class="shu">丨</span>
                    <a href="<?php echo url('home/about/about'); ?>">诚征英才</a>
                    <span class="shu">丨</span>
                    <a href="<?php echo url('home/about/about'); ?>">帮助中心</a>
                    <span class="shu">丨</span>
                    <a href="<?php echo url('home/about/about'); ?>">交易条款</a>
                    <span class="shu">丨</span>
                    <a href="<?php echo url('home/about/about'); ?>">网站地图</a>
                    <span class="shu">丨</span>
                    <a herf="<?php echo url('home/index/index#yqhref'); ?>">友情链接</a>
                   <!--  <span class="shu">丨</span>
                    <a herf="javascripr:void(0)">个人中心</a> -->
                </div>
                <div class="copyright">
                    <span><em>CROPYRIGHT 2015-2017</em>  <em>兜兜虫（厦门）科技有限公司 版权所有  </em>   <em>24小时服务电话：159-6020-9233</em>  </span><br />
                    <span> <em>公司邮箱：1992355937@qq.com</em>  <em>客服QQ:1992355937</em>  <em>粤ICP备13014375号</em></span><br />
                    <span> <img src="__IMG__/public/pic.gif"></span>
                </div>
            </div>
        </div>
    <script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id='cnzz_stat_icon_1261456705'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s4.cnzz.com/z_stat.php%3Fid%3D1261456705%26show%3Dpic' type='text/javascript'%3E%3C/script%3E"));</script>

    <script>
        window.allCitiesForChange = <?php echo $allCitiesForChange; ?>;
        window.onload=function(){
                var test=new Vcity.CitySelector({input:'citySelect'});
        }

    </script>
    <script type="text/javascript" src="__JS__/jquery.js" ></script>
    <script type="text/javascript" src="__JS__/main.js" ></script>
    <script type="text/javascript" src="__JS__/ancre.js" ></script>
    <script type="text/javascript" src="__JS__/cityselect.js" ></script>
    <script type="text/javascript" src="__JS__/shouyeshurukuang.js" ></script>



<!-- <script type="text/javascript" src="__JS__/GetYzm.js" ></script> -->
<script type="text/javascript" src="__JS__/jquery.js" ></script>
<script type="text/javascript" src="__JS__/Yearselect.js"></script>
<!-- <script type="text/javascript" src="__JS__/jquery.citys.js" ></script> -->
<script type="text/javascript" src="__JS__/jquery.validate.min.js" ></script>
<script type="text/javascript" src="__JS__/free.js" ></script>
<!--调用时间选择-->
	<script type="text/javascript">
		window.onload=function(){
			$("#date").selectDate()
			$("#days").focusout(function(){
				var year = $("#year option:selected").html()
				var month = $("#month option:selected").html()
				var day = $("#days option:selected").html()
				console.log(year+month+day)
			})
		}
	</script>
<!--voildate-->
<script>
		$.validator.setDefaults({
		    submitHandler: function() {
		      alert("提交成功，我们将尽快和您联系");
		    }
		});
		$().ready(function() {
		    $("#Free").validate();
		});
</script>
<script>
	$(document).ready(function(){
		  $(".nav-main>li:eq(1)").addClass('indexon');
	})
</script>


<script>
    $("#province_id").change(function(){
    var province_id=$(this).val();
    var urlCity = "<?php echo url('Area/getCities'); ?>?id="+province_id;

    $.ajax({
        url: urlCity,
        Type:"GET",
        data:"",
        dataType:"json",
        success:function(data){
            var option1=$("<option></option>");
            $(option1).val("0");
            $(option1).html("--请选择--");
            $("#city_id").html('');
            $("#area_id").html(option1);

            $.each(data, function(i,row) {
                var option=$("<option></option>");
                $(option).val(row.id);
                $(option).html(row.name);

                $("#city_id").append(option);
            });
        }

    });
});

$("#city_id").change(function(){
    var city_id=$(this).val();
    var urlArea = "<?php echo url('Area/getAreas'); ?>?id="+city_id;

    $.ajax({
        url:urlArea,
        Type:"GET",
        data:"",
        dataType:"json",
        success:function(data){
            $("#area_id").html('');
            $.each(data, function(i,row) {
                var option=$("<option></option>");
                $(option).val(row.id);
                $(option).html(row.name);

                $("#area_id").append(option);
            });
        }
    });
});
</script>
