<?php

/* @var $this yii\web\View */

$this->title = '这是一个首页';
?>

<head>
    <link rel="stylesheet" href="<?php echo Yii::$app->params['webUrl'].'/carousel/style/css/mdsSlide.css' ?>" />
</head>
<div class="site-index">
    <div id="slide">
        <ul class="list">
            <li><a href="javascript:;"><img src="/carousel/style/images/1.png" alt=""></a></li>
            <li><a href="javascript:;"><img src="/carousel/style/images/2.png" alt=""></a></li>
            <li><a href="javascript:;"><img src="/carousel/style/images/3.png" alt=""></a></li>
            <li><a href="javascript:;"><img src="/carousel/style/images/4.png" alt=""></a></li>
            <li><a href="javascript:;"><img src="/carousel/style/images/5.png" alt=""></a></li>
        </ul>
    </div>
</div>

<div style="height: 1000px;">
    <a href="tencent://message/?uin=773724313"><img border="0" src="http://wpa.qq.com/pa?p=2:773724313:51" alt="点击这里给我发消息" title="点击这里给我发消息"/>
</div>

<script src="<?php echo Yii::$app->params['webUrl'].'/carousel/js/Mds.onePic.1.0.js' ?>"></script>

<script>
    window.onblur = function() {
        document.title = "发呆- ( ゜- ゜)つロ ";
        $("#web-icon").attr('href',"https://wujunze.com/usr/themes/yilia/loss.ico");
        window.onfocus = function() {
            document.title = "这是一个首页";
            $("#web-icon").attr('href',"https://www.zydc1104.top/up/logo.png");
        }
    };

    $('#slide').MdsSlideFade({
        _width: 800,
        _height: 500,
        pageNum: true,
        time: '3000',
        btn: false
    });
</script>
