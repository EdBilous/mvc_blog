<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
   <a class="navbar-brand" href="/admin/"><?= $_SESSION['login']; ?></a>
   <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
   <span class="navbar-toggler-icon"></span>
   </button>
   <ul class="navbar-nav sidenav-toggler">
      <li class="nav-item">
         <a class="nav-link text-center" id="sidenavToggler">
         <i class="fa fa-fw fa-angle-left"></i>
         </a>
      </li>
   </ul>
   <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
         <li class="nav-item" data-toggle="tooltip" data-placement="right" title="">
            <a class="nav-link" href="/admin/add">
            <i class="fa fa-fw fa-newspaper-o"></i>
            <span class="nav-link-text">Новая статья</span>
            </a>
         </li>
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="">
              <a class="nav-link" href="/admin/posts">
                  <i class="fa fa-fw fa-table"></i>
                  <span class="nav-link-text">Мои посты</span>
              </a>
          </li>
         <li class="nav-item" data-toggle="tooltip" data-placement="right" title="">
            <a class="nav-link" href="/admin/users">
            <i class="fa fa-fw fa-users"></i>
            <span class="nav-link-text">Пользователи</span>
            </a>
         </li>
      </ul>
   </div>
   <ul class="navbar-nav">
         <li class="nav-item">
          <form class="form-inline my-2 my-lg-0 mr-lg-2">
            <div class="input-group">
              <input class="form-control" type="text" placeholder="Поиск...">
              <span class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fa fa-search"></i>
                </button>
              </span>
            </div>
          </form>
        </li>
      <li class="nav-item" data-toggle="tooltip" data-placement="right">
         <a class="nav-link" href="/">
         <i class="fa fa-fw fa-home"></i>Главная</a>
      </li>
      <li class="nav-item" data-toggle="tooltip" data-placement="right">
         <a class="nav-link" href="/login?logout">
         <i class="fa fa-fw fa-sign-out"></i>Выход</a>
      </li>
   </ul>
</nav>
