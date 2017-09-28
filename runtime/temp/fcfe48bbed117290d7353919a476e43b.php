<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:71:"F:\fabaodou\public/../application/home/view/default/insurance\know.html";i:1505875525;s:68:"F:\fabaodou\public/../application/home/view/default/public\base.html";i:1506066801;}*/ ?>
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
		<link rel="stylesheet" href="__CSS__/konw-insure.css">
		<link rel="stylesheet" href="__CSS__/buy.css"  />
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
		
		<!--头部固定导航区域-->
		<!-- <div id="nav" class="nav">
	    	<div class="container">
	    		<ul class="nav-main">
	    			<li><a href="#">首页</a></li>
	    			<li><a href="#">找保险</a></li>
	    			<li><a href="#">找代理人</a></li>
	    			<li><a href="#">了解保险</a></li>
	    			<li><a href="#">保险问吧</a></li>
	    			<li><a href="#">关于平台</a></li>
	    		</ul>
	    		<ul class="nav-little">
	    			<li><a href="#">会员中心</a></li>
	    			<li><a href="#">会员服务</a></li>
	    			<li><a href="#">支付中心</a></li>
	    			<li><a href="#">联系方式</a></li>
	    		</ul>
	    	</div>
	    </div> -->
	    <!--头部固定导航区域结束-->
	    <div id="headline">
	    	<div class="container">
	    		<div class="headline">
	    			<div  class="headline-left fl">
	    			<p class="title-gy">头条资讯 <a class="gengduo1" href="<?php echo url('Article/lists', ['id'=>42]); ?>">查看更多>></a></p>
	    			<ul class="ulAll">
	    			<?php foreach($headline as $k=>$v): ?>
	    				<li><a href="<?php echo url('home/Insurance/knowDetail', ['id'=>$k]); ?>"><?php echo $v; ?></a></li>
	    			<?php endforeach; ?>
	    			</ul>
	    			<div class="ad_ul">
	    			   <a href="#">
	    				<img src="__IMG__/insure/ul_bg.png" height="180" width="400">
	    				<div class="ad_ul_1"></div>
	    				<div class="ad_ul_2">两名中国游客在泰国遭歹徒砍伤 境外旅游险为出行护航</div>
	    			   </a>
	    			</div>
	    			</div>
	    			<div class="headline-right fr">
	    				<div class="headline-lunbo">
	    					<div class="headlinejs" id="headlinejs">
			    				<div class="headlineimage">
			    					<img onclick="location.href='#轮播图片要跳转的地址'" src="__IMG__/insure/banner1.png" height="300px" width="750px">
			    					<img onclick="location.href='#轮播图片要跳转的地址'" src="__IMG__/insure/banner2.png" style="display: none;" height="300px" width="750px">
			    					<img onclick="location.href='#轮播图片要跳转的地址'" src="__IMG__/insure/banner3.png" style="display: none;" height="300px" width="750px">
			    					<img onclick="location.href='#轮播图片要跳转的地址'" src="__IMG__/insure/banner4.png" style="display: none;" height="300px" width="750px">
			    					<img onclick="location.href='#轮播图片要跳转的地址'" src="__IMG__/insure/banner5.png" style="display: none;" height="300px" width="750px">
			    				</div>
			    				<div class="headlineNav" id="headlineNav">
			    					<a class="trigger imgSelected" href="javascript:void(0)"></a>
									<a class="trigger" href="javascript:void(0)"></a>
									<a class="trigger" href="javascript:void(0)"></a>
									<a class="trigger" href="javascript:void(0)"></a>
									<a class="trigger" href="javascript:void(0)"></a>
			    				</div>
		    			    </div>
	    				</div>
	    				<div class="headline-refe">
	    					<div class="headline-refe-left fl">
	    						<p class="title-gy">推荐资讯 <a class="gengduo1" href="<?php echo url('Article/lists', ['id'=>42]); ?>">查看更多>></a></p>
				    			  	<ul class="ulAll">
				    			  	<?php foreach($recommend as $k=>$v): ?>
					    				<li><a href="<?php echo url('home/Insurance/knowDetail', ['id'=>$k]); ?>"><?php echo $v; ?></a></li>
					    			<?php endforeach; ?>
				    			  	</ul>
	    					</div>
	    					<div class="headline-refe-right fr">
	    						<p class="title-gy">热门咨询 <a class="gengduo1" href="<?php echo url('Article/lists', ['id'=>42]); ?>">查看更多>></a></p>
	    						  	<ul class="ulAll">
	    						  	<?php foreach($hot as $k=>$v): ?>
					    				<li><a href="<?php echo url('home/Insurance/knowDetail', ['id'=>$k]); ?>"><?php echo $v; ?></a></li>
					    			<?php endforeach; ?>
	    						  	</ul>
	    					</div>
	    				</div>
	    			</div>
	    		</div>
	    	</div>
	    </div>
	    <!--ad-->
	    <div id="ad">
	    	<div class="container">
	    		<div class="ad">
						<a href="<?php echo url('/home/message/index'); ?>">
						   <img src="__IMG__/public/ad2.png" width="1180" height="100">
					   </a>
	    		</div>
	    	</div>
	    </div>
		<!--保险five之保险学堂-->
		<div id="insure-school">
			<div class="container">
				<div class="insure-school">
					<div class="five-top">
					 	<div class="five-title">
					 		保险学堂
					 	</div>
					 	<div class="five-tiele-right fr">
					 		<a href="<?php echo url('Article/lists', ['id'=>50]); ?>">查看更多>></a>
					 	</div>
					</div>
					<div class="five-main">
					 	<ul class="five-ul fl ulAll">
					 	<?php foreach($school as $row): ?>
					 	   <li><a href="<?php echo url('home/Insurance/knowDetail', ['id'=>$row['article_id']]); ?>"><?php echo $row['title']; ?></a>
							<span>
								<a href="javascript:void(0)"><span class="math"><?php echo $row['like']; ?></span></a>
								<a href="javascript:void(0)"><span class="math2"><?php echo $row['views']; ?></span></a>
							</span>
					 	   </li>
					 	<?php endforeach; ?>
					 	</ul>


					</div>

				</div>
			</div>
		</div>
	    <!--保险five之保险案例-->
	    <div id="insure-anli">
	    	<div class="container">
		    	<div class="insure-anli">
		    		<div class="five-top">
						 	<div class="five-title">
						 		保险案例
						 	</div>
						 	<div class="five-tiele-right fr">
					 		    <a href="<?php echo url('Article/lists', ['id'=>51]); ?>">查看更多>></a>
					 	    </div>
					</div>

				    <div class="anli-main five-main">
				    	<div class="anli-main-left fl">
				    		<ul class="five ulAll">
				    		<?php foreach($case as $k=>$row): ?>
				    		   <li><a href="<?php echo url('home/Insurance/knowDetail', ['id'=>$k]); ?>"><?php echo $row; ?></a></li>
				    		<?php endforeach; ?>
				    		</ul>
				    	</div>
				    	<div class="anli-main-right fr">
				    	<?php foreach($casePhoto as $k=>$row): ?>
				    		<a href="<?php echo url('home/Insurance/knowDetail', ['id'=>$row['article_id']]); ?>" class="fl">
				    			<img src="<?php echo (isset($row['cover']) && ($row['cover'] !== '')?$row['cover']:'/static/home/images/insure/ceshi1232.png'); ?>" alt="<?php echo $row['title']; ?>" height="120" width="240">
				    			<p><?php echo $row['title']; ?></p>
				    		</a>
				    	<?php endforeach; ?>
				    	</div>
				    </div>
		    	</div>
	    	</div>
	    </div>
		<!--保险five之理财知识-->
		<div id="insuer-zhishi">
			<div class="container">
				<div class="insuer-zhishi">
					<div class="five-top">
						 	<div class="five-title">
						 		理财知识
						 	</div>
						 	<div class="five-tiele-right fr">
					 			<a href="<?php echo url('Article/lists', ['id'=>53]); ?>">查看更多>></a>
					 	    </div>
					</div>

					<div class="zhishi-main five-main">
						<ul class="five-ul fl ulAll">
							<?php foreach($money as $row): ?>
				    		    <li><a href="<?php echo url('home/Insurance/knowDetail', ['id'=>$row['article_id']]); ?>"><?php echo $row['title']; ?></a>
				    		    <span>
									<a href="javascript:void(0)"><span class="math"><?php echo $row['like']; ?></span></a>
									<a href="javascript:void(0)"><span class="math2"><?php echo $row['views']; ?></span></a>
							   </span></li>

				    		<?php endforeach; ?>
					 	</ul>
					</div>
				</div>
			</div>
		</div>
	    <!--保险five之人物专访-->
	    <div id="insure-interview">
	    	<div class="container">
	    		<div class="insuer-interview">
	    			<div class="five-top">
						 	<div class="five-title">
						 		人物专访
						 	</div>
						 	<div class="five-tiele-right fr">
					 		<a href="<?php echo url('Article/lists', ['id'=>52]); ?>">查看更多>></a>
					 	    </div>
					</div>

					<div class="five-main">
						<ul class="five-ul last-policy fl ulAll">
					 	    <?php foreach($interview as $row): ?>
				    		   <li><a href="<?php echo url('home/Insurance/knowDetail', ['id'=>$row['article_id']]); ?>"><?php echo $row['title']; ?></a>
									<span>
									<a href="javascript:void(0)"><span class="math"><?php echo $row['like']; ?></span></a>
									<a href="javascript:void(0)"><span class="math2"><?php echo $row['views']; ?></span></a>
								   </span>
				    		   </li>
				    		<?php endforeach; ?>
					 	</ul>

					</div>
	    		</div>
	    	</div>
	    </div>
		<!--保险five之政策解读-->
		<div id="insure-policy">
			<div class="container">
				<div class="insure-policy">
					<div class="five-top">
					 	<div class="five-title">
					 		政策解读
					 	</div>
					 	<div class="five-tiele-right fr">
					 		<a href="<?php echo url('Article/lists', ['id'=>43]); ?>">查看更多>></a>
					 	</div>
					</div>

					<div class="five-main">
					 	<ul class="five-ul fl ulAll">
					 	<?php foreach($unscramble as $row): ?>
			    		    <li><a href="<?php echo url('home/Insurance/knowDetail', ['id'=>$row['article_id']]); ?>"><?php echo $row['title']; ?></a>
			    		    <span>
								<a href="javascript:void(0)"><span class="math"><?php echo $row['like']; ?></span></a>
								<a href="javascript:void(0)"><span class="math2"><?php echo $row['views']; ?></span></a>
							</span>
							</li>

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
<script type="text/javascript" src="__JS__/main.js" ></script>
<script >
$(document).ready(function(){
   $(".nav-main>li:eq(3)").addClass('indexon');
})
</script>
