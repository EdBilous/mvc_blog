<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
   <a class="navbar-brand" href="/">Сustom Blog</a>
   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
   <span class="navbar-toggler-icon"></span>
   </button>
   <div class="collapse navbar-collapse" id="navbarsExampleDefault">
      <ul class="navbar-nav mr-auto">
         <li class="nav-item active">
            <a class="nav-link" href="/">Главная <span class="sr-only">(current)</span></a>
         </li>
         <li class="nav-item">
            <a class="nav-link" href="/about">О Блоге</a>
         </li>
         <li class="nav-item">
            <a class="nav-link disabled" href="/contact">Обратная связь</a>
         </li>
      </ul>
       <form action="/search" method="POST" class="form-inline my-2 my-lg-0">
           <input class="form-control mr-sm-2" type="text" name="query" placeholder="Введите текст" aria-label="Search">
           <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Поиск</button>
       </form>
      <ul class="navbar-nav">
       <li class="nav-item" data-placement="right">
         <a class="nav-link" href="/admin/">
         <i class="fa fa-fw fa-user"></i>Админ</a>
      </li>
      <?php if (isset($_SESSION['access']) && $_SESSION['access']): ?>
      <li class="nav-item" data-placement="right">
         <a class="nav-link" href="/login?logout">
         <i class="fa fa-fw fa-sign-out"></i>Выход</a>
      </li>
      <?php else: ?>
       <li class="nav-item" data-placement="right">
         <a class="nav-link" href="/register">
         <i class="fas fa fa-user-plus"></i>Регистрация</a>
      </li>
      <?php endif; ?>
       </ul>
   </div>
</nav>
