<?php
/**
 * 享元模式
 *
 * 采用一个共享来避免大量拥有相同内容对象的开销。这种开销中最常见、直观的就是内存的损耗。
 * 享元模式以共享的方式高效的支持大量的细粒度对象。 
 */

//机枪兵享元
class MarineFlyweight
{
	//绘制机枪兵的图像动画，参数为状态，比如属于哪一个玩家
	public function drawMarine($state)
	{
		//绘制机枪兵
		var_dump($state);
	}
}


//享元工厂
class FlyweightFactory
{
	//享元数组，用于存放多个享元
	private $flyweights;

	//获取享元的方法
	public function getFlyweight($name)
	{
		$class =  $name."Flyweight";
		if (!isset($flyweights[$name]))
		{
			$flyweights[$name] = new $class;
		}
		return $flyweights[$name];
	}

}



//初始化享元工厂
$flyweightFactory = new FlyweightFactory();

//当我们需要绘制一个机枪兵的时候，同时传递一个状态数组，里面包含剩余的血等等
$marine = $flyweightFactory->getFlyweight("Marine");

$status = array('uid'=>1,'blood'=>100);

$marine->drawMarine($status);

?>