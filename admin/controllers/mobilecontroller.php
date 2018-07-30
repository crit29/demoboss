<?php
class MobileController {
	protected function loadHeader($dttt = "Chưa đặt tên") {
		$tittle = $dttt;
		require("views/templates/mobile/header.php");
	}
	protected function loadFooter() {
		require("views/templates/mobile/footer.php");
	}
}

?>