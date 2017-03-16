<?php
/**
 * Created by PhpStorm.
 * User: Yang DingChuan
 * Date: 2017/3/16
 * Time: 15:43
 */
namespace frontend\controllers;

use common\components\CommonHelper;
use frontend\models\ArticleContentModel;
use frontend\models\ArticleModel;
use Yii;
use yii\filters\AccessControl;
use yii\helpers\Url;

/**
 * Class ArticleController
 * @package frontend\controllers
 */
class ArticleController extends BaseController
{
    /**
     * 行为控制
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        echo 'index';die;
    }

    public function actionCreate()
    {
        $model = new ArticleModel();
        $contentModel = new ArticleContentModel();

        if (Yii::$app->request->post()) {
            $userId = Yii::$app->user->id;

            $model->load(Yii::$app->request->post());
            $model->user_id = $userId;

            if (!$model->save()) {
                CommonHelper::setFlash('error', '添加文章失败');
            }

            $content = Yii::$app->request->post('content');
            $contentModel->content = $content;
            $contentModel->article_id = $model->id;

            if (!$contentModel->save()) {
                CommonHelper::setFlash('error', '添加文章失败');
            }

            CommonHelper::setFlash('success', '添加成功');

            $this->redirect('index.html')->send();
        }

        return $this->render('create', [
            'model' => $model,
            'contentModel' => $contentModel
        ]);
    }

    public function actionView()
    {
        $id = Yii::$app->request->get('id');

        echo $id;die;
    }

    public function actionTest()
    {
        echo 123;die;
    }
}