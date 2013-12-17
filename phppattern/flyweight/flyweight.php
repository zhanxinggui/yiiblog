<?php
/**
 * ��Ԫģʽ
 *
 * ����һ���������������ӵ����ͬ���ݶ���Ŀ��������ֿ����������ֱ�۵ľ����ڴ����ġ�
 * ��Ԫģʽ�Թ���ķ�ʽ��Ч��֧�ִ�����ϸ���ȶ��� 
 */

//��ǹ����Ԫ
class MarineFlyweight
{
	//���ƻ�ǹ����ͼ�񶯻�������Ϊ״̬������������һ�����
	public function drawMarine($state)
	{
		//���ƻ�ǹ��
		var_dump($state);
	}
}


//��Ԫ����
class FlyweightFactory
{
	//��Ԫ���飬���ڴ�Ŷ����Ԫ
	private $flyweights;

	//��ȡ��Ԫ�ķ���
	public function getFlyweight($name)
	{
		$class =  $name."Flyweight";
		if (!isset($flyweights[$name]))
		{
			$flyweights[$name] = new $class;
		}
		return $flyweights[$name];
	}

}



//��ʼ����Ԫ����
$flyweightFactory = new FlyweightFactory();

//��������Ҫ����һ����ǹ����ʱ��ͬʱ����һ��״̬���飬�������ʣ���Ѫ�ȵ�
$marine = $flyweightFactory->getFlyweight("Marine");

$status = array('uid'=>1,'blood'=>100);

$marine->drawMarine($status);

?>