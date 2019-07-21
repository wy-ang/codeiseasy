<?php
/**
 * Created by PhpStorm.
 * User: wangyang
 * Date: 2019/7/21
 * Time: 13:36
 */

namespace app\index\controller;

use think\Controller;

class userList extends Controller
{
    public function index()
    {
        return $this->fetch();
    }
}