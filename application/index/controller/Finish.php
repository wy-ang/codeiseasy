<?php
/**
 * Created by PhpStorm.
 * User: wyang
 * Date: 2019/7/23
 * Time: 16:14
 */

namespace app\index\controller;

use think\Controller;

class Finish extends Controller
{
    public function index()
    {
        return $this->fetch();
    }
}