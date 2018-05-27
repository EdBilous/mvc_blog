    <div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
       <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/admin">Main</a>
            </li>
            <li class="breadcrumb-item active">Мои посты</li>
        </ol>
        <!-- Example DataTables Card-->
        <div class="card mb-3">
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
                            <?php if ($data): ?>
                            <?php $articles = $data; ?>
                            <?php foreach ($articles as $article): ?>
                            <tr>
                                <td><?= substr($article->title, 0, 120); ?></td>
                                <td><?= substr($article->sub_title, 0, 120); ?></td>
                                <?php $date = DateTime::createFromFormat('Y-m-d H:i:s', $article->created_at); ?>
                                <td><?= $date->format('F d, Y'); ?></td>
                                <td>
                                    <input class="btn btn-outline-primary" type="button" style="" value="редакт..." onclick="if(confirm('Перейти на страницу редактирования?'))location.href='editpost?<?= $article->url; ?>';" /></p>
                                    <input class="btn btn-outline-danger" type="button" style="" value="удалить" onclick="if(confirm('Уверен, что хочешь удалить?'))location.href='delete?<?= $article->url; ?>';" />
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
    </div>