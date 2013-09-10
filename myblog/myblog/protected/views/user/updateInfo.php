<!DOCTYPE html>
<!-- saved from url=(0074)http://reg.email.163.com/unireg/call.do?cmd=register.entrance&from=126mail -->
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<title>个人信息</title>
<script type="text/javascript" src="<?php echo JS_URL;?>main.js"></script>
<link rel="shortcut icon" href="http://mail.163.com/favicon.ico">
<link href="<?php echo CSS_URL;?>register.css" rel="stylesheet"
	type="text/css">
</head>
<body>

<header class="header">
<div class="bg"><a tabindex="-1" href="#" target="_blank" title="微博客">微博客</a>
</div>
<div class="links"><a href="#" target="_blank">了解更多</a>| <a href="#"
	target="_blank">反馈意见</a></div>
</header>
<section class="content" id="mainSection">


<header class="content-tit">
<h1>更新个人信息</h1>
</header>

<div id="mMaskD" class="mainBody-wp">
<div class="m-mask" style="display: none;"></div>
<div class="mainBody">

<div id="regMobile" class="regForm" style="display: block;">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'update-form',
	'enableClientValidation'=>true,
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),  
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

<dl id="mobilePwdDl" class="regForm-item">
	<dt class="regForm-item-tit">
	<span class="txt-impt">*</span><?php echo $form->labelEx($model,'username');?> 
	</dt>
	<dd class="regForm-item-ct">
	<?php echo $form->textField($model,'username',array('class'=>'ipt norWidthIpt','id'=>'mobilePwdIpt'));?>
	<div id="mobilePwdTips" class="tips" style="position: relative;">
	<?php echo $form->error($model,'username',array('class'=>'txt-tips'));?>
	</div>
	</dd>
</dl>

<dl id="mobilePwdDl" class="regForm-item">
	<dt class="regForm-item-tit">
	<span class="txt-impt">*</span><?php echo $form->labelEx($model,'headpic');?> 
	</dt>
	<dd class="regForm-item-ct">
	<?php echo $form->fileField($model,'headpic',array('class'=>'ipt norWidthIpt','id'=>'mobilePwdIpt'));?>
	<div id="mobilePwdTips" class="tips" style="position: relative;">
	<?php echo $form->error($model,'headpic',array('class'=>'txt-tips'));?>
	</div>
	</dd>
</dl>
<dl id="mobilePwdDl" class="regForm-item">
	<dt class="regForm-item-tit">
	<span class="txt-impt">*</span><?php echo $form->labelEx($model,'description');?> 
	</dt>
	<dd class="regForm-item-ct">
	<?php echo $form->textArea($model,'description',array('class'=>'ipt norWidthIpt','id'=>'mobilePwdIpt','rows'=>6,'cols'=>50));?>
	<div id="mobilePwdTips" class="tips" style="position: relative;">
	<?php echo $form->error($model,'description',array('class'=>'txt-tips'));?>
	</div>
	</dd>
</dl>
<dl id="mobilePwdDl" class="regForm-item">
	<dt class="regForm-item-tit">
	<span class="txt-impt">*</span><?php echo $form->labelEx($model,'qq');?> 
	</dt>
	<dd class="regForm-item-ct">
	<?php echo $form->textField($model,'qq',array('class'=>'ipt norWidthIpt','id'=>'mobilePwdIpt'));?>
	<div id="mobilePwdTips" class="tips" style="position: relative;">
	<?php echo $form->error($model,'qq',array('class'=>'txt-tips'));?>
	</div>
	</dd>
</dl>
<dl id="mobilePwdDl" class="regForm-item">
	<dt class="regForm-item-tit">
	<span class="txt-impt">*</span><?php echo $form->labelEx($model,'homepage');?> 
	</dt>
	<dd class="regForm-item-ct">
	<?php echo $form->urlField($model,'homepage',array('class'=>'ipt norWidthIpt','id'=>'mobilePwdIpt'));?>
	<div id="mobilePwdTips" class="tips" style="position: relative;">
	<?php echo $form->error($model,'homepage',array('class'=>'txt-tips'));?>
	</div>
	</dd>
</dl>

<dl id="acodeDl" class="regForm-item">
	<dt class="regForm-item-tit"><span class="txt-impt">*</span><?php echo $form->labelEx($model,'email');?> </dt>
	<dd class="regForm-item-ct">
	<?php echo $form->textField($model,'email',array('class'=>'ipt norWidthIpt','id'=>'mobilePwdIpt'));?>
	<div id="acodeTips" class="tips" style="">
	<?php echo $form->error($model,'email');?>
	</div>
	</dd>
</dl>


<dl class="regForm-item">
	<dd class="regForm-item-ct">
	<?php echo CHtml::submitButton('更新信息',array('class'=>'btnReg','id'=>'mobileRegA'));?>
	</dd>
</dl>
<?php  $this->endWidget();?>
</div>
</div>
<aside class="mainBody-side">
<div class="regExt"><img src="<?php echo IMG_URL;?>reg_sms.gif"
	alt="快速注册">
<div class="tips">温馨提示：欢迎开始微博客之旅~</div>

</div>
</aside>
<div class="clear"></div>
</div>
</section>
<section class="content" id="secondarySection" style="display:none"></section>
<footer class="footer">
<a href="#" target="_blank">关于微博客</a>
&nbsp;&nbsp;
<a href="#" target="_blank">问题反馈</a>
&nbsp;&nbsp;
<a href="#" target="_blank">客户服务</a>
&nbsp;&nbsp;
<a href="#" target="_blank">隐私政策</a>
&nbsp;&nbsp;|&nbsp;&nbsp; 微博客版权所有&nbsp;©&nbsp;2013-2015
</footer>

</body>
</html>
