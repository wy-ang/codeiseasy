<?php
/**
 * Created by PhpStorm.
 * UserModel: wangyang
 * Date: 2019/7/20
 * Time: 22:18
 */

namespace app\index\model;

use app\index\controller\User;
use think\Db;
use think\Model;

class UserModel extends Model
{
    public function addUser($name)
    {
        $isExist = Db::table('study_user')->where('name', $name)->find();
        if (!$isExist) {
            $userName = Db::table('study_user')->insert(['name' => $name]);
            if ($userName) {
                return ['code' => 200, 'msg' => '添加成功'];
            }
        } else {
            return ['code' => 201, 'msg' => '添加失败'];
        }

    }

    public function getUser()
    {
        $users = Db::table('study_user')->select();
        if (!empty($users)) {
            return $users;
        }
    }
}