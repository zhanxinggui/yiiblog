<?php
class System extends CActiveRecord
{

	
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	} 
	
	public function tableName()
	{
		return '{{system}}';
	}
	
	
	public function rules()
	{
		return array(
			// username and password are required
			array('site_name,site_url', 'required'),

		);
	}
	
	public function attributeLabels()
	{
		return array(
			'site_name'=>'博客名称',
			'site_url'=>'博客地址',
			'keywords'=>'关键字',
			'copyright'=>'版权',
			'is_closed'=>'是否关闭',
			'close_information'=>'关闭原因',
			
		);
	}

	
}