<?php require_once 'header.php' ?>
<div class="content-wrapper">
   <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
         <li class="breadcrumb-item">
            <a href="/admin/main.php">Панель</a>
         </li>
         <li class="breadcrumb-item active">Добавить новую</li>
      </ol>
      <?php 
           if (isset($_GET) && !empty($_GET)) {
            $artid= $_GET['artid'];
            $getSingArt= $articleManager->getArtForEdit($artid);
           }
         
         if (isset($_POST) && !empty($_POST)) {
            $articleManager->updateArticle($_POST);
            header('Location: admin_articles.php');
           }
           ?>
      <!-- Example DataTables Card-->
      <form action="" method="post">
         <div class="form-group">
            <label>Заголовок</label>
            <textarea class="form-control" rows="" name="title"><?= $getSingArt->title; ?></textarea>
         </div>
         <div class="form-group">
            <label>Подзаголовок</label>
            <textarea class="form-control" rows="2" name="sub_title"><?= $getSingArt->sub_title; ?></textarea>
         </div>
         <div class="form-group">
            <label>Текст</label>
            <textarea class="form-control" rows="10" name="content"><?= $getSingArt->content; ?></textarea>
         </div>
         <button type="submit" name="id" value="<?= $getSingArt->id; ?>" class="btn btn">Cохранить</button>
      </form>
   </div>
</div>
<!-- /.container-fluid-->
<?php require_once 'footer.php' ?>