<?php
/**
 * 备忘模式
 *
 * 在不破坏封装性的前提下,捕获一个对象的内部状态,并在该对象之外保存这个状态,这样以后就可以将该对象恢复到保存的状态。
 */

//备忘类
class Memento
{
  //水晶矿
  public $ore;

  //气矿
  public $gas;

  //玩家所有的部队对象
  public $troop;

  //玩家所有的建筑对象
  public $building;

  //构造方法，参数为要保存的玩家的对象，这里强制参数的类型为Player类
  public function __construct(Player $player)
  {
  	//保存这个玩家的水晶矿
  	$this->ore = $player->ore;

  	//保存这个玩家的气矿
  	$this->gas = $player->gas;

  	//保存这个玩家所有的部队对象
  	$this->troop = $player->troop;

  	//保存这个玩家所有的建筑对象
  	$this->building = $player->building;

  }

}

 

//玩家的类
class Player
{
  //水晶矿
  public $ore;

  //气矿
  public $gas;

  //玩家所有的部队对象
  public $troop;

  //玩家所有的建筑对象
  public $building;

  //获取这个玩家的备忘对象
  public function getMemento()
  {
   	return new Memento($this);
  }

  //用这个玩家的备忘对象来恢复这个玩家，这里强制参数的类型为Memento类
  public function restore(Memento $m)
  {
    	//水晶矿
  	$this->ore = $m->ore;

  	//气矿
  	$this->gas = $m->gas;

  	//玩家所有的部队对象
  	$this->troop = $m->troop;

  	//玩家所有的建筑对象
  	$this->building = $m->building;

  }

}

 

//制造一个玩家
$p1 = new Player();

//假设他现在采了100水晶矿
$p1->ore = 100;

//我们先保存游戏，然后继续玩游戏
$m = $p1->getMemento();

//假设他现在采了200水晶矿
$p1->ore = 200;

//我们现在载入原来保存的游戏
$p1->restore($m);

//输出水晶矿，可以看到已经变成原来保存的状态了
echo $p1->ore;

?>
