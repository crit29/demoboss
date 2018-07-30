<?php 
require("controllers/controller.php");
require "models/dmht/dmdv.php";
class DonVi extends Controller {
    private $db_dv;
    function __construct()
    {
        
        $this->db_dv = new DonViModel;
    }
    public function index(){
        $title = "Danh mục đơn vị cơ sở";
        $this->loadHeader($title);
        $this->loadSidebar();
        $listDv = $this->db_dv->getAllDv();
        if (isset($_GET['ac']) && $_GET['ac'] == "edit") {
            $idDv = $_GET['id'];
            $dvEdit = $this->db_dv->getDvById($idDv);
        } else $tkEdit = '';
        require("views/templates/dmht/dmdv.php");
        $this->loadFooter();
    }
    public function add() {
        if (isset($_POST['btnSubmitAdd'])) {
            $ma_dvcs = $_POST['txtMaDvcs'];
            $ten_dvcs = $_POST['txtTenDvcs'];
            $ten_dvcs2 = $_POST['txtTenDvcs2'];
            $date = $_POST['txtDate'];
            $time = $_POST['txtTime'];
            $status = $_POST['slcStatus'];

            $col = "ma_dvcs, ten_dvcs, ten_dvcs2, date0, time0, user_id0, status";
            $dataIns = "'".$ma_dvcs."','".$ten_dvcs."','".$ten_dvcs2."','".$date."','".$time."','".$_SESSION['user_id']."','".$status."'" ;
            $kqins = $this->db_dv->insertDv($col,$dataIns);
            if ($kqins == TRUE) {
                header("location:?router=dmht/dmdv&m=addsc");
            } else {
                 header("location:?router=dmht/dmdv&m=fail");
            }
        }
    }
    public function edit() {
        if (isset($_POST['btnSubmitEdit'])) {
            $ma_dvcs = $_POST['txtMaDvcs'];
            $ten_dvcs = $_POST['txtTenDvcs'];
            $ten_dvcs2 = $_POST['txtTenDvcs2'];
            $date = $_POST['txtDate'];
            $time = $_POST['txtTime'];
            $status = $_POST['slcStatus'];

            $delFist = $this->db_dv->delDvById($dv_id);
            $col = "ma_dvcs, ten_dvcs, ten_dvcs2, date0, time0, user_id0, status";
            $dataIns = "'".$ma_dvcs."','".$ten_dvcs."','".$ten_dvcs2."','".$date."','".$time."','".$_SESSION['user_id']."','".$status."'" ;
            $kqins = $this->db_dv->insertDv($col,$dataIns);
            if ($kqins == TRUE) {
                header("location:?router=dmht/dmdv&m=editsc");
            } else {
                 header("location:?router=dmht/dmdv&m=fail");
            }
        }
    }
    public function del(){
        $idTk = $_GET['id'];
        $kqDel = $this->db_dv->delTkById($idTk);
        if ($kqDel == TRUE) {
                header("location:?router=dmht/dmdv&m=delsc");
            } else {
                header("location:?router=dmht/dmdv&m=fail");
            }
    }
    
}
$dmdv = new DonVi;
$obj = $_GET['f'] ?? 'index' ;
$dmdv->$obj();
?>