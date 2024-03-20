<?php

namespace app\wxapi\controller;

use think\Controller;
use app\wxapi\model\Yuyues;

class Yuyue extends Controller
{
    public function addyuyue()            //添加预约记录
    {
        $param=input('post.');
        if($param){
            $res_data=Yuyues::addyy($param);
            if($res_data){
                return jsonRespose(200,'添加成功');
            }else{
                return jsonRespose(400,'添加失败');
            }
        }else{
            return jsonRespose(400,'参数错误');
        }
    }

    public function getyuyue()              //根据openid查询订单
    {
        $openid=input('openid');
        if($openid){
            $res_data=Yuyues::queryyuyue($openid);
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

    public function udzhifu()            //修改支付
    {
        $id=input('id');
        $feiyongtime=input('feiyongtime');
        if($id&$feiyongtime){
            $res_data=Yuyues::updatezhifu($id,$feiyongtime);
            if($res_data){
                return jsonRespose(200,'添加成功');           
            }else{
                return jsonRespose(400,'添加失败');
            }
        }else{
            return jsonRespose(400,'参数错误');
        }
    }

    public function getjsyuyue()              //根据sfz查询预约订单
    {
        $teacher_id=input('teacher_id');
        if($teacher_id){
            $res_data=Yuyues::jsqueryyuyue($teacher_id);
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

    public function getdaishangke()              //根据sfz查询预约待上课订单
    {
        $teacher_id=input('teacher_id');
        if($teacher_id){
            $res_data=Yuyues::querydsk($teacher_id);
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
