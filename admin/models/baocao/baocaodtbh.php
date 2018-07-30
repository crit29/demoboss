<?php
require "models/model.php";
class BaoCaodtbhModel extends Model {
	public function __construct(){
		parent::__construct();
	}
	private $dataArr = array();
	private $data;
	private $flag = FALSE;
	public function uploadExcelCT70($col,$data) {
		$this->flag = $this->insertTable($col,$data,"ct70");
		return $this->flag;
	}
	public function uploadExcelCT00($col,$data) {
		$this->flag = $this->insertTable($col,$data,"ct00");
		return $this->flag;
	}
	public function getct70() {
		$this->data = $this->getAllInTable("ct70");
		return $this->data;
	}
	public function getDoanhThu() {
		$sql = " SELECT ct70.ma_vt, dmvt.ten_vt,sum(ct70.sl_xuat) as SL, sum(ct70.tien2) as DT  FROM ct70, dmvt WHERE ct70.ma_vt = dmvt.ma_vt group by ma_vt";
		$result = $this->connection->query($sql);
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				$this->dataArr[] = $row; 
			}
		}
		return $this->dataArr;
	}

}

?>