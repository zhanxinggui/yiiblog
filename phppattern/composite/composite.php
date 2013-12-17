<?php
/**
 * 组合模式
 *
 * 将对象组合成树形结构以表示"部分-整体"的层次结构,使得客户对单个对象和复合对象的使用具有一致性
 */

//抽象地图类
abstract class abstractMap
{
  	//地图或地图包的名称
  	public $name;

  	//构造方法
  	public function __construct($name)
  	{
    		$this->name = $name;

  	}

  	//地图或地图包的名称，地图对象没有子对象，所以用空函数，直接继承
  	public function getChildren(){}

  	//添加子对象，地图对象没有子对象，所以用空函数，直接继承
  	public function addChild(abstractMap $child){}

  	//显示地图或地图包的名称
  	public function showMapName()
  	{
   		 echo $this->name."<br>";
  	}

  	//显示子对象，地图对象没有子对象，所以用空函数，直接继承
  	public function showChildren(){}

}

 

//地图类，继承抽象地图，这里面我们暂且使用抽象地图的方法
class Map extends abstractMap
{
 

}

 

//地图包类，继承抽象地图，这里面我们就需要重载抽象地图的方法
class MapBag extends abstractMap
{
  	//子对象的集合
  	public $childern;

  	//添加子对象，强制用abstractMap对象，当然地图和地图包由于继承了abstractMap，所以也是abstractMap对象
  	public function addChild(abstractMap $child)
  	{
    		$this->childern[] = $child;
  	}

  	//添加子对象
  	public function showChildren()
  	{
    		if (count($this->childern)>0)
    		{
        		foreach ($this->childern as $child)
        		{
        			//调用地图或包的名称
        			$child->showMapName();
        		}
    		}

  	}

}

 

//新建一个地图包对象，假设文件夹名字为Allied，这个大家可以看看星际的地图目录，真实存在的
$map1 = new MapBag('Allied');

//新建一个地图对象，假设文件名字为(2)Fire Walker（也是真实的）
$map2 = new Map('(2)Fire Walker');

 

//接下去可以看到组合模式的特点和用处。
//假设后面的代码需要操作两个对象，而我们假设并不清楚这两个对象谁是地图，谁是地图包
//给$map1添加一个它的子对象，是个地图，(4)The Gardens
$map1->addChild(new Map('(4)The Gardens'));

//展示它的子对象
$map1->showChildren();

 

//给$map2添加一个它的子对象，是个地图，(2)Fire Walker，这里不会报错，因为地图继承了一个空的添加方法
$map2->addChild(new Map('(2)Fire Walker'));

//展示它的子对象，也不会出错，因为地图继承了一个空的展示方法
$map2->showChildren();

?>
