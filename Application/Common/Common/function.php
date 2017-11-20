<?php
/**
 * Created by PhpStorm.
 * User: kaiend
 * Date: 2017/11/16
 * Time: 22:33
 * 自动加载函数
 */
//手机号显示加密函数
function encrypt_phone($phone)
{
    return substr($phone,0,3).'****'.substr($phone,7,4);
}