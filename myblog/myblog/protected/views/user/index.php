<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title><?php echo $model->username;?>的百度个人主页</title>
<script>window.wpo={start:new Date*1,pid:109,page:'princess'}</script>
<link type="text/css" rel="stylesheet"
	href="<?php echo CSS_URL;?>princess_4d3c2d3a.css">

</head>
<body>
<div class="skin01" id="wrapper">
<div class="bground">
<div id="banner">
<div class="banner-position">
<div style="display: block;" id="banhld" class="banner-content">
<div class="plzhld">
<div style="display: block;" id="1000001" class="mod-banner">
<span class="icon"><a href="#"	onclick="return false;" >
<?php echo $model->username;?></a></span>
<span class="icon">|<a
	href="<?php echo Yii::app()->homeUrl;?>">网站首页</a></span>
</div>
</div>
<a href="http://www.baidu.com/" target="_blank"><img class="logo-img"
	src="<?php echo IMG_URL;?>baidu_logo_c352a179.gif"
	alt="baidu.com"></a></div>
</div>
</div>
<div id="head">
<div style="display: block;" id="headhld">
<div class="plzhld">
<div style="display: block;" id="1000000" class="mod-head">
<div class="info-left  user-online">
<div class="portrait"><img class="portrait-img"
	src="<?php echo SITE_URL;?><?php if($model->headpic && file_exists($model->headpic)){echo $model->headpic;}else{echo "/uploads/default.jpg";}?>"><span></span>
</div>
<span class="picicon"></span></div>
<div class="info-right">
<div class="user-name clearfix">
<h2 class="yahei"><?php echo $model->username;?></h2>
</div>
<div class="user-info clearfix">
<div class="info">
性别：<?php echo $model->sex==1?"男":"女";?> &nbsp;&nbsp;

简介：<?php echo $model->description;?></div>

</div>
<p class="personal-url">
<span class="url-desc">个人网址：
<a href="<?php echo $model->homepage;?>" target="_brank"><?php echo $model->homepage;?></a></span>
<a class="detail-link" href="#"
	target="_blank">查看更多资料&gt;&gt;</a></p>
</div>
</div>
</div>
</div>
</div>
<div id="content">
<div style="display: block;" id="cnthld" class="baidu">
<ul class="content-tab">
	<li class="reward-tab"><a id="rewardtab" href="#"
		class="tab-title songti tabbtn" hidefocus="" data-click="reward"><span
		class="tab-title-tag">我在</span>搜索</a></li>
	<li class="space-tab"><a id="spacetab" href="#"
		class="tab-title songti tabbtn" hidefocus="" data-click="space"><span
		class="tab-title-tag">我在</span>空间</a></li>
	<li class="xiangce-tab"><a id="xiangcetab" href="index.php?r=photo/index"
		class="tab-title songti tabbtn" hidefocus="" data-click="xiangce"><span
		class="tab-title-tag">我在</span>相册</a></li>
</ul>
<div class="cnthld-main clearfix">
<div class="loadingtpl">LOADING...</div>
<div class="col leftside">
<div class="plzhld" data-fill="tab_content">
<div style="display: block;" id="mod_summary" class="mod-summary">
<h2 class="headline">我使用过的</h2>
<ul class="product-summary-list summary-list-fix clearfix">
	<li class="prod-item">
	<div class="prod-zhidao">
	<div class="title"><span class="icon"></span> <span class="prod-name">
	<a class="prod-link" href="http://zhidao.baidu.com/"
		data-click="zhidao"
		onclick="F.use('summary/main',function(main){main.run(event)})">知道</a>
	</span></div>
	<div class="cnt">
	<ul class="prop-list prop-list-num0 clearfix">
		<li class="prop-item"><span class="prop-val"><a class="prod-link"
			href="#" data-click="zhidao"
			onclick="F.use('summary/main',function(main){main.run(event)})">11</a>
		</span> <span class="prop-key">回答数</span></li>
		<li class="prop-item"><span class="prop-val"><a class="prod-link"
			href="#" data-click="zhidao"
			onclick="F.use('summary/main',function(main){main.run(event)})">8%</a>
		</span> <span class="prop-key">采纳率</span></li>
		<li class="prop-item"><span class="prop-val"><a class="prod-link"
			href="#" data-click="zhidao"
			onclick="F.use('summary/main',function(main){main.run(event)})">2</a>
		</span> <span class="prop-key">身份等级</span></li>
	</ul>
	</div>
	</div>
	</li>
	<li class="prod-item">
	<div class="prod-tieba">
	<div class="title"><span class="icon"></span> <span class="prod-name">
	<a class="prod-link" href="http://tieba.baidu.com/" data-click="tieba"
		onclick="F.use('summary/main',function(main){main.run(event)})">贴吧</a>
	</span> <span class="prod-exp">[使用3.6年]</span></div>
	<div class="cnt">
	<ul class="prop-list prop-list-num0 clearfix">
		<li class="prop-item"><span class="prop-val"><a class="prod-link"
			href="#" data-click="tieba"
			onclick="F.use('summary/main',function(main){main.run(event)})">0</a></span>
		<span class="prop-key" title="喜欢的吧">喜欢的吧</span></li>
		<li class="prop-item"><span class="prop-val"><a class="prod-link"
			href="#" data-click="tieba"
			onclick="F.use('summary/main',function(main){main.run(event)})">0</a></span>
		<span class="prop-key" title="粉丝">粉丝</span></li>
	</ul>
	</div>
	</div>
	</li>
	<li class="prod-item">
	<div class="prod-space">
	<div class="title"><span class="icon"></span> <span class="prod-name">
	<a class="prod-link" href="http://hi.baidu.com/" data-click="space"
		onclick="F.use('summary/main',function(main){main.run(event)})">空间</a>
	</span></div>
	<div class="cnt">
	<ul class="prop-list prop-list-num0 clearfix">
		<li class="prop-item"><span class="prop-val"><a class="prod-link"
			href="#" data-click="space"
			onclick="F.use('summary/main',function(main){main.run(event)})">0</a>
		</span> <span class="prop-key">文章</span></li>
		<li class="prop-item"><span class="prop-val"><a class="prod-link"
			href="#" data-click="space"
			onclick="F.use('summary/main',function(main){main.run(event)})">0</a>
		</span> <span class="prop-key">粉丝</span></li>
	</ul>
	</div>
	</div>
	</li>
</ul>
</div>
</div>
<div class="plzhld" data-fill="feed_content">
<div style="display: block;" id="timelinecontainer"
	class="mod-timeline-hld clearfix">
<div class="headline-ctn">
<h2 class="headline">我的百度大事记</h2>
<span class="headline-arr"></span></div>
<div id="aside">
<div class="mod-timelinenav">
<ul class="timelinenav-panel" id="timelinenavpanel">
	<li data-year="2013" class="norecord"><a href="#" class="yearlink "
		hidefocus="">2013年</a>
	<ul class="timelinenav-mpanel">
	</ul>


	</li>
	<li data-year="2012" class="norecord"><a href="#" class="yearlink "
		hidefocus="">2012年</a>
	<ul class="timelinenav-mpanel">
	</ul>


	</li>
	<li data-year="2011" class="norecord"><a href="#" class="yearlink "
		hidefocus="">2011年</a>
	<ul class="timelinenav-mpanel">
	</ul>


	</li>
	<li data-year="2010" class="norecord"><a href="#" class="yearlink "
		hidefocus="">2010年</a>
	<ul class="timelinenav-mpanel">
	</ul>

	</li>
</ul>
</div>
</div>
<div id="timelineholder">
<div class="mod-timeline noinitcontent fiveyearcontent">
<div class="timeline-main-panel" id="timelinemain">
<div class="timeline-cat timeline-init-loading">
<ol class="timeline-main clearfix">
	<li>
	<div class="timeline-loading-bg w442">
	<p class="timeline-loading-cnt">努力为您加载中，请稍候</p>
	</div>
	</li>
</ol>
</div>
<div class="timeline-cat nocontent getmore" id="nocontenttimelinecat">
<ol class="timeline-main clearfix">
	<li class="timeline-rec right-col clearfix">
	<div class="timeline-rec-timestamp"></div>
	<div class="timeline-rec-cnt w442 lightblue">
	<div class="rec-arr"></div>
	<p class="nocontent-cnt">我近期有些内敛！<br>
	没有历程信息</p>
	</div>
	</li>
</ol>
</div>
</div>
<div class="timeline-cat joinbaidu">
<ol class="timeline-main clearfix">
	<li class="timeline-rec clearfix">
	<div class="rec-cnt">
	<p class="joinbaidu-cnt yahei" id="joinbaiducnt">2010年我注册了百度帐号</p>
	</div>
	</li>
</ol>
</div>
</div>
</div>
</div>
</div>
<div class="leftside-shadow"></div>
</div>
<div class="col rightside">
<div class="plzhld p1" data-fill="friend_content"></div>
</div>
</div>
</div>
</div>
<div id="foot">
<div class="mod-footer">
<div class="bottom-line2">
<p>© Baidu <a target="_blank" href="http://www.baidu.com/duty/">使用百度前必读</a>
<a href="http://www.miibeian.gov.cn/" target="_blank">京ICP证030173号</a> <em
	class="s-bottom-copyright">&nbsp;&nbsp;&nbsp;&nbsp;</em></p>
</div>
</div>
</div>
</div>
<div style="display: block;" class="mod-right-nav nav-normal"
	id="navhld">
<div class="plzhld">
<div style="display: block;" id="1000002" class="right-nav-issues"><span
	class="question-mark"></span> <a
	href="http://qingting.baidu.com/index?pid=17" class="issues"
	target="_blank">意见反馈</a></div>
</div>
</div>
<a style="display: none; position: fixed; bottom: 5px; right: 109.5px;"
	class="mod-go-top-btn" href="#" onclick="return false"></a></div>

</body>
</html>
