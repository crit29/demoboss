<?php 
/*
Replace {
    banhang/hoadon: duong dan link
    
}
        
*/
require "controllers/controller.php";
require "models/banhang/hoadon.php";
class HoaDon extends Controller {
    private $db_hd;
    function __construct()
    {
        
        $this->db_hd = new HoaDonModel;
    }
    public function index(){
        $title = "Hóa đơn";
        $this->loadHeader($title);
        $this->loadSidebar();

        $listKhach = $this->db_hd->getAllKh();
        $listhd = $this->db_hd->getAllhd();
        $listDonVi = $this->db_hd->getAllInTable('dmdvcs');
        if (isset($_GET['ac']) && $_GET['ac'] == "edit") {
            $idHd = $_GET['id'];
            $hdEdit = $this->db_hd->getHdById($idHd);
        } else $hdEdit = '';
        require "views/templates/banhang/hoadon.php";
        $this->loadFooter();
    }
    public function addview() {
        $title = "Thêm mới hóa đơn";
        $this->loadHeader($title);
        $this->loadSidebar();

        $listKhach = $this->db_hd->getAllKh();
        $listSanPham = $this->db_hd->getAllInTable('sanpham');
        $listNhanVien = $this->db_hd->getAllInTable('nhanvien');
        $listhd = $this->db_hd->getAllhd();
        $listDonVi = $this->db_hd->getAllInTable('dmdvcs');
        
        require "views/templates/banhang/hoadon-add.php";
        $this->loadFooter();
    }
    public function ajaxAddLine() {
        $idSanPham = $_POST['idSanPham'];
        $idDonVi = $_POST['idDonVi'];

        $sp = $this->db_hd->getInfoById($idSanPham,'sanpham');
        $dv = $this->db_hd->getInfoById($idDonVi,'dmdvcs');

        echo $sp['sanpham_ten'].",".$dv['ten_dvcs'];

    }
    public function handleAdd() {
        if (isset($_POST['btnSubmitAdd'])) {
            $mahoadon = $_POST['txtMaHoaDon'];
            $makhach = $_POST['txtKhach'];
            $ngaytao = $_POST['txtNgayTao'];
            $nhanvien1 = $_POST['txtNhanVien1'];
            $nhanvien2 = $_POST['txtNhanVien2'];

            $col = "hoadon_ma, khachhang_id, nhanvien1, nhanvien2, ngaytao";
            $dataInsHoaDon = "'".$mahoadon."','".$makhach."','".$nhanvien1."','".$nhanvien2."','".$ngaytao."'" ;
            $kqins = $this->db_hd->insertHoaDon($col,$dataInsHoaDon);
            $hoadonidlast = $this->db_hd->getLastId("hoadon");

            $hoadonid = $hoadonidlast['hoadon_id'];
            $sanpham = $_POST['txtSanPham'];
            $donvi = $_POST['txtDonVi'];
            $gia = $_POST['txtGia'];
            $soluong = $_POST['txtSoLuong'];
            $thanhtien = $_POST['txtThanhTien'];

            for ($i=0; $i < count($sanpham); $i++) { 
                $colChiTiet = "hoadon_id, sanpham_ma, donviban, dongia, soluong, thanhtien";
                $dataInsHoaDonChiTiet = "'".$hoadonid."','".$sanpham[$i]."','".$donvi[$i]."','".$gia[$i]."','".$soluong[$i]."','".$thanhtien[$i]."'" ;
                $kqInsCt = $this->db_hd->insertTable($colChiTiet,$dataInsHoaDonChiTiet,"hoadon_chitiet");
            }

            if ($kqInsCt == TRUE) {
                header("location:?router=banhang/hoadon&m=addsc");
            } else {
                 header("location:?router=banhang/hoadon&m=fail");
            }
        }
    }

    public function add() {
        if (isset($_POST['btnSubmitAddHoaDon'])) {
            $mahoadon = $_POST['txtMaHoaDon'] ?? '';
            $khach_id = $_POST['txtKhach'] ?? '';
            $ngaytao = $_POST['txtNgayTao'] ?? '';
            $nhanvien1 = $_POST['txtNhanVien1'] ?? '';
            $nhanvien2 = $_POST['txtNhanVien2'] ?? '';


            $col = "hoadon_ma, khachhang_id, nhanvien1, nhanvien2, ngaytao";
            $dataIns = "'".$mahoadon."','".$khach_id."','".$nhanvien1."','".$nhanvien2."','".$ngaytao."'" ;
            $kqins = $this->db_hd->insertHoaDon($col,$dataIns);
            if ($kqins == TRUE) {
                header("location:?router=banhang/hoadon&m=addsc");
            } else {
                 header("location:?router=banhang/hoadon&m=fail");
            }
        }
    }
    public function edit() {
        $title = "Chỉnh sửa hóa đơn";
        $this->loadHeader($title);
        $this->loadSidebar();
        $hoadon_id = $_GET['id'];
        $dataEdit = $this->db_hd->getHdById($hoadon_id);
        $dataEditCt = $this->db_hd->getHdCtById($hoadon_id);

        $listKhach = $this->db_hd->getAllKh();
        $listSanPham = $this->db_hd->getAllInTable('sanpham');
        $listNhanVien = $this->db_hd->getAllInTable('nhanvien');
        $listhd = $this->db_hd->getAllhd();
        $listDonVi = $this->db_hd->getAllInTable('dmdvcs');
        
        require "views/templates/banhang/hoadon-edit.php";
        $this->loadFooter();
    }
    public function handleEdit(){
        if (isset($_POST['btnSubmitEdit'])) {
            $hoadon_id = $_GET['id'];

            $mahoadon = $_POST['txtMaHoaDon'];
            $makhach = $_POST['txtKhach'];
            $ngaytao = $_POST['txtNgayTao'];
            $nhanvien1 = $_POST['txtNhanVien1'];
            $nhanvien2 = $_POST['txtNhanVien2'];

            $dataUpdate = "hoadon_ma='".$mahoadon."',khachhang_id='".$makhach."',nhanvien1='".$nhanvien1."',nhanvien2='".$nhanvien2."',ngaytao='".$ngaytao."'";
            $kqUpdate = $this->db_hd->updateHoaDon($hoadon_id,$dataUpdate);

            $delAllCt = $this->db_hd->deleteHoaDonCt($hoadon_id);

            $sanpham = $_POST['txtSanPham'];
            $donvi = $_POST['txtDonVi'];
            $gia = $_POST['txtGia'];
            $soluong = $_POST['txtSoLuong'];
            $thanhtien = $_POST['txtThanhTien'];

            for ($i=0; $i < count($sanpham); $i++) { 
                $colChiTiet = "hoadon_id, sanpham_ma, donviban, dongia, soluong, thanhtien";
                $dataInsHoaDonChiTiet = "'".$hoadon_id."','".$sanpham[$i]."','".$donvi[$i]."','".$gia[$i]."','".$soluong[$i]."','".$thanhtien[$i]."'" ;
                $kqInsCt = $this->db_hd->insertTable($colChiTiet,$dataInsHoaDonChiTiet,"hoadon_chitiet");
            }

            if ($kqInsCt == TRUE) {
                header("location:?router=banhang/hoadon&m=addsc");
            } else {
                 header("location:?router=banhang/hoadon&m=fail");
            }

        }
    }
    public function delHoaDon(){
        $idHd = $_GET['id'];
        $kqDel = $this->db_hd->delHdById($idHd);
        $delCt = $this->db_hd->deleteHoaDonCt($idHd);
        if ($kqDel == TRUE) {
                header("location:?router=banhang/hoadon&m=delsc");
            } else {
                header("location:?router=banhang/hoadon&m=fail");
            }
    }
    public function AjaxHoaDonChiTiet(){
        $hoadonID = $_POST['idhoadon'];
        $dataHoaDonCt = $this->db_hd->getHoaDonCtById($hoadonID);
        foreach ($dataHoaDonCt as $data) {
            foreach ($data as $value) {
                echo $value;
                echo ",";
            }
            echo "/";
        }


    }
    
}
$Hd = new HoaDon;
$obj = $_GET['f'] ?? 'index' ;
$Hd->$obj();
?>