<?php
/**
 * Created by PhpStorm.
 * User: wyang
 * Date: 2019/7/25
 * Time: 9:48
 */

namespace app\article\controller;

use app\article\model\ArticleModel;
use app\article\model\CategoryModel;
use think\Controller;

class Article extends Controller
{
    public function add()
    {
        $category = new CategoryModel();
        $data = $category->getCategory();
        $this->assign('category', $data);
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
        $category = input('category');
        if (!empty($title) && !empty($content) && !empty($category)) {
            $article = new ArticleModel();
            $data = $article->addArticle($title, $content, $category);
            return json($data);
        } else {
            return json(['code' => 202, 'msg' => '缺少字段']);
        }
    }

    public function articleCategoryList()
    {
        $articleCategory = new ArticleModel();
        $data = $articleCategory->articleCategoryList();
        return json($data);
    }

    public function addData()
    {
        $add = new CategoryModel();
        $data = $add->addData();
        return json($data);
    }
}