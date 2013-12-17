<?php
/**
 * 工厂方法
 *
 * 定义了一个创建对象的接口，但由子类决定要实例化的类是哪个。工厂方法让类把实例化延迟到子类。
 */

//各个具体工厂必须执行的接口
interface abstractCreator {
	//规定各个具体工厂要实现的方法
	public function realCreate();
}

//兵种制造器的类，也就是主工厂
class BarracksCreator {
	
  //制造兵种的方法
  public function create($createWhat)
  {
   //根据输入的参数，动态的把需要的类的定义文件载入
    require_once($createWhat.'.php');

   //根据输入的参数，动态的获取相应的具体工厂的类的名字
    $creatorClassName = $createWhat.'Creator';

   //新建具体工厂对象
    $creator = new $creatorClassName;

   //用具体工厂来实际生产，然后返回需要的类的对象。因为它们都执行了接口abstractCreator，所以肯定实现了方法realCreate()
    return $creator->realCreate();

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