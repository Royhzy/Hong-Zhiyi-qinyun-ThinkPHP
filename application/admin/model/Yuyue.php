<?php

namespace app\admin\model;

use think\Model;


class Yuyue extends Model
{

    

    

    // 表名
    protected $name = 'yuyue';
    
    // 自动写入时间戳字段
    protected $autoWriteTimestamp = false;

    // 定义时间戳字段名
    protected $createTime = false;
    protected $updateTime = false;
    protected $deleteTime = false;

    // 追加属性
    protected $append = [
        'shangke_text',
        'feiyong_text',
        'shangketime_text',
        'feiyongtime_text',
        'yuyuetime_text',
        'status_text'
    ];
    

    
    public function getShangkeList()
    {
        return ['1' => __('Shangke 1'), '0' => __('Shangke 0')];
    }

    public function getFeiyongList()
    {
        return ['1' => __('Feiyong 1'), '0' => __('Feiyong 0')];
    }

    public function getStatusList()
    {
        return ['1' => __('Status 1'), '2' => __('Status 2')];
    }


    public function getShangkeTextAttr($value, $data)
    {
        $value = $value ? $value : (isset($data['shangke']) ? $data['shangke'] : '');
        $list = $this->getShangkeList();
        return isset($list[$value]) ? $list[$value] : '';
    }


    public function getFeiyongTextAttr($value, $data)
    {
        $value = $value ? $value : (isset($data['feiyong']) ? $data['feiyong'] : '');
        $list = $this->getFeiyongList();
        return isset($list[$value]) ? $list[$value] : '';
    }


    public function getShangketimeTextAttr($value, $data)
    {
        $value = $value ? $value : (isset($data['shangketime']) ? $data['shangketime'] : '');
        return is_numeric($value) ? date("Y-m-d H:i:s", $value) : $value;
    }


    public function getFeiyongtimeTextAttr($value, $data)
    {
        $value = $value ? $value : (isset($data['feiyongtime']) ? $data['feiyongtime'] : '');
        return is_numeric($value) ? date("Y-m-d H:i:s", $value) : $value;
    }


    public function getYuyuetimeTextAttr($value, $data)
    {
        $value = $value ? $value : (isset($data['yuyuetime']) ? $data['yuyuetime'] : '');
        return is_numeric($value) ? date("Y-m-d H:i:s", $value) : $value;
    }


    public function getStatusTextAttr($value, $data)
    {
        $value = $value ? $value : (isset($data['status']) ? $data['status'] : '');
        $list = $this->getStatusList();
        return isset($list[$value]) ? $list[$value] : '';
    }

    protected function setShangketimeAttr($value)
    {
        return $value === '' ? null : ($value && !is_numeric($value) ? strtotime($value) : $value);
    }

    protected function setFeiyongtimeAttr($value)
    {
        return $value === '' ? null : ($value && !is_numeric($value) ? strtotime($value) : $value);
    }

    protected function setYuyuetimeAttr($value)
    {
        return $value === '' ? null : ($value && !is_numeric($value) ? strtotime($value) : $value);
    }


}
