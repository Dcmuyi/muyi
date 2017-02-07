<?php
/**
 * Created by PhpStorm.
 * User: Yang Dingchuan
 * Date: 2017/2/6
 * Time: 10:11
 */
namespace frontend\controllers;

use app\models\UploadFile;
use common\components\CommonHelper;
use common\components\Oss;
use Yii;
use yii\base\Exception;
use yii\web\UploadedFile;
use common\models\UploadImage;

/**
 * Class UploadController
 * @package frontend\controllers
 */
class UploadController extends CommonController
{
    /**
     * 上传图片
     * @return array
     */
    public function actionUploadImage()
    {
        try {
            $model = new UploadImage();

            $model->imageFile = UploadedFile::getInstanceByName("avatar_file");

            $uploadFile = $model->upload('pic');

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

                    $newim  = imagecreatetruecolor(150, 150); //产生新图片 100 100 为新图片的宽和高
                    imagecopyresampled($newim,  $im , 0, 0,  $x ,  $y , 150, 150,  $w ,  $h );

                    imagejpeg($newim,  $filename);    //将裁剪的图片保存
                    imagedestroy($im);
                    imagedestroy($newim);
                }

                $oss = new Oss();
                $oss->upload($uploadFile,$uploadFile);

                $message = '上传成功';
                $result = 'http://jkbsimg.com/'.$uploadFile;
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

    public function actionUploadFile(){
        $model = new UploadFile();

        $model->file = UploadedFile::getInstanceByName("upfile");

        $uploadFile = $model->upload('file');

        if($uploadFile){
            $oss = new Oss();
            $oss->upload($uploadFile,$uploadFile);

            $data = ['cloud_key'=>$uploadFile,'url'=>'http://jkbsimg.com/'.$uploadFile];

            return CtHelper::makeResponse(true,'',$data);
        }else{
            return CtHelper::makeResponse(false,'上传失败!');
        }
    }
}