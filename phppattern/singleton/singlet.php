<?php
/**
 * ��̬ģʽ
 *
 * ��̬ģʽ����ͨ��Ψһ����������һ�£�������صĳ�Ա����Ϊstatic��������ʹ���ںܶ�����Ķ���
 * �����ǹ����Ա������״̬��һ�¡�ͬʱҲ����̳С�
 */

//��ʹ��final������̳�
class cheat {

  //���ٽ������Ч״̬����private������ͬʱ����static�����е����׶�����
  private static $fastBuild = false;

  //���ÿ��ٽ������Ч״̬�ķ�������publicΪ���ܹ���������
  public function setStatus($input)
  {
        //���������ؼ���ȷ��operation cwal�ǿ��ٽ�����ؼ�
        if($input === 'operation cwal')
        {
        	//�񿪹�һ�����淴״̬
        	self::$fastBuild = !self::$fastBuild ;
        }
  }

  //��ȡ���ٽ������Ч״̬�ķ�������publicΪ���ܹ���������
  public function getStatus()
  {
    	return self::$fastBuild ;
  }

}

 

//����һ�����׶���
$cheatInstance1 = new cheat();

//�������Ϊ0����Ͳ���ϵͳ�йأ���Щ�������false�������var_dump������echo��
echo $cheatInstance1->getStatus();

//�����ؼ�
$cheatInstance1->setStatus('operation cwal');

//�������Ϊ1����Ͳ���ϵͳ�йأ���Щ�������true�������var_dump������echo��
echo $cheatInstance1->getStatus();

//����һ�����׶���
$cheatInstance2 = new cheat();

//����Ҳ�����Ϊ1����Ϊ���ǹ���$fastBuild
echo $cheatInstance2->getStatus();

?>