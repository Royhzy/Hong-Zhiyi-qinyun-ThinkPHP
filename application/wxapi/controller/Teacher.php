<?php

namespace app\wxapi\controller;

use think\Controller;
use app\wxapi\model\Teachers;

class Teacher extends Controller
{
    public function getSearchTeacher()                          //查询乐器和地区关键词
    {
        $instrument=input('instrument');
        $area=input('area');
        if($instrument&$area){
            $res_data=Teachers::queryinsarea($instrument,$area);
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

    public function queryDetailfun()                         //用sfz查询具体教师信息
    {
        $sfz=input('sfz');
        if($sfz){
            $res_data=Teachers::queryDetail($sfz);
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

    public function sfzQueryDetailfun()                         //用身份证查询具体教师信息
    {
        $sfz=input('sfz');
        if($sfz){
            $res_data=Teachers::sfzQueryDetail($sfz);
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

    public function uploadinimg()
    {
        $file = request()->file('file');
        if ($file) {
            $info = $file->move('zhaopianqiang/');
            if ($info) {
                $file = $info->getSaveName();
                return $file;
            }
        }
    }

    public function updateziliao()                              //更新资料
    {
        $param=input('post.');
        $sfz=input('sfz');
        if($param){
            $res_data=Teachers::udziliao($param,$sfz);
            if($res_data){
                return jsonRespose(200,'修改成功');
            }else{
                return jsonRespose(400,'修改失败');
            }
        }else{
            return jsonRespose(400,'参数错误');
        }
    }
}
