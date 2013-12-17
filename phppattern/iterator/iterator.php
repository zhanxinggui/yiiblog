<?php
/**
 * 迭代器模式
 *
 * 提供一种方法顺序访问一个聚合对象中的各个元素，而又不暴露其内部的表示。
 */

//聚集接口，意思是所有电脑的农民都聚集在这个类里面
interface IAggregate
{
	//让具体的聚集类实现的，获取使用的迭代器的方法
	public function createIterator();

}


//具体的聚集类
class ConcreteAggregate implements IAggregate
{
	//存放农民的数组，注意可以不用数组来处理，看完所有的代码就知道了
	public $workers;

	//增加元素的方法，这里元素就是农民
	public function addElement($element)
	{
		$this->workers[] = $element;
	}

	//获取元素的方法
	public function getAt($index)
	{
		return $this->workers[$index];
	}

	//获取元素的数量的方法
	public function getLength()
	{
		return count($this->workers);
	}

	//获取迭代器的方法
	public function createIterator()
	{
		return new ConcreteIterator($this);
	}

}



//迭代器接口，注意php5有个内置的接口叫Iterator，所以这里我们改成IIterator
interface IIterator
{
	//是否元素循环完毕
	public function hasNext();

	//返回下一个元素，并将指针加1
	public function next();

}



//具体的迭代器类
class ConcreteIterator implements IIterator
{
	//要迭代的集合
	public $collection;

	//指针
	public $index;

	//构造函数，确定迭代的集合，并将指针置零
	public function __construct($collection)
	{
		var_dump($collection);
		$this->collection = $collection;
		$this->index = 0;
	}

	//是否元素循环完毕
	public function hasNext()
	{
		if($this->index < $this->collection->getLength())
		{
			return true;
		}
		else
		{
			return false;
		}

	}

	//返回下一个元素，并将指针加1
	public function next()
	{
		$element = $this->collection->getAt($this->index);
		$this->index++;
		return $element;
	}

}

//初始化电脑的农民的聚集对象
$farmerAggregate = new ConcreteAggregate();

//添加农民，这里简单的用字符串表示
$farmerAggregate->addElement('SVC1');

$farmerAggregate->addElement('SVC2');

//获取迭代器
$iterator = $farmerAggregate->createIterator();

//将农民聚集对象循环
while ($iterator->hasNext())
{
	//获取下一个农民
	$element = $iterator->next();

	//我们简单的输出
	echo $element."\n";

}

?>