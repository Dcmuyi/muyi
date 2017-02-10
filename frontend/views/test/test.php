<!doctype html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Default Examples</title>
    <style>
        form {
            margin: 0;
        }
        textarea {
            display: block;
        }
    </style>
    <link rel="stylesheet" href="<?php echo Yii::$app->params['b2bUrl'].'/kindeditor/themes/default/default.css' ?>" />
    <script charset="utf-8" src="<?php echo Yii::$app->params['b2bUrl'].'/kindeditor/kindeditor-min.js' ?>"></script>
    <script charset="utf-8" src="<?php echo Yii::$app->params['b2bUrl'].'/kindeditor/lang/zh_CN.js' ?>"></script>
    <!--语法加亮-->
    <script charset="utf-8" src="<?php echo Yii::$app->params['b2bUrl'].'/kindeditor/plugins/code/prettify.js' ?>"></script>
    <script>
        var editor;
        KindEditor.ready(function(K) {
            editor = K.create('textarea[name="content"]', {
                allowPreviewEmoticons : false,
                resizeType : 1,
                allowImageUpload : true,
                cssPath : 'https://b2b.jkbsapp.com/kindeditor/plugins/code/prettify.css',
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
<body>
<h3>默认模式</h3>
<form method="post">
    <textarea name="content" style="width:800px;height:400px;visibility:hidden;"><?php echo empty($_POST['content']) ? '' : $_POST['content']?></textarea>
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
    <button type="submit" value="提交内容">1312</button> (提交快捷键: Ctrl + Enter)
</form>
</body>
</html>
