<?php
/**
 * Created by PhpStorm.
 * UserModel: wangyang
 * Date: 2019/7/20
 * Time: 22:18
 */

namespace app\index\model;

use app\index\controller\User;
use think\Model;

class UserModel extends Model
{
    protected $name = 'user';
    public function addUser($name)
    {
        $isExist = $this->where('name', $name)->find();
        if (!$isExist) {
            $userName = $this->insert(['name' => $name]);
            if ($userName) {
                return ['code' => 200, 'msg' => '添加成功'];
            }
        } else {
            return ['code' => 201, 'msg' => '添加失败'];
        }

    }

    public function getUser()
    {
        $users = $this->select();
        if (!empty($users)) {
            return $users;
        }
    }
}