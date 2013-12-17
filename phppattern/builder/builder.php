<?php
/**
 * 建造者模式
 *
 * 将一个复杂对象的构建与它的表示分离,使用同样的构建过程可以创建不同的表示 
 */

//规范制造各个零件的接口
interface Builder
{
	//制造地图零件
	public function buildMapPart();

	//制造建筑零件
	public function buildBuildingPart();

	//制造部队零件
	public function buildArmyPart();

	//组装零件
	public function getResult();

}



//实际建造器类，比如初始化某个任务关
class ConcreteBuilder implements Builder
{
	//制造地图零件
	public function buildMapPart()
	{
		//根据任务的设定画上地图
		//echo '地图零件\n';
		echo 'build map part ~~ ';
	}

	//制造建筑零件
	public function buildBuildingPart()
	{
		//根据任务的设定画上建筑，包括玩家的和敌人的
		//echo '建筑零件\n';
		echo 'build buinding part ~~ ';
	}

	//制造部队零件
	public function buildArmyPart()
	{
		//根据任务的设定画上部队，包括玩家的和敌人的
		//echo '部队零件\n';
		echo 'build army part ~~ ';
	}

	//组装零件
	public function getResult()
	{
		//将所有的东西叠加和处理，形成初始化画面
		//echo '组装零件\n';
		echo 'get all part ~~';
	}

}



//监督类，也就是控制绘制流程的类
class Director
{
	//私有属性，确定使用的建造器
	private $builder;

	//构造方法，参数为选定的建造器对象
	public function __construct($builder)
	{
		//确定使用的建造器
		$this->builder = $builder;
	}

	//负责建造流程的方法，调用建造器对象的方法，制造所有零件
	public function buildeAllPart()
	{
		//制造地图零件
		$this->builder->buildMapPart();

		//制造建筑零件
		$this->builder->buildBuildingPart();

		//制造部队零件
		$this->builder->buildArmyPart();

	}

}



//假设根据任务关，初始化我们需要的实际建造器对象
$concreteBuilder = new ConcreteBuilder();

//初始化一个监督对象
$director = new Director($concreteBuilder);

//制造所有零件
$director->buildeAllPart();

//最后让建造器组装零件，生成画面
$concreteBuilder->getResult();

?>