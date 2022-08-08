<?php require_once "mrcn_header.php";
    require_once '../connection.php';
?>

<div class="col-md-11 main-content">
    <div class="row">
        <div class="col-md-12">
            <div class="deshheader">
                <h1>Merchant Information !</h1>
                <h5 class="ms-3">DESHBOARD / MERCHANT</h5>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <?php
                if (isset($_SESSION['mrchUname'])) {
                    $mrcn_name = $_SESSION['mrchUname'];
                    $sql="SELECT * FROM `marchant_info` WHERE `user_name`= '$mrcn_name'";
                    $query= $link->query($sql);
                    while($mrcnData = mysqli_fetch_array($query)){
            ?>
            <a data-bs-toggle="modal" data-bs-target="#order" href="merchant_order_form.php" class="btn btn-outline-dark ms-3">CREATE CUSTOMER <i class="fa-solid fa-pen-to-square ms-2"></i></a>
            <?php
                require_once 'merchant_order_form.php';
            ?>
            <table class="table table-light table-hover text-center table-bordered mt-3">
            <thead>
                <tr>
                    <th class="table-dark" colspan="2">MERCHANT INFORMATIONS</th>
                </tr>
            </thead>
            <tbody>
            
            <tr>
                <th>MERCHANT NAME</th>
                <td><?=$mrcnData['marchant_name'];?></td>
            </tr>
            <tr>
                <th>User Name</th>
                <td><?=$mrcnData['user_name'];?></td>
            </tr>
            <tr>
                <th>Merchant E-mail</th>
                <td><?=$mrcnData['email'];?></td>
            </tr>
            <tr>
                <th>Merchant Mobile</th>
                <td><?=$mrcnData['phone'];?></td>
            </tr>
            <tr>
                <th>Merchant Bank Account</th>
                <td><?=$mrcnData['marchant_bank_account'];?></td>
            </tr>
                <?php
                  }
                    
                }    
                ?>
        </tbody>
        <tfoot>
            <tr>
                <td class="table-danger" colspan="2">THINK BEFORE YOU UPDATE YOUR COMPANY INFORMATION</td>
            </tr>
        </tfoot>
    </table>
        </div>
    </div>
</div>
 <?php require_once "../footer.php"; ?>