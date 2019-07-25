<?php
/**
 * Created by PhpStorm.
 * User: wyang
 * Date: 2019/7/25
 * Time: 9:48
 */

namespace app\index\controller;

use think\Controller;

class Article extends Controller
{
    public function add()
    {
        return $this->fetch();
    }
}