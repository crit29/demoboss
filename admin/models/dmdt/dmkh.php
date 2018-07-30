<?php
require "models/model.php";
class CustomerModel extends Model {
	public function __construct(){
		parent::__construct();
	}
	private $dataArr = array();
	private $data;
	private $flag = FALSE;
	public function getAllCustomer() {
		$this->data = $this->getAllInTable("customer");
		return $this->data;
	}
	public function chkCusMa_khach($mk){
		$sql = " SELECT user_id FROM customer WHERE ma_khach = '{$mk}' ";
		$result = $this->connection->query($sql);
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				$this->data = $row; 
			}
		}
		return $this->data;
	}
	public function addCus($col,$data,$table) {
		$this->data = $this->insertTable($col,$data,$table);
		return $this->data;
	}
	public function getCustomerById($id) {
		$this->data = $this->getInfoById($id,"customer");
		return $this->data;
	}
	public function findCusByWord($word,$col,$table) {
		$this->data = $this->findByWord($word,$col,$table);
		return $this->data;
	}
	public function updateCus($id,$data) {
		$sql = " UPDATE customer SET  {$data} WHERE customer_id = {$id} ";
		if ($this->connection->query($sql) === TRUE) {
		   return $this->flag = TRUE;
		} else {
		   return $this->flag = FALSE;
		}
	}
	public function uploadEXdmkh($col,$data) {
		$this->flag = $this->insertTable($col,$data,"customer");
		return $this->flag;
	}
	public function deleteCus($id){
		$this->flag = $this->delete($id,"customer");
		return $this->flag;
	}
	public function deleteCusByMaKhach($mk){
		$sql = "DELETE FROM customer WHERE ma_khach = {$mk} ";
		if ($this->connection->query($sql) === TRUE) {
		   return $this->flag = TRUE;
		} else {
		   return $this->flag = FALSE;
		}
	}
	public function quickUpdateStatus($cusid, $status){
		$sql = "UPDATE customer SET status = {$status} WHERE customer_id = '{$cusid}'";
		if ($this->connection->query($sql) === TRUE) {
		    $this->flag = TRUE;
		} 
		return $this->flag;
	}
}

?>