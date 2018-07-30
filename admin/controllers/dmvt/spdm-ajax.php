<?php 
require "controllers/controller.php";
require "models/dmvt/spdm.php";
class SpdmAjax extends Controller {
	private $db_spdmajax;
    function __construct()
    {
        
        $this->db_spdmajax = new SanPhamDinhMucModel;
    }
    public function index(){
    	$search = $_POST['search'];
    	$result = $this->db_spdmajax->searchNVL($search);
    	
    	// echo "<table class='table table-hover'>";
    	foreach ($result as $kq) {

    		echo "<option>".$kq['ten_nvl']." (".$kq['ma_nvl'].")"."</option>";
    	}
    	// echo "</table>";
    }

}

$ajax = new SpdmAjax;
$obj = $_GET['f'] ?? 'index' ;
$ajax->$obj();
?>