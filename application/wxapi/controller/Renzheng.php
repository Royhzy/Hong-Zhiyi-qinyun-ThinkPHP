<?php

namespace app\wxapi\controller;

use think\Controller;
use app\wxapi\model\Renzhengs;

class Renzheng extends Controller
{
    // 上传图片
    public function uploadimg()
    {
        $file = request()->file('file');
        if ($file) {
            $info = $file->move('jiaoshitouxiangrz/');
            if ($info) {
                $file = $info->getSaveName();
                // $res = ['errCode'=>0,'errMsg'=>'图片上传成功','file'=>$file];
                // return json($res);
                return $file;
            }
        }
    }

    public function uploadsfzimg()
    {
        $file = request()->file('file');
        if ($file) {
            $info = $file->move('jiaoshisfzrz/');
            if ($info) {
                $file = $info->getSaveName();
                // $res = ['errCode'=>0,'errMsg'=>'图片上传成功','file'=>$file];
                // return json($res);
                return $file;
            }
        }
    }

    public function chaxunrenzheng()            //查询openid是否认证过
    {
        $openid=input('openid');
        if($openid){
            $res_data=Renzhengs::queryrz($openid);
            if($res_data){
                return $res_data;
                return jsonRespose(200,'有记录');           
            }else{
                return jsonRespose(400,'无记录');
            }
        }else{
            return jsonRespose(400,'参数错误');
        }
    }

    public function shenqingrenzheng()            //认证申请
    {
        $param=input('post.');
        if($param){
            $res_data=Renzhengs::shenqing($param);
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
