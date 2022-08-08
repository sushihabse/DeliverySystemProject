<?php
require_once 'connection.php';

if(isset($_GET['deleteid'])){
    $deleteid=$_GET['deleteid'];
    $sql="DELETE FROM `package` WHERE `package_id`='$deleteid'";
    $query= mysqli_query($link, $sql);
    header("Location:package_view.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD APPLICATION</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Flex:opsz,wght@8..144,200;8..144,300;8..144,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    
    <div class="container-fluid">
        <div class="row ">
            <div class="col-md-12 g-0">
                <h1 class="display-5 text-center">package information</h1>
                <h3 class="display-6 text-center">package table</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <a data-bs-toggle="modal" data-bs-target="#formid" href="deliver_person_form.php" class="btn btn-outline-dark"><i class="fa-solid fa-file-circle-plus"></i> ADD DATA</a>
                <a href="deleted_data.php" class="btn btn-outline-dark"><i class="fa-solid fa-dumpster"></i> bin DATA</a>
                <table class="table table-light table-hover text-center table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>package_name</th>
                            <th>package_duration</th>
                            <th>package_price</th>
                            <th colspan="2">ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody>
                         <?php 
                                $x=1;
                                $sql="SELECT * FROM `package`";
                                $query= mysqli_query($link, $sql);
                                while($row=mysqli_fetch_array($query)){
                                ?>
                        <tr>
                            <td><?php echo $x++; ?></td>
                            <td><?php echo $row[1]?></td>
                            <td><?php echo $row[2]?></td>
                            <td><?php echo $row[3]?></td>
                            
                            <td>
                                <a class="btn btn-outline-success btn-sm" href="delivery_person_edit.php?edit=<?php echo $row[0]?>"><i class="fa-solid fa-pen-to-square"></i>EDIT</a>
                               
                                <a class="btn btn-outline-danger btn-sm" href="package_view.php?deleteid=<?php echo $row[0]?>"><i class="fa-solid fa-trash-can"></i> TEMP DELETE</a>
                            </td>
                            
                            
                        </tr>
                        <?php
                            }
                        
                        ?>
                    </tbody>
                    
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>package_name</th>
                            <th>package_duration</th>
                            <th>package_price</th>
                            <th colspan="2">ACTIONS</th>
                        </tr>
                    </tfoot>
                </table>
        </div> 
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>