<?php
/**
 * 原型模式
 *
 * 用原型实例指定创建对象的种类.并且通过拷贝这个原型来创建新的对象 。
 */

//机枪兵类
class Marine
{
	//所属的用户ID
	public $playerID;

	//构造函数，参数为用户的id
	public function __construct($id)
	{
		$this->playerID = $id;
	}

}



//兵种的管理类

class TroopManager
{
	//数组，用于存放多个兵种的原型
	public $troopPrototype = array();

	//增加原型，第一个参数为原型的名字，第二个参数为原型对象
	public function addPrototype($name, $prototype)
	{
		$this->troopPrototype[$name] = $prototype;
	}

	//获取原型的克隆，也就是替代new的方法，参数为原型的名字
	public function getPrototype($name)
	{
		return clone $this->troopPrototype[$name];
	}

}



//初始化兵种的管理类
$manager = new TroopManager();

//初始化两个属于不同玩家的机枪兵的原型
$m1 = new Marine(1);

$m2 = new Marine(2);

//增加原型，同时用比较容易记忆的名字来命名原型
$manager->addPrototype('Marine of 1', $m1);

$manager->addPrototype('Marine of 2', $m2);

var_dump($m1);
var_dump($m2);

//当需要新增对象的时候，我们可以不必知道对象的类名和初始化的工作
$m3 = $manager->getPrototype('Marine of 1');

var_dump($m3);

?>