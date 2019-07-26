<?php
/**
 * Created by PhpStorm.
 * User: wyang
 * Date: 2019/7/26
 * Time: 10:25
 */

namespace app\index\controller;

use think\Controller;

class Essay extends Controller
{
    public function index()
    {
        return $this->fetch();
    }
}