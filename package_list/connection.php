<?php
	$link = new mysqli("enamdev.xyz","enamdev","ENam@@121231","enamdev_onlineDelivery");

	if ($link->connect_error) {
		die("Database Connection Promlem ...");
	}
 ?>