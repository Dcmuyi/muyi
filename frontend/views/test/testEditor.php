<!DOCTYPE HTML>
<html>
<head>
    <title>UMEDITOR 完整demo</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link href="<?= Yii::$app->params['webUrl'] ?>/umeditor/themes/default/css/umeditor.css" type="text/css" rel="stylesheet">
    <script type="text/javascript" src="<?= Yii::$app->params['webUrl'] ?>/umeditor/third-party/jquery.min.js"></script>
    <script type="text/javascript" charset="utf-8" src="<?= Yii::$app->params['webUrl'] ?>/umeditor/umeditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="<?= Yii::$app->params['webUrl'] ?>/umeditor/umeditor.min.js"></script>
    <script type="text/javascript" src="<?= Yii::$app->params['webUrl'] ?>/umeditor/lang/zh-cn/zh-cn.js"></script>

</head>
<body>
<!--style给定宽度可以影响编辑器的最终宽度-->
<script type="text/plain" id="myEditor">
    <p>这里可以写一些输入提示</p>
</script>
<button class="btn" onclick="getContent()">获得内容</button>&nbsp;
<button class="btn" onclick="setContent('1234')">写入内容</button>&nbsp;
<button class="btn" onclick="hasContent()">是否有内容</button>&nbsp;
<script type="text/javascript">
    //实例化编辑器
    // window.UMEDITOR_HOME_URL = "";
    var um = UM.getEditor('myEditor',
        {
            initialContent:'欢迎使用UMEDITOR!',
            initialFrameWidth:600,
            initialFrameHeight:240,
            imageUrl:"<?= Yii::$app->params['webUrl'].'path/to/uploadimage' ?>", //处理图片上传的接口
            imagePath:"", //路径前缀
            imageFieldName:"upfile" //上传图片的表单的name
        });

    function getContent() {
        var arr = [];
        arr.push(UM.getEditor('myEditor').getContent());
        alert(arr.join("\n"));
    }

    function setContent(isAppendTo) {
        var arr = [];
        arr.push("使用editor.setContent('欢迎使用umeditor')方法可以设置编辑器的内容");
        UM.getEditor('myEditor').setContent('欢迎使用umeditor', isAppendTo);
        alert(arr.join("\n"));
    }
    function hasContent() {
        var arr = [];
        arr.push("使用editor.hasContents()方法判断编辑器里是否有内容");
        arr.push("判断结果为：");
        arr.push(UM.getEditor('myEditor').hasContents());
        alert(arr.join("\n"));
    }
</script>
</body>
</html>