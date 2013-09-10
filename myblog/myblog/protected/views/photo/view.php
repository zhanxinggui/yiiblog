<li class="span3">
    <a href="index.php?r=photo/view&id=<?php echo $data->id;?>" class="thumbnail" rel="tooltip" data-title="Tooltip">
        <img src="<?php echo SITE_URL.$data->pic_url;?>" title="<?php echo$data->pic_desc;?>">
    </a>
    所属相册：<a href="index.php?r=photo/list&id=<?php echo $data->category_id;?>">
    《<?php echo$data->photocategory->category_name;?>》</a>
   &nbsp;&nbsp;<a href="index.php?r=photo/delete&id=<?php echo $data->id;?>&pic_url=<?php echo $data->pic_url;?>">删除图片</a>
</li>
