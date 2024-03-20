<?php

namespace app\wxapi\controller;

use think\Controller;
use app\wxapi\model\Guanzhus;

class Guanzhu extends Controller
{
    public function getlength()            //查询在用户关注中是否有记录
    {
        $teacher_id=input('teacher_id');
        $openid=input('openid');
        if($teacher_id&$openid){
            $res_data=Guanzhus::querynum($teacher_id,$openid);
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

    public function rmguanzhu()            //取消关注
    {
        $openid=input('openid');
        $teacher_id=input('teacher_id');
        if($teacher_id&$openid){
            $res_data=Guanzhus::removeguanzhu($teacher_id,$openid);
            if($res_data){
                return jsonRespose(200,'修改成功');           
            }else{
                return jsonRespose(400,'修改失败');
            }
        }else{
            return jsonRespose(400,'参数错误');
        }
    }


    public function addguanzhu()            //查询该条商品在用户购物车中没有记录，添加记录
    {
        $param=input('post.');
        if($param){
            $res_data=Guanzhus::adddata($param);
            if($res_data){
                return jsonRespose(200,'获取成功');
            }else{
                return jsonRespose(400,'获取失败');
            }
        }else{
            return jsonRespose(400,'参数错误');
        }
    }

    public function getguanzhu()              //根据openid查询关注
    {
        $openid=input('openid');
        if($openid){
            $res_data=Guanzhus::queryguanzhu($openid);
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
