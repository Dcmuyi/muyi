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
$this->params['breadcrumbs'][] = $this->title;

$category = Yii::$app->params['articleCategory'];
?>

<header>
    <script type="text/javascript">
        SyntaxHighlighter.all();
    </script>
</header>

<div class="row">
    <div class="col-lg-9 bg">
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
                                    <?= htmlspecialchars_decode($review['content']) ?>
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

            <?= $form->field($reviewModel,'content')->widget('kucha\ueditor\UEditor',[
                'clientOptions' => [
                    //浮动时工具栏距离浏览器顶部的高度
                    'topOffset' => '50',
                    //定制菜单
                    'toolbars' => [[
                        'bold', 'italic', 'underline', 'fontborder', 'strikethrough', 'superscript', 'subscript', 'removeformat', 'formatmatch', '|', 'forecolor', 'backcolor', 'insertorderedlist', 'insertunorderedlist', '|',
                        'fontfamily', 'fontsize', '|',
                        'indent','justifyleft', 'justifycenter', 'simpleupload', 'emotion', 'scrawl', 'insertcode', 'horizontal', 'spechars',
                    ]],
                ]
            ]); ?>

            <div class="form-group mt-10">
                <?= Html::submitButton('回复', ['class' => 'btn btn-primary', 'name' => 'review-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>
            <?php endif; ?>
        </div>
    </div>
</div>