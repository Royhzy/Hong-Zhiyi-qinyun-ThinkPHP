<?php

namespace app\wxapi\model;

use think\Model;

class Teachers extends Model
{

    // 表名
    protected $name = 'teacher';


    public static function queryinsarea($instrument,$area){                    //查询乐器和地区关键词
        $res_data=Self::where('area', 'like', '%'.$area.'%')->where('instrument', 'like', '%'.$instrument.'%')->select();     
        if($res_data){
            return json($res_data);
        }else{
            return false;
        }
    }
    
    public static function queryDetail($sfz){                     //用sfz查询具体教师信息
        $res_data=Self::where('sfz',$sfz)->find();
        if($res_data){
            return $res_data;
        }else{
            return false;
        }
    }

    public static function sfzQueryDetail($sfz){                     //用sfz查询具体教师信息
        $res_data=Self::where('sfz',$sfz)->find();
        if($res_data){
            return $res_data;
        }else{
            return false;
        }
    }
    
    public static function udziliao($data,$sfz){                    //修改资料
        $res_data=self::where('sfz',$sfz)->update($data);
        if($res_data){
            return true;
        }else{
            return false;
        }
    }
}



