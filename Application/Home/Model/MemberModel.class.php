<?php
namespace Home\Model;
use Think\Model;
class MemberModel extends Model{
	/**
	 * 简历申请信息核对
	 * @author fangdong
	 * @param $postData array　需要核对的信息
	 */
	function checkInfo($postData)
	{
	foreach ($postData as $key => $value) {
            switch ($key) {
                case 'college':
                     if($postData[$key]==''){
                         ajax_return('请输入学院',C('CollegeError'),'CollegeError');
                     }   
                    break;
                case 'class':
                     if($postData[$key]==''){
                         ajax_return('请输入班级',C('ClassError'),'ClassError');
                     }   
                    break;
                case 'telephone':
                     if($postData[$key]==''){
                         ajax_return('请输入手机号',C('PhoneEmpty'),'PhoneEmpty');
                     }
                     if(!preg_match("/1[34578]{1}\d{9}$/",$postData[$key])){  
                         ajax_return('请输入正确的手机号码',C('PhoneError'),'PhoneError');
                    }
                    break;
                case 'email':
                     if($postData[$key]==''){
                         ajax_return('请输入邮箱',C('EmailError'),'EmailError');
                     }
                     if(!preg_match("/^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(.[a-zA-Z0-9_-])+/",$postData[$key])){  
                         ajax_return('请输入正确的邮箱地址',C('EmailError'),'EmailError');
                     }
                    break;
                case 'qq':
                     if($postData[$key]==''){
                         ajax_return('请输入QQ',C('QQEmpty'),'QQEmpty');
                     }
                     if(!preg_match('/^[1-9][0-9]{4,10}$/', $postData[$key])){  
                        ajax_return('请输入正确的qq号码',C('QQError'),'QQError');
                    }  
                    break;
                case 'hobby':
                     if($postData[$key]==''){
                         ajax_return('请输入爱好',C('HobbyError'),'HobbyError');
                     }   
                    break;
                case 'reason':
                     if($postData[$key]==''){
                         ajax_return('请输入加入理由',C('ReasonError'),'ReasonError');
                     } 
                    break;
                 case 'username':
                     if($postData[$key]==''){
                         ajax_return('用户名不能为空',C('UserEmpty'),'UserEmpty');
                     } 
                    break;
                default:
                    break;
            }
        }
	}

    function apply_data_insert($postData){
            $this->checkInfo($postData);    
            $data = array(
                'name'      => $postData['username'],
                'email'     => $postData['email'],
                'college'   => $postData['college'],
                'class'     => $postData['class'],
                'sex'       => $postData['sex'],
                'telephone' => $postData['telephone'],
                'qq'        => $postData['qq'],
                'department_name' => $postData['departmentName'],
                'hobby'     => $postData['hobby'],
                'reason'    => $postData['reason'],
                'club_id'   => $postData['club_id'],
                'stu_id'    => $postData['stu_id'],   //申请学生id
                'apply_time'=> time()   //申请时间
              );
             $result=$this->add($data);  //数据添加到数据表
             return  $result;
    }
}