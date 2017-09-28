<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:72:"F:\fabaodou\public/../application/home/view/default/insurance\index.html";i:1505985985;s:68:"F:\fabaodou\public/../application/home/view/default/public\base.html";i:1506066801;}*/ ?>
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
		<link rel="shortcut icon" href="/favicon.ico" />
		<link rel="bookmark" href="/favicon.ico" />
		<link rel="stylesheet" href="__CSS__/TopBottom.css" />
		<link rel="stylesheet" href="__CSS__/cityselect.css" />
		<link rel="stylesheet" href="__CSS__/gongyong.css" />
		<link 
<link rel="stylesheet" href="__CSS__/find-insure.css" />  <script> document.oncontextmenu=function(e){return false;}
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
					<span class="callPay">
						<a href="javascript:;" id="payback">支付中心</a>
						<a href="javascript:;" id="callback">联系方式</a>
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
								<!--<li>找代理人</li>
                            	<li>行业资讯</li>
                            	<li>保险问吧</li> -->
							</ul>
						</div>
						<input type="text" class="suchfeld" placeholder="请输入关键词" ; autocomplete="off" name="title">
						<button class="search-btn">搜索</button>
					</form>
					<ul class="hotword">
						<li>
							<a>热门搜索： </a>
						</li>
						<?php foreach($hotCates as $row): ?>
						<li>
							<a href="<?php echo $row['link']; ?>"><?php echo $row['name']; ?> </a>
						</li>
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
				<ul class="nav-main ">
					<li>
						<a href="/">首   页</a>
					</li>
					<li>
						<a href="<?php echo url('home/insurance/index'); ?>">找保险</a>
					</li>
					<li>
						<a href="<?php echo url('home/agent/index'); ?>">找代理人</a>
					</li>
					<li>
						<a href="<?php echo url('home/program/program'); ?>">保险方案</a>
					</li>
					<li>
						<a href="<?php echo url('home/insurance/know'); ?>">保险资讯</a>
					</li>
					<!--<li><a href="#">保险问吧</a></li> 
					<li><a href="#">签单分享</a></li> -->
					<li><a href="<?php echo url('home/about/about'); ?>">关于平台</a></li> 
				</ul>
				<ul class="nav-little">
					<!-- <li><a href="#">会员中心</a></li>
                <li><a href="#">会员服务</a></li> -->
					
				</ul>
			</div>
		</div>
		
<!-- 头部区域开始-->
<div id="top">
	<div class="container">
		<div class="top">
			<div class="top-left fl">
				<span class="choose-zone">保险分类</span>
			</div>
		</div>
	</div>
</div>
<!-- 头部区域结束-->
<!--选择区域-->
<div id="condition">
	<div class="container">
		<div class="condition">
			<ul class="condition-choose1">
				<span>投保对象：</span >
		 				<?php foreach($group as $row): ?>
		 				<li <?php if($row['id'] == \think\Request::instance()->get('group_id')): ?>class="condition-on"<?php endif; ?>><a href="<?php echo $row['link']; ?>"><?php echo $row['name']; ?></a></li>
		 				<?php endforeach; ?>
		 			</ul>
		 			<ul class="condition-choose2">
		 				<span>投保年龄：</span> <?php foreach($age as $row): ?>
				<li <?php if($row['id'] == \think\Request::instance()->get('age_id')): ?>class="condition-on" <?php endif; ?>>
					<a href="<?php echo $row['link']; ?>"><?php echo $row['name']; ?></a>
				</li>
				<?php endforeach; ?>
			</ul>
			<ul class="condition-choose3">
				<span>人身保险：</span> <?php foreach($personal as $row): ?>
				<li <?php if($row['id'] == \think\Request::instance()->get('personal_id')): ?>class="condition-on" <?php endif; ?>>
					<a href="<?php echo $row['link']; ?>"><?php echo $row['name']; ?></a>
				</li>
				<?php endforeach; ?>
			</ul>
			<ul class="condition-choose4">
				<span>财产保险：</span> <?php foreach($property as $row): ?>
				<li <?php if($row['id'] == \think\Request::instance()->get('property_id')): ?>class="condition-on" <?php endif; ?>>
					<a href="<?php echo $row['link']; ?>"><?php echo $row['name']; ?></a>
				</li>
				<?php endforeach; ?>
				<span class="condition-span showB1"><a href="#">展开全部>></a></span>
			</ul>
			<ul class="condition-choose5">
				<span>保险公司：</span> <?php foreach($companies as $row): ?>
				<li <?php if($row['id'] == \think\Request::instance()->get('company_id')): ?>class="condition-on" <?php endif; ?>>
					<a href="<?php echo $row['link']; ?>"><?php echo $row['name']; ?></a>
				</li>
				<?php endforeach; ?>
				<span class="condition-span showB2"> <a href="#">展开全部>></a> </span>
			</ul>
		</div>
	</div>
</div>
<!--选择区域结束-->
<!--广告区域开始-->
<div id="find-ad">
	<div class="container">
		<div class="find-ad">
			<a href="<?php echo url('home/Message/index'); ?>">
				<img src="__IMG__/public/ad1.png" height="130" width="1180">
			</a>
		</div>
	</div>
</div>
<!--广告区域结束-->
<!--种类区域-->
<div id="find-kind">
	<div class="container">
		<div class="find-kind">
			<div class="find-kind-top">
				<ul class="find-kind-top-ul">
					<?php foreach($orderTitle as $k=>$row): ?>
					<li <?php if($k == \think\Request::instance()->get('order_id')): ?>class="kind-on" <?php endif; ?>>
						<a href="<?php echo $row['link']; ?>"><?php echo $row['name']; ?></a>
					</li>
					<?php endforeach; ?>
					<li>
						<a href="<?php echo url('/home/Insurance/plan'); ?>">更多方案>></a>
					</li>
				</ul>
			</div>
			<div class="find-kind-main">
				<div class="kind-main-left">
					<!--保险种类信息-->
					<?php if(!(empty($insurances) || (($insurances instanceof \think\Collection || $insurances instanceof \think\Paginator ) && $insurances->isEmpty()))): foreach($insurances as $row): ?>
					<!--数据-->
					<div class="kind-insure fl">
						<div class="kind-insure-no">
							<div class="kind-insure-img fl">
								<?php if(!(empty($row['icon']) || (($row['icon'] instanceof \think\Collection || $row['icon'] instanceof \think\Paginator ) && $row['icon']->isEmpty()))): ?>
								<img src="<?php echo $row['icon']; ?>" height="202" width="202" /> <?php else: ?>
								<img src="__IMG__/insure/product_all.png" height="202" width="202"> <?php endif; ?>
							</div>

							<div class="kind-insure-main">
								<!-- 产品名字 -->
								<p><?php echo $row['name']; ?></p>

								<div class="kind1">
									<!-- 保障需求 -->
									<div class="kind1_a fl">
										<p>投保年龄：<span><?php echo $allCates[$row['age_id']]; ?></span></p>
										<p>保险期限：<span><?php echo $row['duration']; ?></span></p>
										<p>适合人群：<span><?php echo $allCates[$row['group_id']]; ?></span></p>
									</div>
									<!-- 保障项目 -->
									<div class="kind1_b fl">
										<div>保障项目</div>
										<ul>
											<?php if(!(empty($row['guarantee']) || (($row['guarantee'] instanceof \think\Collection || $row['guarantee'] instanceof \think\Paginator ) && $row['guarantee']->isEmpty()))): foreach($row['guarantee'] as $v): ?>
											<li><?php echo $v['name']; ?>：<span class="red1"><?php echo $v['price']; ?></span></li>
											<?php endforeach; endif; ?>
										</ul>
									</div>
									<div class="kind_2">
										<div class="kind_c fl">
											<p>产品特色:</p>
											<p><?php echo $row['feature']; ?></p>
										</div>
										<div class="kind_d fl">
											<p><span><a href="<?php echo url('/home/message/index'); ?>">￥按需求定制</a></span></p>
											<p>
												<a href="<?php echo url('Insurance/detail',['id'=>$row['insurance_id']]); ?>" class="more">
													<input type="button" id="sub_btn" value="查看更多" />
												</a>
												<p>
										</div>
									</div>
								</div>

							</div>
						</div>
					</div>
					<?php endforeach; ?>
					<!--下边的选项-->
					<div class="find-kind-bottom">
						<div class="fy">
							<?php echo $pager; ?>
						</div>
					</div>
					<?php else: ?>
						<div class="no-data" >
				 			<img src="__IMG__/user/NONO.png" >
				 		</div>
					<?php endif; ?>
				</div>
				<div class="kind-main-right">
					<!--注册-->
					<div class="kind-mian-right-1">
						<a href="#">
							<img src="__IMG__/insure/adShort2.jpg" width="300" height="280">
						</a>
					</div>
					<!--地区资深代理人-->
					<div class="kind-mian-right-2">
						<div class="kind-mian-right-2-top">
							<p>地区资深代理人推荐</p>
							<p>更多>></p>
						</div>
						<div class="kind-mian-right-2-bottom">
							<?php foreach($areaAgents as $row): ?>
							<!--数据1-->
							<div class="kind-mian-right-2-bottom-people">
								<div class="kmr2bp-img fl">
									<?php if(!(empty($row['head_img']) || (($row['head_img'] instanceof \think\Collection || $row['head_img'] instanceof \think\Paginator ) && $row['head_img']->isEmpty()))): ?>
									<img src="<?php echo $row['head_img']; ?>" height="80" width="80" /> <?php else: ?>
									<img src="__IMG__/index/seniorInsure_1.jpg" height="80" width="80"> <?php endif; ?>
								</div>
								<div class="kmr2bp-text fl">
									<p><?php echo $row['name']; ?></p>
									<p><span><?php echo $row['province_name']; ?><?php echo $row['city_name']; ?></span><span><?php echo $row['company']; ?></span></p>
									<p>微信:<?php echo $row['wechat']; ?></p>
									<p><button class="button-qq">
												<a href="tencent://message/?uin=<?php echo $row['qq']; ?>&Site=&Menu=yes">Q Q 交 谈</a>
											</button></p>
								</div>
								<div class="kmr2bp-hover">
									<a href="#">个人主页</a>
									<button class="button-qq-hover">
												<a href="tencent://message/?uin=<?php echo $row['qq']; ?>&Site=&Menu=yes">Q Q 交 谈</a>
											</button>
								</div>
							</div>
							<?php endforeach; ?>
						</div>
					</div>
					<!--免费定制区域-->
					<div class="window" id="window">
						<a href="<?php echo url('/home/message/index'); ?>">
							<img src="__IMG__/public/Free_Made.gif" />
						</a>
					</div>
					<!--热门产品-->
					<div class="kind-mian-right-3">
						<div class="hot-kind-top">
							<p>热门产品</p>
						</div>
						<div class="hot-kind-bottom">
							<?php foreach($hotInsurances as $row): ?>
							<!--第一条数据-->
							<a href="<?php echo url('Insurance/detail', ['id'=>$row['insurance_id']]); ?>">
								<div class="hot-kind-main">
									<p><?php echo $row['name']; ?></p>
									<div class="hot-kind-main-1">
										<div class="hot-kind-main-img fl">
											<img src="<?php echo $row['icon']; ?>" width="80" height="80">
										</div>
										<div class="hot-kind-main-text fl">
											<p>投保年龄： <?php echo $row['age']; ?></p>
											<p>保障期限： <?php echo $row['duration']; ?></p>
											<p>缴费方式： <?php echo $row['pay_type']; ?></p>
										</div>
									</div>
								</div>
							</a>
							<?php endforeach; ?>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>
<!--对比框-->

<div id="comparison">
	<div class="container">
		<div class="comparison">
			<div class="fptitle">
				<span class="fptleft">产品对比</span>
				<span class="fptright" id="closecomparison">X</span>
			</div>
			<div class="fpcon">
				<div class="fpconleft"></div>
				<div class="fpconright">
					<div class="ftop">
						<span class="fbut">
	    							<a href="javascript:void(0);" >开始对比</a>
	    						</span>
					</div>
					<div class="fwaste">
						<a href="#" class="fwleft"></a>
						<span class="flProduct">全部清空</span>
					</div>
				</div>
			</div>
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

		<script type="text/javascript">
			var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");
			document.write(unescape("%3Cspan id='cnzz_stat_icon_1261456705'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s4.cnzz.com/z_stat.php%3Fid%3D1261456705%26show%3Dpic' type='text/javascript'%3E%3C/script%3E"));
		</script>

		<script>
			window.allCitiesForChange = {
				$allCitiesForChange
			};
			window.onload = function() {
				var test = new Vcity.CitySelector({
					input: 'citySelect'
				});
			}
		</script>
		<script type="text/javascript" src="__JS__/jquery.js"></script>
		<script type="text/javascript" src="__JS__/main.js"></script>
		<script type="text/javascript" src="__JS__/ancre.js"></script>
		<script type="text/javascript" src="__JS__/cityselect.js"></script>
		<script type="text/javascript" src="__JS__/shouyeshurukuang.js"></script>

		
<script type="text/javascript" src="__JS__/jquery.js"></script>
<script type="text/javascript" src="__JS__/main.js"></script>
<script type="text/javascript" src="__JS__/jquery.validate.min.js"></script>
<script type="text/javascript" src="__JS__/free.js"></script>
<script>
	$.validator.setDefaults({
		submitHandler: function() {
			alert("提交成功，我们将尽快和您联系");
		}
	});
	$().ready(function() {
		$("#messageform").validate();
	});
</script>
<script>
	//找保险index页面
	$(document).ready(function() {
		var $category = $(".condition-choose4>li:gt(7):not(.condition-choose4>li:last)");
		$category.hide();
		$(".showB1").click(function() {
			var show = $category.is(':hidden');
			if(show) {
				$category.show();
				$(".showB1>a").html("<<显示部分")
			} else {
				$category.hide();
				$(".showB1>a").html("全部公司>>")
			}
			return false;
		})

	})
	$(document).ready(function() {
		var $category1 = $(".condition-choose5>li:gt(6):not(.condition-choose5>li:last)");
		$category1.hide();
		var $category = $(".condition-choose5>li:gt(3):not(.condition-choose5>li:gt(5))");
		$category.hide();
		$(".showB2").click(function() {
			var show = $category.is(':hidden');
			if(show) {
				$category.show();

				$(".showB2>a").html("<<显示部分")
			} else {
				$category.hide();
				$(".showB2>a").html("全部公司>>")
			}

			return false;

		})

	})
</script>
<script>
	$(document).ready(function() {
		$(".nav-main>li:eq(1)").addClass('indexon');
	})
</script>
<script>
	$(document).ready(function() {
		var linkAll = $("ondition-choose4>li");
	})
</script>
<!-- <script>
	//找保险页面对比框的效果
$(document).ready(function(){
	$(".CheckChange").click(function(){
 	    var checkindex=$(".CheckChange").index(this);
 	        alert(checkindex)
 	    var checktitle=$(".kind-insure-text>p:eq(0)").eq(checkindex).text();

 	    alert(checktitle)
		var zt=this.checked;
		if(zt==true){
			$(".comparison").css("display","block")
			var oLogin=document.createElement("div");
			oLogin.id="joinme";
			oLogin.innerHTML="<div class='fpconlmain'><div class='fpconlist'><h2><a href='#'><?php echo $row['name']; ?></a></h2><dl style='width: auto;'><dt><img src='/static/home/images/insure/kind-big1.png' height='63px' width='70'></dt><dd><span class='fsb'>投保年龄：</span>0-60周岁</dd><dd><span class='fsb'>保险期限：</span>终身</dd></dl></div><img src='/static/home/images/insure/remove16x16.png' class='waste'></div></div>"
			$(oLogin).prependTo($(".fpconleft"));
			if($(".fpconleft>div").size()>3){
				confirm("最多只能加三个保险产品哦");
				var indexfp=$(".waste").index(this);
			    $("#joinme").eq(indexfp).remove();
			}
			else{

			}


		}else{
			var indexfp=$(".waste").index(this);
			$("#joinme").eq(indexfp).remove();
		}

	    $(".waste").click(function(){
				var indexfp=$(".waste").index(this);
				$("#joinme").eq(indexfp).remove();

	    })
	})
	$("#closecomparison").click(function(){
		$(".comparison").css("display","none")
	})

	$(".flProduct").click(function(){
		$(".fpconleft").children().remove()
	})
	$(".fbut>a").click(function(){

		if($(".fpconleft>div").size()<2){
			confirm("最少需要2个产品才能对比哦")
		}else if($(".fpconleft>div").size()==2){
			location.href="twoproduct.html"
		}else if($(".fpconleft>div").size()==3){
			location.href="threeproduct.html"
		}else{
			alert("错误")
		}

	})
})
</script> -->
