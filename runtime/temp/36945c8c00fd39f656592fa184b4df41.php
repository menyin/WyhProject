<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:68:"F:\fabaodou\public/../application/home/view/default/about\about.html";i:1505875525;s:68:"F:\fabaodou\public/../application/home/view/default/public\base.html";i:1506066801;}*/ ?>
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
	<link rel="stylesheet" href="__CSS__/about.css" />
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
		
<div class="about">
	<div class="container">
		<div class="title fl">
			<ul class="title-list">
				<li class="on"><a href="javascript:void(0)">关于公司</a></li>
				<li ><a href="javascript:void(0)">关于平台</a></li>
				<li ><a href="javascript:void(0)">企业文化</a></li>
				<li ><a href="javascript:void(0)">团队精神</a></li>
				<li ><a href="javascript:void(0)">团队展示</a></li>
				<li ><a href="javascript:void(0)">公司资质</a></li>
				<li ><a href="javascript:void(0)">法律声明</a></li>
				<li ><a href="javascript:void(0)" >联系我们</a></li>
				<li ><a href="javascript:void(0)">付款方式</a></li>
			</ul>
		</div>
		<div class="product-wrap">

			<!--关于公司-->
			<div class="product show">
				<div class="pos">
					当前位置：
					<a href="#">首页</a>
					＞
					<a href="#">关于公司</a>
				</div>
				<div class="w-title">
					<strong>关于公司</strong>
				</div>
				<div class="w-content low1">
							<p><span style="color: #FF5400; font-size: 18px;">兜兜虫（厦门）科技有限公司（以下简称“兜兜虫科技”）</span>,专注于互联网智能营销领域,是中国领先的、全球性经营的一站式互联网营销企业之一。以全国中小型企业为服务对象,为企业提供：挖掘潜在客户、销售、服务和市场营销的智能化整体解决方案。长期以来,秉承着一切为了客户的服务理念,从无到有,从小到大,迅速发展成为中国新互联网营销服务企业中的佼佼者。目前,兜兜虫科技已形成PC端、移动端智能网络营销等产业链,以及企业推广、企业沟通、企业管理、企业移动办公四大业务板块。</p>
							<br />
							<p>兜兜虫科技历经坚实发展,拥有自己强大的开发技术团队,本着“解决客户需求,创造员工福利,做出社会贡献”的价值观,不断完善基于互联网新技术的创新应用产品,力求在关注客户的关注点上实现自身价值。</p>
							<br />
							<p>自公司成立以来,获得多项荣誉：“厦门市重合同守信用单位”、“厦门诚信促进会会员”、“厦门软件行业协会会员”、“福建省互联网协会单位”等等,并于2016年被评为最受欢迎的互联网营销服务商！兜兜虫科技与百度、搜狗、360等各大搜索引擎进行战略合作,强强联合,共享资源优势,从更深更广泛的层面为客户提供更优质、更高效、更有价值的网络服务。</p>
						    <br />
						    <p class="bs1">标识</p>
						    <hr>
						    <p><span style="color: #FF5400; font-size: 18px;">兜兜虫科技</span>的企业标识意在蓬勃向上、积极进取的基础上,融合服务、诚信、创新、执行、坚持、感恩的理念,充分体现了兜兜虫科技积极进取的精神,努力服务客户诚信经营,通过持续的创新以及一流的执行力,支援客户的网络营销活动并不断推出有竞争力的业务；兜兜虫科技将加快国际化步伐、努力实现职业化、始终最注重服务客户。我们将和我们的客户及合作伙伴一起一路感恩,共同创造一种和谐的商业环境实现自身的稳健成长。</p>
				</div>
			</div>

			<!--关于平台-->
			<div class="product ">
				<div class="pos">
					当前位置：
					<a href="#">首页</a>
					＞
					<a href="#">关于平台</a>
				</div>
				<div class="w-title">
					<strong>关于平台</strong>
				</div>
				<div class="w-content low1">
							<p><span style="color: #FF5400; font-size: 18px;">法保兜</span>是<span style="color: #FF5400; font-size: 18px;">兜兜虫（厦门）科技有限公司</span>旗下专注于保险交易的第三方平台。公司拥有强大的、资深的互联网营销专家团队,以全新的互联网营销思维打造集现代电商、品牌推广、峰会及活动策划等服务为一体的保险服务中心。<span style="color: #FF5400; font-size: 18px;">法保兜</span>服务内容有：</p>
								<br />
							<p>1、为保险从业者、保险机构提供专业PC端网络营销服务、移动端网络营销服务,为保险从业者提升更多精准客源,让需要买保险的客户能够第一时间找到保险服务商。在互联网应用普及甚至依赖的时代下,真正意义上实现互联网营销的核心价值；</p>
						    <p>2、为保险需求者提供便捷的投保咨询、最佳保险方案、保险购买、理赔技巧、保险知识查阅、最新保险资讯浏览、保险问答等服务。<span style="color: #FF5400; font-size: 18px;">法保兜</span>将为广大民众提供更便捷、更合适、更安全、更实惠的保险服务。</p>
								<br />
							<p><span style="color: #FF5400; font-size: 18px;">法保兜</span>以帮助保险从业者为广大民众解决后顾之忧为己任,携手保险从业者、保险机构共创绿色保险服务环境,让天下民众都能得到安全保障！</p>
						</div>
			</div>
			<!--企业文化-->
			<div class="product ">
				<div class="pos">
					当前位置：
					<a href="#">首页</a>
					＞
					<a href="#">企业文化</a>
				</div>
				<div class="w-title">
					<strong>企业文化</strong>
				</div>
				<div class="w-content low1">
					<p><span style="color: #FF5400; font-size: 18px;">使命：</span></p>
						<p>帮助保险从业者为广大民众解决后顾之忧,人人都有买保险。</p>
						<br />
					<p><span style="color: #FF5400; font-size: 18px;">愿景：</span></p>
						<p>成为全球最大的第三方保险服务商；只要买保险,就上法保兜。</p>
					<br />
					<p><span style="color: #FF5400; font-size: 18px;">管理理念：</span>	<br />
							<p>用文化凝聚人心,以章管企,制度大于领导人</p>
							<p>喜欢自己的工作,认同兜兜虫企业文化</p>
							<p>顾全大局,不计较个人得失</p>
					</p>
					<br />
					<p><span style="color: #FF5400; font-size: 18px;">道德理念：</span>
						<p>要埋怨别人时,先想想自己是否完美无缺。</p>
						<p>一个人的快乐,不是因为他拥有得多,而是因为他计较得少。</p>
					</p>
						<br />
					<P>
						<span style="color: #FF5400; font-size: 18px;">人才理念：</span><br />
						<p>有德有才,马上就用；</p>
						<p>有德无才,培养着用；</p>
						<p>无德有才,限制录用；</p>
						<p>无德无才,坚决不用。</p>
						<p>能者上 庸者下 劣者汰</p>

					</P>
					<br />
					<P>
						<span style="color: #FF5400; font-size: 18px;">薪酬理念：</span><br />
							<p>工资发给有苦劳的人</p>
							<p>奖金发给有功劳的人</p>
							<p>股权奖励给能干且有主人翁精神的人</p>
							<p>辞退信是送给没结果还耍个性的人</p>
					</P>
					<br />
					<p>
						<span style="color: #FF5400; font-size: 18px;">兜兜虫精神：</span><br />
							<p>成功是优点的发挥；失败是缺点的积累。</p>
							<p>计划是时间的最好保障,行动是成功的唯一途径。</p>
							<p>积极进取,持之以恒的学习</p>
							<p>正能量  满腔热情 狼性精神</p>
							<p>不忘初心,继续前进</p>
							<p>只要思想不滑坡,办法总比困难多</p>

					</p>

				</div>
			</div>
			<!--团队精神-->
			<div class="product ">
				<div class="pos">
					当前位置：
					<a href="#">首页</a>
					＞
					<a href="#">团队精神</a>
				</div>
				<div class="w-title">
					<strong>我们团队的精神文化</strong>
				</div>
				<div class="w-content">
							<table width="934" border="1">
							  <tbody style="text-align: center">
							    <tr>
							      <td height="43" colspan="5"> 高效执行</td>
							    </tr>
							    <tr>
							      <td width="180">1</td>
							      <td width="180">2</td>
							      <td width="180">3</td>
							      <td width="180">4</td>
							      <td width="180">5</td>
							    </tr>
							    <tr>
							      <td height="206"><p>1.上班时间只做与工作有关的事情</p>
							      <p>2.没有因工作失误而造成的重复错误。</p></td>
							      <td><p>能根据轻重缓急来</p>
							      <p>正确安排工作优先</p>
							      <p>级,做正确的事。</p></td>
							      <td>遵循但不拘泥于工作流程,化繁为简,用较小的投入获得较大的工作成果。</td>
							      <td>1.决策前积极发表建设性意见,充分参与团队讨论；<br>
							2.决策后,无论个人是否有异议,必须从言行上完全予以支持</td>
							      <td>日事日毕,日清日高</td>
							    </tr>
							    <tr>
							      <td height="35" colspan="5">核心价值：感恩困难</td>
							    </tr>
							    <tr>
							      <td height="46">1</td>
							      <td>2</td>
							      <td>3</td>
							      <td>4</td>
							      <td>5</td>
							    </tr>
							    <tr>
							      <td height="226">面对不断的遭受拒绝与挫折,仍不抱怨,把困难视为成长的垫脚石,理性对待,充分配合</td>
							      <td><p>对变化产生的困难和挫折,能自我调整,并正面影响和带动同事</p></td>
							      <td>当遇到苦难时,以结果为导向,只讨论完成结果。</td>
							      <td>不满足现有绩效水平,积极学习、持续改进,不断设定更高的目标并完成它。</td>
							      <td>在面临重大挑战、公司变革、市场变革或需超常付出的情况下,仍能以乐观的精神和必胜信念,不畏困哪,积极影响并带动同事和团队,并最终完成目标。</td>
							    </tr>
							  </tbody>
							</table>


				</div>
			</div>
			<!--团队展示-->
			<div class="product ">
				<div class="pos">
					当前位置：
					<a href="#">首页</a>
					＞
					<a href="#">团队展示</a>
				</div>
				<div class="w-title">
					<strong>我们团队的风采</strong>
				</div>
				<div class="w-content">
					<img src="__IMG__/aboutImg/g1.png">
				 	<img src="__IMG__/aboutImg/g2.png">
				 	<img src="__IMG__/aboutImg/g3.png">
				 	<img src="__IMG__/aboutImg/g4.png">
				 	<img src="__IMG__/aboutImg/g5.png">
				 	<img src="__IMG__/aboutImg/g6.png">
				 	<img src="__IMG__/aboutImg/g7.png">
				 	<img src="__IMG__/aboutImg/g8.png">
				 	<img src="__IMG__/aboutImg/g9.jpg" width="271" height="153">
				</div>
			</div>
			<!--公司资质-->
			<div class="product ">
				<div class="pos">
					当前位置：
					<a href="#">首页</a>
					＞
					<a href="#">公司资质</a>
				</div>
				<div class="w-title">
					<strong>我们公司的资质</strong>
				</div>
				<div class="w-content">
					<img src="__IMG__/aboutImg/ye.png">
					<img src="__IMG__/aboutImg/gs.png"/>
					<img src="__IMG__/aboutImg/kh.jpg">
					<img src="__IMG__/aboutImg/xy.png">
				</div>
			</div>


			<!--法律声明-->
			<div class="product ">
				<div class="pos">
					当前位置：
					<a href="#">首页</a>
					＞
					<a href="#">法律声明</a>
				</div>
				<div class="w-title">
					<strong>法律声明</strong>
				</div>
				<div class="w-content">
					<div class="w-content low1">
							<p><span style="color: #FF5400; font-size: 18px;">法保兜</span>由<span style="color: #FF5400; font-size: 18px;">兜兜虫(厦门)科技有限公司</span>,是中国领先的、全球性经营的一站式保险服务交易平台,主要帮助保险从业者为广大民众解决后顾之忧为己任,携手保险从业者、保险机构共创绿色保险服务环境,让天下民众都能得到安全保障！</p>
                            <br />
                            <p>1、为保险从业者、保险机构提供专业PC端网络营销服务、移动端网络营销服务,为保险从业者提升更多精准客源,让需要买保险的客户能够第一时间找到保险服务商。在互联网应用普及甚至依赖的时代下,真正意义上实现互联网营销的核心价值;</p>
                            <p>2、为保险需求者提供便捷的投保咨询、最佳保险方案、保险购买、理赔技巧、保险知识查阅、最新保险资讯浏览、保险问答等服务。<span style="color: #FF5400; font-size: 18px;">法保兜</span>将为广大民众提供更便捷、更合适、更安全、更实惠的保险服务。</p>
							<br/>
							<p><span style="color: #FF5400; font-size: 18px;">法律责任</span></p>
							<p><span style="color: #FF5400; font-size: 18px;">法保兜</span>承诺：绝对遵守《中华人民共和国计算机信息系统安全保护条例》、《计算机信息系统国际联网保密管理规定》、《中华人民共和国计算机信息网络国际联网管理暂行规定》、《计算机信息网络国际联网安全保护管理办法》、《计算机系统安全规范》、《互联网信息服务管理办法》等国家和地方的法律法规。</p>
						</div>


				</div>
			</div>
			<!--联系我们-->
			<div class="product ">
			<a id="call"></a>
				<div class="pos">
					当前位置：
					<a href="#">首页</a>
					＞
					<a herf="#">联系我们</a>
				</div>
				<div class="w-title">
					<strong>联系我们</strong>
				</div>
				<div class="w-content">
                    <div class="address1 fl">
						<p>客服专线：159-6020-9233</p>
						<p>QQ服务：1992355937</p>
						<p>邮箱：1992355937@qq.com</p>
						<p>地址：厦门市安岭二路95号B栋</p>
						<p class="bottom_p"></p>
						<p>商务合作</p>
						<p>林先生：159-6020-9233</p>
                    </div>
					<div class="map fr" >
						<img src="__IMG__/aboutImg/20170720173024.png">
					</div>

				</div>
			</div>
			<!--付款方式-->
			<div class="product ">
				<a id="pay"></a>
				<div class="pos">
					当前位置：
					<a href="#">首页</a>
					＞
					<a id="paycenter">付款方式</a>
				</div>
				<div class="w-title">
					<strong>您可以选择下面的几种方式付款哦！</strong>
				</div>
				<div class="w-content">
					<div class="pay">
						<img src="__IMG__/aboutImg/pay.jpg">
						<img src="__IMG__/aboutImg/pay1.png">
					</div>
					<div class="pay2">
						<p>对公账号</p>
						<p>开户行：中国民生银行厦门东浦支行      </p>
						<p>户名：兜兜虫(厦门)科技有限公司</p>
						<p>账  号：150 811 013</p>
						<br />
						<p>中国建设银行</p>
						<p>开户行：中国建设银行厦门高殿支行     </p>
						<p>户  名：王  全</p>
						<p>账  号：6217 0019 3000 7000 897</p>
						<br />

						<p>中国农业银行</p>
						<p>开户行：中国农业银行厦门高殿支行         </p>
						<p>户  名：王  全</p>
						<p>账  号：6228 4800 7018 1414 817</p>
						<br />
						<p>民生银行</p>
						<p>开户行：中国明生银行福建自贸试验区厦门片区分行营业部</p>
						<p>户   名：王  全</p>
						<p>账   号：6216  9129  0373  6273   </p>

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

		
<script type="text/javascript" src="__JS__/main.js" ></script>
<!--头部效果固定阴影 -->
<script >
$(document).ready(function(){
  $(".nav-main>li:eq(4)").addClass('indexon');
})
</script>
