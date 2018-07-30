<div class="content">
	<?php 
	if (isset($_GET['m'])&&$_GET['m']=='okim') {
		echo "<script type='text/javascript'>$(document).ready(function() { alert('Import thành công'); });</script>";
	}if (isset($_GET['m'])&&$_GET['m']=='okex') {
		echo "<script type='text/javascript'>$(document).ready(function() {alert('Export thành công, file export tại: htdocs\DemoBoss\danhmuckhachhang.xsml'); });</script>";
	}if (isset($_GET['m'])&&$_GET['m']=='okup') {
		echo "<script type='text/javascript'>$(document).ready(function() {;alert('Update thành công'); })</script>";
	}if (isset($_GET['m'])&&$_GET['m']=='okad') {
		echo "<script type='text/javascript'>$(document).ready(function() {;alert('Import thành công'); })</script>";
	}
	if (isset($_GET['m'])&&$_GET['m']=='empty') {
		echo "<script type='text/javascript'>$(document).ready(function() {;alert('Vui lòng điền vào các trường bắt buộc còn trống'); })</script>";
	}
	if (isset($_GET['m'])&&$_GET['m']=='faimim') {
		echo "<script type='text/javascript'>$(document).ready(function() {;alert('import thất bại'); })</script>";
	}
	
	 ?>
	<h2><?= $title; ?></h2>
	<!-- sửa thông tin khách hàng -->

	<table  class="table table-bordered table-hover <?php if($_GET['f']!='edit'){ echo 'hide';} ?>">
	<form method="post" action="?router=dmdt/dmkh&f=update&id=<?= $_GET['id']; ?>">
		<thead>
			<tr>
				<th style="border-right: 0px;" colspan="5">Sửa thông tin khách hàng</th>
				<th style="border-left: 0px;"><button type="submit" name="btnUpdateCus" class="btn btn-success pull-right"><i class="fa fa-bookmark fw"></i>Cập nhật</button></th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<th>Mã khách hàng</th>
				<td><input type="text" class="form-control" name="txtMaKhach" value="<?= $dataF['ma_khach'] ?>"></td>
				<th>Tên khách hàng</th>
				<td><input type="text" class="form-control" name="txtCusname" value="<?= $dataF['customer_name'] ?>"></td>
				<th>Số điện thoại</th>
				<td><input type="text" class="form-control" name="txtCusphone" value="<?= $dataF['customer_phone'] ?>"></td>
				
			</tr>
			<tr>
				<th>Địa chỉ</th>
				<td><input type="text" class="form-control" name="txtCusaddress" value="<?= $dataF['customer_address'] ?>"></td>
				<th>Email</th>
				<td><input type="text" class="form-control" name="txtCusemail" value="<?= $dataF['customer_email'] ?>"></td>
				<th width="90px">Tình trạng</th>
				<td><input type="text" class="form-control" name="txtStatus" value="<?= $dataF['status'] ?>"></td>
			</tr>
		</tbody>
	</form>
	</table>
	<!-- thêm khách hàng -->

<script>
$(document).ready(function(){
    $("#addcus").hide();
});
function addCus() {
   $("#addcus").show(600);
   var btnAdd = document.getElementById("btnAdd");
   btnAdd.classList.add("hide");
}

</script>
	<button id="btnAdd" class="btn btn-primary" onclick="addCus()"><i class="fa fa-plus fa-spin fw"></i>Thêm mới</button>
	<table id="addcus" class="table table-bordered table-hover">
		<form method="post" action="?router=dmdt/dmkh&f=add">
		<thead>
			<tr>
				<th style="border-right: 0px;" colspan="5">Thêm khách hàng</th>
				<th style="border-left: 0px;"><button type="submit" name="btnAddCus" class="btn btn-primary pull-right"><i class="fa fa-plus fw"></i>Thêm mới</button></th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<th>Mã khách hàng<span class="text-red" >*</span></th>
				<td><input type="text" class="form-control" name="txtMaKhach" value=""></td>
				<th>Tên khách hàng<span class="text-red" >*</span></th>
				<td><input type="text" class="form-control" name="txtCusname" value=""></td>
				<th>Số điện thoại</th>
				<td><input type="text" class="form-control" name="txtCusphone" value=""></td>
				
			</tr>
			<tr>
				<th>Địa chỉ</th>
				<td><input type="text" class="form-control" name="txtCusaddress" value=></td>
				<th>Email<span class="text-red" >*</span></th>
				<td><input type="text" class="form-control" name="txtCusemail" value=""></td>
				<th width="120px">Tình trạng<span class="text-red" >*</span></th>
				<td><input type="text" class="form-control" name="txtStatus" value=""></td>
			</tr>
		</tbody>
		</form>
	</table>
	<!-- danh sách khách hàng -->
	<div class="searchArea">
		
			<table>
				<form action="?router=dmdt/dmkh" method="post" enctype="multipart/form-data ">
				<tr>
					<th><label class="">Tìm kiếm</label></th>
					<th width="400px"><input type="text" name="txtSearch" placeholder="Tìm kiếm theo tên, sđt, email, địa chỉ" class="form-control" ></th>
					<th><button type="submit col-md-1" name="btnSearch" class="btn btn-primary "><i class="fa fa-search fw"></i>Tìm kiếm</button></th>
				</form>
				<form action="?router=dmdt/dmkh" method="post">
					<th style="float: right"><a href="?router=dmdt/dmkh&f=in" type="submit" target="_blank" class="btn btn-violet"><i class="fa fa-print fw"></i>In</button></th>
					
					<th style="float: right"><input type="file" id="fileEX" name="fileEX"  class="hide" value="Import Excel"><label for="fileEX" class="btn btn-success"><i class="fa fa-file-excel fw"></i>Import Excel</label></th>
						

					<!-- <th style="float: right"><button type="submit" name="btnImport"  class="btn btn-success"><i class="fa fa-file-excel fw"></i>Import Excel</button></th> -->
					<th style="float: right"><button type="submit" name="btnExport"  class="btn btn-warning"><i class="fa fa-file-excel fw"></i>Export Excel</button></th>
				</form>
				</tr>
			</table>		
		
	</div>
	<table id="tbdskh" class="table table-bordered table-hover">
		<thead>
			<tr>
				<th colspan="9">Danh sách khách hàng</th>
				
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
				<th width="90px">Tình trạng</th>
				<th></th>
				<th  width="165	px">Hành động</th>
			</tr>
			<?php 
			if (isset($_GET['page'])) {
					$page = $_GET['page'];
				}else{
					$page = 1;
				}
			?>
			<form method="POST" action="?router=dmdt/dmkh&f=quick&page=<?= $page ?>">
			<?php 
				if (count($data) == 0) {
					echo "<tr><td colspan='9'>Không có dữ kiệu!</td></tr>";
				}
				
				$i= ($page-1)*10;
				if ($i>count($data)-10) {
					$k = count($data);
				}else 
				$k= $i+10;
				for ($i;$i < $k; $i++) { 
			?>
			
			<tr>
				<td><?= $i+1; ?></td>
				<td><?= $data[$i]['ma_khach'] ?></td>
				<td><?= $data[$i]['customer_name'] ?></td>
				<td><?= $data[$i]['customer_phone'] ?></td>
				<td><?= $data[$i]['customer_address'] ?></td>
				<td><?= $data[$i]['customer_email'] ?></td>
				<input type="hidden" name="cusID[]" value="<?= $data[$i]['customer_id'] ?>">
					
				
				<td><input type="number" class="form-control" name="txtStatus[]" value="<?= $data[$i]['status'] ?>"></td>
				<td><input type="checkbox" style="float: left" name="chk<?= $data[$i]['customer_id'] ?>"></td>

				<td> <a href="?router=dmdt/dmkh&f=edit&id=<?= $data[$i]['customer_id'] ?>" title="" class="btn btn-warning"><i class="fa fa-edit fw"></i>Sửa</a> <a href="?router=dmdt/dmkh&f=delete&id=<?= $data[$i]['customer_id'] ?>" title="" class="btn btn-danger"><i class="fa fa-trash fw"></i>Xóa</a></td>
			</tr>
			<?php
				}

			?>
			<tr>
				<th colspan="6" style="text-align:center;font-size: 16px">Page: 
					<?php 
						for ($j=0; $j <= (count($data)-1)/10; $j++) { 
						?>
						<a href="?router=dmdt/dmkh&page=<?=$j+1?>" class="btn" style="border: 1px solid green;border-radius: 3px" title=""><?=$j+1?></a>
						<?php	
						}

					 ?>
				</th>
				<th><button type="submit" class="btn btn-success" name="btnFastUpdate"><i class="fa fa-bookmark fw"></i>Cập nhật</button></th>
				<th colspan="2"><button type="submit" class="btn btn-danger" name="btnDeleteChk"><i class="fa fa-times fw"></i>Xóa mục đã chọn</button></th>
			</tr>
			
			
			</form>
		</tbody>
	</table>
</div>