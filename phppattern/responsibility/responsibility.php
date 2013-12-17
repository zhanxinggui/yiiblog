<?php

/**
 * ְ����ģʽ
 *
 * Ϊ�������ķ����ߺͽ�����֮������,��ʹ�ö�������û��ᴦ���������,
 * ����Щ��������һ����,���������������ݸ�����,ֱ����һ���������� ��
 */

//��ԭ�ӵ������Ľӿ�
interface NuclearAttacked {
	//����ԭ�ӵ������ķ���������ΪͶ�ŵ��x��y����
	public function NuclearAttacked($x, $y);

}

//����Ļ��أ�ʵ�ֱ�ԭ�ӵ������Ľӿڣ�������������ʱ������
class CommandCenter implements NuclearAttacked {

	//����ԭ�ӵ������ķ���������ΪͶ�ŵ��x��y����
	public function NuclearAttacked($x, $y)
	{
		//������ԭ�ӵ����ĵľ��룬������ٵ�Ѫ�����������ʣ���Ѫ����ը��
		echo "bomb the commandCenter ~~";
	}

}

//Ѳ�󽢣��׳ƴ�ͣ���ʵ�ֱ�ԭ�ӵ������Ľӿڣ�������������ʱ������

class Battlecruiser implements NuclearAttacked {

	//����ԭ�ӵ������ķ���������ΪͶ�ŵ��x��y����
	public function NuclearAttacked($x, $y)
	{
		//������ԭ�ӵ����ĵľ��룬������ٵ�Ѫ�����������ʣ���Ѫ����ը��
		echo "bomb the battlecruiser ~~";
	}

}

//ԭ�ӵ���

class Nuclear {

	//��ԭ�ӵ������Ķ���
	public $attackedThings;

	//��ӱ�ԭ�ӵ������Ķ���
	public function addAttackedThings($thing)
	{
		//��ӱ�ԭ�ӵ������Ķ���
		$this->attackedThings[] = $thing;
	}

	//ԭ�ӵ���ը�ķ���������ΪͶ�ŵ��x��y����

	public function blast($x, $y)
	{

		//�ѱ�ը�����齻�������漰�Ķ����������Լ�����
		foreach ($this->attackedThings as $thing)
		{
			//�ѱ�ը�����齻�������漰�Ķ����������Լ�����
			$thing->NuclearAttacked($x, $y);
		}
	}

}



//�½�һ�����ض���
$CommandCenter = new CommandCenter();

//�½�һ��Ѳ�󽢶���
$Battlecruiser = new Battlecruiser();

//����һ��ԭ�ӵ�
$Nuclear2 = new Nuclear();

//����Ͷ�ųɹ����Ǹ�˲��һ�����ض����һ��Ѳ�󽢶�����ɱ�˷�Χ��
$Nuclear2->addAttackedThings($CommandCenter);

$Nuclear2->addAttackedThings($Battlecruiser);

//ԭ�ӵ���ը�������Ͱ�����¼�������Щ�漰�Ķ���Ĵ�����������Ͷ�ŵ��x��y������2353, 368
$Nuclear2->blast(2353, 368);

?>