<?php

namespace app\wxapi\model;

use think\Model;

class Yueqis extends Model
{

    // 表名
    protected $name = 'yueqi';

    public static function queryc($catogory){                    //查询种类
        $res_data=Self::where('catogory',$catogory)->select();
        if($res_data){
            return json($res_data);
        }else{
            return false;
        }
    }

    public static function queryDetail($id){                     //用id查询具体乐器
        $res_data=Self::where('id',$id)->find();
        if($res_data){
            return $res_data;
        }else{
            return false;
        }
    }

    public static function addCarts($data){                     //用id查询具体乐器
        $res_data=Self::where('id',$id)->find();
        $res_data=self::insert($data);
        if($res_data){
            return $res_data;
        }else{
            return false;
        }
    }

    public static function queryk($catogory,$key){                    //搜索关键词
        $res_data=Self::where('title', 'like', '%'.$key.'%')->where('catogory',$catogory)->select();     
        if($res_data){
            return json($res_data);
        }else{
            return false;
        }
    }

    public static function querysale($catogory,$key){                    //搜索关键词 销量降序排序
        $res_data=Self::where('title', 'like', '%'.$key.'%')->where('catogory',$catogory)->order("sale desc")->select();     
        if($res_data){
            return json($res_data);
        }else{
            return false;
        }
    }

    public static function ordersale($catogory){                    //销量降序排序
        $res_data=Self::where('catogory',$catogory)->order("sale desc")->select();     
        if($res_data){
            return json($res_data);
        }else{
            return false;
        }
    }

    public static function queryprice($catogory,$key,$sc){                    //搜索关键词 价格排序
        $res_data=Self::where('title', 'like', '%'.$key.'%')->where('catogory',$catogory)->order("price ".$sc)->select();     
        if($res_data){
            return json($res_data);
        }else{
            return false;
        }
    }

    public static function orderprice($catogory,$sc){                    //搜索关键词 价格排序
        $res_data=Self::where('catogory',$catogory)->order("price ".$sc)->select();     
        if($res_data){
            return json($res_data);
        }else{
            return false;
        }
    }

    public static function addsalee($id){                    //销量加1数量减1
        $res_data=Self::where('id',$id)->inc('sale')->dec('num')->update();
        if($res_data){
            return true;
        }else{
            return false;
        }
    }
    
}



