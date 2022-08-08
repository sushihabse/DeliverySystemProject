<?php
  session_start();
  require_once "connection.php";
  if(isset($_SESSION['mrchUname'])){
    header("Location:merchant_panel/dashboard.php");
    }
  if (isset($_POST['mrcntSign'])) {
    $name = $_POST['mrcnName'];
    $mrcnUname = $_POST['muName'];
    $mrcnPass = $_POST['pass'];
    $mrcnCpass = $_POST['cPass'];
    $mrcnEmail = $_POST['email'];
    $mrcnMobile = $_POST['mobile'];
    $mrcnBankacnt = $_POST['bankaccount'];

    if (isset($mrcnUname) && !empty($mrcnUname)) {
      $ckuName = $link->query("SELECT * FROM `marchant_info` WHERE `marchant_name` = '$mrcnUname'");
      if ($ckuName->num_rows == 0) {
        if (isset($mrcnPass) && !empty($mrcnPass)) {
          if (strlen($mrcnPass) > 7 ) {
            if ($mrcnPass == $mrcnCpass) {
              $mrcnPass = md5($mrcnPass);
                $query = $link->query("INSERT INTO `marchant_info`(`marchant_name`, `user_name`, `password`, `email`,`phone`, `marchant_bank_account`) VALUES ('$name','$mrcnUname','$mrcnPass','$mrcnEmail','$mrcnMobile','$mrcnBankacnt')");
                if ($query) {
                    header("Location:merchant_login.php");
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
      $chekUser = $link->query("SELECT * FROM `marchant_info` WHERE `user_name` = '$userName'");
      if ($chekUser->num_rows > 0) {
        $mrcnData = $chekUser->fetch_assoc();
        if ($mrcnData['password'] == $password) {
            if($mrcnData['status'] == 1){
                $_SESSION['mrchUname'] = $mrcnData['user_name'];
                $_SESSION['mrchId'] = $mrcnData['marchant_id'];
                $_SESSION['mrcnStatus'] = $mrcnData['status'];
                header("Location:merchant_panel/dashboard.php"); 
            } else $logError = "You are Not Eligible";
        } else $logError = "Password Incorrect";
      } else $logError = "User Name Incorrect";
    } else $logError = "Fill Up the Login Field";
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/login.css">
  </head>
  <body>
  
  <div class="mrcn_login">
    <div class="container">
      <div class="row">
          <div class="log-head">
            <h1 class="text-center">DELIVER YOUR PRODUCT</h1>
            <h2 class="text-center">WITH FAST DELIVERY</h2>
            <h3 style="font-weight: bolder;" class="text-center">MERCHANT LOGIN PANEL</h3>
          </div>
        <div class="col-md-6">
        <div class="form">
            <?php if (isset($logError)) :?>
                <div class="error_masg"><p class="alert alert-danger text-center"> <?=$logError?></p></div>
            <?php endif; ?>
            <h1 class="text-center">LOGIN</h1>
            <form action="merchant_login.php" method="post">
              <label class="form-label" for="uname">User Name</label>
              <input class="form-control" type="text" name="uname">
              <label class="form-label" for="pass">Password</label>
              <input class="form-control" type="password" name="pass"><br>

              <button class="btn btn-sm btn-outline-dark logBtn" type="submit" name="login">LOGIN<i class="fa-solid fa-arrow-right-to-bracket ms-2"></i></button>
              <a class="btn btn-sm btn-outline-dark logBtn" href="index.php">Login as Admin<i class="fa-solid fa-id-card ms-2"></i></i></a>
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
                <button class="btn btn-sm btn-outline-dark" data-bs-toggle="modal" data-bs-target="#merc" type="submit" name="submit">Ragister As Merchent<i class="fa-solid fa-id-card ms-2"></i></i></button>
              </div>

              <div class="modal fade" id="merc">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="d-block ms-auto me-auto">Ragistration As Merchent</h5>
                    </div>
                    <div class="modal-body">
                      <form action="merchant_login.php" method="POST">
                        <div class="col-md-12">
                              <label for="mrcnName" class="form-label">Merchent Name</label>
                              <input type="text" class="form-control" name="mrcnName" />
                          </div>
                          <div class="col-md-12">
                              <label for="muName" class="form-label">User Name</label>
                              <input type="text" class="form-control" name="muName" />
                          </div>
                          <div class="col-md-12">
                              <label for="pass" class="form-label">Password</label>
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
                              <input type="number" class="form-control" name="mobile"/>
                          </div>
                          <div class="col-md-12">
                              <label for="bankaccount" class="form-label">Marchant Bank Account</label>
                              <input type="text" class="form-control" name="bankaccount" />
                          </div>
                          <div class="col-12 modal-footer">
                            <button type="submit" class="btn btn-outline-success" name="mrcntSign">Sign In</button>
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