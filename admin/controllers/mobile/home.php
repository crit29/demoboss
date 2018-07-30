<?php

require("controllers/mobilecontroller.php");
class MenuItem {
	public $name;
	public $color;
	public $url;

	public function create($_name, $_color, $_url) {
		$this->name = $_name;
		$this->color = $_color;
		$this->url = $_url;
	}
}

class HomeMobile extends MobileController {
	public function index() {
		require LANGUAGE_DIRECT."mobile/home.php";
		$tittle = "Home";

		$dssp = new MenuItem;
		$dssp->create('Danh sách sản phẩm', '#ffc96b', 'controllers/mobile/dssp.php');
		$dskh = new MenuItem;
		$dskh->create('Danh sách khách hàng', '#ffc96b', 'controllers/mobile/dskh.php');
		$xtk = new MenuItem;
		$xtk->create('Xem tồn kho', '#ffc96b', 'controllers/mobile/xtk.php');
		$xdt = new MenuItem;
		$xdt->create('Xem doanh thu', '#ffc96b', 'controllers/mobile/xdt.php');
		$xcn = new MenuItem;
		$xcn->create('Xem công nợ', '#ffc96b', 'controllers/mobile/xcn.php');
		$tdh = new MenuItem;
		$tdh->create('Tạo đơn hàng', '#47bdff', 'controllers/mobile/tdh.php');

		$menu = array(
			'dssp' => $dssp,
			'dskh' => $dskh,
			'xtk' => $xtk,
			'xdt' => $xdt,
			'xcn' => $xcn,
			'tdh' => $tdh,
		);
		$this->loadHeader($tittle);
		require("views/templates/mobile/home.php");
		$this->loadFooter();
	}
}

$home = new HomeMobile;
$home->index();
?>