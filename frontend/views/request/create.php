<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Request */

$this->title = 'Новая заявка';
$this->params['breadcrumbs'][] = ['label' => 'Заявки', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="request-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
