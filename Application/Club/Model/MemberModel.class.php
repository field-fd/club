<?php
namespace Club\Model;
use Think\Model;
class MemberModel extends Model
{
    /**
     * 成员状态修改， 0待审核，1通过，2驳回，3删除到回收站
     * @author Jason
     * @param bool  
     */
    function  AlterStatus($id,$status){
    	$data['status'] = $status;
        $result = $this->where(array('id'=>$id))->save($data);
        return $result;
    }






 ｝