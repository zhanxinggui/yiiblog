<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class Register extends CActiveRecord
{

	public $password2;

	
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public function tableName()
	{
		return '{{user}}';
	}

	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			// username and password are required
			array('username, password, password2', 'required','message'=>'用户名或密码为空'),
			array('username','unique','message'=>'该用户名已经存在'),
			array('email','email','allowEmpty'=>false,'message'=>'邮箱格式不正确'),

            array('password2','compare','compareAttribute'=>'password','message'=>'两次密码必须一致'),
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			'username'=>'用户名',
			'password'=>'密     码',
			'password2'=>'确认密 码',
			'email'=>'邮    箱',
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
