<?php 
require("controllers/controller.php");
require "models/baocao/baocaodtbh.php";
class BaoCaodtbh extends Controller {
	
	private $db_bcdt;
    function __construct()
    {
        
        $this->db_bcdt = new BaoCaodtbhModel;
    }
	public function index() {
		$title = 'Báo cáo doanh thu';
		$this->loadHeader($title);
		$this->loadSidebar();
		$doanhthu = $this->db_bcdt->getDoanhThu();
		require("views/templates/baocao/baocaodtbh.php");
		$this->loadFooter();
	}
	public function uploadCT70(){
		require_once 'extension/PHPExcel/Classes/PHPExcel.php';
		if (isset($_POST['btnFileUpLoad'])) {
			
		} else {
			$file = 'E:\Vastco\CT70.xlsx';

			$objFile = PHPExcel_IOFactory::identify($file);
			$objData = PHPExcel_IOFactory::createReader($objFile);
			$objData->setReadDataOnly(true);
			$objPHPExcel = $objData->load($file);
			$sheet  = $objPHPExcel->setActiveSheetIndex(0);
			$Totalrow = $sheet->getHighestRow();
			$LastColumn = $sheet->getHighestColumn();

			$TotalCol = PHPExcel_Cell::columnIndexFromString($LastColumn);
			$flag = TRUE;
			$data = [];
			for ($i = 2; $i <= $Totalrow; $i++)
			{
				for ($j = 0; $j < $TotalCol; $j++)
				{
					$data[$i-2][$j]=$sheet->getCellByColumnAndRow($j, $i)->getValue();
				}
			}
			for ($z=2; $z < $Totalrow; $z++) { 
				$col = "ma_ct,ngay_ct,so_ct,ma_kh,ma_vt,sl_nhap,sl_xuat,gia2,tien2,gia,tien_xuat";
				$feild = "'".$data[$z-2][0]."',STR_TO_DATE('".$data[$z-2][1]."', '%d-%m-%Y')";
				for ($k=2; $k < $TotalCol; $k++) { 
					$feild .= ",'".$data[$z-2][$k]."'";
				}
				if ($flag == TRUE) {
					$flag = $this->db_bcdt->uploadExcelCT70($col,$feild);
				}
				
			}
			if ($flag == TRUE) {
				header("location:?router=baocao/baocaodtbh&m=ok");
			} else {
				header("location:?router=baocao/baocaodtbh&m=fail");

			}	
			
		}
	}
	
	public function uploadCT00(){
		require_once 'extension/PHPExcel/Classes/PHPExcel.php';
		if (isset($_POST['btnFileUpLoadCT00'])) {
			
		} else {
			$file1 = 'E:\Vastco\CT00.xlsx';

			$objFile = PHPExcel_IOFactory::identify($file1);
			$objData = PHPExcel_IOFactory::createReader($objFile);
			$objData->setReadDataOnly(true);
			$objPHPExcel = $objData->load($file1);
			$sheet  = $objPHPExcel->setActiveSheetIndex(0);
			$Totalrow = $sheet->getHighestRow();
			$LastColumn = $sheet->getHighestColumn();

			$TotalCol = PHPExcel_Cell::columnIndexFromString($LastColumn);
			$flag = TRUE;
			$data = [];
			for ($i = 2; $i <= $Totalrow; $i++)
			{
				for ($j = 0; $j < $TotalCol; $j++)
				{
					$data[$i-2][$j]=$sheet->getCellByColumnAndRow($j, $i)->getValue();
				}
			}
			for ($p = 2; $p < $Totalrow; $p++) { 

				$col = "st_rec,ma_dvsc,ma_ct,ngay_ct,ngay_lct,so_ct,so_lo,ngay_lo,ong_ba,dien_giai,nh_dk,tk,tk_du,ps_no_nt,ps_co_nt,ma_nt,ty_gia,ps_no,ps_co,ma_kh,tk_cn,ma_vv,ma_nk,ma_td,ma_ku,user_id0,date0,time0,user_id2,date2,time2,status,so_dh,so_ct0,ngay_ct0,ct_nxt,ma_gd,ln,ma_td2,ma_td3,ngay_td1,sl_td1,sl_td2,sl_td3,gc_td1,gc_td2,gc_td3,ngay_td2,ngay_td3";
				// st_rec,ma_dvsc,ma_ct,ngay_ct,ngay_lct,so_ct,so_lo,ngay_lo,ong_ba,dien_giai,nh_dk,tk,tk_du,ps_no_nt,ps_co_nt,ma_nt,ty_gia,ps_no,ps_co,ma_kh,tk_cn,ma_vv,ma_nk,ma_td,ma_ku,user_id0,date0,time0,user_id2,date2,time2,status,so_dh,so_ct0,ngay_ct0,ct_nxt,ma_gd,ln,ma_td2,ma_td3,ngay_td1,sl_td1,sl_td2,sl_td3,gc_td1,gc_td2,gc_td3,ngay_td2,ngay_td3
				$feild = "'".$data[$p-2][0]."'";
				for ($v=1; $v < $TotalCol; $v++) { 
					if ($v==4||$v==5||$v==8||$v==27||$v==30||$v==35||$v==41||$v==48||$v==49) {
						$feild .= ",STR_TO_DATE('".$data[$p-2][$v]."', '%d-%m-%Y')";
					} else {
						$feild .= ",'".$data[$p-2][$v]."'";
					}
				}
				if ($flag == TRUE) {
					$flag = $this->db_bcdt->uploadExcelCT00($col,$feild);
				}
				
			}
			if ($flag == TRUE) {
				 header("location:?router=baocao/baocaodtbh&m=ok");
				
			} else {
				 header("location:?router=baocao/baocaodtbh&m=fail");

			}	
			
		}
	}
	public function xuatECT70() {
		require_once 'extension/PHPExcel/Classes/PHPExcel.php';
		$data = $this->db_bcdt->getct70();
		$excel = new PHPExcel();
		//Chọn trang cần ghi (là số từ 0->n)
		$excel->setActiveSheetIndex(0);

		//Xét in đậm cho khoảng cột
		$excel->getActiveSheet()->getStyle('A1:K1')->getFont()->setBold(true);

		$excel->getActiveSheet()->setCellValue('A1', 'Ma_ct');
		$excel->getActiveSheet()->setCellValue('B1', 'Ngay_ct');
		$excel->getActiveSheet()->setCellValue('C1', 'So_ct');
		$excel->getActiveSheet()->setCellValue('D1', 'Ma_kh');
		$excel->getActiveSheet()->setCellValue('E1', 'Ma_vt');
		$excel->getActiveSheet()->setCellValue('F1', 'Sl_nhap');
		$excel->getActiveSheet()->setCellValue('G1', 'Sl_xuat');
		$excel->getActiveSheet()->setCellValue('H1', 'Gia2');
		$excel->getActiveSheet()->setCellValue('I1', 'Tien2');
		$excel->getActiveSheet()->setCellValue('J1', 'Gia');
		$excel->getActiveSheet()->setCellValue('K1', 'Tien_xuat');
		// thực hiện thêm dữ liệu vào từng ô bằng vòng lặp
		// dòng bắt đầu = 2
		$numRow = 2;
		for ($i=0; $i < count($data) ; $i++) { 		
			$excel->getActiveSheet()->setCellValue('A'.$numRow, $data[$i]['ma_ct']);
			$excel->getActiveSheet()->setCellValue('B'.$numRow, $data[$i]['ngay_ct']);
			$excel->getActiveSheet()->setCellValue('C'.$numRow, $data[$i]['so_ct']);
			$excel->getActiveSheet()->setCellValue('D'.$numRow, $data[$i]['ma_kh']);
			$excel->getActiveSheet()->setCellValue('E'.$numRow, $data[$i]['ma_vt']);
			$excel->getActiveSheet()->setCellValue('F'.$numRow, $data[$i]['sl_nhap']);
			$excel->getActiveSheet()->setCellValue('G'.$numRow, $data[$i]['sl_xuat']);
			$excel->getActiveSheet()->setCellValue('H'.$numRow, $data[$i]['gia2']);
			$excel->getActiveSheet()->setCellValue('I'.$numRow, $data[$i]['tien2']);
			$excel->getActiveSheet()->setCellValue('J'.$numRow, $data[$i]['gia']);
			$excel->getActiveSheet()->setCellValue('K'.$numRow, $data[$i]['tien_xuat']);
			
			$numRow++;
		}

		$a = PHPExcel_IOFactory::createWriter($excel, 'Excel2007')->save('../ct70'.strtotime("now").'.xlsx');
		header("location:?router=baocao/baocaodtbh&m=ok");
		
	}

}
$bc = new BaoCaodtbh;
$obj = $_GET['f'] ?? 'index';
$bc->$obj();

?>