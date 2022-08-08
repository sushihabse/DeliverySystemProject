<?php 
require_once '../connection.php';
$id=$_REQUEST['id'];
$invoice_id=$_REQUEST['invid'];
$sql="Update customer_invoice set delivery_ID='$id' where invoice_id='$invoice_id'";
$query=mysqli_query($link,$sql);

?>