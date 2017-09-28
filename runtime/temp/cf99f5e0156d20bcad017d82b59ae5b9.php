<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:68:"F:\fabaodou\public/../application/home/view/default/agent\agent.html";i:1505875525;s:68:"F:\fabaodou\public/../application/home/view/default/public\base.html";i:1506046510;}*/ ?>
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
    <link
    
	<link rel="stylesheet" href="__CSS__/agent.css">

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
            <ul class="nav-main ">
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
                <li><a href="javascript:;" id="payback">支付中心</a></li>
                <li><a href="javascript:;" id="callback">联系方式</a></li>
            </ul>
        </div>
    </div>
    
		 <!-- 头部区域结束-->
		 <!-- 选择条件区域区域开始-->
		 <div id="condition">
		 	<div class="container">
		 		<div class="condition">
		 			<ul class="condition-choose1">
		 				<span>选择地区：</span >
		 				<?php foreach($area as $row): ?>
		 				<li <?php if($row['id'] == \think\Request::instance()->get('area_id')): ?>class="condition-on"<?php endif; ?>><a href="<?php echo $row['link']; ?>"><?php echo $row['name']; ?></a></li>
		 				<?php endforeach; ?>
		 			</ul>
		 			<ul class="condition-choose2">
		 				<span>热门公司：</span>
		 				<?php foreach($companies as $row): ?>
		 				<li <?php if($row['id'] == \think\Request::instance()->get('company_id')): ?>class="condition-on"<?php endif; ?>><a href="<?php echo $row['link']; ?>"><?php echo $row['name']; ?></a></li>
		 				<?php endforeach; ?>
		 				<span class="condition-span showA1"><a href="#"> 全部公司>> </a></span>
		 			</ul>
		 			<ul class="condition-choose3">
		 				<span>擅长险种：</span>
		 				<?php foreach($categories as $row): ?>
		 				<li <?php if($row['id'] == \think\Request::instance()->get('category_id')): ?>class="condition-on"<?php endif; ?> class="abc"><a href="<?php echo $row['link']; ?>"><?php echo $row['name']; ?></a></li>
		 				<?php endforeach; ?>
		 				<span class="condition-span showA2"><a href="#"> 展开全部>> </a></span>
		 			</ul>
		 		</div>
		 	</div>
		 </div>
		 <!-- 选择条件区域区域结束-->
		 <!--保险精英区域-->
		 <div id="elite">
		 	<div class="container">
		 		<div class="elite">
		 			<div class="elite-top">
		 				<div class="elite-top-left fl">
		 					<span>保险精英</span>
		 					&nbsp;&nbsp;
		 					<span>以下显示均为法宝兜已认证会员，其资料真实可靠</span>
		 				</div>
		 				<div class="elite-top-right fr">
		 					<a href="#">立即查看竞拍规则<span>>></span></a>
		 				</div>
		 			</div>
		 			<div class="elite-bottom">
		 				<!--elite-1-->
		 				<?php foreach($elites as $row): ?>
		 				<div class="elite-bottom-main fl">

		 					<div class="elite-bottom-main-img">
		 					<?php if(!(empty($row['head_img']) || (($row['head_img'] instanceof \think\Collection || $row['head_img'] instanceof \think\Paginator ) && $row['head_img']->isEmpty()))): ?>
		 						<img src="<?php echo $row['head_img']; ?>" width="212" height="212">
		 					<?php else: ?>
		 						<img src="__IMG__/agentImg/212x212.png" width="212" height="212">
		 					<?php endif; ?>
		 					</div>

		 					<div class="elite-bottom-main-text">
		 						<p class="elite-name">
		 							<span class="elite-name-1"><?php echo $row['name']; ?></span>
		 							&nbsp;&nbsp;
		 							<span class="elite-name-2"><?php echo $companies[$row['company_id']]['name']; ?></span>
		 						</p>
		 						<p class="elite-address"><span><?php echo $allProvinces[$row['province_id']]; ?><?php echo $allCities[$row['city_id']]; ?></span></p>
		 					</div>
		 					<div class="elite-bottom-main-hover">
		 						<div class="elite-bottom-main-hover-1">
		 							<a href="<?php echo url('user/Index/index',['id'=>$row['agent_id']]); ?>" target="_blank" class="show-name"><?php echo $row['name']; ?></a>
		 						</div>
		 					</div>
		 				</div>
		 				<?php endforeach; ?>
		 			</div>
		 		</div>
		 	</div>
		 </div>
		 <!--保险精英区域结束-->
		 <!--会员信息区域-->
		 <div id="vip">
		 	<div class="container">
		 		<div class="vip">
		 			<div class="vip">
		 				<div class="vip-left fl">
		 					<div  class="vip-left-choose">
		 						<ul class="fl">
		 							<li a href="#">全部会员从业年限：</li>
		 							<?php foreach($experience as $row): ?>
					 				<li <?php if($row['id'] == \think\Request::instance()->get('experience')): ?>class="condition-on"<?php endif; ?>><a href="<?php echo $row['link']; ?>"><?php echo $row['name']; ?></a></li>
					 				<?php endforeach; ?>
		 						</ul>
		 						<ul class="fr">
		 							<li a href="#">按vip年限排序</li>
		 						</ul>
		 					</div>

		 					<div class="vip-left-main">
		 						<?php foreach($agents as $row): ?>
		 						<div class="vip-people fl">
                                           <!--  代理人头像 -->
		 							<div class="vip-people-img fl">
											<?php if(!(empty($row['head_img']) || (($row['head_img'] instanceof \think\Collection || $row['head_img'] instanceof \think\Paginator ) && $row['head_img']->isEmpty()))): ?>
							 						<img src="<?php echo $row['head_img']; ?>" width="138" height="138">
							 					<?php else: ?>
							 						<img src="__IMG__/agentImg/s400x198.png" width="138" height="138">
							 				<?php endif; ?>
                                    </div>
                                           <!-- 代理人信息 -->
							 		<div class="vip-people-message fl">
                                        <div class="vip_a">
                                        	<div class="vip_a_1">
				 								<p>
				 									<span class="vip-name"><?php echo $row['name']; ?></span>
				 									<span class="tel_a"><?php echo $row['mobile']; ?></span>
				 								</p>
				 								<p>
				 								    地区:
				 								    <span><?php echo $allCities[$row['city_id']]; ?></span>
													&nbsp;&nbsp;
												    公司:
													<span><?php echo $companies[$row['company_id']]['name']; ?></span>
													/
													<span><?php echo (isset($experience[$row['experience_id']]['name']) && ($experience[$row['experience_id']]['name'] !== '')?$experience[$row['experience_id']]['name']:'未填写'); ?></span>
				 								</p>


				 								<p>
				 									<span class="vip-zone">擅长领域:</span>
				 									<span><?php echo $row['goodat']; ?></span>
				 								</p>
				 							 </div>

				 							 <div class="vip_b">
											   <a href="<?php echo url('user/Index/index',['id'=>$row['agent_id']]); ?>" target="_blank">个人详情</a>
		 						    	       <a href="<?php echo url('Message/index',['agent_id'=>$row['agent_id']]); ?>" class="order_bak" target="_blank">预约我</a>
		 						    	       <a href="tencent://message/?uin=<?php echo $row['qq']; ?>&Site=&Menu=yes">在线交谈</a>
				 					     	 </div>

				 						</div>
				 					</div>
											<!-- 微信二维码 -->
				 					<div class="vip_a_2 fl">
											  <img src="<?php echo $row['wechat_qrcode']; ?>" height="138" width="138">
				 					</div>

		 						</div>
		 						<?php endforeach; ?>
		 					</div>
		 					<!--下边分页-->
		 					<div class="vip-fenye">
				 				<div class="fy">
									<?php echo $pager; ?>
								</div>
		 					</div>
		 				</div>

		 				<!--右边区域-->
		 				<div class="vip-right fr">
		    				<!--免费定制区域-->
							<div class="window" id="window" >
		    					<a href="<?php echo url('/home/message/index'); ?>">
		    					<img src="__IMG__/public/Free_Made.gif"/>
		    					</a>
		    				</div>
							<!--推介代理人区域-->
							<div class="referrals">
								<div class="xianzhong">
									<ul>
									<?php foreach($guessLike as $row): ?>
										<li><a href="<?php echo url('Insurance/detail', ['id'=>$row['insurance_id']]); ?>">
												<?php if(!(empty($row['icon']) || (($row['icon'] instanceof \think\Collection || $row['icon'] instanceof \think\Paginator ) && $row['icon']->isEmpty()))): ?>
													<img src="<?php echo $row['icon']; ?>" height="100" width="100">
												<?php else: ?>
													<img src="__IMG__/agentImg/123ceshi.jpg">
												<?php endif; ?>
												</a>
											<div class="xianzhong-main">
												<p>猜您喜欢</p>
												<p>投保年龄：</p>
												<p><?php echo $row['age']; ?></p>
												<p>保险期限：</p>
												<p><?php echo $row['duration']; ?></p>
												<p>适合人群：</p>
												<p><?php echo $row['group_id']; ?></p>
												<p>产品特色:</p>
												<p class="xianzhong-shuoming"><?php echo $row['feature']; ?></p>
											    <p class="xianzhong-xiangqing"><a href="<?php echo url('Insurance/detail',['id'=>$row['insurance_id']]); ?>">查看详情>></a></p>
											</div>
										 </li>
									<?php endforeach; ?>
									</ul>
								</div>
									<div class="xianzhong-main" id="guding">
														<p>猜您喜欢</p>
														<p>投保年龄：</p>
														<p>0-60周岁</p>
														<p>保险期限：</p>
														<p>终身</p>
														<p>适合人群：</p>
														<p>个人</p>
														<p>产品特色:</p>
														<p class="xianzhong-shuoming">长期健康保障产品，提供77种重疾+33种轻症疾病，轻症可累计赔付5次，多种交费方症可累计赔付5次，多种交症可累计赔付5次，多种交症可累计赔付5次，多种交式可灵活选择</p>
													    <p class="xianzhong-xiangqing"><a href="#">查看详情>></a></p>
								    </div>
							</div>
		 				</div>
		 			</div>


		 		</div>
		 	</div>
		 </div>

	     <!--相关搜索-->
	     <div id="zone-serch">
	     	<div class="container">
	     		<div class="zone-serch">
	     			 <div class="zone-serch-top">
	     			 	<span>相关搜索</span>
	     			 </div>
	     			 <div class="zone-serch-bottom">
	     			 	<ul>
	     			 	<?php foreach($links as $k=>$row): ?>
	     			 		<li><a href="<?php echo $row['url']; ?>"><span class="place-1"><?php echo $row['title']; ?></span></a></li>
	     			 	<?php endforeach; ?>
	     			 	</ul>
	     			 </div>
	     		</div>
	     	</div>
	     </div>
	     <!--相关搜索结束-->
	     <!--周边买保险开始-->
	     <div id="rim">
	     	<div class="container">
	     		<div class="rim">
	     			 <div class="rim-top">
	     			 	<span class="place-1"><?php echo $areaInfo['province_name']; ?></span><span>周边买保险</span>
	     			 </div>
	     			 <div class="rim-bottom">
	     			 	<ul>
	     			 	<?php foreach($nearCities as $k=>$row): ?>
	     			 		<li><a href="<?php echo $row['link']; ?>"><span class="place"><?php echo $row['shortname']; ?></span>买保险</a></li>
	     			 	<?php endforeach; ?>
	     			 	</ul>

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


	<script type="text/javascript" src="__JS__/jquery.js" ></script>
	<script type="text/javascript" src="__JS__/jquery.validate.min.js" ></script>
    <script type="text/javascript" src="__JS__/free.js" ></script>
    <script type="text/javascript" src="__JS__/main.js" ></script>
	<script>
		//调用无缝滚动插件
		$(document).ready(function(){
			 $(".xianzhong").kxbdMarquee({
			  isEqual:true,         //所有滚动的元素长宽是否相等,true,false
			  loop:0,                 //循环滚动次数，0时无限
			  direction:"up",       //滚动方向，"left","right","up","down"
			  scrollAmount:1,     //步长
			  scrollDelay:30       //时长 值越大 越慢
			});
		})
	</script>
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
   	//查看全部公司
//agent页面热门公司
$(document).ready(function(){
	  	var $category=$(".condition-choose2>li:gt(5):not(.condition-choose2>li:last)");
	  	$category.hide();
	  	$(".showA1").click(function(){
	  		var show=$category.is(':hidden');
	  		if(show){
	  			$category.show();
	  			$(".showA1>a").html("<<显示部分")
	  		}else{
	  			$category.hide();
	  		    $(".showA1>a").html("全部公司>>")
	  		}
	  		return false;
	  	})

 })

//agent页面擅长险种
$(document).ready(function(){
	  	var $category=$(".condition-choose3>li:gt(8):not(.condition-choose2>li:last)");
	  	$category.hide();
	  	$(".showA2").click(function(){
	  		var show=$category.is(':hidden');
	  		if(show){
	  			$category.show();
	  			$(".showA2>a").html("<<显示部分")
	  		}else{
	  			$category.hide();
	  		    $(".showA2>a").html("全部公司>>")
	  		}
	  		return false;
	  	})
 })
   </script>
   <script >
		$(document).ready(function(){
		  $(".nav-main>li:eq(2)").addClass('indexon');
		})
   </script>
   <script>
	$(".xianzhong>ul>li").mouseover(function(){
		$("#guding").css("display","none");
	})
	$(".xianzhong>ul>li").mouseout(function(){
		$("#guding").css("display","block");
	})
</script>

