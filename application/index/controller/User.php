<?php
/**
 * Created by PhpStorm.
 * UserModel: wangyang
 * Date: 2019/7/21
 * Time: 00:21
 */

namespace app\index\controller;

use think\Controller;
use app\index\model\UserModel;

class User extends Controller
{
    public function getInfo()
    {
        $user = new UserModel();
        print_r($user->getUser());
        return $this->fetch('index/index');
    }
}