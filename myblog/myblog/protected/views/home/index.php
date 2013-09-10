

<div id="banner"></div>
<!-- 主体部份开始 -->
<div id="main"><!-- 内容部份开始 -->
<div id="container">
<div id="content">
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'view',
	'ajaxUpdate'=>false,
)); ?>

</div>

