<?php
class Photocategory extends CActiveRecord
{
	public static function model($className=__CLASS__)
	{
		return parent::model($className);	
	}
	
	public function tableName()
	{
		return '{{photo_category}}';
	}
	
	public function rules()
	{
		return array(
			array('category_name', 'required'),
			array('f_id, sort_num', 'length', 'max'=>11),
			array('category_name', 'length', 'max'=>255),
		);
	}
	
	public function relations()
	{
		return  array(
			'photos'=>array(self::MANY_MANY,'Photo','category_id'),
		);
	}
	
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'f_id' => 'Pid',
			'category_name' => 'Name',
			'sort_num' => 'Position',
		);
	}
	
	public static function CategoryList()
	{
		$category = Photocategory::model()->findAll(array(
				'select'=>'id,category_name',
		));
		return CHtml::listData($category, 'id', 'category_name');
	}
	
	public function getAllCategory(&$categoryList,$category,$parentid=0,$separate="")
	{

		foreach($category as $k=>$v)
		{
			if($v['f_id']==$parentid)
			{
				$v['category_name']=$separate.$v['category_name'];
				$categoryList[]=$v;
				Photocategory::getAllCategory($categoryList,$category,$v['id'],$separate."－");
			}
			
		}
	}
	
	public function showAllCategory()
	{
		$category = Photocategory::model()->findAll(array(
				'select'=>'id,f_id,category_name',
		));
		
		
		$listData = CHtml::listData($category, 'id', 'category_name');
		
		$categoryList=array();
		$categoryList[] = array('f_id'=>0,'category_name'=>'--顶级分类--');
		Photocategory::getAllCategory($categoryList,$category);
		
		return CHtml::listData($categoryList, 'id', 'category_name');
		
	}
	
	
	
}