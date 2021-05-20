<?php 
include('connect.php');
$sql_tinh = "select * from tinh";
$result = mysqli_query($connect, $sql_tinh);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Tỉnh thành phố Việt Nam</title>
	<link rel="shotcut icon" href="iconapp.ico">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
</head>
<body>
	<div class="container">
		<h3>Chọn địa chỉ của Việt Nam</h3>
		<div class="row">
			<div class="col-4">
				<label>Tỉnh, thành phố</label> <br>
				<select name="tinh_thanhpho" id="tinh_thanhpho">
					<option>-------Chọn tỉnh, thành phố------</option>
					<?php foreach ($result as $each) { ?>
						<option value="<?php echo $each['ma_tinh'] ?>"><?php echo $each['ten_tinh'] ?></option>
					<?php } ?>
				</select>
			</div>
			<div class="col-4">
				<label>Quận, huyện</label> <br>
				<select name="quan_huyen" id="quan_huyen">
					<option>-------Chọn quận, huyện------</option>
				</select>
			</div>
			<div class="col-4">
				<label>Xã, thị trấn</label> <br>
				<select name="xa_phuong" id="xa_phuong">
					<option>-------Chọn xã, phường-----</option>
				</select>
			</div>
			
		</div>
		
	</div>
</body>
<script src="bootstrap/js/bootstrap.js" type="text/javascript"></script>
<script src="bootstrap/jquery.js" type="text/javascript"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$('#tinh_thanhpho').change(function() {
			let ma_tinh = $(this).val();
			$.ajax({
				url : 'action.php',
				type : 'POST',
				data : {ma_tinh : ma_tinh},
				success:function(data) {
					$('#quan_huyen').html(data);
				}
			});
		})
		$('#quan_huyen').change(function() {
			let ma_huyen = $(this).val();
			$.ajax({
				url : 'action.php',
				type : 'POST',
				data : {ma_huyen : ma_huyen},
				success:function(data) {
					$('#xa_phuong').html(data);
				}
			});
		})
	})
</script>
</html>