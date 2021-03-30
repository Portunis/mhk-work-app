<?php

use backend\assets\LoginAsset;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
LoginAsset::register($this);
$this->title = 'Пользователь';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>


    <?php Pjax::begin(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [

            'username',
            'email:email',
            'fio',
            'inn',
            'polis',
            'passport',
            'phone',

            [
                'class' => 'yii\grid\ActionColumn',
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
