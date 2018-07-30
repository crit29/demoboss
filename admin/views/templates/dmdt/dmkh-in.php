<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  	
  	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.11/css/all.css" integrity="sha384-p2jx59pefphTFIpeqCcISO9MdVfIm4pNnsL08A6v5vaQc4owkQqxMV8kg4Yvhaw/" crossorigin="anonymous">
  	
	<link rel="stylesheet" href="views/css/mycss.css">
</head>
<body onload="window.print();">
	<div class="a4">

	<table id="tbdskh" class="table table-bordered table-hover">
		<thead>
			<tr>
				<th colspan="9"style="text-align: color-interpolation-filters: ">Danh sách khách hàng</th>
				
			</tr>
		</thead>
		<tbody>
			<tr>
				<th width="60px">STT</th>
				<th>Mã khách</th>
				<th>Tên khách hàng</th>
				<th>Số điện thoại</th>
				<th>Địa chỉ</th>
				<th>Email</th>
				<th width="60px">Tình trạng</th>

			</tr>		
			<?php 
				if (count($data) == 0) {
					echo "<tr><td colspan='9'>Không có dữ kiệu!</td></tr>";
				}
				for ($i=0;$i < count($data); $i++) { 
			?>
			
			<tr>
				<td><?= $i+1; ?></td>
				<td><?= $data[$i]['ma_khach'] ?></td>
				<td><?= $data[$i]['customer_name'] ?></td>
				<td><?= $data[$i]['customer_phone'] ?></td>
				<td><?= $data[$i]['customer_address'] ?></td>
				<td><?= $data[$i]['customer_email'] ?></td>									
				
				<td><?= $data[$i]['status'] ?></td>
			</tr>
			<?php
				}

			?>
		</tbody>
	</table>
</div>
</body>
</html>
