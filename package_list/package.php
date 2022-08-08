<?php
require_once 'connection.php';

if(isset($_POST['submit'])){
    $packagename=$_POST['packagename'];
    $packageduration=$_POST['packageduration'];
    $packageprice=$_POST['packageprice'];
    $sql="INSERT INTO `package`(`package_name`, `package_duration`, `package_price`) VALUES ('$packagename','$packageduration','$packageprice')";
    $query= mysqli_query($link, $sql);
    if($query){
        echo "Data inserted";
    }
    else{
        echo "Data not inserted";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Package</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>

            <div class="col-md-8 pt-4 mt-4">
           
           <form action="#" method="POST" enctype="multipart/form-data" class="row g-3">
               <h2 class="text-center text-info">Package</h2>
               
                <div class="col-md-4">
                    <select class="form-select" name="packagename" aria-label="Default select example">
                              <option selected>Package Menu</option>
                              <option value="Winter">Winter</option>
                              <option value="Spring">Spring</option>
                              <option value="Summer">Summer</option>
                              <option value="Family Packege">Family Packege</option>
                              <option value="Mini Packege">Mini Packege</option>
                            </select>
                </div>
                <div class="col-md-4">
                    <label for="packageduration" class="form-label">Package Duration</label>
                    <input type="text" class="form-control" name="packageduration" />
                </div>
                <div class="col-md-4">
                    <label for="packageprice" class="form-label">Package Price</label>
                    <input type="number" class="form-control" name="packageprice" />
                </div>
                
                <div class="col-12">
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </div>
                </form>
         
            </div>

            <div class="col-md-2"></div>
        </div>
    </div>
</body>
</html>