<?php
//火焰兵类
class Firebat {
  //火焰兵攻击的方法
  public function attack()
  {
    echo 'Firebat attack';
  }

}

//制造火焰兵的类，执行接口abstractCreator
class FirebatCreator implements abstractCreator
{
  //实际制造火焰兵的方法
  public function realCreate()
  {
    //如果水晶矿大于50同时气矿大于25，并且研究院已经存在。这里只是作为说明，因为并不存在ore和gas和Academy变量，也不考虑资源不够时的处理
//    if($ore>50 && $gas>25 && Academy>1)
//    {
    	return new Firebat();
//    }

  }

}

?>