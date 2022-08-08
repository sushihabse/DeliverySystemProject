<?php require_once "../header.php";
    require_once '../connection.php';
    
    if (isset($_POST['update'])) {
        $compId = $_POST['companyId'];
        $Cname = $_POST['companyname'];
        $address = $_POST['address'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];

        if (!empty($_FILES['newlogo']['name'])) {
            $file_name = $_FILES['newlogo']['name'];
            $file_tmpname = $_FILES['newlogo']['tmp_name'];
            $file_type = $_FILES['newlogo']['type'];
            $file_size = $_FILES['newlogo']['size'];
            $file_ext = explode('.', $file_name);
            $file_extention = strtolower(end($file_ext));
            $extentions = ["jpeg","jpg","png"];
            $file_name = substr($file_name,0,8).".".$file_extention;
        } else {
            $file_name = $_POST['oldlogo'];
            $file_tmpname = $_FILES['newlogo']['tmp_name'];
            $file_type = $_FILES['newlogo']['type'];
            $file_size = $_FILES['newlogo']['size'];
            $file_ext = explode('.', $file_name);
            $file_extention = strtolower(end($file_ext));
            $extentions = ["jpeg","jpg","png"];
            $file_name = substr($file_name,0,8).".".$file_extention;
        }
        // echo $file_size;
        
        if (isset($_FILES['newlogo'])) {
        if (in_array($file_extention,$extentions)) {
            if ($file_size < 548576) {
                  $query = $link->query("UPDATE `companysettings` SET `company_name`='$Cname',`address`='$address',`email`='$email',`phone`='$phone',`logo`='$file_name' WHERE `company_id`='$compId'");
                  if ($query) {
                      move_uploaded_file($file_tmpname,"companyLogo/".$file_name);
                      header("Location:companyData.php");
                  } else $errors[] = "Somthing is wrong Data Not Updated";
            } else $errors[] = "File size need to lower then 500KB";
        } else $errors[] = "Need to be Select jpg,jpeg or png file.";
    }
    }
    
?>

<div class="col-md-11 main-content">
    <div class="row">
        <div class="col-md-12">
            <div class="deshheader">
                <h1>Update Company informatin form!</h1>
                <h5 class="ms-3">DESHBOARD / COMPANY SETTINGS / UPDATE COMPANY INFORMATION</h5>
            </div>
        </div>
    </div>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8 pt-4 mt-4">
            <h2 class="text-center text-info">Company Setting</h2>
            <h3 class="text-center text-primary">Update Your Company Information</h3>
            <?php
                if (isset($_GET['editComp'])) {
                    $id = $_GET['editComp'];
                    $query = $link->query("SELECT * FROM `companysettings` WHERE `company_id` = $id");
                    while ($comp_data = $query->fetch_assoc()) {
            ?>
           <form action="<?=$_SERVER['PHP_SELF']?>" method="POST" enctype="multipart/form-data" class="row g-3">
               <input type="hidden" class="form-control" name="companyId" value="<?=$comp_data['company_id']?>"/>
               <div class="col-md-6">
                    <label for="companyname" class="form-label">Company Name</label>
                    <input type="text" class="form-control" name="companyname" value="<?=$comp_data['company_name']?>"/>
                </div>
                <div class="col-md-6">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control" name="address" value="<?=$comp_data['address']?>"/>
                </div>
                <div class="col-md-6">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" value="<?=$comp_data['email']?>"/>
                </div>
                <div class="col-md-6">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="number" class="form-control" name="phone" value="<?=$comp_data['phone']?>"/>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="logo" class="form-label">Logo/Favicon</label>
                        <input type="file" class="form-control" name="newlogo" />
                        <input type="hidden" class="form-control" name="oldlogo" value="<?=$comp_data['logo']?>"/>
                    </div>
                    <div class="col-md-6">
                        <img src="companyLogo/<?=$comp_data['logo']?>" alt="" width="200">
                    </div>
                </div>
                <div class="col-12 ms-auto">
                    <button type="submit" name="update" class="btn btn-primary">UPDATE COMPANY INFORMATION</button>
                </div>
                </form>
         <?php
                }
            }
         ?>
            <div class="col-md-2"></div>
        </div>
    </div>
</div>
 <?php require_once "../footer.php"; ?>