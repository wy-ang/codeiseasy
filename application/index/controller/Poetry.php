<?php
/**
 * Created by PhpStorm.
 * User: wyang
 * Date: 2019/7/23
 * Time: 16:10
 */

namespace app\index\controller;

use think\Controller;
use app\article\model\ArticleModel;

class Poetry extends Controller
{
    public function index()
    {
        $articleCategory = new ArticleModel();
        $data = $articleCategory->articleList(7);
        $this->assign('poetry', $data);
        return $this->fetch();
    }
}