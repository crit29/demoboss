<?php 
require("config/db.php");
class Model extends Database
{
	
	function __construct()
	{
		parent::__construct();
	}
	private $_flag = FALSE;
	private $_data;
	private $_data1 = array();
	public function insertTable ($col,$data,$table) {
		$sql = "INSERT INTO {$table} ({$col}) VAlUES ({$data})";
		if ($this->connection->query($sql) === TRUE) {
		   return $this->_flag = TRUE;
		} else {
		   return $this->_flag = FALSE;
		}
	}
	public function getAllInTable($table) {
		$sql = " SELECT * FROM {$table}";
		$result = $this->connection->query($sql);
		$rstable = array();
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				$rstable[] = $row; 
			}
		}
		return $rstable;
	}
	public function getInfoById($id,$table) {
		$sql = " SELECT * FROM {$table} WHERE {$table}_id = {$id} LIMIT 1 ";
		$result = $this->connection->query($sql);
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				$this->_data = $row; 
			}
		}
		return $this->_data;

	}
	public function getLastId($table) {
		$sql = " SELECT * FROM {$table} ORDER BY {$table}_id DESC LIMIT 1 ";
		$result = $this->connection->query($sql);
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				$this->_data = $row; 
			}
		}
		return $this->_data;
	}
	public function findByWord($word,$col,$table) {
		$col = explode(",", $col);
		$find = implode(" LIKE '%".$word."%' or ", $col);
		$sql = " SELECT * FROM {$table} WHERE {$find} ";
		$result = $this->connection->query($sql);
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				$this->_data1[] = $row; 
			}
		}
		return $this->_data1;
	}
	public function delete($id,$table) {
		$sql = "DELETE FROM {$table} WHERE {$table}_id = {$id}";
		if ($this->connection->query($sql) === TRUE) {
		   return $this->_flag = TRUE;
		} else {
		   return $this->_flag = FALSE;
		}
	}
	// ffffff
	public function getListGroup(){
		$sql = " SELECT * FROM user_group";
		$result = $this->connection->query($sql);
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				$this->_data1[] = $row; 
			}
		}
		return $this->_data1;
	}
	public function checkPass($id,$pass) {
		$sql = " SELECT * FROM user WHERE user_id = '{$id}' AND password = '{$pass}' ";
		$result = $this->connection->query($sql);
		if ($result->num_rows > 0) {		
			$this->_flag = TRUE; 
		}
		return $this->_flag;
	}

}

?>