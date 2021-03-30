<?php

/* @var $this yii\web\View */
/* @var $blogs yii\web\View */

$this->title = 'Клиника';
?>
    <div class="site-index">

        <div class="jumbotron">
            <h1>Новости</h1>

        </div>

        <div class="body-content">


            <div class="row">

                <?php
                foreach ($blog as $one): ?>
                    <div class="col-lg-4">
                        <h2><?= $one->title; ?></h2>

                        <p><?=  \yii\helpers\StringHelper::truncate($one->description,150);?> </p>

                        <?= \yii\bootstrap\Html::a('Читать &raquo;',['article/one','url'=>$one->url], ['class' => 'btn btn-default']) ?>

                    </div>
                <?php endforeach; ?>
            </div>

        </div>
    </div>
<?php
