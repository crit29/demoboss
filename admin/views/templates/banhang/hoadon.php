<div class="content">
	<script>
	$(document).ready(function(){
		$('#tbDsHoaDon').DataTable( {
	        "language": {
	            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Vietnamese.json"
	        }
	    } );
	    $('#tbAddHoaDon').hide();
	    $('#btnAddHoaDon').click(function(){
	    	$('#tbAddHoaDon').show(600);
	    	$(this).hide();
	    });
	});    
	</script>
	<h2><?= $title ?></h2>
	<!-- thêm mới hóa đơn bán hàng -->
	<a href="?router=banhang/hoadon&f=addview" class="btn btn-primary"><i class="fa fa-plus"></i>Thêm mới</a>
	<!-- <a href="?router=banhang/hoadon&f=addview" class="btn btn-success"><i class="fa fa-plus-square"></i>Thêm từ excel</a> -->
	
	<br><br>
	<!-- <button type="btn" id="btnAddHoaDon" class="btn btn-primary"><i class="fa fa-plus"></i>Thêm mới hóa đơn bán hàng</button><br><br> -->
	<form method="post" action="?router=banhang/hoadon&f=add">
	<table class="table table-bordered table-hover" id="tbAddHoaDon">
		<thead>
			<tr>
				<th colspan="5">Thêm mới</th>
				<td><a href="?router=banhang/hoadon" class="btn btn-danger pull-right">X</a></td>
			</tr>

		</thead>
		<tbody>
			<tr>
				<th>Mã hóa đơn</th>
				<td><input type="text" required name="txtMaHoaDon" class="form-control"></td>
				<th>Mã khách</th>
				<td><select class="form-control" name="txtKhach">
					<?php foreach ($listKhach as $khach) {
					?>
					<option value="<?= $khach['kh_id'] ?>"><?= $khach['ten_kh'] ?></option>}
					
					<?php
					} ?>
				</select></td>
				<th>Ngày tạo</th>
				<td><input type="date" value="<?= date('Y-m-d') ?>" name="txtNgayTao" class="form-control"></td>
			</tr>
			<tr>
				<th>Nhân viên 1</th>
				<td><input type="text" name="txtNhanVien1" class="form-control"></td>
				<th>Nhân viên 2</th>
				<td><input type="text" name="txtNhanVien2" class="form-control"></td>
			</tr>
			<tr>
				<td colspan="6">
					<table class="table table-bordered table-hover" id="tbAddHoaDonChiTiet">
						<thead>
							<tr>
								<th colspan="8">Hóa đơn chi tiết</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<th>STT</th>
								<th>Mã sản phẩm</th>
								<th>Đơn vị bán</th>
								<th>Showroom</th>
								<th>Đơn giá</th>
								<th>Số lượng</th>
								<th>Thành tiền</th>
							</tr>
							<?php for ($ct=0; $ct < 5; $ct++) { 
							?>
							<tr>
								<td><?= $ct+1 ?></td>
								<td><select class="form-control">
									<option>Lựa chọn</option>
									
								</select></td>
								<td><select class="form-control" name="txtDonVi">
									<?php foreach ($listDonVi as $dvkey => $dv) {
									?>
									<option><?= $dv['ten_dvcs'] ?></option>
									<?php
									} ?>
								</select></td>
								<td><input type="text" name="txtHoaDonId" class="form-control"></td>
								<td><input type="text" name="txtHoaDonId" class="form-control"></td>
								<td><input type="text" name="txtHoaDonId" class="form-control"></td>
								<td><input type="text" name="txtHoaDonId" class="form-control"></td>
							</tr>
							<?php
							} ?>
							
						</tbody>
					</table>
				</td>

			</tr>
		</tbody>
		<tfoot>
			<tr>
				<th colspan="10"><button type="submit" name="btnSubmitAddHoaDon" class="btn btn-primary pull-right">Thêm mới</button></th>
			</tr>
		</tfoot>
	</table>
	</form>
	<!-- Danh sách hóa đơn bán hàng -->
	<table class="table table-bordered table-hover" id="tbDsHoaDon">
		<thead>
			<tr>
				<th>STT</th>
				<th>Mã hóa đơn</th>
				<th>Mã khách</th>
				<th>Nhân viên 1</th>
				<th>Nhân viên 2</th>
				<th>Ngày tạo</th>
				<th width="230px">Hành động</th>
			</tr>
		</thead>
		<tbody>
			<?php for ($i=0; $i < count($listhd); $i++) { 
			?>
			<tr>
				<td><?= $i+1 ?><input type="hidden" name="" id="txtHoadonId<?= $i ?>" value="<?= $listhd[$i]['hoadon_id']; ?>"></td>
				<td><?= $listhd[$i]['hoadon_ma'] ?></td>
				<td><?= $listhd[$i]['ten_kh'] ?></td>
				<td><?= $listhd[$i]['nhanvien1'] ?></td>
				<td><?= $listhd[$i]['nhanvien2'] ?></td>
				<td><?= $listhd[$i]['ngaytao'] ?></td>
				<td>
					<script>
						$(document).ready(function(){
							$("#btnAjaxHdct<?= $i ?>").click(function(){
								$("#tbModalHoaDonCt tbody tr").remove();
							    $.ajax({
							    	url: "?router=banhang/hoadon&f=AjaxHoaDonChiTiet",
							    	type: "post",
							    	data: {
							    		idhoadon:$('#txtHoadonId<?= $i ?>').val()
							    	}, 
							    	success: function(result){
							    	result = result.split("/");
							    	for (var i = 0; i+1 < result.length; i++) {
							    		dataHDCT  = result[i].split(",")
									    $('#tbModalHoaDonCt').append("<tr><td>"+(parseInt(i)+1)+"</td><td>"+dataHDCT[0]+"</td><td>"+dataHDCT[1]+"</td><td>"+dataHDCT[2]+"</td><td>"+dataHDCT[3]+"</td><td>"+dataHDCT[4]+"</td><td>"+dataHDCT[5]+"</td><td>"+dataHDCT[6]+"</td></tr>")
							    	}
							        $("#dataAjax1").html(result[0]);
							        
							        
							    }});
							});

						});
					</script>			
					<button type="button" id="btnAjaxHdct<?= $i ?>" class="btn btn-info" data-toggle="modal" data-target="#myModal">Chi tiết</button>
					<a href="?router=banhang/hoadon&f=edit&id=<?= $listhd[$i]['hoadon_id'] ?>" class="btn btn-warning"><i class="fa fa-edit"></i>Sửa</a>
					<a href="?router=banhang/hoadon&f=delHoaDon&id=<?= $listhd[$i]['hoadon_id'] ?>" class="btn btn-danger"><i class="fa fa-times"></i>Xóa</a>
				</td>

			</tr>
			<?php
			} ?>
			
		</tbody>
	</table>
	<div id="myModal" class="modal fade" role="dialog">
	  <div class="modal-dialog modal-lg">

	    <!-- Modal content-->
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">Hóa đơn chi tiết</h4>
	      </div>
	      <div class="modal-body">
			    <table class="table" id="tbModalHoaDonCt">
			    	<thead>
			    		<tr>
			    			<th>STT</th>
			    			<th>Hoa Đơn ID</th>
			    			<th>Mã sản phẩm</th>
			    			<th>Đơn vị bán</th>
			    			<th>Showroom</th>
			    			<th>Đơn giá</th>
			    			<th>Số lượng</th>
			    			<th>Thành tiền</th>
			    		</tr>
			    	</thead>
			    	<tbody>
			    		
			    	</tbody>
			    </table>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	      </div>
	    </div>

	  </div>
	</div>
</div>