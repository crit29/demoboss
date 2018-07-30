<?php
require "models/model.php";
class DonViModel extends Model {
	public function __construct(){
		parent::__construct();
	}
	private $dataArr = array();
	private $data;
	private $flag = FALSE;
	public function getAllDv() {
		$this->data = $this->getAllInTable("dmdvcs");
		return $this->data;
	}
	public function insertDv($col,$data){
		$this->flag = $this->insertTable($col,$data,"dmdvcs");
		return $this->flag;
	}
	public function getDvById($id){
		$this->data = $this->getInfoById($id,"dmdvcs");
		return $this->data;
	}
	public function delDvById($id){
		$this->flag = $this->delete($id,"dmdvcs");
		return $this->flag;
	}
}

?>