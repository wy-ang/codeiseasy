<?php
/**
 * Created by PhpStorm.
 * User: wyang
 * Date: 2019/7/31
 * Time: 11:30
 */

namespace app\index\controller;

use think\Controller;
use app\article\model\ArticleModel;

class Search extends Controller
{
    public function index()
    {
        $value = input('globalSearchVal');
        $article = new ArticleModel();
        $data = $article->globalSearch($value);
        $this->assign('search', $data);
        return $this->fetch();
    }
}