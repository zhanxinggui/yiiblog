<?php
/**
 * 策略模式
 *
 * 定义一系列算法,把它们一个个封装起来,并且使它们可相互替换,使用得算法的变化可独立于使用它的客户 。
 */

//玩家的类
class player {
	//所属种族
	public $race;

	//部队
	public $army;

	//建筑
	public $building;

	//人口供给
	public $supply;

	//构造函数，设定所属种族
	public function __construct($race)
	{
		$this->race = $race;
	}

}


//初始化的接口
interface initialPlayer {
	//制造初始化的部队
	public function giveArmy($player);

	//制造初始化的建筑
	public function giveBuilding($player);

	//初始化人口供给
	public function giveSupply($player);

}


//虫族的初始化算法
class zergInitial implements initialPlayer {

	//制造初始化的部队
	public function giveArmy($player)
	{
		//一个Overlord
		//$player->army[] = new Overlord();
		$player->army[] = 'overlord';

		//四个虫族农民
		for($i=0; $i<5;$i++)
		{
			//$player->army[] = new Drone();
			$player->army[] = 'drone';
		}

	}

	//制造初始化的建筑
	public function giveBuilding($player)
	{
		//一个基地
		//$player->building[] = new Hatchery();
		$player->building[] = 'hatchery';
	}

	//初始化人口供给
	public function giveSupply($player)
	{
		//虫族初始人口供给为9
		$player->supply = 9;
	}

}


//人族的初始化算法
class terranInitial implements initialPlayer {

	//制造初始化的部队
	public function giveArmy($player)
	{
		//四个人族农民
		for($i=0; $i<5;$i++)
		{
			//$player->army[] = new SVC();
			$player->army[] = 'svc';
		}
	}

	//制造初始化的建筑
	public function giveBuilding($player)
	{
		//一个基地
		//$player->building[] = new Hatchery();
		$player->building[] = 'hatchery';
	}

	//初始化人口供给
	public function giveSupply($player)
	{
		//人族初始人口供给为10
		$player->supply = 10;
	}

}


//初始化的控制类
class initialController {

	//构造函数，参数为玩家的数组
	public function __construct($playerArray)
	{
		var_dump($playerArray);
		foreach ($playerArray as $player)
		{
			switch ($player->race)
			{
				case 'zerg':
					$initialController = new zergInitial();
					break;
				case 'terran':
					$initialController = new terranInitial();
					break;
			}
			
			$initialController->giveArmy($player);
			$initialController->giveBuilding($player);
			$initialController->giveSupply($player);

		}
		var_dump($playerArray);
	}

}


//假设两个虫族，一个人族
$playerArray = array(new player('zerg'), new player('zerg'), new player('terran'));

//进行初始化工作
$initialController = new initialController($playerArray);

?>