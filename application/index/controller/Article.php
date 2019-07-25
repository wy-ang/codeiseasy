<?php
/**
 * Created by PhpStorm.
 * User: wyang
 * Date: 2019/7/25
 * Time: 9:48
 */

namespace app\index\controller;

use app\index\model\ArticleModel;
use think\Controller;

class Article extends Controller
{
    public function add()
    {
        return $this->fetch();
    }

    public function view()
    {
        $id = input('id');
        $viewArticle = new ArticleModel();
        $data = $viewArticle->viewArticle($id);
        $this->assign('view', $data);
        return $this->fetch();
    }

    public function addArticle()
    {
        $title = input('title');
        $content = input('content');
        if (!empty($title) && !empty($content)) {
            $article = new ArticleModel();
            $data = $article->addArticle($title, $content);
            return json($data);
        } else {
            return json(['code' => 202, 'msg' => '缺少字段']);
        }
    }
}