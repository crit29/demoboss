<?php
require "models/model.php";
class SanPhamModel extends Model {
	public function __construct(){
		parent::__construct();
	}
	private $dataArr = array();
	private $data;
	private $flag = FALSE;
	public function getListSanPham() {
		$sql = " SELECT * FROM sanpham  ";
		$result = $this->connection->query($sql);
		$rstable = array();
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				$rstable[] = $row; 
			}
		}
		return $rstable;
	}

	public function insertSanPham($col,$data){
		$this->flag = $this->insertTable($col,$data,"sanpham");
		return $this->flag;
	}
	public function getSanPhamById($id){
		$this->data = $this->getInfoById($id,"sanpham");
		return $this->data;
	}

	public function delSanPhamById($id){
		$this->flag = $this->delete($id,"sanpham");
		return $this->flag;
	}
}

?>