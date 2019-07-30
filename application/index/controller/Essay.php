<?php
/**
 * Created by PhpStorm.
 * User: wyang
 * Date: 2019/7/26
 * Time: 10:25
 */

namespace app\index\controller;

use think\Controller;
use app\article\model\ArticleModel;

class Essay extends Controller
{
    public function index()
    {
        $articleCategory = new ArticleModel();
        $data = $articleCategory->articleList(14);
        $this->assign('essay', $data);
        return $this->fetch();
    }
}