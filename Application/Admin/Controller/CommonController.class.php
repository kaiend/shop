<?php
/**
 * Created by PhpStorm.
 * User: kaiend
 * Date: 2017/11/18
 * Time: 19:48
 *
 */
namespace Admin\Controller;
use Think\Controller;
class CommonController extends Controller\HproseController{
    public function __construct()
    {
        //1父类控制器的构造函数
        parent::__construct();
        //是否登录
        if(!session('?manager_info')){
            $this->redirect('Admin/Login/login');
        }
    }
}
