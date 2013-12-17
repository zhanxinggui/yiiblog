<?php
/**
 * 工厂模式
 */

/**
 * 比萨商店抽象类
 */
abstract class PizzaStore
{
	public abstract function createPizza($type);

	public function orderPizza($type)
	{
		$pizza = $this->createPizza($type);
		echo "食物名称：{$pizza->name}\n";
		echo "制作方法：{$pizza->make()}\n";
		echo "包装方式：{$pizza->box()}\n";
	}
}

/**
 * 美国风味比萨店
 * 有芝士、香肠两种口味
 */
class USAPizza extends PizzaStore
{
	public function createPizza($type)
	{
		if ($type == 'cheese') {
			return new CheesePizza();
		} elseif ($type == 'sausage') {
			return new SausagePizza();
		} else {
			return null;
		}
	}
}

/**
 * 中国风味比萨店
 * 有韭菜鸡蛋、西葫芦两种口味
 */
class CHINAPizza extends PizzaStore
{
	public function createPizza($type)
	{
		if ($type == 'egg') {
			return new EggPizza();
		} elseif ($type == 'xhl') {
			return new XhlPizza();
		} else {
			return null;
		}
	}
}

/**
 * 比萨抽象类
 */
abstract class Pizza
{
	public $name;

	public abstract function make();
	public abstract function box();
}

class CheesePizza extends Pizza
{
	public $name = '芝士口味的比萨';

	public function make()
	{
		return '面饼上面撒些芝士粉';
	}

	public function box()
	{
		return '装载四方的纸盒子里';
	}
}

class SausagePizza extends Pizza
{
	public $name = '香肠口味的比萨';

	public function make()
	{
		return '面饼上面撒些香肠薄片';
	}

	public function box()
	{
		return '装载四方的纸盒子里';
	}
}

class EggPizza extends Pizza
{
	public $name = '韭菜鸡蛋的馅饼';

	public function make()
	{
		return '面饼里面夹些韭菜鸡蛋';
	}

	public function box()
	{
		return '用纸袋子包装';
	}
}

class XhlPizza extends Pizza
{
	public $name = '西葫芦的馅饼';

	public function make()
	{
		return '面饼里面夹些西葫芦';
	}

	public function box()
	{
		return '用纸袋子包装';
	}
}

// example
// 购买一个芝士比萨
$pizza = new USAPizza();
$pizza->orderPizza('cheese');
echo "\n-------------\n";
// 购买中国传统馅饼
$pizza2 = new CHINAPizza();
$pizza2->orderPizza('egg');

