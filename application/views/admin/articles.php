    <div class="content-wrapper">
        <div class="container-fluid">
            <!-- Breadcrumbs-->
       <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/admin/main.php">Main</a>
            </li>
            <li class="breadcrumb-item active">Все статьи</li>
        </ol>
            <!-- Example DataTables Card-->
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fa fa-table"></i> Статьи (<?= $manager->getCountTab('articles') ?>)
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                        <tr>
                            <th>Заголовок</th>
                            <th>Подзаголовок</th>
                            <th>Дата</th>
                            <th>Автор:</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Заголовок</th>
                            <th>Подзаголовок</th>
                            <th>Дата</th>
                            <th>Автор:</th>
                        </tr>
                        </tfoot>
                        <tbody>
                            <?php $articles = $articleManager->getArticles(); ?>
                            <?php foreach ($articles as $article): ?>
                            <tr>
                                <td><?= substr($article->title, 0, 40); ?></td>
                                <td><?= substr($article->sub_title, 0, 20); ?></td>
                                <td><?= $article->created_at; ?></td>
                                <td><?= $userManager->getAuthor($article->author)->login ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
            </div>
        </div>