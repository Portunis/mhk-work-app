<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Article */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Articles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="article-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
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
        ],
    ]) ?>

</div>
