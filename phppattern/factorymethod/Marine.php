<?php
//��ǹ����
class Marine {
  //��ǹ�������ķ���
  public function attack()
  {
    echo 'Marine attack';
  }

}

//�����ǹ�����ִ࣬�нӿ�abstractCreator

class MarineCreator implements abstractCreator {

  //ʵ�������ǹ���ķ���
  public function realCreate()
  {
    //���ˮ�������50������ֻ����Ϊ˵������Ϊ��������ore���������Ҳ������ˮ������50�Ĵ���
//    if($ore>50)
//    {
    	return new Marine();
//    }

  }

}

?>