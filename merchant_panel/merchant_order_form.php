<?php

if(isset($_POST['submit'])){
    $mrcn_id = $_SESSION['mrchId'];
    $customer_name=$_POST['customer_name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $address=$_POST['address'];
    $payment_method=$_POST['payment_method'];
    $sql="INSERT INTO `customer`(`customer_name`, `email`, `phone`, `address`, `payment_method`, `merchant_id`) VALUES ('$customer_name','$email','$phone','$address','$payment_method','$mrcn_id')";
    
    // echo $sql;
    // exit();
    $query= mysqli_query($link, $sql);
    if($query){
     header("Location:mrcn_customer.php");
    }
    else{
        echo "Data not inserted";
    }
}
?>

<div  class="modal fade" id="order">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="d-block ms-auto me-auto">Please Add Customer Information</h5>
            </div>
            <div class="modal-body">
                <form action="<?=$_SERVER['PHP_SELF']?>" method="POST" enctype="multipart/form-data" class="row g-3">
                    <div class="col-md-12">
                        <label for="customer_name" class="form-label">Customer Name</label>
                        <input type="text" class="form-control" name="customer_name" value="" />
                    </div>
                    <div class="col-md-12">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" value="" />
                    </div>
                    <div class="col-md-12">
                        <label for="phone" class="form-label">phone</label>
                        <input type="number" class="form-control" name="phone" value="" />
                    </div>
                    <div class="col-md-12">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" name="address" value="" />
                    </div>
                    <div class="col-md-12">
                        <select class="form-select" name="payment_method">
                          <option selected>Payment Method</option>
                          <option value="Cash On">Cash On Delivery</option>
                          <option value="Bikas">Bikas</option>
                          <option value="Nagad">Nagad</option>
                        </select>
                    </div>
                   <div class="col-12 modal-footer">
                        <button type="submit" name="submit" class="btn btn-outline-success">SUBMIT</button>
                        <button type="button" class="btn btn-outline-danger"data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>      
        </div>
    </div>
</div>