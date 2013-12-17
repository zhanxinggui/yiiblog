<?php
/**
 * 抽象工厂模式
 *
 * 提供一个接口，用于创建相关或依赖对象的家族，而不需明确指定具体类。
 */

//四个产品类
//点中自己的物体时的鼠标
class mineMouse {
	//鼠标的颜色
	public $color = 'green';
}

//点中敌人的物体时的鼠标
class enemyMouse {
	//鼠标的颜色
	public $color = 'red';
}

//自己的运输船状态
class mineDropship {
	//显示装载的情况，假设2辆坦克
	public $loading = '2 tanks';
}

//敌人的运输船状态
class enemyDropship {
	//不显示装载的情况
	public $loading = '';
}

 

//主工厂类，也叫抽象工厂类
class abstractCreator {
  //根据参数分配工作到具体的工厂，并返回具体工厂对象
  public function getCreator($belong)
  {
    //获取具体工厂的类名
    $creatorClassName = $belong.'Creator';
    //返回具体工厂对象
    return new $creatorClassName();
  }

}

//具体工厂必须执行的接口
interface productCreator {
	//制造方法,或者说根据参数返回产品(鼠标,运输船)的方法
	public function creatProduct($productName);
}

//制造属于自己的物体的具体工厂,执行接口
class mineCreator implements productCreator {
  //根据参数生产并返回属于自己的产品
  public function creatProduct($productName)
  {
    //获取产品的类名
    $productClassName = 'mine'.$productName;
    //返回产品对象
    return new $productClassName;
  }

}

//制造属于敌人的物体的具体工厂,执行接口
class enemyCreator implements productCreator {
  //根据参数生产并返回属于敌人的产品
  public function creatProduct($productName)
  {
    //获取产品的类名
    $productClassName = 'enemy'.$productName;
    //返回产品对象
    return new $productClassName;
  }

}

//开始操作
//新建抽象工厂对象
$abstractCreator = new abstractCreator();

//根据归属,得到具体工厂对象,这里先演示敌人的
$realCreator1 = $abstractCreator->getCreator('enemy');

//让具体工厂对象生产鼠标对象
$product1 = $realCreator1->creatProduct('Mouse');

//让鼠标对象显示颜色,显示结果red
echo $product1->color;

 

//根据归属,得到另一个具体工厂对象,这里演示自己的
$realCreator2 = $abstractCreator->getCreator('mine');

//让具体工厂对象生产运输船
$product2 = $realCreator2->creatProduct('Dropship');

//让运输船对象显示装载对象,显示结果2 tanks，两辆坦克
echo $product2->loading;

?>