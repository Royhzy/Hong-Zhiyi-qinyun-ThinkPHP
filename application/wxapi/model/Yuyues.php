<?php

namespace app\wxapi\model;

use think\Model;

class Yuyues extends Model
{

    // 表名
    protected $name = 'yuyue';

    public static function addyy($data){                    //添加预约记录
        $res_data=self::insert($data);
        if($res_data){
            return true;
        }else{
            return false;
        }
    }

    public static function queryyuyue($openid){                    //根据openid查询订单
        $res_data=Self::where('openid',$openid)->order('id desc')->select();
        if($res_data){
            return json($res_data);
        }else{
            return false;
        }
    }
    
    public static function updatezhifu($id,$feiyongtime){                   //修改支付
        $res_data=Self::where('id',$id)->setField('feiyong', 1);
        $res_data2=Self::where('id',$id)->setField('feiyongtime', $feiyongtime);
        if($res_data&$res_data2){
            return true;
        }else{
            return false;
        }
    }

    public static function jsqueryyuyue($teacher_id){                    //根据teacher_id查询预约订单
        $res_data=Self::where('teacherid',$teacher_id)->order('id desc')->select();
        if($res_data){
            return json($res_data);
        }else{
            return false;
        }
    }

    public static function querydsk($teacher_id){                    //根据teacher_id查询预约待上课订单
        $res_data=Self::where('teacherid',$teacher_id)->where('shangke',0)->order('id desc')->select();
        if($res_data){
            return json($res_data);
        }else{
            return false;
        }
    }
}



