<div class="content">
	<script>
		$(document).ready(function(){
			$('#tbList').DataTable( {
		        "language": {
		            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Vietnamese.json"
		        }
		    } );
		    
		});  
	</script>	
	<h2><?= $title ?></h2>
	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tbAdd"><i class="fa fa-plus"></i>Thêm mới</button><br><br>

	<!-- Modal -->
	<div id="tbAdd" class="modal fade" role="dialog">
	  <div class="modal-dialog">

	    <!-- Modal content-->
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">Modal Header</h4>
	      </div>
	      <div class="modal-body">
	        <p>Some text in the modal.</p>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	      </div>
	    </div>

	  </div>
	</div>
	<!-- danh sách sản phẩm -->
	<table class="table table-bordered table-hover" id="tbList">
		<thead>
			<tr>
				<th>STT</th>
				<th>Mã sản phẩm</th>
				<th>Tên sản phẩm</th>
				<th>Giá</th>
				<th>Giá khuyến mãi</th>
				<th width="180px">Hành động</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($dataList as $key => $value): ?>
			<tr>
				<td><?php echo $key+1 ?></td>
				<td><?php echo $value['sanpham_ma'] ?></td>
				<td><?php echo $value['sanpham_ten'] ?></td>
				<td><?php echo $value['sanpham_gia'] ?></td>
				<td><?php echo $value['sanpham_giakhuyenmai'] ?></td>
				<td>
					<a href="?router=dmvt/sanpham&ac=edit&id=<?php echo $value['sanpham_id'] ?>" class="btn btn-warning">Sửa</a>
					<a href="?router=dmvt/sanpham&ac=edit&id=<?php echo $value['sanpham_id'] ?>" class="btn btn-danger">Xóa</a>
				</td>
			</tr>	
			<?php endforeach ?>
			
		</tbody>
	</table>
</div>