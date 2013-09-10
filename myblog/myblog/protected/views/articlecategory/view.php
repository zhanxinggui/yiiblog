<?php
$this->breadcrumbs=array(
	'Categories'=>array('index'),
	$model->category_name,
);

$this->menu=array(
	array('label'=>'List Category', 'url'=>array('index')),
	array('label'=>'Create Category', 'url'=>array('create')),
);
?>

<h1>View Category #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'f_id',
		'category_name',
		'sort_num',
	),
)); ?>