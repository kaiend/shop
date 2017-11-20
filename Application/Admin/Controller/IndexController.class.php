<?php
/**
 * Created by PhpStorm.
 * User: kaiend
 * Date: 2017/11/10
 * Time: 21:51
 */
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller
{
    public function index()
    {
        $this -> display();
    }
    public function logout()
    {
        session(null);
        $this->redirect('Admin/Login/login');
    }
}