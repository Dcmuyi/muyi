<?php
/**
 * Created by PhpStorm.
 * User: Yang DingChuan
 * Date: 2017/3/16
 * Time: 16:29
 */
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Html;
use yii\helpers\Url;

$this->title = '个人中心';
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="row">
    <div class="col-lg-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">我的信息</h3>
            </div>
            <div class="list-group">
                <a class="list-group-item active" href= "<?= Url::to(['/user/info']) ?>">个人中心</a>
                <a class="list-group-item" href= "<?= Url::to(['/user/pic']) ?>">修改头像</a>
                <a class="list-group-item" href= "#">我的发布</a>
                <a class="list-group-item" href= "#">我的收藏</a>
            </div>
        </div>
    </div>

    <div class="col-lg-6">

        <div class="page-header">
            <h1><?= $this->title ?></h1>
        </div>

        <?php $form = ActiveForm::begin([
            'options' => ['class'=>'ml-40'],
        ]); ?>

        <?= $form->field($model, 'email')->textInput() ?>

        <?= $form->field($model, 'username')->textInput() ?>

        <?= $form->field($model, 'sex')->radioList(Yii::$app->params['sex']) ?>

        <?= $form->field($model, 'signature')->textarea() ?>

        <div class="form-group">
            <?= Html::submitButton('修改', ['class' => 'btn btn-primary', 'name' => 'create-button']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>