<?php
/**
 * Created by PhpStorm.
 * User: Yang Dingchuan
 * Date: 2017/2/6
 * Time: 10:11
 */
namespace common\models;

use Yii;
use yii\base\Exception;
use yii\base\Model;
use common\components\CommonHelper;

class UploadImage extends Model{
    public $imageFile;

    public function rules()
    {
        return [
            [['imageFile'], 'image', 'extensions' => ['png', 'jpg', 'jpeg'], 'maxSize' => 10240*10240],
        ];
    }

    //上传图片
    public function upload($dir='')
    {
        if ($this->validate()) {
            $path = self::makeUploadPath($dir);
            $name = CommonHelper::randomString(10);

            $fileUploadFullPath = sprintf("%s/%s.%s",$path,$name, $this->imageFile->extension ? $this->imageFile->extension : 'png');
            $result = $this->imageFile->saveAs($fileUploadFullPath);

            if ($result) {
                return $fileUploadFullPath;
            } else {
                throw new Exception('上传失败');
            }
        } else {
            throw new Exception('上传失败，图片格式错误！');
        }
    }

    /**
     * 生成随机文件名
     * @param string $dir
     * @return false|string
     */
    public static function makeUploadPath($dir = '')
    {
        $path = date("Y/m/d",time());
        if($dir){
            $path = sprintf('up/%s/%s',$dir,$path);
        }else{
            $path = sprintf('up/%s',$path);
        }

        if(!file_exists($path)){
            mkdir($path,0777,true);
        }

        return $path;
    }
}