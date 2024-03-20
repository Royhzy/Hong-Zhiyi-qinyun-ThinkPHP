<?php

namespace app\admin\model;

use think\Model;


class Pingjia extends Model
{

    

    

    // 表名
    protected $name = 'pingjia';
    
    // 自动写入时间戳字段
    protected $autoWriteTimestamp = false;

    // 定义时间戳字段名
    protected $createTime = false;
    protected $updateTime = false;
    protected $deleteTime = false;

    // 追加属性
    protected $append = [
        'xing_text',
        'pingjia_time_text'
    ];
    

    
    public function getXingList()
    {
        return ['1' => __('Xing 1'), '2' => __('Xing 2'), '3' => __('Xing 3'), '4' => __('Xing 4'), '5' => __('Xing 5')];
    }


    public function getXingTextAttr($value, $data)
    {
        $value = $value ? $value : (isset($data['xing']) ? $data['xing'] : '');
        $list = $this->getXingList();
        return isset($list[$value]) ? $list[$value] : '';
    }


    public function getPingjiaTimeTextAttr($value, $data)
    {
        $value = $value ? $value : (isset($data['pingjia_time']) ? $data['pingjia_time'] : '');
        return is_numeric($value) ? date("Y-m-d H:i:s", $value) : $value;
    }

    protected function setPingjiaTimeAttr($value)
    {
        return $value === '' ? null : ($value && !is_numeric($value) ? strtotime($value) : $value);
    }


}
