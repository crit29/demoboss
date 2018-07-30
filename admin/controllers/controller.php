<?php
class Controller {
	protected function loadHeader($dttt = "Chưa đặt tên") {
		$tittle = $dttt;
		require("views/templates/common/header.php");
	}
	protected function loadSidebar() {
		require("controllers/common/sidebar.php");
	}
	protected function loadFooter() {
		require("views/templates/common/footer.php");
	}
}

?>