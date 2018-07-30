<?php 
require("controllers/controller.php");
require "models/system/user.php";
class User extends Controller {
	private $db_Us;
	private $error;
    function __construct()
    {
        
        $this->db_Us = new UserModel;
    }
	public function index($id = 999){
		// require LANGUAGE_DIRECT."system/user.php";
		$title = "Quản lí tài khoản";
		$this->loadHeader($title);
		$this->loadSidebar();
		$data = $this->db_Us->getAllUser();
		$dataF = $this->db_Us->getUserById($id);
		require("views/templates/system/user.php");
		$this->loadFooter();
	}
	public function update() {
		if (isset($_POST['btnSubmitUpdate'])) {
			$userid = $_GET['id'];
			$username = $_POST['txtUsername'];
			$password = $_POST['txtPassword'];
			$CfimPassword = $_POST['txtCfimPassword'];
			$oldpass  = $_POST['txtOldPass'];
			$email = $_POST['txtEmail'];
			$Usergroup = $_POST['secUsergroup'];
			$Firstname = $_POST['txtFirstName'];
			$Lastname = $_POST['txtLastName'];
			$status = $_POST['secStatus'];
			if ($this->db_Us->checkOddPass($userid,$oldpass) == TRUE) {
				if ($username == '' || $email == '' || $Usergroup == '' || $Firstname == '' || $Lastname == '' || $oldpass == '' ){
					header("location:?router=system/user&m=empty");
				} elseif ($password != $CfimPassword) {
					header("location:?router=system/user&m=incorrect");
				} else {
					$username = "username = '".$username."',";
					$email = "email = '".$email."',";
					$Usergroup = "user_group_id = '".$Usergroup."',";
					$Firstname = "firstname = '".$Firstname."',";
					$Lastname = "lastname = '".$Lastname."',";
					$data = "";
					if ($password != '') {
						$password == "password = '".$password."',";
						$data .= $password;
					}
					$status = "status = '".$status."'";
					$data .= $username.$email.$Usergroup.$Firstname.$Lastname.$status;
					$chk = $this->db_Us->updateUser($userid,$data);
					if ($chk == TRUE) {
						$this->index();
					} else {
						header("location:?router=system/user&m=ike");
					}
				}
			}
		}
	}
	public function add(){
		if (isset($_POST['btnAdd'])) {
			$username = $_POST['txtUsername'];
			$email = $_POST['txtEmail'];
			$pass = $_POST['txtPassword'];
			$cfpass = $_POST['txtCfimPassword'];		
			$groupid = $_POST['secUsergroup'];
			$firstname = $_POST['txtFirstName'];
			$lastname = $_POST['txtLastName'];
			$dateadd = $_POST['dateAdd'];
			if ($username == '' || $email == '' || $pass == '' || $cfpass == '' || $groupid == '' || $firstname == '' || $lastname == '' || $dateadd == '' ) {
				header("location:?router=system/user&m=empty");
			}elseif ($pass != $cfpass) {
				header("location:?router=system/user&m=incorrect");
			} else {
				$col = "username,password,user_group_id,firstname,lastname,email,status";
				$data = "'".$username."','".$pass."','".$groupid."','".$firstname."','".$lastname."','".$email."','1'";

				$rs = $this->db_Us->addUser($col,$data,"user");
				if ($rs == TRUE) {

					$this->index();
				} else {
					header("location:?router=system/user&m=ike");
				}
			}
			

		}
	}
	

}
$us = new User;
if (isset($_GET['f']) && $_GET['f'] == 'add') {
	$us->add();
} elseif (isset($_GET['f']) && $_GET['f'] == 'fix') {
	$us->index($_GET['id']);
} elseif (isset($_GET['f']) && $_GET['f'] == 'update') {
	$us->update();
}
 else {
	$us->index();
}


?>