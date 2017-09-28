<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:68:"F:\fabaodou\public/../application/home/view/default/index\index.html";i:1505875525;s:68:"F:\fabaodou\public/../application/home/view/default/public\base.html";i:1506066801;}*/ ?>
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
	<link rel="stylesheet" href="__CSS__/main.css" />
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
		
<!--主体部分-->
<div id="main">
	<div class="container">
	   <div class="main-box">
		<!--产品列表框-->
		<div class="main-list">
			<ul class="main-list-kind1">
				<li>————<a href="#">&nbsp;人身保险&nbsp;</a>————</li>
				<li  class="border-no no1">
				<?php foreach($lifeInsuranceCate as $k=>$v): ?>
					<a href="<?php echo url('home/Insurance/index'); ?>?personal_id=<?php echo $k; ?>"><?php echo $v; ?></a>
				<?php endforeach; ?>
				</li>
			</ul>
			<ul class="main-list-kind2">
				<li>————<a href="#">&nbsp;财产保险&nbsp;</a>————</li>
				<li  class="border-no no2">
				<?php foreach($propertyInsuranceCate as $k=>$v): ?>
					<a href="<?php echo url('home/Insurance/index'); ?>?property_id=<?php echo $k; ?>"><?php echo $v; ?></a>
				<?php endforeach; ?>
				</li>
			</ul>
			<ul class="main-list-kind3">
				<li>————<a href="#">&nbsp;人险公司&nbsp;</a>————</li>
				<li class="no2">
				<?php foreach($lifeCompany as $k=>$v): ?>
				<a href="<?php echo url('home/Insurance/index'); ?>?company_id=<?php echo $k; ?>"><?php echo $v; ?></a>
				<?php endforeach; ?>
				<a href="<?php echo url('home/Insurance/index'); ?>" class="red1">更多»</a>
				</li>
			</ul>
			<ul class="main-list-kind4">
			<li>————<a href="#">&nbsp;财险公司&nbsp;</a>————</li>
				<li class="no2">
					<?php foreach($propertyCompany as $k=>$v): ?>
					<a href="<?php echo url('home/Insurance/index'); ?>?company_id=<?php echo $k; ?>"><?php echo $v; ?></a>
					<?php endforeach; ?>
					<a href="<?php echo url('home/Insurance/index'); ?>" class="red1">更多»</a>
				</li>
			</ul>
		</div>
		<!--轮播部分-->

			<div class="lunbo">
    			<!-- <a id="prev" class="prevBtn qq" href="javascript:void(0)"></a>
    			<a id="next" class="nextBtn qq" href="javascript:void(0)"></a> -->
    			<div class="lunbojs" id="lunbojs">
		    		<div class="lunboimage">
    					<!-- <img onclick="location.href='#轮播图片要跳转的地址'" src="__IMG__/index/banner1.png" width="665"  height="342">
    					<img onclick="location.href='#轮播图片要跳转的地址'" src="__IMG__/index/banner2.png" style="display: none;" width="665"  height="342"> -->
    					<img onclick="location.href='../home/message/index'" src="__IMG__/index/banner3.png"  width="665"  height="342">
    					<img onclick="location.href='../home/message/index'" src="__IMG__/index/banner4.png" style="display: none;" width="665"  height="342">
    					<img onclick="location.href='../home/message/index'" src="__IMG__/index/banner5.png" style="display: none;" width="665"  height="342">
    				</div>

    				<div class="lunboNav" id="lunboNav">
    					<a class="trigger imgSelected" href="javascript:void(0)"></a>
						<a class="trigger" href="javascript:void(0)"></a>
						<a class="trigger" href="javascript:void(0)"></a>
				<!-- 		<a class="trigger" href="javascript:void(0)"></a>
						<a class="trigger" href="javascript:void(0)"></a> -->
    				</div>
    			</div>
			   <!--轮播内部广告位置-->
    			<div class="lunbo-custom">
    				<div class="window" id="window" >
                       <a href="<?php echo url('/home/message/index'); ?>">
		    					   <img src="__IMG__/public/Free_Made.gif"/>
		    		   </a>
    				</div>
    			</div>
			</div>


		<!--轮播下广告位置-->
			<div class="lunbo-ad">
              	<div class="lunbo-ad-title">资深保险经理人推荐</div>
              	<?php foreach($seniorAgent as $row): ?>
					<div class="lunbo-ad-1">
	                        <a href="<?php echo url('user/Index/index',['id'=>$row['agent_id']]); ?>" target="_blank">
	                              <?php if(!(empty($row['head_img']) || (($row['head_img'] instanceof \think\Collection || $row['head_img'] instanceof \think\Paginator ) && $row['head_img']->isEmpty()))): ?>
											<img src="<?php echo $row['head_img']; ?>" height="146" width="144"/>
										<?php else: ?>
											 <img src="__IMG__/index/seniorInsure_1.jpg" height="146" width="144">
								   <?php endif; ?>
                                <div  class="lunbo-ad-text"></div>
                                <div  class="lunbo-ad-text-p">
										<p><?php echo $row['name']; ?>　<?php echo $row['company']; ?></p>
										<p><?php echo $row['mobile']; ?></p>
								</div>
							</a>
					</div>
				<?php endforeach; ?>
			</div>

	  </div>
	</div>
</div>
<!-- 热门保险 hot-insure -->
<div id="hot-insure">
	<div class="container">
		<div class="hot-insure-box">
			<div class="insure-professor-box-title">
				<span class="professor">热门保险方案</span>
				<span class="hot-title">选择最适合您的</span>
			</div>
			<div class="hot-insure-main">
			<?php foreach($hotPlan as $row): ?>
				<div class="hot-insure-1">
					<span class="insure-title"><?php echo $row['title']; ?></span>
					<p>
					<span class="insure-weizhi"><img src="__IMG__/index/location.png"><?php echo $row['city_name']; ?> </span>
					<span class="insure-xianzhong"><img src="__IMG__/index/fangzi1.png"><?php echo $row['company']; ?></span>
					</p>

					<span class="insuer-duixiang1">适合对象：<?php echo $row['suitable']; ?> <?php echo $row['sex_type']; ?></span>
					<span class="insuer-duixiang2">保障需求：<?php echo $row['categoies_title']; ?></span>
					<div class="insuer-lanse">
						<?php echo $row['reason']; ?>
					</div>
					<div class="insuer-baofei">
						<div class="nian1">
							<span class="nian-fei-jiaqian"><?php echo $row['max']; ?></span>
							<span class="nian-fei-title">最高保额</span>
						</div>
						<div class="nian2">
							<span class="nian-fei-jiaqian"><?php echo $row['pay_year']; ?></span>
							<span class="nian-fei-title">年缴保费</span>
						</div>
					</div>
						<a href="<?php echo url('Insurance/planDetail', ['plan_id'=>$row['plan_id']]); ?>" class="xiangqingaa"><input type="button" value="" class="insure-button" /></a>
				</div>
			<?php endforeach; ?>
			</div>
		</div>
	</div>
</div>
<!-- 保险专家  insuer-professor-->
<div id="insure-professor">
	<div class="container">
		<div class="insure-professor-box">
			<div class="insure-professor-box-title">
				<span class="professor">保险专家</span>
				<span class="hot-title"><?php echo $row['city_name']; ?></span>
				<!--<span class="city">
					<input type="text" class="cityinput" id="citySelect1" value="点击选择目的地">

				</span>-->
				<div class="insure-professor-little-t">
					 <span><a href="<?php echo url('home/insurance/know'); ?>">人物专访</a></span>
					 丨
					 <span><a href="<?php echo url('home/insurance/know'); ?>">兜兜特刊</a></span>
					 丨
					 <span><a href="<?php echo url('home/agent/index'); ?>">推介保险专家</a></span>
					 丨
					 <span><a href="<?php echo url('home/agent/index'); ?>">更多»</a></span>

				</div>

			</div>
			<div class="insure-professor-main">
				<div class="insure-professor-main-box1">
					<form action="<?php echo url('Agent/index'); ?>" method="GET">
					<!-- 三级联动 -->
						<select name="province_id" id="province_id" >
							<option value="0">--请选择--</option>
			                <?php foreach($provinces as $k=>$row): ?>
			                    <option value="<?php echo $k; ?>" <?php if($k == $areaInfo['province_id']): ?>selected=""selected<?php endif; ?>><?php echo $row; ?></option>
			                <?php endforeach; ?>
			            </select>
			            <select name="city_id"  id="city_id"  >
							<option value="0">--请选择--</option>
			                <?php foreach($cities as $k=>$row): ?>
			                    <option value="<?php echo $row['id']; ?>" <?php if($row['id'] == $areaInfo['city_id']): ?>selected=""selected<?php endif; ?>><?php echo $row['name']; ?></option>
			                <?php endforeach; ?>
			            </select>
			            <select name="area_id"  id="area_id"  >
							<option value="0">--请选择--</option>
			                <?php foreach($areas as $k=>$row): ?>
			                    <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
			                <?php endforeach; ?>
	                    </select>

			    		<input type="text" id="insure-professor-name" class="insure-professor-select" placeholder='输入保险精英名称' name="title" />
					    <input type="submit" value="" class="insure-professor-select  insure-professor-submit"/>
					</form>
				</div>

				<div class="insure-professor-main-box2">
				<?php foreach($expert as $row): ?>
					 <div class="professor-specific">
					 	<div class="professor-specific-img">
                            <a href="<?php echo url('user/Index/index',['id'=>$row['agent_id']]); ?>" target="_blank">
                 			  <?php if(!(empty($row['head_img']) || (($row['head_img'] instanceof \think\Collection || $row['head_img'] instanceof \think\Paginator ) && $row['head_img']->isEmpty()))): ?>
								<img src="<?php echo $row['head_img']; ?>" height="100" width="100"/>
									<?php else: ?>
								<img src="__IMG__/index/insureSp.jpg" height="100" width="100">
				 			  <?php endif; ?>
				 			</a>
					 	</div>
					 	<div class="professor-specific-main">
						 	<p><?php echo $row['name']; ?> <!-- <span class="xx"><img src="__IMG__/index/xx.png"><img src="__IMG__/index/xx.png"></span> --></p>
						 	<p><?php echo $row['mobile']; ?></p>
						 	<p><?php echo $row['province_name']; ?> <?php echo $row['city_name']; ?></p>
						 	<p class="qqchat"><a href="tencent://message/?uin=<?php echo $row['qq']; ?>&Site=&Menu=yes"></a></p>
					 	</div>
					 </div>
				<?php endforeach; ?>

				</div>
			</div>
		</div>
	</div>
</div>
<!--首页横幅广告-->
<div id="index-ad">
	<div class="container">
		<div class="index-ad">
		  <a href="<?php echo url('/home/message/index'); ?>" target="_blank">
			<img src="__IMG__/public/ad1.png" height="130" width="1180">
		  </a>
		</div>
	</div>
</div>
<!--保险专题-->
<div id="insure-subject">
	<div class="container">
		<div class="insure-subject">
			<!--保险专题-->
			<div class="insure-subject-1">
				<div class="insure-professor-box-title">
					<span>保险专题</span>
					<span class="hot-title">Insurance project</span>
					<a href="<?php echo url('home/insurance/know'); ?>" class="gengduo">
						<span>更多</span>
						<span>»</span>
					</a>
				</div>
				<div class="insure-subject-1-main">
					<div class="insuerlunbo">
					<?php foreach($topic as $k=>$row): ?>
						<div class="insurelb" <?php if($k>0): ?>style="display: none;"<?php endif; ?>>
							<div class="insuerl-top">
								<img src="__IMG__/index/projectBanner_1.png" height="160" width="358">
							</div>
							<div class="insuerl-bottom">
								<p><?php echo $row['title']; ?></p>
								<p><a href="<?php echo url('home/Article/detail', ['id'=>$row['article_id']]); ?>" ><?php echo $row['desc']; ?></a></p>
							</div>
						</div>
					<?php endforeach; ?>
					</div>
					<div class="insuer-list" id="insuer-list">
						<a href="javascript:void(0)" class="insuer-trigger insuer-selected"></a>
						<a href="javascript:void(0)" class="insuer-trigger"></a>
						<a href="javascript:void(0)" class="insuer-trigger"></a>
					</div>
				</div>
			</div>
			<!--保险咨询-->
			<div class="insure-subject-2">
				<div class="insure-professor-box-title">
					<span>保险咨讯</span>
					<a href="<?php echo url('home/insurance/know'); ?>" class="gengduo">
						<span>更多</span>
						<span>»</span>
					</a>
					<!-- <a href="#"><input type="button" value="我要提问" class="myquestion" /></a> -->
				</div>
				<div class="insure-subject-2-main">
					<!--保险咨询下的问题1-->
					<ul class="insure-subject-2-bottom1" >
					<?php foreach($asks_1 as $row): ?>
						<li>
							<div class="insure-subject-2-bottom1-left">
								<a href="<?php echo url('Article/detail',['id'=>$row['article_id']]); ?>" title=""><?php echo $row['title']; ?></a>
							</div>
							<div class="insure-subject-2-bottom1-date">
								<?php echo $row['like']; ?>
							</div>
						</li>
					<?php endforeach; ?>

					</ul>
					<!--保险咨询下的问题2-->
					<ul class="insure-subject-2-bottom2" >
					<?php foreach($asks_2 as $row): ?>
						<li>
							<div class="insure-subject-2-bottom1-left">
								<a href="<?php echo url('Article/detail',['id'=>$row['article_id']]); ?>" title=""><?php echo $row['title']; ?></a>
							</div>
							<div class="insure-subject-2-bottom1-date">
								<?php echo $row['like']; ?>
							</div>
						</li>
					<?php endforeach; ?>

					</ul>
				</div>
			</div>
			<!--右边图片-->
			<div class="insure-subject-3">
				<div class="insure-subject-3-main">
					<!--删除文字后加图片 大小为276*223-->
					<a href="<?php echo url('/home/message/index'); ?>">
						<img src="__IMG__/index/adShort1.jpg" width="276" height="223">
					</a>
				</div>
				<div class="insure-subject-3-main">
				    <a href="<?php echo url('/home/insurance/index'); ?>">
					   <img src="__IMG__/index/adShort2.jpg" width="276" height="223">
				    </a>
				</div>
			</div>
		</div>
	</div>
</div>
<!--投保指南-->
<div id="insuer-guide">
	<div class="container">
		<div class="insuer-guide">
			<div class="insure-professor-box-title">
				<span class="professor">投保指南</span>
				<span class="hot-title">choose best</span>
			</div>
			<div class="insure-guide-main">
				<div class="insuer-guide-main-1">
					<p>险种导航</p>
					<p><img src="__IMG__/index/zhinan1.png" height="130" width="370"></p>
					<div class="insuer-guide-main-1-list">
						<ul>
						<?php foreach($insurance as $k=>$row): ?>
							<li><a href="<?php echo url('Insurance/detail',['id'=>$k]); ?>"><?php echo $row; ?></a></li>
						<?php endforeach; ?>
						</ul>
					</div>
					<p><a href="<?php echo url('Article/lists',['id'=>2]); ?>">更多险种</a></p>
				</div>
				<div class="insuer-guide-main-1">
                    <p>保险案例</p>
                  	<p><img src="__IMG__/index/zhinan2.png" height="130" width="370"></p>
                  	<div class="insuer-guide-main-1-list">
						<ul>
						<?php foreach($cases as $row): ?>
							<li><a href="<?php echo url('home/Article/detail', ['id'=>$row['article_id']]); ?>"><?php echo $row['title']; ?></a></li>
						<?php endforeach; ?>
						</ul>
					</div>
					<p><a href="<?php echo url('Article/lists',['id'=>51]); ?>">更多案例</a></p>
				</div>
				<div class="insuer-guide-main-1">
					<p>理赔技巧</p>
					<p><img src="__IMG__/index/zhinan3.png" height="130" width="370"></p>
					<div class="insuer-guide-main-1-list">
						<ul>
							<?php foreach($skills as $row): ?>
								<li><a href="<?php echo url('home/Article/detail', ['id'=>$row['article_id']]); ?>"><?php echo $row['title']; ?></a></li>
							<?php endforeach; ?>
						</ul>
					</div>
					<p><a href="<?php echo url('Article/lists',['id'=>2]); ?>">更多技巧</a></p>
				</div>
			</div>
		</div>
	</div>
</div>
<!--友情链接-->
<div id="other-www">
	<div class="container">
		<div class="other-www">
			<div class="other-title">
				<ul class="other-title-list">
					<li class="on">合作品牌</li>
					<li>
					友情链接
					<a name="yqhref" id="yqhref"></a>
					</li>
				<p><b></b></p>
				</ul>
			</div>
			<div class="other-product-wrap">
				<div class="other-product showtime">
					<?php foreach($partners as $row): ?>
						<a href="<?php echo $row['url']; ?>" target="_blank"><img src="<?php echo $row['icon']; ?>" height="50" ></a>
					<?php endforeach; ?>
				</div>
				<div class="other-product ">
					<?php foreach($links as $row): ?>
						<a href="<?php echo $row['url']; ?>" target="_blank"><img src="<?php echo $row['icon']; ?>" height="50"></a>
					<?php endforeach; ?>
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
<script type="text/javascript" src="__JS__/main.js" ></script>
<script type="text/javascript" src="__JS__/cityselect.js" ></script>
<script type="text/javascript" src="__JS__/jquery.validate.min.js" ></script>
<script type="text/javascript" src="__JS__/free.js" ></script>
<script type="text/javascript" src="__JS__/jquery.citys.js" ></script>
<script >
$(document).ready(function(){
  $(".nav-main>li:eq(0)").addClass('indexon');
})
</script>
<!-- 城市三级联动 -->
<script type="text/javascript">
$("#province_id").change(function(){
    var province_id=$(this).val();
    var urlCity = "<?php echo url('Area/getCities'); ?>?id="+province_id;

    $.ajax({
        url: urlCity,
        Type:"GET",
        data:"",
        dataType:"json",
        success:function(data){
            var option1=$("<option value='0'></option>");
            // $(option1).val("0");
            $(option1).html("--请选择--");
            $("#city_id").html(option1);
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
