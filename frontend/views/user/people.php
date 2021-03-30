<?php

/* @var $this yii\web\View */


use yii\widgets\Pjax;

$this->title = 'Админ панель';
?>



<div class="card">
 <div class="card-header border-0">
  <h3 class="card-title">Заявки врача: <?= Yii::$app->user->identity->fio ?></h3>
  <div class="card-tools">
   <a href="#" class="btn btn-tool btn-sm">
    <i class="fas fa-download"></i>
   </a>
   <a href="#" class="btn btn-tool btn-sm">
    <i class="fas fa-bars"></i>
   </a>
  </div>
 </div>
 <div class="card-body table-responsive p-0">
  <table class="table table-striped table-valign-middle">
   <thead>
   <tr>
    <th>Название</th>
    <th>Описание</th>
    <th>Дата</th>
    <th>More</th>
   </tr>
   </thead>
   <tbody>
   <?php foreach ( $user as $one): ?>

       <tr>
           <td>

               <?=  $one->title; ?>
           </td>
           <td> <?=  $one->description; ?></td>
           <td>
               <?=  $one->date; ?>
           </td>
           <td>
               <?=  $one->employee_id; ?>
           </td>
           <td>
               <a href="/request/view?id=<?= $one->id; ?>">Просмотр </a>
           </td>
       </tr>
   <?php endforeach; ?>


   </tbody>
  </table>
 </div>
</div>
