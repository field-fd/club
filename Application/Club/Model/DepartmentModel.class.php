<?php
namespace Club\Model;
use Think\Model;
class DepartmentModel extends Model
{
    /**
     * 增加部门，添加信息到数据库
     * @author fangdong
     * @param bool
     */
    function addDepartment($name){
    	 if($name==''){
             ajax_return('请输入部门名字',C('DeparementError'),'DeparementError');
          }
    	 $club_id = session('club_id');
	     $data=array(
	        'club_id' => $club_id,
	        'name' => $name, 
	     ); 
	     $result = $this->data($data)->add();
	     return $result;
    }
    /**
     * 删除部门
     * @author fangdong
     * @param int $result
     */
    function deleteDepartment($checkbox){
    	    if(is_array($checkbox)){
                 $where = 'id in('.implode(',',$checkbox).')';
             }elseif($checkbox==""){
                 ajax_return('请选择要删除的部门',C('DeparementError'),'DeparementError');
             }else{
                 $where = 'id='.$checkbox;
             }
            $result=$this->where($where)->delete();
            return $result;   

    }
     /**
     * 修改部门
     * @author fangdong
     * @param bool
     */
    function alterDepartment($AlterData){
    	 $id=$AlterData['departmentId'];
         $name=$AlterData['departmentName'];
         if($name==''){
             ajax_return('部门名字不能为空',C('DeparementError'),'DeparementError');
          }
	     $data['name']=$name;
	     $result=$this->where(array('id'=>$id))->save($data);
         return $result;
    }

}
        