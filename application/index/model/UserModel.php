<?php
/**
 * Created by PhpStorm.
 * UserModel: wangyang
 * Date: 2019/7/20
 * Time: 22:18
 */

namespace app\index\model;

use think\Db;
use think\Model;

class UserModel extends Model
{
    public function getUser()
    {
        $uid = Db::table('study_user')->where('id', 1)->find();
        return $uid;
    }
}