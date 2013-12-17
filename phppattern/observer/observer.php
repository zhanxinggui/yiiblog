<?php
/**
 * �۲���ģʽ
 *
 * �����˶���֮���һ�Զ�����������һ������һ������ı�״̬ʱ���������������߶����յ�֪ͨ���Զ����¡�
 */

//����Ľ�����
abstract class abstractAlly {
  	//���ù۲��ߵļ��ϣ������Լ򵥵�������ֱ����ʾ
  	public $oberserverCollection;
  	//���ӹ۲��ߵķ���������Ϊ�۲��ߣ�Ҳ����ң�������
  	public function addOberserver($oberserverName)
  	{
    	//��Ԫ�صķ�ʽ���۲��߶������۲��ߵļ���
    	$this->oberserverCollection[] = new oberserver($oberserverName);
  	}

  	//���������ĵ��Ե�����֪ͨ�����۲���
  	public function notify($beAttackedPlayerName)
  	{
        //�ѹ۲��ߵļ���ѭ��
        foreach ($this->oberserverCollection as $oberserver)
        {
        	//���ø����۲��ߵľ�Ԯ����������Ϊ�������ĵ��Ե����֣�if�����ų��������ĵ��ԵĹ۲���
        	if($oberserver->name != $beAttackedPlayerName) $oberserver->help($beAttackedPlayerName);
        }
 	}

  	abstract public function beAttacked($beAttackedPlayer);

}

//����Ľ�����

class Ally extends abstractAlly {

  	//���캯���������е�����ҵ����Ƶ�������Ϊ����
  	public function __construct($allPlayerName)
  	{
        //�����е�����ҵ�����ѭ��
        foreach ($allPlayerName as $playerName)
        {
        	//���ӹ۲��ߣ�����Ϊ����������ҵ�����
        	$this->addOberserver($playerName);
        }
  	}

  	//���������ĵ��Ե�����֪ͨ�����۲���
  	public function beAttacked($beAttackedPlayerName)
  	{
     	//���ø����۲��ߵľ�Ԯ����������Ϊ�������ĵ��Ե����֣�if�����ų��������ĵ��ԵĹ۲���
     	$this->notify($beAttackedPlayerName);
  	}

}

//�۲��ߵĽӿ�

interface Ioberserver {
	//����淶��Ԯ����
	function help($beAttackedPlayer);
}

//����Ĺ۲�����
class oberserver implements Ioberserver {
  //�۲��ߣ�Ҳ����ң����������
  public $name;

  //���캯��������Ϊ�۲��ߣ�Ҳ����ң�������

  public function __construct($name)
  {
    	$this->name = $name;
  }

  //�۲��߽��о�Ԯ�ķ���
  public function help($beAttackedPlayerName)
  {
        //����򵥵������˭ȥ��˭������һ�����У�������ʾ
        echo $this->name." help ".$beAttackedPlayerName."<br>";
  }

  

}

 

//������һ���������ҳ��壬һ������
$allComputePlayer = array('Zerg1', 'Protoss2', 'Zerg2');

//�½����Խ���
$Ally = new Ally($allComputePlayer);

//�����ҽ����˵ڶ�������
$Ally->beAttacked('Zerg2');

?>