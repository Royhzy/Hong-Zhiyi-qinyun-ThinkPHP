<?php

namespace app\wxapi\controller;

use think\Controller;
use app\wxapi\model\Dingdans;

class Dingdan extends Controller
{
    public function adddingdan()            //添加订单记录
    {
        $param=input('post.');
        if($param){
            $res_data=Dingdans::adddd($param);
            if($res_data){
                return jsonRespose(200,'添加成功');
            }else{
                return jsonRespose(400,'添加失败');
            }
        }else{
            return jsonRespose(400,'参数错误');
        }
    }

    public function getdingdan()              //根据openid查询订单
    {
        $openid=input('openid');
        if($openid){
            $res_data=Dingdans::querydingdan($openid);
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

    public function getnshouhuodingdan()              //根据openid查询待收货订单
    {
        $openid=input('openid');
        if($openid){
            $res_data=Dingdans::querynshouhuodingdan($openid);
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

    public function udshouhuo()              //确认收货，根据id把shouhuo=0改为1
    {
        $id=input('id');
        if($id){
            $res_data=Dingdans::updateshouhuo($id);
            if($res_data){
                return jsonRespose(200,'获取成功');         
            }else{
                return jsonRespose(400,'获取失败');
            }
        }else{
            return jsonRespose(400,'参数错误');
        }
    }

    public function idgetdingdan()              //根据id查询订单
    {
        $id=input('id');
        if($id){
            $res_data=Dingdans::idquerydingdan($id);
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

    public function updatepingjia()              //添加评价记录后把该订单的pingjia改为1
    {
        $id=input('id');
        if($id){
            $res_data=Dingdans::udpingjia($id);
            if($res_data){
                return jsonRespose(200,'获取成功');         
            }else{
                return jsonRespose(400,'获取失败');
            }
        }else{
            return jsonRespose(400,'参数错误');
        }
    }
}
