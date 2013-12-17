<?php
/**
 * 装饰者模式
 *
 * 动态地将责任附加到对象上。想要扩展功能，装饰者提供有别于继承的另一种选择。
 */

abstract class Beverage{
    public $_name;
    abstract public function Cost();
}
// 被装饰者类
class Coffee extends Beverage{
    public function __construct(){
        $this->_name = 'Coffee';
    }  
    public function Cost(){
        return 1.00;
    }  
}
// 以下三个类是装饰者相关类
class CondimentDecorator extends Beverage{
    public function __construct(){
        $this->_name = 'Condiment';
    }  
    public function Cost(){
        return 0.1;
    }  
}
 
class Milk extends CondimentDecorator{
    public $_beverage;
    public function __construct($beverage){
        $this->_name = 'Milk';
        if($beverage instanceof Beverage){
            $this->_beverage = $beverage;
        }else
            exit('Failure');
    }  
    public function Cost(){
        return $this->_beverage->Cost() + 0.2;
    }  
}
 
class Sugar extends CondimentDecorator{
    public $_beverage;
    public function __construct($beverage){
        $this->_name = 'Sugar';
        if($beverage instanceof Beverage){
            $this->_beverage = $beverage;
        }else{
            exit('Failure');
        }
    }
    public function Cost(){
        return $this->_beverage->Cost() + 0.2;
    }
}
 
// Test Case
//1.拿杯咖啡
$coffee = new Coffee();
 
//2.加点牛奶
$coffee = new Milk($coffee);
 
//3.加点糖
$coffee = new Sugar($coffee);
 
printf("Coffee Total:%0.2f元\n",$coffee->Cost());
