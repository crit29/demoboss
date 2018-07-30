<?php
require "models/model.php";
class PhieuKeToanModel extends Model {
	private $data;
	private $flag = FALSE;
	private $dataArr = array();
	public function __construct(){
		parent::__construct();
	}
	public function getInfoPKT(){
		$user_id = $_SESSION['user_id'];
		$sql = " SELECT * FROM phieuketoan a INNER JOIN ngoaite b ON a.ma_nt = b.ngoaite_id WHERE user_id = {$user_id} ORDER BY so_ctu  ";
		$result = $this->connection->query($sql);
		$rstable = array();
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				$rstable[] = $row; 
			}
		}
		return $rstable;
	}
	public function getPktCt($idpkt){
		$sql = " SELECT * FROM phieuketoan_chitiet WHERE pkt_id = {$idpkt} ";
		$result = $this->connection->query($sql);
		$rstable = array();
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				$rstable[] = $row; 
			}
		}
		return $rstable;
	}
	public function insertPKT($col,$data) {
		$this->flag = $this->insertTable($col,$data,"phieuketoan");
		return $this->flag;
	}
	public function updatePKT($id,$data) {
		$sql = " UPDATE phieuketoan SET {$data} WHERE so_ctu = {$id} ";
		if ($this->connection->query($sql) === TRUE) {
		   return $this->flag = TRUE;
		} else {
		   return $this->flag = FALSE;
		}
	}
	public function insertPktChitiet($col,$data) {
		$this->flag = $this->insertTable($col,$data,"phieuketoan_chitiet");
		return $this->flag;
	}
	public function delPkt($id) {
		$sql = "DELETE FROM phieuketoan WHERE so_ctu = {$id}";
		if ($this->connection->query($sql) === TRUE) {
		   return $this->flag = TRUE;
		} else {
		   return $this->flag = FALSE;
		}
	}
	public function delPktCt($id) {
		$sql = "DELETE FROM phieuketoan_chitiet WHERE pkt_id = {$id}";
		if ($this->connection->query($sql) === TRUE) {
		   return $this->flag = TRUE;
		} else {
		   return $this->flag = FALSE;
		}
	}
	public function getAllSoCtu() {
		$sql = " SELECT so_ctu FROM phieuketoan ";
		$result = $this->connection->query($sql);
		$rstable = array();
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				$rstable[] = $row; 
			}
		}
		return $rstable;
	}
	public function getInfoPKTbyID($id) {
		$sql = " SELECT * FROM phieuketoan a INNER JOIN ngoaite b ON a.ma_nt = b.ngoaite_id WHERE so_ctu = {$id} ";
		$result = $this->connection->query($sql);
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				$rs = $row; 
			}
		}
		return $rs;
	}
	public function getListNgoaiTe() {
		$this->data = $this->getAllInTable("ngoaite");
		return $this->data;
	}
	public function getListTk() {
		$this->data = $this->getAllInTable("tk");
		return $this->data;
	}
	public function getListKh() {
		$this->data = $this->getAllInTable("customer");
		return $this->data;
	}
}
?>