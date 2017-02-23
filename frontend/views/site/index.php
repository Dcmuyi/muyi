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
