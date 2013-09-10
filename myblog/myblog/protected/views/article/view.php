

<div id="banner"></div>

<!-- 主体部份开始 -->
<div id="main"><!-- 内容部份开始 -->
<div id="container">
<div id="content">

<li><!-- 文章开始 -->
<div class="post-text">
<div class="title"><a
	href="http://www.yii.com/demoblog/index.php?r=post/view&id=25&title=%E9%92%93%E9%B1%BC%E5%B2%9B%E6%98%AF%E4%B8%AD%E5%9B%BD%E7%9A%84#"
	target="_blank" title="name" class="author"></a> <i class="line_h"></i>
<h3><?php echo CHtml::link(CHtml::encode($model->title), $data->url);?></h3>
<p>作者:<?php echo $model->author->username;?>  
日期:<span><?php echo date('Y-m-d H:i:s',$model->update_time);?></span> 
 标签: <?php echo CHtml::link(CHtml::encode($model->tags), array('home/index','tags'=>$model->tags));?></a>
</p>
<a class="up" title="<?php echo $model->commentCount>1 ? $model->commentCount  : 0; ?>条评论"
	href="#"><?php echo $model->commentCount>1 ? $model->commentCount  : 0; ?></a>
</div>

<!-- <div class="post-banner"><img src="/demoblog/themes/classic/images/1294987190_56.jpg" alt="post-banner" /></div> -->

<div class="text">
<?php
	$this->beginWidget('CMarkdown', array('purifyOutput'=>true));
	echo $model->content;
	$this->endWidget();
?>
</div>
<div class="tools-bar">
<ul>
	<!--<li class="browse">浏览:5,877</li> -->
	<li class="share"><!-- Baidu Button BEGIN -->
	<div id="bdshare" class="bdshare_t bds_tools get-codes-bdshare"><span
		class="bds_more">分享到：</span> <a class="bds_qzone" title="分享到QQ空间"
		href="http://www.yii.com/demoblog/index.php?r=post/view&id=25&title=%E9%92%93%E9%B1%BC%E5%B2%9B%E6%98%AF%E4%B8%AD%E5%9B%BD%E7%9A%84#">QQ空间</a>
	<a class="bds_tsina" title="分享到新浪微博"
		href="http://www.yii.com/demoblog/index.php?r=post/view&id=25&title=%E9%92%93%E9%B1%BC%E5%B2%9B%E6%98%AF%E4%B8%AD%E5%9B%BD%E7%9A%84#">新浪微博</a>
	<a class="bds_tqq" title="分享到腾讯微博"
		href="http://www.yii.com/demoblog/index.php?r=post/view&id=25&title=%E9%92%93%E9%B1%BC%E5%B2%9B%E6%98%AF%E4%B8%AD%E5%9B%BD%E7%9A%84#">腾讯微博</a>
	<a class="bds_renren" title="分享到人人网"
		href="http://www.yii.com/demoblog/index.php?r=post/view&id=25&title=%E9%92%93%E9%B1%BC%E5%B2%9B%E6%98%AF%E4%B8%AD%E5%9B%BD%E7%9A%84#">人人网</a>
	<a class="shareCount"
		href="http://www.yii.com/demoblog/index.php?r=post/view&id=25&title=%E9%92%93%E9%B1%BC%E5%B2%9B%E6%98%AF%E4%B8%AD%E5%9B%BD%E7%9A%84#"
		title="累计分享0次">0</a></div>
	<script type="text/javascript" id="bdshare_js"
		data="type=tools&amp;mini=1&amp;uid=138127"
		src="./钓鱼岛是中国的_files/bds_s_v2.js"></script> <script
		type="text/javascript">
					document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion=" + new Date().getHours();
				</script> <!-- Baidu Button END --></li>
</ul>

<span style="font-size:14px;">
<?php 
if($model->author_id != Yii::app()->user->id){

?>
<a style="text-decoration:none;" href="index.php?r=article/transfer&id=<?php echo $model->id;?>">《转载此文章》</a>
<?php 
}
?>
</span>
<div class="clear"></div>
</div>
</div>
<!-- 文章结束 -->
</li>


<div id="comments">
	<?php if($model->commentCount>=1): ?>
		<h3>
			<?php echo $model->commentCount>1 ? $model->commentCount . ' comments' : 'One comment'; ?>
		</h3>

		<?php $this->renderPartial('comments',array(
			'post'=>$model,
			'comments'=>$model->comments,
		)); ?>
	<?php endif; ?>

	<h3>Leave a Comment</h3>

	<?php if(Yii::app()->user->hasFlash('commentSubmitted')): ?>
		<div class="flash-success">
			<?php echo Yii::app()->user->getFlash('commentSubmitted'); ?>
		</div>
	<?php else: ?>
		<?php $this->renderPartial('/comment/add',array(
			'model'=>$comment,
		)); ?>
	<?php endif; ?>

</div><!-- comments --></div>


