<?php
/**
 * ״̬ģʽ
 *
 * ����һ�����������ڲ�״̬�ı�ʱ�ı�������Ϊ,���������ƺ��޸������������� ��
 */

//̹��״̬�Ľӿ�
interface TankState
{
	//̹�˵Ĺ�������
	public function attack();
}


//̹����ͨ״̬
class TankState_Tank implements TankState
{
	//̹�˵Ĺ�������
	public function attack()
	{
		//����򵥵������ǰ״̬
		//echo "��ͨ״̬";
		echo 'normal state ';
	}
}



//̹�˼�������״̬
class TankState_Siege implements TankState
{
	//̹�˵Ĺ�������
	public function attack()
	{
		//����򵥵������ǰ״̬
		//echo "��������";
		echo 'setting up ';
	}
}



//̹����
class Tank
{
	//״̬
	public $state;

	//̹�˵Ĺ�������
	public function __construct()
	{
		//���������̹�˵�Ȼ����ͨ״̬
		$this->state = new TankState_Tank();
	}

	//����״̬�ķ������������Ϊ��ҵ���ļ���
	public function setState($key)
	{
		//�������s
		if($key = 's')
		{
			$this->state = new TankState_Siege();
		}
		//�������t
		elseif($key = 't')
		{
			$this->state = new TankState_Tank();
		}
	}

	//̹�˵Ĺ�������
	public function attack()
	{
		//�ɵ�ǰ״̬�Լ���������
		$this->state->attack();
	}
}



//����һ��̹��
$tank = new Tank();

//���������и�����·����̹�˾�����ͨģʽ������
$tank->attack();

//����̹��
$tank->setState('s');

//̹���ٴι���������Ǽ���ģʽ
$tank->attack();


?>