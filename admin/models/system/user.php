<?php
require "models/model.php";
class UserModel extends Model {
	public function __construct(){
		parent::__construct();
	}
	private $dataArr = array();
	private $data;
	private $flag = FALSE;
	public function getAllUser() {
		$this->data = $this->getAllInTable("user");
		return $this->data;
	}
	public function getUserById($id) {
		$this->data = $this->getInfoById($id,"user");
		return $this->data;
	}
	public function addUser($col,$data,$table) {
		$this->data = $this->insertTable($col,$data,$table);
		return $this->data;
	}
	public function checkOddPass($id,$pass) {
		$this->flag =  $this->checkPass($id,$pass);
		return $this->flag;
	}
	public function updateUser($id,$data) {
		$sql = " UPDATE user SET  {$data} WHERE user_id = {$id} ";
		if ($this->connection->query($sql) === TRUE) {
		   return $this->flag = TRUE;
		} else {
		   return $this->flag = FALSE;
		}
	}

}

?>