<?php
class ArticleController extends Controller
{
	public $layout='//layouts/blog';
	
	public function actionView($id)
	{
		$post = $this->loadModel($id);

		$comment=$this->newComment($post);

		$this->render('view',array(
			'model'=>$post,
			'comment'=>$comment,
		));
	}
	
	public function actionCreate()
	{
		$model = new Article();
		if(isset($_POST['Article']))
		{
			foreach ($_POST['Article'] as $k=>$v)
			{
				$model->$k = $v;
			}
			
//			$model->attributes=$_POST['Article'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}
		
		$this->render('add',array('model'=>$model));
	}
	
	public function actionUpdate($id)
	{
		$model = $this->loadModel($id);
		if(isset($_POST['Article']))
		{
//			foreach ($_POST['Article'] as $k=>$v)
//			{
//				$model->$k = $v;
//			}
			
			$model->attributes=$_POST['Article'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}
		
		$this->render('update',array('model'=>$model));
	}
	
	public function actionIndex()
	{
		$auth = Yii::app()->authManager;
		$role = $auth->createRole('owner');
		$auth->createOperation('createProject','create a new project');
		$role->addChild('createProject');
		
		
		$criteria = new CDbCriteria();
		$criteria->addSearchCondition('author_id',Yii::app()->user->id);
		
		$dataProvider = new CActiveDataProvider('Article', array(
			'criteria'=>$criteria,
			'pagination'=>array(    
	            'pageSize'=>6,    
	            'pageVar'=>'page',    
	        ),     
			'sort'=>array(
                'defaultOrder'=> 'update_time  DESC',
            )
		));
		
		$this->render('index',array('dataProvider'=>$dataProvider));
	}
	
	public function actionDelete($id)
	{
//		if(Yii::app()->request->isPostRequest)
//		{
			$this->loadModel($id)->delete();
			
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
			
//		}
//		else
//			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}
	
	
	public function actionDelall()
	{
		if (Yii::app()->request->isPostRequest)
		{
			$criteria= new CDbCriteria;
			$criteria->addInCondition('id', $_POST['selectdel']);
			Article::model()->deleteAll($criteria);
			 
			if(isset(Yii::app()->request->isAjaxRequest)) {
				echo CJSON::encode(array('success' => true));
			} 
			else
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}
	
	public function actionTransfer($id)
	{
		if(Yii::app()->user->getIsGuest()){
			$this->redirect('index.php?r=user/login');
		}
		
		$model = $this->loadModel($id);
		if(isset($_POST['Article']))
		{
			$newmodel = new Article();
			
			$newmodel->old_author_id = $model->author_id;
			$newmodel->is_transfer = 1;
			$newmodel->transfer_info = $_POST['Article']['transfer_info'];
			$newmodel->author_id = Yii::app()->user->id;
			
			$newmodel->title = $model->title;
			$newmodel->summary = $model->summary;
			$newmodel->content = $model->content;
			$newmodel->tags = $model->tags;
			$newmodel->status = $model->status;
			$newmodel->category_id = $model->category_id;
			
			if($newmodel->save())
				$this->redirect(array('view','id'=>$model->id));
		}
		
		$this->render('transfer',array('model'=>$model));
	}
	
	public function loadModel($id)
	{
		$model=Article::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
	
	protected function newComment($post)
	{
		$comment=new Comment;
		if(isset($_POST['ajax']) && $_POST['ajax']==='comment-form')
		{
			echo CActiveForm::validate($comment);
			//Yii::app()->end();
		}
		if(isset($_POST['Comment']))
		{
			$comment->attributes=$_POST['Comment'];
			if($post->addComment($comment))
			{
				if($comment->status==Comment::STATUS_PENDING)
					Yii::app()->user->setFlash('commentSubmitted','Thank you for your comment. Your comment will be posted once it is approved.');
				$this->refresh();
			}
		}
		
		return $comment;
		
	}

	
}