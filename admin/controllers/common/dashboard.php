<?php 
require "controllers/controller.php";
require "models/common/dashboard.php";
class Dashboard extends Controller {
	function __construct()
    {
        
        $this->db_Db = new DashboardModel;
    }
	public function index(){
		$tittle = "Dashboard";
		$this->loadHeader($tittle);
		$this->loadSidebar();
		require("views/templates/common/dashboard.php");
		$this->loadFooter();
	}
}
$dashboard = new Dashboard;
$dashboard->index();
?>