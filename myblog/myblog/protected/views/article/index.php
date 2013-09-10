<?php
$this->breadcrumbs=array(
	'Articles'=>array('index'),
	'Manage',
);

?>


<script type="text/javascript">

/*<![CDATA[*/
  var Checkbox = function (){
	  $("#yw0_c9_all").click(function(){

		  $("[name='selectdel[]']").each(function(){//反选
	              if($(this).attr("checked")){
	                $(this).removeAttr("checked");
	            }
	            else{
	                $(this).attr("checked",'true');
	            }
          })
		    
		});

	}

    var GetCheckbox = function (){
            var data=new Array();
            $("input:checkbox[name='selectdel[]']").each(function (){
                    if($(this).attr("checked")){
                            data.push($(this).val());
                    }
            });
            if(data.length > 0){
                    $.post('<?php echo $this->createUrl('article/delall');?>',{'selectdel[]':data}, function (data) {
                            var ret = $.parseJSON(data);
                            if (ret != null && ret.success != null && ret.success) {
                            	window.location.reload();
                            }
                    });
            }else{
                    alert("请选择要删除的条目!");
            }
    }
    /*]]>*/
    
</script>


<?php

$this->widget('zii.widgets.grid.CGridView',array(
	'dataProvider'=>$dataProvider,
	'template'=>'{items}',
	'columns'=>array(
        array('name'=>'id', 'header'=>'#'),
        array('name'=>'author_id', 'header'=>'作者','value'=>Article::placestr($data->author->username)),
        array('name'=>'title', 'header'=>'标题'),
        array('name'=>'summary', 'header'=>'摘要'),
        array('name'=>'tags', 'header'=>'标签'),
        array('name'=>'status', 'header'=>'发布状态'),
        array('name'=>'create_time', 'header'=>'发布时间','value'=>'date("Y-m-d H:i:s",$data->create_time)'),
        array('name'=>'update_time', 'header'=>'更新时间','value'=>'date("Y-m-d H:i:s",$data->update_time)'),
        array(
            'class'=>'CButtonColumn',
            'htmlOptions'=>array('style'=>'width: 80px'),
        ),
        array(
              'selectableRows' => 2,
              'footer' => '<button type="button" onclick="GetCheckbox();" style="width:76px">批量删除</button>',
              'class' => 'CCheckBoxColumn',
              'headerHtmlOptions' => array('width'=>'33px',"onclick"=>"Checkbox()"),
              'checkBoxHtmlOptions' => array('name' => 'selectdel[]'),
        
        ),
    ),

));
?>
