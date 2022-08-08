<?php require_once "../header.php";
        require_once "../connection.php";

?>
<div class="col-md-11 main-content">
    <div class="row">
        <div class="col-md-12">
            <div class="deshheader">
                <h1>Marchent & Customer Invoice</h1>
                <h5 class="ms-3">DESHBOARD / MARCHANTS / CUSTOMER INVOICE</h5>
            </div>
        </div>
    </div>
        <div class="row">
            <div class="col-md-12 g-0">
                <h3 class="text-center">Invoice Information</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                <table class="table table-light table-hover text-center table-bordered mt-4 display" id="table_id">
                    <thead>
                        <tr>
                            <th colspan="3">ACTIONS</th>
                            <th>INVOICE ID</th>
                            <th>CUSTOMER NAME</th>
                            <th>MERCHANT NAME</th>
                            <th>DELIVERY NAME</th>
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
                            <th colspan="2">DELIVERY STATUS ACTIONS</th>
                            <th colspan="2">COLLECTION STATUS ACTIONS</th>
                            <th>M-P STATUS</th>
                            <th>MERCHANT PAYMENT ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody>
                         <?php 
                                $x=1;
                                $p=1;
                                $d=1;
                                $c=1;
                                $m=1;
                                $sql="SELECT customer_invoice.invoice_id,customer_invoice.delivery_date,customer_invoice.delivery_location,customer_invoice.picup_date,
                                customer_invoice.pickup_location,customer_invoice.receiver_name,customer_invoice.receiver_phone,
                                customer_invoice.remarks,customer_invoice.product_name,customer_invoice.qty,
                                customer_invoice.price,customer_invoice.total,customer_invoice.subtotal,
                                customer_invoice.total_delivery_charge,customer_invoice.grand_total,customer_invoice.paid_amount,
                                customer_invoice.dues_amount,customer_invoice.delivery_status,customer_invoice.collection_status,
                                customer_invoice.marchant_payment_status,customer.customer_name,marchant_info.marchant_name,delivery_person.name,
                                delivery_person.email,delivery_person.mobile,package.package_price
                                FROM `customer_invoice` LEFT JOIN `customer` ON customer_invoice.customer_ID = customer.customer_id
                                LEFT JOIN `marchant_info` ON customer_invoice.marchant_ID = marchant_info.marchant_id 
                                LEFT JOIN `delivery_person` ON customer_invoice.delivery_ID = delivery_person.delivery_id
                                LEFT JOIN `package` ON customer_invoice.package_id = package.package_id";
                                
                                // echo $sql;
                                // exit();
                                $query= mysqli_query($link, $sql);
                                while($row=mysqli_fetch_array($query)){
                                ?>
                        <tr>
                            <td>
                                <a class="btn btn-outline-success btn-sm" href="invoice_edit.php?editid=<?php echo $row['invoice_id']?>"><i class="fa-solid fa-pen-to-square"></i></a>
                            </td>
                            <td>
                                <button type="button" class="btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteid" id="<?php echo $row['invoice_id']?>" onclick="delid(id)" ><i class="fa-solid fa-trash-can"></i></button>
                            </td>
                            <td>
                                <a class="btn btn-outline-dark btn-sm" href="invoice.php?print=<?=$row['invoice_id']?>"><i class="fa-solid fa-file-invoice"></i></a>
                            </td>
                            <td><?=$row['invoice_id']?></td>
                            <td><?=$row['customer_name']?></td>
                            <td><?=$row['marchant_name']?></td>
                            <td>
                            <select name="deliveryname" id="delivername<?php echo $p++?>" onchange="deliverPerson(id,'<?=$row['invoice_id']?>')">
                                <option selected>Delivery Boys Name</option>
                                <?php
                                    $query1= $link->query("SELECT * FROM delivery_person");
                                    while($deliveryrow=mysqli_fetch_array($query1)){
                                        if ($deliveryrow['name'] == $row['name']) {
                                        $selected = "selected";
                                    } else $selected = ""; 
                                   echo "<option $selected value='{$deliveryrow['0']}'>{$deliveryrow['1']}</option>";
                                 } 
                                 ?>
                                </select>
                                
                            </td>
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
                            <td>
                            <select id="deliverstatus<?=$d++?>" onchange="deliverStatus(id,'<?=$row['invoice_id']?>')">
                                <option selected>Delivery Status</option>
                                <option value="On Going">On Going</option>
                                <option value="On Transport">On Transport</option>
                                <option value="Pending">Pending</option>
                                
                            </select>
                            </td>
                            <td style="color:blue" id="colstatus"><?=$row['collection_status']?></td>
                            <td>
                                <select id="collectionstatus<?=$c++?>" onchange="collectionStatus(id,'<?=$row['invoice_id']?>')">
                                    <option selected>Collection Status</option>
                                    <option value="Awaiting">Awaiting</option>
                                    <option value="Pending">Pending</option>
                                    <option value="On Going">On Going</option>
                                    <option value="Okay">Okay</option>
                                </select>
                            </td>
                            <td style="color:purple"><?=$row['marchant_payment_status']?></td>
                            <td>
                                <select id="marchant_payment_status<?=$m++?>" onchange="marchantpaymentstatus(id,'<?=$row['invoice_id']?>')">
                                    <option selected>marchant payment status</option>
                                    <option value="Paid">Paid</option>
                                    <option value="Not Paid">Not Paid</option>
                                    <option value="Awaiting">Awaiting</option>
                                </select>
                            </td>
                        </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td class="text-center" colspan="31">THEY DELIVER YOUR PRODUCTS SAFELY</td>
                        </tr>
                    </tfoot>
                </table>
            <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
            <div class="modal fade " id="deleteid">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                    <div class="modal-body">
                    <h5 class="modal-title text-center">Do You want to Delete it?</h5>
                    <input type="hidden" class="form-control" name="delete_id" id="delete_id">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-dark btn-sm" onclick="deletdata()">YES</button>
                        <button type="button" class="btn btn-outline-danger btn-sm" data-bs-dismiss="modal">NO</button>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
            </div> 
        </div>
    </div>
</div>
<?php require_once "../footer.php"; ?>