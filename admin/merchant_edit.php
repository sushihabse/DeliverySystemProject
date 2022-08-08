<?php require_once "../header.php";
        require_once '../connection.php';

if(isset($_GET['edit'])){
    $editid=$_GET['edit'];
    
    $sql="SELECT * FROM `marchant_info` WHERE `marchant_id` = $editid";
    $query=mysqli_query($link, $sql);
    $data=mysqli_fetch_assoc($query);
  }
  if(isset($_POST['update'])){
        $marchant_id=$_POST['marchant_id'];
        $marchant_name=$_POST['marchant_name'];
        $user_name=$_POST['user_name'];
        $email=$_POST['email'];
        $phone=$_POST['phone'];
        $marchant_bank_account=$_POST['marchant_bank_account'];
        $status=$_POST['status'];
        $sql1="UPDATE `marchant_info` SET `marchant_name`='$marchant_name',`user_name`='$user_name',`email`='$email',`phone`='$phone',`marchant_bank_account`='$marchant_bank_account',`status`='$status' WHERE `marchant_id`='$marchant_id'";
        // echo $sql1;
        // exit();
        if(mysqli_query($link, $sql1)==true){
            header("Location:merchant_info.php");
        }
        else{
            echo "Data not updated";
        }
    
  }
  
?>

    <div class="col-md-11 main-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="deshheader">
                        <h1>Customer Information</h1>
                        <h5 class="ms-3">DESHBOARD / CUSTOMERS / EDIT</h5>
                    </div>
                </div>
            </div>
            <div class="row">
            	<div class="col-md-12">
            	    <h2 class="text-center text-info">Online Delivery System</h2>
                    <h3 class="text-center text-success">Edit Customers Data</h3>
            	</div>
           </div>
           <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
               <form action="<?=$_SERVER['PHP_SELF']?>" method="POST" enctype="multipart/form-data" class="row g-3">
               
                <input type="hidden" name="marchant_id" value="<?php echo $data['marchant_id']?>"/>
               
                <div class="col-md-6">
                    <label for="marchant_name" class="form-label">marchant_name</label>
                    <input type="text" class="form-control" name="marchant_name" value="<?php echo $data['marchant_name']?>" />
                </div>
                <div class="col-md-6">
                    <label for="user_name" class="form-label">user_name</label>
                    <input type="text" class="form-control" name="user_name" value="<?php echo $data['user_name']?>" />
                </div>
                <div class="col-md-6">
                    <label for="email" class="form-label">email</label>
                    <input type="email" class="form-control" name="email" value="<?php echo $data['email']?>" />
                </div>
                <div class="col-md-6">
                    <label for="phone" class="form-label">phone</label>
                    <input type="number" class="form-control" name="phone" value="<?php echo $data['phone']?>" />
                </div>
                <div class="col-md-6">
                    <label for="marchant_bank_account" class="form-label">marchant_bank_account</label>
                    <input type="text" class="form-control" name="marchant_bank_account" value="<?php echo $data['marchant_bank_account']?>" />
                </div>
                <div class="col-md-6">
                    <label for="status" class="form-label">status</label>
                    <input type="number" class="form-control" name="status" value="<?php echo $data['status']?>" />
                </div>
                <div class="col-md-1">
                    <button type="submit" name="update" class="btn btn-outline-primary">UPDATE</button>
                </div>
                
            </form> 
            </div>
            <div class="col-md-2"></div>
           </div>
         
         
         
    </div>
<?php require_once "../footer.php"; ?>