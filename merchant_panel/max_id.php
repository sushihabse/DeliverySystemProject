<?php 
require_once '../connection.php';

$sql="Select max(invoice_id) as invoice_id  from customer_invoice LIMIT 1";
$query=mysqli_query($link,$sql);
$row=mysqli_fetch_array($query);
$data=array();
$data['res']=$row[0]+1;
echo json_encode($data);


?>