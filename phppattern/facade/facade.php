<?php
/**
 * 外观模式 示例
 *
 * 为子系统中的一组接口提供一个一致的界面,定义一个高层接口,使得这一子系统更加的容易使用
 */

class car {
	public function start() {
		print_r("车子启动\n");
	}
	public function check_stop() {
		print_r("刹车检查正常\n");
	}
	public function check_box() {
		print_r("检查油箱正常\n");
	}
	public function check_console() {
		print_r("检查仪表盘是否异常\n");
	}
}

//facade模式
class carfacade {
	public function catgo(car $carref){
		$carref->check_stop();
		$carref->check_box();
		$carref->check_console();
		$carref->start();
	}
}
//客户端可以简单的去调用。
$car = new car();
$carObj = new carfacade();
$carObj->catgo($car);