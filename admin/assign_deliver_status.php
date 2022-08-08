<?php 
require_once '../connection.php';
$delsts=$_REQUEST['sts'];
$invID=$_REQUEST['invID'];
$sql="UPDATE `customer_invoice` SET `delivery_status`='$delsts' WHERE `invoice_id` ='$invID'";

// $sql .="SELECT * FROM `customer_invoice`";
// $query=$link->query("UPDATE `customer_invoice` SET `delivery_status`='$delsts' WHERE `invoice_id` ='$invID'");
// $row = $query->fetch_assoc();
$query = mysqli_query($link,$sql);
// $row = mysqli_fetch_array($query);
// $query = mysqli_multi_query($link,$sql);
// $data['resp'] = $row;
echo json_encode($data);
?>