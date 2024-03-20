<?php

namespace app\wxapi\model;

use think\Model;

class Renzhengs extends Model
{

    // 表名
    protected $name = 'renzheng';

    public static function queryrz($openid){                    //根据openid查询
        $res_data=Self::where('openid',$openid)->select();
        if($res_data){
            return json($res_data);
        }else{
            return false;
        }
    }
    
    public static function shenqing($data){                    //添加认证申请
        $res_data=self::insert($data);
        if($res_data){
            return true;
        }else{
            return false;
        }
    }


    
    
}



