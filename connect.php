<?php
$connect = new mysqli("localhost", "root", "", "vietnam");
// Check connection
if ($connect->connect_error) {
	die("Connection failed: " . $connect->connect_error);
}
?>
