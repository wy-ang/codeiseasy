<?php
/**
 * Created by PhpStorm.
 * User: wyang
 * Date: 2019/7/23
 * Time: 15:58
 */

namespace app\index\controller;

use think\Controller;

class Store extends Controller
{
    public function index()
    {
        return $this->fetch();
    }
}