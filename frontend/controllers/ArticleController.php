<?php

namespace frontend\controllers;

use common\models\Article;
use Yii;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;



/**
 * ArticleController implements the CRUD actions for article model.
 */
class ArticleController extends Controller
{

    public function actionIndex()
    {
        $blog = Article::find()->andWhere(['status'=>1])->orderBy('id DESC')->all();
        return $this->render('all', [
            'blog' => $blog,
        ]);
    }
    public function actionOne($url)
    {
        $blogs = Article::find()->andWhere(['url'=>$url])->one();

        return $this->render('one', [
            'blog' => $blogs,
        ]);
    }




}
