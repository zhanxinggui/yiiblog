<div class="post">
	<div class="title">
	
		<h2>
		<?php if ($data->is_transfer ==1){
			echo "【转载】";
		}else{
			echo "【原创】";
		}
		?>
		《<?php echo CHtml::link(CHtml::encode($data->title),  array('article/view','id'=>$data->id)); ?>》
		</h2>
	</div>
	<div class="author">
		posted by <?php echo $data->author->username . ' on ' . date('F j, Y',$data->create_time); ?>
		<!-- Baidu Button BEGIN -->
	    <div id="bdshare" class="bdshare_t bds_tools get-codes-bdshare">
	        <a class="bds_qzone"></a>
	        <a class="bds_tsina"></a>
	        <a class="bds_tqq"></a>
	        <a class="bds_renren"></a>
	        <span class="bds_more">更多</span>
			<a class="shareCount"></a>
	    </div>
		<script type="text/javascript" id="bdshare_js" data="type=tools&amp;uid=138127" ></script>
		<script type="text/javascript" id="bdshell_js"></script>
		<script type="text/javascript">
			document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion=" + new Date().getHours();
		</script>
		<!-- Baidu Button END -->
		<div class="clear"></div>
	</div>
	<div class="content">
		<?php
			$this->beginWidget('CMarkdown', array('purifyOutput'=>true));
			echo $data->content;
			$this->endWidget();
		?>
	</div>
	<div class="nav">
		<b>Tags:</b>
	<?php echo CHtml::link(CHtml::encode($data->tags), array('home/index','tags'=>$data->tags));?> &nbsp;
	<?php echo CHtml::link('阅读全文', array('article/view','id'=>$data->id));?>
	</div>
</div>
<br/>
<br/>