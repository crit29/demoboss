<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo $title; ?></title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  	
  	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.11/css/all.css" integrity="sha384-p2jx59pefphTFIpeqCcISO9MdVfIm4pNnsL08A6v5vaQc4owkQqxMV8kg4Yvhaw/" crossorigin="anonymous">
  	
  	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
	
  	<link rel="stylesheet" type="text/css" href="https://code.jquery.com/jquery-3.3.1.js">
  	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js">

	<link rel="stylesheet" href="views/css/mycss.css">
</head>
<body>
	<script>
		$(document).ready(function(){
			window.print();
		});
	</script>
	<div class="a4">
		<h2 style="font-weight: bold; font-size: 16px;margin-left: 20px">CÔNG TY CỔ PHẦN PHẦN MỀM VÀ CÔNG NGHỆ TỰ ĐỘNG</h2>
		<p style="font-weight: bold;margin-left: 20px">Số 19/144 phố Vũ Hữu, Thanh Xuân, Hà Nội</p>
		<br>
		<h1 style="text-align: center;font-weight: bold">PHIẾU KẾ TOÁN</h1>
		<p style="text-align: center;">Ngày <?= date('d') ?>  Tháng <?= date('m') ?>  Năm <?= date('Y') ?></p>

		<table style="width: 90%; margin: auto" class="table table-bordered">
			<tr>
				<th>Diễn giải</th>
				<th>Tài khoản</th>
				<th>Vụ việc</th>
				<th>Ps nợ</th>
				<th>Ps có</th>
			</tr>
			<?php 
			$pktctedit = $this->db_pkt->getPktCt($_GET['id']);
			for ($u=0; $u < count($pktctedit); $u++) { 
			?>
			<tr>	
				<td><?= $pktctedit[$u]['diengiai'] ?></td>
				<td>
					<?php foreach ($listTk as $tk) {
					if ($pktctedit[$u]['tk'] == $tk['tk_id'] ){
						echo $tk['ten_tk'];
					}}
					?>
				</td>
				<td></td>
				<td><?= $pktctedit[$u]['ps_no_vnd'] ?? 0 ?></td>
				<td><?= $pktctedit[$u]['ps_co_vnd'] ?? 0 ?></td>		
			</tr>
			<?php
			} ?>
			<tr>
				<td colspan="2"></td>
				<th>Cộng</th>
				<td><?= $pktinfo['tong_ps_vnd'] ?></td>
				<td><?= $pktinfo['tong_ps_vnd'] ?></td>
			</tr>
	</table>
	<div style="width: 25%; float: left;margin-left: 12%">
		<h3 style="font-weight: bold;font-size: 16px;text-align: center">Kế toán trưởng</h3>
		<p style="text-align: center">(ký, họ tên)</p>
	</div>
	<div style="width: 30%; float: left; margin-left: 22%;">
		<h3 style="font-weight: bold;font-size: 16px;text-align: center">Ngày . . . Tháng . . . Năm . . . .<br>Người lập biểu</h3>
		<p style="text-align: center">(ký, họ tên)</p>

	</div>
	</div>
</body>
</html>