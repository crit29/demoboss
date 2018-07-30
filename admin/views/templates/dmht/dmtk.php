<div class="content">
	<script>
		$(document).ready(function(){
			$("#tbEditTk").hide();
			<?php if (isset($_GET['ac'])&& $_GET['ac'] == 'edit') {
				echo "$('#tbEditTk').show();";
			} ?>
			$("#tbAddTk").hide();
			$('.select2').select2();
		    $("#btnAddTk").click(function(){
		        $(this).hide();
		        $("#tbAddTk").show(600);
		    });
		});
	</script>	
	<h2><?= $title ?></h2>
	<!-- sửa tài khoản  -->
	<form action="?router=dmht/dmtk&f=edit" method="post">
	<table class="table table-bordered table-hover" id="tbEditTk">
		<thead>
			<tr>
				<th colspan="7"><i class="fa fa-plus"></i>Cập nhật tài khoản</th>
				<th><a href="?router=dmht/dmtk" class="btn btn-danger pull-right">X</a></th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<th>Tên tk</th>
				<td><input type="text" name="txtTenTk" class="form-control" value="<?= $tkEdit['ten_tk'] ?>"><input type="hidden" name="txtTkId" value="<?= $tkEdit['tk_id'] ?>"></td>
				<th>Tên tk2</th>
				<td><input type="text" name="txtTenTk2" class="form-control" value="<?= $tkEdit['ten_tk2'] ?>"></td>
				<th>Mã nt</th>
				<td><select class="form-control" name="slcMaNt">
					<option value="vnd">VND</option>
				</select></td>
				<th>Loại tk</th>
				<td><input type="text" name="txtLoaiTk" class="form-control" value="<?= $tkEdit['loai_tk'] ?>"></td>
			</tr>
			<tr>
				<th>Tk Mẹ</th>
				<td><select class="form-control" name="slcTkMe" >
					<option value="1">1</option>
				</select></td>
				<th>Bậc tk</th>
				<td><select class="form-control" name="slcBacTk">
					<option value="1">1</option>
				</select></td>
				<th>Tk sc</th>
				<td><input type="text" name="txtTkSc" class="form-control" value="<?= $tkEdit['tk_sc'] ?>"></td>
				<th>Ngày tạo</th>
				<td><input type="date" readonly value="<?= $tkEdit['date0'] ?>" name="txtDate" class="form-control"></td>
			</tr>
		</tbody>
		<tfoot>
			<tr>
				<td colspan="7"></td>
				<td><button class="btn btn-success pull-right" name="btnSubmitEdit" type="submit"><i class="fa fa-upload"></i>Cập nhật</button></td>
			</tr>
		</tfoot>
	</table>
	</form>
	<!-- Thêm mới tài khoản -->
	<button class="btn btn-primary" id="btnAddTk"><i class="fa fa-plus"></i>Thêm mới tài khoản</button><br><br>
	<form action="?router=dmht/dmtk&f=add" method="post">
	<table class="table table-bordered table-hover" id="tbAddTk">
		<thead>
			<tr>
				<th colspan="7"><i class="fa fa-plus"></i>Thêm mới tài khoản</th>
				<th><a href="?router=dmht/dmtk" class="btn btn-danger pull-right">X</a></th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<th>Tên tk</th>
				<td><input type="text" name="txtTenTk" class="form-control"></td>
				<th>Tên tk2</th>
				<td><input type="text" name="txtTenTk2" class="form-control"></td>
				<th>Mã nt</th>
				<td><select class="form-control" name="slcMaNt">
					<option value="vnd">VND</option>
				</select></td>
				<th>Loại tk</th>
				<td><input type="text" name="txtLoaiTk" class="form-control"></td>
			</tr>
			<tr>
				<th>Tk Mẹ</th>
				<td><select class="form-control" name="slcTkMe">
					<option value="1">1</option>
				</select></td>
				<th>Bậc tk</th>
				<td><select class="form-control" name="slcBacTk">
					<option value="1">1</option>
				</select></td>
				<th>Tk sc</th>
				<td><input type="text" name="txtTkSc" class="form-control"></td>
				<th>Ngày tạo</th>
				<td><input type="date" readonly value="<?= date("Y-m-d") ?>" name="txtDate" class="form-control"></td>
			</tr>
		</tbody>
		<tfoot>
			<tr>
				<td colspan="7"></td>
				<td><button class="btn btn-primary pull-right" name="btnSubmitAdd" type="submit"><i class="fa fa-plus"></i>Thêm mới</button></td>
			</tr>
		</tfoot>
	</table>
	</form>
	<!-- Danh sách tài khoản -->
	<table class="table table-bordered table-hover" id="tbListTk">
		<thead>
			<tr>
				<th colspan="10"><i class="fa fa-list"></i>Danh sách tài khoản</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<th width="50px">STT</th>
				<th>Tên Tk</th>
				<th>Tên Tk 2</th>
				<th>Mã nt</th>
				<th>Loại tk</th>
				<th>Tk Mẹ</th>
				<th>Bậc tk</th>
				<th>Tk sc</th>
				<th>Ngày tạo</th>
				<th width="180px;">Hành động</th>
			</tr>

			<?php
			if (isset($_GET['page'])) {
					$page = $_GET['page'];
				}else{
					$page = 1;
				}

				if (count($listTk) == 0) {
					echo "<tr><td colspan='10'>Không có dữ kiệu!</td></tr>";
				}
				
				$i= ($page-1)*10;
				if ($i>count($listTk)-10) {
					$k = count($listTk);
				}else 
				$k= $i+10;
				for ($i;$i < $k; $i++) { 
			?>
			<tr>
				<td><?= $i+1 ?></td>
				<td><?= $listTk[$i]['ten_tk'] ?></td>
				<td><?= $listTk[$i]['ten_tk2'] ?></td>
				<td><?= $listTk[$i]['ma_nt'] ?></td>
				<td><?= $listTk[$i]['loai_tk'] ?></td>
				<td><?= $listTk[$i]['tk_me'] ?></td>
				<td><?= $listTk[$i]['bac_tk'] ?></td>
				<td><?= $listTk[$i]['tk_sc'] ?></td>
				<td><?= $listTk[$i]['date0'] ?></td>
				<td><a class="btn btn-warning" href="?router=dmht/dmtk&ac=edit&id=<?= $listTk[$i]['tk_id'] ?>"><i class="fa fa-edit"></i>Sửa</a>
					<a class="btn btn-danger" href="?router=dmht/dmtk&f=del&id=<?= $listTk[$i]['tk_id'] ?>"><i class="fa fa-trash"></i>Xóa</a></td>

			</tr>
			<?php
			} ?>
		</tbody>
		<tfoot>
			<tr>
				<th colspan="10" style="text-align:center;font-size: 16px">Page: 
					<?php 
						for ($j=0; $j <= (count($listTk)-1)/10; $j++) { 
						?>
						<a href="?router=dmht/dmtk&page=<?=$j+1?>" class="btn" style="border: 1px solid green;border-radius: 3px" title=""><?=$j+1?></a>
						<?php	
						}

					 ?>
				</th>
				

			</tr>
		</tfoot>
	</table>
</div>