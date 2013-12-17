<?php
/**
 * 单件模式
 *
 * 确保一个类只有一个实例，并提供一个全局访问点。
 */

//将类设置为final，禁止其他类继承它
final class cheat {

	//快速建造的生效状态，用private保护
	private $fastBuild = false;

	//用static成员来保存唯一的对象
	private static $instance;

	//设置快速建造的生效状态的方法，用public为了能够公开调用
	public function setStatus($input)
	{
		//如果输入的秘籍正确，operation cwal是快速建造的秘籍
		if($input === 'operation cwal')
		{
			//像开关一样，逆反状态
			$this->fastBuild = !$this->fastBuild ;
		}

	}

	//读取快速建造的生效状态的方法，用public为了能够公开调用
	public function getStatus()
	{
		return $this->fastBuild ;
	}

	//获取唯一对象的唯一方法
	public function getInstance()
	{
		//如果对象没有被新建，则新建它
		if(!isset(self::$instance))
		{
			self::$instance = new cheat() ;
		}
		return self::$instance ;

	}

	//用private来禁止在本类以外new对象
	private function __construct(){}

	//用private来禁止在本类以外clone对象
	private function __clone(){}

}



//获取作弊对象的唯一办法
$cheatInstance = cheat::getInstance();

//现在输出为0（这和操作系统有关，有些可能输出false，最好用var_dump来代替echo）
echo $cheatInstance->getStatus();

//输入秘籍
$cheatInstance->setStatus('operation cwal');

//现在输出为1（这和操作系统有关，有些可能输出true，最好用var_dump来代替echo）
echo $cheatInstance->getStatus();

//再次输入秘籍，取消作弊
$cheatInstance->setStatus('operation cwal');

//现在输出为又变成0（这和操作系统有关，有些可能输出false，最好用var_dump来代替echo）
echo $cheatInstance->getStatus();

?>