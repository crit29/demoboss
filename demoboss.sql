-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 24, 2018 lúc 03:23 AM
-- Phiên bản máy phục vụ: 10.1.31-MariaDB
-- Phiên bản PHP: 7.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `demoboss`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ct00`
--

CREATE TABLE `ct00` (
  `stt_rec` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
  `ma_dvsc` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `ma_ct` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `ngay_ct` date NOT NULL,
  `ngay_lct` date NOT NULL,
  `so_ct` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `so_lo` varchar(9) COLLATE utf8_unicode_ci NOT NULL,
  `ngay_lo` date DEFAULT NULL,
  `ong_ba` varchar(24) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dien_giai` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `nh_dk` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `tk` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `tk_du` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `ps_no_nt` int(9) NOT NULL,
  `ps_co_nt` int(9) NOT NULL,
  `ma_nt` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `ty_gia` int(9) NOT NULL,
  `ps_no` int(9) NOT NULL,
  `ps_co` int(9) NOT NULL,
  `ma_kh` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `tk_cn` tinyint(1) NOT NULL,
  `ma_vv` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `ma_nk` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `ma_td` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `ma_ku` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `user_id0` tinyint(1) NOT NULL,
  `date0` date NOT NULL,
  `time0` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `user_id2` tinyint(1) NOT NULL,
  `date2` date NOT NULL,
  `time2` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `so_dh` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `so_ct0` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `ngay_ct0` date NOT NULL,
  `ct_nxt` tinyint(1) NOT NULL,
  `ma_gd` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `ln` int(5) NOT NULL,
  `ma_td2` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `ma_td3` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `ngay_td1` date NOT NULL,
  `sl_td1` int(9) NOT NULL,
  `sl_td2` int(9) NOT NULL,
  `sl_td3` int(9) NOT NULL,
  `gc_td1` varchar(48) COLLATE utf8_unicode_ci NOT NULL,
  `gc_td2` varchar(48) COLLATE utf8_unicode_ci NOT NULL,
  `gc_td3` varchar(24) COLLATE utf8_unicode_ci NOT NULL,
  `ngay_td2` date NOT NULL,
  `ngay_td3` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `ct00`
--

INSERT INTO `ct00` (`stt_rec`, `ma_dvsc`, `ma_ct`, `ngay_ct`, `ngay_lct`, `so_ct`, `so_lo`, `ngay_lo`, `ong_ba`, `dien_giai`, `nh_dk`, `tk`, `tk_du`, `ps_no_nt`, `ps_co_nt`, `ma_nt`, `ty_gia`, `ps_no`, `ps_co`, `ma_kh`, `tk_cn`, `ma_vv`, `ma_nk`, `ma_td`, `ma_ku`, `user_id0`, `date0`, `time0`, `user_id2`, `date2`, `time2`, `status`, `so_dh`, `so_ct0`, `ngay_ct0`, `ct_nxt`, `ma_gd`, `ln`, `ma_td2`, `ma_td3`, `ngay_td1`, `sl_td1`, `sl_td2`, `sl_td3`, `gc_td1`, `gc_td2`, `gc_td3`, `ngay_td2`, `ngay_td3`) VALUES
('1', '2', '', '0000-00-00', '0000-00-00', '', '', NULL, NULL, '', '', '', '', 0, 0, '', 0, 0, 0, '', 0, '', '', '', '', 0, '0000-00-00', '', 0, '0000-00-00', '', '', '', '', '0000-00-00', 0, '', 0, '', '', '0000-00-00', 0, 0, 0, '', '', '', '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ct70`
--

CREATE TABLE `ct70` (
  `ma_ct` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `ngay_ct` date DEFAULT NULL,
  `so_ct` int(11) DEFAULT NULL,
  `ma_kh` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ma_vt` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sl_nhap` int(11) DEFAULT NULL,
  `sl_xuat` int(11) DEFAULT NULL,
  `gia2` int(11) DEFAULT NULL,
  `tien2` int(11) DEFAULT NULL,
  `gia` int(11) DEFAULT NULL,
  `tien_xuat` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `ct70`
--

INSERT INTO `ct70` (`ma_ct`, `ngay_ct`, `so_ct`, `ma_kh`, `ma_vt`, `sl_nhap`, `sl_xuat`, `gia2`, `tien2`, `gia`, `tien_xuat`) VALUES
('1', '2018-05-14', 1, '1', 'VT001', 2, 1, 100000, 30000, 100000, 20000),
('2', '2018-05-14', 1, '12', '2', 1, 2, 100000, 30000, 100000, 20000),
('3', '2018-05-14', 1, '1', '1', 1, 1, 100000, 30000, 100000, 20000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `ma_khach` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `customer_name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `customer_phone` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `customer_address` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `customer_email` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `customer`
--

INSERT INTO `customer` (`customer_id`, `ma_khach`, `customer_name`, `customer_phone`, `customer_address`, `customer_email`, `status`) VALUES
(1, 'KH01', 'Vanh Leg12555', '0999999999', 'Cầu Giấy - Hà Nội', 'vanhleg@ngomcutoi.com', 1),
(2, 'KH02', 'Thị Trang', '01623723', 'Hà Đông - Hà Nội', 'thitrang@gmail.com', 2),
(5, 'KH03', 'Chí Trung', '098732539', 'hà nội', 'chitrung@gmail.com', 1),
(121, 'KH13', 'aa', '012', 'ha noi', 'a1@gmail.com', 1),
(122, 'KH14', 'aa', '013', 'ha noi', 'a2@gmail.com', 1),
(123, 'KH15', 'aa', '014', 'ha noi', 'a1@gmail.com', 1),
(124, 'KH16', 'aa', '015', 'ha noi', 'a2@gmail.com', 1),
(125, 'KH17', 'aa', '016', 'ha noi', 'a1@gmail.com', 1),
(126, 'KH18', 'aa', '017', 'ha noi', 'a2@gmail.com', 1),
(127, 'KH19', 'aa', '018', 'ha noi', 'a1@gmail.com', 1),
(128, 'KH20', 'aa', '019', 'ha noi', 'a2@gmail.com', 1),
(129, 'KH21', 'aa', '020', 'ha noi', 'a1@gmail.com', 1),
(130, 'KH22', 'aa', '021', 'ha noi', 'a2@gmail.com', 1),
(131, 'KH23', 'aa', '022', 'ha noi', 'a1@gmail.com', 1),
(132, 'KH24', 'aa', '023', 'ha noi', 'a2@gmail.com', 1),
(133, 'KH25', 'aa', '024', 'ha noi', 'a1@gmail.com', 1),
(134, 'KH26', 'aa', '025', 'ha noi', 'a2@gmail.com', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dmdvcs`
--

CREATE TABLE `dmdvcs` (
  `dmdvcs_id` int(11) NOT NULL,
  `ma_dvcs` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `ten_dvcs` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `ten_dvcs2` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date0` date DEFAULT NULL,
  `time0` date DEFAULT NULL,
  `user_id0` int(11) DEFAULT NULL,
  `date2` date DEFAULT NULL,
  `time2` date DEFAULT NULL,
  `user_id2` int(11) DEFAULT NULL,
  `status` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dmdvcs`
--

INSERT INTO `dmdvcs` (`dmdvcs_id`, `ma_dvcs`, `ten_dvcs`, `ten_dvcs2`, `date0`, `time0`, `user_id0`, `date2`, `time2`, `user_id2`, `status`) VALUES
(1, 'dvcs1', 'Phòng cháy chữa cháy', NULL, '2018-06-19', '2018-06-18', 2, NULL, NULL, NULL, 1),
(2, '12', 'haha', '', '0000-00-00', '0000-00-00', 1, NULL, NULL, NULL, 1),
(3, 'dvcs23', 'na ni ', 'navi', '2018-06-14', '2018-06-19', 1, NULL, NULL, NULL, 1),
(4, 'dvcs23', 'na ni the uck', 'navi', '2018-06-14', '2018-06-19', 1, NULL, NULL, NULL, 1),
(5, 'dvcs23', 'na ni ', 'navi', '2018-06-14', '2018-06-19', 1, NULL, NULL, NULL, 1),
(6, 'dvcs23', 'osinewa NaNi', 'navi', '2018-06-14', '2018-06-19', 1, NULL, NULL, NULL, 1),
(7, 'dvcs1', 'Phòng cháy chữa cháy', '', '2018-06-19', '2018-06-18', 1, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dmvt`
--

CREATE TABLE `dmvt` (
  `ma_vt` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `ten_vt` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `dvt` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `nh_vt1` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `nh_vt2` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `nh_vt3` varchar(32) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dmvt`
--

INSERT INTO `dmvt` (`ma_vt`, `ten_vt`, `dvt`, `nh_vt1`, `nh_vt2`, `nh_vt3`) VALUES
('VT001', 'Bao xi măng', 'Bao', '', '', ''),
('VT002', 'Cát', 'm3', '', '', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `hoadon_id` int(11) NOT NULL,
  `hoadon_ma` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `khachhang_id` int(11) NOT NULL,
  `nhanvien1` int(11) NOT NULL,
  `nhanvien2` int(11) NOT NULL,
  `ngaytao` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hoadon`
--

INSERT INTO `hoadon` (`hoadon_id`, `hoadon_ma`, `khachhang_id`, `nhanvien1`, `nhanvien2`, `ngaytao`) VALUES
(1, 'HD001', 2, 0, 0, '2018-07-10'),
(7, 'HD678', 2, 1, 1, '2018-07-19'),
(8, '1234567890', 3, 1, 1, '2018-07-19'),
(9, 'HDBH24', 2, 2, 3, '2018-07-19'),
(10, 'HDNV22', 1, 2, 3, '2018-07-19'),
(11, 'týudskds', 1, 1, 1, '2018-07-20');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon_chitiet`
--

CREATE TABLE `hoadon_chitiet` (
  `hoadon_chitiet_id` int(11) NOT NULL,
  `hoadon_id` int(11) DEFAULT NULL,
  `sanpham_ma` varchar(12) COLLATE utf8_unicode_ci DEFAULT NULL,
  `donviban` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `showroom` int(2) NOT NULL,
  `dongia` int(12) NOT NULL,
  `tienkhuyenmai` int(32) NOT NULL,
  `phantramkhuyenmai` int(3) NOT NULL,
  `soluong` int(4) NOT NULL,
  `thanhtien` int(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hoadon_chitiet`
--

INSERT INTO `hoadon_chitiet` (`hoadon_chitiet_id`, `hoadon_id`, `sanpham_ma`, `donviban`, `showroom`, `dongia`, `tienkhuyenmai`, `phantramkhuyenmai`, `soluong`, `thanhtien`) VALUES
(1, 1, '1', '1', 1, 300000, 0, 0, 1, 300000),
(2, 1, '2', '1', 1, 500000, 0, 0, 2, 1000000),
(3, 7, '1', '1', 0, 0, 0, 0, 0, 0),
(4, 8, '2', '1', 0, 213, 0, 0, 23, 32),
(5, 8, '2', '1', 0, 3123, 0, 0, 32, 232),
(12, 10, '1', '6', 0, 0, 0, 0, 0, 0),
(13, 10, '1', '6', 0, 0, 0, 0, 0, 0),
(14, 10, '2', '6', 0, 0, 0, 0, 0, 0),
(15, 10, '2', '6', 0, 0, 0, 0, 0, 0),
(18, 9, '2', '6', 0, 1, 0, 0, 1, 1),
(19, 9, '2', '6', 0, 23, 0, 0, 23, 2),
(20, 9, '1', '1', 0, 22, 0, 0, 89, 11),
(21, 11, '1', '1', 0, 2, 0, 0, 3, 6),
(22, 11, '1', '1', 0, 0, 0, 0, 0, 0),
(23, 11, '1', '1', 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `kh`
--

CREATE TABLE `kh` (
  `kh_id` int(11) NOT NULL,
  `ma_kh` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `ten_kh` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `dia_chi` varchar(128) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `kh`
--

INSERT INTO `kh` (`kh_id`, `ma_kh`, `ten_kh`, `dia_chi`) VALUES
(1, 'kh01', 'Lê Thị Phương', ''),
(2, 'kh02', 'Nguyễn Viết Thành', ''),
(3, 'kh03', 'Nguyễn Văn Cương', ''),
(4, 'kh04', 'MidOne', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ngoaite`
--

CREATE TABLE `ngoaite` (
  `ngoaite_id` int(11) NOT NULL,
  `ngoaite_ma` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `ngoaite_ten` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `ngoaite_donvi` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `parent_nt` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `ngoaite`
--

INSERT INTO `ngoaite` (`ngoaite_id`, `ngoaite_ma`, `ngoaite_ten`, `ngoaite_donvi`, `parent_nt`) VALUES
(0, 'n/a', 'n/a', 'n/a', 0),
(1, 'VND', 'Việt Nam Đồng', 'đ', 0),
(2, 'USD', 'US - Dolar', '$', 0),
(4, 'EUR', 'Euro', '€', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `nhanvien_id` int(11) NOT NULL,
  `ma_nhanvien` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `nhanvien_name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`nhanvien_id`, `ma_nhanvien`, `nhanvien_name`, `status`) VALUES
(1, 'NVK001', 'Hữu Quỳnh', 1),
(2, 'NVLD032', 'Quỳnh Anh', 2),
(3, 'NVNN92', 'Hữu Đạt', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nvl`
--

CREATE TABLE `nvl` (
  `nvl_id` int(11) NOT NULL,
  `ma_nvl` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `ten_nvl` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `phanloai` varchar(24) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nvl`
--

INSERT INTO `nvl` (`nvl_id`, `ma_nvl`, `ten_nvl`, `phanloai`, `status`) VALUES
(1, 'nvl001', 'Cánh quạt vinawind', 'quạt', NULL),
(2, 'nvl002', 'thân quạt vinawind', 'quạt', NULL),
(3, 'nvl003', 'lồng quạt vinawind', 'quạt', NULL),
(4, 'nvl004', 'kính ', NULL, NULL),
(5, 'mt001', 'Ram 8Gb DDR3 KingMax', 'pc', NULL),
(6, 'mt002', 'Chip I7 - 8640M 3.5 GHz', 'pc', NULL),
(7, 'mt003', 'Màn hình Dell 24 inch', 'pc', NULL),
(8, 'mt005', 'Chuột Razer Mx600', 'pc', NULL),
(9, 'mt006', 'Bàn phím cơ Razer Blackwindown X', 'pc', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nvldm`
--

CREATE TABLE `nvldm` (
  `nvldm_id` int(11) NOT NULL,
  `spdm_id` int(11) NOT NULL,
  `ma_nvl` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `sl_nvl` int(11) NOT NULL,
  `dongia_nvl` int(11) NOT NULL,
  `thanhtien_nvl` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nvldm`
--

INSERT INTO `nvldm` (`nvldm_id`, `spdm_id`, `ma_nvl`, `sl_nvl`, `dongia_nvl`, `thanhtien_nvl`) VALUES
(1, 1, 'nvl01', 12, 2, 24),
(2, 1, 'mt001', 12, 333, 333),
(3, 6, 'nvl003', 2147483647, 2, 24),
(4, 6, 'mt001', 12, 333, 333),
(5, 6, 'mt001', 333, 3, 3),
(7, 8, 'nvl001', 12, 2, 24),
(8, 8, 'mt001', 12, 333, 333),
(9, 9, 'nvl001', 12, 2, 24),
(10, 9, 'mt001', 12, 333, 333),
(11, 9, 'mt002', 12, 333, 3333);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phieuketoan`
--

CREATE TABLE `phieuketoan` (
  `so_ctu` int(11) NOT NULL,
  `ma_donvi` varchar(16) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tong_ps` int(32) DEFAULT NULL,
  `ma_nt` int(2) DEFAULT '1',
  `ti_gia` int(11) DEFAULT NULL,
  `tong_ps_vnd` int(32) DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `phieuketoan`
--

INSERT INTO `phieuketoan` (`so_ctu`, `ma_donvi`, `tong_ps`, `ma_nt`, `ti_gia`, `tong_ps_vnd`, `user_id`) VALUES
(3, 'Cty', 146, 1, 0, 3358000, 1),
(129, 'mau1', 23, 2, 23000, 0, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phieuketoan_chitiet`
--

CREATE TABLE `phieuketoan_chitiet` (
  `phieuketoan_chitiet_id` int(11) NOT NULL,
  `pkt_id` int(11) NOT NULL,
  `tk` int(11) DEFAULT NULL,
  `ma_khach` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ps_no_nt` int(32) DEFAULT NULL,
  `ps_co_nt` int(32) DEFAULT NULL,
  `diengiai` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ps_no_vnd` int(48) DEFAULT NULL,
  `ps_co_vnd` int(48) DEFAULT NULL,
  `nhom_dk` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `phieuketoan_chitiet`
--

INSERT INTO `phieuketoan_chitiet` (`phieuketoan_chitiet_id`, `pkt_id`, `tk`, `ma_khach`, `ps_no_nt`, `ps_co_nt`, `diengiai`, `ps_no_vnd`, `ps_co_vnd`, `nhom_dk`) VALUES
(11, 2, 1, 'notailnumber1', 1000, 1000, 'mua value bet vp', 23000000, 23000000, 0),
(20, 129, 1, '1', 8888, 8888, 'ty', 23000, 23000, 1),
(21, 129, 6, '1', 0, 23, 'ty', 0, 529000, 1),
(22, 129, 2, '1', 23, 0, 'ty', 529000, 0, 1),
(26, 3, 1, '1', 123, 0, '', 2829000, 0, 0),
(27, 3, 1, '1', 23, 0, '', 529000, 0, 0),
(28, 3, 1, '1', 0, 146, '', 0, 3358000, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `sanpham_id` int(11) NOT NULL,
  `sanpham_ma` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `sanpham_ten` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `sanpham_gia` int(64) NOT NULL,
  `sanpham_giakhuyenmai` int(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`sanpham_id`, `sanpham_ma`, `sanpham_ten`, `sanpham_gia`, `sanpham_giakhuyenmai`) VALUES
(1, 'NSC001', 'Nhẫn SJC', 4150000, 3999000),
(2, 'NSC001', 'Vòng cổ lục ', 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `spdm`
--

CREATE TABLE `spdm` (
  `spdm_id` int(11) NOT NULL,
  `ma_sp` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `ngay_dm` date DEFAULT NULL,
  `sl_dm` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `spdm`
--

INSERT INTO `spdm` (`spdm_id`, `ma_sp`, `ngay_dm`, `sl_dm`) VALUES
(1, 'demo', '2018-05-01', 1),
(2, 'hahaha', NULL, 1),
(3, 'hahaha1', NULL, 0),
(6, 'rrrrr', NULL, 0),
(7, 'rrrrrrrr', NULL, 2),
(8, 'kkk', NULL, 23),
(9, 'yyy', NULL, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `so` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `test`
--

INSERT INTO `test` (`id`, `so`) VALUES
(1, 3332214);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tk`
--

CREATE TABLE `tk` (
  `tk_id` int(11) NOT NULL,
  `ten_tk` varchar(48) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ten_tk2` varchar(48) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ma_nt` varchar(3) COLLATE utf8_unicode_ci DEFAULT NULL,
  `loai_tk` int(2) DEFAULT NULL,
  `tk_me` int(11) DEFAULT NULL,
  `bac_tk` tinyint(1) DEFAULT NULL,
  `tk_sc` tinyint(1) DEFAULT NULL,
  `date0` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tk`
--

INSERT INTO `tk` (`tk_id`, `ten_tk`, `ten_tk2`, `ma_nt`, `loai_tk`, `tk_me`, `bac_tk`, `tk_sc`, `date0`) VALUES
(1, 'vietcombank', NULL, 'VND', NULL, NULL, NULL, NULL, NULL),
(2, 'sala', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'yolo', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'tktesst1', '', 'vnd', 0, 1, 1, 0, '0000-00-00'),
(6, 'test23', 'têsss2', 'vnd', 11111, 1, 1, 0, '2018-06-19');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(122) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(122) COLLATE utf8_unicode_ci NOT NULL,
  `user_group_id` int(11) NOT NULL,
  `firstname` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(96) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `user_group_id`, `firstname`, `lastname`, `email`, `status`) VALUES
(1, 'admin', '123', 2, 'Join', 'Snow', 'JoinSnow@gameofthrone.com', 1),
(2, 'crit296', '123', 3, 'Nghị', 'Nguyễn', '29crit@gmail.com', 1),
(4, 'qqqq', 'qq', 2, 'qq', 'qq', 'qqq@qq.com', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_group`
--

CREATE TABLE `user_group` (
  `user_group_id` int(11) NOT NULL,
  `name` varchar(64) CHARACTER SET utf8 NOT NULL,
  `permission` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user_group`
--

INSERT INTO `user_group` (`user_group_id`, `name`, `permission`) VALUES
(1, 'ListPer', 'dmht,dmht/dmdv,dmht/dmlt,dmht/dmtg,dmht/dmtk,dmdt/dmnv,dmdt/dmkh,dmdt/dmncc,dmtdk,dmtdk/dmk,dmtdk/dmphh,dmtdk/dmhh,dmcp,dmcp/dmhd,dmcp/dmkmcp,nxk,nxk/nk,nxk/xdc,nxk/xd,nxk/bh,cntt,cntt/tt,cntt/ct,thdl,thdl/idl,thdl/edl,thdl/tt,bcql,tvha,system,system/grouppermission,system/user,system/backup,system/restore,baocao,baocao/baocaodtbh,dmvt,dmvt/spdm,dmvt/sanpham,ketoan,ketoan/phieuketoan,banhang/hoadondmht,dmht/dmdv,dmht/dmlt,dmht/dmtg,dmht/dmtk,dmdt/dmnv,dmdt/dmkh,dmdt/dmncc,dmtdk,dmtdk/dmk,dmtdk/dmphh,dmtdk/dmhh,dmcp,dmcp/dmhd,dmcp/dmkmcp,nxk,nxk/nk,nxk/xdc,nxk/xd,nxk/bh,cntt,cntt/tt,cntt/ct,thdl,thdl/idl,thdl/edl,thdl/tt,bcql,tvha,system,system/grouppermission,system/user,system/backup,system/restore,baocao,baocao/baocaodtbh,dmvt,dmvt/spdm,ketoan,ketoan/phieuketoan,banhang,banhang/hoadon'),
(2, 'Administrator', 'dmht,dmht/dmdv,dmht/dmlt,dmht/dmtg,dmht/dmtk,dmdt/dmnv,dmdt/dmkh,dmdt/dmncc,dmtdk,dmtdk/dmk,dmtdk/dmphh,dmtdk/dmhh,dmcp,dmcp/dmhd,dmcp/dmkmcp,nxk,nxk/nk,nxk/xdc,nxk/xd,nxk/bh,cntt,cntt/tt,cntt/ct,thdl,thdl/idl,thdl/edl,thdl/tt,bcql,tvha,system,system/grouppermission,system/user,system/backup,system/restore,baocao,baocao/baocaodtbh,dmvt,dmvt/spdm,dmvt/sanpham,ketoan,ketoan/phieuketoan,banhang/hoadondmht,dmht/dmdv,dmht/dmlt,dmht/dmtg,dmht/dmtk,dmdt/dmnv,dmdt/dmkh,dmdt/dmncc,dmtdk,dmtdk/dmk,dmtdk/dmphh,dmtdk/dmhh,dmcp,dmcp/dmhd,dmcp/dmkmcp,nxk,nxk/nk,nxk/xdc,nxk/xd,nxk/bh,cntt,cntt/tt,cntt/ct,thdl,thdl/idl,thdl/edl,thdl/tt,bcql,tvha,system,system/grouppermission,system/user,system/backup,system/restore,baocao,baocao/baocaodtbh,dmvt,dmvt/spdm,ketoan,ketoan/phieuketoan,banhang,banhang/hoadon'),
(3, 'user1', 'dmht,dmht/dmdv,dmht/dmlt,dmht/dmtg,dmht/dmtk,dmdt/dmnv,dmdt/dmkh,dmdt/dmncc,dmtdk,dmtdk/dmk,dmtdk/dmphh,dmtdk/dmhh'),
(4, 'user2', 'dmht,dmht/dmdv,dmht/dmlt,dmht/dmtg,dmht/dmtk,dmdt/dmnv,dmdt/dmkh');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `ct00`
--
ALTER TABLE `ct00`
  ADD PRIMARY KEY (`stt_rec`);

--
-- Chỉ mục cho bảng `ct70`
--
ALTER TABLE `ct70`
  ADD PRIMARY KEY (`ma_ct`);

--
-- Chỉ mục cho bảng `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`),
  ADD UNIQUE KEY `ma_khach` (`ma_khach`);

--
-- Chỉ mục cho bảng `dmdvcs`
--
ALTER TABLE `dmdvcs`
  ADD PRIMARY KEY (`dmdvcs_id`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`hoadon_id`);

--
-- Chỉ mục cho bảng `hoadon_chitiet`
--
ALTER TABLE `hoadon_chitiet`
  ADD PRIMARY KEY (`hoadon_chitiet_id`);

--
-- Chỉ mục cho bảng `kh`
--
ALTER TABLE `kh`
  ADD PRIMARY KEY (`kh_id`);

--
-- Chỉ mục cho bảng `ngoaite`
--
ALTER TABLE `ngoaite`
  ADD PRIMARY KEY (`ngoaite_id`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`nhanvien_id`);

--
-- Chỉ mục cho bảng `nvl`
--
ALTER TABLE `nvl`
  ADD PRIMARY KEY (`nvl_id`);

--
-- Chỉ mục cho bảng `nvldm`
--
ALTER TABLE `nvldm`
  ADD PRIMARY KEY (`nvldm_id`);

--
-- Chỉ mục cho bảng `phieuketoan`
--
ALTER TABLE `phieuketoan`
  ADD PRIMARY KEY (`so_ctu`);

--
-- Chỉ mục cho bảng `phieuketoan_chitiet`
--
ALTER TABLE `phieuketoan_chitiet`
  ADD PRIMARY KEY (`phieuketoan_chitiet_id`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`sanpham_id`);

--
-- Chỉ mục cho bảng `spdm`
--
ALTER TABLE `spdm`
  ADD PRIMARY KEY (`spdm_id`),
  ADD UNIQUE KEY `ma_sp` (`ma_sp`),
  ADD UNIQUE KEY `ma_sp_2` (`ma_sp`);

--
-- Chỉ mục cho bảng `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tk`
--
ALTER TABLE `tk`
  ADD PRIMARY KEY (`tk_id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Chỉ mục cho bảng `user_group`
--
ALTER TABLE `user_group`
  ADD PRIMARY KEY (`user_group_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT cho bảng `dmdvcs`
--
ALTER TABLE `dmdvcs`
  MODIFY `dmdvcs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `hoadon_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `hoadon_chitiet`
--
ALTER TABLE `hoadon_chitiet`
  MODIFY `hoadon_chitiet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `kh`
--
ALTER TABLE `kh`
  MODIFY `kh_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `ngoaite`
--
ALTER TABLE `ngoaite`
  MODIFY `ngoaite_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `nhanvien_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `nvl`
--
ALTER TABLE `nvl`
  MODIFY `nvl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `nvldm`
--
ALTER TABLE `nvldm`
  MODIFY `nvldm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `phieuketoan`
--
ALTER TABLE `phieuketoan`
  MODIFY `so_ctu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT cho bảng `phieuketoan_chitiet`
--
ALTER TABLE `phieuketoan_chitiet`
  MODIFY `phieuketoan_chitiet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `sanpham_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `spdm`
--
ALTER TABLE `spdm`
  MODIFY `spdm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `tk`
--
ALTER TABLE `tk`
  MODIFY `tk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `user_group`
--
ALTER TABLE `user_group`
  MODIFY `user_group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
