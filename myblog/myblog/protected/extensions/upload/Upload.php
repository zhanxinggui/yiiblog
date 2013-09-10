<?php

class Upload{
	public static function createFile($upload,$type,$act,$imgurl=''){
		if(!empty($imgurl)&&$act==='update'){
			$deleteFile=Yii::app()->basePath.'/../'.$imgurl;
			if(is_file($deleteFile))
			unlink($deleteFile);
		}
		$uploadDir=Yii::app()->basePath.'/../uploads/'.$type.'/'.date('Y-m',time());
		
		self::recursionMkDir($uploadDir);
		$imgname=time().'-'.rand().'.'.$upload->extensionName;
		//Í¼Æ¬´æ´¢Â·¾¶
		$imageurl='/uploads/'.$type.'/'.date('Y-m',time()).'/'.$imgname;
		//´æ´¢¾ø¶ÔÂ·¾¶
		$uploadPath=$uploadDir.'/'.$imgname;
		if($upload->saveAs($uploadPath)){
			return $imageurl;
		}else{
			return null;
		}
	}
	private static function recursionMkDir($dir){
		if(!is_dir($dir)){
			if(!is_dir(dirname($dir))){
				self::recursionMkDir(dirname($dir));
				mkdir($dir,0777);
			}else{
				mkdir($dir,0777);
			}
		}
	}
}

