<?php
/**
 * Created by PhpStorm.
 * User: wyang
 * Date: 2019/7/25
 * Time: 9:31
 */

namespace app\index\model;

use think\Model;

class ArticleModel extends Model
{
    protected $name = 'article';

    public function articleList()
    {
        $articleList = $this->field('id,title,abstract,hot')->select();
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

    public function addArticle(){

    }
}