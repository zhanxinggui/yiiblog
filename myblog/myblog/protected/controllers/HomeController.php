<?php
class HomeController extends Controller
{
	public $layout='//layouts/blog';
	
	public function actionIndex()
	{
		$year = Yii::app()->request->getParam('year');
		$month = Yii::app()->request->getParam('month');
		$tags = Yii::app()->request->getParam('tags');
		$criteria = new CDbCriteria();
		if(isset($tags)){
			$criteria->addSearchCondition('tags',$tags);
		}
		
		$id = Yii::app()->request->getParam('id');
		if(isset($id)){
			$criteria->addSearchCondition('author_id',$id);
		}else{
			$criteria->addSearchCondition('author_id',Yii::app()->user->id);
		}
		
//		if(!Yii::app()->user->id){
//			$this->redirect('index.php?r=user/login');
//		}
		
		if(isset($month)){
			$criteria=array(
		      'condition'=>'create_time > :time1 AND create_time < :time2 AND status=1',
		      'params'=>array(':time1' => mktime(0,0,0,$month,1,$year),
		                      ':time2' => mktime(0,0,0,$month+1,1,$year),
		                      ),
          );
		}
		
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
		
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}
	
	public function actionAbout()
	{
		
		$this->render('about');	
	}
}