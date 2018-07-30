<?php 
require("controllers/controller.php");
require "models/dmvt/spdm.php";
class SanPhamDinhMuc extends Controller {
	private $db_spdm;
    function __construct()
    {
        
        $this->db_spdm = new SanPhamDinhMucModel;
    }
    public function index(){
    	$title = "Sản phẩm định mức";
		$this->loadHeader($title);
		$this->loadSidebar();
		
		$listSPDM = $this->db_spdm->getSanPhamDM();
		$listNvl = $this->db_spdm->getNvl();

		if (isset($_GET['ac']) && $_GET['ac'] == "edit") {
			$id = $_GET['id'];
			$nvledit = $this->db_spdm->getListNVL($id);
			$spdmid = $this->db_spdm->getSanPhamDmById($id);
		}
		
        if (isset($_GET['ac']) && $_GET['ac'] == "copySpdm") {
           $idcopy = $_GET['idcp'];
           $nvlcopy = $this->db_spdm->getListNVL($idcopy);
            $spdmcopy = $this->db_spdm->getSanPhamDmById($idcopy);
        } else {
            $nvlcopy = $this->db_spdm->getListNVL(1);
            $spdmcopy = $this->db_spdm->getSanPhamDmById(1);
        }
		require("views/templates/dmvt/spdm.php");
		$this->loadFooter();
    }
    public function addSpdm(){
    	if (isset($_POST['btnAddSpdm'])) {
    		$maspdm = $_POST['txtMaSp'];
    		$slspdm = $_POST['txtSlSp'];
    		// $ngayspdm = date('')
    		$colspdm = "ma_sp,sl_dm";
    		$data = "'".$maspdm."','".$slspdm."'";
    		// add sản phẩm định mức
    		$result1 = $this->db_spdm->insertSpdm($colspdm,$data);
            if ($result1 != TRUE) {
               header("location:?router=dmvt/spdm&m=addfail");
               die();
            }
    		$idnew = $this->db_spdm->getSanPhamDmByMaSp($maspdm);

    		$manldm = $_POST['slcMaNv'];
    		$slnvl = $_POST['txtSlNvl'];
    		$dgnvl = $_POST['txtDgNvl'];
    		$ttnvl = $_POST['txtTtNvl'];

    		$colnvldm = "spdm_id,ma_nvl,sl_nvl,dongia_nvl,thanhtien_nvl";
    		for ($xz =0; $xz  < count($manldm); $xz ++) { 
    			$datanvldm = $idnew['spdm_id'].",'".$manldm[$xz]."',".$slnvl[$xz].",".$dgnvl[$xz].",".$ttnvl[$xz];
    			$result2 = $this->db_spdm->insertNvldm($colnvldm,$datanvldm);
    		}

    		if ($result2 == TRUE) {
                header("location:?router=dmvt/spdm&m=addok");
            } else {
                header("location:?router=dmvt/spdm&m=addfail");
            }
    	}
    }
    public function editSpdm() {
        if (isset($_POST['btnCapNhat'])) {
            $idSpdm = $_POST['txtidspdm'];
            $ma_sp = $_POST['txtMaSp'];
            $sl_sp = $_POST['txtSlSp'];

            $upSpdm = "ma_sp = '".$ma_sp."' ,sl_dm = ".$sl_sp;
            $rs1 = $this->db_spdm->updateSpdm($upSpdm,$idSpdm);

            $idnvldm = $_POST['txtidnvldm'];
            $manvl = $_POST['slcMaNvl'];
            $slNvl = $_POST['txtSlNvl'];
            $dgNvl = $_POST['txtDgNvl'];
            $ttNvl = $_POST['txtTtNvl'];
            $numberEdit = $_POST['numberedit'];

            for ($ud =0; $ud  < $numberEdit; $ud ++) { 
                $upnvldm = "spdm_id = ".$idSpdm." , ma_nvl = '".$manvl[$ud]."',  sl_nvl = ".$slNvl[$ud].", dongia_nvl = ".$dgNvl[$ud].", thanhtien_nvl = ".$ttNvl[$ud] ;
                $rs2 = $this->db_spdm->updateNvldm($upnvldm,$idnvldm[$ud]);
            }
            for ($ad = $numberEdit; $ad < count($manvl); $ad++) { 
                $col = "spdm_id, ma_nvl, sl_nvl, dongia_nvl, thanhtien_nvl ";
                $data = $idSpdm.",'".$manvl[$ad]."',".$slNvl[$ad].",".$dgNvl[$ad].",".$ttNvl[$ad];
                $rs3 = $this->db_spdm->insertNvldm($col,$data);

            }

            if ($rs3 == TRUE) {
                header("location:?router=dmvt/spdm&m=upok");
            } else {
                header("location:?router=dmvt/spdm&m=upfail");
            }

        }   
    }
    public function deletenvl(){
        $id1 = $_GET['id1'];
        $id2 = $_GET['id2'];
        $kq = $this->db_spdm->deleteNvldmById($id1);
        if ($kq == TRUE) {
            header("location:?router=dmvt/spdm&ac=edit&id=".$id2);
        } else {
            echo "lỗi ko xác định";
        }
    }
    public function deleteSpdm(){
        $id = $_GET['id'];
        $result = $this->db_spdm->deleteSpdmById($id);
        if ($result == TRUE) {
            header("location:?router=dmvt/spdm&m=delOk");
        } else {
            header("location:?router=dmvt/spdm&m=delFail");
        }
    }
    public function deleteMulti(){
        $IdDel = $_POST['chkDel'];
        for ($i=0; $i < count($IdDel); $i++) { 
            $kq = $this->db_spdm->deleteSpdmById($IdDel[$i]);
            $kq2 = $this->db_spdm->deleteNvlByIdSp($IdDel[$i]);
        }
        if ($kq == TRUE) {
            header("location:?router=dmvt/spdm&m=delMulOk");
        } else {
            header("location:?router=dmvt/spdm&m=delMulFail");
        }
    }
}
$spdm = new SanPhamDinhMuc;
$obj = $_GET['f'] ?? 'index' ;
$spdm->$obj();
?>