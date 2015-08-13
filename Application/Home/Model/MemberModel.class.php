<?php
namespace Home\Model;
use Think\Model;
class MemberModel extends Model{
	/**
	 * 简历申请信息核对
	 * 
	 * @param $postData array　需要核对的信息
	 */
	function checkInfo($postData)
	{
	foreach ($postData as $key => $value) {
            switch ($key) {
                case 'college':
                     if($postData[$key]==''){
                         ajax_return('请输入学院',C('ConllegeError'),'ConllegeError');
                     }   
                    break;
                case 'class':
                     if($postData[$key]==''){
                         ajax_return('请输入班级',C('ClassError'),'ClassError');
                     }   
                    break;
                case 'telephone':
                     if($postData[$key]==''){
                         ajax_return('请输入手机号',C('PhoneError'),'PhoneError');
                     }
                     if(!preg_match("/1[34578]{1}\d{9}$/",$postData[$key])){  
                         ajax_return('请输入正确的手机号码',C('PhoneError'),'PhoneError');
                    }
                    break;
                case 'email':
                     if($postData[$key]==''){
                         ajax_return('请输入邮箱',C('EmailError'),'EmailError');
                     }
                     if(!preg_match("/^([0-9A-Za-z\\-_\\.]+)@([0-9a-z]+\\.[a-z]{2,3}(\\.[a-z]{2})?)$/i",$postData[$key])){  
                         ajax_return('请输入正确的邮箱地址',C('EmailError'),'EmailError');
                     }
                    break;
                case 'qq':
                     if($postData[$key]==''){
                         ajax_return('请输入QQ',C('QQError'),'QQError');
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
                default:
                    break;
            }
        }
	}

    function apply_data_insert($postData){
            $username = session('username');  //用户名
            $data = array(
                'name' =>  $username,
                'email' => $postData['email'],
                'college' => $postData['college'],
                'class' => $postData['class'],
                'sex' => $postData['sex'],
                'telephone' => $postData['telephone'],
                'qq' => $postData['qq'],
                'department_name' => $postData['department_name'],
                'hobby' => $postData['hobby'],
                'reason'=> $postData['reason'],
                'club_id' => $postData['club_id'],
                'stu_id' => session('stu_id'),   //申请学生id
                'apply_time'=> time()   //申请时间
              );
             $result=$this->data($data)->add();  //数据添加到数据表
             return  $result;
    }
}