<?php
require "models/model.php";
class NhanVienModel extends Model {
	public function __construct(){
		parent::__construct();
	}
	private $dataArr = array();
	private $data;
	private $flag = FALSE;
	public function getAllNv() {
		$this->data = $this->getAllInTable("nhanvien");
		return $this->data;
	}
	public function insertNhanVien($col,$data){
		$this->flag = $this->insertTable($col,$data,"nhanvien");
		return $this->flag;
	}
	public function getNvById($id){
		$this->data = $this->getInfoById($id,"nhanvien");
		return $this->data;
	}
	public function delNvById($id){
		$this->flag = $this->delete($id,"nhanvien");
		return $this->flag;
	}
}

?>