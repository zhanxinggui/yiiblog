<?php
/**
 * 模版模式
 *
 * 在一个方法中定义一个算法的骨架，而将一些步骤延迟到子类中。模板方法使得子类不改变算法结构的情况下，重新定义算法中的某些步骤。
 */

//进化的框架类，它是个抽象类
abstract class evolution {
  //框架方法，由它来实施各个步骤，用final禁止子类覆盖
  final public function process()
  {
    //生成一个蛋，参数为进化的部队
    $egg = $this->becomeEgg();

    //等待蛋孵化，参数为蛋
    $this->waitEgg($egg);

    // 孵化后产生新部队
    echo $this->becomeNew($egg);

  }

  //下面三个抽象方法，由具体子类来实现
  abstract public function becomeEgg();

  abstract public function waitEgg($egg);

  abstract public function becomeNew($egg);

}

//为了简单说明，这里用空中卫士（天蟹）的进化类来演示，地刺等的处理方法类似

//天蟹的进化类继承抽象进化类
class GuardianEvolution extends evolution {
  
  //实现生成一个蛋
  public function becomeEgg()
  {
   	echo 'becoming egg~';
  }

  //等待蛋孵化
  public function waitEgg($egg)
  {
   //等待几十秒钟的代码
    echo  'waiting egg ~';
   	sleep(5);
  }

  //孵化后产生新部队
  public function becomeNew($egg)
  {
   	$army = 'new man';
   	return $army;
   
  }

}

//新建一个天蟹进化的对象
$e1 = new GuardianEvolution();

//让它调用父类的进化框架函数，自动完成三个步骤
$e1->process();

?>