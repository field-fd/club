<?php
namespace Club\Model;
use Think\Model;
class ActivityModel extends Model
{
 /**
     * 验证发布的活动信息
     * @author fangdong
     * @param array $ActivityInfo
     */
    function checkActivity($ActivityInfo){      
            foreach ($ActivityInfo as $key => $value) {
                switch ($key) {
                    case 'theme':
                        if($ActivityInfo[$key]==''){
                            ajax_return('请输入活动主题',C('ThemeError'),'ThemeError');
                        }
                        break;
                    case 'content':
                        if($ActivityInfo[$key]==''){
                            ajax_return('请输入活动内容',C('ActivityError'),'ActivityError');
                        }                   
                        break;
                    default:
                        break;
                }
            }
    }
   /**
     * 发布的活动到数据库
     * @author fangdong
     * @param  array $ActivityInfo  活动信息
     * @return bool   
     */
 function publish_activity($ActivityInfo){
        $this->checkActivity($ActivityInfo);
        //图片上传
        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize   =     1048576 ;// 设置附件上传大小
        $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->rootPath  =     './Public/Uploads/'; // 设置附件上传根目录
        $info   =   $upload->uploadOne($_FILES['image']);  //上传图片
        if(!$info) {// 上传错误
             ajax_return($upload->getError(),C('UploadError'),'UploadError'); 
        }
        $data=array(
                'theme' =>  $ActivityInfo['theme'],
                'content' => $ActivityInfo['content'],
                'image' => $info['savepath'].$info['savename'],
                'club_id' => session('club_id'),
                'club_name' =>session('club_name'),
                'time' => time()  
           );
        $result=$this->data($data)->add();  //数据添加到数据库
        return $result;
    }
}

