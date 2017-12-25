<?php
/**
 * Created by PhpStorm.
 * User: Yang DingChuan
 * Date: 2017/3/16
 * Time: 16:29
 */
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Html;

$this->title = '发布文章';
$this->params['breadcrumbs'][] = ['label' => '文章', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="row">
    <div class="col-lg-9 bg">

        <div class="page-header">
            <h1><?= $this->title ?></h1>
        </div>

        <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

        <?= $form->field($model, 'title')->textInput(['autofocus' => true]) ?>

        <?= $form->field($model, 'category')->dropDownList(Yii::$app->params['articleCategory'], ['prompt'=>'请选择分类']); ?>

        <?= $form->field($contentModel,'content')->widget('kucha\ueditor\UEditor',[
            'clientOptions' => [
                //浮动时工具栏距离浏览器顶部的高度
                'topOffset' => '50',
                //定制菜单
                'toolbars' => [[
                    'fullscreen', 'source', '|',
                    'bold', 'italic', 'underline', 'fontborder', 'strikethrough', 'superscript', 'subscript', 'removeformat', 'formatmatch', 'autotypeset', 'blockquote', 'pasteplain', '|', 'forecolor', 'backcolor', 'insertorderedlist', 'insertunorderedlist', 'selectall', 'cleardoc', '|',
                    'rowspacingtop', 'rowspacingbottom', 'lineheight', '|',
                    'customstyle', 'paragraph', 'fontfamily', 'fontsize', '|',
                    'indent','justifyleft', 'justifycenter', 'justifyright', 'justifyjustify', '|', 'touppercase', 'tolowercase', '|',
                    'link', 'unlink', '|', 'imagenone', 'imageleft', 'imageright', 'imagecenter', '|',
                    'simpleupload', 'insertimage', 'emotion', 'scrawl', 'insertvideo', 'music', 'attachment', 'insertcode', '|',
                    'horizontal', 'date', 'time', 'spechars', 'snapscreen', '|',
                    'inserttable', 'deletetable', 'insertparagraphbeforetable', 'insertrow', 'deleterow', 'insertcol', 'deletecol', 'mergecells', 'mergeright', 'mergedown', 'splittocells', 'splittorows', 'splittocols', 'charts', '|',
                    'preview', 'searchreplace', 'drafts', 'template', 'background',
                ]],
            ]
        ]); ?>

        <div class="form-group">
            <?= Html::submitButton('发布', ['class' => 'btn btn-primary', 'name' => 'create-button']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>