-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 15, 2021 lúc 12:48 PM
-- Phiên bản máy phục vụ: 10.4.14-MariaDB
-- Phiên bản PHP: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `website_laptop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dondathang`
--

CREATE TABLE `dondathang` (
  `MaDH` int(11) NOT NULL,
  `MaLT` int(11) NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `ThanhTien` float NOT NULL,
  `NgayDatHang` datetime NOT NULL,
  `HTThanhToan` varchar(20) NOT NULL,
  `XuLy` int(11) NOT NULL DEFAULT 0,
  `GhiChu` text DEFAULT NULL,
  `MaKH` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `dondathang`
--

INSERT INTO `dondathang` (`MaDH`, `MaLT`, `SoLuong`, `ThanhTien`, `NgayDatHang`, `HTThanhToan`, `XuLy`, `GhiChu`, `MaKH`) VALUES
(6, 1, 2, 47980000, '2021-01-15 13:29:43', 'Thẻ ngân hàng', 1, 'Giao hàng lúc 11h30-13h30 trưa', 1),
(7, 6, 3, 86970000, '2021-01-15 13:30:10', 'Trả trực tiếp', 1, 'Giao hàng buổi tối', 1),
(9, 8, 3, 56670000, '2021-01-15 13:30:45', 'Mua trả góp', 0, 'Giao hàng buổi sáng', 1),
(10, 9, 3, 74970000, '2021-01-15 13:31:21', 'Thẻ ngân hàng', 0, 'Giao hàng buổi chiều 4h-6h', 1),
(12, 1, 4, 95960000, '2021-01-15 13:32:36', 'Thẻ ngân hàng', 0, 'Giao hàng lúc sáng', 2),
(13, 6, 1, 28990000, '2021-01-15 13:32:48', 'Thẻ ngân hàng', 1, '', 2),
(14, 7, 1, 32590000, '2021-01-15 13:32:55', 'Trả trực tiếp', 0, '', 2),
(15, 8, 2, 37780000, '2021-01-15 13:33:15', 'Thẻ ngân hàng', 1, 'Giao hàng ban đêm', 2),
(16, 1, 2, 47980000, '2021-01-15 13:33:47', 'Thẻ ngân hàng', 1, '', 3),
(17, 7, 4, 130360000, '2021-01-15 13:33:55', 'Mua trả góp', 1, '', 3),
(18, 9, 3, 74970000, '2021-01-15 13:34:08', 'Thẻ ngân hàng', 0, '', 3),
(19, 10, 6, 165540000, '2021-01-15 13:34:45', 'Thẻ ngân hàng', 1, 'Giao hàng ban đêm', 5),
(21, 6, 1, 28990000, '2021-01-15 13:36:08', 'Thẻ ngân hàng', 0, '', 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hang`
--

CREATE TABLE `hang` (
  `MaHang` int(11) NOT NULL,
  `TenHang` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `hang`
--

INSERT INTO `hang` (`MaHang`, `TenHang`) VALUES
(1, 'Asus'),
(2, 'Dell'),
(3, 'HP'),
(4, 'Lenovo'),
(5, 'Acer'),
(8, 'Apple');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `MaKH` int(11) NOT NULL,
  `TenDangNhap` varchar(20) NOT NULL,
  `MatKhau` varchar(20) NOT NULL,
  `HoTen` varchar(40) NOT NULL,
  `DiaChi` varchar(40) NOT NULL,
  `DienThoai` varchar(12) NOT NULL,
  `NgaySinh` date DEFAULT NULL,
  `GioiTinh` varchar(4) DEFAULT NULL,
  `Email` varchar(40) DEFAULT NULL,
  `Anh` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`MaKH`, `TenDangNhap`, `MatKhau`, `HoTen`, `DiaChi`, `DienThoai`, `NgaySinh`, `GioiTinh`, `Email`, `Anh`) VALUES
(1, 'user01', 'khachhang', 'Lưu Thanh Bìnhh', 'Hà Nội', '0987473929', '1998-05-25', 'Nữ', 'ltb98@gmail.com', 'avatar.png'),
(2, 'user02', 'khachhang', 'Phạm Thế Chiêm', 'Hải Phòng', '0989456382', '1998-12-07', 'Nam', 'ptc98@gmail.com', 'avatar1.png'),
(3, 'user03', 'khachhang', 'Phùng Văn Cường', 'Hà Nam', '02487653', '1999-11-11', 'Nam', 'pvc99@gmail.com', 'avatar2.png'),
(5, 'user04', 'khachhang', 'Hoàng Thùy Linh', 'Ninh Bình', '0987563432', '1996-08-12', 'Nữ', 'htl96@gmail.com', 'avatar1.png'),
(7, 'user05', 'khachhang', 'Nguyễn Thị Lan', 'Hải Dương', '0912764837', '1996-08-12', 'Nữ', 'ntl@gmail.com', 'avatar3.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `laptop`
--

CREATE TABLE `laptop` (
  `MaLT` int(11) NOT NULL,
  `TenLT` varchar(100) NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `DonGia` float NOT NULL,
  `MoTa` text NOT NULL,
  `HinhMinhHoa` varchar(100) NOT NULL,
  `CPU` varchar(100) NOT NULL,
  `Ram` varchar(40) NOT NULL,
  `Ocung` varchar(100) NOT NULL,
  `CardDoHoa` varchar(100) NOT NULL,
  `ManHinh` varchar(100) NOT NULL,
  `MaHang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `laptop`
--

INSERT INTO `laptop` (`MaLT`, `TenLT`, `SoLuong`, `DonGia`, `MoTa`, `HinhMinhHoa`, `CPU`, `Ram`, `Ocung`, `CardDoHoa`, `ManHinh`, `MaHang`) VALUES
(1, 'Lenovo ThinkBook 13s G2 ITL 20V9002GVN', 12, 23990000, 'Bảo Hành 12 tháng,Giao Hàng Miễn Phí', '7607_lenovo_thinkbook_13s_g2_itl_6.jpg', 'Intel® Core™ i7-1165G7 (2.80GHz up to 4.70GHz, 12MB Cache)', ' 8GB Soldered LPDDR4x-4266Mhz', '512GB SSD M.2 2242 PCIe 3.0x4 NVMe', 'Integrated Intel Iris Xe Graphics', '3.3 inch WQXGA (2560x1600) Low power IPS 300nits Anti-glare, 100% sRGB, Dolby Vision', 4),
(6, 'HP Pavilion Gaming 16-a0109TX 31J26PA', 15, 28990000, 'Giao hàng miễn phí nội thành Hà Nội , Bả', '7578_hp_pavilion_gaming_16_1.jpg', 'Intel® Core™ i7-10870H (2.20GHz upto 5.00GHz, 16MB)', '8GB DDR4 3200MHz (2x SO-DIMM socket, up ', '512GB SSD M.2 PCIE + 32 GB Intel® Optane™', 'NVIDIA GeForce GTX 1650Ti 4GB GDDR6 + Intel UHD Graphics', '16.1inch FHD (1920 x 1080), IPS, micro-edge, anti-glare, 250 nits, 45% NTSC', 3),
(7, 'MacBook Pro MYD82SA/A 13in Touch Bar 256GB Space Gray- 2020 (Apple VN)', 15, 32590000, 'Giao hàng miễn phí nội thành Hà Nội tron', '7323_macbook_pro_silver.jpg', 'Apple M1 chip with 8-core CPU and 8-core GPU', '8GB unified memory', '256GB SSD storage', 'Không', '13-inch Retina display with True Tone', 8),
(8, 'Acer Nitro 5 (i5-10300H, 8GB, SSD 256GB, VGA 4GB GTX 1650, 15.6 FHD)', 15, 18890000, 'Giao hàng miễn phí nội thành Hà Nội tron', '7371_acer_nitro_5__i5_10300h__8gb__ssd_256gb__vga_4gb_gtx_1650__15_6_fhd__1.jpg', 'Intel® Core™ i5-10300H (2.50GHz upto 4.50GHz, 8MB Cache)', '8GB DDR4 Bus 3200MHz', '256GB PCIe NVMe SSD', 'NVIDIA GTX 1650 4GB GDDR6', '15.6 inch FHD(1920 x 1080)IPS', 5),
(9, 'Dell Inspiron G5 15 5500 (i7-10750H/ Ram 8GB / SSD 256GB / GTX 1650Ti)', 14, 24990000, 'Giao hàng miễn phí nội thành Hà Nội tron', '6623_inspiron_5500_5.jpg', 'Intel® Core™ i7-10750H (2.60GHz up to 5.00GHz, 12MB cache)', '8GB DDR4-2933MHz, 2x4G', 'SSD 256GB M.2 PCIe NVMe Solid State Drive', 'NVIDIA® GeForce® GTX 1650 Ti 4GB GDDR6', '15.6 inch FHD(1920x1080) 300nits WVA Anti-Glare LED Backlit Display(non-touch), 60Hz refresh rate', 2),
(10, 'ASUS ROG Zephyrus G15 GA502IU-AL007T', 14, 27590000, 'Giao hàng miễn phí nội thành Hà Nội tron', '5840_asus_rog_zephyrus_g15_ga502iu_1.jpg', 'AMD Ryzen 7-4800HS (2.9GHz up to 4.2GHz 8MB Cache)', '8GB DDR4 3200MHz Onboard (1x SO-DIMM soc', '512GB SSD PCIE G3X4', 'NVIDIA GeForce GTX 1660Ti 6GB GDDR6 with ROG Boost', '15.6inch FHD (1920 x 1080) Non-Glare, IPS-Level, 144Hz, 250nits', 1),
(11, 'Asus TUF Gaming A15 FA506II-AL016T', 20, 21990000, '0Bảo hành 24 tháng,Giao hàng miễn phí', '5880_tuf_gaming_a15_fa506.jpg', 'AMD Ryzen™ R7-4800H (2.90GHz up to 4.20GHz, 8MB Cache)', '8GB DDR4 3200MHz (2 x SO-DIMM, Max 32GB)', '512G PCIe® Gen3 SSD', 'nVidia Geforce GTX 1650Ti 4GB GDDR6', '15.6 inch FHD (1920x1080) 144Hz 3ms', 1),
(12, 'Asus VivoBook M433IA-EB339T Trắng', 20, 15590000, 'Bảo hành 24 tháng,Giao hàng miễn phí', '6277_s433_tr___ng_1.jpg', 'AMD Ryzen 5-4500U (2.30GHz upto 4.00GHz, 8MB Cache)', ' 8GB DDR4 3200MHz', '512GB SSD PCI-Express', 'AMD Radeon™ Graphics', '14inch FHD (1920 x 1080) IPS, Anti-Glare with 45% NTSC', 1),
(13, 'Asus VivoBook S533JQ-BQ015T Trắng', 20, 19190000, 'Bảo hành 24 tháng,Giao hàng miễn phí', '6392_s533_tr___ng__2.jpg', 'Intel® Core™ i5-1035G1 (1.00GHz up to 3.60GHz, 6MB Cache)', '8GB DDR4 3200MHz', '512GB SSD PCI-Express', 'NVIDIA GeForce MX350 2GB GDDR5', '15.6inch FHD (1920 x 1080) IPS, Anti-Glare with 45% NTSC', 1),
(14, 'Asus ROG Strix G17 G712L-VEV055T', 20, 34990000, 'Bảo hành 24 tháng,Giao hàng miễn phí', '6320_asus_rog_strix_g17_g712l_2.jpg', 'Intel® Core™ i5-1035G1 (1.00GHz up to 3.60GHz, 6MB Cache)', '8GB DDR4 3200MHz', '512GB SSD PCI-Express', 'NVIDIA GeForce MX350 2GB GDDR5', '15.6inch FHD (1920 x 1080) IPS, Anti-Glare with 45% NTSC', 1),
(15, 'Asus ZenBook 14 UX425EA BM069T', 20, 21590000, 'Bảo hành 24 tháng,Giao hàng miễn phí', '7083_.jpg', 'Intel® Core™ i5-1035G1 (1.00GHz up to 3.60GHz, 6MB Cache)', '8GB DDR4 3200MHz', '512GB SSD PCI-Express', 'NVIDIA GeForce MX350 2GB GDDR5', '15.6inch FHD (1920 x 1080) IPS, Anti-Glare with 45% NTSC', 1),
(16, 'Dell Vosro V3590A P75F010N90A', 20, 14890000, 'Bảo hành 24 tháng,Giao hàng miễn phí', '5358_dell_vosro_v3590a__anh1.jpg', 'Intel® Core™ i5-1035G1 (1.00GHz up to 3.60GHz, 6MB Cache)', '8GB DDR4 3200MHz', '512GB SSD PCI-Express', 'NVIDIA GeForce MX350 2GB GDDR5', '15.6inch FHD (1920 x 1080) IPS, Anti-Glare with 45% NTSC', 2),
(17, 'Dell XPS 13 9310 (i5-1135G7/ Ram 8GB/ SSD 256GB/ FHD)', 20, 32990000, 'Bảo hành 24 tháng,Giao hàng miễn phí', '7567_dell_xps_13_9310_1.jpg', 'Intel® Core™ i5-1035G1 (1.00GHz up to 3.60GHz, 6MB Cache)', '8GB DDR4 3200MHz', '512GB SSD PCI-Express', 'NVIDIA GeForce MX350 2GB GDDR5', '15.6inch FHD (1920 x 1080) IPS, Anti-Glare with 45% NTSC', 2),
(18, 'Dell Inspirion 15 5502 1XGR11', 20, 19590000, 'Bảo hành 24 tháng,Giao hàng miễn phí', '7548_.jpg', 'Intel® Core™ i5-1035G1 (1.00GHz up to 3.60GHz, 6MB Cache)', '8GB DDR4 3200MHz', '512GB SSD PCI-Express', 'NVIDIA GeForce MX350 2GB GDDR5', '15.6inch FHD (1920 x 1080) IPS, Anti-Glare with 45% NTSC', 2),
(19, 'Dell XPS 13 9310 2 in 1 (i7-1165G7 / RAM 16GB / SSD 512GB / FHD)', 20, 44790000, 'Bảo hành 24 tháng,Giao hàng miễn phí', '7519_.jpg', 'Intel® Core™ i5-1035G1 (1.00GHz up to 3.60GHz, 6MB Cache)', '8GB DDR4 3200MHz', '512GB SSD PCI-Express', 'NVIDIA GeForce MX350 2GB GDDR5', '15.6inch FHD (1920 x 1080) IPS, Anti-Glare with 45% NTSC', 2),
(20, 'Dell Latitude 3510 ( i3-10110U, 4GB, 256GB SSD )', 20, 11890000, 'Bảo hành 24 tháng,Giao hàng miễn phí', '5358_dell_vosro_v3590a__anh1.jpg', 'Intel® Core™ i5-1035G1 (1.00GHz up to 3.60GHz, 6MB Cache)', '8GB DDR4 3200MHz', '512GB SSD PCI-Express', 'NVIDIA GeForce MX350 2GB GDDR5', '15.6inch FHD (1920 x 1080) IPS, Anti-Glare with 45% NTSC', 2),
(21, 'HP 15s-du1055TU 1W7P3PA', 20, 7890000, 'Bảo hành 24 tháng,Giao hàng miễn phí', '7617_5531_hp_15s_anh1.jpg', 'Intel® Core™ i5-1035G1 (1.00GHz up to 3.60GHz, 6MB Cache)', '8GB DDR4 3200MHz', '512GB SSD PCI-Express', 'NVIDIA GeForce MX350 2GB GDDR5', '15.6inch FHD (1920 x 1080) IPS, Anti-Glare with 45% NTSC', 3),
(22, 'HP ProBook 455 G7 1A1B0PA', 20, 17390000, 'Bảo hành 24 tháng,Giao hàng miễn phí', '7560_.jpg', 'Intel® Core™ i5-1035G1 (1.00GHz up to 3.60GHz, 6MB Cache)', '8GB DDR4 3200MHz', '512GB SSD PCI-Express', 'NVIDIA GeForce MX350 2GB GDDR5', '15.6inch FHD (1920 x 1080) IPS, Anti-Glare with 45% NTSC', 3),
(23, 'HP Omen 15 2020 (Ryzen 7-4800H, RAM 16GB, SSD 1TB, GTX 1660Ti)', 20, 31990000, 'Bảo hành 24 tháng,Giao hàng miễn phí', '7547_.jpg', 'Intel® Core™ i5-1035G1 (1.00GHz up to 3.60GHz, 6MB Cache)', '8GB DDR4 3200MHz', '512GB SSD PCI-Express', 'NVIDIA GeForce MX350 2GB GDDR5', '15.6inch FHD (1920 x 1080) IPS, Anti-Glare with 45% NTSC', 3),
(24, 'HP Pavilion 15-cs3010TU 8QN78PA', 20, 12590000, 'Bảo hành 24 tháng,Giao hàng miễn phí', '7540_.jpg', 'Intel® Core™ i5-1035G1 (1.00GHz up to 3.60GHz, 6MB Cache)', '8GB DDR4 3200MHz', '512GB SSD PCI-Express', 'NVIDIA GeForce MX350 2GB GDDR5', '15.6inch FHD (1920 x 1080) IPS, Anti-Glare with 45% NTSC', 3),
(25, 'HP 340s G7 224L1PA', 20, 11890000, 'Bảo hành 24 tháng,Giao hàng miễn phí', '7523_.jpg', 'Intel® Core™ i5-1035G1 (1.00GHz up to 3.60GHz, 6MB Cache)', '8GB DDR4 3200MHz', '512GB SSD PCI-Express', 'NVIDIA GeForce MX350 2GB GDDR5', '15.6inch FHD (1920 x 1080) IPS, Anti-Glare with 45% NTSC', 3),
(26, 'Lenovo ThinkBook 13s G2 ITL 20V9002FVN', 20, 20090000, 'Bảo hành 24 tháng,Giao hàng miễn phí', '7608_.jpg', 'Intel® Core™ i5-1035G1 (1.00GHz up to 3.60GHz, 6MB Cache)', '8GB DDR4 3200MHz', '512GB SSD PCI-Express', 'NVIDIA GeForce MX350 2GB GDDR5', '15.6inch FHD (1920 x 1080) IPS, Anti-Glare with 45% NTSC', 4),
(27, 'Lenovo Ideapad Flex 5 14ITL05 82HS00F9VN', 20, 17790000, 'Bảo hành 24 tháng,Giao hàng miễn phí', '7597_lenovo_ideapad_flex_5_14itl05_82hs00f9vn_2.jpg', 'Intel® Core™ i5-1035G1 (1.00GHz up to 3.60GHz, 6MB Cache)', '8GB DDR4 3200MHz', '512GB SSD PCI-Express', 'NVIDIA GeForce MX350 2GB GDDR5', '15.6inch FHD (1920 x 1080) IPS, Anti-Glare with 45% NTSC', 4),
(28, 'Lenovo ThinkPad E15 Gen 2 20T8002YVA', 20, 21059000, 'Bảo hành 24 tháng,Giao hàng miễn phí', '7596_lenovo_thinkpad_e15_gen_2_7.jpg', 'Intel® Core™ i5-1035G1 (1.00GHz up to 3.60GHz, 6MB Cache)', '8GB DDR4 3200MHz', '512GB SSD PCI-Express', 'NVIDIA GeForce MX350 2GB GDDR5', '15.6inch FHD (1920 x 1080) IPS, Anti-Glare with 45% NTSC', 4),
(29, 'Lenovo Ideapad S340-13IML 81UM004SVN', 20, 18590000, 'Bảo hành 24 tháng,Giao hàng miễn phí', '7533_.jpg', 'Intel® Core™ i5-1035G1 (1.00GHz up to 3.60GHz, 6MB Cache)', '8GB DDR4 3200MHz', '512GB SSD PCI-Express', 'NVIDIA GeForce MX350 2GB GDDR5', '15.6inch FHD (1920 x 1080) IPS, Anti-Glare with 45% NTSC', 4),
(30, 'Lenovo Thinkpad T14 GEN 1 20S1SA0F00', 20, 24790000, 'Bảo hành 24 tháng,Giao hàng miễn phí', '7479_.jpg', 'Intel® Core™ i5-1035G1 (1.00GHz up to 3.60GHz, 6MB Cache)', '8GB DDR4 3200MHz', '512GB SSD PCI-Express', 'NVIDIA GeForce MX350 2GB GDDR5', '15.6inch FHD (1920 x 1080) IPS, Anti-Glare with 45% NTSC', 4),
(31, 'Lenovo ThinkPad T490 20RYS09400', 20, 18790000, 'Bảo hành 24 tháng,Giao hàng miễn phí', '7518_.jpg', 'Intel® Core™ i5-1035G1 (1.00GHz up to 3.60GHz, 6MB Cache)', '8GB DDR4 3200MHz', '512GB SSD PCI-Express', 'NVIDIA GeForce MX350 2GB GDDR5', '15.6inch FHD (1920 x 1080) IPS, Anti-Glare with 45% NTSC', 4),
(32, 'Acer Aspire 3 A315-57G-524Z NX.HZRSV.009', 20, 14190000, 'Bảo hành 24 tháng,Giao hàng miễn phí', '7470_.jpg', 'Intel® Core™ i5-1035G1 (1.00GHz up to 3.60GHz, 6MB Cache)', '8GB DDR4 3200MHz', '512GB SSD PCI-Express', 'NVIDIA GeForce MX350 2GB GDDR5', '15.6inch FHD (1920 x 1080) IPS, Anti-Glare with 45% NTSC', 5),
(33, 'Acer Aspire 3 A315-56-502X NX.HS5SV.00F', 20, 12790000, 'Bảo hành 24 tháng,Giao hàng miễn phí', '7313_acer_aspire_3_a315_56_502x_1.jpg', 'Intel® Core™ i5-1035G1 (1.00GHz up to 3.60GHz, 6MB Cache)', '8GB DDR4 3200MHz', '512GB SSD PCI-Express', 'NVIDIA GeForce MX350 2GB GDDR5', '15.6inch FHD (1920 x 1080) IPS, Anti-Glare with 45% NTSC', 5),
(34, 'Acer Nitro AN515-44-R9F0 NH.Q9NSV.001', 20, 23590000, 'Bảo hành 24 tháng,Giao hàng miễn phí', '7234_.jpg', 'Intel® Core™ i5-1035G1 (1.00GHz up to 3.60GHz, 6MB Cache)', '8GB DDR4 3200MHz', '512GB SSD PCI-Express', 'NVIDIA GeForce MX350 2GB GDDR5', '15.6inch FHD (1920 x 1080) IPS, Anti-Glare with 45% NTSC', 5),
(35, 'Acer Swift 5 SF514-55T-51NZ NX.HX9SV.002', 20, 24490000, 'Bảo hành 24 tháng,Giao hàng miễn phí', '7200_acer_swift_5_sf514_55t_51nz_nx_hx9sv_002_1.jpg', 'Intel® Core™ i5-1035G1 (1.00GHz up to 3.60GHz, 6MB Cache)', '8GB DDR4 3200MHz', '512GB SSD PCI-Express', 'NVIDIA GeForce MX350 2GB GDDR5', '15.6inch FHD (1920 x 1080) IPS, Anti-Glare with 45% NTSC', 5),
(36, 'Acer Aspire 5 A514-53-346U NX.HUSSV.005', 20, 12890000, 'Bảo hành 24 tháng,Giao hàng miễn phí', '7088_5918_acer_aspire_5_a514_4.jpg', 'Intel® Core™ i5-1035G1 (1.00GHz up to 3.60GHz, 6MB Cache)', '8GB DDR4 3200MHz', '512GB SSD PCI-Express', 'NVIDIA GeForce MX350 2GB GDDR5', '15.6inch FHD (1920 x 1080) IPS, Anti-Glare with 45% NTSC', 5),
(37, 'MacBook Pro MYD82SA/A 13in Touch Bar 256GB Space Gray- 2020 (Apple VN)', 20, 32590000, 'Bảo hành 24 tháng,Giao hàng miễn phí', '7323_.jpg', 'Intel® Core™ i5-1035G1 (1.00GHz up to 3.60GHz, 6MB Cache)', '8GB DDR4 3200MHz', '512GB SSD PCI-Express', 'NVIDIA GeForce MX350 2GB GDDR5', '15.6inch FHD (1920 x 1080) IPS, Anti-Glare with 45% NTSC', 8),
(38, 'MacBook Pro MYD82SA/A 13in Touch Bar 256GB Space Gray- 2020 (Apple VN)', 20, 21990000, 'Bảo hành 24 tháng,Giao hàng miễn phí', '7317_.jpg', 'Intel® Core™ i5-1035G1 (1.00GHz up to 3.60GHz, 6MB Cache)', '8GB DDR4 3200MHz', '512GB SSD PCI-Express', 'NVIDIA GeForce MX350 2GB GDDR5', '15.6inch FHD (1920 x 1080) IPS, Anti-Glare with 45% NTSC', 8),
(39, 'Macbook Air MGN73SA/A 13-inch 512G Space Gray- 2020 (Apple VN)', 20, 31490000, 'Bảo hành 24 tháng,Giao hàng miễn phí', '7316_macbook_air_gray_2020_3.jpg', 'Intel® Core™ i5-1035G1 (1.00GHz up to 3.60GHz, 6MB Cache)', '8GB DDR4 3200MHz', '512GB SSD PCI-Express', 'NVIDIA GeForce MX350 2GB GDDR5', '15.6inch FHD (1920 x 1080) IPS, Anti-Glare with 45% NTSC', 8),
(40, 'iMac 21.5-inch Retina 4K Display MRT32', 20, 29990000, 'Bảo hành 24 tháng,Giao hàng miễn phí', '1176_363ba5b79440420b5457bedb6fc9cd26.jpg', 'Intel® Core™ i5-1035G1 (1.00GHz up to 3.60GHz, 6MB Cache)', '8GB DDR4 3200MHz', '512GB SSD PCI-Express', 'NVIDIA GeForce MX350 2GB GDDR5', '15.6inch FHD (1920 x 1080) IPS, Anti-Glare with 45% NTSC', 8),
(41, 'Macbook Air MGNE3SA/A 13-inch 512G Gold- 2020 (Apple VN)', 20, 31490000, 'Bảo hành 24 tháng,Giao hàng miễn phí', '7317_.jpg', 'Intel® Core™ i5-1035G1 (1.00GHz up to 3.60GHz, 6MB Cache)', '8GB DDR4 3200MHz', '512GB SSD PCI-Express', 'NVIDIA GeForce MX350 2GB GDDR5', '15.6inch FHD (1920 x 1080) IPS, Anti-Glare with 45% NTSC', 8);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quantri`
--

CREATE TABLE `quantri` (
  `MaQT` int(11) NOT NULL,
  `TenDangNhap` varchar(20) NOT NULL,
  `MatKhau` varchar(20) NOT NULL,
  `HoTen` varchar(40) NOT NULL,
  `Anh` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `quantri`
--

INSERT INTO `quantri` (`MaQT`, `TenDangNhap`, `MatKhau`, `HoTen`, `Anh`) VALUES
(1, 'admin', 'admin', 'Lưu Việt Anh', 'user.jpg'),
(2, 'LuuAnh1', 'admin', 'Lưu Anh 1', 'QuanTri.jfif'),
(13, 'LuuAnh2', 'admin', 'Lưu Anh 2', 'QuanTri1.jfif'),
(14, 'LuuAnh3', 'admin', 'Lưu  Anh 3', 'avatar2.png');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `dondathang`
--
ALTER TABLE `dondathang`
  ADD PRIMARY KEY (`MaDH`,`MaLT`),
  ADD KEY `fk_MaKH_KhachHang` (`MaKH`);

--
-- Chỉ mục cho bảng `hang`
--
ALTER TABLE `hang`
  ADD PRIMARY KEY (`MaHang`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`MaKH`,`TenDangNhap`);

--
-- Chỉ mục cho bảng `laptop`
--
ALTER TABLE `laptop`
  ADD PRIMARY KEY (`MaLT`),
  ADD KEY `fk_MaHang_Hang` (`MaHang`);

--
-- Chỉ mục cho bảng `quantri`
--
ALTER TABLE `quantri`
  ADD PRIMARY KEY (`MaQT`,`TenDangNhap`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `dondathang`
--
ALTER TABLE `dondathang`
  MODIFY `MaDH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `hang`
--
ALTER TABLE `hang`
  MODIFY `MaHang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `MaKH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `laptop`
--
ALTER TABLE `laptop`
  MODIFY `MaLT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT cho bảng `quantri`
--
ALTER TABLE `quantri`
  MODIFY `MaQT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `dondathang`
--
ALTER TABLE `dondathang`
  ADD CONSTRAINT `fk_MaKH_KhachHang` FOREIGN KEY (`MaKH`) REFERENCES `khachhang` (`MaKH`);

--
-- Các ràng buộc cho bảng `laptop`
--
ALTER TABLE `laptop`
  ADD CONSTRAINT `fk_MaHang_Hang` FOREIGN KEY (`MaHang`) REFERENCES `hang` (`MaHang`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
