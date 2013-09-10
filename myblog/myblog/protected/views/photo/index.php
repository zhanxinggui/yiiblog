<?php $this->widget('bootstrap.widgets.TbMenu', array(
    'type'=>'tabs', // '', 'tabs', 'pills' (or 'list')
    'stacked'=>false, // whether this is a stacked menu
    'items'=>array(
        array('label'=>'Home', 'url'=>'index.php?r=home/index','active'=>true),
        array('label'=>'新建相册', 'url'=>'index.php?r=photo/create','linkOptions'=>array('target'=>'_blank')),
        
    ),
)); ?>

<?php $this->widget('bootstrap.widgets.TbThumbnails', array(
    'dataProvider'=>$dataProvider,
    'template'=>"{items}\n{pager}",
    'itemView'=>'view',
)); ?>