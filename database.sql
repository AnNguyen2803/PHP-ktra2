-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 28, 2024 at 09:53 AM
-- Server version: 8.2.0
-- PHP Version: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `chitietgiaodich`
--

DROP TABLE IF EXISTS `chitietgiaodich`;
CREATE TABLE IF NOT EXISTS `chitietgiaodich` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `mahd` varchar(10) NOT NULL,
  `loai` varchar(5) NOT NULL,
  `soluong` int NOT NULL,
  `dongia` int NOT NULL,
  `ngaygiaodich` date NOT NULL,
  `ghichu` varchar(255) DEFAULT NULL,
  `makv` int DEFAULT NULL,
  `manv` int DEFAULT NULL,
  `mancc` int DEFAULT NULL,
  `masp` int DEFAULT NULL,
  PRIMARY KEY (`ID`,`mahd`),
  KEY `fk_kv_gd` (`makv`),
  KEY `fk_nv_gd` (`manv`),
  KEY `fk_ncc_gd` (`mancc`),
  KEY `fk_sp_gd` (`masp`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `chitietgiaodich`
--

INSERT INTO `chitietgiaodich` (`ID`, `mahd`, `loai`, `soluong`, `dongia`, `ngaygiaodich`, `ghichu`, `makv`, `manv`, `mancc`, `masp`) VALUES
(1, 'HDN001', 'N', 5, 20000000, '2024-04-15', 'Giao dịch mua hàng', 1, 1, 1, 1),
(2, 'HDX001', 'X', 3, 15000000, '2024-04-15', 'Giao dịch xuất hàng', 1, 1, 1, 2),
(3, 'HDX002', 'N', 2, 25000000, '2024-04-16', 'Giao dịch xuất hàng', 2, 2, 2, 3),
(4, 'HDN011', 'N', 5, 20000000, '2024-04-15', 'Giao dịch mua hàng', 1, 1, 1, 1),
(5, 'HDN012', 'N', 3, 15000000, '2024-04-15', 'Giao dịch mua hàng', 1, 1, 1, 2),
(6, 'HDX022', 'X', 2, 25000000, '2024-04-16', 'Giao dịch xuất hàng', 2, 2, 2, 3),
(7, 'HDX042', 'X', 1, 18000000, '2024-04-16', 'Giao dịch xuất hàng', 2, 2, 2, 4),
(8, 'HDN089', 'N', 4, 22000000, '2024-04-17', 'Giao dịch mua hàng', 3, 3, 3, 5),
(9, 'HDN046', 'N', 2, 17000000, '2024-04-17', 'Giao dịch mua hàng', 3, 3, 3, 6),
(10, 'HDX078', 'X', 3, 26000000, '2024-04-18', 'Giao dịch xuất hàng', 4, 4, 4, 7),
(11, 'HDX036', 'X', 2, 19000000, '2024-04-18', 'Giao dịch xuất hàng', 4, 4, 4, 8),
(12, 'HDN084', 'N', 6, 23000000, '2024-04-19', 'Giao dịch mua hàng', 5, 5, 5, 9),
(13, 'HDN065', 'N', 1, 16000000, '2024-04-19', 'Giao dịch mua hàng', 5, 5, 5, 10),
(14, 'HDX016', 'X', 4, 27000000, '2024-04-20', 'Giao dịch xuất hàng', 6, 6, 6, 11),
(15, 'HDX074', 'X', 3, 20000000, '2024-04-20', 'Giao dịch xuất hàng', 6, 6, 6, 12),
(16, 'HDN017', 'N', 2, 24000000, '2024-04-21', 'Giao dịch mua hàng', 7, 7, 7, 13),
(17, 'HDN018', 'N', 5, 19000000, '2024-04-21', 'Giao dịch mua hàng', 7, 7, 7, 14),
(18, 'HDX019', 'X', 3, 28000000, '2024-04-22', 'Giao dịch xuất hàng', 8, 8, 8, 15),
(19, 'HDX020', 'X', 1, 21000000, '2024-04-22', 'Giao dịch xuất hàng', 8, 8, 8, 16),
(20, 'HDN021', 'N', 4, 25000000, '2024-04-23', 'Giao dịch mua hàng', 9, 9, 9, 17),
(21, 'HDN022', 'N', 2, 20000000, '2024-04-23', 'Giao dịch mua hàng', 9, 9, 9, 18),
(22, 'HDX99', 'X', 5, 29000000, '2024-04-24', 'Giao dịch xuất hàng', 10, 10, 10, 19),
(23, 'HDX100', 'X', 2, 22000000, '2024-04-24', 'Giao dịch xuất hàng', 10, 10, 10, 20);

-- --------------------------------------------------------

--
-- Table structure for table `danhmuc`
--

DROP TABLE IF EXISTS `danhmuc`;
CREATE TABLE IF NOT EXISTS `danhmuc` (
  `maloai` int NOT NULL AUTO_INCREMENT,
  `tenloai` varchar(100) NOT NULL,
  PRIMARY KEY (`maloai`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `danhmuc`
--

INSERT INTO `danhmuc` (`maloai`, `tenloai`) VALUES
(1, 'Phone'),
(2, 'Laptop'),
(3, 'Phụ kiện');

-- --------------------------------------------------------

--
-- Table structure for table `khuvuc`
--

DROP TABLE IF EXISTS `khuvuc`;
CREATE TABLE IF NOT EXISTS `khuvuc` (
  `makv` int NOT NULL AUTO_INCREMENT,
  `khuvuc` varchar(50) NOT NULL,
  PRIMARY KEY (`makv`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `khuvuc`
--

INSERT INTO `khuvuc` (`makv`, `khuvuc`) VALUES
(1, 'Kho A'),
(2, 'Cửa hàng A'),
(3, 'Cửa hàng B'),
(4, 'Cửa hàng C');

-- --------------------------------------------------------

--
-- Table structure for table `nhacungcap`
--

DROP TABLE IF EXISTS `nhacungcap`;
CREATE TABLE IF NOT EXISTS `nhacungcap` (
  `mancc` int NOT NULL AUTO_INCREMENT,
  `tenncc` varchar(500) NOT NULL,
  PRIMARY KEY (`mancc`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `nhacungcap`
--

INSERT INTO `nhacungcap` (`mancc`, `tenncc`) VALUES
(1, 'Apple'),
(2, 'Samsung'),
(3, 'Lenovo'),
(4, 'Asus'),
(5, 'Dell');

-- --------------------------------------------------------

--
-- Table structure for table `nhanvien`
--

DROP TABLE IF EXISTS `nhanvien`;
CREATE TABLE IF NOT EXISTS `nhanvien` (
  `manv` int NOT NULL AUTO_INCREMENT,
  `tennv` varchar(100) NOT NULL,
  `diachi` varchar(200) NOT NULL,
  `ngaybatdaulam` date NOT NULL,
  `ID_tk` int NOT NULL,
  PRIMARY KEY (`manv`),
  KEY `fk_ID_tk` (`ID_tk`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `nhanvien`
--

INSERT INTO `nhanvien` (`manv`, `tennv`, `diachi`, `ngaybatdaulam`, `ID_tk`) VALUES
(1, 'Phạm Hồng Anh', 'HN', '2023-01-01', 1),
(2, 'Nguyễn Ngọc An', 'TH', '2023-12-31', 2),
(3, 'Nguyễn Hữu Mạnh', 'NA', '2024-01-01', 3),
(4, 'Hà Xuân Hưng', 'TH', '2024-02-02', 4),
(5, 'Đỗ Đình Thắng', 'BG', '2024-03-03', 5);

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

DROP TABLE IF EXISTS `sanpham`;
CREATE TABLE IF NOT EXISTS `sanpham` (
  `masp` int NOT NULL AUTO_INCREMENT,
  `tensp` varchar(100) NOT NULL,
  `soluongton` int NOT NULL,
  `gianiemyet` int NOT NULL,
  `maloai` int NOT NULL,
  PRIMARY KEY (`masp`),
  KEY `fk_sp_loai` (`maloai`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`masp`, `tensp`, `soluongton`, `gianiemyet`, `maloai`) VALUES
(1, 'Iphone11', 20, 150000000, 1),
(2, 'Iphone12', 30, 160000000, 1),
(3, 'Iphone13', 10, 170000000, 1),
(4, 'Iphone14', 15, 180000000, 1),
(5, 'Iphone15', 20, 190000000, 1),
(6, 'SamsungS15', 12, 100000000, 1),
(7, 'SamsungS23', 13, 110000000, 1),
(8, 'SamsungS22', 14, 120000000, 1),
(9, 'SamsungS20', 5, 130000000, 1),
(10, 'SamsungS23', 20, 14000000, 1),
(11, 'Lenovo G16', 10, 50000000, 2),
(12, 'Lenovo E16', 5, 60000000, 2),
(13, 'Lenovo E14', 3, 70000000, 2),
(14, 'Lenovo G14', 8, 80000000, 2),
(15, 'Dell Inspire14', 8, 19000000, 2),
(16, 'Dell Inspire15', 9, 10000000, 2),
(17, 'Dell Inspire16', 12, 11000000, 2),
(18, 'Asus Vivo14', 6, 12000000, 2),
(19, 'Asus Vivo15', 7, 13000000, 2),
(20, 'Asus Vivo16', 2, 14000000, 2),
(21, 'Sạc Ip - Type C', 30, 150000, 3),
(22, 'Sạc Ip - USB', 20, 160000, 3),
(23, 'Sạc Samsung - Type C', 25, 170000, 3),
(24, 'Sạc Samsung - USB', 18, 180000, 3),
(25, 'Chuột Lenovo', 26, 190000, 3),
(26, 'Chuột Asus', 14, 100000, 3),
(27, 'Chuột Dell', 28, 110000, 3),
(28, 'Bàn phím Lenovo', 21, 120000, 3),
(29, 'Bàn phím Asus', 36, 130000, 3),
(30, 'Bàn phím Dell', 14, 140000, 3);

-- --------------------------------------------------------

--
-- Table structure for table `taikhoan`
--

DROP TABLE IF EXISTS `taikhoan`;
CREATE TABLE IF NOT EXISTS `taikhoan` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `taikhoan` varchar(50) NOT NULL,
  `matkhau` varchar(50) NOT NULL,
  `quyen` int NOT NULL DEFAULT '0',
  `hoatdong` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `taikhoan`
--

INSERT INTO `taikhoan` (`ID`, `taikhoan`, `matkhau`, `quyen`, `hoatdong`) VALUES
(1, 'admin1', 'pass1', 1, 1),
(2, 'user2', 'pass2', 0, 1),
(3, 'user3', 'pass3', 0, 1),
(4, 'user4', 'pass4', 0, 1),
(5, 'user5', 'pass5', 0, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
