<?php
class Photo extends CActiveRecord
{
	public $pic_url;
	
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}


	public function tableName()
	{
		return '{{photo}}';
	}
	
	public function rules()
	{
		return array(
			array('pic_desc,pic_url, status', 'required'),
			array('pic_desc', 'length', 'max'=>128),
			array('pic_url', 'file', 'types'=>'jpg, gif, png', 'maxSize'=>31457284),
			
		);
	}
	
	public function relations()
	{
		return array(
			'author' => array(self::BELONGS_TO, 'User', 'author_id'),
			'photocategory' => array(self::BELONGS_TO, 'Photocategory', 'category_id'),
		);
	}
	
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'pic_url' => '图片地址',
			'pic_desc' => '图片描述',
			'status' => '发布状态',
			'create_time' => 'Created',
			'author_id' => 'Author',
			'category_id' => '选择相册',
		);
		
	}
	
	protected function beforeSave()
	{
		if(parent::beforeSave())
		{
			if($this->isNewRecord)
			{
				$this->create_time=time();
				$this->author_id= Yii::app()->user->id;
			}
			
			return true;
		}
		else
			return false;
	}
	
	
}