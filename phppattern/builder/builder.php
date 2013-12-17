<?php
/**
 * ������ģʽ
 *
 * ��һ�����Ӷ���Ĺ��������ı�ʾ����,ʹ��ͬ���Ĺ������̿��Դ�����ͬ�ı�ʾ 
 */

//�淶�����������Ľӿ�
interface Builder
{
	//�����ͼ���
	public function buildMapPart();

	//���콨�����
	public function buildBuildingPart();

	//���첿�����
	public function buildArmyPart();

	//��װ���
	public function getResult();

}



//ʵ�ʽ������࣬�����ʼ��ĳ�������
class ConcreteBuilder implements Builder
{
	//�����ͼ���
	public function buildMapPart()
	{
		//����������趨���ϵ�ͼ
		//echo '��ͼ���\n';
		echo 'build map part ~~ ';
	}

	//���콨�����
	public function buildBuildingPart()
	{
		//����������趨���Ͻ�����������ҵĺ͵��˵�
		//echo '�������\n';
		echo 'build buinding part ~~ ';
	}

	//���첿�����
	public function buildArmyPart()
	{
		//����������趨���ϲ��ӣ�������ҵĺ͵��˵�
		//echo '�������\n';
		echo 'build army part ~~ ';
	}

	//��װ���
	public function getResult()
	{
		//�����еĶ������Ӻʹ����γɳ�ʼ������
		//echo '��װ���\n';
		echo 'get all part ~~';
	}

}



//�ල�࣬Ҳ���ǿ��ƻ������̵���
class Director
{
	//˽�����ԣ�ȷ��ʹ�õĽ�����
	private $builder;

	//���췽��������Ϊѡ���Ľ���������
	public function __construct($builder)
	{
		//ȷ��ʹ�õĽ�����
		$this->builder = $builder;
	}

	//���������̵ķ��������ý���������ķ����������������
	public function buildeAllPart()
	{
		//�����ͼ���
		$this->builder->buildMapPart();

		//���콨�����
		$this->builder->buildBuildingPart();

		//���첿�����
		$this->builder->buildArmyPart();

	}

}



//�����������أ���ʼ��������Ҫ��ʵ�ʽ���������
$concreteBuilder = new ConcreteBuilder();

//��ʼ��һ���ල����
$director = new Director($concreteBuilder);

//�����������
$director->buildeAllPart();

//����ý�������װ��������ɻ���
$concreteBuilder->getResult();

?>