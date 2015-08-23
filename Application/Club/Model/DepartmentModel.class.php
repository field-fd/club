<?php
namespace Club\Model;
use Think\Model;
class DepartmentModel extends Model
{
    /**
     * 添加新的部门
     * @param array $data 需要添加的部门资料
     * @return int $rInfo 添加成功后返回的ID
     */
    public function addDepartment($data){
        if(!$data){
            return false;
        }
        $rInfo = $this->data($data)->add();
        return $rInfo;
    }
}