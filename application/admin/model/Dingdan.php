<?php

namespace app\admin\model;

use think\Model;


class Dingdan extends Model
{

    

    

    // 表名
    protected $name = 'dingdan';
    
    // 自动写入时间戳字段
    protected $autoWriteTimestamp = false;

    // 定义时间戳字段名
    protected $createTime = false;
    protected $updateTime = false;
    protected $deleteTime = false;

    // 追加属性
    protected $append = [
        'shouhuo_text',
        'pingjia_text',
        'xiadantime_text',
        'status_text'
    ];
    

    
    public function getShouhuoList()
    {
        return ['1' => __('Shouhuo 1'), '0' => __('Shouhuo 0')];
    }

    public function getPingjiaList()
    {
        return ['1' => __('Pingjia 1'), '0' => __('Pingjia 0')];
    }

    public function getStatusList()
    {
        return ['1' => __('Status 1'), '2' => __('Status 2')];
    }


    public function getShouhuoTextAttr($value, $data)
    {
        $value = $value ? $value : (isset($data['shouhuo']) ? $data['shouhuo'] : '');
        $list = $this->getShouhuoList();
        return isset($list[$value]) ? $list[$value] : '';
    }


    public function getPingjiaTextAttr($value, $data)
    {
        $value = $value ? $value : (isset($data['pingjia']) ? $data['pingjia'] : '');
        $list = $this->getPingjiaList();
        return isset($list[$value]) ? $list[$value] : '';
    }


    public function getXiadantimeTextAttr($value, $data)
    {
        $value = $value ? $value : (isset($data['xiadantime']) ? $data['xiadantime'] : '');
        return is_numeric($value) ? date("Y-m-d H:i:s", $value) : $value;
    }


    public function getStatusTextAttr($value, $data)
    {
        $value = $value ? $value : (isset($data['status']) ? $data['status'] : '');
        $list = $this->getStatusList();
        return isset($list[$value]) ? $list[$value] : '';
    }

    protected function setXiadantimeAttr($value)
    {
        return $value === '' ? null : ($value && !is_numeric($value) ? strtotime($value) : $value);
    }


}
