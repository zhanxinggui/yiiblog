<ul>
<?php foreach ($this->findAllArticleDate() as $v): ?>
<li>
<?php echo CHtml::link("$v->year$this->year$v->month$this->month($v->posts)",
    array('home/index',
         'year'=>$v->year,
         'month'=>$v->month,
        ));  ?>
    
</li>
<?php endforeach; ?>
</ul>