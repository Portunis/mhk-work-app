<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Request */

$this->title = 'Обновить заявку: ' . $model->title;

?>
<div class="request-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
