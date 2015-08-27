<?php
namespace Club\Controller;
use Think\Controller;
class ActivityController extends CommonController {
  /**
    * 活动操作接口
    * @author jason
    */
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
     
    private function getActivity(){
        $ActivityID = I('id');
        if(!$ActivityID){
            ajax_return('缺少查询的条件',C('NoSearchCondition'),'NoSearchCondition');
        }
        $departInfo = M('Department')->where('id ='.$ActivityID)->find();
        if($departInfo){
            ajax_return($departInfo,C('Ok'),'Ok');
        }else{
            ajax_return('未查询到数据',C('NoData'),'NoData');
        }
    } */
    /**
     * 创建活动
     * @author fangdong
     * @param string ActivityTheme  活动名称
     */
    private function addActivity(){
        $ActivityInfo = I();
        $rCreateActivity = D('Activity')->publish_activity($ActivityInfo);
        if($rCreateActivity){
            ajax_return('活动已添加，等待审核',C('Ok'),'Ok');
        }else{
            ajax_return('活动添加失败',C('Error'),'Error');
        }
    }
    /**
     * 更新活动
     * @author fangdong
     * @param int  $ActivityID  活动主键id
     */
    private function putActivity(){
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
        $updateInfo = D('Activity')->where(array('id')=>$ActivityID)->save($data);
        if($departInfo){
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
    private function deleteActivity(){
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
            ajax_return('未能成功删除活动',C('Error'),'Error');
        }
    }
}