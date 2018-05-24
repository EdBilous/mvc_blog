<?php require_once 'header.php' ?>
<div class="content-wrapper">
   <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
         <li class="breadcrumb-item">
            <a href="/admin">Панель</a>
         </li>
         <li class="breadcrumb-item active">Добавить новую</li>
      </ol>
      <!-- Example DataTables Card-->
      <form action="" method="post">
         <div class="form-group">
            <label>Заголовок</label>
            <textarea class="form-control" rows="" name="title"><?= $data->title; ?></textarea>
         </div>
         <div class="form-group">
            <label>Подзаголовок</label>
            <textarea class="form-control" rows="2" name="sub_title"><?= $data->sub_title; ?></textarea>
         </div>
         <div class="form-group">
            <label>Текст</label>
            <textarea class="form-control" rows="10" name="content"><?= $data->content; ?></textarea>
         </div>
         <button type="submit" name="id" value="<?= $data->id; ?>" class="btn btn">Cохранить</button>
      </form>
   </div>
</div>
<!-- /.container-fluid-->