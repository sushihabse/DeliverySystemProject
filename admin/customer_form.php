<?php

if(isset($_POST['submit'])){
    $customer_name=$_POST['customer_name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $address=$_POST['address'];
    $payment_method=$_POST['payment_method'];
    $mrcnId=$_POST['mrcnId'];
    $sql="INSERT INTO `customer`(`customer_name`, `email`, `phone`, `address`, `payment_method`, `merchant_id`) VALUES ('$customer_name','$email','$phone','$address','$payment_method','$mrcnId')";
    
    // echo $sql;
    // exit();
    $query= mysqli_query($link, $sql);
    if($query){
        header ("location:customer_info.php");
        // echo "data inserted";
    }
    else{
        echo "Data not inserted";
    }
}
?>

    <div  class="modal fade" id="formid">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
                <h5 class="d-block ms-auto me-auto">Please Add Your information</h5>
            </div>
            <div class="modal-body">
                <form action="#" method="POST" enctype="multipart/form-data" class="row g-3 text-center">
                    <h2 class="text-center text-info">Customer Table</h2>
                    
                     <div class="col-md-6">
                         <label for="customer_name" class="form-label">Customer Name</label>
                         <input type="text" class="form-control" name="customer_name" />
                     </div>
                     
                     <div class="col-md-6">
                         <label for="email" class="form-label">Email</label>
                         <input type="email" class="form-control" name="email" />
                     </div>
                     <div class="col-md-6">
                         <label for="phone" class="form-label">Phone</label>
                         <input type="number" class="form-control" name="phone" />
                     </div>
                     <div class="col-md-6">
                         <label for="address" class="form-label">Address</label>
                         <input type="text" class="form-control" name="address" />
                     </div>
                     <div class="col-md-6">
                         <label for="payment_method" class="form-label">Payment Method</label>
                         <input type="text" class="form-control" name="payment_method" />
                     </div>
                     <div class="col-md-6">
                         <label for="mrcnId" class="form-label">Merchant ID</label>
                         <input type="text" class="form-control" name="mrcnId" />
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