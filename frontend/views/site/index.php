<?php

/* @var $this yii\web\View */

$this->title = '这是一个首页';
?>
<div class="site-index">

</div>

<script>
    window.onblur = function() {
        document.title = "发呆- ( ゜- ゜)つロ ";
        $("#web-icon").attr('href',"https://wujunze.com/usr/themes/yilia/loss.ico");
        window.onfocus = function() {
            document.title = "这是一个首页";
            $("#web-icon").attr('href',"https://www.zydc1104.top/up/pic/2017/02/22/QWExEuHcf4.jpg");
        }
    };
</script>
