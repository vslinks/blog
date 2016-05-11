<?php
/**
 * 商品分类模型 类 文件.
 * User: wanyunshan
 * Date: 2016/5/11
 * Time: 12:49
 */

namespace Admin\Model;


use Think\Model;

/**
 * Class GoodsCategoryModel
 * @package Admin\Model
 */
class GoodsCategoryModel extends Model
{
    /**
     * @var array
     * 设置商品分类添加与修改的自动验证规则
     */
    protected $_validate = array(
        array('name','require','商品分类名称不能为空',self::MUST_VALIDATE,'regex',self::MODEL_BOTH),
        array('name','','商品分类已经存在',self::MUST_VALIDATE,'unique',self::MODEL_BOTH),
    );
//    /**
//     * 开启批量验证
//     */
//    protected $patchValidate = true;


    public function getZtreeList(){
        //>>获取列表数据方法
        $rows = $this->field('*')
                ->order('`left`')                 //>> 以left左边界排序 就自动是按照无限极分类排序的
                ->where(array('status' => 1))  //>>状态为1 表示正在使用的
                ->select();
        return $rows;
    }
}