<?php

namespace app\wxapi\model;

use think\Model;

class Courses extends Model
{

    // 表名
    protected $name = 'course';

    public static function querycs($teacher_id){                    //sfz查询教师课表
        $res_data=Self::where('teacher_id',$teacher_id)->order('jie asc')->order('weekday asc')->select();
        if($res_data){
            return json($res_data);
        }else{
            return false;
        }
    }

    public static function delkebiao($teacher_id){                    //删除课表
        $res_data=self::where('teacher_id',$teacher_id)->delete();
        if($res_data){
            return true;
        }else{
            return false;
        }
    }

    public static function udkebiao($data){                    //更新课表
        $res_data=self::insert($data);
        if($res_data){
            return true;
        }else{
            return false;
        }
    }

}



