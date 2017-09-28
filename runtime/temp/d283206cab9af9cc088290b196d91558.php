<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:73:"F:\fabaodou\public/../application/home/view/default/insurance\detail.html";i:1505875525;s:68:"F:\fabaodou\public/../application/home/view/default/public\base.html";i:1505977442;}*/ ?>
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
    
		<link rel="stylesheet" href="__CSS__/gongyong.css" />
		<link rel="stylesheet" href="__CSS__/product.css" />

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
    
	    <!--详情-->
	    <div id="product-main">
	    	<div class="container">
	    		<div class="product-main">
	    			<div class="product-main-top ">
	    				<span><a href="<?php echo url('home/insurance/index'); ?>">保险产品</a></span> > <span><?php echo $insurance['name']; ?></span>
	    			</div>
	    			<div class="product-main-bottom">
	    				<div class="product-main-img fl">
	    				<?php if(!(empty($insurance['icon']) || (($insurance['icon'] instanceof \think\Collection || $insurance['icon'] instanceof \think\Paginator ) && $insurance['icon']->isEmpty()))): ?>
	    					<img src="<?php echo $insurance['icon']; ?>" height="400" width="400">
	    				<?php else: ?>
	    					<img src="__IMG__/insure/product-1ceshi.png" height="400" width="400">
	    				<?php endif; ?>
	    				</div>
	    				<div class="product-main-introduce fl">
	    					<div class="product-main-money">
		    					<p>
		    						<span class="product-main-money-title"><?php echo $insurance['name']; ?></span>
		    						<span class="pamt-little">(<?php echo $insurance['reason']; ?>)</span>
		    					</p>
		    					<p>
		    						<span>温馨提示：</span>
		    						请说明该信息来源于法保兜保险网
		    					</p>
		    					<p>
		    					<span>点击分享：</span>
		    						<span class="jiathis_style">
										<a class="jiathis_button_qzone"></a>
										<a class="jiathis_button_tsina"></a>
										<a class="jiathis_button_tqq"></a>
										<a class="jiathis_button_weixin"></a>
										<a class="jiathis_button_renren"></a>
										<a href="http://www.jiathis.com/share" class="jiathis jiathis_txt jtico jtico_jiathis" target="_blank"></a>
								    </span>
		    						<!-- 丨 -->
		    						<!-- <span class="xin-love"></span> -->
		    						<!-- <a href="#"><span class="fx-bj">加入收藏立即报价</span></a> -->
		    					</p>
		    					<p>
		    						<a href="#">联系报价</a>
		    					</p>
		    					<p>
		    					<span></span>
		    					<span><a href="#"></a></span>
		    					</p>
	    					</div>
	    					<div class="product-tese">
	    						<p>产品特色：</p>
	    						<p><?php echo $insurance['feature']; ?></p>
	    						<p><span></span><a href="#">查看详情>></a></p>
	    					</div>
	    				</div>
	    			</div>
	    		</div>
	    	</div>
	    </div>
	    <!--END详情-->
	    <!-- AD -->
	    <div id="ad">
	    	<div class="container">
	    		<div class="flow-123">
					    <img src="__IMG__/insure/ad2.png">
				</div>
	    	</div>
	    </div>
		<!--流程-->
		<div id="flow">
			<div class="container">
				<div class="flow">
					<div class="flow-list">
						<ul>
							<li class="list-on"><a href="#chanpingxiangqing">产品详情</a></li>

							<!-- <li><a href="#toubaoxuzhi">投保须知</a></li> -->

							<li><a href="#baoxiananli">保险案例</a></li>

							<!-- <li><a href="#lipeifuwu">理赔服务</a></li>

							<li><a href="#changjianwenti">常见问题</a></li> -->

							<!-- <li><a href="#kehupinjia">客户评价(1061)</a></li> -->
						</ul>

					</div>
					<a name="chanpingxiangqing"></a>
					<div class="product-details">
						<p><span class="details-title">被保险人：</span>80周岁以下，经常乘坐交通工具的人士   <span class="details-title">保险期限：</span><?php echo $insurance['duration']; ?></p>
						<p><span class="details-title">保单形式：</span>电子保单 纸质保单  <span class="details-title">保险责任：</span>请阅读<a href="#">《一年期交通意外险适用条款》</a></p>
					    <!--表格-->
					     <table width="1100" border="0" cellpadding="0" cellspacing="0">
							  <tbody>
							    <tr>
							      <th width="278" height="40" scope="col">保障项目</th>
							      <th width="278" scope="col">保险金额(元)</th>
							      <th width="543" scope="col">保障范围</th>
							    </tr>
							    <?php if(!(empty($insurance['guarantee']) || (($insurance['guarantee'] instanceof \think\Collection || $insurance['guarantee'] instanceof \think\Paginator ) && $insurance['guarantee']->isEmpty()))): foreach($insurance['guarantee'] as $row): ?>
							    <tr>
							      <td height="51"><?php echo $row['name']; ?></td>
							      <td> <?php echo $row['price']; ?></td>
							      <td class="td-le">
							      	<?php echo $row['desc']; ?>
							      	<span class="td-color"><?php echo $row['notice']; ?></span>
							      </td>
							    </tr>
							    <?php endforeach; endif; ?>
							    <tr>
							      <td height="56" colspan="3">保险责任请参考《一年期交通意外险条款》，并敬请特别留意条款中的“<a href="#">责任免除</a>”部分</td>
							    </tr>
							  </tbody>
						</table>

						<p>特别提醒</p>
						<p>
						<?php if(!(empty($insurance['notice']) || (($insurance['notice'] instanceof \think\Collection || $insurance['notice'] instanceof \think\Paginator ) && $insurance['notice']->isEmpty()))): foreach($insurance['notice'] as $k=>$v): ?>
								<?php echo $k + 1; ?>、<?php echo $v; ?> <br />
							<?php endforeach; endif; ?>
						</p>
						<p>隐私保护声明</p>
						<a name="toubaoxuzhi"></a>
						<p>您提供的个人信息、数据和隐私我们不会提供给任何未获授权的第三方。</p>

					</div>
					<!--投保须知-->

					<!-- <div class="must-konw">

						<p class="title-all">投保须知</p>
						<div class="must-know-main">
							<div class="must-know-main-top">
								<p>不要轻易付款</p>
								<p>1.填写投保信息 &nbsp;&nbsp;&nbsp; 2.确认信息和金额 &nbsp;&nbsp;&nbsp;3.在线支付</p>
							</div>
							<div class="must-know-main-bottom">
								<a name="baoxiananli"></a>
								1：每位被保险人同一保险期间的飞机意外保额最高为800万，火车/轮船意外保额最高为100万，汽车保额最高为30万，多投无效。<br>
								2：未成年人除飞机意外以外的身故保险金额最高不超过10万元<br>
								3：保险起期可自由选择，当天投保，保险生效日期最早为次日零时。但投保当天的航班，我们也提供航空意外保障（航班延误保障则次日生效）。<br>
								4：24小时理赔报案电话：95511。<br>

							</div>
						</div>
					</div> -->
					<!--保险案例 he保险专题-->
					<div class="two">
						<a name="lipeifuwu"></a>
						<div class="insure-anli fl">
							<p class="title-all">保险案例>><a href="#">更多</a></p>
							<div class="insure-anli-main">
								<ul class="fl">
								<?php foreach($cases as $k=>$row): if($k < 4): ?>
									<li><a href="<?php echo url('Article/detail',['id'=>$row['article_id']]); ?>">• <?php echo $row['title']; ?></a></li>
								<?php endif; endforeach; ?>
								</ul>
								<ul class="fr">
								<?php foreach($cases as $k=>$row): if($k >= 4): ?>
									<li><a href="<?php echo url('Article/detail',['id'=>$row['article_id']]); ?>">• <?php echo $row['title']; ?></a></li>
								<?php endif; endforeach; ?>
								</ul>
							</div>
						</div>

						<div class="insuer-tips fr">
							<p class="title-all">保险专题>><a href="#">更多</a></p>
							<div class="insure-tips-main">
								<a href="<?php echo url('Article/detail', ['id'=>$topics[0]['article_id']]); ?>">
									<p><?php echo $topics[0]['title']; ?></p>
								</a>

								<div class="zhuantiright">
								<?php foreach($topics as $k=>$row): if($k > 0): ?>
									<p><a href="<?php echo url('Article/detail', ['id'=>$row['article_id']]); ?>"><?php echo $k; ?>. <?php echo $row['title']; ?></a></p>
								<?php endif; endforeach; ?>
								</div>

							</div>
						</div>
					</div>
					<!--理赔服务-->
					<?php if(!(empty($insurance['claims']) || (($insurance['claims'] instanceof \think\Collection || $insurance['claims'] instanceof \think\Paginator ) && $insurance['claims']->isEmpty()))): ?>
					<div class="lipei">
						<a name="changjianwenti"></a>
						<p class="title-all">理赔服务</p>
						<div class="lipei-main">
							<p><?php echo $insurance['claims']['desc']; ?></p>
							<p>
							<?php if(!(empty($insurance['claims']['claims']) || (($insurance['claims']['claims'] instanceof \think\Collection || $insurance['claims']['claims'] instanceof \think\Paginator ) && $insurance['claims']['claims']->isEmpty()))): foreach($insurance['claims']['claims'] as $k=>$row): ?>
								<span><?php echo $k+1; ?>&nbsp;&nbsp;<?php echo $row; ?></span>
							<?php endforeach; endif; ?>
							</p>

						</div>
					</div>
					<?php endif; ?>

					<!--常见问题-->
					<!-- <div class="problem">

						<p class="title-all">常见问题</p>
						<div class="problem-main">
							<div class="problem1">
								<p>1.一年期交通意外险和短期交通意外险有什么区别？</p>
								<p>投保一年期交通意外险保费更划算，一次投保，全年安心，较适合经常出差的商旅人士购买。</p>
							</div>
							<div class="problem1">
								<p>2.投保交通意外险，国外的航班也在承保范围内吗？</p>
								<p>对于交通意外险，只要是被保险人以乘客身份乘坐民航客机、商业营运的火车、轮船和商业营运的汽车，不论境内境外，都在保障范围之内。如果被保
									险人是为出国而购买保险，或者是为了办理出国签证购买的保险，建议客户购买境外旅行险或者境外留学或工作保险，这两款保险具有境外紧急救援服
									务，比较适合出国人士.</p>
							</div>
							<div class="problem1">
								<p>3.航班延误申请赔偿时需要准备哪些材料呢？</p>
								<p>申请航班延误赔偿应准备保险单或保险单号、被保险人身份证明文件和航空公司出具的关于延误和延误时间的正式书面证明文件。若被保险人委托他人
									申请的，还应提供授权委托书原件、委托人和受托人的身份证明等相关证明文件。</p>
							</div>
						</div>
					</div> -->

					<!--客户评价-->
					<!-- <div class="apprase">
						<a name="kehupinjia"></a>
						<p class="title-all">客户评价</p>
						<div class="apprase-main">
							<div class="grade">
								<div class="grade1 fl">
									<p>综合得分</p>
									<p>4.7</p>
								</div>
								<p class="fl">大家印象</p>
								<div class="impression fr">
									<ul>
										<li>网上购买方便<span>(87)</span></li>
										<li>价格优惠<span>(55)</span></li>
										<li>支付方便<span>(50)</span></li>
										<li>产品保障全面(<span>(48)</span></li>
										<li>活动很好<span>(66)</span></li>
										<li>下次再来<span>(29)</span></li>
										<li>客服耐心、周到<span>(66)</span></li>
										<li>送保单快<span>(35)</span></li>
									</ul>
								</div>
							</div>
							<div class="grade-eva">
								<span><label><input type="radio" name="pj" checked="checked">全部(755)</label></span>
								<span><label><input type="radio" name="pj">好评(600)</label></span>
								<span><label><input type="radio" name="pj">中评(155)</label></span>
								<span><label><input type="radio" name="pj">差评(0)</label></span>
							</div>
							<div class="grade-main">
								<ul>
									<li>晓**评价：好<span>2017-03-16 14:49</span></li>
								    <li>晓**评价：好<span>2017-03-16 14:49</span></li>
								    <li>晓**评价：好<span>2017-03-16 14:49</span></li>
								    <li>晓**评价：好<span>2017-03-16 14:49</span></li>
								    <li>晓**评价：好<span>2017-03-16 14:49</span></li>
								    <li>晓**评价：好<span>2017-03-16 14:49</span></li>
								    <li>晓**评价：好<span>2017-03-16 14:49</span></li>
								</ul>
								 <div class="fy">
								</div>
							</div>
						</div>
					</div> -->

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
<script type="text/javascript" src="__JS__/main.js" ></script>
<script type="text/javascript" src="http://v3.jiathis.com/code/jia.js" charset="utf-8"></script>
<script>
	$(document).ready(function(){
		  $(".nav-main>li:eq(1)").addClass('indexon');
	})
</script>
