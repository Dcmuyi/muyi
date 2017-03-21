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
<head>
    <link rel="stylesheet" href="<?php echo Yii::$app->params['webUrl'].'/kindeditor/themes/default/default.css' ?>" />
    <script charset="utf-8" src="<?php echo Yii::$app->params['webUrl'].'/kindeditor/kindeditor-min.js' ?>"></script>
    <script charset="utf-8" src="<?php echo Yii::$app->params['webUrl'].'/kindeditor/lang/zh_CN.js' ?>"></script>
    <!--语法加亮-->
    <script charset="utf-8" src="<?php echo Yii::$app->params['webUrl'].'/kindeditor/plugins/code/prettify.js' ?>"></script>

    <script>
        var editor;
        KindEditor.ready(function(K) {
            editor = K.create('textarea[name="content"]', {
                allowPreviewEmoticons : false,
                resizeType : 0,
                width : '100%',
                height : '400px',
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
            <h1><?= $this->title ?></h1>
        </div>

        <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

        <?= $form->field($model, 'title')->textInput(['autofocus' => true]) ?>

        <?= $form->field($model, 'category')->dropDownList(Yii::$app->params['articleCategory'], ['prompt'=>'请选择分类']); ?>

        <?= $form->field($contentModel, 'content')->textarea(['name'=>'content']); ?>

        <div class="form-group">
            <?= Html::submitButton('发布', ['class' => 'btn btn-primary', 'name' => 'create-button']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>