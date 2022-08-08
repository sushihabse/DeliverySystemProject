<?php
require_once '../connection.php';
$mn=$_REQUEST['term'];
$sql="select * from marchant_info where marchant_name like '$mn%'";
$query=mysqli_query($link, $sql);
while ($row=mysqli_fetch_array($query)) {
	$data[]=$row['marchant_name'];
}
echo json_encode($data);
 ?>