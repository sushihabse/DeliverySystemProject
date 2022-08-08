<?php require_once "../header.php";
        require_once "../connection.php";

    if(isset($_GET['deleteid'])){
        $deleteid=$_GET['deleteid'];
        $sql="DELETE FROM `marchant_info` WHERE `marchant_id`='$deleteid'";
        $query= mysqli_query($link, $sql);
        header("Location:merchant_info.php");
    }
?>
<div class="col-md-11 main-content">
    <div class="row">
        <div class="col-md-12">
            <div class="deshheader">
                <h1>Merchant Information</h1>
                <h5 class="ms-3">DESHBOARD / MARCHANTS</h5>
            </div>
        </div>
    </div>
        <div class="row ">
            <div class="col-md-12 g-0">
                <h3 class="text-center">Merchants Data</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <a href="#" class="btn btn-outline-dark"><i class="fa-solid fa-file-circle-plus"></i> SUBMIT ORDER</a>
                
                <a href="#" class="btn btn-outline-dark"><i class="fa-solid fa-dumpster"></i> bin DATA</a>
                <div class="table-responsive">
                <table class="table table-light table-hover text-center table-bordered mt-4">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>User Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Bank Account</th>
                            <th>Account Status</th>
                            <th colspan="2">ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody>
                         <?php 
                                $x=1;
                                $sql="SELECT * FROM `marchant_info`";
                                $query= mysqli_query($link, $sql);
                                while($row=mysqli_fetch_array($query)){
                                ?>
                        <tr>
                            <td><?=$x++; ?></td>
                            <td><?=$row['marchant_name']?></td>
                            <td><?=$row['user_name']?></td>
                            <td><?=$row['email']?></td>
                            <td><?=$row['phone']?></td>
                            <td><?=$row['marchant_bank_account']?></td>
                            <td><?=$row['status']?></td>
                            <td>
                                <?php
                                    if(isset($_GET['active'])){
                                        $activeId=$_GET['active'];
                                        $sql="UPDATE `marchant_info` SET `status`= 1 WHERE `marchant_id` = '$activeId'";
                                        $query= mysqli_query($link, $sql);
                                        header("Location:merchant_info.php");
                                    }elseif(isset($_GET['deactive'])){
                                        $activeId=$_GET['deactive'];
                                        $sql="UPDATE `marchant_info` SET `status`= 0 WHERE `marchant_id` = '$activeId'";
                                        $query= mysqli_query($link, $sql);
                                        header("Location:merchant_info.php");
                                    }
                                    if($row['status'] == 1){
                                        echo "<a type='submit' name='active' class='btn btn-outline-danger btn-sm' href='merchant_info.php?deactive={$row['0']}'><i class='fa-solid fa-xmark'></i></a>";
                                    } else {
                                        echo "<a type='submit' name='deactive' class='btn btn-outline-success btn-sm' href='merchant_info.php?active={$row['0']}'><i class='fa-solid fa-check'></i></a>";
                                    }
                                ?>
                                <a class="btn btn-outline-success btn-sm" href="merchant_edit.php?edit=<?php echo $row['0']?>"><i class="fa-solid fa-pen-to-square"></i></a>
                                <a class="btn btn-outline-danger btn-sm" href="merchant_info.php?deleteid=<?php echo $row['0']?>"><i class="fa-solid fa-trash-can"></i></a>
                                
                            </td>
                        </tr>
                        <?php
                            }
                            
                        ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="8">DELIVER YOUR PRODUCT WITH A GOOD SATICFICTION</td>
                        </tr>
                    </tfoot>
                </table>
            </div> 
        </div>
    </div>
</div>
<?php require_once "../footer.php"; ?>