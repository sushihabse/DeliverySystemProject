<?php
require_once '../connection.php';
$mpsts=$_REQUEST['mpsts'];
$inbid=$_REQUEST['inbid'];
$sql="update customer_invoice set marchant_payment_status='$mpsts' where invoice_id='$inbid'";
$query=mysqli_query($link,$sql);
?>