<?php
/**
 * Created by PhpStorm.
 * User: Yang DingChuan
 * Date: 2017/3/17
 * Time: 14:23
 */
namespace frontend\controllers;

use common\models\UploadImage;
use Yii;
use yii\base\Exception;
use common\models\UserModel;
use common\components\CommonHelper;
use yii\web\UploadedFile;

class UserController extends CommonController
{
    //个人资料
    public function actionInfo()
    {
        $userId = Yii::$app->user->id;
        $model = UserModel::findOne($userId);

        if (Yii::$app->request->post()) {
            try {
                $model->load(Yii::$app->request->post());

                if (!$model->save()) {
                    throw new Exception('修改失败');
                }

                CommonHelper::setFlash('success', '修改成功！');
            }
            catch (Exception $e) {
                CommonHelper::setFlash('error', '修改失败！');
            }
        }

        return $this->render('info', [
            'model' => $model,
        ]);
    }

    /**
     * 头像
     * @return string
     */
    public function actionPic()
    {
        $userId = Yii::$app->user->id;

        /** @var UserModel $model */
        $userModel = UserModel::findOne($userId);

        if (Yii::$app->request->getIsPost()) {
            try {
                $model = new UploadImage();

                $model->imageFile = UploadedFile::getInstanceByName("avatar_file");

                $uploadFile = $model->upload('pic');
                $uploadFileSmall = '';

                if($uploadFile){

                    $avatarJson = Yii::$app->request->post('avatar_data');
                    $avatar_data = json_decode($avatarJson, true);
                    //如果有裁剪
                    if ($avatar_data)
                    {
                        $x = $avatar_data['x'];
                        $y = $avatar_data['y'];
                        $w = $avatar_data['width'];
                        $h = $avatar_data['height'];

                        $filename  =  __DIR__.'/../web/'.$uploadFile ; //图片的路径
                        switch ($model->imageFile->extension)
                        {
                            case 'png':
                                $im  = imagecreatefrompng($filename); // 读取需要处理的图片
                                break;
                            default :
                                $im  = imagecreatefromjpeg($filename); // 读取需要处理的图片
                        }

                        //生成大图
                        $newim  = imagecreatetruecolor(200, 200); //产生新图片 200 200 为新图片的宽和高
                        imagecopyresampled($newim,  $im , 0, 0,  $x ,  $y , 200, 200,  $w ,  $h );

                        //生成小图
                        $uploadFileSmall = str_replace(['.jpg', '.png', '.jpeg'], ['_small.jpg', '_small.png', '_small.jpeg'],$uploadFile);
                        $filenameSmall = __DIR__.'/../web/'.$uploadFileSmall ; //图片的路径

                        $imSmall = imagecreatetruecolor(48, 48);
                        imagecopyresampled($imSmall,  $im , 0, 0,  $x ,  $y , 48, 48,  $w ,  $h );

                        //将裁剪的图片保存
                        imagejpeg($newim,  $filename);
                        imagedestroy($newim);

                        imagejpeg($imSmall,  $filenameSmall);
                        imagedestroy($imSmall);

                        imagedestroy($im);
                    }
//
//                $oss = new Oss();
//                $oss->upload($uploadFile,$uploadFile);

                    $message = '上传成功';
                    $result = '/'.$uploadFile;

                    $userModel->pic = $result;
                    $userModel->pic_small = '/'.$uploadFileSmall;

                    if (!$userModel->save()) {
                        throw new Exception('修改失败！');
                    }
                }
                else
                {
                    throw new Exception('上传图片失败');
                }
            }
            catch (Exception $e)
            {
                $message = $e->getMessage();
                $result = '';
            }

            $data = ['message'=> $message, 'result'=> $result, 'state' => 200];

            CommonHelper::ajaxSuccess($data);
        }

        return $this->render('pic', [
            'model' => $userModel,
        ]);
    }
}
