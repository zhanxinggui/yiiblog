<?php
class UserInfo extends CActiveRecord
{
	public $username;
	public $password;
	public $headpic;

	
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	} 
	
	public function tableName()
	{
		return '{{user}}';
	}
	
	
	public function rules()
	{
		return array(
			// username and password are required
			array('username', 'required','message'=>'用户名或密码为空'),
			
			array('headpic', 'file', 'types'=>'jpg, gif, png', 'maxSize'=>31457284),
		);
	}
	
	public function attributeLabels()
	{
		return array(
			'username'=>'用户名',
			'password'=>'密&nbsp;&nbsp;码',
			'headpic'=>'头像',
			'description'=>'简介',
			'qq'=>'QQ',
			'homepage'=>'个人主页',
			
		);
	}
	
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'articles' => array(self::HAS_MANY, 'Article', 'author_id'),
		);
	}
	
	
	protected function beforeSave()
	{
		if(parent::beforeSave())
		{
			if($this->isNewRecord)
			{
				$this->create_time=$this->update_time=time();
			}
			else
				$this->update_time=time();
			return true;
		}
		else
			return false;
	}
	
	
}