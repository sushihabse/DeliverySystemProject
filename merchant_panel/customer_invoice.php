<?php require_once "mrcn_header.php";
    require_once '../connection.php';
    
    if(isset($_POST['submit'])){
        $invoice_id = $_POST['invoice_id'];
        $rowLen = $_POST['rowlenth'];
        $mrcn_id = $_SESSION['mrchId'];
        $customer_id = $_POST['customer_id'];
        $package = $_POST['package'];
        $deliverydate = $_POST['deliverydate'];
        $deliverylocation = $_POST['deliverylocation'];
        $pickDate = $_POST['pickDate'];
        $picklocation = $_POST['picklocation'];
        $custoName = $_POST['custoName'];
        $custoPhone = $_POST['custoPhone'];
        $remarks = $_POST['remarks'];
        
        
        $productname = $_POST['productname'];
        $unit_price = $_POST['price'];
        $qty = $_POST['qty'];
        $total = $_POST['productotal'];
        $sub_total = $_POST['sub_total'];
        $deliverycharge = $_POST['totaldeliverycharge'];
        $grandtotal = $_POST['grandtotal'];
        $paidamount = $_POST['paidamount'];
        $duesamount = $_POST['duesamount'];
        foreach ($productname as $key => $productnames) {
            // echo $productnames."-".$unit_price[$key] ;
            $prodName = $productname[$key];
            $uPrice = $unit_price[$key];
            $Qty = $qty[$key];
            $Total = $total[$key];
            $sql="INSERT INTO `customer_invoice`(`invoice_id`,`row_len`,
                `customer_ID`, `marchant_ID`, 
                `package_id`, `delivery_date`, `delivery_location`, 
                `picup_date`, `pickup_location`, `receiver_name`, 
                `receiver_phone`, `remarks`, `product_name`, 
                `qty`, `price`, `total`, `subtotal`, 
                `total_delivery_charge`, `grand_total`, `paid_amount`, 
                `dues_amount`)
                VALUES (
                '$invoice_id','$rowLen','$customer_id','$mrcn_id','$package','$deliverydate',
                '$deliverylocation','$pickDate','$picklocation',
                '$custoName','$custoPhone','$remarks','$prodName','$Qty',
                '$uPrice','$Total','$sub_total','$deliverycharge','$grandtotal',
                '$paidamount','$duesamount')";
                // echo $sql;
                $query= mysqli_query($link, $sql);
                }
                if($query){
                 header("Location:merchant_invoice.php");
                }
                else{
                    echo "Data not inserted";
            }
    }
?>
<body onload="max_id_increment()">
<div class="col-md-11 main-content">
    <div class="row">
      <div class="col-md-1"></div>
      <div class="col-md-10">
        <h2 class="text-left">Customer Invoice</h2>
        <h2 class="text-left">SUBMIT YOUR ORDER</h2>
        <form name="myform" action="<?=$_SERVER['PHP_SELF']?>" method="POST" enctype="multipart/form-data" class="row g-3" >
            <input type="hidden" name="rowlenth" id="rowlenth" value="1" />
              <input type="hidden" name="invoice_id" id="invoice_id" />
                <div class="col-md-6">
                    <label for="package" class="form-label">Select Customer ID/Name</label>
                    <select class="form-select" name="customer_id">
                      <option selected>Customer Name</option>
                      <?php
                            $mrcnId = $_SESSION['mrchId'];
                            $sql="SELECT * FROM `customer` WHERE `merchant_id` = '$mrcnId'";
                            $query= mysqli_query($link, $sql);
                            while($row=mysqli_fetch_array($query)){
                            echo "<option value='{$row['customer_id']}'>{$row['customer_name']}</option>";
                        }
                    ?>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="package" class="form-label">Select A Package</label>
                    <select class="form-select" name="package" id="package" onchange="package_list();" >
                      <option selected>Package</option>
                      <?php
                            $sql="SELECT * FROM `package`";
                            $query= mysqli_query($link, $sql);
                            while($packagerow=mysqli_fetch_array($query)){
                            echo "<option value='{$packagerow['package_id']}'>{$packagerow['package_name']}</option>";
                        }
                    ?>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="deliverydate" class="form-label">Delivery Date</label>
                    <input type="date" class="form-control" name="deliverydate" />
                </div>
                <div class="col-md-6">
                    <label for="deliverylocation" class="form-label">Delivery Location</label>
                    <input type="text" class="form-control" name="deliverylocation" />
                </div>
                <div class="col-md-6">
                    <label for="pickDate" class="form-label">Pickup Date</label>
                    <input type="date" class="form-control" name="pickDate" />
                </div>
                <div class="col-md-6">
                    <label for="picklocation" class="form-label">Pickup Location</label>
                    <input type="text" class="form-control" name="picklocation" />
                </div>
                <div class="col-md-6">
                    <label for="custoName" class="form-label">Customer Name</label>
                    <input type="text" class="form-control" name="custoName" />
                </div>
                <div class="col-md-6">
                    <label for="custoPhone" class="form-label">Customer Phone</label>
                    <input type="number" class="form-control" name="custoPhone" />
                </div>
               <?php $x=1;?>
                <div class="row" id="abc">
                    <div class="col-md-1 mt-5 ps-5">
                        <button type="button" class="btn btn-outline-primary btn-sm" id="ab" onclick="inv_Append()"><i class="fa-solid fa-plus"></i></button>
                    </div>
                    <div class="col-md-1 mt-5 pe-5">
                        <button type="button" class="btn btn-outline-danger btn-sm" id="bc"><i class="fa-solid fa-minus"></i></button>
                    </div>
                    <div class="col-md-4 mt-2">
                        <label for="productname" class="form-label">Product Name</label>
                        <input type="text" class="form-control" id="productname" name="productname[]" />
                    </div>
                    <div class="col-md-2 mt-2">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" class="form-control" name="price[]" id="unit_price1" onkeyup="totalPrice(1)" />
                    </div>
                    <div class="col-md-2 mt-2">
                        <label for="qty" class="form-label">Quantity</label>
                        <input type="number" class="form-control" name="qty[]" id="qty1" onkeyup="totalPrice(1)" />
                    </div>
                    <div class="col-md-2 mt-2">
                        <label for="total" class="form-label">Total</label>
                        <input type="number" class="form-control totCount" name="productotal[]" id="total1"/>
                    </div>
                </div>
                <div class="col-md-6"></div>
                
                <div class="col-md-3">
                    <label for="subtotal" class="form-label">Sub Total</label>
                    <input type="number" class="form-control" name="sub_total" id="sub_total" onkeyup="totalPrice()"/>
                </div>
                <div class="col-md-3">
                    <label for="totaldeliverycharge"  class="form-label">Total Delivery Charge</label>
                    <input type="number" class="form-control" id="totaldeliverycharge" name="totaldeliverycharge" onkeyup="totalPrice()"/>
                </div>
                <div class="col-md-6">
                    <label for="remarks" class="form-label">Remarks</label>
                    <textarea class="form-control" id="remarksid" name="remarks" rows="3"></textarea>
                </div>
                <div class="col-md-6">
                    <label for="grandtotal" class="form-label">Grand Total</label>
                    <input type="number" class="form-control" name="grandtotal" id="grandtotal"  value="" onkeyup="totalPrice()"/>
                </div>
                <div class="col-md-6"></div>
                
                <div class="col-md-3">
                    <label for="paidamount" class="form-label">Paid Amount</label>
                    <input type="text" class="form-control" name="paidamount" id="paidamount" value="" onkeyup="totalPrice()"/>
                </div>
                 <div class="col-md-3">
                    <label for="duesamount" class="form-label">Dues Amount</label>
                    <input type="text" class="form-control" name="duesamount" id="duesamount" value=""/>
                </div>
                
                <div class="col-6 ms-auto"></div>
                <div class="col-6 ms-auto">
                    <button type="submit" name="submit" class="btn btn-primary ms-auto">Submit</button>
                </div>
            </form>
      </div>
      <div class="col-md-1"></div>
    </div>
</div>
</body>
<script src="../js/ckeditor.js"></script>
<script>
    ClassicEditor.create( document.querySelector( '#remarksid' ) )
        .catch( error => {
            console.error( error );
        });
        var editor = CKEDITOR.replace( 'editor1' );
CKFinder.setupCKEditor( editor );
</script>
 <?php require_once "../footer.php"; ?>
 
 