<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Request */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Requests', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="request-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
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

            'title',
            'description:ntext',
            'date',
            'user.username',
            'employee_id',
            [
                'label' => 'Статус записи',
                'attribute' => 'status',
                'value' => function ($data) {
                    if ($data->status == 0 ) return 'Ожидание';
                    if ($data->status == 1 ) return 'Обработано';

                },
                'filter' => ['0' => 'Модерация', '1' => 'Опубликована'],
                'filterInputOptions' => ['prompt' => 'Все статусы', 'class' => 'form-control', 'id' => null]
            ],
        ],
    ]) ?>

</div>
