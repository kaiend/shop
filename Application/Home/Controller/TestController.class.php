<?php
/**
 * Created by PhpStorm.
 * User: kaiend
 * Date: 2017/11/12
 * Time: 22:41
 */
namespace Home\Controller;
use Think\Controller;
class TestController extends controller
{
    public function xiugai(){
        //修改
        $model = D('Advice');
        $data = array(
          'id' =>5,
          'content' =>'ceshi'
        );
        //save
        $res = $model -> save($data);
    }
}