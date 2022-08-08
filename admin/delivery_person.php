<?php require_once "../header.php";
        require_once "../connection.php";

    if(isset($_GET['deleteid'])){
        $deleteid=$_GET['deleteid'];
        $sql="DELETE FROM `delivery_person` WHERE `delivery_id`='$deleteid'";
        $query= mysqli_query($link, $sql);
        header("Location:delivery_person.php");
    }
?>
<div class="col-md-11 main-content">
    <div class="row">
        <div class="col-md-12">
            <div class="deshheader">
                <h1>Delivery person information</h1>
                <h5 class="ms-3">DESHBOARD / DELIVERY BOYES</h5>
            </div>
        </div>
    </div>
        <div class="row ">
            <div class="col-md-12 g-0">
                <h3 class="text-center">Delivery Persons Data</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <a data-bs-toggle="modal" data-bs-target="#formid" href="#" class="btn btn-outline-dark"><i class="fa-solid fa-file-circle-plus"></i> ADD DELIVARY PERSON</a>
                <?php
                    require_once 'deliver_person_form.php';
                ?>
                <a href="#" class="btn btn-outline-dark"><i class="fa-solid fa-dumpster"></i> bin DATA</a>
                <div class="table-responsive">
                <table class="table table-light table-hover text-center table-bordered mt-4">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Designation</th>
                            <th>Mobile</th>
                            <th>Email</th>
                            <th>Present Address</th>
                            <th>National ID</th>
                            <th>Picture</th>
                            <th>Creation Date</th>
                            <th colspan="2">ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody>
                         <?php 
                                $x=1;
                                $sql="SELECT * FROM delivery_person";
                                $query= mysqli_query($link, $sql);
                                while($row=mysqli_fetch_array($query)){
                                ?>
                        <tr>
                            <td><?php echo $x++; ?></td>
                            <td><?php echo $row['name']?></td>
                            <td><?php echo $row['designation']?></td>
                            <td><?php echo $row['mobile']?></td>
                            <td><?php echo $row['email']?></td>
                            <td><?php echo $row['present_address']?></td>
                            <td><?php echo $row['national_id']?></td>
                            <td><img src="deliveryPersonImg/<?=$row['picture']?>" alt="" width="50"></td>
                            <td><?php echo $row['creation_date']?></td>
                            <td>
                                <a class="btn btn-outline-success btn-sm" href="delivery_person_edit.php?edit=<?php echo $row['delivery_id']?>"><i class="fa-solid fa-pen-to-square"></i></a>
                                <a class="btn btn-outline-danger btn-sm" href="delivery_person.php?deleteid=<?php echo $row['delivery_id']?>"><i class="fa-solid fa-trash-can"></i></a>
                            </td>
                        </tr>
                        <?php
                            }
                        
                        ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="10">THEY DELIVER YOUR PRODUCTS SAFELY</td>
                        </tr>
                    </tfoot>
                </table>
            </div> 
        </div>
    </div>
</div>
<?php require_once "../footer.php"; ?>