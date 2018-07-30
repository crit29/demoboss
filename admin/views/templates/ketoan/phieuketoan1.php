<div class="content">
	<script>
		$(document).ready(function(){

			$("#tableAddPKT").hide();
		    $("#btnAddPKT").click(function(){
		        $(this).hide();
		        $("#tableAddPKT").show(600);
		    });
		    $("#btnCancelAdd").click(function(){
		    	$("#tableAddPKT").hide(600);
		    	$("#btnAddPKT").show(900);
		    });
		});
	</script>			
	<h2><?= $title ?></h2>
	<!-- sửa phiếu kế toán -->
	<form action="?router=ketoan/phieuketoan&f=edit" method="post">
	<?php if (!isset($_GET['ac']) || $_GET['ac'] != 'fix') {
		echo "<script>$(document).ready(function(){
				$('#tableEditPKT').hide();
				});</script>";
	} ?>
	
	<table class="table table-bordered table-hover" id="tableEditPKT">
		<thead>
			<tr>
				<td colspan="5" style="border-right: 0"><i class="fa fa-plus"></i>Sửa Phiếu KT</td>
				<td style="border-left: 0"><button class="btn btn-danger pull-right" id="btnCancelAdd">X</button></td>
			</tr>
		</thead>
		<tbody>
			<tr>
				<th>Mã đơn vị</th>
				<td><input type="text" name="txtMadonvi" class="form-control" placeholder="mã đơn vị"></td>
				<th>Số ctừ</th>
				<td><input type="number" name="txtSoCtu" class="form-control" placeholder="Số ctừ"></td>
				<th>Tổng ps</th>
				<td><input type="number" name="txtTongps" class="form-control" placeholder="Tổng ps"></td>
			</tr>
			<tr>
				<th>Mã ngoại tệ</th>
				<td><select class="form-control" name="slcMant">
					<?php foreach ($listNgoaiTe as $nt) {
					?>
					<option  value="<?= $nt['ngoaite_id'] ?>"><?= $nt['ngoaite_ma'] ?> - <?= $nt['ngoaite_ten'] ?></option>
					<?php
					}
					?>
				</select></td>
				<th>Tỉ giá</th>
				<td><input type="number" name="txtTigia" class="form-control"></td>
				<th>Tổng ps vnd</th>
				<td><input type="number" class="form-control" name="txtTongpsvnd"></td>
			</tr>			
			<tr>
				<td colspan="6" class="bg-info">
					<table class="table table-bordered table-hover overx">
						<tr>
							<th colspan="11">Phiếu kế toán chi tiết</th>
						</tr>
						<tr>
							<th>STT</th>
							<th>tk</th>
							<th>Tên tk</th> 
							<th>Mã khách</th>
							<th>Tên Khách</th>
							<th width="120px;">ps nợ nt</th>
							<th width="120px;">ps có nt</th>
							<th>Diễn giải</th>
							<th width="120px;">ps nợ vnd</th>
							<th width="120px;">ps có vnd</th>
							<th>nhóm dk</th>
						</tr>
						<?php for ($u=0; $u < 3; $u++) { 
						?>
						<tr>
							<td><?= $u+1 ?></td>
							<td><input type="number" class="form-control" name="txtTk[]"></td>
							<td><input type="text" class="form-control" name="txtTentk[]"></td>
							<td><input type="text" class="form-control" name="txtMaKhach[]"></td>
							<td><input type="text" class="form-control" name="txtTenKhach[]"></td>
							<td><input type="number" class="form-control" name="txtPsnont[]"></td>
							<td><input type="number" class="form-control" name="txtPscont[]"></td>
							<td><input type="text" class="form-control" name="txtDiengiai[]"></td>
							<td><input type="number" class="form-control" name="txtPsnovnd[]"></td>
							<td><input type="number" class="form-control" name="txtPscovnd[]"></td>
							<td><input type="text" class="form-control" name="txtNhomdk[]"></td>
							
						</tr>
						<?php
						} ?>
						<tr>
							<td colspan="10"></td>
							<td><input type="button" class="btn btn-info" value="Thêm dòng" name=""></td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td colspan="5" style="border-right: 0"></td>
				<td style="border-left: 0"><button class="btn btn-success pull-right" type="submit" name="btnAdd"><i class="fa fa-upload"></i>Cập nhật</button></td>
			</tr>
		</tbody>
	</table>
	</form>
	<!-- thêm mới phiếu kế toán -->
	<button type="button" id="btnAddPKT" class="btn btn-primary"><i class="fa fa-plus fw"></i>Thêm mới</button><br><br>
	<form action="?router=ketoan/phieuketoan&f=add" method="post">
	<table class="table table-bordered table-hover" id="tableAddPKT">
		<thead>
			<tr>
				<td colspan="5" style="border-right: 0"><i class="fa fa-plus"></i>Thêm mới Phiếu KT</td>
				<td style="border-left: 0"><button class="btn btn-danger pull-right" id="btnCancelAdd">X</button></td>
			</tr>
		</thead>
		<tbody>
			<tr>
				<th>Mã đơn vị</th>
				<td><input type="text" name="txtMadonvi" class="form-control" placeholder="mã đơn vị"></td>
				<th>Số ctừ</th>
				<td><input type="number" name="txtSoCtu" class="form-control" placeholder="Số ctừ"></td>
				<th>Tổng ps</th>
				<td><input type="number" name="txtTongps" class="form-control" placeholder="Tổng ps"></td>
			</tr>
			<tr>
				<th>Mã ngoại tệ</th>
				<td><select class="form-control" name="slcMant">
					<?php foreach ($listNgoaiTe as $nt) {
					?>
					<option  value="<?= $nt['ngoaite_id'] ?>"><?= $nt['ngoaite_ma'] ?> - <?= $nt['ngoaite_ten'] ?></option>
					<?php
					}
					?>
				</select></td>
				<th>Tỉ giá</th>
				<td><input type="number" name="txtTigia" class="form-control"></td>
				<th>Tổng ps vnd</th>
				<td><input type="number" class="form-control" name="txtTongpsvnd"></td>
			</tr>			
			<tr>
				<td colspan="6" class="bg-info">
					<table class="table table-bordered table-hover overx">
						<tr>
							<th colspan="11">Phiếu kế toán chi tiết</th>
						</tr>
						<tr>
							<th>STT</th>
							<th>tk</th>
							<th>Tên tk</th> 
							<th>Mã khách</th>
							<th>Tên Khách</th>
							<th width="120px;">ps nợ nt</th>
							<th width="120px;">ps có nt</th>
							<th>Diễn giải</th>
							<th width="120px;">ps nợ vnd</th>
							<th width="120px;">ps có vnd</th>
							<th>nhóm dk</th>
						</tr>
						<?php for ($u=0; $u < 3; $u++) { 
						?>
						<tr>
							<td><?= $u+1 ?></td>
							<td><input type="number" class="form-control" name="txtTk[]"></td>
							<td><input type="text" class="form-control" name="txtTentk[]"></td>
							<td><input type="text" class="form-control" name="txtMaKhach[]"></td>
							<td><input type="text" class="form-control" name="txtTenKhach[]"></td>
							<td><input type="number" class="form-control" name="txtPsnont[]"></td>
							<td><input type="number" class="form-control" name="txtPscont[]"></td>
							<td><input type="text" class="form-control" name="txtDiengiai[]"></td>
							<td><input type="number" class="form-control" name="txtPsnovnd[]"></td>
							<td><input type="number" class="form-control" name="txtPscovnd[]"></td>
							<td><input type="text" class="form-control" name="txtNhomdk[]"></td>
							
						</tr>
						<?php
						} ?>
						<tr>
							<td colspan="10"></td>
							<td><input type="button" class="btn btn-info" value="Thêm dòng" name=""></td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td colspan="5" style="border-right: 0"></td>
				<td style="border-left: 0"><button class="btn btn-primary pull-right" type="submit" name="btnAdd"><i class="fa fa-plus"></i>Thêm mới</button></td>
			</tr>
		</tbody>
	</table>
	</form>
	
	<!-- danh sách phiếu kế toán -->
	<table class="table table-bordered table-hover">
		<thead>
			<tr>
				<th colspan="10"><i class="fa fa-list"></i>Danh sách phiếu</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<th width="60px">STT</th>
				<th>Mã đơn vị</th>
				<th>Số Ctừ</th>
				<th>Tổng Ps</th>
				<th>Mã Ngoại tệ</th>
				<th>Tỉ Giá</th>
				<th>Tổng ps vnd</th>
				<th width="170px;">Hành động</th>
			</tr>
			<?php $i = 1; foreach ($pkt as $key) {
			?>	
			<tr>
				<td><?= $i ?></td>
				<td><?= $key['ma_donvi'] ?></td>
				<td><?= $key['so_ctu'] ?></td>
				<td><?= $key['tong_ps'] ?></td>
				<td><?= $key['ngoaite_ma'] ?></td>
				<td><?= $key['ti_gia'] ?></td>
				<td><?= $key['tong_ps_vnd'] ?></td>
				<td>
					<a href="?router=ketoan/phieuketoan&ac=fix&id=<?= $key['so_ctu'] ?>" class="btn btn-warning"><i class="fa fa-edit"></i>Sửa</a>
					<a href="?router=ketoan/phieuketoan&f=del&id=<?= $key['so_ctu'] ?>" class="btn btn-danger" title=""><i class="fa fa-trash"></i> Xóa</a>
				</td>

			</tr>
			<tr>
				<td colspan="8" class="bg-info">
					<table class="table table-bordered table-hover">
						<tr>
							<td colspan="12"><h4>Phiếu kế toán chi tiết</h4></td>
						</tr>
						<tr>
							<th>STT</th>
							<th>tk</th>
							<th>Tên tk</th> 
							<th>Mã khách</th>
							<th>Tên Khách</th>
							<th>ps nợ <?= $key['ngoaite_ma'] ?></th>
							<th>ps có <?= $key['ngoaite_ma'] ?></th>
							<th>Diễn giải</th>
							<th>ps nợ vnd</th>
							<th>ps có vnd</th>
							<th>nhóm dk</th>
							<th>Hành động</th>
						</tr>
						<?php 
						$pktct = $this->db_pkt->getPktCt($key['so_ctu']);
						$j=1;foreach ($pktct as $ctiet) {
						?>
						<tr>
							<td><?= $j; $j++; ?></td>
							<td><?= $ctiet['tk'] ?></td>
							<td><?= $ctiet['ten_tk'] ?></td>
							<td><?= $ctiet['ma_khach'] ?></td>
							<td><?= $ctiet['ten_khach'] ?></td>
							<td><?= $ctiet['ps_no_nt'] ?></td>
							<td><?= $ctiet['ps_co_nt'] ?></td>
							<td><?= $ctiet['diengiai'] ?></td>
							<td><?= $ctiet['ps_no_vnd'] ?></td>
							<td><?= $ctiet['ps_co_vnd'] ?></td>
							<td><?= $ctiet['nhom_dk'] ?></td>
							<td></td>
						</tr>
						<?php
						}
						?>
					</table>
				</td>
			</tr>

			<?php
			$i++;
			} ?>
		</tbody>
	</table>
</div>