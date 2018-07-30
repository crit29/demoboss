<div class="content">
	<h2><?= $title ?></h2>
	<!-- Chỉnh sửa group -->
	<table class="table table-bordered table-hover <?php if(!isset($_GET['id'])&&!isset($_GET['f'])){echo "disable";} ?> ">
		<form action="?router=system/grouppermission&f=update&id=<?= $dataPID['user_group_id']; ?>" method="POST">
		<thead>
			<tr>
				<th >Edit group user</th>
				<th ><input type="submit" class="btn btn-success pull-right" name="btnUpdatePer" value="Cập nhật" ></th>
			</tr>
		</thead>
		<tbody>
			
			<tr>
				<th width="170px">User group name</th>
				<td><input type="text" class="form-control" value="<?= $dataPID['name'] ?>" name="txtUGN"></td>
			</tr>
			<tr>
				<th>Permission</th>
				<td>
				<div class="listPer">
					<?php
						for ($k=0; $k < count($per); $k++) { 
					?>
					<div><label><input type="checkbox" 
						<?php

						if (in_array($per[$k], $per2)) {
						echo "checked";
						} ?> 
						value="<?= $per[$k] ?>" name="chk<?= $k ?>"> <?= $_["text_".$per[$k]] ?></label>
					</div>
					<?php
						}
					?>
				</div></td>
			</tr>
			<tr>
				<th><input type="hidden" name="countPer" value="<?= count($per) ?>"></th>
				
			</tr>
		</tbody>
		</form>
	</table>
	<!-- Thêm mới group  -->
	<table class="table table-bordered table-hover ">
		<form action="?router=system/grouppermission&f=add">
		<thead>
			<tr>
				<th style="border-right: 0px" colspan="2">Thêm mới group</th>
				
				<th style="border-left: 0px;float: right"><button type="submit" class="btn btn-success" name="btnSubmitAdd"><i class='fa fa-plus fw'></i>Thêm mới	</button></th>
			</tr>
		</thead>
		<tbody>
			<tr>			
				<td>User Group Name<input type="hidden" name="countPer" value="<?= count($per) ?>"></td>
				<td colspan="2"><input type="text" name="txtGName" class="form-control" ></td>
				
			</tr>
			<tr>
				<td>Permission</td>
				<td colspan="2">
				<div class="listPer">
					<?php
						for ($k=0; $k < count($per); $k++) { 
					?>
					<div><label><input type="checkbox" value="<?= $per[$k] ?>" name="chk<?= $k ?>"> <?= $_["text_".$per[$k]] ?></label>
					</div>
					<?php
						}
					?>
				</div></td>
			</tr>	
		</tbody>
	</table>
	<table class="table table-bordered table-hover ">
		<thead>
			<tr>
				<th width="60px">STT</th>
				<th>Group name</th>
				<th width="165px">Action</th>
			</tr>
		</thead>
		<tbody>
			<?php 
				for ($i=0; $i < count($data); $i++){
				
			?>
			<tr>
				<th><?= $i+1 ?></th>
				<td><?= $data[$i]['name'] ?></td>
				<td><a href="?router=system/grouppermission&f=fix&id=<?= $data[$i]['user_group_id'] ?>" class="btn btn-primary" ><i class="fa fa-wrench fw"></i>Sửa</a> <a href="?router=system/grouppermission&f=delete&id=<?= $data[$i]['user_group_id'] ?>" title="" class="btn btn-danger"><i class="fa fa-trash-alt fw"></i>Xóa</a></td>
			</tr>
			<?php
				}

			?>

		</tbody>
	</table>

</div>