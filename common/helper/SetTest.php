<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/16
 * Time: 17:08
 */

namespace app\common\helper;

class SetTest
{
    private $param1;
    public  $param2;

    //__get()方法用来获取私有属性
    public function __get($property_name)
    {
        if(isset($this->$property_name))
        {
            return($this->$property_name);
        }else
        {
            return(NULL);
        }
    }

    //__set()方法用来设置私有属性
    public function __set($property_name, $value)
    {
        $this->$property_name = $value;
    }
}