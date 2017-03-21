<?php
/**
 * Created by PhpStorm.
 * User: Yang DingChuan
 * Date: 2017/3/16
 * Time: 16:29
 */

use yii\widgets\LinkPager;
use yii\helpers\Url;
use common\components\CommonHelper;

$this->title = '文章';
$this->params['breadcrumbs'][] = $this->title;

$category = Yii::$app->params['articleCategory'];
?>

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
                        <img class="media-object" src="<?= $v['pic_small'] ?>">
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
                            <a href="#"><?= $v['username'] ?></a> 提问于 <?= CommonHelper::friendlyDate($v['created_at']) ?><span class="glyphicon glyphicon-tag ml-10"></span> <?= $category[$v['category']] ?>
                        </div>
                    </div>

                    <div class="media-right">
                        <a class="btn btn-default" href="<?= Url::to([sprintf('/article/%s', $v['id'])]) ?>">
                        <h4>浏览</h4>
                            <?= $v['visit_times'] ?>
                        </a>
                    </div>

                    <div class="media-right">
                        <a class="btn btn-default" href="<?= Url::to([sprintf('/article/%s', $v['id'])]) ?>">
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
            <a class="list-group-item <?= empty($_GET['category']) ? 'active' : '' ?>" href= "<?= Url::current() ?>">
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