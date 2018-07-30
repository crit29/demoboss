<div class="content">
	<script>
		
		$(document).ready(function(){

			$("#tableAddPKT").hide();
			$('.select2').select2();
		    $("#btnAddPKT").click(function(){
		        $(this).hide();
		        $("#tableAddPKT").show(600);
		    });
		    $("#btnCancelAdd").click(function(){
		    	$("#tableAddPKT").hide(600);
		    	$("#btnAddPKT").show(900);
		    });
		    $("#addRowEdit").click(function(){
		    	$("#tableCtietEdit").append("<tr><td></td><td><input type='number' class='form-control'  name='txtTk[]'></td><td><input type='text' class='form-control'  name='txtMaKhach[]'></td><td><input type='number' class='form-control'  name='txtPsnont[]'></td><td><input type='number' class='form-control' name='txtPscont[]'></td><td><input type='text' class='form-control' name='txtDiengiai[]'></td><td><input type='number' readonly class='form-control'  name='txtPsnovnd[]'></td><td><input type='number' readonly class='form-control' name='txtPscovnd[]'></td><td><input type='text' class='form-control' name='txtNhomdk[]'></td></tr>");
		    });
		    $("#addRowAdd").click(function(){
		    	$("#tableCtietAdd").append("<tr><td></td><td><input type='number' class='form-control'  name='txtTk[]'></td><td><input type='text' class='form-control'  name='txtMaKhach[]'></td><td><input type='number' class='form-control'  name='txtPsnont[]'></td><td><input type='number' class='form-control' name='txtPscont[]'></td><td><input type='text' class='form-control' name='txtDiengiai[]'></td><td><input type='number' readonly class='form-control'  name='txtPsnovnd[]'></td><td><input type='number' readonly class='form-control' name='txtPscovnd[]'></td><td><input type='text' class='form-control' name='txtNhomdk[]'></td></tr>");
		    });
		    function checkTongPsNt(nt,vnd){
		    	if ($('#sstongpsnont').val() !=  $('#sstongpscont').val()) {
		    		 document.getElementById("btnAdd").disabled = true;
		    		 $('#txtTongps').val(nt);
		    		 $('#txtTongpsvnd').val(vnd);
		    	} else {
		    		document.getElementById("btnAdd").disabled = false;
		    	}
		    }
		    function checkTongPsVnd(){
		    	if ($('#sstongpsnovnd').val() !=  $('#sstongpscovnd').val()) {
		    		 document.getElementById("btnAdd").disabled = true;
		    	} else {
		    		document.getElementById("btnAdd").disabled = false;
		    	}
		    }
		    var tongpsnont = 0, tongpscont = 0, tongpsnovnd = 0, tongpscovnd = 0  ;
		    <?php for ($l=1; $l <= 3; $l++) { 
		    ?>
		    // $("#txtPsnont<?= $l ?>").change(function(){		   	
		    // 	tongpsnont +=  parseInt($(this).val());
		    // 	$('#sstongpsnont').val(tongpsnont);
		    // 	checkTongPsNt();
		    // });
		    $("#txtPsnont<?= $l ?>").change(function(){
				var tigia = parseInt($('#txtTigia').val());
		    	<?php for ($k1 =1; $k1 <= 3; $k1++) { 
		   		 ?>
		    		tongpsnont += parseInt($('#txtPsnont<?= $k1 ?>').val());
		    		$('#txtPsnovnd<?= $k1 ?>').val(parseInt($('#txtPsnont<?= $k1 ?>').val())* tigia);
		    	<?php
		    	}	?>   	
		    			
		    	tongpsnovnd = tongpsnont * tigia;
		    	$('#sstongpsnont').val(tongpsnont);
		    	$('#sstongpsnovnd').val(tongpsnovnd);
		    	checkTongPsNt(tongpsnont,tongpsnovnd);
		    	tongpsnont = 0;tongpsnovnd = 0;
		    	
		    });
		    $("#txtPscont<?= $l ?>").change(function(){	
		    	var tigia2 = parseInt($('#txtTigia').val());	
		   		 <?php for ($k2 =1; $k2 <= 3; $k2++) { 
		   		 ?>
		    		tongpscont += parseInt($('#txtPscont<?= $k2 ?>').val());
		    		$('#txtPscovnd<?= $k2 ?>').val(parseInt($('#txtPscont<?= $k2 ?>').val())* tigia2);
		    	<?php
		    	}	?> 
		    	
     			tongpscovnd = tongpscont * tigia2;
     			$('#sstongpscovnd').val(tongpscovnd);
		    	$('#sstongpscont').val(tongpscont);
		    	checkTongPsNt(tongpscont,tongpscovnd);
		    	tongpscont = 0;tongpscovnd = 0;
		    	
		    });
		    <?php
		    } ?>


		    // JS tinh tong phan chinh sua
		    var tongpsnontE = 0, tongpscontE = 0, tongpsnovndE = 0, tongpscovndE = 0  ;
		    <?php for ($h=0; $h < 3; $h++) { 
		    ?>
		    // $("#txtPsnont<?= $l ?>").change(function(){		   	
		    // 	tongpsnont +=  parseInt($(this).val());
		    // 	$('#sstongpsnont').val(tongpsnont);
		    // 	checkTongPsNt();
		    // });
		    $("#txtPsnontE<?= $h ?>").change(function(){
				var tigiaE = parseInt($('#txtTigiaE').val());
		    	<?php for ($e1 = 0; $e1 < 3; $e1++) { 
		   		 ?>
		    		tongpsnontE += parseInt($('#txtPsnontE<?= $e1 ?>').val());
		    		$('#txtPsnovndE<?= $e1 ?>').val(parseInt($('#txtPsnontE<?= $e1 ?>').val())* tigiaE);
		    	<?php
		    	}	?>   	
		    			
		    	tongpsnovndE = tongpsnontE * tigiaE;
		    	$('#tongpsnontE').val(tongpsnontE);
		    	$('#tongpsnovndE').val(tongpsnovndE);
		    	checkTongPsNt(tongpsnontE,tongpsnovndE);
		    	tongpsnontE = 0;tongpsnovndE = 0;
		    	
		    });
		    $("#txtPscontE<?= $h ?>").change(function(){	
		    	var tigiaE2 = parseInt($('#txtTigiaE').val());	
		   		 <?php for ($e2 =0; $e2 < 3; $e2++) { 
		   		 ?>
		    		tongpscont += parseInt($('#txtPscontE<?= $e2 ?>').val());
		    		$('#txtPscovndE<?= $e2 ?>').val(parseInt($('#txtPscontE<?= $e2 ?>').val())* tigiaE2);
		    	<?php
		    	}	?> 
		    	
     			tongpscovndE = tongpscontE * tigiaE2;
     			$('#tongpscovndE').val(tongpscovndE);
		    	$('#tongpscontE').val(tongpscontE);
		    	checkTongPsNt(tongpscontE,tongpscovndE);
		    	tongpscontE = 0;tongpscovndE = 0;  	
		    });
		    <?php
		    } ?>
		    
		});
	<?php 
		for ($k=1; $k <= count($pkt); $k++) { 
	?>
	$(document).ready(function(){
		$("#tbChil<?= $k ?>").hide(200);
		$("#btnClose<?= $k ?>").hide(200);
	});
	function showTbChil<?= $k ?>() {
		$("#tbChil<?= $k ?>").show(200);
		$("#btnChiTiet<?= $k ?>").hide(200);
		$("#btnClose<?= $k ?>").show(200);
	}
	function closeTbChil<?= $k ?>() {
		$("#tbChil<?= $k ?>").hide(200);
		$("#btnChiTiet<?= $k ?>").show(200);
		$("#btnClose<?= $k ?>").hide(200);
	}
	<?php } ?>
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
				<td style="border-left: 0"><a href="?router=ketoan/phieuketoan" class="btn btn-danger pull-right">X</a></td>
			</tr>
		</thead>
		<tbody>
			<tr>
				<th>Mã đơn vị</th>
				<td><input type="text" required value="<?= $pktinfo['ma_donvi'] ?>" name="txtMadonvi" class="form-control" placeholder="mã đơn vị"></td>
				<th>Số ctừ</th>
				<td><input type="number" name="txtSoCtu" value="<?= $pktinfo['so_ctu'] ?>" class="form-control" placeholder="Số ctừ">
				<input type="hidden" name="txtSoCtuOld" readonly value="<?= $pktinfo['so_ctu'] ?>" class="form-control" placeholder="Số ctừ"></td>
				<th>Tổng ps</th>
				<td><input type="number" id="txtTongpsE" readonly name="txtTongps" value="<?= $pktinfo['tong_ps'] ?>" class="form-control" placeholder="Tổng ps"></td>
			</tr>
			<tr>
				<th>Mã ngoại tệ</th>
				<td><select class="form-control" name="slcMant">
					<?php foreach ($listNgoaiTe as $nt) {
					?>
					<option <?php if ($pktinfo['ma_nt'] == $nt['ngoaite_id']) {
						echo "selected";
					} ?>  value="<?= $nt['ngoaite_id'] ?>"><?= $nt['ngoaite_ma'] ?> - <?= $nt['ngoaite_ten'] ?></option>
					<?php
					}
					?>
				</select></td>
				<th>Tỉ giá</th>
				<td><input type="number" id="tigia" name="txtTigiaE" value="<?= $pktinfo['ti_gia'] ?>" class="form-control"></td>
				<th>Tổng ps vnd</th>
				<td><input type="number" class="form-control" value="<?= $pktinfo['tong_ps_vnd'] ?>" readonly  name="txtTongpsvnd"></td>
			</tr>			
			<tr>
				<td colspan="6" class="bg-info">
					<table class="table table-bordered table-hover overx" id="tableCtietEdit">
						<tr>
							<th colspan="9">Phiếu kế toán chi tiết</th>
						</tr>
						<tr>
							<th>STT</th>
							<th>tk</th>
							<th>Mã khách</th>
							<th width="120px;">ps nợ nt</th>
							<th width="120px;">ps có nt</th>
							<th>Diễn giải</th>
							<th width="120px;">ps nợ vnd</th>
							<th width="120px;">ps có vnd</th>
							<th>nhóm dk</th>
						</tr>
						
						<?php 
						$pktctedit = $this->db_pkt->getPktCt($_GET['id']);
						for ($u=0; $u < count($pktctedit); $u++) { 
						?>
						<tr>
							<td><?= $u+1 ?></td>
							
							<td><select class="form-control select2" name="txtTk[]" style="width: 100%">
								<option>-- Chọn tài khoản</option>
								<?php foreach ($listTk as $tk) {
								?>
								<option <?php if ($pktctedit[$u]['tk'] == $tk['tk_id'] )
								echo "selected";
								?>
								value="<?= $tk['tk_id'] ?>"><?= $tk['ten_tk'] ?> - <?= $tk['tk_id'] ?></option>
								<?php
								}
								?>
							</select></td>
							
							<td><select class="form-control select2" name="txtMaKhach[]" style="width: 100%">
								<?php foreach ($listKh as $kh) {
								?>
								<option  value="<?= $kh['customer_id'] ?>"><?= $kh['customer_name'] ?> - <?= $kh['ma_khach'] ?></option>
								<?php
								}
								?>
							</select></td>
							<td><input type="number" class="form-control" value="<?= $pktctedit[$u]['ps_no_nt'] ?>" id="txtPsnontE<?= $u ?>" name="txtPsnont[]"></td>
							<td><input type="number" id="txtPscontE<?= $u ?>" class="form-control"value="<?= $pktctedit[$u]['ps_co_nt'] ?? 0 ?>" name="txtPscont[]"></td>
							<td><input type="text" class="form-control" value="<?= $pktctedit[$u]['diengiai'] ?>" name="txtDiengiai[]"></td>
							<td><input type="number" id="txtPsnovndE<?= $u ?>" readonly class="form-control" value="<?= $pktctedit[$u]['ps_no_vnd'] ?? 0 ?>" id="txtPsnovnd<?= $u ?>" name="txtPsnovnd[]"></td>
							<td><input type="number" readonly id="txtPscovndE<?= $u ?>" class="form-control" value="<?= $pktctedit[$u]['ps_co_vnd'] ?? 0 ?>" name="txtPscovnd[]"></td>
							<td><input type="text" class="form-control" value="<?= $pktctedit[$u]['nhom_dk'] ?>" name="txtNhomdk[]"></td>
							
						</tr>
						<?php
						} ?>
						<tfoot>
							<tr>
								<th colspan="2">Tổng:</th>
								<th>Ngoại tệ:</th>
								<td><input readonly type="text" name="" id="tongpsnontE" class="form-control" value="0"></td>
								<td><input readonly type="text" name="" id="tongpscontE" class="form-control" value="0"></td>
								<th>Vnd: </th>
								<td><input readonly type="text" name="" id="tongpsnovndE" class="form-control" value="0"></td>
								<td><input readonly type="text" name="" id="tongpscovndE" class="form-control" value="0"></td>
								<td><input type="button" class="btn btn-info" value="Thêm dòng" id="addRowEdit" name=""></td>
							</tr>
						</tfoot>
						
					</table>
				</td>
			</tr>
			<tr>
				<td colspan="5" style="border-right: 0"></td>
				<td style="border-left: 0"><button class="btn btn-success pull-right" type="submit" name="btnEdit"><i class="fa fa-upload"></i>Cập nhật</button></td>
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
				<td><input type="number" id="txtTongps" name="txtTongps" class="form-control" placeholder="Tổng ps"></td>
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
				<td><input type="number" id="txtTigia" value="1" name="txtTigia" class="form-control"></td>
				<th>Tổng ps vnd</th>
				<td><input type="number" class="form-control" id="txtTongpsvnd" name="txtTongpsvnd"></td>
			</tr>			
			<tr>
				<td colspan="6" class="bg-info">
					<table class="table table-bordered table-hover overx" id="tableCtietAdd">
						<tr>
							<th colspan="11">Phiếu kế toán chi tiết</th>
						</tr>
						<tr>
							<th>STT</th>
							<th>tk</th>
							<th>Mã khách</th>
							<th width="120px;">ps nợ nt</th>
							<th width="120px;">ps có nt</th>
							<th>Diễn giải</th>
							<th width="120px;">ps nợ vnd</th>
							<th width="120px;">ps có vnd</th>
							<th>nhóm dk</th>
						</tr>
						<?php for ($u=1; $u <= 3; $u++) { 
						?>
						<tr>
							<td><?= $u ?></td>
							<!-- <td><input type="number" class="form-control" name="txtTk[]"></td> -->
							<td><select class="form-control select2" name="txtTk[]" style="width: 100%">
								<option>-- Chọn tài khoản</option>
								<?php foreach ($listTk as $tk) {
								?>
								<option  value="<?= $tk['tk_id'] ?>"><?= $tk['ten_tk'] ?> - <?= $tk['tk_id'] ?></option>
								<?php
								}
								?>
							</select></td>
							<td><select class="form-control select2" name="txtMaKhach[]" style="width: 100%">
								<?php foreach ($listKh as $kh) {
								?>
								<option  value="<?= $kh['customer_id'] ?>"><?= $kh['customer_name'] ?> - <?= $kh['ma_khach'] ?></option>
								<?php
								}
								?>
							</select></td>
							
							<td><input type="number" value="0" class="form-control" id="txtPsnont<?= $u ?>" name="txtPsnont[]"></td>
							<td><input type="number" value="0" class="form-control" id="txtPscont<?= $u ?>" name="txtPscont[]"></td>
							<td><input type="text" class="form-control" name="txtDiengiai[]"></td>
							<td><input type="number" value="0" readonly class="form-control" id="txtPsnovnd<?= $u ?>" name="txtPsnovnd[]"></td>
							<td><input type="number" value="0" readonly class="form-control" id="txtPscovnd<?= $u ?>" name="txtPscovnd[]"></td>
							<td><input type="text" class="form-control" name="txtNhomdk[]"></td>
							
						</tr>
						<?php
						} ?>
						<tfoot>
							<tr>
								<th colspan="2">Tổng:</th>
								<th>Ngoại tệ:</th>
								<td><input readonly type="text" name="" id="sstongpsnont" class="form-control" value="0"></td>
								<td><input readonly type="text" name="" id="sstongpscont" class="form-control" value="0"></td>
								<th>Vnd: </th>
								<td><input readonly type="text" name="" id="sstongpsnovnd" class="form-control" value="0"></td>
								<td><input readonly type="text" name="" id="sstongpscovnd" class="form-control" value="0"></td>
								<td><input readonly type="button" id="addRowAdd" class="btn btn-info" value="Thêm dòng" name=""></td>
							</tr>
						</tfoot>
						
					</table>
				</td>
			</tr>
			<tr>
				<td colspan="5" style="border-right: 0"></td>
				<td style="border-left: 0"><button class="btn btn-primary pull-right" type="submit" name="btnAdd" id="btnAdd"><i class="fa fa-plus"></i>Thêm mới</button></td>
			</tr>
		</tbody>
	</table>
	</form>
	
	<!-- danh sách phiếu kế toán -->
	<table class="table table-bordered table-hover">
		<thead>
			<tr>
				<th colspan="8"><i class="fa fa-list"></i>Danh sách phiếu</th>
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
				<th width="305px">Hành động</th>
			</tr>
			<?php
			if (isset($_GET['page'])) {
				$page = $_GET['page'];
			}else{
				$page = 1;
			}

			if (count($pkt) == 0) {
				echo "<tr><td colspan='10'>Không có dữ kiệu!</td></tr>";
			}
			
			$i= ($page-1)*10+1;
			if ($i>count($pkt)-10) {
				$k = count($pkt);
			}else 
			$k= $i+10	;
			for ($i;$i < $k+1; $i++) { 
			?>	
			<tr>
				<td><?= $i ?></td>
				<td><?= $pkt[$i-1]['ma_donvi'] ?></td>
				<td><?= $pkt[$i-1]['so_ctu'] ?></td>
				<td><?= $pkt[$i-1]['tong_ps'] ?></td>
				<td><?= $pkt[$i-1]['ngoaite_ma'] ?></td>
				<td><?= $pkt[$i-1]['ti_gia'] ?></td>
				<td><?= $pkt[$i-1]['tong_ps_vnd'] ?></td>
				<td>
					<input type="button" class="btn btn-info"  value="Chi tiết" onclick="showTbChil<?= $i ?>()" id="btnChiTiet<?= $i ?>" name="">
					<input type="button" class="btn"  value="Đóng" onclick="closeTbChil<?= $i ?>()" id="btnClose<?= $i ?>" name="" style="width: 69px">
					<a href="?router=ketoan/phieuketoan&ac=fix&id=<?= $pkt[$i-1]['so_ctu'] ?>" class="btn btn-warning"><i class="fa fa-edit"></i>Sửa</a>
					<a href="?router=ketoan/phieuketoan&f=del&id=<?= $pkt[$i-1]['so_ctu'] ?>" class="btn btn-danger" title=""><i class="fa fa-trash"></i> Xóa</a>
					<a href="?router=ketoan/phieuketoan&f=in&id=<?= $pkt[$i-1]['so_ctu'] ?>" target="_blank" class="btn btn-info"><i class="fa fa-print"></i>In</a>
				</td>

			</tr>
			<tr id="tbChil<?= $i ?>">
				<td colspan="8" class="bg-info">
					<table class="table table-bordered table-hover" >
						<tr>
							<td colspan="12"><h4>Phiếu kế toán chi tiết</h4></td>
						</tr>
						<tr>
							<th>STT</th>
							<th>tk</th>
							<th>Mã khách</th>
							<th>ps nợ <?= $pkt[$i-1]['ngoaite_ma'] ?></th>
							<th>ps có <?= $pkt[$i-1]['ngoaite_ma'] ?></th>
							<th>Diễn giải</th>
							<th>ps nợ vnd</th>
							<th>ps có vnd</th>
							<th>nhóm dk</th>
							<th>Hành động</th>
						</tr>
						<?php 
						
						$pktct = $this->db_pkt->getPktCt($pkt[$i-1]['so_ctu']);
						$j=1;foreach ($pktct as $ctiet) {
						?>
						<tr>
							<td><?= $j; $j++; ?></td>
							<td><?= $ctiet['tk'] ?></td>
							<td><?= $ctiet['ma_khach'] ?></td>
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
			} ?>
			<tr>
				<th colspan="10" style="text-align:center;font-size: 16px">Trang: 
					<?php 
						for ($j=0; $j <= (count($pkt)-1)/10; $j++) { 
						?>
						<a href="?router=ketoan/phieuketoan&page=<?=$j+1?>&s=<?= $_GET['s'] ?>" class="btn" style="border: 1px solid green;border-radius: 3px" title=""><?=$j+1?></a>
						<?php	
						}
					 ?>
				</th>

			</tr>
		</tbody>
	</table>

</div>