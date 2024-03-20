<?php

namespace app\wxapi\controller;

use think\Controller;
use app\wxapi\model\Yueqis;

class Yueqi extends Controller
{
    public function queryfun()
    {
        $catogory=input('catogory');
        if($catogory){
            $res_data=Yueqis::queryc($catogory);
            if($res_data){
                return $res_data;
                return jsonRespose(200,'获取成功');           //jsonRespose方法写在common.php
            }else{
                return jsonRespose(400,'获取失败');
            }
        }else{
            return jsonRespose(400,'参数错误');
        }
    }

    public function queryDetailfun()                         //通过id查询详细页面
    {
        $id=input('id');
        if($id){
            $res_data=Yueqis::queryDetail($id);
            if($res_data){
                return json($res_data);
                return jsonRespose(200,'获取成功');          
            }else{
                return jsonRespose(400,'获取失败');
            }
        }else{
            return jsonRespose(400,'参数错误');
        }
    }

    public function querykey()                          //查询关键词
    {
        $catogory=input('catogory');
        $key=input('key');
        if($catogory&$key){
            $res_data=Yueqis::queryk($catogory,$key);
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

    public function keySaleSort()                          //查询关键词(销量排序)
    {
        $catogory=input('catogory');
        $key=input('key');
        if($catogory&$key){
            $res_data=Yueqis::querysale($catogory,$key);
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

    public function salesort()                          //销量排序
    {
        $catogory=input('catogory');
        if($catogory){
            $res_data=Yueqis::ordersale($catogory);
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

    public function keyPriceSort()                          //查询关键词(价格排序)
    {
        $catogory=input('catogory');
        $key=input('key');
        $sc=input('sc');
        if($catogory&$key&$sc){
            $res_data=Yueqis::queryprice($catogory,$key,$sc);
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

    public function pricesort()                          //价格排序
    {
        $catogory=input('catogory');
        $sc=input('sc');
        if($catogory&$sc){
            $res_data=Yueqis::orderprice($catogory,$sc);
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

    public function addsale()            //生成订单，sale+=1,num-=1
    {
        $id=input('id');
        if($id){
            $res_data=Yueqis::addsalee($id);
            if($res_data){
                return jsonRespose(200,'添加成功');           
            }else{
                return jsonRespose(400,'添加失败');
            }
        }else{
            return jsonRespose(400,'参数错误');
        }
    }
}
