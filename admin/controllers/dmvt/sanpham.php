<?php
require "controllers/controller.php";
require "models/dmvt/sanpham.php";
class SanPham extends Controller {
    private $db_sp;
    function __construct()
    {
        
        $this->db_sp = new SanPhamModel;
    }
    public function index(){
        $title = "Sản phẩm";
        $this->loadHeader($title);
        $this->loadSidebar();

        if (isset($_GET['ac']) && $_GET['ac'] == "edit") {
            $idEdit = $_GET['id'];
            $dataEdit = $this->db_sp->getSanPhamById($idEdit);
        } else $dataEdit = '';

        $dataList = $this->db_sp->getListSanPham();
        require "views/templates/dmvt/sanpham.php";
        $this->loadFooter();
    }
}
$SP = new SanPham;
$Obj = $_GET['f'] ?? 'index';
$SP->$Obj();

?>