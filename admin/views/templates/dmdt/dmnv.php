<div class="content">
	<script>
		$(document).ready(function(){
			$('#tblistNv').DataTable( {
		        "language": {
		            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Vietnamese.json"
		        }
		    } );
			$("#tbEditNv").hide();
			
			<?php if (isset($_GET['ac'])&& $_GET['ac'] == 'edit') {
				echo "$('#tbEditNv').show();";
			} ?>
			$("#tbAddNv").hide();
			$('.select2').select2();
		    $("#btnAddNv").click(function(){
		        $(this).hide();
		        $("#tbAddNv").show(600);
		    });
		    
		});
	</script>	
	<h2><?= $title ?></h2>
	<!-- sửa nhân viên  -->
	<form action="?router=dmdt/dmnv&f=edit" method="post">
	<table class="table table-bordered table-hover" id="tbEditNv">
		<thead>
			<tr>
				<th colspan="5"><i class="fa fa-plus"></i>Cập nhật nhân viên</th>
				<th><a href="?router=dmdt/dmnv" class="btn btn-danger pull-right">X</a></th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<th>Mã nhân viên</th>
				<td>
					<input type="text" name="txtMaNhanVien" value="<?= $dataEdit['ma_nhanvien'] ?>" class="form-control">
					<input type="hidden" name="txtNhanVienID" value="<?= $dataEdit['nhanvien_id'] ?>">
				</td>
				<th>Họ tên</th>
				<td><input type="text" name="txtTenNhanVien" value="<?= $dataEdit['nhanvien_name'] ?>" class="form-control"></td>
				<th>Trạng thái</th>
				<td><input type="number" min="1" max="2" name="txtStatus" value="<?= $dataEdit['status'] ?>" class="form-control"></td>
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
	<!-- Thêm mới nhân viên -->
	

	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i>Thêm mới nhân viên</button>

	<!-- Modal -->
	<div id="myModal" class="<!-- <!-- modal --> --> fade" role="dialog">
	  <div class="modal-dialog modal-lg">

	    <!-- Modal content-->
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">Thêm mới nhân viên</h4>
	      </div>
	      <div class="modal-body">
	        <form action="?router=dmdt/dmnv&f=add" method="post">
			<table class="table table-hover">
				
				<tbody>
					<tr>
						<th>Mã nhân viên</th>
						<td><input type="text" name="txtMaNhanVien" value="" class="form-control"></td>
						<th>Họ tên</th>
						<td><input type="text" name="txtTenNhanVien" value="" class="form-control"></td>
						<th>Trạng thái</th>
						<td><input type="number" min="1" max="2" name="txtStatus" value="" class="form-control"></td>
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
			
	      </div>
	      <div class="modal-footer">
	      	<button class="btn btn-primary pull-right" name="btnSubmitAdd" type="submit"><i class="fa fa-plus"></i>Thêm mới</button>
	        <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
	      </div>
	      </form>
	    </div>

	  </div>
	</div>
	<!-- Danh sách nhân viên -->
	<h3>Danh sách đơn vị cơ sở</h3>
	<table class="table  table-bordered table-hover" id="tblistNv">
		<thead>
			<tr>
				<th width="50px">STT</th>
				<th>Mã nhân viên</th>
				<th>Họ tên</th>
				<th>Trạng thái</th>
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

				if (count($listNv) == 0) {
					echo "<tr><td colspan='10'>Không có dữ kiệu!</td></tr>";
				}
				
				$i= ($page-1)*10;
				if ($i>count($listNv)-10) {
					$k = count($listNv);
				}else 
				$k= $i+10;
				for ($i;$i < $k; $i++) { 
			?>
			<tr>
				<td><?= $i+1 ?></td>
				<td><?= $listNv[$i]['ma_nhanvien'] ?></td>
				<td><?= $listNv[$i]['nhanvien_name'] ?></td>
				<td><?= $listNv[$i]['status'] ?></td>
				
				<td><a class="btn btn-warning" href="?router=dmdt/dmnv&ac=edit&id=<?= $listNv[$i]['nhanvien_id'] ?>"><i class="fa fa-edit"></i>Sửa</a>
					<a class="btn btn-danger" href="?router=dmdt/dmnv&f=del&id=<?= $listNv[$i]['nhanvien_id'] ?>"><i class="fa fa-trash"></i>Xóa</a></td>

			</tr>
			<?php
			} ?>
		</tbody>
		<!-- <tfoot>
			<tr>
				<th colspan="10" style="text-align:center;font-size: 16px">Page: 
					<?php 
						for ($j=0; $j <= (count($listNv)-1)/10; $j++) { 
						?>
						<a href="?router=dmdt/dmnv&page=<?=$j+1?>" class="btn" style="border: 1px solid green;border-radius: 3px" title=""><?=$j+1?></a>
						<?php	
						}

					 ?>
				</th>
				

			</tr>
		</tfoot> -->
	</table>
</div>