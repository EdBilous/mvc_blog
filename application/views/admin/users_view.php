<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/admin/main.php">Main</a>
            </li>
            <li class="breadcrumb-item active">Пользователи</li>
        </ol>
        <?php var_dump($_SESSION['role']);var_dump($_POST); ?>
        <!-- Example DataTables Card-->
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-table"></i> Пользователи (<?php // getCountTab('users') ?>)
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Имя</th>
                            <th>Фамилия</th>
                            <th>Логин</th>
                            <th>Email</th>
                            <th>Роль</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Имя</th>
                            <th>Фамилия</th>
                            <th>Логин</th>
                            <th>Email</th>
                            <th>Роль</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        <?php if ($data) : ?>
                            <?php $users = $data; ?>
                            <?php foreach ($users as $user): ?>
                                <tr>
                                    <td><?= $user->name; ?></td>
                                    <td><?= $user->last_name; ?></td>
                                    <td><?= $user->login; ?></td>
                                    <td><?= $user->email; ?></td>
                                    <td>
                                        <form action="" method="post">
                                            <p><select class="form-control form-control-sm" name="role">
                                                <option selected disabled><?= $user->role; ?></option>
                                                <option value="user">Пользователь</option>
                                                <option value="moderator">Модератор</option>
                                                <option value="admin">Администратор</option>
                                            </select></p>
                                            <p><button type="submit" name="id"
                                                        value="<?= $user->id; ?>" class="btn btn-dark">
                                                    Изменить</button>
                                                <input class="btn btn-outline-danger" type="button" style="" value="удалить" onclick="if(confirm('Уверен, что хочешь удалить пользователя: <?= $user->login; ?> ?'))location.href='users?<?= $user->id; ?>';" />
                                            </p>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <p>Не найдено!</p>
                        <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>