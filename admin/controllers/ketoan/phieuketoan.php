<?php
require "controllers/controller.php" ;
require "models/ketoan/phieuketoan.php";

class PhieuKeToan extends Controller
{
	private $db_pkt;
	function __construct()
	{
		$this->db_pkt = new PhieuKeToanModel;
	}
	public function index() {
		$title = "Phiếu Kế Toán";
		$this->loadHeader($title);
		$this->loadSideBar();
		if (isset($_GET['ac']) && $_GET['ac'] == 'fix') {
			$idpkt = $_GET['id'];
			$pktinfo = $this->db_pkt->getInfoPKTbyID($idpkt);
		}
		$listTk = $this->db_pkt->getListTk();
		$listKh = $this->db_pkt->getListKh();
		$listNgoaiTe = $this->db_pkt->getListNgoaiTe();
		$pkt = $this->db_pkt->getInfoPKT();
		require("views/templates/ketoan/phieuketoan.php");
		$this->loadFooter();
	}
	public function in() {
		$title = "In Phiếu Kế Toán";
		$idpkt = $_GET['id'];
		$pktinfo = $this->db_pkt->getInfoPKTbyID($idpkt);
		$listTk = $this->db_pkt->getListTk();
		$listKh = $this->db_pkt->getListKh();
		$listNgoaiTe = $this->db_pkt->getListNgoaiTe();
		$pkt = $this->db_pkt->getInfoPKT();
		require("views/templates/ketoan/phieuketoan-in.php");
	}
	public function add(){
		if (isset($_POST['btnAdd'])) {
			$madonvi = $_POST['txtMadonvi'];
			$so_ctu = $_POST['txtSoCtu'];
			$tong_ps = $_POST['txtTongps'];
			$ma_nt = $_POST['slcMant'];
			$ti_gia = $_POST['txtTigia'];
			$tong_ps_vnd = $_POST['txtTongpsvnd'];

			$col = "ma_donvi, so_ctu, tong_ps, ma_nt, ti_gia, tong_ps_vnd ,user_id ";
			$total_data = "'".$madonvi."','".$so_ctu."','".$tong_ps."','".$ma_nt."','".$ti_gia."','".$tong_ps_vnd."','".$_SESSION['user_id']."'";

			$kq = $this->db_pkt->insertPKT($col,$total_data);

			if (isset($_POST['txtTk'])) {
				$tk = $_POST['txtTk'];
				$ma_khach = $_POST['txtMaKhach'];
				$ps_no_nt = $_POST['txtPsnont'];
				$ps_co_nt = $_POST['txtPscont'];
				$dien_giai = $_POST['txtDiengiai'];
				$ps_no_vnd = $_POST['txtPsnovnd'];
				$ps_co_vnd = $_POST['txtPscovnd'];
				$nhomdk = $_POST['txtNhomdk'];

				$colct = "pkt_id, tk, ma_khach, ps_no_nt, ps_co_nt, diengiai, ps_no_vnd, ps_co_vnd, nhom_dk";

				for ($q=0; $q < count($tk); $q++) { 
					$data_chitiet = "".$so_ctu.",'".$tk[$q]."','".$ma_khach[$q]."',".$ps_no_nt[$q].",".$ps_co_nt[$q].",'".$dien_giai[$q]."',".$ps_no_vnd[$q].",".$ps_co_vnd[$q].",'".$nhomdk[$q]."'";
					$kqct = $this->db_pkt->insertPktChitiet($colct,$data_chitiet);
				}
			}
			if ($kqct == TRUE) {
				header("location:?router=ketoan/phieuketoan&m=sc");
			} else {
				echo $total_data;
				echo $data_chitiet;
				// header("location:?router=ketoan/phieuketoan&m=fail");
			}
		} else {
			header("location:?router=ketoan/phieuketoan");
		}
	}
	public function del() {
		$id = $_GET['id'];
		$kqdel = $this->db_pkt->delPkt($id);
		if ($kqdel == TRUE) {
			$kqdelct = $this->db_pkt->delPktCt($id);
			header("location:?router=ketoan/phieuketoan&m=delsc");
		}
	}
	public function edit(){
		if (isset($_POST['btnEdit'])) {
			$madonvi = $_POST['txtMadonvi'];
			$so_ctu_old = $_POST['txtSoCtuOld'];
			$so_ctu = $_POST['txtSoCtu'];
			$tong_ps = $_POST['txtTongps'];
			$ma_nt = $_POST['slcMant'];
			$ti_gia = $_POST['txtTigia'];
			$tong_ps_vnd = $_POST['txtTongpsvnd'];
			$total_data = "ma_donvi = '".$madonvi."', so_ctu = '".$so_ctu."', tong_ps = '".$tong_ps."', ma_nt = '".$ma_nt."',ti_gia = '".$ti_gia."', tong_ps_vnd = '".$tong_ps_vnd."'";

			$kq = $this->db_pkt->updatePKT($so_ctu_old,$total_data);
			$delfirstupdate = $this->db_pkt->delPktCt($so_ctu_old);
			if (isset($_POST['txtTk'])) {
				$tk = $_POST['txtTk'];
				$ma_khach = $_POST['txtMaKhach'];
				$ps_no_nt = $_POST['txtPsnont'];
				$ps_co_nt = $_POST['txtPscont'];
				$dien_giai = $_POST['txtDiengiai'];
				$ps_no_vnd = $_POST['txtPsnovnd'];
				$ps_co_vnd = $_POST['txtPscovnd'];
				$nhomdk = $_POST['txtNhomdk'];

				$colct = "pkt_id, tk, ma_khach, ps_no_nt, ps_co_nt, diengiai, ps_no_vnd, ps_co_vnd, nhom_dk";

				for ($q=0; $q < count($tk); $q++) { 
					$data_chitiet = "".$so_ctu.",'".$tk[$q]."','".$ma_khach[$q]."',".$ps_no_nt[$q].",".$ps_co_nt[$q].",'".$dien_giai[$q]."',".$ps_no_vnd[$q].",".$ps_co_vnd[$q].",'".$nhomdk[$q]."'";
					$kqct = $this->db_pkt->insertPktChitiet($colct,$data_chitiet);
				}
			}
			if ($kqct == TRUE) {
				header("location:?router=ketoan/phieuketoan&m=sc");
			} else {
				echo $data_chitiet;
				// header("location:?router=ketoan/phieuketoan&m=fail");
			}
		} else {
			header("location:?router=ketoan/phieuketoan");
		}
	}
}

$pkt = new PhieuKeToan;
$obj = $_GET['f'] ?? 'index';
$pkt->$obj();

?>