<?php

if (isset($_GET) && !empty($_GET)) {
    $del =$_GET['delid'];
    $articleManager->deleteArticle($del);
}

// if (isset($_POST) && !empty($_POST)) {
//     updateArticle($_POST);
// }
?>
    <div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
       <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/admin/main.php">Main</a>
            </li>
            <li class="breadcrumb-item active">Мои статьи</li>
        </ol>
        <!-- Example DataTables Card-->
        <div class="card mb-3">
<!--             <div class="card-header">
                <i class="fa fa-table"></i>
            </div> -->
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Заголовок</th>
                            <th>Подзаголовок</th>
                            <th>Дата</th>
                            <th>Действие</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Заголовок</th>
                            <th>Подзаголовок</th>
                            <th>Дата</th>
                            <th>Действие</th>
                        </tr>
                        </tfoot>
                        <tbody>
                            <?php if ($articleManager->getAdminArticles()): ?>
                            <?php $articles = $articleManager->getAdminArticles(); ?>
                            <?php foreach ($articles as $article): ?>
                            <tr>
                                <td><?= substr($article->title, 0, 40); ?></td>
                                <td><?= substr($article->sub_title, 0, 20); ?></td>
                                <td><?= $article->created_at; ?></td>
                                <td>
                                    <a class="card text-white bg-success" href="edit_article.php?artid=<?= $article->id; ?>"">Редактировать</a><br>
                                    <a class="card text-white bg-danger" href="admin_articles.php?delid=<?= $article->id; ?>">Удалить</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        <?php else: ?>
                            <p>Статьи не найдены!</p>
                        <?php endif;?>
                         </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>
    </div>