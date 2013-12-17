<?php
/**
 * 单态模式
 *
 * 单态模式不是通过唯一对象来保持一致，它将相关的成员设置为static，这样即使存在很多个它的对象，
 * 但它们共享成员，保持状态的一致。同时也允许继承。
 */

//不使用final，允许继承
class cheat {

  //快速建造的生效状态，用private保护，同时设置static让所有的作弊对象共享
  private static $fastBuild = false;

  //设置快速建造的生效状态的方法，用public为了能够公开调用
  public function setStatus($input)
  {
        //如果输入的秘籍正确，operation cwal是快速建造的秘籍
        if($input === 'operation cwal')
        {
        	//像开关一样，逆反状态
        	self::$fastBuild = !self::$fastBuild ;
        }
  }

  //读取快速建造的生效状态的方法，用public为了能够公开调用
  public function getStatus()
  {
    	return self::$fastBuild ;
  }

}

 

//新增一个作弊对象
$cheatInstance1 = new cheat();

//现在输出为0（这和操作系统有关，有些可能输出false，最好用var_dump来代替echo）
echo $cheatInstance1->getStatus();

//输入秘籍
$cheatInstance1->setStatus('operation cwal');

//现在输出为1（这和操作系统有关，有些可能输出true，最好用var_dump来代替echo）
echo $cheatInstance1->getStatus();

//新增一个作弊对象
$cheatInstance2 = new cheat();

//现在也是输出为1，因为它们共享$fastBuild
echo $cheatInstance2->getStatus();

?>