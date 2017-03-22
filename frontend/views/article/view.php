<?php
/**
 * Created by PhpStorm.
 * User: Yang DingChuan
 * Date: 2017/3/21
 * Time: 15:59
 */
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\components\CommonHelper;

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => '文章', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$category = Yii::$app->params['articleCategory'];
?>

<head>
    <link rel="stylesheet" href="<?php echo Yii::$app->params['webUrl'].'/kindeditor/themes/default/default.css' ?>" />
    <script charset="utf-8" src="<?php echo Yii::$app->params['webUrl'].'/kindeditor/kindeditor-min.js' ?>"></script>
    <script charset="utf-8" src="<?php echo Yii::$app->params['webUrl'].'/kindeditor/lang/zh_CN.js' ?>"></script>
    <!--语法加亮-->
    <script charset="utf-8" src="<?php echo Yii::$app->params['webUrl'].'/kindeditor/plugins/code/prettify.js' ?>"></script>

    <script>
        var editor;
        KindEditor.ready(function(K) {
            editor = K.create('textarea[id="content"]', {
                allowPreviewEmoticons : false,
                resizeType : 0,
                width : '100%',
                height : '250px',
                allowImageUpload : true,
                cssPath : 'https://www.zydc1104.top/kindeditor/plugins/code/prettify.css',
                uploadJson : '<?php echo \yii\helpers\Url::to(['/upload/upload-img']) ?>',
                items : [
                    'fontname', 'fontsize', 'code', '|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline',
                    'removeformat', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist',
                    'insertunorderedlist', '|', 'emoticons', 'image', 'link', 'table', '|', 'print', 'preview']
            });
        });
    </script>
</head>

<div class="row">
    <div class="col-lg-9">
        <div class="page-header">
            <h1>
                <?= $this->title ?>

                <small class="ml-20" style="font-size: 50%">
                    <span class="fa fa-tag"></span> <?= $category[$model->category] ?>
                </small>
            </h1>
        </div>

        <div class="action">
            <span>
                <i class="fa fa-user"></i> <?= $user['username'] ?>
            </span>

            <span>
                <i class="fa fa-clock-o"></i> <?= CommonHelper::friendlyDate($model['created_at'], true) ?>
            </span>

            <span>
                <i class="fa fa-eye"></i> <?= $model['visit_times'].'次浏览' ?>
            </span>

            <span>
                <i class="fa fa-comments-o"></i> <?= $model['review_times'].'次回复' ?>
            </span>
        </div>

        <p>
            <?= $content['content']?>
        </p>

        <div id="review-list">
            <div class="page-header">
                <h3>共<?= count($reviewList) ?>条回复</h3>
            </div>

            <ul class="media-list">
                <?php foreach ($reviewList as $review) : ?>
                    <li class="media">
                        <div class="media-left">
                            <img class="media-object" src="<?= $review['pic_small'] ?>">
                        </div>

                        <div class="media-body">
                            <h2 class="media-heading">
                                <a href="#"><?= $review['username'] ?></a> 回复于 <?= CommonHelper::friendlyDate($review['created_at']) ?>
                            </h2>

                            <div class="media-content">
                                <p>
                                    <?= $review['content'] ?>
                                </p>
                            </div>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>

        </div>

        <div id="review">

            <?php if (Yii::$app->user->getIsGuest()): ?>
                <div class="well danger">
                    不登陆怎么回复(⊙o⊙)? <a href="<?= Url::to(['/site/login']) ?>">登陆</a> | <a href="<?= Url::to(['/site/signup']) ?>">注册</a>
                </div>
            <?php else: ?>
            <?php $form = ActiveForm::begin(['id' => 'form-review']); ?>

            <?= $form->field($reviewModel, 'content')->textarea(['id'=>'content']); ?>

            <div class="form-group mt-10">
                <?= Html::submitButton('回复', ['class' => 'btn btn-primary', 'name' => 'review-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>
            <?php endif; ?>
        </div>
    </div>

    <div class="col-lg-3">
        <div class="panel panel-warning">
            <div class="panel-heading">
                <h3 class="panel-title">作者资料</h3>
            </div>
            <div class="panel-body" style="background: url('/up/backgroud.jpg'); background-size:100% 100%; background-repeat:no-repeat;">
                <div class="user">
                    <img class="avatar" alt="<?= $user['username'] ?>" src="<?= $user['pic'] ?>">

                    <h1><?= $user['username'] ?></h1>
                    <p><?= empty($user['signature']) ? '这家伙很懒，什么都没有留下' : $user['signature'] ?></p>
                </div>
            </div>
        </div>

        <a class="btn btn-success btn-block" href="<?= Url::to(['create']) ?>"><i class="fa fa-plus"></i> 我要发布</a>
    </div>
</div>