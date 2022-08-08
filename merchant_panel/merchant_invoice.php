<?php require_once "mrcn_header.php";
        require_once "../connection.php";

?>
<div class="col-md-11 main-content">
    <div class="row">
        <div class="col-md-12">
            <div class="deshheader">
                <h1>Customer Invoice</h1>
                <h5 class="ms-3">DESHBOARD / CUSTOMER ORDER</h5>
            </div>
        </div>
    </div>
        <div class="row">
            <div class="col-md-12 g-0">
                <h3 class="text-center">Order Information</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                <table class="table table-light table-hover text-center table-bordered mt-4 display" id="table_id">
                    <thead>
                        <tr>
                            <th>INVOICE ID</th>
                            <th>CUSTOMER NAME</th>
                            <th>PACKAGE NAME</th>
                            <th>DELIVERY DATE</th>
                            <th>DELIVERY LOCATION</th>
                            <th>PICKUP DATE</th>
                            <th>RECIVER NAME</th>
                            <th>RECIVER PHONE</th>
                            <th>REMARKS</th>
                            <th>PRODUCT NAME</th>
                            <th>QTY</th>
                            <th>PRICE</th>
                            <th>TOTAL</th>
                            <th>SUBTOTAL</th>
                            <th>DELIVERY CHARGE</th>
                            <th>GRAND TOTAL</th>
                            <th>PAID AMOUNT</th>
                            <th>DUES AMOUNT </th>
                            <th>DELIVERY STATUS ACTIONS</th>
                            <th>COLLECTION STATUS</th>
                            <th>MERCHANT PAYMENT STATUS</th>
                        </tr>
                    </thead>
                    <tbody>
                         <?php
                                $sql="SELECT customer_invoice.invoice_id,customer_invoice.delivery_date,customer_invoice.delivery_location,customer_invoice.picup_date,
                                customer_invoice.pickup_location,customer_invoice.receiver_name,customer_invoice.receiver_phone,
                                customer_invoice.remarks,customer_invoice.product_name,customer_invoice.qty,
                                customer_invoice.price,customer_invoice.total,customer_invoice.subtotal,
                                customer_invoice.total_delivery_charge,customer_invoice.grand_total,customer_invoice.paid_amount,
                                customer_invoice.dues_amount,customer_invoice.delivery_status,customer_invoice.collection_status,
                                customer_invoice.marchant_payment_status,customer.customer_name,package.package_price
                                FROM `customer_invoice` LEFT JOIN `customer` ON customer_invoice.customer_ID = customer.customer_id
                                LEFT JOIN `package` ON customer_invoice.package_id = package.package_id WHERE `marchant_ID`= {$_SESSION['mrchId']}";
                                
                                // echo $sql;
                                // exit();
                                $query= mysqli_query($link, $sql);
                                while($row=mysqli_fetch_array($query)){
                                ?>
                        <tr>
                            <td><?=$row['invoice_id']?></td>
                            <td><?=$row['customer_name']?></td>
                            <td><?=$row['package_price']?></td>
                            <td><?=$row['delivery_date']?></td>
                            <td><?=$row['delivery_location']?></td>
                            <td><?=$row['picup_date']?></td>
                            <td><?=$row['receiver_name']?></td>
                            <td><?=$row['receiver_phone']?></td>
                            <td><?=$row['remarks']?></td>
                            <td><?=$row['product_name']?></td>
                            <td><?=$row['qty']?></td>
                            <td><?=$row['price']?></td>
                            <td><?=$row['total']?></td>
                            <td><?=$row['subtotal']?></td>
                            <td><?=$row['total_delivery_charge']?></td>
                            <td><?=$row['grand_total']?></td>
                            <td><?=$row['paid_amount']?></td>
                            <td><?=$row['dues_amount']?></td>
                            <td  style="color:green" id="delStatus"><?=$row['delivery_status']?></td>
                            <td style="color:blue" id="colstatus"><?=$row['collection_status']?></td>
                            <td style="color:purple"><?=$row['marchant_payment_status']?></td>
                        </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="21">THEY DELIVER YOUR PRODUCTS SAFELY</td>
                        </tr>
                    </tfoot>
                </table>
            </div> 
        </div>
    </div>
</div>
<?php require_once "../footer.php"; ?>