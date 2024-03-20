<?php

namespace app\wxapi\model;

use think\Model;

class Carts extends Model
{

    // 表名
    protected $name = 'cart';

    public static function querynum($goods_id,$openid){                    //查询种类
        $res_data=Self::where('goodsid',$goods_id)->where('openid',$openid)->select();
        if($res_data){
            return json($res_data);
        }else{
            return false;
        }
    }

    public static function addnum($goods_id,$openid){                    //购物车有该条记录，则num+1
        $res_data=Self::where('goodsid',$goods_id)->where('openid',$openid)->inc('num')->update();
        if($res_data){
            return true;
        }else{
            return false;
        }
    }

    public static function adddata($data){                    //购物车没有该条记录，添加记录
        $res_data=self::insert($data);
        if($res_data){
            return true;
        }else{
            return false;
        }
    }


    public static function querycart($openid){                    //根据openid查询购物车
        $res_data=Self::where('openid',$openid)->select();
        if($res_data){
            return json($res_data);
        }else{
            return false;
        }
    }

    public static function addidnum($id){                    //对应的购物车id记录num+1
        $res_data=Self::where('id',$id)->inc('num')->update();
        if($res_data){
            return true;
        }else{
            return false;
        }
    }

    public static function subidnum($id){                    //对应的购物车id记录num-1
        $res_data=Self::where('id',$id)->dec('num')->update();
        if($res_data){
            return true;
        }else{
            return false;
        }
    }

    public static function updateselected($id,$selected){                    //购物车有该条记录，则num+1
        if($selected==1){
            $res_data=Self::where('id',$id)->setField('selected', 1);
        }else{
            $res_data=Self::where('id',$id)->setField('selected', 0);        
        }

        if($res_data){
            return true;
        }else{
            return false;
        }
    }

    public static function updateselectedall($openid,$selected){                    //购物车有该条记录，则num+1
        if($selected==1){
            $res_data=Self::where('openid',$openid)->setField('selected', 1);
        }else{
            $res_data=Self::where('openid',$openid)->setField('selected', 0);        
        }

        if($res_data){
            return true;
        }else{
            return false;
        }
    }

    public static function removeselected($openid){                    //删除勾选
        $res_data=Self::where('openid',$openid)->where('selected', 1)->delete();      

        if($res_data){
            return true;
        }else{
            return false;
        }
    }

    public static function queryselectedcart($openid){                    //根据openid查询勾选的购物车记录
        $res_data=Self::where('openid',$openid)->where('selected',1)->select();
        if($res_data){
            return json($res_data);
        }else{
            return false;
        }
    }
}



