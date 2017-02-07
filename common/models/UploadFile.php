<?php
/**
 * Created by PhpStorm.
 * User: Yang Dingchuan
 * Date: 2017/2/6
 * Time: 10:11
 */
namespace app\models;

use Yii;
use yii\base\Model;
use common\models\UploadImage;
use common\components\CommonHelper;

class UploadFile extends Model
{
    public $file;

    public function rules()
    {
        return [
            [['file'], 'file'],
        ];
    }

    public function upload($dir='')
    {
        if ($this->validate()) {
            $path = UploadImage::makeUploadPath($dir);
            $name = CommonHelper::randomString(10);

            $fileUploadFullPath = sprintf("%s/%s.%s",$path,$name,$this->file->extension);
            $result = $this->file->saveAs($fileUploadFullPath);

            return $result?$fileUploadFullPath:false;
        } else {
            return false;
        }
    }
}