<?php 
include('connect.php');

if(isset($_POST['ma_tinh'])) {
	$ma_tinh = $_POST['ma_tinh'];
	$sql_huyen = "select * from huyen where ma_tinh = '$ma_tinh'";
	$result = mysqli_query($connect, $sql_huyen);
	$output = '';
	$output .= '<option>-------Chọn quận, huyện------</option>';
	foreach ($result as $each) {
		$output .= '<option value="'.$each['ma_huyen'].'">'.$each['ten_huyen'].'</option>';
	}
	echo $output;
}


if(isset($_POST['ma_huyen'])) {
	$ma_huyen = $_POST['ma_huyen'];
	$sql_xa = "select * from xa where ma_huyen = '$ma_huyen'";
	$result = mysqli_query($connect, $sql_xa);
	$output = '';
	$output .= '<option>-------Chọn xã, phường------</option>';
	foreach ($result as $each) {
		$output .= '<option value="'.$each['ma_xa'].'">'.$each['ten_xa'].'</option>';
	}
	echo $output;
}

