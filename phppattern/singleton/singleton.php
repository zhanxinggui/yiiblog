<?php
/**
 * ����ģʽ
 *
 * ȷ��һ����ֻ��һ��ʵ�������ṩһ��ȫ�ַ��ʵ㡣
 */

//��������Ϊfinal����ֹ������̳���
final class cheat {

	//���ٽ������Ч״̬����private����
	private $fastBuild = false;

	//��static��Ա������Ψһ�Ķ���
	private static $instance;

	//���ÿ��ٽ������Ч״̬�ķ�������publicΪ���ܹ���������
	public function setStatus($input)
	{
		//���������ؼ���ȷ��operation cwal�ǿ��ٽ�����ؼ�
		if($input === 'operation cwal')
		{
			//�񿪹�һ�����淴״̬
			$this->fastBuild = !$this->fastBuild ;
		}

	}

	//��ȡ���ٽ������Ч״̬�ķ�������publicΪ���ܹ���������
	public function getStatus()
	{
		return $this->fastBuild ;
	}

	//��ȡΨһ�����Ψһ����
	public function getInstance()
	{
		//�������û�б��½������½���
		if(!isset(self::$instance))
		{
			self::$instance = new cheat() ;
		}
		return self::$instance ;

	}

	//��private����ֹ�ڱ�������new����
	private function __construct(){}

	//��private����ֹ�ڱ�������clone����
	private function __clone(){}

}



//��ȡ���׶����Ψһ�취
$cheatInstance = cheat::getInstance();

//�������Ϊ0����Ͳ���ϵͳ�йأ���Щ�������false�������var_dump������echo��
echo $cheatInstance->getStatus();

//�����ؼ�
$cheatInstance->setStatus('operation cwal');

//�������Ϊ1����Ͳ���ϵͳ�йأ���Щ�������true�������var_dump������echo��
echo $cheatInstance->getStatus();

//�ٴ������ؼ���ȡ������
$cheatInstance->setStatus('operation cwal');

//�������Ϊ�ֱ��0����Ͳ���ϵͳ�йأ���Щ�������false�������var_dump������echo��
echo $cheatInstance->getStatus();

?>