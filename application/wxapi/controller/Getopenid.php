<?php
 
//改成直接在小程序获取 这个没用

 namespace app\wxapi\controller;

 use think\Controller;
 
 class Getopenid extends Controller
 {
     public function getoid()
     {
        // 接收get传参 code;
        
        $code = $_GET['code'];
        //$code=input('code');
        //你的appid,在小程序公众平台查看
        $appid = 'wx57a86f1615a36adf';
        //你的秘钥,在小程序公众平台获取
        $secret = '948537fb459c2037c342f6ddc87b23e0';

        // $url = "https://api.weixin.qq.com/sns/jscode2session?appid=" 
        // . $appid. "&secret=" 
        // . $secret . "&js_code="
        // . $code ."&grant_type=authorization_code";


        $url = "https://api.weixin.qq.com/sns/jscode2session?appid=".$appid."&secret=".$secret."&js_code=".$code."&grant_type=authorization_code";
        
        $wxuserinfo = file_get_contents($url,true);
        echo $wxuserinfo; 
        //获取openid
        $openid = json_decode($wxuserinfo,true)['openid'];
        
        //当前返回的只有openid
        echo $openid; 
     }
 }
 


 