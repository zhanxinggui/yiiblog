<?php
/**
 * ԭ��ģʽ
 *
 * ��ԭ��ʵ��ָ���������������.����ͨ���������ԭ���������µĶ��� ��
 */

//��ǹ����
class Marine
{
	//�������û�ID
	public $playerID;

	//���캯��������Ϊ�û���id
	public function __construct($id)
	{
		$this->playerID = $id;
	}

}



//���ֵĹ�����

class TroopManager
{
	//���飬���ڴ�Ŷ�����ֵ�ԭ��
	public $troopPrototype = array();

	//����ԭ�ͣ���һ������Ϊԭ�͵����֣��ڶ�������Ϊԭ�Ͷ���
	public function addPrototype($name, $prototype)
	{
		$this->troopPrototype[$name] = $prototype;
	}

	//��ȡԭ�͵Ŀ�¡��Ҳ�������new�ķ���������Ϊԭ�͵�����
	public function getPrototype($name)
	{
		return clone $this->troopPrototype[$name];
	}

}



//��ʼ�����ֵĹ�����
$manager = new TroopManager();

//��ʼ���������ڲ�ͬ��ҵĻ�ǹ����ԭ��
$m1 = new Marine(1);

$m2 = new Marine(2);

//����ԭ�ͣ�ͬʱ�ñȽ����׼��������������ԭ��
$manager->addPrototype('Marine of 1', $m1);

$manager->addPrototype('Marine of 2', $m2);

var_dump($m1);
var_dump($m2);

//����Ҫ���������ʱ�����ǿ��Բ���֪������������ͳ�ʼ���Ĺ���
$m3 = $manager->getPrototype('Marine of 1');

var_dump($m3);

?>