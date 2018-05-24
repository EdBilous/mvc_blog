<!-- Page Header -->
<header class="masthead" style="background-image: url('/img/home-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="site-heading">
                    <h1>Custom Blog</h1>
                    <span class="subheading">Вход</span>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Main Content -->
<div class="container">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <?php if (isset($_POST["sendLoginData"])): ?>
                <?php if (getErrorMessage()): ?>
                    <p style="color: red"><?= getErrorMessage(); ?></p>
                <?php endif; ?>
            <?php endif; ?>
            <form action="" class="form-horizontal" method="post">
                <div class="form-group">
                    <label class="col-sm-2 control-label">Login</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" name="login" placeholder="Login">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Пароль</label>
                    <div class="col-sm-12">
                        <input type="password" class="form-control" name="password" placeholder="Password">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-8">
                        <button type="submit" name="sendLoginData" class="btn btn-primary">Вход</button>
                    </div>
                </div>
                <div class="nav-item" data-placement="right">
                    <a class="nav-link" href="/register">
                        <i style="color: brown" class="fa fas fa-user-plus"></i> РЕГИСТРАЦИЯ</a>
                </div>
        </div>
        </form>
    </div>
</div>
</div>