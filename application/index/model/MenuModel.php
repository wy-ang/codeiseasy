<?php
/**
 * Created by PhpStorm.
 * User: wyang
 * Date: 2019/7/23
 * Time: 15:27
 */

namespace app\index\model;

use think\Db;
use think\Model;

class MenuModel extends Model
{
    public function menuList()
    {
        $menuList = Db::name('menu')->field('id,name,path,type')->select();
        if (!empty($menuList)) {
            return ['code' => 200, 'msg' => '查询成功', 'data' => $menuList];
        } else {
            return ['code' => 200, 'msg' => '查询失败'];
        }
    }

    public function articleList()
    {
        $articleList = Db::name('article')->field('id,title,abstract,hot')->select();
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

    public function addData()
    {
        $data = [
            ['id' => 1, 'title' => '我不会武功', 'abstract' => '骨灰级金庸迷项云，在校花表白的大好时候，却意外穿越异界，成为了史上最极品的小世子，受尽世人嘲笑，兄长的欺辱，甚至连自己的父亲都不认他这个儿子，然而在身怀金庸武侠系统后，他在异界开启了开挂人生，你有逆天魔功，我有吸星大法，你有无上剑道，我有独孤九剑，金庸武侠绝学在手，大陆纵横…… 且看这臭名昭著的极品小世子，如何在异界逍遥风流，独领风骚，成为武学之神！'],
            ['id' => 2, 'title' => '超级吞噬系统', 'abstract' => '炼绝世丹药，锻上古神兵！修灭世武学，杀阻路之人！森罗万象山川草木指掌之中，亿万星辰无尽寰宇神念之地。我乃江小凡，说我是废物的人！都得死！'],
            ['id' => 3, 'title' => '私密关系', 'abstract' => '老婆安语早上穿着黑色丝袜出门，晚上下班回家却没有穿丝袜，膝盖上还有青色印记，陈伟疑心顿起，开始偷偷跟踪安语，却发现......'],
            ['id' => 4, 'title' => '重生之游戏大亨', 'abstract' => '重生回到九八年，那些消逝在时光中的遗憾，通通可以弥补了。'],
            ['id' => 5, 'title' => '华年', 'abstract' => '港城市吉祥路，经营馄饨馆的乔家有三个孩子。其中有一个不是亲生的，街坊邻居虽都知道，但谁也没有点破过。故事从2002年开始，那一年中国队世界杯出线，那一年周杰伦、蔡依林、SHE风靡全亚洲，而对吉祥街的孩子们来说，火热的夏天和青春一起到来了…'],
            ['id' => 6, 'title' => '都市绝品狂尊', 'abstract' => '高中少年赵岩，大梦千年，一朝觉醒，纵横天下，翻手为云，覆手为雨，收拢资源，提升实力，只为重回修仙世界。不想，却遭遇地球灵气复苏，高武崛起，仙门临世，险阻层生。看赵岩如何披荆斩棘，为自己，为亲人，为朋友，杀出一片黎明……'],
            ['id' => 7, 'title' => '都市之医道仙尊', 'abstract' => '灵云大陆大乘期高手，灵武剑宗有史以来最年轻的宗主，渡劫时被人偷袭，意外诱发心魔，肉身焚灭，灵魂却阴差阳错进入了地球上一个名为王靖的普通大学生身上！ 沦落俗世，他才发现，苦修并不是道的极致，世俗生活，嬉笑怒骂都是道之真谛！'],
            ['id' => 8, 'title' => '老子天下无敌', 'abstract' => '后文明时代，地球灵气复苏，洪荒世界再临，旧的世界格局一夕之间分崩离析，人族险些亡族灭种。 有王者得进化天书，为初代进化者，籍此平定八荒异族，令得人族在这地球上占据了一寸之地，一个全新的纪元揭开神秘的一角。 “同阶无敌算个球啊？老子天下无敌。”叶昊死命忽悠。'],
            ['id' => 9, 'title' => '忘仙录', 'abstract' => '我叫鱼生，每过七天就会失去记忆，忘记修为……'],
            ['id' => 10, 'title' => '系统叫我做好人', 'abstract' => '扫码领红包，扫出了一个神秘的系统。 自此李皓走上了一条做好事不留名的道路。 “那个谁，你去把政治书抄一遍，三观很重要的。” “别想着做坏事了，来来来，跟我一起去扶老人吧。” “快走快走，那边有人需要帮助！” …… 李皓看着纷纷做好事的混混，点头笑道：“世界真美好。”']
        ];

        $add = Db::name('article')->insertAll($data);
        return ['code' => 200, 'msg' => '查询成功', 'data' => $add];
    }
}