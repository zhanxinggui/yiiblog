<?php
$this->widget('bootstrap.widgets.TbGridView',array(
	'dataProvider'=>$dataProvider,
	'template'=>'{items}',
	'columns'=>array(
        array('name'=>'id', 'header'=>'#'),
        array('name'=>'author', 'header'=>'作者','value'=>'$data->author'),
        array('name'=>'email', 'header'=>'邮箱'),
        array('name'=>'ip', 'header'=>'ip'),
        array('name'=>'status', 'header'=>'发布状态'),
        array('name'=>'comment_time', 'header'=>'发布时间','value'=>'date("Y-m-d H:i:s",$data->comment_time)'),
        array('name'=>'comment_time', 'header'=>'评论的文章','value'=>'$data->article->title'),
        array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'htmlOptions'=>array('style'=>'width: 50px'),
        ),
    ),

));