<?php
class SystemController extends Controller
{
	
	public function actionUpdate()
	{
		$id= Yii::app()->user->id;
		$model = System::model()->findByAttributes(array('author_id'=>$id));

		if(!$model){
			$sysmodel = new System;
			$sysmodel->author_id=Yii::app()->user->id;
			$sysmodel->site_name='my blog';
			$sysmodel->is_closed=0;
			$sysmodel->site_url=(Yii::app()->request->hostInfo).(Yii::app()->homeUrl).'?r='.(yii::app()->defaultController).'/index&id='.(Yii::app()->user->id);
			$sysmodel->save();
			$model = System::model()->findByAttributes(array('author_id'=>$id));
		}
		
		if(isset($_POST['System']))
		{
			foreach ($_POST['System'] as $k=>$v)
			{
				$model->$k=$v;
			}
			
			//$model->attributes = $_POST['System'];

			$model->save();
			
		}
		
		$this->renderPartial('update',array('model'=>$model));
		
	}
	
}