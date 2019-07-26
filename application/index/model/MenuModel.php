<?php
/**
 * Created by PhpStorm.
 * User: wyang
 * Date: 2019/7/23
 * Time: 15:27
 */

namespace app\index\model;

use think\Model;

class MenuModel extends Model
{
    protected $name = 'menu';

    public function menuList()
    {
        $menuList = $this->field('id,name,path,type')->select();
        if (!empty($menuList)) {
            return ['code' => 200, 'msg' => '查询成功', 'data' => $menuList];
        } else {
            return ['code' => 200, 'msg' => '查询失败'];
        }
    }

    public function addData()
    {
        $data = [
            ['id' => 10, 'pid'=>7, 'title' => '感人故事',],
            ['id' => 11, 'pid'=>7, 'title' => '伤感故事',],
            ['id' => 12, 'pid'=>7, 'title' => '私密关系', ],
            ['id' => 13, 'pid'=>0, 'title' => '诗词歌赋',],
            ['id' => 14, 'pid'=>13, 'title' => '散文诗', ],
            ['id' => 15, 'pid'=>13, 'title' => '现代诗歌',],
            ['id' => 16, 'pid'=>13, 'title' => '爱情诗歌',],
            ['id' => 17, 'pid'=>13, 'title' => '爱国诗歌',],
            ['id' => 18, 'pid'=>13, 'title' => '格律诗',],
            ['id' => 19, 'pid'=>13, 'title' => '古词风韵',],
            ['id' => 20, 'pid'=>0, 'title' => '情感日志',],
            ['id' => 21, 'pid'=>20, 'title' => '情感美文',],
            ['id' => 22, 'pid'=>20, 'title' => '情感日记',],
            ['id' => 23, 'pid'=>20, 'title' => '情感故事',],
            ['id' => 24, 'pid'=>20, 'title' => '美文欣赏',],
            ['id' => 25, 'pid'=>20, 'title' => '爱情文章',],
            ['id' => 26, 'pid'=>20, 'title' => '亲情文章',],
            ['id' => 27, 'pid'=>20, 'title' => '友情文章',],
            ['id' => 28, 'pid'=>0, 'title' => '心情日记',],
            ['id' => 29, 'pid'=>28, 'title' => '心情随笔',],
            ['id' => 30, 'pid'=>28, 'title' => '心情日志',],
        ];

        $add = $this->saveAll($data);
        return ['code' => 200, 'msg' => '查询成功', 'data' => $add];
    }
}