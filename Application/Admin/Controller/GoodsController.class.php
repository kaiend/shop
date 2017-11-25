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
            //dump($_FILES);die;
            if(!empty($_FILES['logo']) && $_FILES['logo']['error']==0){
                $config = array(
                    'maxSize'           => 2*1024*1024,//此设置(20M)byte,与PHPini里面设置以小的为准
                    'exts'              => array('jpg','png','gif','jpeg'),
                    'rootPath'              => ROOT_PATH . UPLOAD_PATH,//以根路径开始，
                );
                $upload = new \Think\Upload($config);
                //dump($upload);die;

                $res = $upload -> uploadOne($_FILES['logo']);

                //dump($res);die;
                if($res){
                    $data['goods_big_img'] = UPLOAD_PATH . $res['savepath'] . $res['savename'];

                }else{
                    $error = $upload ->getError();
                    $this->error($error);
                }
            }else{
                //必须上传图片才能上传商品
            }
            $model = D('Goods');

            $create = $model ->create($data);
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