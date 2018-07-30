<div class="content">
	<a href="?router=banhang/hoadon" class="btn btn-success"><i class="fas fa-arrow-circle-left"></i>Quay lại</a>
	<h2>Chỉnh sửa hóa đơn</h2>
	<form method="post" action="?router=banhang/hoadon&f=handleEdit&id=<?= $_GET['id']?>">
  	<div class="row">
	   	<div class="form-group col-md-6">
		   	<label>Mã hóa đơn</label>
			<input type="text" value="<?php echo $dataEdit['hoadon_ma'] ?>" required name="txtMaHoaDon" class="form-control">
	    </div>
	    <div class="form-group col-md-6">
	    	<label>Mã khách</label>
			<select class="form-control select2" name="txtKhach">
					<?php foreach ($listKhach as $khach) {
					?>
					<option <?php if ($dataEdit['khachhang_id'] == $khach['kh_id']) {
						echo "selected";
					} ?> value="<?= $khach['kh_id'] ?>"><?= $khach['ten_kh'] ?></option>}
					
					<?php
					} ?>
			</select>
		</div>
	</div>

	<div class="row">
		    <div class="form-group col-md-6">
		      	<label>Ngày tạo</label>
				<input type="date" value="<?= $dataEdit['ngaytao'] ?>" name="txtNgayTao" class="form-control">
		</div>
	    <div class="form-group col-md-3">
	      	<label>Nhân viên 1</label>
			<select class="form-control select2" id="slcNhanVien1" name="txtNhanVien1">
		   		<?php foreach ($listNhanVien as $nvkey1 => $nvval1) {
				?>
				<option <?php if ($dataEdit['nhanvien1'] == $nvval1['nhanvien_id']) {
						echo "selected";
					} ?> value="<?php echo $nvval1['nhanvien_id'] ?>"><?= $nvval1['nhanvien_name'] ?></option>
				<?php
				} ?>
		   	</select>
	    </div>
	    <div class="form-group col-md-3">
	      	<label>Nhân viên 2</label>
			<select class="form-control select2" id="slcNhanVien2" name="txtNhanVien2">
		   		<?php foreach ($listNhanVien as $nvkey2 => $nvval2) {
				?>
				<option <?php if ($dataEdit['nhanvien2'] == $nvval2['nhanvien_id']) {
						echo "selected";
					} ?> value="<?php echo $nvval2['nhanvien_id'] ?>"><?= $nvval2['nhanvien_name'] ?></option>
				<?php
				} ?>
		   	</select>
	    </div>
	</div>
	<label><h3>Hóa đơn chi tiết</h3></label>
	<div class="row">
	   	<div class="form-group col-md-3">
		   	<label>Mã sản phẩm</label>
		   	<select class="form-control select2" id="slcSanPham">
		   		<?php foreach ($listSanPham as $spkey => $spval) {
				?>
				<option value="<?php echo $spval['sanpham_id'] ?>"><?= $spval['sanpham_ten'] ?></option>
				<?php
				} ?>
		   	</select>
	    </div>
	    <div class="form-group col-md-3">
	    	<label>Mã đơn vị</label>
			<select class="form-control select2" id="slcDonVi">
				<?php foreach ($listDonVi as $dvkey => $dv) {
				?>
				<option value="<?php echo $dv['dmdvcs_id'] ?>"><?= $dv['ten_dvcs'] ?></option>
				<?php
				} ?>
			</select>
			
		</div>	
		<button style="margin-top: 26px	" type="button" id="AddLine" class="btn btn-info">Thêm dòng</button>	
	</div>
	<script>
	$(document).ready(function(){
		var stt =1;
		$('#AddLine').click(function(){	
			var table = document.getElementById("tbEditList");
			// Thêm dòng cho table
		    var row = table.insertRow();
		    // Thêm cột cho table
		    var cell1 = row.insertCell(0);
		    var cell2 = row.insertCell(1);
		    var cell3 = row.insertCell(2);
		    var cell4 = row.insertCell(3);
		    var cell5 = row.insertCell(4);
		    var cell6 = row.insertCell(5);
		    var cell7 = row.insertCell(6);

		    // Định nghĩa nội dung các cột
		    cell1.innerHTML = stt;
		    // jquery ajax lấy tên sản phâm + tên đơn vị
		    jQuery.ajax({
				url: '?router=banhang/hoadon&f=ajaxAddLine',
				type: 'POST',
				dataType: 'text',
				data: {
					idSanPham: $('#slcSanPham').val(),
					idDonVi: $('#slcDonVi').val(),
				},
				success: function(result) {
					result = result.split(',');
					cell2.innerHTML = result[0] + "<input type='hidden' name='txtSanPham[]' value='"+$('#slcSanPham').val()+"'>";
		    		cell3.innerHTML = result[1] + "<input type='hidden' name='txtDonVi[]' value='"+$('#slcDonVi').val()+"'>";
				},
				error: function(xhr, textStatus, errorThrown) {
				//called when there is an error
				}
			});

		    
		    cell4.innerHTML = "<input type='number' value='0' class='form-control' name='txtGia[]' >";
		    cell5.innerHTML = "<input type='number' value='0' class='form-control' name='txtSoLuong[]' >";
		    cell6.innerHTML = "<input type='number' value='0' class='form-control' name='txtThanhTien[]' >";
		    cell7.innerHTML = "<button type='button' class='btn btn-danger btn-delrow' id='btn-"+stt+"'>Xóa</button>"
			++stt;
			$('#tbEditList tr button').click(function(){
			    $(this).parent().parent().remove();
			    return false;
			});
		});
		$('#tbEditList tr button').click(function(){
			    $(this).parent().parent().remove();
			    return false;
			});
		$('#btn-1').click(function() {
			var table1 = document.getElementById("tbEditList");
			table1.deleteRow(0);
		});

		$('.select2').select2();
	});
	</script>
	<table class="table table-bordered table-hover" id="tbEditList">
		<tr>
			<th>STT</th>
			<th>Tên sản phẩm</th>
			<th>Tên đơn vị</th>
			<th>Giá</th>
			<th>Số lượng</th>
			<th>Thành tiền</th>
			<th width="68px">Hành động</th>
		</tr>
		<?php foreach ($dataEditCt as $keyCt => $valueCt): ?>
			<tr>
				<td><?php echo $keyCt+1 ?></td>
				<td><?php echo $valueCt['sanpham_ten'] ?><input type='hidden' name='txtSanPham[]' value='<?= $valueCt['sanpham_id'] ?>'></td>
				<td><?php echo $valueCt['ten_dvcs'] ?><input type='hidden' name='txtDonVi[]' value='<?php echo $valueCt['donviban'] ?>'></td>
				<td><input type='number' value='<?php echo $valueCt['dongia'] ?>' class='form-control' name='txtGia[]' ></td>
				<td><input type='number' value='<?php echo $valueCt['soluong'] ?>' class='form-control' name='txtSoLuong[]' ></td>
				<td><input type='number' value='<?php echo $valueCt['thanhtien'] ?>' class='form-control' name='txtThanhTien[]' ></td>
				<td><button type='button' class='btn btn-danger btn-delrow' id='btn-"+stt+"'>Xóa</button></td>
			</tr>
		<?php endforeach ?>
	</table>
	<button style="margin-top: 5px;" type="submit" name="btnSubmitEdit" class="btn btn-success"><i class="fa fa-edit"></i>Cập nhật hóa đơn</button>
	</form>
</form>
</div>
