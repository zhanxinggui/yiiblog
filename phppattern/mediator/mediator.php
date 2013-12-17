<?php
/**
 * �н���ģʽ
 *
 * ��һ���н��������װһϵ�еĶ��󽻻�,ʹ��������Ҫ��ʽ���໥���ôӶ�ʹ�������ɢ,���ҿ��Զ����ظı�����֮��Ľ��� ��
 */

//�н���
class Mediator
{
	//��ſƼ�������������Ϊ�˼�˵�����þ�̬���ԣ���ʵҲ�����ø�������������
	public static $techBuilding;

	//���ݲ���$techBuildingName����Ľ������ƣ������Ƿ������Ӧ�ĿƼ�������Ϊ�˼�˵�����þ�̬����
	public static function isTechAllow ($techBuildingName)
	{
		//����Ƽ��������������㣬�ͷ���true�����򷵻�false
		return self::$techBuilding[$techBuildingName]>0;
	}

	//һ���Ƽ���������˻��߱��ݻ٣������������������$techBuildingName���������ƣ�
	//$addΪ����ֵ��true��ʾ���ӣ����죩��false������٣��ݻ٣�
	public static function changeTech ($techBuildingName, $add)
	{
		//����
		if ($add)
		{
			//��������
			if(self::$techBuilding[$techBuildingName]){
				self::$techBuilding[$techBuildingName]++;
			}else{
				self::$techBuilding[$techBuildingName]=0;
			}
		}
		else
		{
			//��������
			self::$techBuilding[$techBuildingName]--;
		}
	}
}



//�Ƽ�վ��
class ScienceFacility
{
	//���췽��
	public function __construct()
	{
		Mediator::changeTech('ScienceFacility', true);
	}

	//��������
	public function __destruct()
	{
		Mediator::changeTech('ScienceFacility', false);
	}
}



//�ɻ�����
class Starport
{
	//����Ƽ���ķ���
	public function createScienceVessel ()
	{
		//ѯ���н��ߣ������Ƿ�������Ƽ���
		echo Mediator::isTechAllow('ScienceFacility')?' can create ScienceVessel ~ ':' can not create ScienceVessel ~ ';
	}
}

//��һ���Ƽ�վ
$scienceFacility1 = new ScienceFacility();

//����һ���Ƽ�վ
$scienceFacility2 = new ScienceFacility();

//��һ���ɻ���
$starport = new Starport();

//����Ƽ��򣬽�����ܹ�
$starport->createScienceVessel();

//һ���Ƽ�վ���ݻ�
unset($scienceFacility1);

//��ʱ����Ƽ��򣬽�����ܹ�����Ϊ����һ���Ƽ�վ
$starport->createScienceVessel();

//��һ���Ƽ�վ���ݻ�
unset($scienceFacility2);

//��ʱ����Ƽ��򣬽���ǲ���
$starport->createScienceVessel();

?>