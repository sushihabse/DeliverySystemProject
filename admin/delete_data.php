<?php
    require_once "../connection.php";
    $id = $_REQUEST['idpass'];
    $query = $link->query("DELETE FROM `customer_invoice` WHERE `invoice_id` = $id");
?>