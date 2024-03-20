<?php

namespace app\wxapi\controller;

use think\Controller;
use app\wxapi\model\Carts;

class Cart extends Controller
{
    public function getlength()            //查询该条商品在用户购物车中是否有记录
    {
        $goods_id=input('goods_id');
        $openid=input('openid');
        if($goods_id&$openid){
            $res_data=Carts::querynum($goods_id,$openid);
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

    public function addcartnum()            //该条商品在用户购物车中有记录，则num+=1
    {
        $goods_id=input('goods_id');
        $openid=input('openid');
        if($goods_id&$openid){
            $res_data=Carts::addnum($goods_id,$openid);
            if($res_data){
                return jsonRespose(200,'添加成功');           
            }else{
                return jsonRespose(400,'添加失败');
            }
        }else{
            return jsonRespose(400,'参数错误');
        }
    }

    public function addcart()            //查询该条商品在用户购物车中没有记录，添加记录
    {
        $param=input('post.');
        if($param){
            $res_data=Carts::adddata($param);
            if($res_data){
                return jsonRespose(200,'获取成功');
            }else{
                return jsonRespose(400,'获取失败');
            }
        }else{
            return jsonRespose(400,'参数错误');
        }
    }

    public function getcart()              //根据openid查询购物车
    {
        $openid=input('openid');
        if($openid){
            $res_data=Carts::querycart($openid);
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

    public function addcidnum()            //对应的购物车id记录num+1
    {
        $id=input('id');
        if($id){
            $res_data=Carts::addidnum($id);
            if($res_data){
                return jsonRespose(200,'添加成功');           
            }else{
                return jsonRespose(400,'添加失败');
            }
        }else{
            return jsonRespose(400,'参数错误');
        }
    }

    public function subcidnum()            //对应的购物车id记录num-1
    {
        $id=input('id');
        if($id){
            $res_data=Carts::subidnum($id);
            if($res_data){
                return jsonRespose(200,'减成功');           
            }else{
                return jsonRespose(400,'减失败');
            }
        }else{
            return jsonRespose(400,'参数错误');
        }
    }

    public function udselected()            //勾选
    {
        $id=input('id');
        $selected=input('selected');
        if($id){
            if($selected=="true"){
                $selected=1;
            }else{
                $selected=0;
            }
            $res_data=Carts::updateselected($id,$selected);
            if($res_data){
                return jsonRespose(200,'修改成功');           
            }else{
                return jsonRespose(400,'修改失败');
            }
        }else{
            return jsonRespose(400,'参数错误');
        }
    }

    public function udselectedall()            //全部勾选
    {
        $openid=input('openid');
        $selected=input('selected');
        if($openid){
            if($selected=="true"){
                $selected=1;
            }else{
                $selected=0;
            }
            $res_data=Carts::updateselectedall($openid,$selected);
            if($res_data){
                return jsonRespose(200,'修改成功');           
            }else{
                return jsonRespose(400,'修改失败');
            }
        }else{
            return jsonRespose(400,'参数错误');
        }
    }

    public function rmselected()            //删除勾选
    {
        $openid=input('openid');
        if($openid){
            $res_data=Carts::removeselected($openid);
            if($res_data){
                return jsonRespose(200,'修改成功');           
            }else{
                return jsonRespose(400,'修改失败');
            }
        }else{
            return jsonRespose(400,'参数错误');
        }
    }

    public function getselectedcart()              //根据openid查询勾选的购物车记录
    {
        $openid=input('openid');
        if($openid){
            $res_data=Carts::queryselectedcart($openid);
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
}
