<?php
/**
 * ����ģʽ
 *
 * Ϊ���������ṩһ�������Կ����������ķ��� ��
 */

//�ͻ�����������������ʱ��ͬҪʵ�ֵĽ��
interface iDataProcess
{
	//��ȡ���ݵķ�����$ID��ʾ��ҵ�ID��$dataName��ʾ��ȡ�����ݵ�����
	public function getData($ID, $dataName);

	//�ı����ݵķ�����$ID��ʾ��ҵ�ID��$dataName��ʾҪ�ı�����ݵ����ƣ�$dataValue��ʾ�ı������ݵ�ֵ
	public function updateData($ID, $dataName, $dataValue);

}



//�����������ݵ���
class DataProcess implements iDataProcess
{
	// ��ȡ���ݵķ�����$ID��ʾ��ҵ�ID��$dataName��ʾ��ȡ�����ݵ�����
	public function getData($ID, $dataName)
	{
		//�������ݿ�֮��Ĵ���
	}

	//�ı����ݵķ�����$ID��ʾ��ҵ�ID��$dataName��ʾҪ�ı�����ݵ����ƣ�$dataValue��ʾ�ı������ݵ�ֵ
	public function updateData($ID, $dataName, $dataValue)
	{
		//�������ݿ�֮��Ĵ���
	}

}



//�ͻ����������ݵ��࣬Ҳ���Ǵ�����
class ProxyDataProcess implements iDataProcess
{
	//�����������ݵĶ���
	private $dataProcess;

	//���캯��
	public function __construct()
	{
		$this->dataProcess = new DataProcess();
	}

	// ��ȡ���ݵķ�����$ID��ʾ��ҵ�ID��$dataName��ʾ��ȡ�����ݵ�����
	public function getData($ID, $dataName)
	{
		//�ж��Ƿ�ֱ������������
		switch ($dataName)
		{
			//�����ѯˮ����
			case 'ore':
				//ֱ�Ӵӿͻ�����������ݶ�ȡ����ϸ�����Թ�
				break;
			//�����ѯ����
			case 'gas':
				//ֱ�Ӵӿͻ�����������ݶ�ȡ����ϸ�����Թ�
				break;
			default:
				$this->dataProcess->getData($ID, $dataName);
		}

	}

	//�ı����ݵķ�����$ID��ʾ��ҵ�ID��$dataName��ʾҪ�ı�����ݵ����ƣ�$dataValue��ʾ�ı������ݵ�ֵ
	public function updateData($ID, $dataName, $dataValue)
	{
		//�Ͷ�ȡ��˼·���ƣ������ˮ��������󣬾���д��ͻ��������ݴ洢���ٸ��������޸�
	}
}



//�½�һ���ͻ����������ݵĶ���
$proxyDataProcess = new ProxyDataProcess();

//������ʾ������Լ�������ʣ������
$proxyDataProcess->getData(3, 'gas');

?>