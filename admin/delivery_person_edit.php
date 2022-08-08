<?php require_once "../header.php";
    require_once '../connection.php';
    
    if(isset($_GET['edit'])){
        $editid=$_GET['edit'];
        
        $sql="SELECT * FROM `delivery_person` WHERE `delivery_id` = $editid";
        $query=mysqli_query($link, $sql);
        $data=mysqli_fetch_assoc($query);
    }
    
    if (isset($_POST['update'])) {
        $deliId = $_POST['id'];
        $Dname = $_POST['name'];
        $designation = $_POST['designation'];
        $phone = $_POST['mobile'];
        $email = $_POST['email'];
        $Paddress = $_POST['presentAddress'];
        $nationalid = $_POST['nationalid'];

        if (!empty($_FILES['newdelipic']['name'])) {
            $file_name = $_FILES['newdelipic']['name'];
            $file_tmpname = $_FILES['newdelipic']['tmp_name'];
            $file_type = $_FILES['newdelipic']['type'];
            $file_size = $_FILES['newdelipic']['size'];
            $file_ext = explode('.', $file_name);
            $file_extention = strtolower(end($file_ext));
            $extentions = ["jpeg","jpg","png"];
            $file_name = substr($Dname,0,8).".".$file_extention;
        } else {
            $file_name = $_POST['olddelipic'];
            $file_tmpname = $_FILES['newdelipic']['tmp_name'];
            $file_type = $_FILES['newdelipic']['type'];
            $file_size = $_FILES['newdelipic']['size'];
            $file_ext = explode('.', $file_name);
            $file_extention = strtolower(end($file_ext));
            $extentions = ["jpeg","jpg","png"];
            $file_name = substr($Dname,0,8).".".$file_extention;
        }
        // echo $file_size;
        
        if (isset($_FILES['newdelipic'])) {
        if (in_array($file_extention,$extentions)) {
            if ($file_size < 548576) {
                  $query = $link->query("UPDATE `delivery_person` SET `name`='$Dname',`designation`='$designation',`mobile`='$phone',`email`='$email',`present_address`='$Paddress',`national_id`='$nationalid',`picture`='$file_name' WHERE `delivery_id`='$deliId'");
                  if ($query) {
                      move_uploaded_file($file_tmpname,"deliveryPersonImg/".$file_name);
                      header("Location:delivery_person.php");
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
                <h1>Update Delivery person information</h1>
                <h5 class="ms-3">DESHBOARD / DELIVERY BOYES / EDIT</h5>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h3 class="text-center">Edit information</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <form action="<?=$_SERVER['PHP_SELF']?>" method="POST" enctype="multipart/form-data" class="row g-3">
                <input type="hidden" name="id" value="<?php echo $data['delivery_id']?>"/>
                <div class="col-md-6">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" value="<?php echo $data['name']?>" />
                </div>
                <div class="col-md-6">
                    <label for="designation" class="form-label">Designation</label>
                    <select class="form-select mb-3" name="designation">
                        <option value="Bike Delivery Boy">Bike Delivery Boy</option>
                        <option value="Cycle Delivery Boy">Cycle Delivery Boy</option>
                        <?php
                            $query = $link->query("SELECT * FROM delivery_person");
                                if ($query->num_rows > 0) {
                                    if($delidata = $query->fetch_assoc()){
                                        if ($delidata['designation'] == $data['designation']) {
                                            $selected = "selected";
                                        } else $selected = "";
                                        echo "<option $selected value='{$delidata['designation']}'>{$delidata['designation']}</option>";
                                      }
                                    }
                             ?>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="mobile" class="form-label">Mobile</label>
                    <input type="number" class="form-control" name="mobile" value="<?php echo $data['mobile']?>" />
                </div>
                <div class="col-md-6">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" value="<?php echo $data['email']?>" />
                </div>
                <div class="col-md-6">
                    <label for="presentAddress" class="form-label">Present Address</label>
                    <input type="text" class="form-control" name="presentAddress" value="<?php echo $data['present_address']?>" />
                </div>
                <div class="col-md-6">
                    <label for="nationalid" class="form-label">National ID</label>
                    <input type="number" class="form-control" name="nationalid" value="<?php echo $data['national_id']?>" />
                </div>
                <div class="col-md-6">
                    <label for="delipic" class="form-label">National ID</label>
                    <input type="hidden" class="form-control" name="olddelipic" value="<?php echo $data['picture']?>" />
                    <input type="file" class="form-control" name="newdelipic" value="" />
                </div>
                <div class="col-md-6">
                        <img src="deliveryPersonImg/<?=$data['picture']?>" alt="" width="120">
                    </div>
                <div class="col-md-12">
                    <button type="submit" name="update" class="btn btn-outline-primary">UPDATE</button>
                </div>
            </form>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>
  <?php require_once "../footer.php"; ?>       