<?php
/**
 * Created by PhpStorm.
 * User: Yang Dingchuan
 * Date: 2017/2/6
 * Time: 10:11
 */

use yii\helpers\Url;

$this->title = '修改头像';
$this->params['breadcrumbs'][] = $this->title;

?>

<head>
    <link rel="stylesheet" href="<?php echo Yii::$app->params['webUrl'].'/cropper/cropper.min.css' ?>">
    <link rel="stylesheet" href="<?php echo Yii::$app->params['webUrl'].'/cropper/css/main.css' ?>">
</head>
<body>

<div class="row">
    <div class="col-lg-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">我的信息</h3>
            </div>
            <div class="list-group">
                <a class="list-group-item" href= "<?= Url::to(['/user/info']) ?>">个人中心</a>
                <a class="list-group-item active" href= "<?= Url::to(['/user/pic']) ?>">修改头像</a>
                <a class="list-group-item" href= "#">我的发布</a>
                <a class="list-group-item" href= "#">我的收藏</a>
            </div>
        </div>
    </div>

    <div class="container col-lg-6" id="crop-avatar">

        <div class="page-header">
            <h1><?= $this->title ?></h1>
        </div>

        <!-- Current avatar -->
        <div class="avatar-view  ml-40" title="修改头像">
            <img src="<?= $model->pic ?>" alt="头像">
        </div>

        <!-- Cropping modal -->
        <div class="modal fade" id="avatar-modal" aria-hidden="true" aria-labelledby="avatar-modal-label" role="dialog" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <form class="avatar-form" enctype="multipart/form-data" method="post">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title" id="avatar-modal-label">修改头像</h4>
                        </div>
                        <div class="modal-body">
                            <div class="avatar-body">
                                <!-- Upload image and data -->
                                <div class="avatar-upload">
                                    <input type="hidden" class="avatar-src" name="avatar_src">
                                    <input type="hidden" class="avatar-data" name="avatar_data">
                                    <label for="avatarInput">本地上传</label>
                                    <input type="file" class="avatar-input" id="avatarInput" name="avatar_file">
                                </div>

                                <!-- Crop and preview -->
                                <!-- Crop and preview -->
                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="avatar-wrapper"></div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="avatar-preview preview-lg"></div>
                                        <div class="avatar-preview preview-md"></div>
                                        <div class="avatar-preview preview-sm"></div>
                                    </div>
                                </div>

                                <div class="row avatar-btns">
                                    <div class="col-md-9"></div>

                                    <div class="col-md-3">
                                        <button type="submit" class="btn btn-primary btn-block avatar-save">确定</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div><!-- /.modal -->

        <!-- Loading state -->
        <div class="loading" aria-label="Loading" role="img" tabindex="-1"></div>
    </div>
</div>

<script src="<?php echo Yii::$app->params['webUrl'].'/cropper/bootstrap.min.js' ?>"></script>
<script src="<?php echo Yii::$app->params['webUrl'].'/cropper/cropper.min.js' ?>"></script>
<script src="<?php echo Yii::$app->params['webUrl'].'/cropper/js/main.js' ?>"></script>

<script src="<?php echo Yii::$app->params['webUrl'].'/static/bootstrap.js' ?>"></script>
</body>
