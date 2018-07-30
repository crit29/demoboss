<?php
require "models/model.php";
class HoaDonModel extends Model {
	public function __construct(){
		parent::__construct();
	}
	private $dataArr = array();
	private $data;
	private $flag = FALSE;
	public function getAllHd() {
		$sql = " SELECT * FROM hoadon a INNER JOIN kh b ON a.khachhang_id = b.kh_id
		 ORDER BY hoadon_id DESC ";
		$result = $this->connection->query($sql);
		$rstable = array();
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				$rstable[] = $row; 
			}
		}
		return $rstable;
	}
	public function getAllKh() {
		$this->data = $this->getAllInTable("kh");
		return $this->data;
	}
	public function insertHoaDon($col,$data){
		$this->flag = $this->insertTable($col,$data,"hoadon");
		return $this->flag;
	}
	public function getHdById($id){
		$this->data = $this->getInfoById($id,"hoadon");
		return $this->data;
	}
	public function getHdCtById($id){
		$sql = " SELECT * FROM hoadon_chitiet a JOIN sanpham b ON a.sanpham_ma = b.sanpham_id JOIN dmdvcs c ON a.donviban = c.dmdvcs_id	WHERE a.hoadon_id = {$id} ";
		$result = $this->connection->query($sql);
		$rstable = array();
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				$rstable[] = $row; 
			}
		}
		return $rstable;
	}
	public function getHoaDonCtById($id) {
		$sql = " SELECT a.hoadon_id,b.sanpham_ma,c.ten_dvcs,a.showroom,a.dongia,a.soluong,a.thanhtien FROM hoadon_chitiet a JOIN sanpham b ON a.sanpham_ma = b.sanpham_id JOIN dmdvcs c ON a.donviban = c.dmdvcs_id	WHERE a.hoadon_id = {$id} ";
		$result = $this->connection->query($sql);
		$rstable = array();
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				$rstable[] = $row; 
			}
		}
		return $rstable;
	}
	public function updateHoaDon($id,$data){
		$sql = "UPDATE hoadon SET {$data} WHERE hoadon_id = {$id} ";
		if ($this->connection->query($sql) === TRUE) {
		   return $this->flag = TRUE;
		} else {
		   return $this->flag = FALSE;
		}
	}
	public function delHdById($id){
		$this->flag = $this->delete($id,"hoadon");
		return $this->flag;
	}
	public function deleteHoaDonCt($id){
		$sql = "DELETE FROM hoadon_chitiet WHERE hoadon_id = {$id}";
		if ($this->connection->query($sql) === TRUE) {
		   return $this->flag = TRUE;
		} else {
		   return $this->flag = FALSE;
		}
	}
}

?>