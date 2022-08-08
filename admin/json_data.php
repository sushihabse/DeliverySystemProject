<?php
    require_once '../connection.php';
    $delivery_id=$_REQUEST['deliveryy'];
    $sql="select * from delivery_person where delivery_id='$delivery_id'";
    $query=mysqli_query($link, $sql);
    while($row=mysqli_fetch_array($query)){
        $get['get']=$row;
    }
    echo json_encode($get);
?>