<script>
$(document).ready(function () {
	var counter = 0;

	$("#addrowedit").on("click", function () {
	    var newRow = $("<tr>");
	    var cols = "";

	    cols += '<td><input type="text" class="form-control" name="name' + counter + '"/></td>';
	    cols += '<td><input type="text" class="form-control" name="mail' + counter + '"/></td>';
	    cols += '<td><input type="text" class="form-control" name="phone' + counter + '"/></td>';

	    cols += '<td><input type="button" class="ibtnDel btn btn-md btn-danger "  value="Delete"></td>';
	    newRow.append(cols);
	    $("table.order-list").append(newRow);
	    counter++;
	});



	$("table.order-list").on("click", ".ibtnDel", function (event) {
	    $(this).closest("tr").remove();       
	    counter -= 1
	});


});
$(document).ready(function(){
    $("#addspdm").hide();
    $("#tbdetai").hide();
    $("#tbdetai1").hide();

    $('.select2').select2();

});
function addCus() {
   $("#addspdm").show(600);
   var btnAdd = document.getElementById("btnAdd");
   btnAdd.classList.add("hide");
}
function showdetail(){
	$("#tbdetai").show(600);
   
}
function showdetail1(){
	$("#tbdetai1").show(600);
   
}
function addRow() {
	var table = document.getElementById("tableAddNvl");
	var row = table.insertRow();
	var cell1 = row.insertCell(0);
	var cell2 = row.insertCell(1);
	var cell3 = row.insertCell(2);
	var cell4 = row.insertCell(3);
	cell1.innerHTML = "<select name='slcMaNv[]' class='form-control select2'><?php 
for ($p=0; $p < count($listNvl); $p++) { 
?>
<option value='<?= $listNvl[$p]["ma_nvl"] ?>'><?= $listNvl[$p]['ten_nvl'].' - '.$listNvl[$p]['ma_nvl'] ?></option><?php
} ?>
</select>";
	cell2.innerHTML = "<input type='text' class='form-control' name='txtSlNvl[]'>";
	cell3.innerHTML = "<input type='text' class='form-control' name='txtDgNvl[]'>";
	cell4.innerHTML = "<input type='text' class='form-control' name='txtTtNvl[]'>";
	$('.select2').select2();
}
function addRowF() {
	var table = document.getElementById("tableEdit");
	var row = table.insertRow();
	var cell1 = row.insertCell(0);
	var cell2 = row.insertCell(1);
	var cell3 = row.insertCell(2);
	var cell4 = row.insertCell(3);
	var cell5 = row.insertCell(4);
	cell1.innerHTML = "<select name='slcMaNvl[]' class='form-control select2'><?php 
for ($p=0; $p < count($listNvl); $p++) { 
?>
<option value='<?= $listNvl[$p]["ma_nvl"] ?>'><?= $listNvl[$p]['ten_nvl'].' - '.$listNvl[$p]['ma_nvl'] ?></option><?php
} ?>
</select>";
	cell2.innerHTML = "<input type='number' class='form-control' name='txtSlNvl[]'>";
	cell3.innerHTML = "<input type='number' class='form-control' name='txtDgNvl[]'>";
	cell4.innerHTML = "<input type='number' class='form-control' name='txtTtNvl[]'>";
	cell5.innerHTML = "<input type='button' onclick='delRowF()' class='del-row btn btn-danger pull-right' value='Del Row'>";
	$('.select2').select2();
}
function delRowF() {
	var table = document.getElementById("tableEdit");
	var row = table.deleteRow(2);
}
function deleteRow() {
	var table = document.getElementById("tableAddNvl");
	var row = table.deleteRow(2);
}

<?php 
	for ($k=0; $k < count($listSPDM); $k++) { 
		
?>
	$(document).ready(function(){
		$("#list-nvldm<?= $k ?>").hide(100);
		$("#btnClose<?= $k ?>").hide(100);
	});
	function info<?= $k ?>() {
		$("#list-nvldm<?= $k ?>").show(99);
		$("#btnInfo<?= $k ?>").hide(99);
		$("#btnClose<?= $k ?>").show(99);
	}
	function close<?= $k ?>() {
		$("#list-nvldm<?= $k ?>").hide(99);
		$("#btnInfo<?= $k ?>").show(99);
		$("#btnClose<?= $k ?>").hide(99);
	}
<?php
	}
?>
</script>
<div class="content">
	<h2><?= $title ?></h2>

	<!-- sửa sản phẩm định mức -->
	<form action="?router=dmvt/spdm&f=editSpdm" method="post" >
	<table id="" class=" <?php if(!isset($_GET['ac']) || $_GET['ac']!='edit') echo "hide"; ?>  table table-bordered table-hover">
		<thead>
			<tr>
				<th colspan="6">Sửa sản phẩm định mức</th>
			</tr>
		</thead>
		<tbody>
			
			<tr>
				<input type="hidden" name="txtidspdm" value="<?= $_GET['id']?>">
				<th><label>Mã sản phẩm</label></th>
				<td><input type="text" name="txtMaSp" value="<?= $spdmid['ma_sp'] ?>" class="form-control"></td>
				<th><label>SL sản phẩm</label></th>
				<td><input type="number" name="txtSlSp" value="<?= $spdmid['sl_dm'] ?>" class="form-control"></td>
				<th><label>Ngày định mức</label></th>
				<td><input type="date" readonly name="txtDatedm" value="<?= $spdmid['ngay_dm'] ?>" class="form-control"></td>
			</tr>
			<tr>
				<td colspan="6">
					<table id="tableEdit" class="table table-bordered table-hover">
						<h4>Nguyên vật liệu</h4>
						<thead>
							<tr>
								
								<th width="329px">Mã nvl</th>
								<th>SL nvl</th>
								<th>Đơn giá</th>
								<th>Thành tiền</th>
								<th width="70px">Action</th>
							</tr>
						</thead>
						<tbody>
							<!-- <form action=""  method="post"> -->
							<?php for ($q=0; $q < count($nvledit); $q++) { 	
								?>	
							<tr>
								<input type="hidden" name="numberedit" value="<?= count($nvledit) ?>">							
								<td><select name="slcMaNvl[]" class="form-control select2">
									<?php for ($p=0; $p < count($listNvl); $p++) { 
									?>
										<option <?php if ($nvledit[$q]['ma_nvl']==$listNvl[$p]['ma_nvl']) {
											echo "selected";
										} ?>
										value="<?= $listNvl[$p]['ma_nvl'] ?>"><?= $listNvl[$p]['ten_nvl']." - ".$listNvl[$p]['ma_nvl']  ?> </option>
									<?php
									} ?>
									
								
								</select></td>
								<input type="hidden" name="txtidnvldm[]" value="<?= $nvledit[$q]['nvldm_id'] ?>">
								<td><input type="number" value="<?= $nvledit[$q]['sl_nvl'] ?>" class="form-control" name="txtSlNvl[]"></td>
								<td><input type="number" value="<?= $nvledit[$q]['dongia_nvl'] ?>" class="form-control" name="txtDgNvl[]"></td>
								<td><input type="number" value="<?= $nvledit[$q]['thanhtien_nvl'] ?>" class="form-control" name="txtTtNvl[]"></td>
								<td>
									 <a href="?router=dmvt/spdm&f=deletenvl&id1=<?= $nvledit[$q]['nvldm_id'] ?>&id2=<?= $_GET['id'] ?>" class="btn btn-danger"><i class="fa fa-times fw"></i>Xóa</a> 

							</tr>
							<?php }
								
							?>

							
						</tbody>

					</table>
					<input type="submit" class="add-row btn btn-warning pull-right" name="btnCapNhat"  value="Cập nhật">
					<input style="margin-right: 8px" type="button" id="addrowedit" onclick="addRowF()" class="add-row btn btn-info pull-right" value="Thêm dòng">
					
				</td>
			</tr>
			
		</tbody>
	</table>
	</form>
	<!-- thêm mới sản phẩm định mức  -->
	<button id="btnAdd" class="btn btn-primary" onclick="addCus()"><i class="fa fa-plus fa-spin fw"></i>Thêm mới</button>
	<br><br>
	
	<form action="?router=dmvt/spdm&f=addSpdm" method="post" >
	<table id="addspdm" class=" table table-bordered table-hover">
		<thead>
			<tr>
				<th colspan="6">Thêm mới sản phẩm định mức</th>
			</tr>
		</thead>
		<tbody>
			
			<tr>
				<th><label>Mã sản phẩm</label></th>
				<td><input type="text" name="txtMaSp" class="form-control" value="<?= $spdmcopy['ma_sp'] ?>"></td>
				<th><label>SL sản phẩm</label></th>
				<td><input type="number" name="txtSlSp" class="form-control"></td>
				<th><label>Ngày định mức</label></th>
				<td><input type="date" readonly name="txtDatedm" value="<?= date("Y-m-d"); ?>" class="form-control"></td>
			</tr>
			<tr>
				<td colspan="6">
					<table id="tableAddNvl" class="table table-bordered table-hover">
						<h4>Nguyên vật liệu</h4>
						<thead>
							<tr>
								
								<th width="329px">Tên nvl</th>
								<th>SL nvl</th>
								<th>Đơn giá</th>
								<th>Thành tiền</th>
								<th width="70px">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php for ($m=0; $m < count($nvlcopy); $m++) { 
							?>
							
							<tr>	
								 <td><select style="width: 100%" name="slcMaNv[]" class="form-control select2">
									
									<?php for ($p=0; $p < count($listNvl); $p++) { 
									?>
										<option <?php if ($nvlcopy[$m]['ma_nvl'] == $listNvl[$p]['ma_nvl']) {
											echo "selected";
										} ?> value="<?= $listNvl[$p]['ma_nvl'] ?>"><?= $listNvl[$p]['ten_nvl']." - ".$listNvl[$p]['ma_nvl'] ?> </option>
									<?php
									} ?>
									
									
								</select></td> 
								<!-- <td>
									<select id="resultSmv" class="form-control" name="slcMaNv[]">
										<div  id="resultSmv">
											<input type="text" id="searchManvl" class="" >

										</div>
									</select>
								</td> -->

								<td><input type="number" value="<?= $nvlcopy[$m]['sl_nvl'] ?>" class="form-control" name="txtSlNvl[]"></td>
								<td><input type="number" value="<?= $nvlcopy[$m]['dongia_nvl']?>" class="form-control" name="txtDgNvl[]"></td>
								<td><input type="number" value="<?= $nvlcopy[$m]['thanhtien_nvl']?>" class="form-control" name="txtTtNvl[]"></td>
								<td><input type="button" class="btn btn-danger" onclick="deleteRow()" value="DelRow"></td>
							</tr>
							<?php } ?>
					<!-- 		<tr>
								<td colspan="3"></td>
								<td>
									

								</td>
								<td><button type="button" id="" class="btn btn-primary"><i class="fa fa-plus fw"></i>Thêm dòng</button></td>
							</tr> -->
						</tbody>
					</table>
					<input type="submit" name="btnAddSpdm" class="add-row btn btn-primary pull-right"  value="Thêm mới">
					<input style="margin-right: 8px" type="button" onclick="addRow()" class="add-row btn btn-info pull-right" value="Add Row">
				</td>
			</tr>
			
		</tbody>
	</table>
	</form>

	<!-- Danh sách sản phẩm định mức -->
	<form action="?router=dmvt/spdm&f=deleteMulti" method="POST">
	<table id="dsspdm" class=" table table-bordered table-hover">
		<thead>
			<tr>
				<th colspan="6">Danh sách sản phẩm định mức</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<th width="30px"></th>
				<th width="50px">STT</th>
				<th>Sản Phẩm</th>
				<th>Ngày</th>
				<th>SLSP</th>
				<th width="320px">Hành động</th>
			
			</tr>
			<?php 
			if (isset($_GET['page'])) {
					$page = $_GET['page'];
				}else{
					$page = 1;
				}

				if (count($listSPDM) == 0) {
					echo "<tr><td colspan='5'>Không có dữ kiệu!</td></tr>";
				}
				
				$i= ($page-1)*10+1;
				if ($i>count($listSPDM)-10) {
					$k = count($listSPDM);
				}else 
				$k= $i+10;
				for ($i;$i < $k; $i++) { 
			
				$spdmid = $listSPDM[$i]['spdm_id'];
			?>
			<tr>
				<td><input type="checkbox" name="chkDel[]" value="<?= $listSPDM[$i]['spdm_id'] ?>"></td>
				<td> <?= $i ?> </td>
				<td><?= $listSPDM[$i]['ma_sp'] ?></td>
				<td><?= $listSPDM[$i]['ngay_dm'] ?></td>
				<td><?= $listSPDM[$i]['sl_dm'] ?></td>
				<td><input type="button" id="btnInfo<?= $i ?>" onclick="info<?= $i ?>()" href="" class="btn btn-info"  value="Chi tiết">
				<input type="button" id="btnClose<?= $i ?>" onclick="close<?= $i ?>()" href="" class="btn"  value="Đóng" style="width: 69px">	
				<a href="?router=dmvt/spdm&ac=edit&id=<?= $spdmid  ?>" class="btn btn-warning" title=""><i class="fa fa-edit fw"></i>Sửa</a>
				<a href="?router=dmvt/spdm&f=deleteSpdm&id=<?= $spdmid ?>" class="btn btn-danger" title=""><i class="fa fa-trash fw"></i>Xóa</a>
				<a href="?router=dmvt/spdm&ac=copySpdm&idcp=<?= $spdmid ?>" class="btn btn-default" title=""><i class="fa fa-copy fw"></i>Copy</a>
				</td>
			</tr>
			<tr id="list-nvldm<?= $i ?>" class="list-nvldm">
				<td></td>
				<td colspan="5">
					<h3>Danh sách nguyên vật liệu <?= $listSPDM[$i]['ma_sp'] ?></h3>
					<table class="table table-bordered table-hover">
						<thead>
							<tr>
								<th width="50px">STT</th>
								<th>Mã NVL</th>
								<th>SL NVL</th>
								<th>Đơn giá</th>
								<th>Thành tiền</th>
							</tr>
						</thead>
						<tbody>
							<?php 

							$listNvlDm = $this->db_spdm->getListNVL($spdmid);
							foreach ($listNvlDm as $key1 => $vlNvlDm) {
							?>
							<tr>

								<td><?= $key1+1 ?></td>
								<td><?= $vlNvlDm['ma_nvl'] ?></td>
								<td><?= $vlNvlDm['sl_nvl'] ?></td>
								<td><?= $vlNvlDm['dongia_nvl'] ?></td>
								<td><?= $vlNvlDm['thanhtien_nvl'] ?></td>
							</tr>
							<?php

							}

							?>
							
						</tbody>
					</table>
				</td>
			</tr>
			<?php

			} ?>
			<tr>
				<th colspan="5" style="text-align:center;font-size: 16px">Page: 
					<?php 
						for ($j=0; $j <= (count($listSPDM)-1)/10; $j++) { 
						?>
						<a href="?router=dmvt/spdm&page=<?=$j+1?>" class="btn" style="border: 1px solid green;border-radius: 3px" title=""><?=$j+1?></a>
						<?php	
						}

					 ?>
				</th>
				<th><button type="submit" class="btn btn-danger pull-right">Xóa mục đã chọn</button></th>

			</tr>
		</tbody>
	</table>
	</form>
</div>