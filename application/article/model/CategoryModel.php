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

    public function addData()
    {
        $data = [
            ['pid' => 0, 'title' => '散文随笔', 'create_time' => Null, 'update_time' => Null],
            ['pid' => 1, 'title' => '优美散文', 'create_time' => Null, 'update_time' => Null],
            ['pid' => 1, 'title' => '抒情散文', 'create_time' => Null, 'update_time' => Null],
            ['pid' => 1, 'title' => '爱情散文', 'create_time' => Null, 'update_time' => Null],
            ['pid' => 1, 'title' => '经典散文', 'create_time' => Null, 'update_time' => Null],
            ['pid' => 1, 'title' => '伤感散文', 'create_time' => Null, 'update_time' => Null],
            ['pid' => 0, 'title' => '伤感文章', 'create_time' => Null, 'update_time' => Null],
            ['pid' => 7, 'title' => '伤感日志', 'create_time' => Null, 'update_time' => Null],
            ['pid' => 7, 'title' => '伤感日记', 'create_time' => Null, 'update_time' => Null],
            [ 'pid' => 7, 'title' => '感人故事', 'create_time' => Null, 'update_time' => Null],
            [ 'pid' => 7, 'title' => '伤感故事', 'create_time' => Null, 'update_time' => Null],
            [ 'pid' => 7, 'title' => '私密关系', 'create_time' => Null, 'update_time' => Null],
            [ 'pid' => 0, 'title' => '诗词歌赋', 'create_time' => Null, 'update_time' => Null],
            [ 'pid' => 13, 'title' => '散文诗', 'create_time' => Null, 'update_time' => Null],
            [ 'pid' => 13, 'title' => '现代诗歌', 'create_time' => Null, 'update_time' => Null],
            [ 'pid' => 13, 'title' => '爱情诗歌', 'create_time' => Null, 'update_time' => Null],
            [ 'pid' => 13, 'title' => '爱国诗歌', 'create_time' => Null, 'update_time' => Null],
            [ 'pid' => 13, 'title' => '格律诗', 'create_time' => Null, 'update_time' => Null],
            [ 'pid' => 13, 'title' => '古词风韵', 'create_time' => Null, 'update_time' => Null],
            [ 'pid' => 0, 'title' => '情感日志', 'create_time' => Null, 'update_time' => Null],
            [ 'pid' => 20, 'title' => '情感美文', 'create_time' => Null, 'update_time' => Null],
            [ 'pid' => 20, 'title' => '情感日记', 'create_time' => Null, 'update_time' => Null],
            [ 'pid' => 20, 'title' => '情感故事', 'create_time' => Null, 'update_time' => Null],
            [ 'pid' => 20, 'title' => '美文欣赏', 'create_time' => Null, 'update_time' => Null],
            [ 'pid' => 20, 'title' => '爱情文章', 'create_time' => Null, 'update_time' => Null],
            [ 'pid' => 20, 'title' => '亲情文章', 'create_time' => Null, 'update_time' => Null],
            [ 'pid' => 20, 'title' => '友情文章', 'create_time' => Null, 'update_time' => Null],
            [ 'pid' => 0, 'title' => '心情日记', 'create_time' => Null, 'update_time' => Null],
            [ 'pid' => 28, 'title' => '心情随笔', 'create_time' => Null, 'update_time' => Null],
            [ 'pid' => 28, 'title' => '心情日志', 'create_time' => Null, 'update_time' => Null],
        ];

        $add = $this->saveAll($data);
        return ['code' => 200, 'msg' => '查询成功', 'data' => $add];
    }

}