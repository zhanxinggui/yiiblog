<?php

class Articlecategory extends CActiveRecord
{

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}


	public function tableName()
	{
		return '{{article_category}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('category_name', 'required'),
			array('f_id, sort_num', 'length', 'max'=>11),
			array('category_name', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			//array('id, f_id, category_name,  sort_num', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
            'articles' => array(self::HAS_MANY, 'Article', 'category_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
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
		$category = Articlecategory::model()->findAll(array(
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
				Articlecategory::getAllCategory($categoryList,$category,$v['id'],$separate."－");
			}
			
		}
	}
	
	public function showAllCategory()
	{
		$category = Articlecategory::model()->findAll(array(
				'select'=>'id,f_id,category_name',
		));
		
		
		$listData = CHtml::listData($category, 'id', 'category_name');
		
		$categoryList=array();
		$categoryList[] = array('f_id'=>0,'category_name'=>'--顶级分类--');
		Articlecategory::getAllCategory($categoryList,$category);
		
		
		return CHtml::listData($categoryList, 'id', 'category_name');
		
	}
	
	
	
	
	
}