<?php require_once "../header.php";
    require_once '../connection.php';
?>

<div class="col-md-11 main-content">
    <div class="row">
        <div class="col-md-12">
            <div class="deshheader">
                <h1>Company Information !</h1>
                <h5 class="ms-3">DESHBOARD / COMPANY SETTINGS</h5>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <?php
                $sql="SELECT * FROM `companysettings`";
                $query= $link->query($sql);
                while($compData=$query->fetch_array()){
            ?>
            <a class="btn btn-outline-dark ms-3" href="company_setting.php?editComp=<?=$compData['company_id']?>">EDIT COMPANY INFORMATION<i class="fa-solid fa-pen-to-square ms-2"></i></a>
            <table class="table table-light table-hover text-center table-bordered mt-3">
            <thead>
                <tr>
                    <th class="table-dark" colspan="2">COMPANY INFORMATIONS</th>
                </tr>
            </thead>
            <tbody>
            
            <tr>
                <th>COMPANY NAME</th>
                <td><?=$compData['company_name']?></td>
            </tr>
            <tr>
                <th>COMPANY ADDRESS</th>
                <td><?=$compData['address']?></td>
            </tr>
            <tr>
                <th>COMPANY E-mail</th>
                <td><?=$compData['email']?></td>
            </tr>
            <tr>
                <th>COMPANY CONTACT</th>
                <td><?=$compData['phone']?></td>
            </tr>
            <tr>
                <th>COMPANY LOGO</th>
                <td><img src="companyLogo/<?=$compData['logo']?>" alt="" width="200"></td>
            </tr>
                <?php
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