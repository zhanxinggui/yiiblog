<?php
$this->breadcrumbs=array(
	Yii::t('backend', 'Categories'),
);

$this->menu=array(
	array('label'=>Yii::t('backend', '新建分类'),'url'=>array('create')),
	array('label'=>Yii::t('backend', '管理分类'),'url'=>array('index')),
);
?>

<h1>Categories</h1>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'dataProvider'=>$dataProvider,
	'template'=>'{items}',
	'columns'=>array(
        array('name'=>'id', 'header'=>'#'),
        array('name'=>'f_id', 'header'=>'上级类别'),
        array('name'=>'category_name', 'header'=>'类名'),
        array('name'=>'sort_num', 'header'=>'排序id'),
        array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'htmlOptions'=>array('style'=>'width: 50px'),
        ),
    ),
)); ?>