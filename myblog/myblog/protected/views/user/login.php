<!DOCTYPE html>
<!-- saved from url=(0020)http://mail.126.com/ -->
<html style="display: block;"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>登录页</title>		
		<meta name="description" content="">
		<meta name="keywords" content="">
		<link rel="shortcut icon" href="http://www.126.com/favicon.ico">
		<link href="<?php echo CSS_URL;?>login.css" rel="stylesheet" type="text/css">	
	</head>
<body style="padding-top: 28px;">
	<header class="header">
		<h1 class="headerLogo"><a href="#" target="_blank" title="走近微博客">
		<img src="<?php echo IMG_URL;?>logo3.gif" alt="微博客"></a></h1>
		<a class="headerIntro" href="#" target="_blank" title="走近微博客">
		<span class="unvisi">微博客</span></a>
	</header>
	<section class="main" id="mainBg" style="background-image: url(<?php echo IMG_URL;?>../130813_geci_bg.jpg); background-repeat: repeat no-repeat;">
		<div class="main-inner" id="mainCnt" style="background-image: url(<?php echo IMG_URL;?>130813_geci_cnt.jpg); background-position: 50% 0%; background-repeat: no-repeat no-repeat;">
			<div id="loginBlock" class="login tab-1">	
				<div class="loginForm">
					<?php $form=$this->beginWidget('CActiveForm', array(
						'id'=>'login-form',
						'enableClientValidation'=>true,
						'clientOptions'=>array(
							'validateOnSubmit'=>true,
						),
					)); ?>
						<input type="hidden" id="url2" name="url2" value="http://mail.126.com/errorpage/err_126.htm">
						<div id="idInputLine" class="loginFormIpt showPlaceholder showPlaceholder showPlaceholder">
							<?php echo $form->textField($model,'username',array('class'=>'loginFormTdIpt','id'=>'idInput'));?> 
						</div>
						<div class="forgetPwdLine">
						</div>
						<div id="pwdInputLine" class="loginFormIpt showPlaceholder showPlaceholder showPlaceholder">
							<?php echo $form->textField($model,'password',array('class'=>'loginFormTdIpt','id'=>'pwdInput'));?> 
						</div>
						
						<div id="lfAutoLogin" class="loginFormCheck">
							<div class="loginFormCheckInner">
								<?php echo $form->checkBox($model,'rememberMe',array('class'=>'loginFormCbx','id'=>'remAutoLogin')); ?>
								<?php echo $form->label($model,'rememberMe',array('class'=>'loginFormSslText','id'=>'remAutoLoginTxt')); ?>
							</div>
							<div class="loginFormCheckInner" style="float:right;text-align:right;width:100px;">
								<a href="index.php?r=user/register" target="_blank" class="forgetPwd">注册新用户</a>
							</div>
						</div>
						<div class="loginFormIpt loginFormIptWiotTh">
							<?php echo CHtml::submitButton('Login',array('id'=>'loginBtn','class'=>'btn btn-login')); ?>
						</div>
					<?php $this->endWidget(); ?>
					<div class="ext" id="loginExt">
						<ul id="extText">
							<li><a id="gadext1" href="#" target="_blank" style="">微博客1.0版介绍</a>&nbsp;|&nbsp;<a href="#" target="_blank">在线答疑</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>

	<footer id="footer" class="footer">
		<div class="footer-inner" id="footerInner">
			<a class="footerLogo" href="#" target="_blank">
			<img src="<?php echo IMG_URL;?>logo3.gif" title="微博客"></a>
			<nav class="footerNav">
				<a href="#" target="_blank">关于微博客</a>
				<a href="#" target="_blank">问题反馈</a>
				<a href="#" target="_blank">客户服务</a>
				<a style="margin-right:26px" href="#" target="_blank">隐私政策</a>|
				<span class="copyright">微博客版权所有 &#169; 2013-2015</span>
			</nav>
		</div>
	</footer>
	
</body></html>