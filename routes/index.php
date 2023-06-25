<?php
  session_start();
  
  $is_login = false;

  if(isset($_GET["page"])) {
    if($_GET["page"] == "logout") {
      session_destroy();
      header("location:index.php?page=harga-eceran-publik");
    }

    if($_GET["page"] == "login") {
      include "pages/auth/login.php";
      $is_login = true;
    }

    if($_GET["page"] == "login-pimpinan") {
      include "pages/auth/pimpinan/login.php";
      $is_login = true;
    }

    if($_GET["page"] == "login-administrator") {
      include "pages/auth/admin/login.php";
      $is_login = true;
    }
  }
  
  if(!$is_login) {
    if(empty($_SESSION["SESS_HARPAN_LOGIN"])) {
      // include "pages/auth/login.php";
      include "partials/header.php";
      include "partials/topbar.php";
      include "partials/sidebar.php";
      include "routes.php";
      include "partials/footer.php";
    } else {
      if($_SESSION["SESS_HARPAN_LOGIN"] == true) {
        include "partials/header.php";
        include "partials/topbar.php";
        include "partials/sidebar.php";
        include "routes.php";
        include "partials/footer.php";
      }
    }
  }

?>