<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/admin">Main</a>
            </li>
            <li class="breadcrumb-item active">Новвая статья</li>
        </ol>
        <!-- Example DataTables Card-->
        <form action="" role="form" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label>Введите заголовок статьи</label>
                <input type="text" class="form-control" name="title">
            </div>
            <div class="form-group">
                <label>Введите подзаголовок статьи</label>
                <input type="text" class="form-control" name="sub_title">
            </div>
            <div class="form-group">
                <label>Введите текст</label>
                <textarea class="form-control" rows="8" name="content"></textarea>
            </div>
            <div>
                <p><input class="button" style="color:  darkred" type="file" name="image" </input></p>
            </div>
            <button style="color: white" type="submit" name="send" class="btn btn-success">Отправить</button>
        </form>
    </div>
</div>