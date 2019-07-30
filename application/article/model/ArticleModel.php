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
            $title = mb_substr($value['title'], 0, 14, 'utf-8');
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
        /*$arrId = array();
        $arrCategory = array();
        $arrSecCategory = array();*/
        $article = array();
        $articleList = array();
//        $articleLists = array();
        $secCategory = Db::name('category')->where('pid != 0')->group('pid')->field('id, pid, name')->select();
        /*$category = Db::name('category')->where('pid = 0')->field('id, title')->select();
        foreach ($secCategory as $key => $value) {
            $arrId[] = $value['id'];
            $arrSecCategory[] = $value;
        }
        $articles = $this->whereIn('category', $arrId)->field('id, title, category')->select();
        foreach ($category as $key => $value) {
            $arrCategory[] = $value;
        }
        foreach ($articles as $key => $value) {
            $article[] = $value->data;
        }
        foreach ($articles as $key => $value) {
            $category = $value->data['category'];
            foreach ($arrSecCategory as $kk => $vv) {
                $secCategory = $vv['id'];
                if ($category == $secCategory) {
                    $articleList['id'] = $vv['pid'];
                    $articleList['seclist'] = $value;
                    $articleLists[] = $articleList;
                }
            }
        }*/
        foreach ($secCategory as $key => $value) {
            $id = $value['id'];
            $pid = $value['pid'];
            $article['pid'] = $pid;
            $ptitle = Db::name('category')->where('id', $pid)->field('name')->select();
            $article['seclist'] = $this->where('category', $id)->field('id, title, category')->limit('7')->select();
            if (!empty($ptitle)) {
                $article['name'] = $ptitle[0]['name'];
            }
            if (!empty($article['seclist'])) {
                $articleList[] = $article;
            }
        }
        if (!empty($articleList)) {
            return $articleList;
        } else {
            return ['code' => 200, 'msg' => '查询失败'];
        }
    }

    public function articleList($pid)
    {
        $secCategory = Db::name('category')->where('pid', $pid)->field('id')->select();
        $arrId = array();
        foreach ($secCategory as $key => $value) {
            $arrId[] = $value['id'];
        }
        $list = $this->whereIn('category', $arrId)
            ->alias('a')
            ->join('category c', 'a.category = c.id', 'LEFT')
            ->field('a.id as article_id, a.title, a.author,a.update_time, c.name')
            ->select();
        if (!empty($list)) {
            return $list;
        } else {
            return ['code' => 200, 'msg' => '查询失败'];
        }
    }
}