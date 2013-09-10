
<div id="banner"></div>

<h3>Transfer article</h3>


<!-- 主体部份开始 -->
<div id="main"><!-- 内容部份开始 -->
<div id="container">
<div id="content">

<div class="form">

<?php $form=$this->beginWidget('CActiveForm'); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo CHtml::errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'transfer_info'); ?>
		<?php echo CHtml::activeTextArea($model,'transfer_info',array('rows'=>5,'cols'=>89,'style'=>'width: 630px;padding: 5px;')); ?>
		<?php echo $form->error($model,'transfer_info'); ?>
	</div>


	<div class="row buttons">
		<?php $this->widget('zii.widgets.jui.CJuiButton', array(
			     	'name'=>'submit',
			  		'caption'=>'Transfer',
			  		'options'=>array(
			          	'onclick'=>'js:function(){alert("Yes");}',
		  		),
		  ));
		?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
<!-- form -->
</div>

