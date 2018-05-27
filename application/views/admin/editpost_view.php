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
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label>Заголовок</label>
                <input type="text" class="form-control" name="title" value="<?= $data->title; ?>" </input>
            </div>
            <div class="form-group">
                <label>Подзаголовок</label>
                <input type="text" class="form-control" name="sub_title" value="<?= $data->sub_title; ?>" </input>
            </div>
            <div class="form-group">
                <label>Текст</label>
                <textarea class="form-control" rows="10" name="content"><?= $data->content; ?></textarea>
            </div>
            <p>
                <?php if ($data->image): ?>
                    <img width="150" src="<?= $data->image ?>">
                    <input class="btn btn-outline-dark" type="button" value="удалить" onclick="clickMe('')"/>
                <?php endif; ?>
            </p>
            <p>
                <input class="button" type="file" name="image" </input>
            </p>
            <button style="color: white" type="submit" name="url" value="<?= $data->url; ?>" class="btn btn-success">
                Cохранить
            </button>
        </form>
    </div>
</div>
<script>
    $(document).ready(function () {
    });

    function clickMe(urlImage) {
        $.ajax({
            method: "POST",
            url: "<?= $data->image ?>",
            data: {urlImage: urlImage}
        })
            .done(function (msg) {
                console.log("Data Saved: " + msg);
            });
    }
</script>
<!-- /.container-fluid-->