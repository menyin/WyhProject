<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:68:"F:\fabaodou\public/../application/user/view/default/index\index.html";i:1505875525;s:68:"F:\fabaodou\public/../application/user/view/default/public\base.html";i:1505974105;}*/ ?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?php echo $metaTitle; ?>_法保兜保险网</title>
    <meta name="keywords" content="<?php echo $metaKeywords; ?>">
    <meta name="description" content="<?php echo $metaDescription; ?>">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <link rel="stylesheet" href="__CSS__/user/default.css" />
    
    <script>
    	document.oncontextmenu=function(e){return false;}
    </script>
</head>
<body class="no-copy">
    <header>
        <div class="header-top">
            <a name="one"></a>
            <div class="width-center">
                <div class="header-logo "><a href="/"><img src="__IMG__/user/logo.png" alt=""></a></div>
                <div class="header-title div-inline">
                    <strong><?php echo $agentInfo['name']; ?></strong>
                    <a href="<?php echo url('/user/Index/index'); ?>?id=<?php echo $agentId; ?>"><span>的个人网站</span></a>
                </div>

                <div class="search-box div-inline">
                    <div class="input-box"><input type="text" name="" placeholder="请输入关键字"></div>
                    <div class="search-botton"></div>
                </div>
            </div>
        </div>
        <div class="header-nav">
            <button class="am-show-sm-only am-collapsed font f-btn" data-am-collapse="{target: '.header-nav'}">Menu <i
                    class="am-icon-bars"></i></button>
            <nav>
            <ul class="header-nav-ul am-collapse am-in">
                <li class="on"><a href="<?php echo url('/user/Index/index'); ?>?id=<?php echo $agentId; ?>" name="index">首页</a></li>
                <!-- <li><a href="<?php echo url('/user/About/index'); ?>?id=<?php echo $agentId; ?>" name="about">关于我们</a></li> -->
                <li><a href="<?php echo url('/user/Cases/index'); ?>?id=<?php echo $agentId; ?>" name="show">案例展示</a></li>
                <li><a href="<?php echo url('/user/Article/news'); ?>?id=<?php echo $agentId; ?>" name="new">新闻资讯</a></li>
                <li><a href="<?php echo url('/user/Insurance/index'); ?>?id=<?php echo $agentId; ?>" name="new">保险产品</a></li>
                <li><a href="<?php echo url('/user/About/contact'); ?>?id=<?php echo $agentId; ?>" name="message">联系我们</a>
                    <div class="secondary-menu">
                        <ul><li><a href="<?php echo url('/user/About/message'); ?>?id=<?php echo $agentId; ?>" class="message"></a></li></ul>
                    </div>
                </li>
            </ul>
            </nav>
        </div>
    </header>
    <div class="am-slider am-slider-default" data-am-flexslider>
        <ul class="am-slides">
            <li><img src="__IMG__/user/use1.jpg" alt="" ></li>
            <li><img src="__IMG__/user/use1.jpg" alt="" ></li>
            <li><img src="__IMG__/user/use1.jpg" alt="" ></li>
            <li><img src="__IMG__/user/use1.jpg" alt="" ></li>
        </ul>
        <!--保险代理人信息-->
        <div class="people">
            <div class="people-me">
                <div class="people-me-img">
                    <!--代理人头像-->
                      <img src="<?php echo $agentInfo['head_img']; ?>" height="300" width="300">
                </div>
                <div class="people-me-main">
                    <p class="name"><?php echo $agentInfo['name']; ?></p>
                    <p><?php echo $agentInfo['mobile']; ?></p>
                    <p>所属机构：<span><?php echo $agentInfo['company']; ?></span></p>
                    <p>执业证号：<span><?php echo $agentInfo['license']; ?></span></p>
                    <p>资格证号：<span><?php echo $agentInfo['certification']; ?></span></p>
                    <p>所在地区：<span><?php echo $agentInfo['province_name']; ?>&nbsp;<?php echo $agentInfo['city_name']; ?></span></p>
                    <p>执业年限：<span><?php echo $agentInfo['experience_title']; ?></span></p>
                </div>
            </div>
            <!--保险微信-->
             <div class="people-other">
                <div class="people-wechat">
                    <img src="<?php echo $agentInfo['wechat_qrcode']; ?>" height="170" width="170">
                </div>
             </div>
         </div>
    </div>
    
<!--4个圆圈部分-->
<section class="index-product">
    <main>
        <ul>
            <li class="index-active"><a href="#one">首页</a></li>
            <li><a href="#two">自我介绍</a></li>
            <li><a href="#three">精选案例</a></li>
            <li><a href="#four">最新资讯</a></li>
        </ul>
    </main>

    <main></main>
    <main></main>

</section>
<!--自我介绍-->

<section class="index-section">
    <div>
        <span></span>
        <span></span>
    </div>
    <div class="index-content">
        <section class="index-content-section-first index-content-section-second">
        	 <div>
                <div class="index-auto">
                	<a name="two"></a>
		            <article>个人荣誉</article>
		            <h6>PERSONAL-HONOR</h6>
		            <main><?php echo $agentInfo['honor']; ?></main>
                </div>
            </div>
        </section>
        <section class="index-content-section-second">
            <div>
                <div class="index-auto">
                	<a name="two"></a>
		            <article>自我介绍</article>
		            <h6>SELF-INTRODUCTION</h6>
		            <main><?php echo $agentInfo['introduction']; ?></main>
                </div>
            </div>
        </section>

    </div>
</section>

<!--荣誉墙-->
<section class="index-margin-bottom">
    <div class="index-morecase">
        <span class="case casery"></span>
    </div>
    <div class="index-content">
        <div class="product-list product-list1">
        <?php if(empty($honors) || (($honors instanceof \think\Collection || $honors instanceof \think\Paginator ) && $honors->isEmpty())): ?>
            <div class="am-u-sm-3 am-u-md-3 am-u-lg-3">
                <a href="javascript:void(0)">
                    <img src="__IMG__/user/no-honer.png">
                </a>
            </div>
            <div class="am-u-sm-3 am-u-md-3 am-u-lg-3">
                <a href="javascript:void(0)">
                    <img src="__IMG__/user/no-honer.png">
                </a>
            </div>
            <div class="am-u-sm-3 am-u-md-3 am-u-lg-3">
                <a href="javascript:void(0)">
                     <img src="__IMG__/user/no-honer.png">
                </a>
            </div>
            <div class="am-u-sm-3 am-u-md-3 am-u-lg-3">
                <a href="javascript:void(0)">
                     <img src="__IMG__/user/no-honer.png">
                </a>
            </div>
        <?php else: foreach($honors as $k=>$row): ?>
                <div class="am-u-sm-3 am-u-md-3 am-u-lg-3">
                    <a href="javascript:void(0)">
                       <img src="<?php echo $row['path']; ?>">
                    </a>
                </div>
            <?php endforeach; endif; ?>
        </div>
    </div>
</section>

<!--精选案例-->
<a name="three"></a>
<section class="index-margin-bottom">
    <div class="index-morecase">
        <span class="case"></span>
        <a href="<?php echo url('/user/Cases/index'); ?>?id=<?php echo (isset($agentId) && ($agentId !== '')?$agentId:3); ?>">MORE &#62; &#62;</a>
    </div>
    <div class="index-content">
        <div class="product-list">
        <?php foreach($cases as $row): ?>
            <div class="am-u-sm-4am-u-md-4 am-u-lg-4">
                <a href="<?php echo url('user/Article/detail', ['article_id'=>$row['article_id']]); ?>?id=<?php echo (isset($agentId) && ($agentId !== '')?$agentId:3); ?>">
                    <p><?php echo $row['title']; ?></p>
                    <p><?php echo $row['desc']; ?></p>
                </a>
            </div>
        <?php endforeach; ?>
        </div>
    </div>
</section>

<!--精选资讯-->
<a name="four"></a>
<section class="index-margin-bottom">
    <div class="index-morecase">
        <span></span>
        <a href="<?php echo url('/user/Article/news'); ?>?id=<?php echo (isset($agentId) && ($agentId !== '')?$agentId:3); ?>">MORE &#62; &#62;</a>
    </div>
    <div class="index-content">


        <div class="new-index">
            <ul>
                <li><img  src="__IMG__/user/productlogo.png" alt=""> </li>
                <li>  <a href="<?php echo url('user/Article/detail',['article_id'=>$firstArticle['article_id']]); ?>?id=<?php echo $agentId; ?>"><h3><?php echo $firstArticle['title']; ?></h3>
                    <article><?php echo $firstArticle['desc']; ?></article></a></li>
            </ul>
            <ul>
            <?php foreach($articles as $row): ?>
                <li><a href="article_list_content.html"><h3><?php echo $row['title']; ?></h3>
                    <article><?php echo $row['desc']; ?></article>
                </a></li>
            <?php endforeach; ?>
            </ul>

        </div>
    </div>
</section>

﻿
    <footer>
        <div>
            <div class="footer-info">
                <div class="footer-content">
                    <img src="<?php echo $agentInfo['wechat_qrcode']; ?>" alt="微信二维码"   height="149" width="149">
                   <div>
                    <p>客服热线:<?php echo $agentInfo['phone']; ?></p>
                    <div class="footer-box">
                        <i class="icon-tel"></i>
                        <span>公司电话:</span>
                        <span><?php echo $agentInfo['phone']; ?></span>
                    </div>
                    <div class="footer-box">
                        <i class="icon-email"></i>
                        <span>公司邮箱:</span>
                        <span><?php echo $agentInfo['email']; ?></span>
                    </div>
                    <div class="footer-box">
                        <i class="icon-address"></i>
                        <span>公司地址:</span>
                        <span><?php echo $agentInfo['address']; ?></span>
                    </div>
                   </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div style="text-align:center;color:#fff;line-height:50px;">
                    <span>
                        <a href="http://www.doudouchongkeji.com/" target="_blank" title="兜兜虫科技">兜兜虫</a>提供 - More Message
                        <a href="http://www.fabaodou.com/" target="_blank" title="法保兜">法保兜</a>
                    </span>
                    <span> CROPYRIGHT 2015-2017 兜兜虫（厦门）科技有限公司版权所有     &nbsp;24小时服务电话：159-6020-9233  </span><br />
                    <span> 公司邮箱：1992355937@qq.com  客服QQ:1992355937  粤ICP备13014375号</span><br />
                </div>
            </div>
        </div>
    </footer>

    <!--[if (gte IE 9)|!(IE)]><!-->
    <script type="text/javascript" src="__JS__/user/jquery.min.js"></script>
    <!--<![endif]-->
    <!--[if lte IE 8 ]>
    <script src="http://libs.baidu.com/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
    <script src="lib/amazeui/amazeui.ie8polyfill.min.js"></script>
    <![endif]-->
    <script type="text/javascript" src="__JS__/user/handlebars.min.js"></script>
    <script type="text/javascript" src="__JS__/user/iscroll-probe.js"></script>
    <script type="text/javascript" src="__JS__/user/amazeui.min.js"></script>
<!--     <script type="text/javascript" src="__JS__/user/jquery.raty.js"></script> -->
    <script type="text/javascript" src="__JS__/user/main.min.js?t=1"></script>
    
</body>
</html>
