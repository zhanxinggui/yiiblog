<?php
//机枪兵类
class Marine {
  //机枪兵攻击的方法
  public function attack()
  {
    echo 'Marine attack';
  }

}

//制造机枪兵的类，执行接口abstractCreator

class MarineCreator implements abstractCreator {

  //实际制造机枪兵的方法
  public function realCreate()
  {
    //如果水晶矿大于50，这里只是作为说明，因为并不存在ore这个变量，也不考虑水晶少于50的处理
//    if($ore>50)
//    {
    	return new Marine();
//    }

  }

}

?>