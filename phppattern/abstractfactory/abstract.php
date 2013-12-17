<?php
/**
 * ���󹤳�ģʽ
 *
 * �ṩһ���ӿڣ����ڴ�����ػ���������ļ��壬��������ȷָ�������ࡣ
 */

//�ĸ���Ʒ��
//�����Լ�������ʱ�����
class mineMouse {
	//������ɫ
	public $color = 'green';
}

//���е��˵�����ʱ�����
class enemyMouse {
	//������ɫ
	public $color = 'red';
}

//�Լ������䴬״̬
class mineDropship {
	//��ʾװ�ص����������2��̹��
	public $loading = '2 tanks';
}

//���˵����䴬״̬
class enemyDropship {
	//����ʾװ�ص����
	public $loading = '';
}

 

//�������࣬Ҳ�г��󹤳���
class abstractCreator {
  //���ݲ������乤��������Ĺ����������ؾ��幤������
  public function getCreator($belong)
  {
    //��ȡ���幤��������
    $creatorClassName = $belong.'Creator';
    //���ؾ��幤������
    return new $creatorClassName();
  }

}

//���幤������ִ�еĽӿ�
interface productCreator {
	//���췽��,����˵���ݲ������ز�Ʒ(���,���䴬)�ķ���
	public function creatProduct($productName);
}

//���������Լ�������ľ��幤��,ִ�нӿ�
class mineCreator implements productCreator {
  //���ݲ������������������Լ��Ĳ�Ʒ
  public function creatProduct($productName)
  {
    //��ȡ��Ʒ������
    $productClassName = 'mine'.$productName;
    //���ز�Ʒ����
    return new $productClassName;
  }

}

//�������ڵ��˵�����ľ��幤��,ִ�нӿ�
class enemyCreator implements productCreator {
  //���ݲ����������������ڵ��˵Ĳ�Ʒ
  public function creatProduct($productName)
  {
    //��ȡ��Ʒ������
    $productClassName = 'enemy'.$productName;
    //���ز�Ʒ����
    return new $productClassName;
  }

}

//��ʼ����
//�½����󹤳�����
$abstractCreator = new abstractCreator();

//���ݹ���,�õ����幤������,��������ʾ���˵�
$realCreator1 = $abstractCreator->getCreator('enemy');

//�þ��幤����������������
$product1 = $realCreator1->creatProduct('Mouse');

//����������ʾ��ɫ,��ʾ���red
echo $product1->color;

 

//���ݹ���,�õ���һ�����幤������,������ʾ�Լ���
$realCreator2 = $abstractCreator->getCreator('mine');

//�þ��幤�������������䴬
$product2 = $realCreator2->creatProduct('Dropship');

//�����䴬������ʾװ�ض���,��ʾ���2 tanks������̹��
echo $product2->loading;

?>