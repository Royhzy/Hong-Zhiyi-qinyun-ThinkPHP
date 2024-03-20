<?php

namespace app\wxapi\model;

use think\Model;

class Guanzhus extends Model
{

    // 表名
    protected $name = 'guanzhu';

    public static function querynum($teacher_id,$openid){                    //查询种类
        $res_data=Self::where('teacher_id',$teacher_id)->where('openid',$openid)->select();
        if($res_data){
            return json($res_data);
        }else{
            return false;
        }
    }

    public static function removeguanzhu($teacher_id,$openid){                    //删除勾选
        $res_data=Self::where('openid',$openid)->where('teacher_id', $teacher_id)->delete();      

        if($res_data){
            return true;
        }else{
            return false;
        }
    }

    public static function adddata($data){                    //添加关注记录
        $res_data=self::insert($data);
        if($res_data){
            return true;
        }else{
            return false;
        }
    }
    
    public static function queryguanzhu($openid){                    //根据openid查询关注
        $res_data=Self::where('openid',$openid)->select();
        if($res_data){
            return json($res_data);
        }else{
            return false;
        }
    }
    
}



