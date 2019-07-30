<?php
/**
 * Created by PhpStorm.
 * User: wyang
 * Date: 2019/7/23
 * Time: 16:14
 */

namespace app\index\controller;

use think\Controller;
use app\article\model\ArticleModel;

class Informal extends Controller
{
    public function index()
    {
        $articleCategory = new ArticleModel();
        $data = $articleCategory->articleList(35);
        $this->assign('informal', $data);
        return $this->fetch();
    }
}