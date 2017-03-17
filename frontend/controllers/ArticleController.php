<?php
/**
 * Created by PhpStorm.
 * User: Yang DingChuan
 * Date: 2017/3/16
 * Time: 15:43
 */
namespace frontend\controllers;

use Yii;
use yii\base\Exception;
use yii\filters\AccessControl;
use common\models\ArticleModel;
use common\components\CommonHelper;
use common\models\ArticleContentModel;

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

            //事物
            $tran = Yii::$app->db->beginTransaction();
            try {
                $model->load(Yii::$app->request->post());
                $model->user_id = $userId;

                if (!$model->save()) {
                    throw new Exception('添加文章失败');
                }

                $content = Yii::$app->request->post('content');
                $contentModel->content = $content;
                $contentModel->article_id = $model->id;

                if (!$contentModel->save()) {
                    throw new Exception('添加文章失败');
                }

                CommonHelper::setFlash('success', '添加成功');

                $tran->commit();
                $this->redirect('index.html')->send();

            } catch (Exception $e) {
                $tran->rollBack();
                CommonHelper::setFlash('error', $e->getMessage());
            }
        }

        return $this->render('create', [
            'model' => $model,
            'contentModel' => $contentModel
        ]);
    }

    public function actionView()
    {
        $id = Yii::$app->request->get('id');

        $article = ArticleModel::findOne($id);
        $content = ArticleContentModel::findOne($id);
        $user = User::findOne($article->user_id);

        //没有信息跳转404
        if (empty($article) || empty($content)) {
            $this->redirect(['site/error'])->send();
        }


        echo $id;die;
    }

    public function actionTest()
    {
        echo 123;die;
    }
}