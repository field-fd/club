<?php
namespace Club\Controller;
use Think\Controller;
class DepartmentController extends CommonController {
        /**
         * 社团部门展示
         * @author fangdong
         */
      public function index(){
          $list = M('department')->select();
	        $this->list = $list;
	        $this->display();

      }
   /**
    * 部门操作接口
     * @author jason
    */
    public function departmentApi(){
        $type = I('type');
        if(!$type){
            ajax_return('缺少请求参数类型',C('TypeEmpty'),'TypeEmpty');
        }
        switch ($type) {
            case 'get': //查找部门
                $this->getDepart();
                break;
            case 'post': //创建部门
                $this->postDepart();
                break;
            case 'put': //更新部门
                $this->putDepart();
                break;
            case 'delete': //删除部门
                $this->deleteDepart();
                break;
            default:
                break;
        }
    }
    /**
     * 查找部门
     * @author fangdong
     */
    private function getDepart(){
        $departID = I('id');
        if(!$departID){
            ajax_return('缺少查询的条件',C('NoSearchCondition'),'NoSearchCondition');
        }
        $departInfo = D('Department')->where('id = '.$departID)->find();
        if($departInfo){
            ajax_return($departInfo,C('Ok'),'Ok');
        }else{
            ajax_return('未查询到数据',C('NoData'),'NoData');
        }
    }
    /**
     * 创建部门
     * @author fangdong
     */
    private function addDepart(){
        $club_id = session('club_info.id');
        $name    = I('departmentName');
        if(!$name){
            ajax_return('部门名称不可为空',C('DepartEmpty'),'DepartEmpty');
        }
        $introduce = I('introduce');
        $data = array(
            'club_id'     => $club_id,
            'name'        => $name,
            'introduce'   => $introduce,
            'create_time' => time()
            );
        $rAddDepart = D('Department')->addDepartment($data);
    }
    /**
     * 更新部门资料
     * @author fangdong
     */
    private function putDepart(){
        $departID = I('id');
        if(!$departID){
             ajax_return('缺少查询的条件',C('NoSearchCondition'),'NoSearchCondition');
        }
        $updateInfo = D('Department')->putDepart($departID);
        if($departInfo){
             ajax_return('资料已更新',C('Ok'),'Ok');
        }else{
             ajax_return('资料更新失败！',C('Error'),'Error');
        }
    }
    /**
     * 删除部门
     * @author fangdong
     */
    private function deleteDepart(){
        $checkbox = I('checkbox');
        if($checkbox == ''){
            ajax_return('缺少查询的条件',C('NoSearchCondition'),'NoSearchCondition');
        }
        if(is_array($checkbox)){
            $where = 'id in ('.implode(',', $checkbox).')';
        }else{
            $where = 'id = '.$checkbox;
        }
        $list = M('department')->where($where)->delete();
        if($list!==false){
             ajax_return("已删除{$list}个部门",C('Ok'),'Ok');
        }else{
             ajax_return('未能成功删除部门',C('Error'),'Error');
        }
    }
}