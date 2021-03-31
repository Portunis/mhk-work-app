<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Request */

$this->title = 'Обновить заявку: ' . $model->title;

?>
<div class="request-update">

    <h1><?= Html::encode($this->title) ?></h1>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [

            'title',
            'description:ntext',
            'date',
            'user.fio',
            'user.phone',
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

    <?= $this->render('_form_doc', [
        'model' => $model,
    ]) ?>

</div>
