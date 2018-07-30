<?php 
require("controllers/controller.php");
require "models/system/grouppermission.php";
class Grouppermission extends Controller {
	
	private $db_Gp;
    function __construct()
    {
        
        $this->db_Gp = new groupPermissionModel;
    }
	public function index1(){
		require LANGUAGE_DIRECT."system/grouppermission.php";
		$title = "Group permission";
		$this->loadHeader($title);
		$this->loadSidebar();
		require "models/system/grouppermission.php";

		$data = $this->db_Gp->getUserGroup();
		require("views/templates/system/grouppermission.php");
		$this->loadFooter();
	}
	public function index($id = 999) {
		require LANGUAGE_DIRECT."system/grouppermission.php";
		$title = $_["text_title"];
		$this->loadHeader($title);
		$this->loadSidebar();
		
		
		$data = $this->db_Gp->getUserGroup();
		$dataPID = $this->db_Gp->getUserGroupById($id);
		$dataFix = $this->db_Gp->getListPermission();
		$per = array();
		$per = explode(',', $dataFix['permission']);
		$per2 = array();
		$per2 =explode(',', $dataPID['permission']);

		require("views/templates/system/grouppermission-fix.php");
		$this->loadFooter();
	}

	public function update($id,$name,$permission) {
		require LANGUAGE_DIRECT."system/grouppermission.php";
		$title = $_["text_title"];
		$this->loadHeader($title);
		$this->loadSidebar();
		
		$flag = $this->db_Gp->updateUGP($id,$name,$permission);

		return $flag;
	}
	public function add($name,$per) {

	}
	public function delete() {
		$groupid = $_GET['id'];
		$deleteck = $this->db_Gp->deleteGP($groupid);
		if ($deleteck == TRUE) {
			header('location:?router=system/grouppermission&m=ok');
		} else {
			header('location:?router=system/grouppermission&m=fail');
		}
	}

}
$gp = new Grouppermission;
if (isset($_GET['f']) && $_GET['f'] == 'fix') {
		$gp->index($_GET['id']);
} elseif (isset($_GET['f']) && $_GET['f'] == 'add') {
		$txtGname = $_POST['txtGName'];
		$UGper = '';
		for ($l=0; $l < $_POST['countPer']; $l++) { 
			$UGper .= $_POST["chk{$l}"];
			if ($q != ($_POST['countPer'] - 1 )) {
				$UGper .= ",";
			}
		}
		$flagAdd = $gp->add($txtGname,$UGper);
		if ($flagAdd == TRUE) {
			header('location:?router=system/grouppermission&m=ok');
		} else {
			header('location:?router=system/grouppermission&m=fail');
		}
}elseif (isset($_GET['f']) && $_GET['f'] == 'update') {
		$UGname = $_POST['txtUGN'];
		$Uper = '';
		for ($q=0; $q < $_POST['countPer']; $q++) { 
			$Uper .= $_POST["chk{$q}"];
			
			if ( $_POST["chk{$q}"] != '' ) {
				$Uper .= ",";
			}
		}
		$Uper = substr($Uper, 0, -1);
		$flag = $gp->update($_GET['id'],$UGname,$Uper);
		if ($flag==TRUE) {
			header('location:?router=system/grouppermission&m=ok');
		} else {
			header('location:?router=system/grouppermission&m=fail');
		}
} elseif (isset($_GET['f']) && $_GET['f'] == 'delete') {
	$gp->delete();	
} else {
	$gp->index();
}

?>