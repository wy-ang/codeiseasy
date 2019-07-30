<?php
/**
 * Created by PhpStorm.
 * User: wyang
 * Date: 2019/7/23
 * Time: 15:58
 */

namespace app\index\controller;

use think\Controller;
use app\article\model\ArticleModel;

class Prose extends Controller
{
    public function index()
    {
        $articleCategory = new ArticleModel();
        $data = $articleCategory->articleList(1);
        $this->assign('prose', $data);
        return $this->fetch();
    }

    public function articleList()
    {
        $articleCategory = new ArticleModel();
        $data = $articleCategory->articleList(1);
        return json($data);
    }
}