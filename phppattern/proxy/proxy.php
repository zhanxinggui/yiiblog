<?php
/**
 * 代理模式
 *
 * 为其他对象提供一个代理以控制这个对象的访问 。
 */

//客户机和主机操作数据时共同要实现的借口
interface iDataProcess
{
	//获取数据的方法，$ID表示玩家的ID，$dataName表示获取的数据的名称
	public function getData($ID, $dataName);

	//改变数据的方法，$ID表示玩家的ID，$dataName表示要改变的数据的名称，$dataValue表示改变后的数据的值
	public function updateData($ID, $dataName, $dataValue);

}



//主机操作数据的类
class DataProcess implements iDataProcess
{
	// 获取数据的方法，$ID表示玩家的ID，$dataName表示获取的数据的名称
	public function getData($ID, $dataName)
	{
		//操作数据库之类的代码
	}

	//改变数据的方法，$ID表示玩家的ID，$dataName表示要改变的数据的名称，$dataValue表示改变后的数据的值
	public function updateData($ID, $dataName, $dataValue)
	{
		//操作数据库之类的代码
	}

}



//客户机操作数据的类，也就是代理类
class ProxyDataProcess implements iDataProcess
{
	//主机操作数据的对象
	private $dataProcess;

	//构造函数
	public function __construct()
	{
		$this->dataProcess = new DataProcess();
	}

	// 获取数据的方法，$ID表示玩家的ID，$dataName表示获取的数据的名称
	public function getData($ID, $dataName)
	{
		//判断是否直接向主机请求
		switch ($dataName)
		{
			//如果查询水晶矿
			case 'ore':
				//直接从客户机保存的数据读取，详细代码略过
				break;
			//如果查询气矿
			case 'gas':
				//直接从客户机保存的数据读取，详细代码略过
				break;
			default:
				$this->dataProcess->getData($ID, $dataName);
		}

	}

	//改变数据的方法，$ID表示玩家的ID，$dataName表示要改变的数据的名称，$dataValue表示改变后的数据的值
	public function updateData($ID, $dataName, $dataValue)
	{
		//和读取的思路类似，如果是水晶矿或气矿，就先写入客户机的数据存储，再告诉主机修改
	}
}



//新建一个客户机处理数据的对象
$proxyDataProcess = new ProxyDataProcess();

//假如显示本玩家自己的气矿剩余数量
$proxyDataProcess->getData(3, 'gas');

?>