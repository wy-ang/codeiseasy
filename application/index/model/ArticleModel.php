<?php
/**
 * Created by PhpStorm.
 * User: wyang
 * Date: 2019/7/25
 * Time: 9:31
 */

namespace app\index\model;

use think\Model;
use think\Db;

class ArticleModel extends Model
{
    protected $name = 'article';

    public function articleList()
    {
        $articleList = $this->field('id,title,abstract,top')->select();
        foreach ($articleList as $key => $value) {
            $abstract = mb_substr($value['abstract'], 0, 20, 'utf-8');
            $articleList[$key]['abstract'] = $abstract;
        }
        if (!empty($articleList)) {
            return ['code' => 200, 'msg' => '查询成功', 'data' => $articleList];
        } else {
            return ['code' => 200, 'msg' => '查询失败'];
        }
    }

    public function addArticle($title, $content)
    {
        $abstract = mb_substr($content, 0, 20, 'utf-8');
        $isExist = $this->where('title', $title)->find();
        if (!$isExist) {
            $saveData = $this->save(['title' => $title, 'content' => $content, 'abstract' => $abstract]);
            if ($saveData) {
                return ['code' => 200, 'msg' => '添加成功'];
            } else {
                return ['code' => 202, 'msg' => '添加失败'];
            }
        }else{
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
}