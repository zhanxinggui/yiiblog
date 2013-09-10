<?php
$this->breadcrumbs=array(
	'Categories'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Category', 'url'=>array('index')),
);
?>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'verticalForm',
    'htmlOptions'=>array('class'=>'well'),
)); ?>

	<p class="help-block">更新评论状态</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->dropDownList($model,'status',array('2'=>'审核通过','1'=>'审核失败')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton',array('buttonType'=>'submit', 'label'=>'更新')); ?>
	</div>

<?php $this->endWidget(); ?>