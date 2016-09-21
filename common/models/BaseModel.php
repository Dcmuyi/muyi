<?php

namespace common\models;

use yii\behaviors\TimestampBehavior;

/**
 * Class BaseModel
 * @package common\models
 */
class BaseModel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

}
