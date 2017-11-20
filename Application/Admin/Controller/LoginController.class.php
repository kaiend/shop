<?php
/**
 * Created by PhpStorm.
 * User: kaiend
 * Date: 2017/11/10
 * Time: 22:45
 */
namespace Admin\Controller;
use function Sodium\version_string;
use Think\Controller;
class  LoginController extends CommonController
{
    public function login()
    {
        if(IS_POST){
            $data = I('post.');
            $verify = new \Think\Verify();

            $check = $verify -> check($data['verify']);
            if(!$check){
                $this -> error('验证码错误');
            }
            $model = D('Manager');
            $user = $model ->where(array("username"=>$data['username']))->find();
            if($user && $user['password']==encrypt_password($data['password'])){
                session('manager_info',$user);
                $this->success('登录成功',U('Admin/Index/index'));
            }else{
                $this->error('用户名或密码错误');
            };
        }else{ $this->display();
        }

    }
    public function captcha()
    {
        //实例化验证码类，自定义配置数组
        $config = array(
            'length'   =>  4,
            'useCurve'  =  flase,
            'useNoise'  =>  false,
        );
        $verify = new \Think\Verify($config);
        //生成并输出
        ob_clean();
        $verify -> entry();
    }

}