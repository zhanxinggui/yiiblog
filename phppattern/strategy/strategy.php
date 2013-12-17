<?php
/**
 * ����ģʽ
 *
 * ����һϵ���㷨,������һ������װ����,����ʹ���ǿ��໥�滻,ʹ�õ��㷨�ı仯�ɶ�����ʹ�����Ŀͻ� ��
 */

//��ҵ���
class player {
	//��������
	public $race;

	//����
	public $army;

	//����
	public $building;

	//�˿ڹ���
	public $supply;

	//���캯�����趨��������
	public function __construct($race)
	{
		$this->race = $race;
	}

}


//��ʼ���Ľӿ�
interface initialPlayer {
	//�����ʼ���Ĳ���
	public function giveArmy($player);

	//�����ʼ���Ľ���
	public function giveBuilding($player);

	//��ʼ���˿ڹ���
	public function giveSupply($player);

}


//����ĳ�ʼ���㷨
class zergInitial implements initialPlayer {

	//�����ʼ���Ĳ���
	public function giveArmy($player)
	{
		//һ��Overlord
		//$player->army[] = new Overlord();
		$player->army[] = 'overlord';

		//�ĸ�����ũ��
		for($i=0; $i<5;$i++)
		{
			//$player->army[] = new Drone();
			$player->army[] = 'drone';
		}

	}

	//�����ʼ���Ľ���
	public function giveBuilding($player)
	{
		//һ������
		//$player->building[] = new Hatchery();
		$player->building[] = 'hatchery';
	}

	//��ʼ���˿ڹ���
	public function giveSupply($player)
	{
		//�����ʼ�˿ڹ���Ϊ9
		$player->supply = 9;
	}

}


//����ĳ�ʼ���㷨
class terranInitial implements initialPlayer {

	//�����ʼ���Ĳ���
	public function giveArmy($player)
	{
		//�ĸ�����ũ��
		for($i=0; $i<5;$i++)
		{
			//$player->army[] = new SVC();
			$player->army[] = 'svc';
		}
	}

	//�����ʼ���Ľ���
	public function giveBuilding($player)
	{
		//һ������
		//$player->building[] = new Hatchery();
		$player->building[] = 'hatchery';
	}

	//��ʼ���˿ڹ���
	public function giveSupply($player)
	{
		//�����ʼ�˿ڹ���Ϊ10
		$player->supply = 10;
	}

}


//��ʼ���Ŀ�����
class initialController {

	//���캯��������Ϊ��ҵ�����
	public function __construct($playerArray)
	{
		var_dump($playerArray);
		foreach ($playerArray as $player)
		{
			switch ($player->race)
			{
				case 'zerg':
					$initialController = new zergInitial();
					break;
				case 'terran':
					$initialController = new terranInitial();
					break;
			}
			
			$initialController->giveArmy($player);
			$initialController->giveBuilding($player);
			$initialController->giveSupply($player);

		}
		var_dump($playerArray);
	}

}


//�����������壬һ������
$playerArray = array(new player('zerg'), new player('zerg'), new player('terran'));

//���г�ʼ������
$initialController = new initialController($playerArray);

?>