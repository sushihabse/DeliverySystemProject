<?php
require_once "../header.php";
require_once '../connection.php';

if(isset($_GET['deleteid'])){
    $deleteid=$_GET['deleteid'];
    $sql="DELETE FROM `customer` WHERE `customer_id`='$deleteid'";
    $query= mysqli_query($link, $sql);
    header("Location:customer_info.php");
}
 ?>
    <div class="col-md-11 main-content">
        <div class="row">
            <div class="col-md-12">
                <div class="deshheader">
                    <h1>Customer information!</h1>
                    <h5 class="ms-3">DESHBOARD / CUSTOMERS</h5>
                </div>
            </div>
        </div>
        <div class="row ">
            <div class="col-md-12 g-0">
                <h3 class="display-6 text-center">Customers Data</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <a href="customer_form.php" data-bs-toggle="modal" data-bs-target="#formid" class="btn btn-outline-dark"><i class="fa-solid fa-file-circle-plus"></i> ADD NEW CUSTOMER</a>
                <?php
                    require_once 'customer_form.php';
                ?>
                <a href="deleted_data.php" class="btn btn-outline-dark"><i class="fa-solid fa-dumpster"></i> bin DATA</a>
                <table class="table table-light table-hover text-center table-bordered mt-4">
                    <thead>
                        <tr>
                            <th>Customer ID</th>
                            <th>Customer Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Payment Method</th>
                            <th>Merchant ID</th>
                            <th colspan="2">ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody>
                         <?php 
                                $x=1;
                                $sql="SELECT * FROM `customer`";
                                $query= mysqli_query($link, $sql);
                                while($row=mysqli_fetch_array($query)){
                                ?>
                        <tr>
                            <td><?php echo $x++; ?></td>
                            <td><?php echo $row[1]?></td>
                            <td><?php echo $row[2]?></td>
                            <td><?php echo $row[3]?></td>
                            <td><?php echo $row[4]?></td>
                            <td><?php echo $row[5]?></td>
                            <td><?php echo $row[6]?></td>
                            
                            <td>
                                <a class="btn btn-outline-success btn-sm" href="customer_edit.php?edit=<?php echo $row[0]?>"><i class="fa-solid fa-pen-to-square"></i></a>
                               
                                <a class="btn btn-outline-danger btn-sm" href="customer_info.php?deleteid=<?php echo $row[0]?>"><i class="fa-solid fa-trash-can"></i></a>
                            </td>
                            
                            
                        </tr>
                        <?php
                            }
                        
                        ?>
                    </tbody>
                    
                    <tfoot>
                        <tr>
                            <td colspan="8">CUSTOMER SETISFICTION IS OUR FIRST PRIORITY</td>
                        </tr>
                    </tfoot>
                </table>
        </div>
    </div>
</div>

<?php require_once "../footer.php"; ?>