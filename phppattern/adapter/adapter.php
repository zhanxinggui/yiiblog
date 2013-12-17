<?php
/**
 * 适配器模式
 *
 * 将一个类的接口转换成客户希望的另外一个接口,使用原本不兼容的而不能在一起工作的那些类可以在一起工作 。
 */

//虫族基类
class Zerg
{
  //血
  public $blood;

  //恢复血的方法
  public function restoreBlood()
  {
 	 //自动逐渐恢复兵种的血
  }

}

 

//钻地的类
class Burrow
{
  //钻地的方法
  public function burrowOperation()
  {
	//钻地的动作，隐形等等
   	echo '我钻地了';
  }

}

 

//刺蛇的类
class Hydralisk extends Zerg
{
  //把一个属性来存放钻地对象
  public $burrow;

  //构造方法，因为php不允许默认值采用对象，所以通过初始化赋值给$burrow
  public function __construct()
  {
  	$this->burrow=new Burrow();
  }

  //钻地的方法
  public function burrowOperation()
  {
  	//调用钻地属性存放的对象，使用钻地类的方法
  	$this->burrow->burrowOperation();
  }

}

 

//制造一个刺蛇
$h1 = new Hydralisk();

//让他钻地
$h1->burrowOperation();

?>
