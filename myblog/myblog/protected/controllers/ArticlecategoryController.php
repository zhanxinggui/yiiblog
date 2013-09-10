<?php
class ArticlecategoryController extends Controller
{
	public function actionView($id)
	{
		$model = $this->loadModel($id);
		$this->render('view',array(
			'model'=>$model,
		));
	}
	
	public function actionCreate()
	{
		$model = new Articlecategory;
		if(isset($_POST['Articlecategory']))
		{
			$model->attributes=$_POST['Articlecategory'];
			if($model->save())
				$this->redirect('index.php?r=articlecategory/index');
		}
		
		$this->render('add',array('model'=>$model));
	}
	
	public function actionUpdate($id)
	{
		$model = $this->loadModel($id);
		if($_POST['Articlecategory'])
		{
			$model->attributes = $_POST['Articlecategory'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
			
		}
		
		$this->render('update',array(
			'model'=>$model,
		));
		
	}
	
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Articlecategory');

		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
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
	
	public function loadModel($id)
	{
		$model=Articlecategory::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
	
}