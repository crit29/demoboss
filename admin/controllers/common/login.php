<?php 
require("controllers/controller.php");
class Login extends Controller {
	private $data;
	private $flag;
	public function index(){
		require("views/templates/common/login.php");
	}
	public function checklogin($username, $password) {
		require "models/common/login.php";
		$loginM = new LoginModel;
		$this->data = $loginM->chkLogin($username,$password);
		$this->data['flag'] = TRUE;
		return $this->data;
	}
}
	$login = new Login;
	$obj = '';
	if (isset($_GET['f'])) {
		$obj = $_GET['f'];
	}
	
	if ($obj == "checklogin" && isset($_POST['btnLogin'])) {
		$username = $_POST['txtUsername'];
		$password = $_POST['txtPassword'];
		$result = $login->checklogin($username,$password);
		if ($result['flag'] = TRUE) {
			$_SESSION['username'] = $result['username'];
			$_SESSION['group'] = $result['user_group_id'];
			$_SESSION['user_id'] = $result['user_id'];
			header("location:?");
		} else {
			header("location:?router=common/login");
		}
	} else {
		$login->index();
	}
?>