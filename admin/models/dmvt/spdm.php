<?php
require "models/model.php";
class SanPhamDinhMucModel extends Model {
	private $data;
	private $flag = FALSE;
	private $dataArr = array();
	public function __construct(){
		parent::__construct();
	}
	public function getSanPhamDM(){
		$this->data = $this->getAllInTable("spdm");
		return $this->data;
	}
	public function searchNVL($search) {
		$sql = " SELECT * FROM nvl WHERE ten_nvl like '%{$search}%' or ma_nvl like '%{$search}%' ";
		$result = $this->connection->query($sql);
		$kq1 = array();
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {

				$kq1[] = $row; 
			}
		}
		return $kq1;
	}
	public function getNvl(){
		$this->data = $this->getAllInTable("nvl");
		return $this->data;
	}
	public function getListNVL($id) {
		$sql = " SELECT * FROM nvldm WHERE spdm_id = {$id} ";
		$result = $this->connection->query($sql);
		$kq = array();
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {

				$kq[] = $row; 
			}
		}
		return $kq;
	}
	public function getSanPhamDmById($id){
		$sql = " SELECT * FROM spdm WHERE spdm_id = {$id} LIMIT 1";
		$result = $this->connection->query($sql);
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				$this->data = $row; 
			}
		}
		return $this->data;
	}
	public function getSanPhamDmByMaSp($masp){
		$sql = " SELECT spdm_id FROM spdm WHERE ma_sp = '{$masp}' LIMIT 1";
		$result = $this->connection->query($sql);
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				$this->data = $row; 
			}
		}
		return $this->data;
	}
	public function insertSpdm($col,$data){
		$this->flag = $this->insertTable($col,$data,"spdm");
		return $this->flag;
	}
	public function insertNvldm($col,$data){
		$this->flag = $this->insertTable($col,$data,"nvldm");
		return $this->flag;
	}
	public function updateSpdm($data,$id) {
		$sql = " UPDATE spdm SET {$data} WHERE spdm_id = {$id} ";
		if ($this->connection->query($sql) === TRUE) {
		   return $this->flag = TRUE;
		} else {
		   return $this->flag = FALSE;
		}
	}

	public function updateNvldm($data,$id) {
		$sql = " UPDATE nvldm SET {$data} WHERE nvldm_id = {$id} ";
		if ($this->connection->query($sql) === TRUE) {
		   return $fl = TRUE;
		} else {
		   return $fl = FALSE;
		}
	}
	
	public function deleteNvldmById($id){
		$this->flag = $this->delete($id,"nvldm");
		return $this->flag;
	}
	public function deleteSpdmById($id){
		$this->flag = $this->delete($id,"spdm");
		return $this->flag;
	}
	public function deleteSpdmByMaSP($masp) {
		$sql = "DELETE FROM spdm WHERE ma_sp = '{$masp}' ";
		if ($this->connection->query($sql) === TRUE) {
		   return $this->flag = TRUE;
		} else {
		   return $this->flag = FALSE;
		}
	}
	public function deleteNvlByIdSp($id){
		$sql = "DELETE FROM nvldm WHERE spdm_id = '{$id}' ";
		if ($this->connection->query($sql) === TRUE) {
		   return $this->flag = TRUE;
		} else {
		   return $this->flag = FALSE;
		}
	}
}
?>