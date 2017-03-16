<?php

namespace frontend\models;

use common\models\BaseModel;
use Yii;

/**
 * This is the model class for table "article".
 *
 * @property int $id
 * @property string $title 标题
 * @property int $user_id 发布人
 * @property int $category 分类
 * @property int $visit_times 浏览次数
 * @property int $review_times 评论次数
 * @property int $created_at
 * @property int $updated_at
 */
class ArticleModel extends BaseModel
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'article';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'category', 'user_id'], 'required'],
            [['user_id', 'category', 'visit_times', 'review_times', 'created_at', 'updated_at'], 'integer'],
            ['category', 'in', 'range' => array_keys(Yii::$app->params['articleCategory'])],
            [['title'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => '标题',
            'user_id' => '发布人',
            'category' => '分类',
            'visit_times' => '浏览次数',
            'review_times' => '评论次数',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
