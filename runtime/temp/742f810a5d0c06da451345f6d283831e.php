<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:70:"F:\fabaodou\public/../application/home/view/default/article\lists.html";i:1505875525;s:68:"F:\fabaodou\public/../application/home/view/default/public\base.html";i:1506062767;}*/ ?>
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
		<link rel="stylesheet" href="__CSS__/text_list.css" />
 <script> document.oncontextmenu=function(e){return false;}
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
						<a href="/">首页</a>
					</li>
					<li>
						<a href="<?php echo url('home/insurance/index'); ?>">找保险</a>
					</li>
					<li>
						<a href="<?php echo url('home/agent/index'); ?>">找代理人</a>
					</li>
					<li>
						<a href="#">保险方案</a>
					</li>
					<li>
						<a href="<?php echo url('home/insurance/know'); ?>">保险资讯</a>
					</li>
					<li><a href="#">保险问吧</a></li> 
					<li>
						<a href="<?php echo url('home/about/about'); ?>">关于平台</a>
					</li>
					<li><a href="#">签单分享</a></li> 
					<li><a href="#">关于平台</a></li> 
				</ul>
				<ul class="nav-little">
					<!-- <li><a href="#">会员中心</a></li>
                <li><a href="#">会员服务</a></li> -->
					<li>
						<a href="javascript:;" id="payback">支付中心</a>
					</li>
					<li>
						<a href="javascript:;" id="callback">联系方式</a>
					</li>
				</ul>
			</div>
		</div>
		
		<div id="place">
			<div class="container">
				<div class="place">
					<p>
					    <span>了解保险</span>-<span>文章列表</span>-<span id="titre"><?php echo $cates[$categoryId]; ?></span>
					</p>
				</div>
			</div>
		</div>
		<div id="main">
			<div class="container">
				<div class="main">
					<div class="title">
						<ul class="title_list">
						<?php foreach($cates as $k=>$v): ?>
							<li <?php if($k == $categoryId): ?>class="on"<?php endif; ?>>
								<a href="<?php echo url('home/Article/lists', ['id'=>$k]); ?>"><?php echo $v; ?></a>
							</li>
						<?php endforeach; ?>
						</ul>
					</div>
					<div class="product_wrap">
						<div class="ad">
						   <a href="<?php echo url('/home/message/index'); ?>">
		    					<img src="__IMG__/public/ad2.png" height="73" width="860"/>
		    			   </a>
						</div>
						<!--保险案例数据-->
						<div class="product show">
							<?php foreach($articles as $row): ?>
								<div class="text_main">
									<!--文章标题-->
									<p><a href="<?php echo url('home/Article/detail', ['id'=>$k]); ?>"><?php echo $row['title']; ?></a></p>
									<!--文章内容简介-->
									<p><a href="<?php echo url('home/Article/detail', ['id'=>$k]); ?>"><?php echo $row['desc']; ?></a></p>
									<p>来源：<span>法保兜•保险网</span> 日期：<span><?php echo time_format($row['publish_time']); ?></span><span><a href="<?php echo url('home/Article/detail', ['id'=>$k]); ?>">更多>></a></span></p>
								</div>
							<?php endforeach; ?>
				    	</div>

				    	<div class="list_ad">
							<div class="list_ad_1">
								<img src="__IMG__/insure/ceshi1232.png" height="150" width="300">
								<div class="list_title"></div>
								<div class="list_title_1">平安私家车辆保险</div>
							</div>

							<div class="list_ad_1">
								<div class="insure_title">
								  <span>最新案例</span>
								  <span><a href="<?php echo url('home/insurance/know'); ?>"> 更多>> </a></span>
								</div>
								<div class="in_main">
									<ul>
										<li><a href="#">21312321</a></li>
										<li><a href="#">1232131</a></li>
										<li><a href="#">123213</a></li>
										<li><a href="#">13223</a></li>
										<li><a href="#">123213213</a></li>
									</ul>
								</div>
							</div>

							<div class="list_ad_1">
								<div class="insure_title">
								  <span>最新资讯</span>
								  <span><a href="<?php echo url('home/insurance/know'); ?>"> 更多>> </a></span>
								</div>
								<div class="in_main">
									<ul>
										<li><a href="#">1231231</a></li>
										<li><a href="#">我收大阿迪娜你打谁看见的健康王企鹅群二群无而且而且气味而且的</a></li>
										<li><a href="#">12312</a></li>
										<li><a href="#">12312</a></li>
										<li><a href="#">1312</a></li>
									</ul>
								</div>
							</div>
				    	</div>
					<!--分页-->
						<div class="fy">
							<?php echo $pager; ?>
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

		
<script type="text/javascript" src="__JS__/jquery.js" ></script>
<script type="text/javascript" src="__JS__/text-list.js" ></script>
