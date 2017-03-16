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

            K('input[name=getHtml]').click(function(e) {
                alert(editor.html());
            });
            K('input[name=isEmpty]').click(function(e) {
                alert(editor.isEmpty());
            });
            K('input[name=getText]').click(function(e) {
                alert(editor.text());
            });
            K('input[name=selectedHtml]').click(function(e) {
                alert(editor.selectedHtml());
            });
            K('input[name=setHtml]').click(function(e) {
                editor.html('<h3>Hello KindEditor</h3>');
            });
            K('input[name=setText]').click(function(e) {
                editor.text('<h3>Hello KindEditor</h3>');
            });
            K('input[name=insertHtml]').click(function(e) {
                editor.insertHtml('<strong>插入HTML</strong>');
            });
            K('input[name=appendHtml]').click(function(e) {
                editor.appendHtml('<strong>添加HTML</strong>');
            });
            K('input[name=clear]').click(function(e) {
                editor.html('');
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

        <p>
            <input type="button" name="getHtml" value="取得HTML" />
            <input type="button" name="isEmpty" value="判断是否为空" />
            <input type="button" name="getText" value="取得文本(包含img,embed)" />
            <input type="button" name="selectedHtml" value="取得选中HTML" />
            <br />
            <br />
            <input type="button" name="setHtml" value="设置HTML" />
            <input type="button" name="setText" value="设置文本" />
            <input type="button" name="insertHtml" value="插入HTML" />
            <input type="button" name="appendHtml" value="添加HTML" />
            <input type="button" name="clear" value="清空内容" />
            <input type="reset" name="reset" value="Reset" />
        </p>

        <div class="form-group">
            <?= Html::submitButton('发布', ['class' => 'btn btn-primary', 'name' => 'create-button']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>