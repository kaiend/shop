<?php
/**
 * Created by PhpStorm.
 * User: kaiend
 * Date: 2017/11/16
 * Time: 22:17
 * goodsmodel
 */
namespace Admin\Model;
use Think\Model;
class GoodsModel extends Model
{
    //字段映射
    protected $_map = array(
        "name"=>'goods_name',
        "price"=>'goods_price',
        "number"=>'goods_number'
    );

    //自动验证
    protected $_validate = array(
        array('goods_name','require','商品名称不能为空'),
        array('goods_price','require','商品价格不能为空'),
        array('goods_price','currency','价格格式不正确'),
        array('goods_number','require','数量不能为空'),
        array('goods_number','number','数量格式不对'),

    );

    //自动完成
   /* protected $_auto = array(
        array('goods_create_time','time',1,'function ')
    );*/



}