<?php
/**
 * Created by PhpStorm.
 * User: wyang
 * Date: 2019/7/24
 * Time: 11:22
 */

namespace app\article\model;

use think\Model;

class CategoryModel extends Model
{
    protected $name = 'category';

    public function categoryList()
    {
        $categoryList = $this->where('pid', '0')->field('id, title')->limit(4)->select();
        if (!empty($categoryList)) {
            return $categoryList;
        } else {
            return ['code' => 200, 'msg' => '查询失败'];
        }
    }

    public function getCategory()
    {
        $category = $this->field('id, pid, title')->select();
        if (!empty($category)) {
            return $category;
        } else {
            return ['code' => 200, 'msg' => '查询失败'];
        }
    }

}