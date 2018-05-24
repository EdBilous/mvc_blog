<header class="masthead" style="background-image: url('/img/home-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="site-heading">
                    <h2>Custom Blog</h2>
                    <span class="subheading">
               Результат поиска
               </span>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Main Content -->
<div class="container">
    <p style="color: blue">Результат поиска по запросу "<?php echo $_POST['query'] ?>" :</p>
    <?php $articles = $data; ?>
    <?php if ($articles): ?>
        <table class="table table-bordered" width="100%" cellspacing="0">
            <tr>
                <th>№</th>
                <th>Название</th>
                <th>Краткое описание</th>
                <th>Автор</th>
            </tr>
            <?php $count = '1'; ?>
            <?php foreach ($articles as $article): ?>
            <tr>
                <td><?= $count++; ?></td>
                <td><a style="color: blue" href="post?<?= $article->url;; ?>"">
                    <?= $article->title; ?>
                </td>
                <td><?= $article->sub_title; ?></td>
                <td><?= $article->authorLogin; ?></td>
                <?php endforeach; ?>
                <hr>
        </table>
    <?php else: ?>
        <p style="color: red">ничего не найдено, попробуйте изменить запрос</p>
    <?php endif; ?>
    <a style="color: brown" href="javascript:history.back()"><
        <назад
    </a>
</div>