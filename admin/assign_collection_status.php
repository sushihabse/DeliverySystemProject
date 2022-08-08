<?php
require_once '../connection.php';
$colsts=$_REQUEST['csts'];
$colid=$_REQUEST['invid'];
$sql="update customer_invoice set collection_status='$colsts' where  invoice_id='$colid'";
$query=mysqli_query($link,$sql);
?>