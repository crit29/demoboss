<?php 
require "controllers/controller.php";
require "models/dmdt/dmkh.php";
class Customer extends Controller {
	private $db_Cus;
    function __construct()
    {
        
        $this->db_Cus = new CustomerModel;
    }
	public function index($id = 999){
		// require LANGUAGE_DIRECT."dmdt/Customer.php";
		$title = "Danh mục khách hàng";
		$this->loadHeader($title);
		$this->loadSidebar();
		
		if (isset($_POST['btnSearch'])) {
			$txtSearch = $_POST['txtSearch'];
			$col = "ma_khach,customer_name,customer_phone,customer_address,customer_email";
			$data = $this->db_Cus->findCusByWord($txtSearch,$col,"customer");
		} else {
			$data = $this->db_Cus->getAllCustomer();
		}
		if (isset($_POST['btnExport'])) {
			require "extension/PHPExcel/Classes/PHPExcel.php";
			$excel = new PHPExcel();

			$excel->setActiveSheetIndex(0);
			$excel->getActiveSheet()->getColumnDimension('A')->setWidth(15);
			$excel->getActiveSheet()->getColumnDimension('B')->setWidth(15);
			$excel->getActiveSheet()->getColumnDimension('C')->setWidth(25);
			$excel->getActiveSheet()->getColumnDimension('D')->setWidth(25);
			$excel->getActiveSheet()->getColumnDimension('E')->setWidth(15);
			$excel->getActiveSheet()->getColumnDimension('F')->setWidth(15);
	
			$excel->getActiveSheet()->getStyle('A1:K1')->getFont()->setBold(true);

			$excel->getActiveSheet()->setCellValue('A1', 'Mã khách');
			$excel->getActiveSheet()->setCellValue('B1', 'Tên khách hàng');
			$excel->getActiveSheet()->setCellValue('C1', 'Số điện thoại');
			$excel->getActiveSheet()->setCellValue('D1', 'Địa chỉ');
			$excel->getActiveSheet()->setCellValue('E1', 'Email');
			$excel->getActiveSheet()->setCellValue('F1', 'Status');
			$numRow = 2;
			for ($i=0; $i < count($data) ; $i++) { 		
				$excel->getActiveSheet()->setCellValue('A'.$numRow, $data[$i]['ma_khach']);
				$excel->getActiveSheet()->setCellValue('B'.$numRow, $data[$i]['customer_name']);
				$excel->getActiveSheet()->setCellValue('C'.$numRow, $data[$i]['customer_phone']);
				$excel->getActiveSheet()->setCellValue('D'.$numRow, $data[$i]['customer_address']);
				$excel->getActiveSheet()->setCellValue('E'.$numRow, $data[$i]['customer_email']);
				$excel->getActiveSheet()->setCellValue('F'.$numRow, $data[$i]['status']);
				$numRow++;
			}
			// header('Content-type: application/vnd.ms-excel');
			// header('Content-Disposition: attachment; filename="danhmuckhachhang.xlsx"');
			// PHPExcel_IOFactory::createWriter($excel, 'Excel2007')->save('php://output');
			PHPExcel_IOFactory::createWriter($excel, 'Excel2007')->save('../danhmuckhachhang'.strtotime("now").'.xlsx');
			header("location:?router=dmdt/dmkh&export=ok");
		}
		if (isset($_POST['btnImport'])) {
			require "extension/PHPExcel/Classes/PHPExcel.php";
			$file = '../danhmuckhachhang.xlsx';
			$objFile = PHPExcel_IOFactory::identify($file);
			$objData = PHPExcel_IOFactory::createReader($objFile);

			$objData->setReadDataOnly(true);
			$objPHPExcel = $objData->load($file);
			$sheet  = $objPHPExcel->setActiveSheetIndex(0);

			$Totalrow = $sheet->getHighestRow();
			$LastColumn = $sheet->getHighestColumn();

			$TotalCol = PHPExcel_Cell::columnIndexFromString($LastColumn);
			$flag = TRUE;
			$data1 = [];

			for ($i = 2; $i <= $Totalrow; $i++)
			{
				for ($j = 0; $j < $TotalCol; $j++)
				{
					$data1[$i-2][$j]=$sheet->getCellByColumnAndRow($j, $i)->getValue();;
				}
			}
			for ($z=2; $z <= $Totalrow; $z++) { 

				$col = "ma_khach,customer_name,customer_phone,customer_address,customer_email,status";
				$feild = "'".$data1[$z-2][0]."'";
				$flag2 = $this->db_Cus->deleteCusByMaKhach($feild);
				for ($k=1; $k < $TotalCol; $k++) { 
					$feild .= ",'".$data1[$z-2][$k]."'";
				}
				if ($flag == TRUE) {
					
					$flag = $this->db_Cus->uploadEXdmkh($col,$feild);
				}
				
			}
			if ($flag == TRUE) {

				header("location:?router=dmdt/dmkh&m=okim");
			} else {
				header("location:?router=dmdt/dmkh&m=failim");

			}	
		}
		$dataF = $this->db_Cus->getCustomerById($id);
		require("views/templates/dmdt/dmkh.php");
		$this->loadFooter();
	}
	public function update() {
		if (isset($_POST['btnUpdateCus'])) {
			$id = $_GET['id'];
			$makhach = "ma_khach = '".$_POST['txtMaKhach']."',";
			$cusname = "customer_name = '".$_POST['txtCusname']."',";
			$phone = "customer_phone = '".$_POST['txtCusphone']."',";
			$address = "customer_address = '".$_POST['txtCusaddress']."',";
			$email = "customer_email = '".$_POST['txtCusemail']."',";
			$status = "status = '".$_POST['txtStatus']."'";
			$data = "";
			$data .= $makhach.$cusname.$phone.$address.$email.$status;
			$chk = $this->db_Cus->updateCus($id,$data);
			if ($chk == TRUE) {
				header("location:?router=dmdt/dmkh&m=okup");
			} else {
				header("location:?router=dmdt/dmkh&m=ike");
			}
		}
	}
	public function add() {
		if (isset($_POST['btnAddCus'])) {
			$makhach = $_POST['txtMaKhach'];
			$cusname = $_POST['txtCusname'];
			$phone = $_POST['txtCusphone'];
			$address = $_POST['txtCusaddress'];
			$email = $_POST['txtCusemail'];
			$status =$_POST['txtStatus'];
			
			$col = "ma_khach,customer_name,customer_phone,customer_address,customer_email,status";
			$data = "'".$makhach."','".$cusname."','".$phone."','".$address."','".$email."','".$status."'";
			$rs = $this->db_Cus->addCus($col,$data,"customer");
				if ($rs == TRUE) {
					header("location:?router=dmdt/dmkh&m=okad");
				} else {
					header("location:?router=dmdt/dmkh&m=ike");
				}
			}
	}
	public function quick(){
		$cusid = $_POST['cusID'];
		$status = $_POST['txtStatus'];
		if (isset($_POST['btnFastUpdate'])) {
			for ($i=0; $i < count($cusid); $i++) { 
				$this->db_Cus->quickUpdateStatus($cusid[$i],$status[$i]);
			}
		}
		if (isset($_POST['btnDeleteChk'])) {
			for ($j=0; $j < count($cusid); $j++) { 
				if (isset($_POST['chk{$cusid[$j]}'])) {
					$ck = $this->db_Cus->deleteCus($cusid[$j]);
				} else
				$m .= 'z';
			}
		}
		$page = $_GET['page'] ?? '1';
		header("location:?router=dmdt/dmkh&page=".$page."&m=".$m);
	}
	public function delete(){
		$id = $_GET['id'];
		$ck = $this->db_Cus->deleteCus($id);
		if ($ck == TRUE) {
			$this->index();
		}else{
			echo "fail";
		}
	}
	public function in(){
		$data = $this->db_Cus->getAllCustomer();
		require "views/templates/dmdt/dmkh-in.php";
	}

}
$us = new Customer;
if (isset($_GET['f']) && $_GET['f'] == 'edit') {
	$us->index($_GET['id']);
}elseif (isset($_GET['f']) && $_GET['f'] == 'update') {
	$us->update();
} elseif (isset($_GET['f']) && $_GET['f'] == 'add') {
	$us->add();
} elseif (isset($_GET['f']) && $_GET['f'] == 'quick') {
	$us->quick();
} elseif (isset($_GET['f']) && $_GET['f'] == 'delete') {
	$us->delete();
}elseif (isset($_GET['f']) && $_GET['f'] == 'in') {
	$us->in();
}else {
	$us->index();
}


?>
