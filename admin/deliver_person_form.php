<?php
    if(isset($_POST['submit'])){
        $name=$_POST['name'];
        $designation=$_POST['designation'];
        $mobile=$_POST['mobile'];
        $email=$_POST['email'];
        $presentaddress=$_POST['presentaddress'];
        $nationalid=$_POST['nationalid'];
        
        if (!empty($_FILES['delipic'])) {
            $file_name = $_FILES['delipic']['name'];
            $file_tmpname = $_FILES['delipic']['tmp_name'];
            $file_type = $_FILES['delipic']['type'];
            $file_size = $_FILES['delipic']['size'];
            $file_ext = explode('.', $file_name);
            $file_extention = strtolower(end($file_ext));
            $extentions = ["jpeg","jpg","png"];
            $file_name = substr($name,0,10) .".". $file_extention ;
            
                if (in_array($file_extention,$extentions)) {
                    if ($file_size < 548576) {
                          $query = $link->query("INSERT INTO `delivery_person`(`name`, `designation`, `mobile`, `email`, `present_address`, `national_id`, `picture`) VALUES ('$name','$designation','$mobile','$email','$presentaddress','$nationalid','$file_name')");
                          if ($query) {
                              echo "data uploaded";
                              move_uploaded_file($file_tmpname,"deliveryPersonImg/".$file_name);
                              header("Location:delivery_person.php");
                          } else $errors = "Somthing is wrong Data Not Inserted";
                    } else $errors = "File size need to lower then 500KB";
                } else $errors = "Need to be Select jpg,jpeg or png file";
            } else $errors = "Drop your Passport size Image";
    }
?>

<div  class="modal fade" id="formid">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="d-block ms-auto me-auto">Please Add Your information</h5>
            </div>
            <div class="modal-body">
                <form action="<?=$_SERVER['PHP_SELF']?>" method="POST" enctype="multipart/form-data" class="row g-3">
                    <div class="col-md-12">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" value="" />
                    </div>
                    <div class="col-md-12">
                        <label for="designation" class="form-label">Designation</label>
                        <select class="form-select mb-3" name="designation">
                          <option selected>Select Designation</option>
                          <option value="Bike Delivery Boy">Bike Delivery Boy</option>
                          <option value="Cycle Delivery Boy">Cycle Delivery Boy</option>
                        </select>
                    </div>
                    <div class="col-md-12">
                        <label for="mobile" class="form-label">Mobile</label>
                        <input type="number" class="form-control" name="mobile" value="" />
                    </div>
                    <div class="col-md-12">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" value="" />
                    </div>
                    <div class="col-md-12">
                        <label for="presentaddress" class="form-label">Present Address</label>
                        <input type="text" class="form-control" name="presentaddress" value="" />
                    </div>
                    <div class="col-md-12">
                        <label for="nationalid" class="form-label">National ID</label>
                        <input type="number" class="form-control" name="nationalid" value="" />
                    </div>
                    <div class="col-md-12">
                        <label for="picture" class="form-label">Picture</label>
                        <input type="file" class="form-control" name="delipic" value="" />
                    </div>
                    <div class="col-12 modal-footer">
                        <button type="submit" name="submit" class="btn btn-outline-success">SUBMIT</button>
                        <button type="button" class="btn btn-outline-danger"data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>      
        </div>
    </div>
</div>