<?php
class ApplicationBehavior extends CBehavior
{
	public function events()  
    {  
        return array_merge(parent::events(),array(  
                'onBeginRequest'=>'beginRequest' 
        ));  
    }  
    
    public function beginRequest($event)   
    {  
        echo "我已经将 onBeginRequest 的事件处理通过行为绑定了";  
    }  
}
