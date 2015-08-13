<?php
namespace Club\Controller;
use Think\Controller;
class ActivityController extends CommonController{
    public function index(){
      $this->display();
    }
    /**
    * 发布活动
    * @author fangdong
    */ 
    public function publish(){     
       	    $ActivityInfo = I();
            $result = D('Activity')->publish_activity($ActivityInfo);
            if($result){
                   ajax_return('发布成功',C('Ok'),'Ok');
            }else{
                   ajax_return('发布失败',C('Error'),'Error');
               }       
    }
   }