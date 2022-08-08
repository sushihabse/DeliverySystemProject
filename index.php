<?php
  session_start();
  require_once "connection.php";
  
  if(isset($_SESSION['userName'])){
    header("Location:admin/dashboard.php");
    }
  if (isset($_POST['adminSign'])) {
    $uName = $_POST['username'];
    $password = $_POST['pass'];
    $conPassword = $_POST['cPass'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];

    if (isset($uName) && !empty($uName)) {
      $ckuName = $link->query("SELECT * FROM `users` WHERE `user_name` = '$uName'");
      if ($ckuName->num_rows == 0) {
        if (isset($password) && !empty($password)) {
          if (strlen($password) > 7 ) {
            if ($password == $conPassword) {
              $password = md5($password);
              $query = $link->query("INSERT INTO `users`(`user_name`, `password`, `email`, `mobile`) VALUES ('$uName','$password','$email','$mobile')");
                if ($query) {
                  header("Location:index.php");
                } else $error = 'Data Not Registered.';
            } else $error = 'Password Dont Match.';
          } else $error = 'Password need to more then 8 charecter.';
        } else $error = 'Password need to be Insert.';
      } else $error = 'User Name Allready exiest.';
    }
  }

  if (isset($_POST['login'])) {
    $userName = $_POST['uname'];
    $password = md5($_POST['pass']);
    if (!empty($userName) && !empty($password)) {
      $chekUser = $link->query("SELECT * FROM `users` WHERE `user_name` = '$userName'");
      if ($chekUser->num_rows > 0) {
        $userData = $chekUser->fetch_assoc();
        if ($userData['password'] == $password) {
          $_SESSION['userName'] = $userData['user_name'];
          $_SESSION['userType'] = $userData['user_type'];
          header("Location:admin/dashboard.php");
        } else $logError = 'Password Incorrect';
      } else $logError = 'User Name Incorrect';
    } else $logError = 'Fill Up the Login Field';
  }
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login-Delivery project</title>
    <link rel="shortcut icon" type="image/png" href="#">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@1,300;1,400&family=Oswald:wght@200&family=Raleway:ital,wght@0,200;1,200&family=Roboto:ital,wght@0,300;1,100;1,300&family=Tiro+Devanagari+Sanskrit&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/login.css">
  </head>
  <body>
  
  <div class="login_form">
    <div class="container">
      <div class="row">
          <div class="log-head">
            <h1 class="text-center">DELIVER YOUR PRODUCT</h1>
            <h2 class="text-center">WITH FAST DELIVERY</h2>
            <h3 style="font-weight: bolder;" class="text-center">ADMIN LOGIN PANEL</h3>
          </div>
        <div class="col-md-6">
        <div class="form">
            
            <?php if(isset($logError)) :?>
                <div class="error_masg"><p class="alert alert-danger text-center"> <?=$logError?></p></div>
            <?php endif; ?>
            <h1 class="text-center">LOGIN</h1>
            <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
              <label class="form-label" for="uname">User Name</label>
              <input class="form-control" type="text" name="uname">
              <label class="form-label" for="pass">Password</label>
              <input class="form-control" type="password" name="pass"><br>

              <button class="btn btn-sm btn-outline-dark logBtn" type="submit" name="login">LOGIN<i class="fa-solid fa-arrow-right-to-bracket ms-2"></i></button>
              <a class="btn btn-sm btn-outline-dark logBtn" href="merchant_login.php">Login as Merchant<i class="fa-solid fa-id-card ms-2"></i></i></a>
            </form>
                
        </div>
      </div>
        <div class="col-md-6">
            <div class="left_content">
                
                <?php if (isset($error)) :?>
                    <div class="error_masg"><p class="alert alert-danger text-center"> <?=$error?></p></div>
                 <?php endif; ?>
                
              <img class="img-fluid mt-5 ms-5" src="images/fastdelivery.png" alt="" width="100">
              <div class="right-head">
                <h1>FAST DELIVERY</h1>
                <h5>Deliver your Product with your well setisfiction</h5>
                <h4 class="mt-4">Before Login You Need To Ragistration Frist</h4>
              </div>
              <div class="mt-4">
                <button class="btn btn-sm btn-outline-dark" data-bs-toggle="modal" data-bs-target="#admn" type="submit" name="submit">Ragister As ADMIN<i class="fa-solid fa-id-card ms-2"></i></i></button>
              </div>

            <div class="modal fade" id="admn">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="d-block ms-auto me-auto">Ragistration As ADMIN</h5>
                    </div>
                    <div class="modal-body">
                        <form action="index1.php" method="POST" enctype="multipart/form-data">
                          <div class="col-md-12">
                              <label for="username" class="form-label">User Name</label>
                              <input type="text" class="form-control" name="username" />
                          </div>
                          <div class="col-md-12">
                              <label for="pass" class="form-label">User Password</label>
                              <input type="password" class="form-control" name="pass" />
                          </div>
                          <div class="col-md-12">
                              <label for="cPass" class="form-label">Confirm Password</label>
                              <input type="password" class="form-control" name="cPass" />
                          </div>
                          <div class="col-md-12">
                              <label for="email" class="form-label">Email</label>
                              <input type="email" class="form-control" name="email" />
                          </div>
                          <div class="col-md-12">
                              <label for="mobile" class="form-label">Mobile</label>
                              <input type="number" class="form-control" name="mobile" />
                          </div>
                          
                          
                          <div class="col-12 modal-footer">
                            <button type="submit" class="btn btn-outline-success" name="adminSign">Sign In</button>
                            <button type="button" class="btn btn-outline-danger"data-bs-dismiss="modal">Close</button>
                          </div>
                      </form>
                    </div>
                    </div>
                </div>
            </div>

            </div>
        </div>
      </div>
    </div>
  </div>
    <!-- Bootstrap.JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ"crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
  </body>
</html>