<?php
/**
 * ģ��ģʽ
 *
 * ��һ�������ж���һ���㷨�ĹǼܣ�����һЩ�����ӳٵ������С�ģ�巽��ʹ�����಻�ı��㷨�ṹ������£����¶����㷨�е�ĳЩ���衣
 */

//�����Ŀ���࣬���Ǹ�������
abstract class evolution {
  //��ܷ�����������ʵʩ�������裬��final��ֹ���า��
  final public function process()
  {
    //����һ����������Ϊ�����Ĳ���
    $egg = $this->becomeEgg();

    //�ȴ�������������Ϊ��
    $this->waitEgg($egg);

    // ����������²���
    echo $this->becomeNew($egg);

  }

  //�����������󷽷����ɾ���������ʵ��
  abstract public function becomeEgg();

  abstract public function waitEgg($egg);

  abstract public function becomeNew($egg);

}

//Ϊ�˼�˵���������ÿ�����ʿ����з���Ľ���������ʾ���ش̵ȵĴ���������

//��з�Ľ�����̳г��������
class GuardianEvolution extends evolution {
  
  //ʵ������һ����
  public function becomeEgg()
  {
   	echo 'becoming egg~';
  }

  //�ȴ�������
  public function waitEgg($egg)
  {
   //�ȴ���ʮ���ӵĴ���
    echo  'waiting egg ~';
   	sleep(5);
  }

  //����������²���
  public function becomeNew($egg)
  {
   	$army = 'new man';
   	return $army;
   
  }

}

//�½�һ����з�����Ķ���
$e1 = new GuardianEvolution();

//�������ø���Ľ�����ܺ������Զ������������
$e1->process();

?>