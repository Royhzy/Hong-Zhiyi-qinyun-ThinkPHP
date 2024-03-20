<?php

namespace app\wxapi\model;

use think\Model;

class Dingdans extends Model
{

    // 表名
    protected $name = 'dingdan';

    public static function adddd($data){                    //添加记录
        $res_data=self::insert($data);
        if($res_data){
            return true;
        }else{
            return false;
        }
    }

    public static function querydingdan($openid){                    //根据openid查询订单
        $res_data=Self::where('openid',$openid)->order('id desc')->select();
        if($res_data){
            return json($res_data);
        }else{
            return false;
        }
    }

    public static function querynshouhuodingdan($openid){                    //根据openid查询待收货订单
        $res_data=Self::where('openid',$openid)->where('shouhuo',0)->order('id desc')->select();
        if($res_data){
            return json($res_data);
        }else{
            return false;
        }
    }

    public static function updateshouhuo($id){                    //对应的购物车id记录num+1
        $res_data=Self::where('id',$id)->setField('shouhuo', 1);
        if($res_data){
            return true;
        }else{
            return false;
        }
    }
    
    public static function idquerydingdan($id){                    //根据id查询订单
        $res_data=Self::where('id',$id)->select();
        if($res_data){
            return json($res_data);
        }else{
            return false;
        }
    }
    
    public static function udpingjia($id){                    //对应的购物车id记录num+1
        $res_data=Self::where('id',$id)->setField('pingjia', 1);
        if($res_data){
            return true;
        }else{
            return false;
        }
    }
}



