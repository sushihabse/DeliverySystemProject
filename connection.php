<?php
	$link = new mysqli("localhost","marketting","marketting","sushihab_del");

	if ($link->connect_error) {
		die("Database Connection Promlem ...");
	}
 ?>