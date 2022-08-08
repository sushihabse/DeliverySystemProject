<?php require_once "../header.php";
        require_once '../connection.php';

if(isset($_GET['edit'])){
    $editid=$_GET['edit'];
    
    $sql="SELECT * FROM `customer` WHERE `customer_id` = $editid";
    $query=mysqli_query($link, $sql);
    $data=mysqli_fetch_assoc($query);
  }
  
  if(isset($_POST['update'])){
        $customer_id=$_POST['id'];
        $customer_name=$_POST['customer_name'];
        $email=$_POST['email'];
        $phone=$_POST['phone'];
        $address=$_POST['address'];
        $payment_method=$_POST['payment_method'];
        $mrcnId=$_POST['mrcnId'];
        $sql1="UPDATE `customer` SET `customer_name`='$customer_name',`email`='$email',`phone`=$phone,`address`='$address',`payment_method`='$payment_method',`merchant_id`='$mrcnId' WHERE `customer_id`='$customer_id'";
        // echo $sql1;
        // exit();
        if(mysqli_query($link, $sql1)==true){
            header("location:customer_info.php");
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
               <form action="#" method="POST" enctype="multipart/form-data" class="row g-3">
               
                <input type="hidden" name="id" value="<?php echo $data['customer_id']?>"/>
               
                <div class="col-md-6">
                    <label for="customer_name" class="form-label">Customer Name</label>
                    <input type="text" class="form-control" name="customer_name" value="<?php echo $data['customer_name']?>" />
                </div>
                <div class="col-md-6">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" value="<?php echo $data['email']?>" />
                </div>
                <div class="col-md-6">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="number" class="form-control" name="phone" value="<?php echo $data['phone']?>" />
                </div>
                <div class="col-md-6">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control" name="address" value="<?php echo $data['address']?>" />
                </div>
                <div class="col-md-6">
                    <label for="payment_method" class="form-label">Payment Method</label>
                    <input type="text" class="form-control" name="payment_method" value="<?php echo $data['payment_method']?>" />
                </div>
                <div class="col-md-6">
                    <label for="mrcnId" class="form-label">Merchant ID</label>
                    <input type="text" class="form-control" name="mrcnId" value="<?php echo $data['merchant_id']?>" />
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