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
         * 增加部门
         * @author fangdong
         */
     public function addDepartment(){ 
       $DepartmentName = I('department'); //部门名字
       $department = D('department');
       $rAdd = $department->addDepartment($DepartmentName) ; 	 
	     if ($rAdd)
	      {
		       ajax_return('添加部门成功',C('Ok'),'Ok');
	      }else{
		       ajax_return('添加部门失败',C('Error'),'Error');
	   }
   }
        /**
         * 删除部门
         * @author fangdong
         */
  public function deleteDepartment(){
	           $checkbox = I('checkbox'); 
             $rResult = D('department')->deleteDepartment($checkbox) ;                   
             if($rResult!==false) {
                  ajax_return('成功删除{$rResult}条！',C('Ok'),'Ok');
             }else{
                  ajax_return('删除失败',C('Error'),'Error');
              }
	   
	   }
       /**
         * 修改部门
         * @author fangdong
         */
    public function alterDepartment(){
        $data = I();	    	
	     	$rAlter=D('department')->alterDepartment($data);
	    	if($rAlter){
	   	  	   ajax_return('修改成功',C('Ok'),'Ok');
	    	}else{
	   	  	   ajax_return('修改失败',C('Error'),'Error');
	    	}

   }



	}