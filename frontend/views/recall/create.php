<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model common\models\Recall */

$this->title = 'Отзыв';

?>
<div class="recall-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
    <?php Pjax::begin(); ?>

    <?= GridView::widget([
                             'dataProvider' => $dataProvider,
                             'summary' => false,
                             'columns' => [
                                 'user.fio',
                                 'description:ntext',
                             ],
                         ]); ?>

    <?php Pjax::end(); ?>
</div>
