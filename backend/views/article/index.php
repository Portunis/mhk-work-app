<?php
use backend\assets\LoginAsset;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\ArticleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
LoginAsset::register($this);
$this->title = 'Articles';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить ', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'summary' => false,
        'columns' => [



            'user.username',
            'title',
            'description:ntext',
            [
                'label' => 'Статус записи',
                'attribute' => 'status',
                'value' =>function ($data) {
                    if ($data->status == 0 ) return 'Модерация';
                    if ($data->status == 1 ) return 'Опубликовано';

                },
                'filter' => ['0' => 'Модерация', '1' => 'Опубликована'],
                'filterInputOptions' => ['prompt' => 'Все статусы', 'class' => 'form-control', 'id' => null]
            ],

            'url:url',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>



</div>
