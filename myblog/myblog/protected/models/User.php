<?php
class User extends CActiveRecord
{
	public $username;
	public $password;
	public $rememberMe;
	public $verifyCode;
	private $_identity;
	
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
			array('username, password', 'required','message'=>'用户名或密码为空'),
			// rememberMe needs to be a boolean
			array('rememberMe', 'boolean'),
			// password needs to be authenticated
			array('password', 'authenticate'),
			array('verifyCode','required','message'=>'请输入正确的验证码'),
			array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements(),'message'=>'请输入正确的验证码'),
		);
	}
	
	public function attributeLabels()
	{
		return array(
			'username'=>'用户名',
			'password'=>'密&nbsp;&nbsp;码',
			'rememberMe'=>'十天内记住我',
			'verifyCode'=>'验证码',
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
	
	public function authenticate($attribute,$params)
	{
		if(!$this->hasErrors())
		{
			$this->_identity=new UserIdentity($this->username,$this->password);
			if(!$this->_identity->authenticate())
				$this->addError('password','Incorrect username or password.');
		}
	}
	
	public function login()
	{
		if($this->_identity===null)
		{
			$this->_identity=new UserIdentity($this->username,$this->password);
			$this->_identity->authenticate();
		}
		if($this->_identity->errorCode===UserIdentity::ERROR_NONE)
		{
			$duration=$this->rememberMe ? 3600*24*30 : 0; // 30 days
			Yii::app()->user->login($this->_identity,$duration);
			return true;
		}
		else
			return false;
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