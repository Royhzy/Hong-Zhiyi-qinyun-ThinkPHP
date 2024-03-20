<?php

namespace app\wxapi\controller;

use think\Controller;
use app\wxapi\model\Pingjias;

class Pingjia extends Controller
{
    public function querypingjia()            //根据goods_id查询评价
    {
        $goods_id=input('goods_id');
        if($goods_id){
            $res_data=Pingjias::querypj($goods_id);
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

    public function addpingjia()              //添加评价
    {             
        $param=input('post.');
        if($param){
            $res_data=Pingjias::addpj($param);
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
