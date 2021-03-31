<?php

/* @var $this yii\web\View */
/* @var $blogs yii\web\View */

$this->title = 'Клиника';
?>

    <div class="jumbotron">
        <h1>Клинкика!</h1>

        <p class="lead">Получите лучшие услуги только у нас.</p>

        <?php if (Yii::$app->user->isGuest){ ?>
            <p>Авторизируйтесь для записи на прием</p>
        <?php } else { ?>
            <p><a class="btn btn-lg btn-success" href="/request/create">Записаться на прием</a></p>
        <?php }?>
    </div>

    <div class="body-content">
    <h2>Последние новости</h2>
        <hr>
        <div class="row">

            <?php
            foreach ($blog as $one): ?>
                <div class="col-lg-4">
                    <h2><?= $one->title; ?></h2>

                    <p><?=  \yii\helpers\StringHelper::truncate($one->description,150);?> </p>

                    <?= \yii\bootstrap\Html::a('Читать &raquo;',['article/one','url'=>$one->url], ['class' => 'btn btn-default']) ?>

                </div>
            <?php endforeach;

            ?>
        </div>

    </div>

<?php
