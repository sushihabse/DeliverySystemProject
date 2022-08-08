<?php
require_once '../connection.php';
    session_start();
    if(!isset($_SESSION['mrcnStatus']) && $_SESSION['mrcnStatus'] != 1){
        header("Location:../merchant_login.php");
    }
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Deshboard-Delivery project</title>
    <link rel="shortcut icon" type="image/png" href="#">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@1,300;1,400&family=Oswald:wght@200&family=Raleway:ital,wght@0,200;1,200&family=Roboto:ital,wght@0,300;1,100;1,300&family=Tiro+Devanagari+Sanskrit&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.12.1/b-2.2.3/b-print-2.2.3/date-1.1.2/fh-3.2.3/r-2.3.0/sc-2.0.6/sb-1.3.3/datatables.min.css"/>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
  </head>
  <body>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12 g-0">
        <div id="top-bar">
            <nav class="navbar navbar-expand-lg p-0">
                <div class="container-fluid">
                    <button type="button" id="sidebarCollapse" class="btn btn-outlin-dark manu-button"><i class="fa-solid fa-sliders"></i></button>
                        <div class="icons ms-auto">
                          <ul class="nav navbar-nav me-5">
                              <li class="nav-item active">
                                  <a class="nav-link" href="#"><i class="fa-regular fa-envelope"></i></a>
                              </li>
                              <li class="nav-item">
                                  <a class="nav-link" href="#"><i class="fa-regular fa-bell"></i></a>
                              </li>
                          </ul>
                        </div>
                      <div class="user-icon dropdown">
                          <img class="img-fluid dropdown-toggle" id="up" role="button" width="32" src="../admin/imagesIcons/356-3562377_personal-user.png" alt="" data-bs-toggle="dropdown">
                          <ul class="dropdown-menu" aria-labelledby="up">
                            <li>
                              <a class="dropdown-item" href="#">Profile<i class="fa-solid fa-user-gear ms-2"></i><a>
                            </li>
                            <li><a class="dropdown-item" href="#">Sattings<i class="fa-solid fa-gears ms-2"></i></a></li>
                            <li>
                                <a class="dropdown-item" href="../logout.php">Log Out<i class="fa-solid fa-arrow-right-from-bracket ms-2"></i></a>
                            </li>
                          </ul>
                      </div>
                    </div>
                  </nav>
              </div>
        </div>
      </div>
    </div>
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-1 g-0">
              <!-- Sidebar  -->
              <div class="side-menu overflow-auto">
                <nav id="sidebar" class="active">
                    <div class="sidebar-header">
                        <h3>FAST DELIVERY</h3>
                        <strong><a href="https://enamdev.xyz/merchant_panel/dashboard.php"><img src="../admin/companyLogo/fastdeli.png?>" alt="" width="70"></a></strong>
                    </div>
                    <ul class="list-unstyled components">
                        <li class="active">
                          <a href="https://enamdev.xyz/merchant_panel/dashboard.php"><i class="fa-solid fa-gauge-high"></i>DASHBOARD</a>
                        </li>
                        <li>
                          <a href="https://enamdev.xyz/merchant_panel/merchant_info.php"><i class="fa-solid fa-users-viewfinder"></i>MERCHANT INFO</a>
                        </li>
                        <li>
                          <a href="https://enamdev.xyz/merchant_panel/mrcn_customer.php"><i class="fa-solid fa-people-roof"></i>CUSTOMARS</a>
                        </li>
                        <li>
                          <a href="https://enamdev.xyz/merchant_panel/customer_invoice.php"><i class="fa-solid fa-people-roof"></i>CREATE INVOICE</a>
                        </li>
                        <li>
                          <a href="merchant_invoice.php"><i class="fa-solid fa-list-check"></i></i>MANAGE ORDERS</a>
                        </li>
                        <li>
                          <a href="#"><i class="fas fa-paper-plane"></i>CONTACT</a>
                        </li>
                    </ul>
                </nav>
              </div>
          </div>
<!--=============== SideBar End==================== -->