<?php
class CommentController extends Controller
{
	public function actionIndex()
	{
		$dataProvider = new CActiveDataProvider('Comment');
		$this->render('index',array('dataProvider'=>$dataProvider));
	}
	
	public function actionCreate()
	{
		$comment=$this->newComment();

	}
	
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			$this->loadModel($id)->delete();
			
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
			
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}
	
	public function actionUpdate($id)
	{
		$model = $this->loadModel($id);
		if(isset($_POST['Comment']))
		{

			$model->status=$_POST['Comment']['status'];
			if($model->save())
				$this->redirect(array('index'));
		}
		
		$this->render('update',array('model'=>$model));
		
	}
	
	public function actionView($id)
	{
		$model = $this->loadModel($id);

		$this->render('view',array('model'=>$model));
		
	}
	
	protected function newComment()
	{
		$comment=new Comment;
		if(isset($_POST['ajax']) && $_POST['ajax']==='comment-form')
		{
			echo CActiveForm::validate($comment);
			Yii::app()->end();
		}
		if(isset($_POST['Comment']))
		{
			$comment->attributes=$_POST['Comment'];
			if($comment->addComment($comment))
			{
				if($comment->status==Comment::STATUS_PENDING)
					Yii::app()->user->setFlash('commentSubmitted','Thank you for your comment. Your comment will be posted once it is approved.');
				$this->refresh();
			}
		}
		
		return $comment;
		
	}
	
	public function loadModel($id)
	{
		$model=Comment::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
	
}