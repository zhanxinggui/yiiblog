<?php
/**
 * ��������
 *
 * ������һ����������Ľӿڣ������������Ҫʵ�����������ĸ����������������ʵ�����ӳٵ����ࡣ
 */

//�������幤������ִ�еĽӿ�
interface abstractCreator {
	//�涨�������幤��Ҫʵ�ֵķ���
	public function realCreate();
}

//�������������࣬Ҳ����������
class BarracksCreator {
	
  //������ֵķ���
  public function create($createWhat)
  {
   //��������Ĳ�������̬�İ���Ҫ����Ķ����ļ�����
    require_once($createWhat.'.php');

   //��������Ĳ�������̬�Ļ�ȡ��Ӧ�ľ��幤�����������
    $creatorClassName = $createWhat.'Creator';

   //�½����幤������
    $creator = new $creatorClassName;

   //�þ��幤����ʵ��������Ȼ�󷵻���Ҫ����Ķ�����Ϊ���Ƕ�ִ���˽ӿ�abstractCreator�����Կ϶�ʵ���˷���realCreate()
    return $creator->realCreate();

  }

}

//�½�һ����������������
$creator = new BarracksCreator();

//�����ղ�������һ�����������
$troop1 = $creator->create('Marine');
$troop1->attack();

 

//�����ղ�������һ����ǹ������
$troop2 = $creator->create('Firebat');
$troop2->attack();

?>