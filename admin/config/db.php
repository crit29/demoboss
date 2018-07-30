 <?php
	class Database {
		protected $connection;

		public function __construct() {
			$this->connection = new mysqli("localhost", "root", "", "demoboss");
			$this->connection->set_charset("utf8");
			return $this->connection;
		}
		
		public function __destruct() {
			$this->connection->close();
		}
	}
?>

