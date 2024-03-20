<?php

namespace app\wxapi\model;

use think\Model;

class Pingjias extends Model
{

    // 表名
    protected $name = 'pingjia';

    public static function querypj($goods_id){                    //查询种类
        $res_data=Self::where('goodsid',$goods_id)->select();
        if($res_data){
            return json($res_data);
        }else{
            return false;
        }
    }
    
    public static function addpj($data){                    //添加评价
        $res_data=self::insert($data);
        if($res_data){
            return true;
        }else{
            return false;
        }
    }
    
}



