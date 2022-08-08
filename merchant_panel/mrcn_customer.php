<?php require_once "mrcn_header.php";
    require_once '../connection.php';
?>

<div class="col-md-11 main-content">
    <div class="row">
        <div class="col-md-12">
            <div class="deshheader">
                <h1>Customer information</h1>
                <h5 class="ms-3">DESHBOARD / Merchant / Customer</h5>
            </div>
        </div>
    </div>
        <div class="row ">
            <div class="col-md-12 g-0">
                <h3 class="text-center">Customer Data</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <a data-bs-toggle="modal" data-bs-target="#order" href="merchant_order_form.php" class="btn btn-outline-dark ms-3">CREATE CUSTOMER <i class="fa-solid fa-pen-to-square ms-2"></i></a>
            <?php
                require_once 'merchant_order_form.php';
            ?>
            <div class="table-responsive">
                <table class="table table-light table-hover text-center table-bordered mt-4">
                    <thead>
                        <tr>
                            <th>Customer ID</th>
                            <th>Customer Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Payment method</th>
                            <!--<th colspan="2">ACTIONS</th>-->
                        </tr>
                    </thead>
                    <tbody>
                         <?php 
                                $x=1;
                                $mrcnId = $_SESSION['mrchId'];
                                $sql="SELECT * FROM `customer` WHERE `merchant_id` = '$mrcnId'";
                                $query= mysqli_query($link, $sql);
                                while($row=mysqli_fetch_array($query)){
                                ?>
                        <tr>
                            <td><?php echo $x++; ?></td>
                            <td><?php echo $row['customer_name']?></td>
                            <td><?php echo $row['email']?></td>
                            <td><?php echo $row['phone']?></td>
                            <td><?php echo $row['address']?></td>
                            <td><?php echo $row['payment_method']?></td>
                            <!--<td>-->
                            <!--    <a class="btn btn-outline-success btn-sm" href="mrcn_customer_edit.php?edit=<?php echo $row['customer_id']?>"><i class="fa-solid fa-pen-to-square"></i></a>-->
                            <!--    <a class="btn btn-outline-danger btn-sm" href="delivery_person.php?deleteid=<?php echo $row['customer_id']?>"><i class="fa-solid fa-trash-can"></i></a>-->
                            <!--</td>-->
                        </tr>
                        <?php
                            }
                        
                        ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="6">Customer information</td>
                        </tr>
                    </tfoot>
                </table>
            </div> 
        </div>
    </div>
</div>
<?php require_once "../footer.php"; ?>