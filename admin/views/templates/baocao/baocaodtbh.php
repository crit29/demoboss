<div class="content">
	<h2><?= $title ?></h2>
	<?php
	if (file_exists("E:\Vastco\CT70.xlsx")) {
		echo "<a href='?router=baocao/baocaodtbh&f=uploadCT70' class='btn btn-success' title=''><i class='fa fa-file-excel fw'></i>Import Excel CT70</a>";
	} else {
	// 	echo "<form action='?router=baocao/baocaodtbh&f=uploadCT70' method='post' enctype='multipart/form-data'>
	// 	<input style='float:left' type='file' class='btn' name='fileToUpload' id='fileToUpload'>
 //   		<button type='submit' class='btn btn-success'name='btnFileUpLoad'><i class='fa fa-file-excel fw'></i>Upload Excel CT70</button>
	// 	</form>";
	}
	
	?>
	<?php
	if (file_exists("E:\Vastco\CT00.xlsx")) {
		echo "<a href='?router=baocao/baocaodtbh&f=uploadCT00' class='btn btn-success' title=''><i class='fa fa-file-excel fw'></i>Import Excel CT00</a>";
	} else {
		// echo "<form action='?router=baocao/baocaodtbh&f=uploadCT00' method='post' enctype='multipart/form-data'>
		// <input type='file'  class='btn' name='fileToUpload' id='fileToUploadCT00'>
  //  		<button type='submit' class='btn btn-success'name='btnFileUpLoadCT00'><i class='fa fa-file-excel fw'></i>Upload Excel CT00</button>
  //  		<br>
		// </form>";
	}
	
	?>

	<a href="?router=baocao/baocaodtbh&f=xuatECT70" title="" class="btn btn-warning"><i class="fa fa-file-excel fw"></i>Export Excel</a>
	<br>
	<br>
	<table class="table table-bordered table-hover">
		<thead>
			<tr>
				<th colspan="4">Báo cáo doanh thu bán hàng</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<th>STT</th>
				<th>Tên sản phẩm</th>
				<th>Số lượng</th>
				<th>Doanh thu</th>

			</tr>
			<?php for ($i=0; $i < count($doanhthu); $i++) { 
			?>
			<tr>
				<td><?= $i+1; ?></td>
				<td><?= $doanhthu[$i]['ten_vt']; ?></td>
				<td><?= $doanhthu[$i]['SL']; ?></td>
				<td><?= $doanhthu[$i]['DT']; ?></td>
			</tr>
			<?php
			} ?>
		</tbody>
	</table>

</div>