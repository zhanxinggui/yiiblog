<!DOCTYPE html>
<!-- saved from url=(0037)http://www.yii.com/demoblog/index.php -->
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<meta name="language" content="zh-cn">
<meta name="generator" content="WordPress 3.0.4">
<meta name="author" content="winds">
<meta name="description" content="微博客">
<meta name="Keywords" content="微博客">
<link rel="stylesheet" type="text/css"
	href="<?php echo CSS_URL;?>styles.css">
<link rel="stylesheet" type="text/css"
	href="<?php echo CSS_URL;?>highlight.css">
<link rel="stylesheet" type="text/css"
	href="<?php echo CSS_URL;?>pager.css">
<script type="text/javascript" src="<?php echo JS_URL;?>jquery.min.js"></script>
<script type="text/javascript"
	src="<?php echo JS_URL;?>jquery.ba-bbq.js"></script>
<title>微博客</title>
<link rel="stylesheet" type="text/css" media="all"
	href="<?php echo CSS_URL;?>style.css">
<link rel="alternate" type="application/rss+xml" title="个人官方网 » feed"
	href="http://www.dlf5.com/?feed=rss2">
<link rel="alternate" type="application/rss+xml" title="个人官方网 » 评论 feed"
	href="http://www.dlf5.com/?feed=comments-rss2">
<link rel="stylesheet" type="text/css"
	href="<?php echo CSS_URL;?>form.css">
<link rel="stylesheet" type="text/css"
	href="<?php echo CSS_URL;?>shCoreDefault.css">
<script type="text/javascript" src="<?php echo JS_URL;?>shCore.js"></script>
<script type="text/javascript"> SyntaxHighlighter.all()</script>
<script src="<?php echo JS_URL;?>logger.js"></script>
<link href="<?php echo CSS_URL;?>bdsstyle.css" rel="stylesheet"
	type="text/css">
</head>
<body>
<iframe frameborder="0" style="display: none;"></iframe>
<div id="bdshare_s" style="display: block;"><iframe id="bdsIfr"
	style="position: absolute; display: none; z-index: 9999;"
	frameborder="0"></iframe>
<div id="bdshare_m" style="display: none;">
<div id="bdshare_m_c">
<h6>分享到</h6>
<ul>
	<li><a href="http://www.yii.com/demoblog/index.php#"
		class="bds_mshare mshare">一键分享</a></li>
	<li><a href="http://www.yii.com/demoblog/index.php#"
		class="bds_qzone qqkj">QQ空间</a></li>
	<li><a href="http://www.yii.com/demoblog/index.php#"
		class="bds_tsina xlwb">新浪微博</a></li>
	<li><a href="http://www.yii.com/demoblog/index.php#"
		class="bds_baidu bdsc">百度云收藏</a></li>
	<li><a href="http://www.yii.com/demoblog/index.php#"
		class="bds_renren rrw">人人网</a></li>
	<li><a href="http://www.yii.com/demoblog/index.php#"
		class="bds_tqq txwb">腾讯微博</a></li>
	<li><a href="http://www.yii.com/demoblog/index.php#"
		class="bds_bdxc bdxc">百度相册</a></li>
	<li><a href="http://www.yii.com/demoblog/index.php#" class="bds_more">更多...</a></li>
</ul>
<p><a href="http://www.yii.com/demoblog/index.php#" class="goWebsite">百度分享</a></p>
</div>
</div>
</div>
<!-- 头部开始 -->
<div id="header">
<div id="top">
<div id="header-info">
<a href="./index.php" id="header-logo" title="<?php echo CHtml::encode(Yii::app()->name); ?>">
	<span><?php echo CHtml::encode(Yii::app()->name); ?></span>
</a>

<ul id="menu">
	<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Home', 'url'=>array('/home/index')),
				array('label'=>'About', 'url'=>array('/home/about')),
				array('label'=>'Contact', 'url'=>array('/site/contact')),
				array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),
		)); ?>
</ul>
</div>
</div>
</div>
<!-- 头部结束 -->

<div id="banner"></div>
	
<!-- 主体部份开始 -->
<div id="main"><!-- 内容部份开始 -->
<div id="container">
<div id="content">
<?php $this->widget('zii.widgets.CBreadcrumbs', array(
		'links'=>$this->breadcrumbs,
	)); ?><!-- breadcrumbs -->
	
<?php echo $content; ?>
</div>		
		

<!-- 边栏开始 -->
<div id="sidebar"><!-- 搜索开始 -->
<div class="search">
<form action="http://www.yii.com/" method="get" id="searchform"
	name="keyword"><input type="search" name="keywords"> <input
	type="submit" value="" name="" class="so"></form>
</div>
<!-- 搜索结束 -->

<div class="portlet-content" style="padding-top:20px;">

<ul>
<?php
    //在user组件里边有一个方法getIsGuest(),判断用户是否是游客
    if(Yii::app()->user->getIsGuest()){
?>


 <?php } else {?>
	<li>
    <font class="f4_b"><?php echo Yii::app()->user->name; ?></font>, 欢迎您回来！<br/>
    	<?php echo CHtml::link('用户中心', array('user/index','id'=>Yii::app()->user->id));?></br> 
    	<?php echo CHtml::link('退出系统', array('user/logout'));?></br> 

    </font>
    </li>
<?php } ?>
</ul>
</div>
<div class="category" id="yw2">
<div class="portlet-decoration">
<div class="portlet-title">功能</div>
</div>
<ul>
<?php
    //在user组件里边有一个方法getIsGuest(),判断用户是否是游客
    if(Yii::app()->user->getIsGuest()){
?>
	<li><a href="./index.php?r=user/login">Login</a>&nbsp;</li>
<?php } else {?>
<?php 
$this->widget('zii.widgets.CMenu',array(
    'items'=>array(
        array('label'=>'新建文章', 'url'=>array('/article/create')),
        array('label'=>'文章管理', 'url'=>array('/article/index')),
        array('label'=>'文章分类管理', 'url'=>array('/articlecategory/index')),
        array('label'=>'新建相册', 'url'=>array('/photo/create')),
        array('label'=>'相册管理', 'url'=>array('/photo/index')),
        array('label'=>'相册分类管理 ', 'url'=>array('/photocategory/index')),
    	array('label'=>'评论管理', 'url'=>array('/comment/index')),
        array('label'=>'修改个人资料', 'url'=>array('/user/update','id'=>Yii::app()->user->id)),
        array('label'=>'设置博客信息', 'url'=>array('/system/update'))
    
  	),
));

?>
<?php } ?>


</ul>
</div>
<div class="category" id="yw3">

			<?php $this->widget('TagCloud', array(
				'maxTags'=>Yii::app()->params['tagCloudCount'],
			)); ?>
</div>
<div class="category" id="yw4">
<?php $this->widget('RecentComments', array(
				'maxComments'=>Yii::app()->params['recentCommentCount'],
			)); ?>

</div>
<div class="category" id="yw5">

 <?php $this->widget('MonthlyArchives', array(
                'year'=>'年',
                'month'=>'月',
			)); ?>

</div>
<!-- 边栏结束 -->
<div class="clear"></div>
</div>
</div>
<!-- 内容部份结束 --></div>
<!-- 主体部份结束 -->

<!-- 脚部开始 -->
<div id="footer">
<div id="colophon">
<ul id="footer-nav">
	<li><a href="#" title="首页">首页</a>
	|</li>
	<li><a href="index.php?r=home/about" title="关于">关于</a>
	|</li>
	<li><a href="index.php?r=article/index" title="日志">日志</a>
	|</li>
	<li><a href="index.php?r=photo/index" title="相片">相片</a>
	|</li>
	<li><a href="index.php?r=site/contact" title="留言">留言</a>
	|</li>
	<li><a href="#" title="Sitemap">Sitemap</a>
	|</li>
	<li><a href="#" title="Rss">Rss</a>
	<div class="clear"></div>
	</li>
</ul>
<div id="copyright">Copyright © 2013 <a href="#"
	target="_blank" title="Zhanxinggui">Zhanxinggui</a> All Rights Reserved.
Powered By Zhanxinggui.</div>
</div>
</div>
<!-- 脚部结束 -->
<script type="text/javascript"
	src="./windsdeng's blog - Post_files/tongji.js"></script>
<img src="./windsdeng's blog - Post_files/tongji.do" border="0"
	width="1" height="1">
<!--[if IE 6]>
        <script type="text/javascript" src="/demoblog/themes/classic/js/png24.js" ></script>
        <script type="text/javascript">DD_belatedPNG.fix('a#header-logo,.up,.top');</script>
        <![endif]-->
<script type="text/javascript"
	src="./windsdeng's blog - Post_files/jquery.yiilistview.js"></script>
<script type="text/javascript">
/*<![CDATA[*/
jQuery(function($) {
jQuery('#yw0').yiiListView({'ajaxUpdate':[],'ajaxVar':'ajax','pagerClass':'pager','loadingClass':'list-view-loading','sorterClass':'sorter','enableHistory':false});
});
/*]]>*/
</script>

</body>
</html>	
		
		

