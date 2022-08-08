<?php require_once '../header.php';
    require_once '../connection.php';
    if(isset($_POST['submit'])){
        $iid = $_POST['iid'];
        $inv_id = $_POST['invoice_id'];
        $customer_id = $_POST['customer_id'];
        $package = $_POST['package'];
        $deliverydate = $_POST['deliverydate'];
        $deliverylocation = $_POST['deliverylocation'];
        $pickDate = $_POST['pickDate'];
        $picklocation = $_POST['picklocation'];
        $custoName = $_POST['custoName'];
        $custoPhone = $_POST['custoPhone'];
        $deliPerson = $_POST['deliveryname'];
        $deliStatus = $_POST['deliverystatus'];
        $collectSts = $_POST['collectionstatus'];
        $mpSts = $_POST['mpstatus'];
        $productname = $_POST['productname'];
        $unit_price = $_POST['price'];
        $qty = $_POST['qty'];
        $total = $_POST['productotal'];
        $sub_total = $_POST['sub_total'];
        $deliverycharge = $_POST['totaldeliverycharge'];
        $remarks = $_POST['remarks'];
        $grandtotal = $_POST['grandtotal'];
        $paidamount = $_POST['paidamount'];
        $duesamount = $_POST['duesamount'];
        foreach ($productname as $key => $productnames) {
            $prodName = $productname[$key];
            $uPrice = $unit_price[$key];
            $Qty = $qty[$key];
            $Total = $total[$key];
            $Iid=$iid[$key];
        
        $update_sql="UPDATE `customer_invoice` SET `customer_ID`='$customer_id',`package_id`='$package',`delivery_ID`='$deliPerson',`delivery_date`='$deliverydate',`delivery_location`='$deliverylocation',
        `picup_date`='$pickDate',`pickup_location`='$picklocation',`receiver_name`='$custoName',`receiver_phone`='$custoPhone',`remarks`='$remarks',`product_name`='$prodName',
        `qty`='$Qty',`price`='$uPrice',`total`='$Total',`subtotal`='$sub_total',`total_delivery_charge`='$deliverycharge',`grand_total`='$grandtotal',
        `paid_amount`='$paidamount',`dues_amount`='$duesamount',`delivery_status`='$deliStatus',`collection_status`='$collectSts',`marchant_payment_status`='$mpSts'
        WHERE `iid` = '$Iid'";
        // echo $update_sql; }
        // exit();
        $update_query= mysqli_query($link, $update_sql);
    }
        if($update_query){
         header("Location:invoice_table.php");
        }
        else{
            echo "Data not inserted";
        }
}  
?>

<div class="col-md-11 main-content">
    <div class="row">
      <div class="col-md-1"></div>
      <div class="col-md-10">
          <h2 class="text-left">Update Customer Invoice</h2>
        <form name="myform" action="<?=$_SERVER['PHP_SELF']?>" method="POST" enctype="multipart/form-data" class="row g-3" >
              <?php
                if(isset($_GET['editid'])){
                $editid=$_GET['editid'];
                 $sqlall="SELECT customer_invoice.iid,customer_invoice.invoice_id,customer_invoice.row_len,customer_invoice.delivery_date,customer_invoice.delivery_location,customer_invoice.picup_date,
                   customer_invoice.pickup_location,customer_invoice.receiver_name,customer_invoice.receiver_phone,
                   customer_invoice.remarks,customer_invoice.product_name,customer_invoice.qty,
                   customer_invoice.price,customer_invoice.total,customer_invoice.subtotal,
                   customer_invoice.total_delivery_charge,customer_invoice.grand_total,customer_invoice.paid_amount,
                   customer_invoice.dues_amount,customer_invoice.delivery_status,customer_invoice.collection_status,
                   customer_invoice.marchant_payment_status,customer.customer_name,package.package_name
                   FROM `customer_invoice` LEFT JOIN `customer` ON customer_invoice.customer_ID = customer.customer_id
                   LEFT JOIN `package` ON customer_invoice.package_id = package.package_id where customer_invoice.invoice_id=$editid";
                   
                $queryall=mysqli_query($link, $sqlall);
                $data=mysqli_fetch_assoc($queryall);
                // print_r($data);
                                
            }
        ?>
        <input type="hidden" class="form-control" name="invoice_id" value="<?php echo $data['invoice_id']?>"/>
        <input type="text" class="form-control" name="row_lenth" id="row_lenth" value="<?php echo $data['row_len']?>"/>
        
                <div class="col-md-6">
                    <label for="customer_id" class="form-label">Select Customer ID/Name</label>
                    <select class="form-select" name="customer_id">
                      <option selected>Customer Name</option>
                     <?php
                            $query = $link->query("SELECT * FROM `customer`");
                                if ($query->num_rows > 0) {
                                    while($cusdata = $query->fetch_assoc()){
                                        if ($cusdata['customer_name'] == $data['customer_name']) {
                                            $selected = "selected";
                                        } else $selected = "";
                                        echo "<option $selected value='{$cusdata['customer_id']}'>{$cusdata['customer_name']}</option>";
                                      }
                                    }
                             ?>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="package" class="form-label">Select A Package</label>
                    <select class="form-select" name="package" >
                      <option selected>Package</option>
                      <?php
                        $query = $link->query("SELECT * FROM package");
                            while($pacdata = $query->fetch_assoc()){
                                if ($pacdata['package_name'] == $data['package_name']) {
                                    $selected = "selected";
                                } else $selected = "";
                                    echo "<option $selected value='{$pacdata['package_id']}'>{$pacdata['package_name']}</option>";
                                }
                             ?>
                      
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="deliverydate" class="form-label">Delivery Date</label>
                    <input type="date" class="form-control" name="deliverydate" value="<?=$data['delivery_date']?>"/>
                </div>
                <div class="col-md-6">
                    <label for="deliverylocation" class="form-label">Delivery Location</label>
                    <input type="text" class="form-control" name="deliverylocation" value="<?=$data['delivery_location']?>"/>
                </div>
                <div class="col-md-6">
                    <label for="pickDate" class="form-label">Pickup Date</label>
                    <input type="date" class="form-control" name="pickDate" value="<?=$data['picup_date']?>"/>
                </div>
                <div class="col-md-6">
                    <label for="picklocation" class="form-label">Pickup Location</label>
                    <input type="text" class="form-control" name="picklocation" value="<?=$data['pickup_location']?>"/>
                </div>
                <div class="col-md-6">
                    <label for="custoName" class="form-label">Receiver Name</label>
                    <input type="text" class="form-control" name="custoName" value="<?=$data['receiver_name']?>"/>
                </div>
                <div class="col-md-6">
                    <label for="custoPhone" class="form-label">Receiver Phone</label>
                    <input type="number" class="form-control" name="custoPhone" value="<?=$data['receiver_phone']?>"/>
                </div>
                <div class="col-md-3">
                    <label for="deliveryname" class="form-label">Delivery Boys Name</label>
                    <select class="form-select" name="deliveryname" id="delivername">
                      <option selected value="0">Delivery Boys Name</option>
                        <?php
                            $sql="SELECT * FROM `delivery_person`";
                            $query= mysqli_query($link, $sql);
                            while($deliveryrow=mysqli_fetch_array($query)){
                        ?>
                        <option value="<?php echo $deliveryrow[0] ?>"><?php echo $deliveryrow[1] ?></option>
                    <?php } ?>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="deliverystatus" class="form-label">Delivery Status</label>
                    <input type="text" class="form-control" name="deliverystatus" value="<?=$data['delivery_status']?>"/>
                </div>
                <div class="col-md-3">
                    <label for="collectionstatus" class="form-label">Collection Status</label>
                    <input type="text" class="form-control" name="collectionstatus" value="<?=$data['collection_status']?>"/>
                </div>
                <div class="col-md-3">
                    <label for="mpstatus" class="form-label">Marchant Payment Status</label>
                    <input type="text" class="form-control" name="mpstatus" value="<?=$data['marchant_payment_status']?>"/>
                </div>
                <?php
                    $queryall=mysqli_query($link, $sqlall);
                    $rid = 0;
                    while($prod_data=mysqli_fetch_assoc($queryall)){
                    ?>
                       
                      <div class='row' id="added">
                     <div class='col-md-1 mt-5 ps-5'>
                         <button type="button" class='btn btn-outline-primary btn-sm ab' onclick="uInv_Append()"><i class='fa-solid fa-plus'></i></button>
                     </div>
                     <div class='col-md-1 mt-5 pe-5'>
                        <button type="button" class='btn btn-outline-danger btn-sm'><i class='fa-solid fa-minus'></i></button>
                     </div>
                     <div class='col-md-4 mt-3'>
                        <input type='hidden' class='form-control' name='iid[]' value="<?=$prod_data['iid']?>" />
                         <label for='productname' class='form-label'>Product Name</label>
                        <input type='text' class='form-control' name='productname[]' value="<?=$prod_data['product_name']?>" />
                     </div>
                     <div class='col-md-2 mt-3'>
                         <label for='price' class='form-label'>Price</label>
                         <input type='number' class='form-control' name='price[]' id='U_price<?=$rid+1?>' value="<?=$prod_data['price']?>" onkeyup="U_totalPrice(<?=$rid+1?>)"/>
                     </div>
                     <div class='col-md-2 mt-3'>
                         <label for='qty' class='form-label'>Quantity</label>
                         <input type='number' class='form-control' name='qty[]' id='U_qty<?=$rid+1?>' value='<?=$prod_data['qty']?>' onkeyup="U_totalPrice(<?=$rid+1?>)"/>
                     </div>
                     <div class='col-md-2 mt-3'>
                         <label for='total' class='form-label'>Total</label>
                         <input type='number' class='form-control U_totCount' name='productotal[]' id='U_total<?=$rid+1?>' value='<?=$prod_data['total']?>'/>
                     </div>
                 </div>
                   <?php $rid++; }
                ?>
                <div class="col-md-6"></div>
                
                <div class="col-md-3">
                    <label for="subtotal" class="form-label">Sub Total</label>
                    <input type="number" class="form-control" name="sub_total" id="U_sub_total"  value="<?=$data['subtotal']?>" onkeyup="U_totalPrice()"/>
                </div>
                <div class="col-md-3">
                    <label for="totaldeliverycharge"  class="form-label">Total Delivery Charge</label>
                    <input type="number" class="form-control" name="totaldeliverycharge" id="U_totaldeliverycharge" value="<?=$data['total_delivery_charge']?>"  onkeyup="U_totalPrice()"/>
                </div>
                <div class="col-md-6">
                    <label for="remarks" class="form-label">Remarks</label>
                    <textarea class="form-control" id="remarksid" name="remarks" rows="3" value="<?=$data['remarks']?>"></textarea>
                </div>
                <div class="col-md-6">
                    <label for="grandtotal" class="form-label">Grand Total</label>
                    <input type="number" class="form-control" name="grandtotal" id="U_grandtotal" value="<?=$data['grand_total']?>" onkeyup="U_totalPrice()"/>
                </div>
                <div class="col-md-6"></div>
                
                <div class="col-md-3">
                    <label for="paidamount" class="form-label">Paid Amount</label>
                    <input type="text" class="form-control" name="paidamount" id="U_paidamount" value="<?=$data['paid_amount']?>" onkeyup="U_totalPrice()"/>
                </div>
                 <div class="col-md-3">
                    <label for="duesamount" class="form-label">Dues Amount</label>
                    <input type="text" class="form-control" name="duesamount" id="U_duesamount" value="<?=$data['dues_amount']?>"/>
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

 <?php require_once "../footer.php"; ?>
 