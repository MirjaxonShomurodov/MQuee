<!DOCTYPE html>
<html lang="en">
  <head>
    <?php
      include_once 'layout/css.php';
    ?>
  </head>
  <body class="app sidebar-mini">
    <!-- Navbar-->
    <header class="app-header"><a class="app-header__logo" href="index.html">Admin</a>
      <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
      <!-- Navbar Right Menu-->
      <ul class="app-nav">
        <li class="app-search">
          <input class="app-search__input" type="search" placeholder="Search">
          <button class="app-search__button"><i class="bi bi-search"></i></button>
        </li>
      </ul>
    </header>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <?php
      include_once 'layout/sidebar.php';
    ?>
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="bi bi-speedometer"></i> Navbat qo'shish</h1>
          <p>Bankdan foydalanish uchun navbarga yozilish.</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">  
          <li class="breadcrumb-item"><i class="bi bi-house-door fs-6"></i></li>
          <li class="breadcrumb-item"><a href="navbat.php">Navbatlar</a></li>
          <li class="breadcrumb-item"><a href="navbat-add.php">Navbat qo'shish</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="tile">
            <h3 class="tile-title">Qo'shish</h3>
            <div class="tile-body">
              <form>
                <div class="mb-3">
                  <label class="form-label">Ism</label>
                  <input class="form-control" type="text" placeholder="Ismingizni kiriting">
                </div>
                <div class="mb-3">
                  <label class="form-label">Famila</label>
                  <input class="form-control" type="text" placeholder="Familangzni kiritilgan">
                </div>
                <div class="mb-3">
                  <label class="form-label">Telifon</label>
                  <input class="form-control" type="email" placeholder="Telfon raqamini kirting">
                </div>
                <div class="mb-3">
                  <label class="form-label">Email</label>
                  <input class="form-control" type="email" placeholder="E-mail kirting">
                </div>
                
                <div class="mb-3">
                  <label class="form-label">Gender</label>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="form-check-input" type="radio" name="gender">Male
                    </label>
                  </div>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="form-check-input" type="radio" name="gender">Female
                    </label>
                  </div>
                </div>
                <div class="mb-3">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="form-check-input" type="checkbox">I accept the terms and conditions
                    </label>
                  </div>
                </div>
              </form>
            </div>
            <div class="tile-footer">
              <button class="btn btn-primary" type="button"><i class="bi bi-check-circle-fill me-2"></i>Register</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="#"><i class="bi bi-x-circle-fill me-2"></i>Cancel</a>
            </div>
          </div>
        </div>
      </div>
    </main>
    <?php
      include_once 'layout/js.php';
    ?>
  </body>
</html>