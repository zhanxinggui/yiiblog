<?php
/**
 * ������ģʽ
 *
 * �ṩһ�ַ���˳�����һ���ۺ϶����еĸ���Ԫ�أ����ֲ���¶���ڲ��ı�ʾ��
 */

//�ۼ��ӿڣ���˼�����е��Ե�ũ�񶼾ۼ������������
interface IAggregate
{
	//�þ���ľۼ���ʵ�ֵģ���ȡʹ�õĵ������ķ���
	public function createIterator();

}


//����ľۼ���
class ConcreteAggregate implements IAggregate
{
	//���ũ������飬ע����Բ��������������������еĴ����֪����
	public $workers;

	//����Ԫ�صķ���������Ԫ�ؾ���ũ��
	public function addElement($element)
	{
		$this->workers[] = $element;
	}

	//��ȡԪ�صķ���
	public function getAt($index)
	{
		return $this->workers[$index];
	}

	//��ȡԪ�ص������ķ���
	public function getLength()
	{
		return count($this->workers);
	}

	//��ȡ�������ķ���
	public function createIterator()
	{
		return new ConcreteIterator($this);
	}

}



//�������ӿڣ�ע��php5�и����õĽӿڽ�Iterator�������������Ǹĳ�IIterator
interface IIterator
{
	//�Ƿ�Ԫ��ѭ�����
	public function hasNext();

	//������һ��Ԫ�أ�����ָ���1
	public function next();

}



//����ĵ�������
class ConcreteIterator implements IIterator
{
	//Ҫ�����ļ���
	public $collection;

	//ָ��
	public $index;

	//���캯����ȷ�������ļ��ϣ�����ָ������
	public function __construct($collection)
	{
		var_dump($collection);
		$this->collection = $collection;
		$this->index = 0;
	}

	//�Ƿ�Ԫ��ѭ�����
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

	//������һ��Ԫ�أ�����ָ���1
	public function next()
	{
		$element = $this->collection->getAt($this->index);
		$this->index++;
		return $element;
	}

}

//��ʼ�����Ե�ũ��ľۼ�����
$farmerAggregate = new ConcreteAggregate();

//���ũ������򵥵����ַ�����ʾ
$farmerAggregate->addElement('SVC1');

$farmerAggregate->addElement('SVC2');

//��ȡ������
$iterator = $farmerAggregate->createIterator();

//��ũ��ۼ�����ѭ��
while ($iterator->hasNext())
{
	//��ȡ��һ��ũ��
	$element = $iterator->next();

	//���Ǽ򵥵����
	echo $element."\n";

}

?>