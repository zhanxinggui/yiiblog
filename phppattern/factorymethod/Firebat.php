<?php
//�������
class Firebat {
  //����������ķ���
  public function attack()
  {
    echo 'Firebat attack';
  }

}

//�����������ִ࣬�нӿ�abstractCreator
class FirebatCreator implements abstractCreator
{
  //ʵ�����������ķ���
  public function realCreate()
  {
    //���ˮ�������50ͬʱ�������25�������о�Ժ�Ѿ����ڡ�����ֻ����Ϊ˵������Ϊ��������ore��gas��Academy������Ҳ��������Դ����ʱ�Ĵ���
//    if($ore>50 && $gas>25 && Academy>1)
//    {
    	return new Firebat();
//    }

  }

}

?>