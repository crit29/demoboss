<?php 

class SideBarModel extends Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	private $data;
	public function getPermission($group_id) {
		$sql = " SELECT permission FROM user_group WHERE user_group_id = '".$group_id."' ";
		$result = $this->connection->query($sql);
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				$this->data = $row['permission'];
			}
		}
		return $this->data;
	}
	
}


?>