<?php
class UserController extends Controller
{
	public function actions()
	{
		return array(
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
		
		);
	}
		
	public function actionLogin()
	{
		$model = new User();
		if($_POST['User'])
		{
			$model->attributes=$_POST['User'];
			
			if($model->validators && $model->login())
			{
				$this->redirect('./index.php?r=home/index');
			}
			
		}
		
		$this->renderPartial('login',array('model'=>$model));
	}
	
	public function actionRegister()
	{
		$model = new Register();
		
		if($_POST['Register'])
		{
			$model->attributes = $_POST['Register'];
			if($model->save()){
				$this->redirect('./index.php?r=user/login');
			}
		}
		
		$this->renderPartial('register',array('model'=>$model));
	}
	
	public function actionUpdate($id)
	{
		$model = $this->loadModel($id);

		if(isset($_POST['UserInfo']))
		{
			foreach ($_POST['UserInfo'] as $k => $v)
			{
				$model->$k = $v;
			}
			
			//$model->attributes = $_POST['UserInfo'];

			$upload_image = CUploadedFile::getInstance($model,'headpic');//model 与 字段名
	        $upload_dir = dirname(__FILE__).DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'uploads'.DIRECTORY_SEPARATOR;
	        
	        if(is_object($upload_image)){
	            $filename = time().'_'.rand();
	            $ext = $upload_image->extensionName;//上传文件的扩展名
	            $uploadfile = $upload_dir . $filename . '.' . $ext; //保存的路径
	            $model->headpic = '/uploads/'.$filename . '.' . $ext;//重新赋值
	        }
	        if($model->save()){
	        	
	            $upload_image->saveAs($uploadfile);//保存到服务器

	            $this->redirect(array('index','id'=>$model->id));
	        }
			
			
//			$model->headpic=CUploadedFile::getInstance($model,'headpic');
//           
//			if($model->save())
//			{
//				$model->headpic->saveAs('path/to/localFile');
//				$this->redirect(array('update','id'=>$model->id));
//			}
            
			
		}
		
		$this->renderPartial('updateInfo',array('model'=>$model));
		
	}
	
	public function actionIndex($id)
	{
		$model = $this->loadModel($id);
		
		$this->renderPartial('index',array('model'=>$model));
	}
	
	public function loadModel($id)
	{
		$model=UserInfo::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
	
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect('./index.php?r=home/index');
	}
	
	
}