<div class="content">
	<script>
		$(document).ready(function(){
			$('#tblistDv').DataTable( {
		        "language": {
		            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Vietnamese.json"
		        }
		    } );
			$("#tbEditDv").hide();
			
			<?php if (isset($_GET['ac'])&& $_GET['ac'] == 'edit') {
				echo "$('#tbEditDv').show();";
			} ?>
			$("#tbAddDv").hide();
			$('.select2').select2();
		    $("#btnAddDv").click(function(){
		        $(this).hide();
		        $("#tbAddDv").show(600);
		    });
		    
		});
	</script>	
	<h2><?= $title ?></h2>
	<!-- sửa tài khoản  -->
	<form action="?router=dmht/dmdv&f=edit" method="post">
	<table class="table table-bordered table-hover" id="tbEditDv">
		<thead>
			<tr>
				<th colspan="5"><i class="fa fa-plus"></i>Cập nhật tài khoản</th>
				<th><a href="?router=dmht/dmdv" class="btn btn-danger pull-right">X</a></th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<th>Mã dvcs</th>
				<td><input type="text" name="txtMaDvcs" value="<?= $dvEdit['ma_dvcs'] ?>" class="form-control"></td>
				<th>Tên dvcs</th>
				<td><input type="text" name="txtTenDvcs" value="<?= $dvEdit['ten_dvcs'] ?>" class="form-control"></td>
				<th>Tên dvcs2</th>
				<td><input type="text" name="txtTenDvcs2" value="<?= $dvEdit['ten_dvcs2'] ?>" class="form-control"></td>
			</tr>
			<tr>
				<th>Ngày lập</th>
				<td><input type="date" name="txtDate" value="<?= $dvEdit['date0'] ?>" class="form-control"></td>
				<th>Thời gian</th>
				<td><input type="date" name="txtTime" value="<?= $dvEdit['time0'] ?>" class="form-control"></td>
				<th>Tình trạng</th>
				<td><select name="slcStatus" class="form-control">
					<option value="1">1</option>
				</select></td>
			</tr>
		</tbody>
		<tfoot>
			<tr>
				<td colspan="5"></td>
				<td><button class="btn btn-success pull-right" name="btnSubmitEdit" type="submit"><i class="fa fa-upload"></i>Cập nhật</button></td>
			</tr>
		</tfoot>
	</table>
	</form>
	<!-- Thêm mới tài khoản -->
	

	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i>Thêm mới đơn vị cơ sở</button>

	<!-- Modal -->
	<div id="myModal" class="<!-- <!-- modal --> --> fade" role="dialog">
	  <div class="modal-dialog modal-lg">

	    <!-- Modal content-->
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">Thêm mới đơn vị cơ sở</h4>
	      </div>
	      <div class="modal-body">
	        <form action="?router=dmht/dmdv&f=add" method="post">
			<table class="table table-hover">
				
				<tbody>
					<tr>
						<th>Mã dvcs</th>
						<td><input type="text" name="txtMaDvcs" class="form-control"></td>
						<th>Tên dvcs</th>
						<td><input type="text" name="txtTenDvcs" class="form-control"></td>
						<th>Tên dvcs2</th>
						<td><input type="text" name="txtTenDvcs2" class="form-control"></td>

					</tr>
					<tr>
						<th>Ngày lập</th>
						<td><input type="date" name="txtDate" class="form-control"></td>
						<th>Thời gian</th>
						<td><input type="date" name="txtTime" class="form-control"></td>
						<th>Tình trạng</th>
						<td><select name="slcStatus" class="form-control">
							<option value="1">1</option>
						</select></td>

					</tr>
					<tr>
						
					</tr>
				</tbody>
				<!-- <tfoot>
					<tr>
						<td colspan="5"></td>
						<td><button class="btn btn-primary pull-right" name="btnSubmitAdd" type="submit"><i class="fa fa-plus"></i>Thêm mới</button></td>
					</tr>
				</tfoot> -->
			</table>
			</form>
	      </div>
	      <div class="modal-footer">
	      	<button class="btn btn-primary pull-right" name="btnSubmitAdd" type="submit"><i class="fa fa-plus"></i>Thêm mới</button>
	        <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
	      </div>
	    </div>

	  </div>
	</div>
	<!-- Danh sách tài khoản -->
	<h3>Danh sách đơn vị cơ sở</h3>
	<table class="table  table-bordered table-hover" id="tblistDv">
		<thead>
			<tr>
				<th width="50px">STT</th>
				<th>Mã dvcs</th>
				<th>Tên dvcs</th>
				<th>Tên dvcs2</th>
				<th>Ngày lập</th>
				<th>Thời gian</th>
				<th>Tình trạng</th>
				<th width="180px;">Hành động</th>
			</tr>
		</thead>
		<tbody>
			<?php
			if (isset($_GET['page'])) {
					$page = $_GET['page'];
				}else{
					$page = 1;
				}

				if (count($listDv) == 0) {
					echo "<tr><td colspan='10'>Không có dữ kiệu!</td></tr>";
				}
				
				$i= ($page-1)*10;
				if ($i>count($listDv)-10) {
					$k = count($listDv);
				}else 
				$k= $i+10;
				for ($i;$i < $k; $i++) { 
			?>
			<tr>
				<td><?= $i+1 ?></td>
				<td><?= $listDv[$i]['ma_dvcs'] ?></td>
				<td><?= $listDv[$i]['ten_dvcs'] ?></td>
				<td><?= $listDv[$i]['ten_dvcs2'] ?></td>
				<td><?= $listDv[$i]['date0'] ?></td>
				<td><?= $listDv[$i]['time0'] ?></td>
				<td><?= $listDv[$i]['status'] ?></td>
				<td><a class="btn btn-warning" href="?router=dmht/dmdv&ac=edit&id=<?= $listDv[$i]['dmdvcs_id'] ?>"><i class="fa fa-edit"></i>Sửa</a>
					<a class="btn btn-danger" href="?router=dmht/dmdv&f=del&id=<?= $listDv[$i]['dmdvcs_id'] ?>"><i class="fa fa-trash"></i>Xóa</a></td>

			</tr>
			<?php
			} ?>
		</tbody>
		<!-- <tfoot>
			<tr>
				<th colspan="10" style="text-align:center;font-size: 16px">Page: 
					<?php 
						for ($j=0; $j <= (count($listDv)-1)/10; $j++) { 
						?>
						<a href="?router=dmht/dmdv&page=<?=$j+1?>" class="btn" style="border: 1px solid green;border-radius: 3px" title=""><?=$j+1?></a>
						<?php	
						}

					 ?>
				</th>
				

			</tr>
		</tfoot> -->
	</table>
</div>