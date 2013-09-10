<div align="center">
 <img src="<?php echo SITE_URL.$model->pic_url;?>" 
 title="<?php echo $model->pic_desc;?>" height="300" width="500" align="center">
 <br/>
 相片描述：<font color=blue><?php echo $model->pic_desc;?></font>
 <br/>
 <a href="<?php echo Yii::app()->request->urlReferrer;?>">返回上一页</a>
</div>
