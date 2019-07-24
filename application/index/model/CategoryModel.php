<?php
/**
 * Created by PhpStorm.
 * User: wyang
 * Date: 2019/7/24
 * Time: 11:22
 */

namespace app\index\model;

use think\Model;

class CategoryModel extends Model
{
    protected $name = 'category';

    public function categoryList()
    {
        $categoryList = $this->where('pid', '0')->field('id, title')->select();
        if (!empty($categoryList)) {
            return ['code' => 200, 'msg' => '查询成功', 'data' => $categoryList];
        }else{
            return ['code' => 200, 'msg' => '查询失败'];
        }
    }
}