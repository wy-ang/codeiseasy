<?php
/**
 * Created by PhpStorm.
 * User: wyang
 * Date: 2019/7/25
 * Time: 9:31
 */

namespace app\article\model;

use think\Db;
use think\Model;

class ArticleModel extends Model
{
    protected $name = 'article';

    public function rankList()
    {
        $articleList = $this->field('id,title,abstract,top')->limit(10)->select();
        foreach ($articleList as $key => $value) {
            $title = mb_substr($value['title'], 0, 12, 'utf-8');
            $articleList[$key]['title'] = $title;
        }
        if (!empty($articleList)) {
            return ['code' => 200, 'msg' => '查询成功', 'data' => $articleList];
        } else {
            return ['code' => 200, 'msg' => '查询失败'];
        }
    }


    public function addArticle($title, $content, $category)
    {
        $abstract = mb_substr($content, 0, 20, 'utf-8');
        $isExist = $this->where('title', $title)->find();
        if (!$isExist) {
            $saveData = $this->save(['title' => $title, 'content' => $content, 'abstract' => $abstract, 'category' => $category]);
            if ($saveData) {
                return ['code' => 200, 'msg' => '添加成功'];
            } else {
                return ['code' => 202, 'msg' => '添加失败'];
            }
        } else {
            return ['code' => 202, 'msg' => '文章已存在'];
        }
    }

    public function viewArticle($id)
    {
        $viewArticle = $this->where('id', $id)->find();
        if (!empty($viewArticle)) {
            return $viewArticle->data;
        }

    }

    public function articleCategoryList()
    {
        $categoryList = Db::name('category')->where('pid', '0')->field('id')->limit(4)->select();
        $articleCategoryList = array();
        foreach ($categoryList as $key => $value) {
            $id = $value['id'];
            $articleCategory = $this->where('category', $id)->field('id, title')->select();
            $articleCategoryList[] = $articleCategory;
            $articleCategoryList['pid'] = $id;
        }
        if (!empty($articleCategoryList)){
            return ['code' => 200, 'msg' => '查询成功', 'data' => $articleCategoryList];
        } else {
            return ['code' => 200, 'msg' => '查询失败'];
        }
    }
}