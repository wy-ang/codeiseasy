<?php
/**
 * Created by PhpStorm.
 * User: wyang
 * Date: 2019/7/23
 * Time: 16:10
 */

namespace app\index\controller;

use think\Controller;

class Poetry extends Controller
{
    public function index()
    {
        return $this->fetch();
    }
}