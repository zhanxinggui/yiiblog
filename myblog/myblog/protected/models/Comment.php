<?php
class Comment extends CActiveRecord
{
	const STATUS_PENDING=1;
	const STATUS_APPROVED=2;
	
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public function tableName()
	{
		return '{{comment}}';
	}
	
	public function rules()
	{
		return array(
			array('content, status, author, email, article_id', 'required'),
			array('status, comment_time, article_id', 'length', 'max'=>11),
			array('author, email,ip', 'length', 'max'=>128),
			array('email','email'),
		);
	}
	
	public function relations()
	{
		return array(
            'article' => array(self::BELONGS_TO, 'Article', 'article_id'),
		);
	}
	
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'author' => 'Author',
			'content' => 'Content',
			'email' => 'Email',
			'ip' => 'Ip',
		);
	}
	
	public function addComment($comment)
	{
		if(Yii::app()->params['commentNeedApproval'])
			$comment->status=Comment::STATUS_PENDING;
		else
			$comment->status=Comment::STATUS_APPROVED;
		$comment->article_id=$this->id;
		return $comment->save();
	}
	
	protected function beforeSave()
	{
		if(parent::beforeSave())
		{
			if($this->isNewRecord)
				$this->comment_time=time();
				$this->ip = Yii::app()->request->userHostAddress;  
			return true;
		}
		else
			return false;
	}
	
	public function findRecentComments($limit=10)
	{
		return $this->with('article')->findAll(array(
				'condition'=>'t.status='.self::STATUS_APPROVED,
				'order'=>'t.comment_time DESC',
				'limit'=>$limit,
		));
	}
	
	
	
}