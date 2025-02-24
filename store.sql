-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2024 at 02:13 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `store`
--

-- --------------------------------------------------------

--
-- Table structure for table `cauhinh`
--

CREATE TABLE `cauhinh` (
  `TenQuan` varchar(500) NOT NULL,
  `SoDienThoai` varchar(11) NOT NULL,
  `MaQR` text NOT NULL,
  `GioMoCua` time NOT NULL,
  `GioDongCua` time NOT NULL,
  `DiaChiQuan` text NOT NULL,
  `MaQRThanhToan` text NOT NULL,
  `ChuTaiKhoan` varchar(255) NOT NULL,
  `SoTaiKhoan` varchar(255) NOT NULL,
  `ApiGiaoDich` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cauhinh`
--

INSERT INTO `cauhinh` (`TenQuan`, `SoDienThoai`, `MaQR`, `GioMoCua`, `GioDongCua`, `DiaChiQuan`, `MaQRThanhToan`, `ChuTaiKhoan`, `SoTaiKhoan`, `ApiGiaoDich`) VALUES
('Cửa hàng ABC', '0999888999', 'https://api.qrserver.com/v1/create-qr-code/?data=http://localhost/QLCuaHang/', '08:00:00', '20:00:00', 'ABCDE', 'http://localhost/QLCuaHang/uploads/qrson.jpg', 'LE HONG SON', '3522501112002', 'AK_CS.6c66aff0f96b11eeb7001fd7c6ba58cb.VmRs3ZPJpeA91UfQzGmehOSH5gKS9jIZoEegMOs5z0AHqyzdwIJzu03Vzp4zgvZcZ66iMVzT');

-- --------------------------------------------------------

--
-- Table structure for table `chitiethoadon`
--

CREATE TABLE `chitiethoadon` (
  `MaChiTietHoaDon` int(11) NOT NULL,
  `MaHoaDon` int(11) NOT NULL,
  `MaSanPham` int(11) NOT NULL,
  `SoLuong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `chitiethoadon`
--

INSERT INTO `chitiethoadon` (`MaChiTietHoaDon`, `MaHoaDon`, `MaSanPham`, `SoLuong`) VALUES
(254, 215, 7, 1),
(255, 215, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `chuyenmuc`
--

CREATE TABLE `chuyenmuc` (
  `MaChuyenMuc` int(11) NOT NULL,
  `HinhAnh` text NOT NULL,
  `MoTa` text NOT NULL,
  `TenChuyenMuc` varchar(255) NOT NULL,
  `TrangThai` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `chuyenmuc`
--

INSERT INTO `chuyenmuc` (`MaChuyenMuc`, `HinhAnh`, `MoTa`, `TenChuyenMuc`, `TrangThai`) VALUES
(1, 'https://cdn.tgdd.vn/Files/2020/12/16/1314124/thuc-an-nhanh-la-gi-an-thuc-an-nhanh-co-tot-hay-khong-202012161146206471.jpg', 'Món ăn uống rượi', 'Đồ Ăn Nhanh', 1),
(2, 'http://localhost/QLCuaHang/uploads/z4617362745335_4456bfd0f397a69bb165e385ba8916cb.jpg', 'Món ăn uống rượi', 'Nước Uống', 1),
(3, 'http://localhost/QLCuaHang/uploads/z5204981674939_cb87935e11dde5ee3dc2641f5eb6d6043.jpg', 'Món ăn uống rượi', 'Món Nhậu', 0),
(4, 'http://localhost/QLCuaHang/uploads/z4617362804277_275c9f23eb1124b7f6a8496671f60b25.jpg', 'abcde', 'Mục mới', 1);

-- --------------------------------------------------------

--
-- Table structure for table `hoadon`
--

CREATE TABLE `hoadon` (
  `MaHoaDon` int(11) NOT NULL,
  `TongTien` int(11) NOT NULL,
  `ThanhToan` int(11) NOT NULL,
  `ThoiGian` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hoadon`
--

INSERT INTO `hoadon` (`MaHoaDon`, `TongTien`, `ThanhToan`, `ThoiGian`) VALUES
(215, 20000, 1, '2024-04-14 19:43:46');

-- --------------------------------------------------------

--
-- Table structure for table `lichsunhap`
--

CREATE TABLE `lichsunhap` (
  `MaLichSuNhap` int(11) NOT NULL,
  `MaNhanVien` int(11) NOT NULL,
  `MaNhaCungCap` int(11) NOT NULL,
  `MaSanPham` int(11) NOT NULL,
  `SoLuongCu` int(11) NOT NULL,
  `SoLuongMoi` int(11) NOT NULL,
  `TongTien` int(11) NOT NULL,
  `ThoiGian` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `lichsunhap`
--

INSERT INTO `lichsunhap` (`MaLichSuNhap`, `MaNhanVien`, `MaNhaCungCap`, `MaSanPham`, `SoLuongCu`, `SoLuongMoi`, `TongTien`, `ThoiGian`) VALUES
(3, 1, 13, 3, 20, 30, 15000, '2024-03-01 22:48:39'),
(4, 1, 13, 4, 0, 15, 150000, '2024-02-29 23:03:47'),
(5, 1, 12, 5, 0, 10, 80000, '2024-02-28 19:12:27'),
(6, 1, 13, 6, 0, 15, 150000, '2024-03-03 20:44:16'),
(7, 2, 13, 6, 15, 10, 100000, '2024-03-03 20:47:18'),
(8, 1, 13, 6, 24, 5, 150000, '2024-04-11 11:47:07'),
(9, 1, 13, 6, 29, 1, 15000, '2024-04-11 11:47:17'),
(10, 1, 12, 6, 30, 5, 200000, '2024-04-11 12:02:08'),
(11, 1, 12, 6, 35, 20, 300000, '2024-04-11 12:02:35'),
(12, 1, 13, 7, 0, 15, 150000, '2024-04-11 12:04:36'),
(13, 1, 12, 7, 0, 100, 2000000, '2024-04-13 18:02:23'),
(14, 1, 12, 8, 0, 10, 150000, '2024-07-27 21:43:48'),
(15, 1, 13, 9, 0, 20, 200000, '2024-09-09 20:49:50'),
(16, 1, 13, 9, 20, 240, 2000000, '2024-11-15 19:52:58');

-- --------------------------------------------------------

--
-- Table structure for table `ncc_chuyenmuc`
--

CREATE TABLE `ncc_chuyenmuc` (
  `MaChuyenMuc` int(11) NOT NULL,
  `MaNhaCungCap` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ncc_chuyenmuc`
--

INSERT INTO `ncc_chuyenmuc` (`MaChuyenMuc`, `MaNhaCungCap`) VALUES
(1, 12),
(1, 13),
(2, 12),
(2, 13);

-- --------------------------------------------------------

--
-- Table structure for table `nhacungcap`
--

CREATE TABLE `nhacungcap` (
  `MaNhaCungCap` int(11) NOT NULL,
  `TenNhaCungCap` text NOT NULL,
  `HinhAnh` text NOT NULL,
  `MoTa` text NOT NULL,
  `NgayHopTac` datetime NOT NULL DEFAULT current_timestamp(),
  `TrangThai` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nhacungcap`
--

INSERT INTO `nhacungcap` (`MaNhaCungCap`, `TenNhaCungCap`, `HinhAnh`, `MoTa`, `NgayHopTac`, `TrangThai`) VALUES
(12, 'Nhà cung cấp Nam Hà', 'http://localhost/QLCuaHang/uploads/158192054514.jpg', 'avcde', '2024-02-23 01:22:26', 1),
(13, 'Nhà cung cấp Hồng Bảo', 'http://localhost/QLCuaHang/uploads/z4617362817818_39cacdb57658e537cb0e22dc18e885d8.jpg', 'ádfgasdfdsa', '2024-02-23 01:22:43', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nhanvien`
--

CREATE TABLE `nhanvien` (
  `MaNhanVien` int(11) NOT NULL,
  `TenNhanVien` varchar(255) NOT NULL,
  `HinhAnh` text NOT NULL,
  `TaiKhoan` varchar(255) NOT NULL,
  `MatKhau` varchar(255) NOT NULL,
  `SoDienThoai` varchar(255) NOT NULL,
  `QueQuan` text NOT NULL,
  `PhanQuyen` int(11) NOT NULL DEFAULT 0,
  `TrangThai` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nhanvien`
--

INSERT INTO `nhanvien` (`MaNhanVien`, `TenNhanVien`, `HinhAnh`, `TaiKhoan`, `MatKhau`, `SoDienThoai`, `QueQuan`, `PhanQuyen`, `TrangThai`) VALUES
(1, 'Nguyễn Văn An', 'http://localhost/QLCuaHang/uploads/15819205451.jpg', 'admin', '21232f297a57a5a743894a0e4a801fc3', '0999888999', 'Hà Nội', 1, 1),
(2, 'Nguyễn Văn Bình', 'https://imagescdn.pystravel.vn/uploads/posts/avatar/1581920545.jpg', 'admin123', '21232f297a57a5a743894a0e4a801fc3', '0999888999', 'Hà Nội', 0, 1),
(3, 'Nguyễn Văn An', 'http://localhost/QLCuaHang/uploads/z4617362745335_4456bfd0f397a69bb165e385ba8916cb1.jpg', 'admin234', '206dcce3f82cf8981d316e7900dc8e06', '0379962045', 'Hà Nội', 0, 1),
(4, 'Nguyễn Văn An', 'http://localhost/QLCuaHang/uploads/z4617362817818_39cacdb57658e537cb0e22dc18e885d82.jpg', 'admin789', '206dcce3f82cf8981d316e7900dc8e06', '0379962045', 'Hà Nội', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `MaSanPham` int(11) NOT NULL,
  `TenSanPham` varchar(255) NOT NULL,
  `MoTa` text NOT NULL,
  `GiaBan` int(11) NOT NULL,
  `SoLuong` int(11) NOT NULL DEFAULT 1,
  `MaChuyenMuc` int(11) NOT NULL,
  `HinhAnh` text NOT NULL,
  `MaQR` text NOT NULL,
  `TrangThai` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`MaSanPham`, `TenSanPham`, `MoTa`, `GiaBan`, `SoLuong`, `MaChuyenMuc`, `HinhAnh`, `MaQR`, `TrangThai`) VALUES
(3, 'Trà Sữa Trân Trâu', '<p>abcde</p>', 15000, 35, 2, 'http://localhost/QLCuaHang/uploads/15819205452.jpg', '', 0),
(4, 'Hướng Dương', '<p>abcde</p>', 15000, 12, 2, 'http://localhost/QLCuaHang/uploads/z4617362741623_98c0302df70bfe02dd581fa8a0e35aa6.jpg', '', 0),
(5, 'Sting Vàng', '<p>nước uống</p>', 10000, 50, 1, 'http://localhost/QLCuaHang/uploads/z4617362741623_98c0302df70bfe02dd581fa8a0e35aa61.jpg', '', 0),
(6, 'Trà Sữa Bạc Hà', '<p>Tr&agrave; sữa bạc h&agrave;</p>', 25000, 55, 3, 'http://localhost/QLCuaHang/uploads/tu-26-8-21-9-2022-trai-cay-cac-loai-khuyen-mai-chi-tu-18000d-202209071258179650.jpg', '', 0),
(7, 'Sản phẩm 1', '<p>abcde</p>', 5000, 92, 2, 'http://localhost/QLCuaHang/uploads/z5204981674939_cb87935e11dde5ee3dc2641f5eb6d6042.jpg', '', 0),
(8, 'Oshi Snack Tôm', '<p>Snack t&ocirc;m cay Oishi đủ vị g&oacute;i lớn 68g l&agrave; sản phẩm của Oishi&nbsp;l&agrave; thương hiệu b&aacute;nh kẹo nổi tiếng được nhiều người y&ecirc;u th&iacute;ch tại Việt Nam. Một trong những sản phẩm nổi bật nhất của thương hiệu n&agrave;y l&agrave; c&aacute;c loại b&aacute;nh snack Oishi ph&ocirc; mai, snack cua Crab Me, snack nh&acirc;n đậu phộng Pinattsu, snack que nh&acirc;n kem Akiko,...</p>\r\n<p>Snack t&ocirc;m cay Oishi đủ vị g&oacute;i lớn 68g&nbsp;thuộc top sản phẩm snack ăn vặt tuổi thơ&nbsp;b&aacute;n chạy, sản phẩm được nhiều người đ&oacute;n nhận, đ&aacute;nh gi&aacute; t&iacute;ch cực v&agrave; chưa bao giờ hết &ldquo;HOT&rdquo; tại thị trường Việt Nam.&nbsp;</p>\r\n<p>Snack t&ocirc;m cay Oishi đủ vị g&oacute;i lớn 68g được sản xuất với c&ocirc;ng nghệ rang kh&ocirc;ng dầu (kh&ocirc;ng chi&ecirc;n) gi&uacute;p giảm chất b&eacute;o v&agrave; tốt cho sức khỏe. Snack t&ocirc;m Oishi được phủ xốt cay nồng đặc biệt tạo n&ecirc;n hương vị thơm ngon độc đ&aacute;o. Snack t&ocirc;m cay Oishi ph&ugrave; hợp ăn vặt, vừa ăn vừa xem phim, nghe nhạc, đọc s&aacute;ch kh&aacute; th&uacute; vị.</p>', 15000, 10, 1, 'http://localhost/Store/uploads/May-dong-goi-bim-bim-snack-gia-re.png', '', 1),
(9, 'Sting Vàng Chai 330ml', '<p>Nước uống tăng lực</p>', 10000, 260, 2, 'http://localhost/Store/uploads/nuoc-sting-vang-320ml.jpg', '', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD PRIMARY KEY (`MaChiTietHoaDon`),
  ADD KEY `MaHoaDon` (`MaHoaDon`,`MaSanPham`),
  ADD KEY `MaMonAn` (`MaSanPham`);

--
-- Indexes for table `chuyenmuc`
--
ALTER TABLE `chuyenmuc`
  ADD PRIMARY KEY (`MaChuyenMuc`);

--
-- Indexes for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`MaHoaDon`);

--
-- Indexes for table `lichsunhap`
--
ALTER TABLE `lichsunhap`
  ADD PRIMARY KEY (`MaLichSuNhap`),
  ADD KEY `MaNhanVien` (`MaNhanVien`,`MaNhaCungCap`,`MaSanPham`),
  ADD KEY `MaNhaCungCap` (`MaNhaCungCap`),
  ADD KEY `MaMonAn` (`MaSanPham`);

--
-- Indexes for table `ncc_chuyenmuc`
--
ALTER TABLE `ncc_chuyenmuc`
  ADD PRIMARY KEY (`MaChuyenMuc`,`MaNhaCungCap`),
  ADD KEY `MaNhaCungCap` (`MaNhaCungCap`);

--
-- Indexes for table `nhacungcap`
--
ALTER TABLE `nhacungcap`
  ADD PRIMARY KEY (`MaNhaCungCap`);

--
-- Indexes for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`MaNhanVien`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`MaSanPham`),
  ADD KEY `MaLoaiMonAn` (`MaChuyenMuc`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  MODIFY `MaChiTietHoaDon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=256;

--
-- AUTO_INCREMENT for table `chuyenmuc`
--
ALTER TABLE `chuyenmuc`
  MODIFY `MaChuyenMuc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `MaHoaDon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=216;

--
-- AUTO_INCREMENT for table `lichsunhap`
--
ALTER TABLE `lichsunhap`
  MODIFY `MaLichSuNhap` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `nhacungcap`
--
ALTER TABLE `nhacungcap`
  MODIFY `MaNhaCungCap` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `MaNhanVien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `MaSanPham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD CONSTRAINT `chitiethoadon_ibfk_1` FOREIGN KEY (`MaHoaDon`) REFERENCES `hoadon` (`MaHoaDon`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `chitiethoadon_ibfk_2` FOREIGN KEY (`MaSanPham`) REFERENCES `sanpham` (`MaSanPham`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `lichsunhap`
--
ALTER TABLE `lichsunhap`
  ADD CONSTRAINT `lichsunhap_ibfk_1` FOREIGN KEY (`MaNhanVien`) REFERENCES `nhanvien` (`MaNhanVien`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `lichsunhap_ibfk_2` FOREIGN KEY (`MaNhaCungCap`) REFERENCES `nhacungcap` (`MaNhaCungCap`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `lichsunhap_ibfk_3` FOREIGN KEY (`MaSanPham`) REFERENCES `sanpham` (`MaSanPham`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `ncc_chuyenmuc`
--
ALTER TABLE `ncc_chuyenmuc`
  ADD CONSTRAINT `ncc_chuyenmuc_ibfk_1` FOREIGN KEY (`MaChuyenMuc`) REFERENCES `chuyenmuc` (`MaChuyenMuc`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `ncc_chuyenmuc_ibfk_2` FOREIGN KEY (`MaNhaCungCap`) REFERENCES `nhacungcap` (`MaNhaCungCap`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`MaChuyenMuc`) REFERENCES `chuyenmuc` (`MaChuyenMuc`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
