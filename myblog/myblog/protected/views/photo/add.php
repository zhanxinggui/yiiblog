<?php /** @var BootActiveForm $form */
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'horizontalForm',
    'type'=>'horizontal',
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),  
)); ?>
 
<fieldset>
 
    <legend>Legend</legend>
 	<?php echo $form->textAreaRow($model, 'pic_desc', array('class'=>'span8', 'rows'=>5)); ?>
    <?php echo $form->dropDownListRow($model, 'category_id', Photocategory::showAllCategory()); ?>
    <?php echo $form->dropDownListRow($model, 'status', array('1'=>'发布', '2'=>'草稿')); ?>
    <?php echo $form->fileFieldRow($model, 'pic_url'); ?>
    
 
</fieldset>
 
<div class="form-actions">
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Submit')); ?>
    <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'Reset')); ?>
</div>
 
<?php $this->endWidget(); ?>