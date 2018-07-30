<?php 
require("models/common/sidebar.php");
class SideBar {
	function __construct()
    {
        
        $this->db_Sb = new SideBarModel;
    }
	public function SideBarElement($group_id) {
		require LANGUAGE_DIRECT."common/sidebar.php";
		$menu = array();

			
		$Element = $this->db_Sb->getPermission($group_id);
		// Bán hàng
		if ($this->checkPermission($Element,"banhang") == TRUE ) {

			$banhang = array();
			if ($this->checkPermission($Element,"banhang/hoadon") == TRUE ) {
				$banhang[] = array(
					'id' => '',
					'title' => "Hóa đơn",
					'url' => '?router=banhang/hoadon'

				);
			}
			
			$menu[] = array(
			    'id' => 'ketoan',
			    'icon' => 'chart-line',
			    'title' => "Bán hàng",
			    'childen' => $banhang
			);
		}
		//danh mục hệ thống	
		if ($this->checkPermission($Element,"dmht") == TRUE ) {

			$dmht = array();
			if ($this->checkPermission($Element,"dmht/dmdv") == TRUE ) {
				$dmht[] = array(
					'id' => 'dmht-dmdv',
					'title' => $_['text_dmdv'],
					'url' => '?router=dmht/dmdv'

				);
			}
			if ($this->checkPermission($Element,"dmht/dmlt") == TRUE ) {
				$dmht[] = array(
					'id' => 'dmht-dmlt',
					'title' => 'Loại tiền',
					'url' => '?router=dmht/dmlt'

				);
			}
			if ($this->checkPermission($Element,"dmht/dmtg") == TRUE ) {
				$dmht[] = array(
					'id' => 'dmht-dmtg',
					'title' => 'Tỉ giá',
					'url' => '?router=dmht/dmtg'

				);
			}
			if ($this->checkPermission($Element,"dmht/dmtk") == TRUE ) {
				$dmht[] = array(
					'id' => 'dmht-dmtk',
					'title' => 'Tài khoản',
					'url' => '?router=dmht/dmtk'

				);
			}
			$menu[] = array(
			    'id' => 'dmht',
			    'icon' => 'cogs',
			    'title' => $_['text_dmht'],
			    'childen' => $dmht
			);
		}
		// danh mục vật tư
		if ($this->checkPermission($Element,"dmvt") == TRUE ) {

			$dmvt = array();
			if ($this->checkPermission($Element,"dmvt/sanpham") == TRUE ) {
				$dmvt[] = array(
					'id' => 'dmvt-spdm',
					'title' => "Sản phẩm",
					'url' => '?router=dmvt/sanpham'

				);
			}
			if ($this->checkPermission($Element,"dmvt/spdm") == TRUE ) {
				$dmvt[] = array(
					'id' => 'dmvt-spdm',
					'title' => "Sản phẩm định mức",
					'url' => '?router=dmvt/spdm'

				);
			}
			
			
			$menu[] = array(
			    'id' => 'dmvt',
			    'icon' => 'dolly',
			    'title' => "Danh mục vật tư",
			    'childen' => $dmvt
			);
		}
		// Kế toán
		if ($this->checkPermission($Element,"ketoan") == TRUE ) {

			$ketoan = array();
			if ($this->checkPermission($Element,"ketoan/phieuketoan") == TRUE ) {
				$ketoan[] = array(
					'id' => 'ketoan-phieuketoan',
					'title' => "Phiếu kế toán",
					'url' => '?router=ketoan/phieuketoan'

				);
			}
			
			$menu[] = array(
			    'id' => 'ketoan',
			    'icon' => 'dollar-sign',
			    'title' => "Tài chính - Kế toán",
			    'childen' => $ketoan
			);
		}

		//danh mục đối tượng
		if ($this->checkPermission($Element,"dmdt") == TRUE ) {

			$dmdt = array();
			if ($this->checkPermission($Element,"dmdt/dmnv") == TRUE ) {
				$dmdt[] = array(
					'id' => 'dmdt-dmnv',
					'title' => 'Nhân viên',
					'url' => '?router=dmdt/dmnv'

				);
			}
			if ($this->checkPermission($Element,"dmdt/dmkh") == TRUE ) {
				$dmdt[] = array(
					'id' => 'dmdt-dmkh',
					'title' => 'Khách hàng',
					'url' => '?router=dmdt/dmkh'

				);
			}
			if ($this->checkPermission($Element,"dmdt/dmncc") == TRUE ) {
				$dmdt[] = array(
					'id' => 'dmdt-dmncc',
					'title' => 'Nhà cung cấp',
					'url' => '?router=dmdt/dmncc'

				);
			}
			
			$menu[] = array(
			    'id' => 'dmdt',
			    'icon' => 'user',
			    'title' => 'Đối tượng',
			    'childen' => $dmdt
			);
		}
		//danh mục theo dõi kho
		if ($this->checkPermission($Element,"dmtdk") == TRUE ) {

			$dmtdk = array();
			if ($this->checkPermission($Element,"dmtdk/dmk") == TRUE ) {
				$dmtdk[] = array(
					'id' => 'dmtdk-dmk',
					'title' => 'Kho',
					'url' => '?router=dmtdk/dmk'

				);
			}
			
			$menu[] = array(
			    'id' => 'dmtdk',
			    'icon' => 'box',
			    'title' => 'Theo dõi kho',
			    'childen' => $dmtdk
			);
		}

		//danh mục theo dõi chi phí
		if ($this->checkPermission($Element,"dmcp") == TRUE ) {

			$dmcp = array();
			if ($this->checkPermission($Element,"dmcp/dmhd") == TRUE ) {
				$dmcp[] = array(
					'id' => 'dmcp-dmhd',
					'title' => 'Vụ việc hợp đồng',
					'url' => '?router=dmcp/dmhd'

				);
			}
			if ($this->checkPermission($Element,"dmcp/dmhd") == TRUE ) {
				$dmcp[] = array(
					'id' => 'dmcp-dmhd',
					'title' => 'Vụ việc hợp đồng',
					'url' => '?router=dmcp/dmhd'
				);
			}
			$menu[] = array(
			    'id' => 'dmcp',
			    'icon' => 'clipboard-check',
			    'title' => 'Theo dõi chi phí',
			    'childen' => $dmcp
			);
		}
		//Báo cáo
		if ($this->checkPermission($Element,"baocao") == TRUE ) {

			$baocao = array();
			if ($this->checkPermission($Element,"baocao/baocaodtbh") == TRUE ) {
				$baocao[] = array(
					'id' => 'baocao-baocaodtbh',
					'title' => 'Báo cáo doanh thu bán hàng',
					'url' => '?router=baocao/baocaodtbh'

				);
			}
			
			$menu[] = array(
			    'id' => 'baocao',
			    'icon' => 'flag',
			    'title' => 'báo cáo',
			    'childen' => $baocao
			);
		}
		//Hệ thống 
		if ($this->checkPermission($Element,"system") == TRUE ) {

			$system = array();
			if ($this->checkPermission($Element,"system/grouppermission") == TRUE ) {
				$system[] = array(
					'id' => 'system-grouppermission',
					'title' => $_['text_grouppermission'],
					'url' => '?router=system/grouppermission'

				);
			}
			if ($this->checkPermission($Element,"system/user") == TRUE ) {
				$system[] = array(
					'id' => 'system-user',
					'title' => $_['text_user'],
					'url' => '?router=system/user'

				);
			}
			
			$menu[] = array(
			    'id' => 'system',
			    'icon' => 'cog fa-spin',
			    'title' => $_['text_system'],
			    'childen' => $system
			);
		}

		require "views/templates/common/sidebar.php";
	}
	private function checkPermission($data1,$data2) {
		if (strpos(" ".$data1,$data2) > 0 ) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

}
$Sb = new SideBar;
$Sb->SideBarElement($_SESSION['group']); 

?>