<?php
class Article extends CActiveRecord
{
	
	const STATUS_PUBLISHED=1;
	const STATUS_ARCHIVED=2;
	public $year;
    public $month;
    public $posts = 0;
    private $_oldTags;
	
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}


	public function tableName()
	{
		return '{{article}}';
	}
	
	public function rules()
	{
		return array(
			array('title, content, summary, status', 'required'),
			array('title', 'length', 'max'=>128),
			array('summary', 'length', 'max'=>255),
			
		);
		
	}
	
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		//array(self::BELONGS_TO,'对应的模型',array('本模型的外键'=>'对应模型的主键'))
		return array(
//            'articlecategory' => array(self::BELONGS_TO, 'Articlecategory', 'category_id'),
			'author' => array(self::BELONGS_TO, 'User', 'author_id'),
			'comments' => array(self::HAS_MANY, 'Comment', 'article_id', 'condition'=>'comments.status='.Comment::STATUS_APPROVED, 'order'=>'comments.comment_time DESC'),
			'commentCount' => array(self::STAT, 'Comment', 'article_id', 'condition'=>'status='.Comment::STATUS_APPROVED),
		);
	}
	
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'title' => 'Title',
			'content' => 'Content',
			'summary' => 'Summary',
			'tags' => 'Tags',
			'status' => 'Status',
			'flag' => 'Flag',
			'create_time' => 'Created',
			'update_time' => 'Updated',
			'author_id' => 'Author',
			'category_id' => 'Category',
		);
	}
	
	protected function beforeSave()
	{
		if(parent::beforeSave())
		{
			if($this->isNewRecord)
			{
				$this->create_time=$this->update_time=time();
				$this->author_id= Yii::app()->user->id;
			}
			else
				$this->update_time=time();
			return true;
		}
		else
			return false;
	}
	
	protected function afterSave()
	{
		parent::afterSave();
		Tag::model()->updateFrequency($this->_oldTags, $this->tags);
	}
	
	protected function afterDelete()
	{
		parent::afterDelete();
		Comment::model()->deleteAll('article_id='.$this->id);
		Tag::model()->updateFrequency($this->tags, '');
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
	
    public function findArchives()
	{
		return $this->findAll(array(
                'select'=>'YEAR(FROM_UNIXTIME(create_time)) AS `year`, MONTH(FROM_UNIXTIME(create_time)) AS `month`, count(id) as posts',
                'condition'=>'t.status='.self::STATUS_PUBLISHED,
                'group'=>'YEAR(FROM_UNIXTIME(create_time)), MONTH(FROM_UNIXTIME(create_time))',
				'order'=>'t.create_time DESC',
		));
	}
	

	public function placestr($ident)
	{
		switch($ident) {
			case '1':
				return 'a';
				break;
			case '2':
				return 'b';
				break;
			default:
				return 'c';
				break;
		}
	}
	
	
}