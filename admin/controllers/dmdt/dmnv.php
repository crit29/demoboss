<?php 
require "controllers/controller.php";
require "models/dmdt/dmnv.php";
class NhanVien extends Controller {
    private $db_nv;
    function __construct()
    {
        
        $this->db_nv = new NhanVienModel;
    }
    public function index(){
        $title = "Nhân viên";
        $this->loadHeader($title);
        $this->loadSidebar();
        $listNv = $this->db_nv->getAllnv();
        if (isset($_GET['ac']) && $_GET['ac'] == "edit") {
            $idnv = $_GET['id'];
            $dataEdit = $this->db_nv->getNvById($idnv);
        } else $dataEdit = '';
        require "views/templates/dmdt/dmnv.php";
        $this->loadFooter();
    }
    public function add() {
        if (isset($_POST['btnSubmitAdd'])) {
            $manhanvien = $_POST['txtMaNhanVien'] ?? '';
            $tennhanvien = $_POST['txtTenNhanVien'] ?? '';
            $status = $_POST['txtStatus'] ?? '';


            $col = "ma_nhanvien, nhanvien_name, status";
            $dataIns = "'".$manhanvien."','".$tennhanvien."','".$status."'" ;
            $kqins = $this->db_nv->insertNhanVien($col,$dataIns);
            if ($kqins == TRUE) {
                header("location:?router=dmdt/dmnv&m=addsc");
            } else {
                header("location:?router=dmdt/dmnv&m=fail");
            }
        }
    }
    public function edit() {
        if (isset($_POST['btnSubmitEdit'])) {
            $manhanvien = $_POST['txtMaNhanVien'] ?? '';
            $tennhanvien = $_POST['txtTenNhanVien'] ?? '';
            $status = $_POST['txtStatus'] ?? '';
            $nv_id = $_POST['txtNhanVienID'];

            $delFist = $this->db_nv->delNvById($nv_id);
            $col = "nhanvien_id,ma_nhanvien, nhanvien_name, status";
            $dataIns = "'".$nv_id."','".$manhanvien."','".$tennhanvien."','".$status."'" ;
            $kqins = $this->db_nv->insertNhanVien($col,$dataIns);
            if ($kqins == TRUE) {
                header("location:?router=dmdt/dmnv&m=editsc");
            } else {
                 header("location:?router=dmdt/dmnv&m=fail");
            }
        }
    }
    public function del(){
        $idTk = $_GET['id'];
        $kqDel = $this->db_nv->delnvById($idTk);
        if ($kqDel == TRUE) {
                header("location:?router=dmdt/dmnv&m=delsc");
            } else {
                header("location:?router=dmdt/dmnv&m=fail");
            }
    }
    public function ajax(){
        
    }
    
}
$nv = new NhanVien;
$obj = $_GET['f'] ?? 'index' ;
$nv->$obj();
?>