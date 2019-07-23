<?php
/**
 * Created by PhpStorm.
 * User: wyang
 * Date: 2019/7/23
 * Time: 15:27
 */

namespace app\index\model;

use think\Db;
use think\Model;

class MenuModel extends Model
{
    public function menuList()
    {
        $menuList = Db::name('menu')->field('id,name,path,type')->select();
        if (!empty($menuList)) {
            return ['code' => 200, 'msg' => '查询成功', 'data' => $menuList];
        } else {
            return ['code' => 200, 'msg' => '查询失败'];
        }
    }
}