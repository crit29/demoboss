<?php 
require "models/model.php";
class LoginModel extends Model {
	public function __construct(){
		parent::__construct();
	}
	private $data;
	public function chkLogin($username,$password) {
		$sql = " SELECT * FROM user WHERE username = '".$username."' AND password = '".$password."' AND status = 1 LIMIT 1";
		$result = $this->connection->query($sql);
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				$this->data = $row;
			}
		} 
		return $this->data;
	}
}

?>