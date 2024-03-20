<?php

namespace app\wxapi\controller;

use think\Controller;
use app\wxapi\model\Courses;

class Course extends Controller
{
    public function queryCourse()            //sfz查询教师课表
    {
        $teacher_id=input('teacher_id');
        if($teacher_id){
            $res_data=Courses::querycs($teacher_id);
            if($res_data){
                return $res_data;
                return jsonRespose(200,'获取成功');           
            }else{
                return jsonRespose(400,'获取失败');
            }
        }else{
            return jsonRespose(400,'参数错误');
        }
    }

    public function deletekebiao()            //删除课表
    {
        $teacher_id=input('teacher_id');
        if($teacher_id){
            $res_data=Courses::delkebiao($teacher_id);
            if($res_data){
                return jsonRespose(200,'删除成功');
            }else{
                return jsonRespose(400,'删除失败');
            }
        }else{
            return jsonRespose(400,'参数错误');
        }
    }

    public function updatekebiao()            //更新课表
    {
        $param=input('post.');
        if($param){
            $res_data=Courses::udkebiao($param);
            if($res_data){
                return jsonRespose(200,'更新成功');
            }else{
                return jsonRespose(400,'更新失败');
            }
        }else{
            return jsonRespose(400,'参数错误');
        }
    }
}
