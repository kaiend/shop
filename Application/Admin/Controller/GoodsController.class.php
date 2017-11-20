<?php
/**
 * Created by PhpStorm.
 * User: kaiend
 * Date: 2017/11/10
 * Time: 22:48
 */
namespace Admin\Controller;
use Think\Controller;
class  GoodsController extends controller
{
    public function goods_list()
    {
        $res = D('Goods');
        $data = $res->select();
        $this->assign('data',$data);
        $this->display();
    }
    public function goods_add()
    {
        if(IS_POST){
            $data = I('post.');
            $model = D('Goods');

            $create = $modle ->create($data);
            if(!$create){
                $error = $model -> getError();
                $this->error($error);
            }
            $goods_id = $model->add($data);
            if($goods_id){
                $this ->  success("添加成功",U('Admin/Goods/goods_list'));

            }else{
                $this->error('添加失败');
            }
        }else{
            $this->display();
        }

    }
    public function goods_edit()
    {
        if(IS_POST){

            $data = ('post');
            $model = D('Goods');
            $res = $model ->save($data);
        }
//接受get请求中的ID
        $id = I('get.id');

        $goods = $model -> find();
        $this -> assign('goods',$goods);
        $this -> display;
    }
    public function goods_detail()
    {

    }
    public function goods_del()
    {
        $id = I('get.id');
        $model = D('Goods');
        $res = $model ->delete($id);
        if($res !==false){
            //success
            $this-> success('del成功');
        }else{
            //shibai
            $this-> error('del失败');
        }
        $this->display();
    }

}