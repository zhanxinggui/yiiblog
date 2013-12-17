<?php
/**
 * 简单工厂
 *
 * 简单工厂模式可以将新建对象的任务进行封装，一旦需要增加新的返回类，只要修改负责新建对象的那部分代码。
 */

//兵种制造器的类
class BarracksCreator {

  //制造兵种的方法
  public function  create($createWhat)
  {

   //根据输入的参数，动态的把需要的类的定义文件载入
    require_once($createWhat.'.php');

   //根据输入的参数，动态的返回需要的类的对象
    return new $createWhat;

  }

}

//新建一个兵种制造器对象
$creator = new BarracksCreator();

//靠接收参数制造一个火焰兵对象
$troop1 = $creator->create('Marine');
$troop1->attack();

 

//靠接收参数制造一个机枪兵对象
$troop2 = $creator->create('Firebat');
$troop2->attack();

?>