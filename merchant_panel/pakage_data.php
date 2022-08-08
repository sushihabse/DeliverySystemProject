<?php 
require_once '../connection.php';
$package_id=$_REQUEST['package'];
$sql="select * from package where package_id='$package_id'";
$query=mysqli_query($link,$sql);
$row=mysqli_fetch_array($query);
$data['res']=$row;
 echo json_encode($data);
?>