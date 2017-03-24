<?php
/**
 * Created by PhpStorm.
 * User: Yang DingChuan
 * Date: 2017/3/16
 * Time: 16:29
 */

use yii\helpers\Url;
use yii\widgets\LinkPager;
use common\components\CommonHelper;

$this->title = '文章';
$this->params['breadcrumbs'][] = $this->title;

$category = Yii::$app->params['articleCategory'];
//
//data-trigger="hover" data-placement="right" data-html="true" data-content="<div class='panel panel-warning'>
//                        <div class='panel-heading'>
//                            <h3 class='panel-title'>作者资料</h3>
//                        </div>
//                    </div>"
?>
<style>
    .popover-pic {
        width: 100px;
        height: 100px;
        border-radius: 50%;
    }

    .popover-top {
        border-bottom: #eee solid 1px;
    }

    .in-line {
        display: inline-block;
    }
</style>

<div class="row">
    <div class="col-lg-9">

        <div class="page-header">
            <h1><?= $this->title ?></h1>

            <ul class="nav nav-tabs nav-main">
                <li class="<?= empty($_GET['sort']) ? 'active' : '' ?>"><a href="<?= Url::current() ?>">最新发布</a></li>
                <li class="<?= isset($_GET['sort']) && $_GET['sort'] == 1 ? 'active' : '' ?>"><a href="<?= Url::current(['sort'=>'1']) ?>">最多浏览</a></li>
                <li class="<?= isset($_GET['sort']) && $_GET['sort'] == 2 ? 'active' : '' ?>"><a href="<?= Url::current(['sort'=>'2']) ?>">最多回复</a></li>
            </ul>
        </div>

        <ul class="media-list">
            <?php foreach ($result as $v) : ?>
                <li class="media">
                    <div class="media-left">
                        <a href="#" id="<?=$v['user_id'] ?>" data-toggle="popover">
                            <img class="media-object" src="<?= $userList[$v['user_id']]['pic_small'] ?>">
                        </a>

                    </div>

                    <div class="media-body">
                        <h2 class="media-heading">
                            <a href="<?= Url::to([sprintf('/article/%s', $v['id'])]) ?>">
                            <?= $v['title'] ?>

                            <?php if (time() - $v['created_at'] < 864000): ?>
                            <span class="label label-primary">新</span>
                            <?php endif; ?>
                            </a>
                        </h2>

                        <div class="media-action">
                            <a href="#"><?= $userList[$v['user_id']]['username'] ?></a> 发布于 <?= CommonHelper::friendlyDate($v['created_at']) ?><span class="glyphicon glyphicon-tag ml-10"></span> <?= $category[$v['category']] ?>
                        </div>
                    </div>

                    <div class="media-right">
                        <a class="btn btn-default" href="<?= Url::to([sprintf('/article/%s', $v['id'])]) ?>">
                        <h4>浏览</h4>
                            <?= $v['visit_times'] ?>
                        </a>
                    </div>

                    <div class="media-right">
                        <a class="btn btn-default" href="<?= Url::toRoute([sprintf('/article/%s', $v['id']), '#' => 'review-list']) ?>">
                            <h4>回复</h4>
                            <?= $v['review_times'] ?>
                        </a>
                    </div>

                </li>
            <?php endforeach; ?>
        </ul>

        <?= LinkPager::widget([
            'pagination' => $pages,
        ])
        ?>
    </div>

    <div class="col-lg-3">
        <a class="btn btn-success btn-block" href="<?= Url::to(['create']) ?>">我要发布</a>

        <div class="list-group">
            <a class="list-group-item <?= empty($_GET['category']) ? 'active' : '' ?>" href= "<?= Url::to('index.html') ?>">
                <span class="badge pull-right"><?= $chart['0'] ?></span>
                所有分类
            </a>

            <?php foreach ($category as $k => $v) : ?>
                <a class="list-group-item <?= (isset($_GET['category']) && $k==$_GET['category']) ? 'active' : '' ?>" href= "<?= Url::current(['category'=>$k]) ?>">
                    <span class="badge pull-right"><?= $chart[$k] ?></span>
                    <?= $v ?>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<script>
    var user_list = <?= json_encode($userList) ?>;

    $(function() {
        $('[data-toggle="popover"]').each(function () {
            var element = $(this);
            var id = element.attr('id');
            console.log(id);
            element.popover({
                trigger: 'hover',
                placement: 'right', //top, bottom, left or right
                title: '用户资料',
                html: 'true',
                content: ContentMethod(id)
            })
        });
    });

    function ContentMethod(id) {
        var name = user_list[id]['username'];
        var active_time = user_list[id]['active_time'];
        var created_time = user_list[id]['created_time'];
        var sex = user_list[id]['sex'];
        var pic = user_list[id]['pic'];
        var sign = user_list[id]['signature'];
        if (sign.length == 0) {
            sign = '这家伙很懒，什么都没有留下';
        }

        return '<div class="popover-top"><div class="media-left" style="text-align: center"><img class="popover-pic" src="'+ pic +'"><span class="label label-success">极道魔尊</span></div><div class="media-right">' +
        '<p>'+ name + '(' + sex + ')</p>' +
        '<p><span class="in-line">注册日期：</span>'+ created_time +'</p>' +
        '<p><span class="in-line">最后活跃：</span><span class="in-line">'+ active_time +'</span></p>' +
        '</div></div> <p>'+ sign +'</p>';
    }
</script>