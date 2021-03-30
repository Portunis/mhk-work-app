<?php

/* @var $this yii\web\View */


use yii\widgets\Pjax;

$this->title = 'Админ панель';
?>
<div class="site-index">

    <div class="content-wrapper" ">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Профиль</h1>
                    </div>

                </div>
            </div>
        </section>

        <?php foreach ($user as $one): ?>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">


                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <img class="profile-user-img img-fluid img-circle" src="../../images/user/<?= $one->image; ?>" alt="User profile picture">
                                </div>

                                <h3 class="profile-username text-center"><?= $one->fio; ?></h3>

                                <p class="text-muted text-center">
                                    Должность:<br>
                                    <?= $one->position; ?>
                                </p>

                            </div>

                        </div>



                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Мои данные</h3>
                            </div>

                            <div class="card-body">
                                <strong><i class="fas fa-book mr-1"></i> Полис</strong>

                                <p class="text-muted">
                                    <?= $one->polis; ?>
                                </p>

                                <hr>

                                <strong><i class="fas fa-map-marker-alt mr-1"></i> ИНН</strong>

                                <p class="text-muted"><?= $one->inn; ?></p>

                                <hr>

                                <strong><i class="fas fa-pencil-alt mr-1"></i> Паспорт</strong>

                                <p class="text-muted">
                                    <span class="tag tag-danger"><?= $one->passport; ?></span>

                                </p>

                                <hr>

                                <strong><i class="far fa-file-alt mr-1"></i> Телефон</strong>

                                <p class="text-muted"><?=$one->phone; ?></p>
                            </div>

                        </div>

                    </div>


                </div>
                <br>
                <a class="btn btn-success" id="photo" data-key="<?=  Yii::$app->user->identity->getId() ?>" data-name="<?=  Yii::$app->user->identity->username ?> "><i class="fa fa-edit m-right-xs"></i>Редактировать профиль</a>
            </div>
        </section>
        <?php endforeach; ?>
    </div>


</div>
<?php Pjax::begin([
    'enablePushState' => false,
]); ?>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>

        </div>
    </div>
</div>
<?php Pjax::end(); ?>
<?php Pjax::begin([
    'enablePushState' => false,
]); ?>
<?php $this->registerJs("
$('#photo').on('click',function(){
   var data = $(this).data();
   $('#exampleModal').modal('show');
 $('#exampleModal').find('.modal-title').text('' + data.name);
   $('#exampleModal').find('.modal-body').load('/user/image-work?id=' + data.key);
   
});

");

?>
<?php Pjax::end(); ?>