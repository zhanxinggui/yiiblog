<?php
class PhotoController extends Controller
{
	
	public function actionIndex()
	{
		$dataProvider = new CActiveDataProvider('Photo', array(
			'pagination'=>array(    
	            'pageSize'=>8,    
	            'pageVar'=>'page',    
	        ),     
			'sort'=>array(
                'defaultOrder'=> 'create_time  DESC',
            )
		));
		
		$this->render('index',array('dataProvider'=>$dataProvider));
	}
	
	public function actionList()
	{
		$id = Yii::app()->request->getParam('id');
		$criteria = new CDbCriteria();
		if(isset($id)){
			$criteria->addSearchCondition('category_id',$id);
		}
		
		$dataProvider = new CActiveDataProvider('Photo', array(
			'criteria'=>$criteria,
			'pagination'=>array(    
	            'pageSize'=>2,    
	            'pageVar'=>'page',    
	        ),     
			'sort'=>array(
                'defaultOrder'=> 'create_time  DESC',
            )
		));
		
		
		
		$this->render('list',array('dataProvider'=>$dataProvider));
	}
	
	public function actionView()
	{
		$id = Yii::app()->request->getParam('id');
		$model = $this->loadModel($id);
		
		$this->render('detail',array('model'=>$model));
	}
	
	public function actionUpdate()
	{
		$this->render('update');
	}
	
	public function actionDelete()
	{
		$id = Yii::app()->request->getParam('id');
		$pic_url = Yii::app()->request->getParam('pic_url');
		if(isset($id))
		{
			$this->loadModel($id)->delete();
			
			$upload_dir = dirname(__FILE__).'/../../';
			
			if(file_exists($upload_dir.$pic_url))
			{
				unlink($upload_dir.$pic_url);
			}
			
		}
		
		$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
	}
	
	public function actionCreate()
	{
		$model = new Photo();
		if(isset($_POST['Photo']))
		{
			foreach ($_POST['Photo'] as $k=>$v)
			{
				$model->$k = $v;
			}
			
			
			$upload_image = CUploadedFile::getInstance($model,'pic_url');//model 与 字段名
	        $upload_dir = dirname(__FILE__).DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'uploads'.DIRECTORY_SEPARATOR.Yii::app()->user->id.'/';
	        var_dump($upload_image);
	        if(is_object($upload_image)){
	            $filename = time().'_'.rand();
	            $ext = $upload_image->extensionName;//上传文件的扩展名
	            $uploadfile = $upload_dir . $filename . '.' . $ext; //保存的路径
	            $model->pic_url = '/uploads/'.Yii::app()->user->id.'/'.$filename . '.' . $ext;//重新赋值
	        }
	        self::recursionMkDir($upload_dir);
	        if($model->save()){
	            $upload_image->saveAs($uploadfile);//保存到服务器
	            $this->redirect(array('index','id'=>$model->id));
	        }
	        
		}
		
		$this->render('add',array('model'=>$model));
	}
	
	private static function recursionMkDir($dir){
		if(!is_dir($dir)){
			if(!is_dir(dirname($dir))){
				self::recursionMkDir(dirname($dir));
				mkdir($dir,'0777');
				chmod($dir, 0777);
			}else{
				mkdir($dir,'0777');
				chmod($dir, 0777);
			}
		}
	}
	
	public function loadModel($id)
	{
		$model=Photo::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
	
	
}