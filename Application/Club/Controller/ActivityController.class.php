<?php
namespace Club\Controller;
use Think\Controller;
class ActivityController extends CommonController {
  /**
    * 活动操作接口
    */
    public function departmentApi(){
        $type = I('type');
        if(!$type){
            ajax_return('缺少请求参数类型',C('TypeEmpty'),'TypeEmpty');
        }
        switch ($type) {
            case 'get': //查找
                $this->getActivity();
                break;
            case 'post': //创建
                $this->postActivity();
                break;
            case 'put': //更新
                $this->putActivity();
                break;
            case 'delete': //删除
                $this->deleteActivity();
                break;
            default:
                break;
        }
    }
    /**
     * 查找活动
     * @param int $id 
     */
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
    }
    /**
     * 创建活动
     * @param string ActivityTheme  活动名称
     */
    private function addActivity(){
        $club_id  = session('club_info.id');
        $club_name= session('club_info.name');
        $theme    = I('ActivityTheme');
        if(!$theme){
            ajax_return('活动名称不可为空',C('ActivityEmpty'),'ActivityEmpty');
        }
        $content  = I('content');
        if(!$content){
            ajax_return('活动名称不可为空',C('ActivityEmpty'),'ActivityEmpty');
        }
        $image    = I('images');
        $time   = time();
        $data = array(
          'club_id' => $club_id,
          'club_name' => $club_name,
          'theme'   => $theme,
          'content' => $content,
          'image'   => $time,
          'status'  => 0,
          );
        $rCreateActivity = M('Activity')->data($data)->add();
        if($rCreateActivity){
            ajax_return('活动已添加，等待审核',C('Ok'),'Ok');
        }else{
            ajax_return('活动添加失败',C('Error'),'Error');
        }
    }
    /**
     * 更新活动
     * @param int  $ActivityID  活动主键id
     */
    private function putActivity(){
        $ActivityID = I('id');
        if(!$ActivityID){
            ajax_return('缺少查询的条件',C('NoSearchCondition'),'NoSearchCondition');
        }
        $updateInfo = D('Activity')->putActivity($ActivityID);
        if($departInfo){
            ajax_return('资料已更新',C('Ok'),'Ok');
        }else{
            ajax_return('资料更新失败！',C('Error'),'Error');
        }
    }
    /**
     * 删除活动
     * @param mixed $checkbox  被选中的ID
     */
    private function deleteActivity(){
        $checkbox = I('checkbox');
        if($checkbox == ''){
            ajax_return('缺少查询的条件',C('NoSearchCondition'),'NoSearchCondition');
        }
        if(is_array($checkbox)){
            $where = 'id in ('.implode(',', $checkbox).')';
        }else{
            $where = 'id = '.$checkbox;
        }
        $list = M('Activity')->where($where)->delete();
        if($list!==false){
            ajax_return("已删除{$list}个部门",C('Ok'),'Ok');
        }else{
            ajax_return('未能成功删除部门',C('Error'),'Error');
        }
    }
}