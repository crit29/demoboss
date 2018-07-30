<div class="content">
	<h2><?= $title ?></h2>
	<!-- Sửa tài khoản -->
	<table class="table table-bordered table-hover <?php if(!isset($_GET['id'])){echo "disable";} ?> ">
		<form method="POST" action="?router=system/user&f=update&id=<?= $dataF['user_id'] ?>">
		<thead>
			<tr>
				<th style="border-right: 0px" colspan="5">Chỉnh sửa tài khoản</th>
				<th style="border-left: 0px; float: right;"><button type="submit" class="btn btn-warning" name="btnSubmitUpdate"><i class="fa fa-edit fw"></i>Cập nhật</button></th>
			</tr>
		</thead>
		<tbody>
			
			<tr>
				<td>Username</td>
				<td><input type="text" value="<?= $dataF['username'] ?>" name="txtUsername" class="form-control"></td>
				<td>Email</td>
				<td><input type="Email" value="<?= $dataF['email'] ?>" name="txtEmail" class="form-control"></td>
				<td>User Group</td>
				<td><select class="form-control" name="secUsergroup">
					<option value="1">Administrator</option>
					<option value="2">User</option>}
					option
				</select></td>
			</tr>
			<tr>
				<td>Password</td>
				<td><input type="text"  name="txtPassword" class="form-control"></td>
				<td>Confirm Password</td>
				<td><input type="text" name="txtCfimPassword" class="form-control"></td>
				<td>Status</td>
				<td><select class="form-control" name="secStatus">
					<option value="1">Enable</option>
					<option value="0">Disable</option>}
					option
				</select></td>
			</tr>
			<tr>
				<td>First Name</td>
				<td><input type="text" value="<?= $dataF['firstname'] ?>" name="txtFirstName" class="form-control"></td>
				<td>Last Name</td>
				<td><input type="text" value="<?= $dataF['lastname'] ?>" name="txtLastName" class="form-control"></td>
				<td>Old Password</td>
				<td><input type="text" name="txtOldPass"  class="form-control"></td>
			</tr>
		</tbody>
		</form>
	</table>

	<!-- Thêm mới tài khoản -->
	<table  class="table table-bordered table-hover ">
		<form action="?router=system/user&f=add" method="post">
		<thead>
			<tr>
				<th style="border-right: none" colspan="5">Thêm mới tài khoản</th>
				<th style="border-left: none;"><button type="submit" class="btn btn-primary pull-right" name="btnAdd"><i class="fa fa-plus fw"></i>Thêm mới</button></th>
			</tr>
		</thead>
		<tbody>
			
			<tr>
				<td>Username</td>
				<td><input type="text" name="txtUsername" class="form-control"></td>
				<td>Email</td>
				<td><input type="Email" name="txtEmail" class="form-control"></td>
				<td>User Group</td>
				<td><select class="form-control" name="secUsergroup">
					<option value="1">Administrator</option>
					<option value="2">User</option>}
				</select></td>
			</tr>
			<tr>
				<td>Password</td>
				<td><input type="text" name="txtPassword" class="form-control"></td>
				<td>Confirm Password</td>
				<td><input type="text" name="txtCfimPassword" class="form-control"></td>
				<td>Status</td>
				<td><select class="form-control" name="secStatus">
					<option value="1">Enable</option>
					<!-- <option value="0">Disable</option>} -->
				</select></td>
			</tr>
			<tr>
				<td>First Name</td>
				<td><input type="text" name="txtFirstName" class="form-control"></td>
				<td>Last Name</td>
				<td><input type="text" name="txtLastName" class="form-control"></td>
				<td>Date added</td>
				<td><input type="text" name="dateAdd" value="<?= date("Y-m-d"); ?>" readonly class="form-control"></td>
			</tr>
		</tbody>
		</form>
	</table>
	<!-- Danh sách tài khoản -->
	<table class="table table-bordered table-hover ">
		<thead>
			<tr>
				<th colspan="8">Danh sách tài khoản</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<th width="50px">STT</th>
				<th>Username</th>
				<th>User Group</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th width="180px">Email</th>
				<th>Status</th>
				<th width="165px">Action</th>

			</tr>
			<?php for ($i=0; $i < count($data); $i++) { 
			?>
			<tr>
				<td><?= $i+1 ?></td>
				<td><?= $data[$i]['username'] ?></td>
				<td><?= $data[$i]['user_group_id'] ?></td>
				<td><?= $data[$i]['firstname'] ?></td>
				<td><?= $data[$i]['lastname'] ?></td>
				<td><?= $data[$i]['email'] ?></td>
				<td><?php if ($data[$i]['status'] == 1) {
					echo "Enable";
				} else { echo "Disable";} ?></td>
				<td><a href="?router=system/user&f=fix&id=<?= $data[$i]['user_id'] ?>" class="btn btn-warning" title=""><i class="fa fa-edit"></i>Sửa</a> <a href="?router=system/user&f=fix&id=<?= $data[$i]['user_id'] ?>" class="btn btn-danger" title=""><i class="fa fa-trash"></i>Xóa</a></td>
			</tr>
			<?php
			} ?>

		</tbody>
	</table>
</div>
