<?php require_once "../header.php";
        require_once "../connection.php";

?>
<div class="col-md-11 main-content">
    <div class="row">
        <div class="col-md-12">
            <div class="deshheader">
                <h1>REPORTS</h1>
                <h5 class="ms-3">DESHBOARD / MANAGE REPORT</h5>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-12 g-0">
            <h3 class="text-center">Report Information</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="report_list">
                <ul class="nav nav-pills mb-3">
                  <li class="nav-item me-2">
                    <button class="rep-btn nav-link" data-bs-toggle="pill" data-bs-target="#inv_rep" type="button">INVOICE REPORT</button>
                  </li>
                  <li class="nav-item me-2">
                    <button class="rep-btn nav-link" data-bs-toggle="pill" data-bs-target="#marc_rep" type="button">DELIVERY STATUS REPORT</button>
                  </li>
                  <li class="nav-item me-2">
                    <button class="rep-btn nav-link" data-bs-toggle="pill" data-bs-target="#mpay_rep" type="button">MARCHENT PAYMENT REPORT</button>
                  </li>
                  <li class="nav-item me-2">
                    <button class="rep-btn nav-link" data-bs-toggle="pill" data-bs-target="#mnam_rep" type="button">MARCHENT REPORT</button>
                  </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                  <div class="tab-pane fade show active" id="inv_rep">
                      <div class="row">
                        <div class="col-md-8 g-0">
                            <form class="ms-3" action="<?php $_SERVER['PHP_SELF']?>" method="POST">
                                <div class="row">
                                    <div class="col input-group mb-3">
                                      <span class="input-group-text">Start Date</span>
                                      <input type="text" class="form-control datepicker" name="start_date" placeholder="Select Start Date">
                                    </div>
                                    <div class="col input-group mb-3">
                                      <span class="input-group-text">End Date</span>
                                      <input type="text" class="form-control datepicker" name="end_date" placeholder="select end date">
                                    </div>
                                    <div class="col">
                                        <button type="submit" name="search" class="btn btn-sm btn-outline-dark">SEARCH</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                            <table class="table table-light table-hover text-center table-bordered mt-4 display" id="table_id">
                                <thead>
                                    <tr>
                                        <th>SL NO</th>
                                        <th>MERCHANT NAME</th>
                                        <th>DELIVERY NAME</th>
                                        <th>PACKAGE NAME</th>
                                        <th>DELIVERY DATE</th>
                                        <th>DELIVERY LOCATION</th>
                                        <th>RECIVER NAME</th>
                                        <th>RECIVER PHONE</th>
                                        <th>PRODUCT NAME</th>
                                        <th>QTY</th>
                                        <th>PRICE</th>
                                        <th>TOTAL</th>
                                        <th>PAID AMOUNT</th>
                                        <th>DUES AMOUNT </th>
                                    </tr>
                                </thead>
                                <tbody>
                                     <?php if(isset($_POST['search'])){
                                            $start_date=date('Y-m-d', strtotime($_POST['start_date']));
                                            $end_date=date('Y-m-d', strtotime($_POST['end_date']));
                                            $sql="SELECT marchant_info.marchant_name,delivery_person.name,package.package_name,
                                            customer_invoice.delivery_date,customer_invoice.delivery_location,customer_invoice.receiver_name,customer_invoice.receiver_phone,
                                            customer_invoice.product_name,customer_invoice.qty,customer_invoice.price,customer_invoice.total,
                                            customer_invoice.paid_amount,customer_invoice.dues_amount
                                            FROM `customer_invoice` LEFT JOIN `marchant_info` ON customer_invoice.marchant_ID = marchant_info.marchant_id 
                                            LEFT JOIN `delivery_person` ON customer_invoice.delivery_ID = delivery_person.delivery_id
                                            LEFT JOIN `package` ON customer_invoice.package_id = package.package_id WHERE `delivery_date` BETWEEN '$start_date' AND '$end_date'";
                                            // echo $sql;
                                            // exit();
                                            $x = 1;
                                            $query = mysqli_query($link, $sql);
                                            while($row=mysqli_fetch_array($query)){
                                        ?>
                                    <tr>
                                        <td><?=$x++?></td>
                                        <td><?=$row['marchant_name']?></td>
                                        <td><?=$row['name']?></td>
                                        <td><?=$row['package_name']?></td>
                                        <td><?=$row['delivery_date']?></td>
                                        <td><?=$row['delivery_location']?></td>
                                        <td><?=$row['receiver_name']?></td>
                                        <td><?=$row['receiver_phone']?></td>
                                        <td><?=$row['product_name']?></td>
                                        <td><?=$row['qty']?></td>
                                        <td><?=$row['price']?></td>
                                        <td><?=$row['total']?></td>
                                        <td><?=$row['paid_amount']?></td>
                                        <td><?=$row['dues_amount']?></td>
                                    </tr>
                                    <?php
                                        }
                                     }
                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="14">THEY DELIVER YOUR PRODUCTS SAFELY</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div> 
                    </div>
                </div>
                  </div>
                  
                  <div class="tab-pane fade mt-5" id="marc_rep">
                      <div class="row">
                        <div class="col-md-8 g-0">
                            <form class="ms-3" action="<?php $_SERVER['PHP_SELF']?>" method="POST">
                                <div class="row">
                                    <div class="col input-group mb-3">
                                      <span class="input-group-text">Delivery Status</span>
                                      <input type="text" class="form-control" name="status" placeholder="Status">
                                    </div>
                                    <div class="col">
                                        <button type="submit" name="search1" class="btn btn-sm btn-outline-dark">SEARCH</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <h2>Delivery Status Report</h2>
                            <table class="table table-light table-hover text-center table-bordered mt-4 display" id="table_id">
                                <thead>
                                    <tr>
                                        <th>SL NO</th>
                                        <th>DELIVERY NAME</th>
                                        <th>DELIVERY STATUS</th>
                                        <th>PACKAGE NAME</th>
                                        <th>DELIVERY DATE</th>
                                        <th>DELIVERY LOCATION</th>
                                        <th>RECIVER NAME</th>
                                        <th>RECIVER PHONE</th>
                                        <th>PRODUCT NAME</th>
                                        <th>QTY</th>
                                        <th>PRICE</th>
                                        <th>TOTAL</th>
                                        <th>PAID AMOUNT</th>
                                        <th>DUES AMOUNT </th>
                                    </tr>
                                </thead>
                                <tbody>
                                     <?php if(isset($_POST['search1'])){
                                            $status=$_POST['status'];
                                            $sql="SELECT delivery_person.name,customer_invoice.delivery_status,package.package_name,
                                            customer_invoice.delivery_date,customer_invoice.delivery_location,customer_invoice.receiver_name,customer_invoice.receiver_phone,
                                            customer_invoice.product_name,customer_invoice.qty,customer_invoice.price,customer_invoice.total,
                                            customer_invoice.paid_amount,customer_invoice.dues_amount
                                            FROM `customer_invoice` LEFT JOIN `delivery_person` ON customer_invoice.delivery_ID = delivery_person.delivery_id
                                            LEFT JOIN `package` ON customer_invoice.package_id = package.package_id WHERE `delivery_status` = '$status'";
                                            // echo $sql;
                                            // exit();
                                            $x = 1;
                                            $query= mysqli_query($link, $sql);
                                            while($del_rep=mysqli_fetch_array($query)){
                                        ?>
                                    <tr>
                                        <td><?=$x++?></td>
                                        <td><?=$del_rep['name']?></td>
                                        <td><?=$del_rep['delivery_status']?></td>
                                        <td><?=$del_rep['package_name']?></td>
                                        <td><?=$del_rep['delivery_date']?></td>
                                        <td><?=$del_rep['delivery_location']?></td>
                                        <td><?=$del_rep['receiver_name']?></td>
                                        <td><?=$del_rep['receiver_phone']?></td>
                                        <td><?=$del_rep['product_name']?></td>
                                        <td><?=$del_rep['qty']?></td>
                                        <td><?=$del_rep['price']?></td>
                                        <td><?=$del_rep['total']?></td>
                                        <td><?=$del_rep['paid_amount']?></td>
                                        <td><?=$del_rep['dues_amount']?></td>
                                    </tr>
                                    <?php
                                        }
                                     }
                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="14">THEY DELIVER YOUR PRODUCTS SAFELY</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div> 
                    </div>
                </div>
                  </div>
                  
                  <div class="tab-pane fade" id="mpay_rep">
                    <div class="row">
                        <div class="col-md-8 g-0">
                            <form class="ms-3" action="<?php $_SERVER['PHP_SELF']?>" method="POST">
                                <div class="row">
                                    <div class="col input-group mb-3">
                                      <span class="input-group-text">Payment Status</span>
                                      <input type="text" class="form-control" name="mpay_sts" placeholder="Status">
                                    </div>
                                    <div class="col">
                                        <button type="submit" name="search2" class="btn btn-sm btn-outline-dark">SEARCH</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <h2>Merchant Payment Report</h2>
                            <table class="table table-light table-hover text-center table-bordered mt-4 display" id="table_id">
                                <thead>
                                    <tr>
                                        <th>SL NO</th>
                                        <th>DELIVERY NAME</th>
                                        <th>MERCHANT PAYMENT STATUS</th>
                                        <th>DELIVERY DATE</th>
                                        <th>DELIVERY LOCATION</th>
                                        <th>RECIVER NAME</th>
                                        <th>RECIVER PHONE</th>
                                        <th>PRODUCT NAME</th>
                                        <th>QTY</th>
                                        <th>PRICE</th>
                                        <th>TOTAL</th>
                                        <th>PAID AMOUNT</th>
                                        <th>DUES AMOUNT </th>
                                    </tr>
                                </thead>
                                <tbody>
                                     <?php if(isset($_POST['search2'])){
                                            $mpay_sts=$_POST['mpay_sts'];
                                            $sql="SELECT delivery_person.name,customer_invoice.marchant_payment_status,
                                            customer_invoice.delivery_date,customer_invoice.delivery_location,customer_invoice.receiver_name,customer_invoice.receiver_phone,
                                            customer_invoice.product_name,customer_invoice.qty,customer_invoice.price,customer_invoice.total,
                                            customer_invoice.paid_amount,customer_invoice.dues_amount
                                            FROM `customer_invoice` LEFT JOIN `delivery_person` ON customer_invoice.delivery_ID = delivery_person.delivery_id
                                            WHERE `marchant_payment_status` = '$mpay_sts'";
                                            // echo $sql;
                                            // exit();
                                            $x = 1;
                                            $query= mysqli_query($link, $sql);
                                            while($mpay_rep=mysqli_fetch_array($query)){
                                        ?>
                                    <tr>
                                        <td><?=$x++?></td>
                                        <td><?=$mpay_rep['name']?></td>
                                        <td><?=$mpay_rep['marchant_payment_status']?></td>
                                        <td><?=$mpay_rep['delivery_date']?></td>
                                        <td><?=$mpay_rep['delivery_location']?></td>
                                        <td><?=$mpay_rep['receiver_name']?></td>
                                        <td><?=$mpay_rep['receiver_phone']?></td>
                                        <td><?=$mpay_rep['product_name']?></td>
                                        <td><?=$mpay_rep['qty']?></td>
                                        <td><?=$mpay_rep['price']?></td>
                                        <td><?=$mpay_rep['total']?></td>
                                        <td><?=$mpay_rep['paid_amount']?></td>
                                        <td><?=$mpay_rep['dues_amount']?></td>
                                    </tr>
                                    <?php
                                        }
                                     }
                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="14">THEY DELIVER YOUR PRODUCTS SAFELY</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div> 
                    </div>
                </div>
                  </div>
                  
                  <div class="tab-pane fade" id="mnam_rep">
                    <div class="row">
                        <div class="col-md-8 g-0">
                            <form class="ms-3" action="<?php $_SERVER['PHP_SELF']?>" method="POST">
                                <div class="row">
                                    <div class="col input-group mb-3">
                                      <span class="input-group-text">Marchent Report</span>
                                      <input type="text" class="form-control" id="mName" name="mName" placeholder="Type name here">
                                    </div>
                                    <div class="col">
                                        <button type="submit" name="search3" class="btn btn-sm btn-outline-dark">SEARCH</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <h2>Merchant Name Report</h2>
                            <table class="table table-light table-hover text-center table-bordered mt-4 display" id="table_id">
                                <thead>
                                    <tr>
                                        <th>SL NO</th>
                                        <th>DELIVERY NAME</th>
                                        <th>MERCHANT Name</th>
                                        <th>DELIVERY DATE</th>
                                        <th>DELIVERY LOCATION</th>
                                        <th>RECIVER NAME</th>
                                        <th>RECIVER PHONE</th>
                                        <th>PRODUCT NAME</th>
                                        <th>QTY</th>
                                        <th>PRICE</th>
                                        <th>TOTAL</th>
                                        <th>PAID AMOUNT</th>
                                        <th>DUES AMOUNT </th>
                                    </tr>
                                </thead>
                                <tbody>
                                     <?php if(isset($_POST['search3'])){
                                            $mName=$_POST['mName'];
                                            $sql="SELECT delivery_person.name,marchant_info.marchant_name,
                                            customer_invoice.delivery_date,customer_invoice.delivery_location,customer_invoice.receiver_name,customer_invoice.receiver_phone,
                                            customer_invoice.product_name,customer_invoice.qty,customer_invoice.price,customer_invoice.total,
                                            customer_invoice.paid_amount,customer_invoice.dues_amount
                                            FROM `customer_invoice` LEFT JOIN `delivery_person` ON customer_invoice.delivery_ID = delivery_person.delivery_id
                                            LEFT JOIN `marchant_info` ON customer_invoice.marchant_ID = marchant_info.marchant_id 
                                            WHERE `marchant_name` = '$mName'";
                                            // echo $sql;
                                            // exit();
                                            $x = 1;
                                            $query= mysqli_query($link, $sql);
                                            while($MN_row=mysqli_fetch_array($query)){
                                        ?>
                                    <tr>
                                        <td><?=$x++?></td>
                                        <td><?=$MN_row['name']?></td>
                                        <td><?=$MN_row['marchant_name']?></td>
                                        <td><?=$MN_row['delivery_date']?></td>
                                        <td><?=$MN_row['delivery_location']?></td>
                                        <td><?=$MN_row['receiver_name']?></td>
                                        <td><?=$MN_row['receiver_phone']?></td>
                                        <td><?=$MN_row['product_name']?></td>
                                        <td><?=$MN_row['qty']?></td>
                                        <td><?=$MN_row['price']?></td>
                                        <td><?=$MN_row['total']?></td>
                                        <td><?=$MN_row['paid_amount']?></td>
                                        <td><?=$MN_row['dues_amount']?></td>
                                    </tr>
                                    <?php
                                        }
                                     }
                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="14">THEY DELIVER YOUR PRODUCTS SAFELY</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div> 
                    </div>
                </div>
                  </div>
                  
                </div>
            </div>
        </div>
    </div>
</div>

<script type=text/javascript>
    $(document).ready(function(){
    $('#mName').autocomplete({
        alert(mname);
        source:'marchent_name_report.php',
        minlength:2,
        delay:500
    })
})
</script>
<?php require_once "../footer.php"; ?>