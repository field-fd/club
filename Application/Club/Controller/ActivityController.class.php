<?php
namespace Club\Controller;
use Think\Controller;
class ActivityController extends CommonController {
   /**
     * 社团部门展示
     * @author fangdong
     */
 public function index(){
        $where['club_id'] = session('club_id');
        $list = M('Activity')->where($where)->select();
          $this->list=$list;
        $this->display();
      }
  /**
    * 活动操作接口
    * @author jason
    *//*
    public function activityApi(){
        $type = I('type');
        if(!$type){
            ajax_return('缺少请求参数类型',C('TypeEmpty'),'TypeEmpty');
        }
        switch ($type) {
            case 'add': //创建
                $this->addActivity();
                break;
            case 'put': //修改
                $this->putActivity();
                break;
            case 'delete': //删除
                $this->deleteActivity();
                break;
            default:
                break;
        }
    }
    /*
     * 查找活动
     * @author fangdong
     * @param int $id 
     */
    public function showActivity(){
        $ActivityID = I('id');
        if(!$ActivityID){
            ajax_return('缺少查询的条件',C('NoSearchCondition'),'NoSearchCondition');
        }
        $activity = M('Activity')->where(array('id'=>$ActivityID))->find();
        $this->activity=$activity;
        $this->display();
    } 
    /**
     * 创建活动
     * @author fangdong
     * @param string ActivityTheme  活动名称
     */
    public function addActivity(){
        $ActivityInfo = I();
        $rCreateActivity = D('Activity')->publish_activity($ActivityInfo);
        if($rCreateActivity){
            $this->success('活动已添加，等待审核','index',3);
        }else{
            $this->error('添加失败');
        }
    }
    /**
     * 更新活动
     * @author fangdong
     * @param int  $ActivityID  活动主键id
     */
    public function putActivity(){
        $ActivityID = I('id');
        if(!$ActivityID){
            ajax_return('缺少查询的条件',C('NoSearchCondition'),'NoSearchCondition');
        }
        $theme   = I('theme');
        if($theme==""){
             ajax_return('请输入活动主题',C('ThemeEmpty'),'ThemeEmpty');
        }
        $content  = I('content');
        if($content==""){
             ajax_return('请输入活动内容',C('ActivityEmpty'),'ActivityEmpty');
        }
        $data['theme'] = $theme;
        $data['content'] = $content;
        $updateInfo = D('Activity')->where(array('id'=>$ActivityID))->save($data);
        if($updateInfo){
            ajax_return('活动已更新',C('Ok'),'Ok');
        }else{
            ajax_return('活动更新失败！',C('Error'),'Error');
        }
    }
    /**
     * 删除活动
     * @author fangdong
     * @param mixed $checkbox  被选中的ID
     */
    public function deleteActivity(){
        $checkbox = I('checkbox');
        if($checkbox == ''){
            ajax_return('请选择要删除的活动',C('NoSearchCondition'),'NoSearchCondition');
        }
        if(is_array($checkbox)){
            $where = 'id in ('.implode(',', $checkbox).')';
        }else{
            $where = 'id = '.$checkbox;
        }
        $list = M('Activity')->where($where)->delete();
        if($list!==false){
            ajax_return("已删除{$list}个活动",C('Ok'),'Ok');
        }else{
            ajax_return('删除失败',C('Error'),'Error');
        }
    }
}