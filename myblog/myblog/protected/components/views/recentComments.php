<ul>
	<?php foreach($this->getRecentComments() as $comment): ?>
	<li><?php echo $comment->author; ?> on:
		<?php echo CHtml::link(CHtml::encode($comment->article->title), array('article/view','id'=>$comment->article_id)); ?>
	</li>
	<?php endforeach; ?>
</ul>