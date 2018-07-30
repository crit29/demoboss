<?php
require "models/model.php";
class TaiKhoanModel extends Model {
	public function __construct(){
		parent::__construct();
	}
	private $dataArr = array();
	private $data;
	private $flag = FALSE;
	public function getAllTk() {
		$this->data = $this->getAllInTable("tk");
		return $this->data;
	}
	public function insertTk($col,$data){
		$this->flag = $this->insertTable($col,$data,"tk");
		return $this->flag;
	}
	public function getTkById($id){
		$this->data = $this->getInfoById($id,"tk");
		return $this->data;
	}
	public function delTkById($id){
		$this->flag = $this->delete($id,"tk");
		return $this->flag;
	}
}

?>