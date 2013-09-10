<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	private $_id;
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
		$user_models = User::model()->find('username=:name',array('name'=>$this->username));
		

		if($user_models->username !== $this->username)
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		elseif($user_models->password !== $this->password)
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else
		{
			$this->_id=$user_models->id;
			$this->username=$user_models->username;
			$this->errorCode=self::ERROR_NONE;
		}
	}
	
	public function getId()
	{
		return $this->_id;
	}
}