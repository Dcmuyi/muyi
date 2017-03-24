<?php

/* @var $this yii\web\View */

use yii\helpers\Url;
use common\components\CommonHelper;

$this->title = '这是一个首页';
$category = Yii::$app->params['articleCategory'];
?>

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
            <div class="carousel-inner" style="height: 420px;">
                <div class="item active">
                    <img class="carousel-pic" src="/up/carousel/1.jpg" alt="First slide">
                </div>
                <div class="item">
                    <img class="carousel-pic" src="/up/carousel/2.jpg" alt="Second slide">
                </div>
                <div class="item">
                    <img class="carousel-pic" src="/up/carousel/3.jpg" alt="Third slide">
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
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th>内容</th>
                        <th width="10%">发布者</th>
                        <th width="10%">时间</th>
                        <th width="10%">浏览</th>
                        <th width="10%">回复</th>
                    </tr>
                    </thead>

                    <?php foreach ($articleList as $article) : ?>
                        <tr>
                            <td class="title">
                            <span>
                                [ <a style="color: orangered" href="<?= Url::toRoute(['article/index', 'category' => $article['category']]) ?>"><?= $category[$article['category']] ?></a> ]
                            </span>

                                <span>
                                <a href="<?= Url::to([sprintf('/article/%s', $article['id'])]) ?>"><?= $article['title'] ?></a>
                            </span>
                            </td>

                            <td>
                                <?= $article['username'] ?>
                            </td>

                            <td>
                                <?= CommonHelper::friendlyDate($article['created_at']) ?>
                            </td>

                            <td>
                                <?= $article['visit_times'] ?>
                            </td>

                            <td>
                                <?= $article['review_times'] ?>
                            </td>

                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>

</div>

<div class="col-lg-3">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">面板标题</h3>
        </div>
        <div class="list-group">
            <a class="list-group-item">列表1</a>
            <a class="list-group-item">列表2</a>
            <a class="list-group-item">列表3</a>
            <a class="list-group-item">列表4</a>
            <a class="list-group-item">列表5</a>
        </div>
    </div>

    <a href="tencent://message/?uin=773724313"><img border="0" src="http://wpa.qq.com/pa?p=2:773724313:51" alt="点击这里给我发消息" title="点击这里给我发消息"/>
</div>

<script>
    window.onblur = function() {
        document.title = "发呆- ( ゜- ゜)つロ ";
        $("#web-icon").attr('href',"https://wujunze.com/usr/themes/yilia/loss.ico");
        window.onfocus = function() {
            document.title = "这是一个首页";
            $("#web-icon").attr('href',"https://www.zydc1104.top/up/logo.png");
        }
    };
</script>
