<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

AppAsset::register($this);
$this->registerCssFile('/static/site.css');
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="木奕">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>

    <link href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="<?php echo '/static/jquery-3.1.1.min.js' ?>"></script>

    <style>
        .header-logo {
            width: 36px;
            height: 36px;
            margin-top: 8px;
            margin-bottom: -12px;
        }
        .user-pic {
            width: 36px;
            height: 36px;
            margin-top: -13px;
            margin-bottom: -12px;
        }
    </style>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'Muyi\'s blog',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-default navbar-fixed-top',
        ],
    ]);

    if (Yii::$app->user->isGuest)
    {
        $menuItems[] = ['label' => 'R', 'url' => ['/site/signup']];
        $menuItems[] = ['label' => 'L', 'url' => ['/site/login']];
    }
    else
    {
        $menuItems[] = ['label' => '<i class="fa fa-bell"></i><span style="color: red"></span>', 'url' => ['/site/signup']];

        $menuItems[] = [
            'label' => '<image class="user-pic" src = '.Yii::$app->user->identity->pic_small.' />',
            'items' => [
                ['label' => '<i class="fa fa-user fa-fw"></i> 个人中心', 'url' => '#'],
                ['label' => '<i class="fa fa-camera fa-fw"></i> 修改头像', 'url' => '#'],
                '<li class="divider"></li>',
                ['label' => '<i class="fa fa-list fa-fw"></i> 我的发布', 'url' => '#'],
                ['label' => '<i class="fa fa-star fa-fw"></i> 我的收藏', 'url' => '#'],
                '<li class="divider"></li>',
                ['label' => '<i class="fa fa-sign-out fa-fw"></i> 退出登陆', 'url' =>['/site/logout']],
            ],
        ];
    }

    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right nav-pills'],
        'items' => $menuItems,
        'encodeLabels' => false,
    ]);

    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; Mu Yi <?= '2016 - '.date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
<script type="text/javascript" color="255,127,80" opacity="0.7" zindex="-2" count="150" src="//cdn.bootcss.com/canvas-nest.js/1.0.0/canvas-nest.min.js"></script>

</html>
<?php $this->endPage() ?>