<?php 
require "models/model.php";
class groupPermissionModel extends Model {
	public function __construct(){
		parent::__construct();
	}
	private $data = array();
	private $dataP;
	private $data1;
	private $flag = FALSE;
	public function getUserGroup() {
		$sql = " SELECT * FROM user_group WHERE user_group_id != 1 ";
		$result = $this->connection->query($sql);
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				$this->data[] = $row;
			}
		} 
		return $this->data;
	}
	public function getListPermission() {
		$this->dataP = $this->getInfoById(1,"user_group");
		return $this->dataP;
	}
	public function getUserGroupById($id) {

		$this->data1 = $this->getInfoById($id,"user_group");
		return $this->data1;
	}
	public function updateUGP($id,$name,$permission) {
		$sql = "UPDATE user_group SET name = '".$name."' , permission = '".$permission."' WHERE user_group_id = ".$id." ";

		if ($this->connection->query($sql) === TRUE) {
		   return $this->flag = TRUE;
		} else {
		   return $this->flag = FALSE;
		}
	}
	public function deleteGP($id) {
		$this->flag = $this->delete($id,"user_group");
		return $this->flag;
	}
}

?>