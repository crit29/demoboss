<?php 
require("controllers/controller.php");
require "models/dmht/dmtk.php";
class TaiKhoan extends Controller {
    private $db_tk;
    function __construct()
    {
        
        $this->db_tk = new TaiKhoanModel;
    }
    public function index(){
        $title = "Danh mục tài khoản";
        $this->loadHeader($title);
        $this->loadSidebar();
        $listTk = $this->db_tk->getAllTk();
        if (isset($_GET['ac']) && $_GET['ac'] == "edit") {
            $idTk = $_GET['id'];
            $tkEdit = $this->db_tk->getTkById($idTk);
        } else $tkEdit = '';
        require("views/templates/dmht/dmtk.php");
        $this->loadFooter();
    }
    public function add() {
        if (isset($_POST['btnSubmitAdd'])) {
            $tenTk = $_POST['txtTenTk'];
            $tenTk2 = $_POST['txtTenTk2'];
            $ma_nt = $_POST['slcMaNt'];
            $loaiTk = $_POST['txtLoaiTk'];
            $tk_me = $_POST['slcTkMe'];
            $bacTk = $_POST['slcBacTk'];
            $tk_sc = $_POST['txtTkSc'];
            $date = $_POST['txtDate'];

            $col = " ten_tk, ten_tk2, ma_nt, loai_tk, tk_me, bac_tk, tk_sc, date0";
            $dataIns = "'".$tenTk."','".$tenTk2."','".$ma_nt."','".$loaiTk."','".$tk_me."','".$bacTk."','".$tk_sc."','".$date."'" ;
            $kqins = $this->db_tk->insertTk($col,$dataIns);
            if ($kqins == TRUE) {
                header("location:?router=dmht/dmtk&m=addsc");
            } else {
                 header("location:?router=dmht/dmtk&m=fail");
            }
        }
    }
    public function edit() {
        if (isset($_POST['btnSubmitEdit'])) {
            $tk_id = $_POST['txtTkId'];
            $tenTk = $_POST['txtTenTk'];
            $tenTk2 = $_POST['txtTenTk2'];
            $ma_nt = $_POST['slcMaNt'];
            $loaiTk = $_POST['txtLoaiTk'];
            $tk_me = $_POST['slcTkMe'];
            $bacTk = $_POST['slcBacTk'];
            $tk_sc = $_POST['txtTkSc'];
            $date = $_POST['txtDate'];

            $delFist = $this->db_tk->delTkById($tk_id);
            $col = "tk_id, ten_tk, ten_tk2, ma_nt, loai_tk, tk_me, bac_tk, tk_sc, date0";
            $dataIns = "'".$tk_id."','".$tenTk."','".$tenTk2."','".$ma_nt."','".$loaiTk."','".$tk_me."','".$bacTk."','".$tk_sc."','".$date."'" ;
            $kqins = $this->db_tk->insertTk($col,$dataIns);
            if ($kqins == TRUE) {
                header("location:?router=dmht/dmtk&m=upsc");
            } else {
                 header("location:?router=dmht/dmtk&m=fail");
            }
        }
    }
    public function del(){
        $idTk = $_GET['id'];
        $kqDel = $this->db_tk->delTkById($idTk);
        if ($kqDel == TRUE) {
                header("location:?router=dmht/dmtk&m=delsc");
            } else {
                header("location:?router=dmht/dmtk&m=fail");
            }
    }
    
}
$dmtk = new TaiKhoan;
$obj = $_GET['f'] ?? 'index' ;
$dmtk->$obj();
?>