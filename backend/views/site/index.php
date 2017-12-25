<?php

/* @var $this yii\web\View */

use common\components\CommonHelper;
use yii\helpers\Url;
use yii\widgets\LinkPager;

$this->title = '首页';
$category = Yii::$app->params['articleCategory'];
?>

<style>
    h4 {
        font-size: 14px;
    }
</style>

<div class="row">
    <div class="col-lg-9">
        <!--    轮播图-->
        <div class="panel panel-default">
            <div id="myCarousel" class="carousel slide">
                <!-- 轮播（Carousel）指标 -->
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                </ol>
                <!-- 轮播（Carousel）项目 -->
                <div class="carousel-inner" style="height: 308px;">
                    <div class="item active">
                        <img class="carousel-pic" src="/up/1.jpg" alt="First slide">
                    </div>
                    <div class="item">
                        <img class="carousel-pic" src="/up/2.jpg" alt="Second slide">
                    </div>
                    <div class="item">
                        <img class="carousel-pic" src="/up/3.jpg" alt="Third slide">
                    </div>
                </div>
                <!-- 轮播（Carousel）导航 -->
                <a class="carousel-control left" href="#myCarousel"
                   data-slide="prev">&lsaquo;</a>
                <a class="carousel-control right" href="#myCarousel"
                   data-slide="next">&rsaquo;</a>
            </div>
        </div>

        <!--最新文章-->
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2 class="panel-title">最新动态</h2>
            </div>

            <div class="panel-body">
                <ul class="media-list">
                    <?php foreach ($result as $v) : ?>
                        <li class="media">
                            <div class="media-left">
                                <img class="media-object" src="<?= $userList[$v['user_id']]['pic_small'] ?>">
                            </div>

                            <div class="media-body">
                                <h2 class="media-heading">
                                    <a href="<?= Url::to([sprintf('/site/%s', $v['id'])]) ?>">
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
        </div>
    </div>

    <div class="col-lg-3">
        <div class="panel panel-warning">
            <div class="panel-heading">
                <h3 class="panel-title">个人资料</h3>
            </div>
            <div class="panel-body" style="background: url('/up/backgroud.jpg'); background-size:100% 100%; background-repeat:no-repeat;">
                <div class="user">
                    <img class="avatar img-rounded" alt="<?= $user['username'] ?>" src="<?= $user['pic'] ?>">

                    <h1><?= $user['username'] ?></h1>
                    <p><?= empty($user['signature']) ? '这家伙很懒，什么都没有留下' : $user['signature'] ?></p>
                </div>
            </div>
        </div>

        <div class="panel panel-default">
            <a class="btn btn-success btn-block" href="<?= Url::to(['create']) ?>">我要发布</a>
        </div>

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
    $(function(){
        // 初始化轮播
        $('.carousel').carousel();
    });
</script>

