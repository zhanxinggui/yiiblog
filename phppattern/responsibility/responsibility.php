<?php

/**
 * 职责链模式
 *
 * 为解除请求的发送者和接收者之间的耦合,而使用多个对象都用机会处理这个请求,
 * 将这些对象连成一条链,并沿着这条链传递该请求,直到有一个对象处理它 。
 */

//被原子弹攻击的接口
interface NuclearAttacked {
	//处理被原子弹攻击的方法，参数为投放点的x和y坐标
	public function NuclearAttacked($x, $y);

}

//人族的基地，实现被原子弹攻击的接口，其他的内容暂时不考虑
class CommandCenter implements NuclearAttacked {

	//处理被原子弹攻击的方法，参数为投放点的x和y坐标
	public function NuclearAttacked($x, $y)
	{
		//根据离原子弹中心的距离，定义减少的血，如果超出了剩余的血，就炸掉
		echo "bomb the commandCenter ~~";
	}

}

//巡洋舰（俗称大和），实现被原子弹攻击的接口，其他的内容暂时不考虑

class Battlecruiser implements NuclearAttacked {

	//处理被原子弹攻击的方法，参数为投放点的x和y坐标
	public function NuclearAttacked($x, $y)
	{
		//根据离原子弹中心的距离，定义减少的血，如果超出了剩余的血，就炸掉
		echo "bomb the battlecruiser ~~";
	}

}

//原子弹类

class Nuclear {

	//被原子弹攻击的对象
	public $attackedThings;

	//添加被原子弹攻击的对象
	public function addAttackedThings($thing)
	{
		//添加被原子弹攻击的对象
		$this->attackedThings[] = $thing;
	}

	//原子弹爆炸的方法，参数为投放点的x和y坐标

	public function blast($x, $y)
	{

		//把爆炸的事情交给所有涉及的对象，让他们自己处理
		foreach ($this->attackedThings as $thing)
		{
			//把爆炸的事情交给所有涉及的对象，让他们自己处理
			$thing->NuclearAttacked($x, $y);
		}
	}

}



//新建一个基地对象
$CommandCenter = new CommandCenter();

//新建一个巡洋舰对象
$Battlecruiser = new Battlecruiser();

//造了一颗原子弹
$Nuclear2 = new Nuclear();

//假设投放成功，那个瞬间一个基地对象和一个巡洋舰对象在杀伤范围内
$Nuclear2->addAttackedThings($CommandCenter);

$Nuclear2->addAttackedThings($Battlecruiser);

//原子弹爆炸，这样就把这个事件交给那些涉及的对象的处理方法，假设投放点的x和y坐标是2353, 368
$Nuclear2->blast(2353, 368);

?>