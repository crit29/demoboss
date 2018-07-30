<div class="content">
	<h2><?= $title ?></h2>
	<table class="table table-bordered table-hover ">
		<thead>
			<tr>
				<th style="border-right: 0px" colspan="2">Thêm mới group</th>
				
				<th style="border-left: 0px"><a href="?router=system/grouppermission&f=add" class="btn btn-success pull-right title=""><i class="fa fa-plus fw"></i></a></th>
			</tr>
		</thead>
		<tbody>
			<tr>			
					<td></td>
			</tr>	
		</tbody>
	</table>
	<table class="table table-bordered table-hover ">
		<thead>
			<tr>
				<th width="60px">STT</th>
				<th>Group name</th>
				<th width="70px">Action</th>
			</tr>
		</thead>
		<tbody>
			<?php 
				for ($i=0; $i < count($data); $i++){
				$per[] = explode(',', $data[$i]['permission']);
			?>
			<tr>
				<th><?= $i+1 ?></th>
				<td><?= $data[$i]['name'] ?></td>
				<td><a href="?router=system/grouppermission&f=fix&id=<?= $data[$i]['user_group_id'] ?>" class="btn btn-primary" ><i class="fa fa-wrench fw"></i></a></td>
			</tr>
			<?php
				}

			?>
			
		</tbody>
	</table>

</div>