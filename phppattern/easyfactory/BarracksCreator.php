<?php
/**
 * �򵥹���
 *
 * �򵥹���ģʽ���Խ��½������������з�װ��һ����Ҫ�����µķ����ֻ࣬Ҫ�޸ĸ����½�������ǲ��ִ��롣
 */

//��������������
class BarracksCreator {

  //������ֵķ���
  public function  create($createWhat)
  {

   //��������Ĳ�������̬�İ���Ҫ����Ķ����ļ�����
    require_once($createWhat.'.php');

   //��������Ĳ�������̬�ķ�����Ҫ����Ķ���
    return new $createWhat;

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