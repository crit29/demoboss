<?php 
require "controllers/controller.php";
require "models/common/eror404.php";
class Eror404 extends Controller {
	function __construct()
    {
        
        $this->db_er = new Eror404Model;
    }
	public function index(){
		$tittle = "Eror 404";
		$this->loadHeader($tittle);
		$this->loadSidebar();
		require("views/templates/common/eror404.php");
		$this->loadFooter();
	}
}
$er = new Eror404;
$obj = $_GET['f'] ?? 'index';
$er->$obj();
?>