-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 03, 2017 lúc 04:34 PM
-- Phiên bản máy phục vụ: 10.1.24-MariaDB
-- Phiên bản PHP: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `qt`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binhluan`
--

CREATE TABLE `binhluan` (
  `id` int(11) NOT NULL,
  `noidung` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tgtao` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `users_id` int(11) NOT NULL,
  `sanpham_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `binhluan`
--

INSERT INTO `binhluan` (`id`, `noidung`, `tgtao`, `users_id`, `sanpham_id`) VALUES
(26, 'Look good !!! <3', '2017-11-21 22:13:14', 27, 57),
(27, 'Nice', '2017-12-03 12:11:54', 22, 66),
(28, 'Nice\n', '2017-12-03 12:31:25', 22, 65),
(30, 'GOOD\n<3 <3', '2017-12-03 12:34:21', 27, 65),
(31, 'Woooo !!!', '2017-12-03 12:35:31', 27, 66);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhgia`
--

CREATE TABLE `danhgia` (
  `id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `sanpham_id` int(11) NOT NULL,
  `diemdg_id` int(11) NOT NULL,
  `tgtao` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `danhgia`
--

INSERT INTO `danhgia` (`id`, `users_id`, `sanpham_id`, `diemdg_id`, `tgtao`) VALUES
(7, 22, 59, 5, '11/18/17, 9:06 AM'),
(11, 22, 57, 5, '11/21/17, 9:45 PM'),
(12, 22, 67, 4, '12/3/17, 11:02 AM'),
(13, 22, 64, 3, '12/3/17, 11:20 AM'),
(16, 22, 62, 3, '12/3/17, 11:50 AM'),
(17, 22, 66, 5, '12/3/17, 11:50 AM'),
(18, 22, 63, 3, '12/3/17, 11:50 AM'),
(19, 22, 60, 4, '12/3/17, 11:51 AM'),
(20, 22, 65, 3, '12/3/17, 12:33 PM'),
(21, 27, 66, 4, '12/3/17, 12:34 PM'),
(22, 22, 70, 5, '12/3/17, 5:06 PM'),
(23, 22, 73, 4, '12/3/17, 10:16 PM');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `diemdg`
--

CREATE TABLE `diemdg` (
  `id` int(11) NOT NULL,
  `diem` int(11) NOT NULL,
  `tgtao` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `idnguoitao` int(11) NOT NULL,
  `tgsua` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `idnguoisua` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `diemdg`
--

INSERT INTO `diemdg` (`id`, `diem`, `tgtao`, `idnguoitao`, `tgsua`, `idnguoisua`) VALUES
(1, 1, '2017-10-29 09:58:10', 22, '2017-12-02 10:03:25', 22),
(2, 2, '2017-10-29 09:58:18', 22, 'Chưa Có Chỉnh Sửa', 0),
(3, 3, '2017-10-29 09:58:23', 22, 'Chưa Có Chỉnh Sửa', 0),
(4, 4, '2017-10-29 09:58:28', 22, 'Chưa Có Chỉnh Sửa', 0),
(5, 5, '2017-10-29 09:58:33', 22, 'Chưa Có Chỉnh Sửa', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dong`
--

CREATE TABLE `dong` (
  `id` int(11) NOT NULL,
  `ten` varchar(255) COLLATE utf8_unicode_520_ci NOT NULL,
  `loai_id` int(11) NOT NULL,
  `tgtao` varchar(255) COLLATE utf8_unicode_520_ci NOT NULL,
  `tgsua` varchar(255) COLLATE utf8_unicode_520_ci NOT NULL,
  `idnguoitao` int(11) NOT NULL,
  `idnguoisua` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_520_ci;

--
-- Đang đổ dữ liệu cho bảng `dong`
--

INSERT INTO `dong` (`id`, `ten`, `loai_id`, `tgtao`, `tgsua`, `idnguoitao`, `idnguoisua`) VALUES
(17, 'SmartPhone', 7, '2017-10-27 23:18:36', '2017-12-01 21:16:20', 22, 22),
(18, 'Điện Thoại Phím', 7, '2017-10-27 23:18:49', '2017-10-28 23:17:17', 22, 22),
(19, 'Áo thun', 10, '2017-10-29 12:08:26', '2017-12-01 21:01:25', 22, 22),
(20, 'Áo Sơ Mi', 10, '2017-10-29 12:10:51', 'Chưa Có Chỉnh Sửa', 22, 0),
(21, 'Áo Khoác', 10, '2017-10-29 12:12:05', 'Chưa Có Chỉnh Sửa', 22, 0),
(25, 'Laptop', 15, '2017-11-17 10:20:11', 'Chưa Có Chỉnh Sửa', 22, 0),
(26, 'Máy Tính Bảng', 15, '2017-11-17 10:20:30', 'Chưa Có Chỉnh Sửa', 22, 0),
(27, 'Tivi LED', 16, '2017-11-29 08:10:42', 'Chưa Có Chỉnh Sửa', 22, 0),
(28, 'Smart Tivi ', 16, '2017-11-29 08:12:47', '2017-11-29 08:13:55', 22, 22),
(29, 'Automatic', 12, '2017-12-02 19:41:44', 'Chưa Có Chỉnh Sửa', 22, 0),
(30, 'Quartz', 12, '2017-12-02 19:42:41', 'Chưa Có Chỉnh Sửa', 22, 0),
(31, 'Giày Sneaker', 20, '2017-12-03 10:32:02', 'Chưa Có Chỉnh Sửa', 22, 0),
(32, 'Giày Lười', 20, '2017-12-03 10:33:34', 'Chưa Có Chỉnh Sửa', 22, 0),
(33, 'Giày Cao Gót', 20, '2017-12-03 10:33:56', 'Chưa Có Chỉnh Sửa', 22, 0),
(34, 'Balo', 19, '2017-12-03 10:34:51', 'Chưa Có Chỉnh Sửa', 22, 0),
(35, 'Ví Cầm Tay', 19, '2017-12-03 10:35:04', 'Chưa Có Chỉnh Sửa', 22, 0),
(36, 'Quần Jeans', 18, '2017-12-03 10:37:04', 'Chưa Có Chỉnh Sửa', 22, 0),
(37, 'Quần Short', 18, '2017-12-03 10:37:19', 'Chưa Có Chỉnh Sửa', 22, 0),
(38, 'Quần Tây', 18, '2017-12-03 10:37:32', 'Chưa Có Chỉnh Sửa', 22, 0),
(39, 'Vòng Tay', 21, '2017-12-03 10:39:22', 'Chưa Có Chỉnh Sửa', 22, 0),
(40, 'Dây Chuyền', 21, '2017-12-03 10:39:34', 'Chưa Có Chỉnh Sửa', 22, 0),
(41, 'Nhẫn', 21, '2017-12-03 10:39:44', 'Chưa Có Chỉnh Sửa', 22, 0),
(42, 'Bông Tay', 21, '2017-12-03 10:39:55', 'Chưa Có Chỉnh Sửa', 22, 0),
(43, 'Máy Ảnh Mirrorless', 17, '2017-12-03 11:07:21', 'Chưa Có Chỉnh Sửa', 22, 0),
(44, 'Máy Ảnh DSLR', 17, '2017-12-03 11:07:46', 'Chưa Có Chỉnh Sửa', 22, 0),
(45, 'Máy Ảnh Compact', 17, '2017-12-03 11:08:41', 'Chưa Có Chỉnh Sửa', 22, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hangsx`
--

CREATE TABLE `hangsx` (
  `id` int(11) NOT NULL,
  `ten` varchar(255) COLLATE utf8_unicode_520_ci NOT NULL,
  `tgtao` varchar(255) COLLATE utf8_unicode_520_ci NOT NULL,
  `tgsua` varchar(255) COLLATE utf8_unicode_520_ci NOT NULL,
  `idnguoitao` int(11) NOT NULL,
  `idnguoisua` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_520_ci;

--
-- Đang đổ dữ liệu cho bảng `hangsx`
--

INSERT INTO `hangsx` (`id`, `ten`, `tgtao`, `tgsua`, `idnguoitao`, `idnguoisua`) VALUES
(9, 'Apple', '2017-10-28 10:11:59', '2017-11-05 19:14:34', 22, 22),
(10, 'Louis Vuitton', '2017-10-28 10:12:55', 'Chưa Có Chỉnh Sửa', 22, 0),
(11, 'Nokia', '2017-10-29 12:37:17', 'Chưa Có Chỉnh Sửa', 22, 0),
(12, 'Samsung', '2017-11-03 22:03:03', 'Chưa Có Chỉnh Sửa', 22, 0),
(13, 'Dell', '2017-11-08 13:08:14', '2017-11-08 14:40:55', 22, 22),
(14, 'HP', '2017-11-08 13:08:31', 'Chưa Có Chỉnh Sửa', 22, 0),
(15, 'PHP', '2017-11-23 16:00:44', 'Chưa Có Chỉnh Sửa', 22, 0),
(16, 'W It For', '2017-12-02 19:15:17', 'Chưa Có Chỉnh Sửa', 22, 0),
(17, 'Casio', '2017-12-02 20:41:56', 'Chưa Có Chỉnh Sửa', 22, 0),
(18, 'Sony', '2017-12-03 10:53:45', 'Chưa Có Chỉnh Sửa', 22, 0),
(19, 'LG', '2017-12-03 10:53:52', 'Chưa Có Chỉnh Sửa', 22, 0),
(20, 'Orient', '2017-12-03 14:40:54', 'Chưa Có Chỉnh Sửa', 22, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lienhe`
--

CREATE TABLE `lienhe` (
  `id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `trangthai` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sdt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `noidung` text COLLATE utf8_unicode_ci NOT NULL,
  `tgtao` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `idnguoidoc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `lienhe`
--

INSERT INTO `lienhe` (`id`, `users_id`, `trangthai`, `sdt`, `email`, `noidung`, `tgtao`, `idnguoidoc`) VALUES
(13, 22, 'Đã Đọc', '123', 'v@gmail.com', '123', '10/28/17, 9:22 PM', 22),
(14, 22, 'Đã Đọc', '99009277', 'test1@gmail.com', 'ádhj\r\nákdjkáldj\r\nsddddddđ', '10/28/17, 9:48 PM', 22),
(16, 28, 'Đã Đọc', '123', 'm@gmail.com', 'ac', '11/20/17, 4:32 PM', 22),
(17, 29, 'Chưa Đọc', '01296853676', 'giang@gmail.com', 'Hello', '12/3/17, 4:59 PM', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loai`
--

CREATE TABLE `loai` (
  `id` int(11) NOT NULL,
  `ten` varchar(255) COLLATE utf8_unicode_520_ci NOT NULL,
  `nhom_id` int(11) NOT NULL,
  `tgtao` varchar(255) COLLATE utf8_unicode_520_ci NOT NULL,
  `tgsua` varchar(255) COLLATE utf8_unicode_520_ci NOT NULL,
  `idnguoitao` int(11) NOT NULL,
  `idnguoisua` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_520_ci;

--
-- Đang đổ dữ liệu cho bảng `loai`
--

INSERT INTO `loai` (`id`, `ten`, `nhom_id`, `tgtao`, `tgsua`, `idnguoitao`, `idnguoisua`) VALUES
(7, 'Điện Thoại', 8, '2017-10-27 23:06:02', '2017-12-01 20:44:33', 22, 22),
(10, 'Áo', 9, '2017-10-27 23:07:33', 'Chưa Có Chỉnh Sửa', 22, 0),
(12, 'Đồng Hồ', 9, '2017-10-27 23:08:03', 'Chưa Có Chỉnh Sửa', 22, 0),
(15, 'Máy Tính', 8, '2017-11-17 10:19:50', 'Chưa Có Chỉnh Sửa', 22, 0),
(16, 'Tivi', 8, '2017-11-21 20:17:34', 'Chưa Có Chỉnh Sửa', 22, 0),
(17, 'Máy Ảnh', 8, '2017-11-21 20:26:20', '2017-11-21 20:26:34', 22, 22),
(18, 'Quần', 9, '2017-12-02 19:35:55', 'Chưa Có Chỉnh Sửa', 22, 0),
(19, 'Túi Xách', 9, '2017-12-02 19:36:29', 'Chưa Có Chỉnh Sửa', 22, 0),
(20, 'Giày', 9, '2017-12-02 19:37:43', '2017-12-03 10:32:17', 22, 22),
(21, 'Trang sức', 9, '2017-12-03 10:38:25', 'Chưa Có Chỉnh Sửa', 22, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `mau`
--

CREATE TABLE `mau` (
  `id` int(11) NOT NULL,
  `ten` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hinhm` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hinhm_dd` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tgtao` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `idnguoitao` int(11) NOT NULL,
  `tgsua` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `idnguoisua` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `mau`
--

INSERT INTO `mau` (`id`, `ten`, `hinhm`, `hinhm_dd`, `tgtao`, `idnguoitao`, `tgsua`, `idnguoisua`) VALUES
(9, 'Màu Đen', '822171020AMblack.png', 'webroot\\files\\Mau\\hinhm\\', '2017-12-02 09:28:53', 22, '', 22),
(10, 'Màu Vàng', '822171021AMgold.jpg', 'webroot\\files\\Mau\\hinhm\\', '2017-12-02 09:29:05', 22, '', 22),
(11, 'Màu Bạc', '822171022AMsilver.jpg', 'webroot\\files\\Mau\\hinhm\\', '2017-12-02 09:29:17', 22, '', 22),
(13, 'Màu Hồng', '822171026AMrosegold.jpg', 'webroot\\files\\Mau\\hinhm\\', '2017-12-02 09:29:10', 22, '', 22),
(14, 'Màu Trắng', '822171028AMwhite.jpg', 'webroot\\files\\Mau\\hinhm\\', '2017-12-02 09:28:43', 22, '', 22),
(15, 'Màu Đỏ', '2017-12-02093151red.jpg', 'webroot\\files\\Mau\\hinhm\\', '2017-12-02 09:31:51', 22, 'Chưa Có Chỉnh Sửa', 0),
(17, 'Xanh Đậm', '2017-12-02192712darkblue.jpg', 'webroot\\files\\Mau\\hinhm\\', '2017-12-02 19:27:12', 22, '2017-12-02 19:27:49', 22),
(18, 'Xanh Dương', '2017-12-02192726blue.jpg', 'webroot\\files\\Mau\\hinhm\\', '2017-12-02 19:27:26', 22, '2017-12-02 19:27:37', 22);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhacc`
--

CREATE TABLE `nhacc` (
  `id` int(11) NOT NULL,
  `ten` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `diachi` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `sdt` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `hinhcc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hinhcc_dd` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tgtao` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tgsua` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `idnguoitao` int(11) NOT NULL,
  `idnguoisua` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nhacc`
--

INSERT INTO `nhacc` (`id`, `ten`, `diachi`, `sdt`, `hinhcc`, `hinhcc_dd`, `tgtao`, `tgsua`, `idnguoitao`, `idnguoisua`) VALUES
(24, 'Lazada', 'lazada.vn', '01296853676', '2017-12-03102911l.png', 'webroot\\files\\Nhacc\\hinhcc\\', '2017-11-06 15:56:03', '2017-12-03 10:29:11', 22, 22),
(25, 'Nguyễn Kim', 'nguyenkim.com', '00', '2017-11-06155629nguyenkim.png', 'webroot\\files\\Nhacc\\hinhcc\\', '2017-11-06 15:56:29', 'Chưa Có Chỉnh Sửa', 22, 0),
(26, 'ebay', 'ebay.com', '00', '2017-11-06155744ebay.png', 'webroot\\files\\Nhacc\\hinhcc\\', '2017-11-06 15:57:44', 'Chưa Có Chỉnh Sửa', 22, 0),
(27, 'Sendo', 'sendo.vn', '00', '2017-11-06155802sendo.png', 'webroot\\files\\Nhacc\\hinhcc\\', '2017-11-06 15:58:02', 'Chưa Có Chỉnh Sửa', 22, 0),
(28, 'Thế Giới Di Động', 'thegioididong.com', '00', '2017-11-06155831thegioididong.jpg', 'webroot\\files\\Nhacc\\hinhcc\\', '2017-11-06 15:58:31', 'Chưa Có Chỉnh Sửa', 22, 0),
(29, 'Điện Máy Xanh', 'dienmayxanh.com', '00', '2017-11-06155922dmx.png', 'webroot\\files\\Nhacc\\hinhcc\\', '2017-11-06 15:59:22', 'Chưa Có Chỉnh Sửa', 22, 0),
(30, 'TechOne', 'techone.vn', '00', '2017-11-06155945techone.png', 'webroot\\files\\Nhacc\\hinhcc\\', '2017-11-06 15:59:45', 'Chưa Có Chỉnh Sửa', 22, 0),
(31, 'Vatgia', 'vatgia.com', '00', '2017-11-06160001vatgia.jpg', 'webroot\\files\\Nhacc\\hinhcc\\', '2017-11-06 16:00:01', 'Chưa Có Chỉnh Sửa', 22, 0),
(32, 'XWatch', '56/14 Lê Lai', '01296853676', '2017-12-03101014xwatch.jpg', 'webroot\\files\\Nhacc\\hinhcc\\', '2017-12-03 10:10:14', 'Chưa Có Chỉnh Sửa', 22, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhom`
--

CREATE TABLE `nhom` (
  `id` int(11) NOT NULL,
  `ten` varchar(255) COLLATE utf8_unicode_520_ci NOT NULL,
  `tgtao` varchar(255) COLLATE utf8_unicode_520_ci NOT NULL,
  `tgsua` varchar(255) COLLATE utf8_unicode_520_ci NOT NULL,
  `idnguoitao` int(11) NOT NULL,
  `idnguoisua` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_520_ci;

--
-- Đang đổ dữ liệu cho bảng `nhom`
--

INSERT INTO `nhom` (`id`, `ten`, `tgtao`, `tgsua`, `idnguoitao`, `idnguoisua`) VALUES
(8, 'Công Nghệ', '2017-10-27 23:04:03', '2017-12-01 20:36:28', 22, 22),
(9, 'Thời Trang', '2017-10-27 23:04:16', '2017-11-05 18:57:15', 22, 22);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phankhuc`
--

CREATE TABLE `phankhuc` (
  `id` int(11) NOT NULL,
  `ten` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dong_id` int(11) NOT NULL,
  `tgtao` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tgsua` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `idnguoitao` int(11) NOT NULL,
  `idnguoisua` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `phankhuc`
--

INSERT INTO `phankhuc` (`id`, `ten`, `dong_id`, `tgtao`, `tgsua`, `idnguoitao`, `idnguoisua`) VALUES
(10, 'Iphone ', 17, '2017-10-27 23:32:32', '2017-11-09 08:39:47', 22, 22),
(11, 'Samsung Galaxy', 17, '2017-10-27 23:32:48', '2017-11-09 08:40:37', 22, 22),
(12, 'Áo thun POLO', 19, '2017-10-29 12:17:23', 'Chưa Có Chỉnh Sửa', 22, 0),
(14, 'Áo thun tay dài', 19, '2017-10-29 12:18:20', '2017-10-29 12:21:49', 22, 22),
(15, 'Nokia 3310', 18, '2017-10-29 12:49:57', '2017-10-29 12:50:05', 22, 22),
(17, 'Dell Inspiron', 25, '2017-11-17 10:22:20', 'Chưa Có Chỉnh Sửa', 22, 0),
(18, 'Dell Vostro', 25, '2017-11-21 20:13:40', 'Chưa Có Chỉnh Sửa', 22, 0),
(19, 'HP Pavilion', 25, '2017-11-21 20:14:37', 'Chưa Có Chỉnh Sửa', 22, 0),
(20, 'HP Envy', 25, '2017-11-21 20:15:02', 'Chưa Có Chỉnh Sửa', 22, 0),
(21, 'Ipad Pro', 26, '2017-11-21 20:25:15', 'Chưa Có Chỉnh Sửa', 22, 0),
(22, 'Lenovo Tab', 26, '2017-11-21 20:25:39', 'Chưa Có Chỉnh Sửa', 22, 0),
(23, 'Áo sơ mi tay dài', 20, '2017-12-02 19:34:53', 'Chưa Có Chỉnh Sửa', 22, 0),
(24, 'Áo sơ mi tay ngắn', 20, '2017-12-02 19:35:13', 'Chưa Có Chỉnh Sửa', 22, 0),
(26, 'Đồng Hồ Cơ OP', 29, '2017-12-02 20:04:27', 'Chưa Có Chỉnh Sửa', 22, 0),
(27, 'Đồng Hồ Pin OP', 30, '2017-12-02 20:05:26', 'Chưa Có Chỉnh Sửa', 22, 0),
(28, 'G-Shock', 30, '2017-12-02 20:24:15', 'Chưa Có Chỉnh Sửa', 22, 0),
(29, 'Internet Tivi LED Sony', 27, '2017-12-03 10:50:34', 'Chưa Có Chỉnh Sửa', 22, 0),
(30, 'Đồng Hồ Orient Sun & Moon', 29, '2017-12-03 14:34:39', 'Chưa Có Chỉnh Sửa', 22, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `ten` varchar(255) COLLATE utf8_unicode_520_ci NOT NULL,
  `chuthich` varchar(255) COLLATE utf8_unicode_520_ci NOT NULL,
  `tgtao` varchar(255) COLLATE utf8_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_520_ci;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`id`, `ten`, `chuthich`, `tgtao`) VALUES
(1, 'Admin', 'Quản lý dữ liệu hệ thống, bao gồm cả các chức năng của thành viên ', '2017-10-29 12:18:22'),
(2, 'Thành viên', 'Sử dụng được các chức năng đăng nhập, sửa thông tin cá nhân, bình luận, đánh giá, tìm kiếm, liên hệ ', '2017-10-29 12:18:33');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `id` int(11) NOT NULL,
  `ten` varchar(255) COLLATE utf8_unicode_520_ci NOT NULL,
  `phankhuc_id` int(11) NOT NULL,
  `hangsx_id` int(11) NOT NULL,
  `hinhsp` varchar(50) COLLATE utf8_unicode_520_ci NOT NULL,
  `hinhsp_dd` varchar(255) COLLATE utf8_unicode_520_ci NOT NULL,
  `thongtin` text COLLATE utf8_unicode_520_ci NOT NULL,
  `tgtao` varchar(255) COLLATE utf8_unicode_520_ci NOT NULL,
  `tgsua` varchar(255) COLLATE utf8_unicode_520_ci NOT NULL,
  `idnguoitao` int(11) NOT NULL,
  `idnguoisua` int(11) NOT NULL,
  `mau_id` int(11) NOT NULL,
  `diemtb` float NOT NULL,
  `luotxem` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  `barcode` varchar(255) COLLATE utf8_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_520_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`id`, `ten`, `phankhuc_id`, `hangsx_id`, `hinhsp`, `hinhsp_dd`, `thongtin`, `tgtao`, `tgsua`, `idnguoitao`, `idnguoisua`, `mau_id`, `diemtb`, `luotxem`, `tag_id`, `barcode`) VALUES
(57, 'Samsung Galaxy J7 Pro 32GB (Đen)', 11, 12, '2017-11-09092026samsung-galaxy-j7-pro.jpg', 'webroot\\files\\Sanpham\\hinhsp\\', 'Màn hình\r\nCông nghệ màn hình	Super AMOLED\r\nĐộ phân giải	Full HD (1080 x 1920 pixels)\r\nMàn hình rộng	5.5\"\r\nMặt kính cảm ứng	Kính cường lực Gorilla Glass 4\r\n\r\nCamera sau\r\nĐộ phân giải	13 MP\r\nQuay phim	Có quay phim\r\nĐèn Flash	Có\r\nChụp ảnh nâng cao	Tự động lấy nét, Chạm lấy nét, Nhận diện khuôn mặt, HDR, Panorama, Chế độ chụp chuyên nghiệp\r\n\r\nCamera trước\r\nĐộ phân giải	13 MP\r\nVideocall	Có\r\nThông tin khác	Camera góc rộng, Chế độ làm đẹp, Selfie bằng cử chỉ, Nhận diện khuôn mặt\r\n\r\nHệ điều hành - CPU\r\nHệ điều hành	Android 7.0\r\nChipset (hãng SX CPU)	Exynos 7870 8 nhân 64-bit\r\nTốc độ CPU	1.6 GHz\r\nChip đồ họa (GPU)	Mali-T830\r\n\r\nBộ nhớ & Lưu trữ\r\nRAM	3 GB\r\nBộ nhớ trong	32 GB\r\nBộ nhớ còn lại (khả dụng)	24.4 GB\r\nThẻ nhớ ngoài	MicroSD, hỗ trợ tối đa 256 GB\r\n\r\nKết nối\r\nMạng di động	3G, 4G LTE Cat 6\r\nSIM	2 Nano SIM\r\nWifi	Wi-Fi 802.11 b/g/n, Wi-Fi hotspot\r\nGPS	A-GPS, GLONASS\r\nBluetooth	Có\r\nCổng kết nối/sạc	Micro USB\r\nJack tai nghe	3.5 mm\r\nKết nối khác	OTG\r\n\r\nThiết kế & Trọng lượng\r\nThiết kế	Nguyên khối, mặt kính cong 2.5D\r\nChất liệu	Hợp kim nhôm\r\nKích thước	Dài 152.4mm - Rộng 74.7m - Dày 7.9mm\r\nTrọng lượng	181 g\r\nThông tin pin & Sạc\r\nDung lượng pin	3600 mAh\r\nLoại pin	Pin chuẩn Li-Ion\r\nCông nghệ pin	Tiết kiệm pin\r\n\r\nTiện ích\r\nBảo mật nâng cao	Mở khóa bằng vân tay\r\nTính năng đặc biệt	Mặt kính 2.5D\r\nGhi âm	Có\r\nRadio	Có\r\nXem phim	H.265, 3GP, MP4, AVI, WMV, H.264(MPEG4-AVC), DivX, WMV9, Xvid\r\nNghe nhạc	Lossless, MP3, WAV, WMA\r\n\r\nThông tin khác\r\nThời điểm ra mắt	6/2017', '2017-11-09 09:20:26', '2017-12-03 17:41:21', 22, 22, 9, 5, 253, 3, '12232'),
(58, 'Samsung Galaxy J7 Pro 32GB (Vàng Gold)', 11, 12, '2017-11-09092457samsung-galaxy-j7-gold.jpg', 'webroot\\files\\Sanpham\\hinhsp\\', 'Màn hình\r\nCông nghệ màn hình	Super AMOLED\r\nĐộ phân giải	Full HD (1080 x 1920 pixels)\r\nMàn hình rộng	5.5\"\r\nMặt kính cảm ứng	Kính cường lực Gorilla Glass 4\r\n\r\nCamera sau\r\nĐộ phân giải	13 MP\r\nQuay phim	Có quay phim\r\nĐèn Flash	Có\r\nChụp ảnh nâng cao	Tự động lấy nét, Chạm lấy nét, Nhận diện khuôn mặt, HDR, Panorama, Chế độ chụp chuyên nghiệp\r\n\r\nCamera trước\r\nĐộ phân giải	13 MP\r\nVideocall	Có\r\nThông tin khác	Camera góc rộng, Chế độ làm đẹp, Selfie bằng cử chỉ, Nhận diện khuôn mặt\r\n\r\nHệ điều hành - CPU\r\nHệ điều hành	Android 7.0\r\nChipset (hãng SX CPU)	Exynos 7870 8 nhân 64-bit\r\nTốc độ CPU	1.6 GHz\r\nChip đồ họa (GPU)	Mali-T830\r\n\r\nBộ nhớ & Lưu trữ\r\nRAM	3 GB\r\nBộ nhớ trong	32 GB\r\nBộ nhớ còn lại (khả dụng)	24.4 GB\r\nThẻ nhớ ngoài	MicroSD, hỗ trợ tối đa 256 GB\r\n\r\nKết nối\r\nMạng di động	3G, 4G LTE Cat 6\r\nSIM	2 Nano SIM\r\nWifi	Wi-Fi 802.11 b/g/n, Wi-Fi hotspot\r\nGPS	A-GPS, GLONASS\r\nBluetooth	Có\r\nCổng kết nối/sạc	Micro USB\r\nJack tai nghe	3.5 mm\r\nKết nối khác	OTG\r\n\r\nThiết kế & Trọng lượng\r\nThiết kế	Nguyên khối, mặt kính cong 2.5D\r\nChất liệu	Hợp kim nhôm\r\nKích thước	Dài 152.4mm - Rộng 74.7m - Dày 7.9mm\r\nTrọng lượng	181 g\r\nThông tin pin & Sạc\r\nDung lượng pin	3600 mAh\r\nLoại pin	Pin chuẩn Li-Ion\r\nCông nghệ pin	Tiết kiệm pin\r\n\r\nTiện ích\r\nBảo mật nâng cao	Mở khóa bằng vân tay\r\nTính năng đặc biệt	Mặt kính 2.5D\r\nGhi âm	Có\r\nRadio	Có\r\nXem phim	H.265, 3GP, MP4, AVI, WMV, H.264(MPEG4-AVC), DivX, WMV9, Xvid\r\nNghe nhạc	Lossless, MP3, WAV, WMA\r\n\r\nThông tin khác\r\nThời điểm ra mắt	6/2017', '2017-11-09 09:24:57', '2017-12-03 17:41:29', 22, 22, 10, 0, 55, 3, ''),
(59, 'Iphone 7 128GB (Hồng)', 10, 9, '2017-11-09092732ip7hong.jpg', 'webroot\\files\\Sanpham\\hinhsp\\', 'Chưa Có', '2017-11-09 09:27:32', '2017-12-03 17:29:07', 22, 22, 13, 5, 122, 1, ''),
(60, 'Iphone 7 128GB - Đen ', 10, 9, '2017-11-09092806ip7den.png', 'webroot\\files\\Sanpham\\hinhsp\\', 'Chưa Có', '2017-11-09 09:28:06', '2017-11-21 10:56:12', 22, 22, 9, 4, 62, 1, ''),
(61, 'Samsung Galaxy J7 Prime (Trắng)', 11, 12, '2017-11-09100325samsung-galaxy-j7-prime-white.jpg', 'webroot\\files\\Sanpham\\hinhsp\\', 'Chưa Có', '2017-11-09 10:03:25', '2017-12-03 17:29:19', 22, 22, 14, 0, 14, 2, ''),
(62, 'Dell Inspiron 7570 (Bạc)', 17, 13, '2017-11-21203020dell-inspiron-7570.jpg', 'webroot\\files\\Sanpham\\hinhsp\\', 'Chưa có', '2017-11-21 20:30:20', '2017-12-03 17:29:29', 22, 22, 11, 3, 14, 5, ''),
(63, 'Dell Inspiron 7568 (Đen)', 17, 13, '2017-11-21203431dell inspiron 7568.png', 'webroot\\files\\Sanpham\\hinhsp\\', 'Chưa có', '2017-11-21 20:34:31', '2017-12-03 17:29:40', 22, 22, 9, 3, 6, 4, ''),
(64, 'Áo Thun Polo Nam W It For (Xanh Đậm)', 12, 16, '2017-12-03111948aothunnampolowitforxanh.jpg', 'webroot\\files\\Sanpham\\hinhsp\\', 'Kích thước: M,L,XL,2XL\r\n\r\nChất liệu: Cotton,Chất liệu khác\r\n\r\nXuất xứ: Việt Nam', '2017-12-02 19:21:57', '2017-12-03 11:19:48', 22, 22, 17, 3, 10, 6, ''),
(65, 'Áo Thun Polo Nam W It For (Xanh) ', 12, 16, '2017-12-03111921aothunnampolowitforxanhnhat.jpg', 'webroot\\files\\Sanpham\\hinhsp\\', 'Kích thước: M,L,XL,2XL\r\n\r\nChất liệu: Cotton,Chất liệu khác\r\n\r\nXuất xứ: Việt Nam', '2017-12-02 19:29:52', '2017-12-03 11:19:21', 22, 22, 18, 3, 18, 6, ''),
(66, 'G-Shock GA-110HC-1ADR (Xanh)', 28, 17, '2017-12-02204445ga-110hc-1adr.jpg', 'webroot\\files\\Sanpham\\hinhsp\\', 'Xuất xứ	Nhật Bản\r\nKiểu máy	Quartz\r\nĐồng hồ Nam\r\nKích cỡ	55 × 51,2 × 16,9 mm\r\nChất liệu vỏ	Nhựa\r\nChất liệu dây	Dây cao su\r\nChất liệu kính	Kính Khoáng ( Mineral Glass)\r\nĐộ chịu nước	200M\r\n', '2017-12-02 20:44:45', '2017-12-03 12:13:14', 22, 22, 18, 4.5, 16, 8, ''),
(67, 'Internet Tivi LED Sony 32inch HD - Model KDL-32W600D (Đen)', 29, 18, '2017-12-03105957isonytv32i.jpg', 'webroot\\files\\Sanpham\\hinhsp\\', 'Tổng quan\r\nLoại Tivi:Internet Tivi\r\nKích cỡ màn hình:32 inch\r\nĐộ phân giải:HD\r\nChỉ số chuyển động rõ nét:Motionflow™ XR 200 Hz\r\n\r\nKết nối\r\nBluetooth:Không\r\nKết nối Internet:Cổng LAN, Wifi\r\nCổng AV:Có cổng Composite\r\nCổng HDMI:2 cổng\r\nCổng VGA:Không\r\nCổng xuất âm thanh:Cổng Optical (Digital Audio Out), Jack 3.5 mm (cắm loa, tai nghe)\r\nUSB:2 cổng\r\nĐịnh dạng video TV đọc được:MPEG, MP4, WMV, WebM, VOB, MKV, AVI\r\nĐịnh dạng phụ đề TV đọc được:SRT\r\nĐịnh dạng hình ảnh TV đọc được:JPEG, JPG\r\nĐịnh dạng âm thanh TV đọc được:WMA, MP3, WAV\r\nTích hợp đầu thu kỹ thuật số:DVB-T2\r\n\r\nTính năng thông minh (Cập nhật 05/2017)\r\nHệ điều hành, giao diện:Linux\r\nCác ứng dụng sẵn có:Trình duyệt web, YouTube, Netflix, Opera TV Store\r\nCác ứng dụng phổ biến có thể tải thêm:Film+, Zing TV, FPT play, Zing mp3, Nhạc của tui\r\nRemote thông minh:Không dùng được\r\nĐiều khiển tivi bằng điện thoại:Không có ứng dụng do hãng phát triển\r\nKết nối không dây với điện thoại, máy tính bảng:Chiếu màn hình bằng Miracast (Screen Mirroring), Chuyển hình qua Photoshare\r\nKết nối Bàn phím, chuột:Có thể kết nối (chuột chỉ dùng được khi mở trình duyệt web)\r\nCông nghệ hình ảnh, âm thanh\r\nCông nghệ xử lý hình ảnh:Advanced Contrast Enhancer\r\nTivi 3D:Không\r\nCông nghệ âm thanh:Clear Phase, Dolby Digital\r\nTổng công suất loa:10 W (2 loa mỗi loa 5 W)\r\n\r\nThông tin chung\r\nCông suất:45 W\r\nKích thước có chân, đặt bàn:Ngang 73.5 cm - Cao 48.1 cm - Dày 17.4 cm\r\nKhối lượng có chân:5.2 kg\r\nKích thước không chân, treo tường:Ngang 73.5 cm - Cao 44.6 cm - Dày 6.6 cm\r\nKhối lượng không chân:4,9 kg\r\nChất liệu:Viền nhựa, chân đế nhựa\r\nNơi sản xuất:Malaysia\r\nNăm ra mắt:2016', '2017-12-03 10:56:02', '2017-12-03 10:59:57', 22, 22, 9, 4, 3, 9, ''),
(68, 'Nokia 3310 2017 (Vàng)', 15, 11, '2017-12-03142445nokia-3310-2017-vang.jpg', 'webroot\\files\\Sanpham\\hinhsp\\', 'Chưa có', '2017-12-03 14:24:45', '2017-12-03 17:30:11', 22, 22, 10, 0, 2, 10, ''),
(69, 'Nokia 3310 2017 (Đỏ)', 15, 11, '2017-12-03142632nokia_3310_2017-do.png', 'webroot\\files\\Sanpham\\hinhsp\\', 'Chưa có', '2017-12-03 14:26:32', '2017-12-03 17:29:56', 22, 22, 15, 0, 2, 10, ''),
(70, 'Đồng Hồ Orient Sun & Moon Gen II (Trắng)', 30, 20, '2017-12-03144227orientsun&moongen2trang.jpg', 'webroot\\files\\Sanpham\\hinhsp\\', 'Nhãn hiệu	Orient\r\nXuất xứ	Nhật Bản\r\nKiểu máy	Automatic\r\nĐồng hồ dành cho	Đồng hồ Nam\r\nKích cỡ	42.5 mm\r\nChất liệu vỏ	Thép không gỉ\r\nChất liệu dây	Da\r\nChất liệu kính	Kính Sapphire\r\nĐộ chịu nước	50m\r\nChức năng khác	Lịch Sun & Moon\r\n', '2017-12-03 14:42:27', 'Chưa Có Chỉnh Sửa', 22, 0, 14, 5, 4, 11, ''),
(71, 'Đồng Hồ Orient Sun & Moon Gen I (Trắng)', 30, 20, '2017-12-03215532orientsun&moongen1trang.jpg', 'webroot\\files\\Sanpham\\hinhsp\\', 'Xuất xứ	Nhật Bản\r\nKiểu máy	Automatic\r\nĐồng hồ dành cho	Nam\r\nKích cỡ	41.5 mm\r\nChất liệu vỏ	Thép không gỉ 316L\r\nChất liệu dây	Thép không gỉ 316L\r\nChất liệu kính	Kính Sapphire\r\nĐộ chịu nước	30 m\r\nChức năng khác	Lịch ngày, Lịch thứ', '2017-12-03 21:55:32', 'Chưa Có Chỉnh Sửa', 22, 0, 14, 0, 2, 12, ''),
(72, 'iPad Pro 10.5inch 2017 Wifi 64Gb (Vàng) ', 21, 9, '2017-12-03220849ipadprowifi64gbvang.jpg', 'webroot\\files\\Sanpham\\hinhsp\\', 'Màn hình\r\nCông nghệ màn hình	LED backlit LCD\r\nĐộ phân giải	2224 x 1668 pixels\r\nKích thước màn hình	10.5\"\r\n\r\nChụp ảnh & Quay phim\r\nCamera sau	12 MP\r\nQuay phim	Ultra HD@30fps\r\nTính năng camera	F/1.8, Chống rung OIS, Tự động lấy nét, Chạm lấy nét, Nhận diện khuôn mặt, Nhận diện nụ cười, HDR, Panorama\r\nCamera trước	7 MP\r\n\r\nCấu hình\r\nHệ điều hành	iOS 10\r\nLoại CPU (Chipset)	Apple A10X 6 nhân 64-bit\r\nTốc độ CPU	\r\nChip đồ hoạ (GPU)	Power VR\r\nRAM	4 GB\r\nBộ nhớ trong (ROM)	64 GB\r\nBộ nhớ khả dụng	Đang cập nhật\r\nThẻ nhớ ngoài	Không\r\nHỗ trợ thẻ tối đa	Không\r\nCảm biến	Tiệm cận, La bàn, Con quay hồi chuyển 3 chiều, Khí áp kế, Gia tốc, Fingerprint Sensor, Ánh sáng\r\n\r\nKết nối\r\nSố khe SIM	1 SIM\r\nLoại SIM	Nano Sim\r\nThực hiện cuộc gọi	FaceTime\r\nHỗ trợ 3G	Có 3G (tốc độ Download 42 Mbps; Upload 5.76 Mbps)\r\nHỗ trợ 4G	4G LTE\r\nWiFi	Wi-Fi 802.11 a/b/g/n/ac, Dual-band, Wi-Fi hotspot\r\nBluetooth	A2DP, 4.2\r\nGPS	GPS, GLONASS\r\nCổng kết nối/sạc	Lightning\r\nJack tai nghe	3.5 mm\r\nHỗ trợ OTG	Không\r\nKết nối khác	Không\r\n\r\nChức năng khác\r\nGhi âm	Không\r\nRadio	Không\r\nTính năng đặc biệt	4 stereo speakers, Mở khóa bằng vân tay\r\nThiết kế & Trọng lượng\r\nChất liệu	Nhôm nguyên khối\r\nKích thước	Dài 250.6 mm - Ngang 174.1 mm - Dày 6.1 mm\r\nTrọng lượng	477 g\r\nPin & Dung lượng\r\nLoại pin	Lithium - Polymer\r\nMức năng lượng tiêu thụ	30.4 Wh', '2017-12-03 22:08:48', 'Chưa Có Chỉnh Sửa', 22, 0, 10, 0, 0, 13, ''),
(73, 'iPad Pro 10.5inch 2017 Wifi 64Gb (Bạc) ', 21, 9, '2017-12-03221023ipadprowifi64gbbac.png', 'webroot\\files\\Sanpham\\hinhsp\\', 'Màn hình\r\nCông nghệ màn hình	LED backlit LCD\r\nĐộ phân giải	2224 x 1668 pixels\r\nKích thước màn hình	10.5\"\r\nChụp ảnh & Quay phim\r\nCamera sau	12 MP\r\nQuay phim	Ultra HD@30fps\r\nTính năng camera	F/1.8, Chống rung OIS, Tự động lấy nét, Chạm lấy nét, Nhận diện khuôn mặt, Nhận diện nụ cười, HDR, Panorama\r\nCamera trước	7 MP\r\n\r\nCấu hình\r\nHệ điều hành	iOS 10\r\nLoại CPU (Chipset)	Apple A10X 6 nhân 64-bit\r\n\r\nTốc độ CPU	\r\nChip đồ hoạ (GPU)	Power VR\r\nRAM	4 GB\r\nBộ nhớ trong (ROM)	64 GB\r\nBộ nhớ khả dụng	Đang cập nhật\r\nThẻ nhớ ngoài	Không\r\nHỗ trợ thẻ tối đa	Không\r\nCảm biến	Tiệm cận, La bàn, Con quay hồi chuyển 3 chiều, Khí áp kế, Gia tốc, Fingerprint Sensor, Ánh sáng\r\n\r\nKết nối\r\nSố khe SIM	1 SIM\r\nLoại SIM	Nano Sim\r\nThực hiện cuộc gọi	FaceTime\r\nHỗ trợ 3G	Có 3G (tốc độ Download 42 Mbps; Upload 5.76 Mbps)\r\nHỗ trợ 4G	4G LTE\r\nWiFi	Wi-Fi 802.11 a/b/g/n/ac, Dual-band, Wi-Fi hotspot\r\nBluetooth	A2DP, 4.2\r\nGPS	GPS, GLONASS\r\nCổng kết nối/sạc	Lightning\r\nJack tai nghe	3.5 mm\r\nHỗ trợ OTG	Không\r\nKết nối khác	Không\r\n\r\nChức năng khác\r\nGhi âm	Không\r\nRadio	Không\r\nTính năng đặc biệt	4 stereo speakers, Mở khóa bằng vân tay\r\nThiết kế & Trọng lượng\r\nChất liệu	Nhôm nguyên khối\r\nKích thước	Dài 250.6 mm - Ngang 174.1 mm - Dày 6.1 mm\r\nTrọng lượng	477 g\r\nPin & Dung lượng\r\nLoại pin	Lithium - Polymer\r\nMức năng lượng tiêu thụ	30.4 Wh', '2017-12-03 22:10:23', 'Chưa Có Chỉnh Sửa', 22, 0, 11, 4, 3, 13, '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanphamcc`
--

CREATE TABLE `sanphamcc` (
  `id` int(11) NOT NULL,
  `sanpham_id` int(11) NOT NULL,
  `nhacc_id` int(11) NOT NULL,
  `gia` int(11) NOT NULL,
  `duongdan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `idnguoitao` int(11) NOT NULL,
  `idnguoisua` int(11) NOT NULL,
  `tgtao` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tgsua` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sanphamcc`
--

INSERT INTO `sanphamcc` (`id`, `sanpham_id`, `nhacc_id`, `gia`, `duongdan`, `idnguoitao`, `idnguoisua`, `tgtao`, `tgsua`) VALUES
(15, 60, 28, 18990000, 'https://www.thegioididong.com/dtdd/iphone-7-128gb', 22, 22, '2017-11-21 19:30:44', '2017-11-21 19:31:13'),
(16, 59, 28, 18990000, 'https://www.thegioididong.com/dtdd/iphone-7-128gb', 22, 22, '2017-11-21 19:31:04', '2017-12-01 21:56:03'),
(17, 59, 25, 17490000, 'https://www.nguyenkim.com/dien-thoai-iphone-7-rose-gold-128gb.html', 22, 0, '2017-11-21 19:33:08', 'Chưa có chỉnh sửa'),
(18, 59, 24, 15792000, 'http://www.lazada.vn/apple-iphone-7-128gb-hong-hang-nhap-khau-4853783.html?spm=a2o4n.prod.0.0.d467ea0fckH2', 22, 0, '2017-11-21 19:37:21', 'Chưa có chỉnh sửa'),
(19, 60, 30, 16090000, 'http://www.techone.vn/iphone-7-128gb-techone-5405.html', 22, 0, '2017-11-21 19:40:56', 'Chưa có chỉnh sửa'),
(20, 57, 24, 5971000, 'http://www.lazada.vn/samsung-galaxy-j7-pro-2017-32gb-ram-3gb-hang-chinh-hang-8344000.html?spm=a2o4n.category.products-list.16.6c6c70ccfG4ZYe&ff=1&time=1511268801&sc=EaYR', 22, 0, '2017-11-21 19:52:24', 'Chưa có chỉnh sửa'),
(21, 57, 28, 6990000, 'https://www.thegioididong.com/dtdd/samsung-galaxy-j7-pro', 22, 0, '2017-11-21 19:53:37', 'Chưa có chỉnh sửa'),
(22, 57, 25, 6990000, 'https://www.nguyenkim.com/samsung-galaxy-j7-pro.html', 22, 0, '2017-11-21 19:56:12', 'Chưa có chỉnh sửa'),
(23, 57, 30, 6990000, 'http://www.techone.vn/samsung-galaxy-j7-pro-cong-ty-5997.html', 22, 0, '2017-11-21 20:00:45', 'Chưa có chỉnh sửa'),
(24, 57, 31, 6050000, 'https://www.vatgia.com/kimthanhmobilevn&module=product&view=detail&record_id=6405206&checkclick=1907812573', 22, 0, '2017-11-21 20:04:15', 'Chưa có chỉnh sửa'),
(25, 65, 27, 101000, 'https://www.sendo.vn/san-pham/ao-thun-nam-w-2017-2704941/?source_block_id=best_sellers&source_page_id=', 22, 0, '2017-12-03 09:56:24', 'Chưa có chỉnh sửa'),
(26, 64, 27, 101000, 'https://www.sendo.vn/san-pham/ao-thun-nam-w-2017-2704941/?source_block_id=best_sellers&source_page_id=', 22, 22, '2017-12-03 10:00:34', '2017-12-03 10:04:00'),
(27, 64, 24, 92280, 'http://www.lazada.vn/ao-thun-polo-nam-w-it-for-do-5240245.html?spm=a2o4n.campaign.products-list.4.544dfacdcapVLB&ff=1&time=1512269659&sc=IWYP', 22, 0, '2017-12-03 10:01:14', 'Chưa có chỉnh sửa'),
(28, 65, 24, 92280, 'http://www.lazada.vn/ao-thun-polo-nam-w-it-for-xanh-da-5240225.html?spm=a2o4n.prod.0.0.2c6c9c975ZePwX&sc=IWYP', 22, 0, '2017-12-03 10:03:33', 'Chưa có chỉnh sửa'),
(29, 66, 32, 4140000, 'https://www.xwatch.vn/dong-ho-casio/ga-110hc-1adr-5336.html', 22, 0, '2017-12-03 10:12:57', 'Chưa có chỉnh sửa'),
(30, 66, 24, 4140000, 'https://www.lazada.vn/dong-ho-casio-g-shock-ga-110hc-1ahdr-1574498.html?gclid=EAIaIQobChMIz6eViPPs1wIVh4K9Ch1w1gInEAAYASAAEgKUWfD_BwE&s_kwcid=AL!3153!3!230268414217!b!!g!!&utm_source=google&utm_medium=sem_non_brand&utm_campaign=[SDS-000000000000-00000-000', 22, 0, '2017-12-03 10:26:47', 'Chưa có chỉnh sửa'),
(31, 67, 24, 6749000, 'https://www.lazada.vn/internet-tivi-led-sony-32inch-hd-model-kdl-32w600d-den-2041112.html?spm=a2o4n.category.grid_container_2425.18.6018bc5cKzQLnJ', 22, 0, '2017-12-03 10:56:44', 'Chưa có chỉnh sửa'),
(32, 67, 29, 7690000, 'https://www.dienmayxanh.com/tivi/sony-kdl-32w600d', 22, 0, '2017-12-03 10:57:28', 'Chưa có chỉnh sửa'),
(33, 69, 28, 1060000, 'https://www.thegioididong.com/dtdd/nokia-3310-2017', 22, 0, '2017-12-03 14:27:40', 'Chưa có chỉnh sửa'),
(34, 68, 28, 1060000, 'https://www.thegioididong.com/dtdd/nokia-3310-2017', 22, 0, '2017-12-03 14:28:10', 'Chưa có chỉnh sửa'),
(35, 69, 27, 1039000, 'https://www.sendo.vn/san-pham/nokia-3310-2017-do-7520991/?source_block_id=search_products&source_page_id=search_cate3_rank', 22, 0, '2017-12-03 14:30:00', 'Chưa có chỉnh sửa'),
(36, 68, 27, 1039000, 'https://www.sendo.vn/san-pham/nokia-3310-2017-vang-7521037/?source_block_id=search_products&source_page_id=search_cate3_rank', 22, 0, '2017-12-03 14:30:30', 'Chưa có chỉnh sửa'),
(37, 70, 32, 9120000, 'https://www.xwatch.vn/dong-ho-orient/set0t002s0-1960.html', 22, 0, '2017-12-03 21:46:44', 'Chưa có chỉnh sửa'),
(38, 71, 32, 8690000, 'https://www.xwatch.vn/dong-ho-orient/fet0p002w0-2214.html', 22, 0, '2017-12-03 21:58:22', 'Chưa có chỉnh sửa'),
(39, 72, 24, 14570000, 'http://www.lazada.vn/ipad-pro-105inch-2017-wifi-64gb-vang-hang-nhap-khau-7146924.html?spm=a2o4n.search.products-list.1.1ae14cedbs5Uzu&ff=1&time=1512313622', 22, 0, '2017-12-03 22:12:25', 'Chưa có chỉnh sửa'),
(40, 73, 24, 14802000, 'http://www.lazada.vn/ipad-pro-105inch-2017-wifi-64gb-xam-hang-nhap-khau-7147366.html?spm=a2o4n.search.products-list.3.1ae14cedZBJUMo&ff=1&time=1512314107', 22, 22, '2017-12-03 22:12:59', '2017-12-03 22:14:56'),
(41, 73, 28, 1999000, 'https://www.thegioididong.com/may-tinh-bang/ipad-pro-105-inch-wifi-cellular-64gb-2017', 22, 0, '2017-12-03 22:13:55', 'Chưa có chỉnh sửa'),
(42, 61, 24, 5150000, 'http://www.lazada.vn/samsung-galaxy-j7-prime-32gb-ram-3gb-trang-vang-hang-phan-phoichinhthuc-8231166.html?spm=a2o4n.prod.0.0.2afc763bwSFKAh&sc=IWsJ', 22, 0, '2017-12-03 22:21:19', 'Chưa có chỉnh sửa'),
(43, 61, 28, 5490000, 'https://www.thegioididong.com/dtdd/samsung-galaxy-j7-prime', 22, 22, '2017-12-03 22:22:40', '2017-12-03 22:23:05'),
(44, 58, 24, 5595000, 'http://www.lazada.vn/samsung-galaxy-j7-pro-2017-32gb-ram-3gb-vang-hang-phan-phoi-chinh-thuc-7569655.html?spm=a2o4n.search.products-list.1.2d055eMxmVLq&ff=1&time=1512314947', 22, 0, '2017-12-03 22:27:55', 'Chưa có chỉnh sửa'),
(45, 58, 28, 6990000, 'https://www.thegioididong.com/dtdd/samsung-galaxy-j7-pro', 22, 0, '2017-12-03 22:30:05', 'Chưa có chỉnh sửa');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tag`
--

CREATE TABLE `tag` (
  `id` int(11) NOT NULL,
  `ten` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tgtao` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `idnguoitao` int(11) NOT NULL,
  `tgsua` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `idnguoisua` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tag`
--

INSERT INTO `tag` (`id`, `ten`, `tgtao`, `idnguoitao`, `tgsua`, `idnguoisua`) VALUES
(1, 'Iphone 7 128GB ', '2017-11-09 09:09:11', 22, '2017-12-01 16:00:56', 18),
(2, 'Samsung Galaxy J7 Prime', '2017-11-09 09:10:39', 22, 'Chưa Có Chỉnh Sửa', 0),
(3, 'Samsung Galaxy J7 Pro', '2017-11-09 09:12:09', 22, 'Chưa Có Chỉnh Sửa', 0),
(4, 'Dell Inspiron 7568', '2017-11-09 23:03:49', 22, 'Chưa Có Chỉnh Sửa', 0),
(5, 'Dell Inspiron 7570', '2017-11-17 10:22:34', 22, '2017-11-21 20:29:24', 22),
(6, 'Áo Thun Polo Nam W It For ', '2017-12-02 19:11:59', 22, 'Chưa Có Chỉnh Sửa', 0),
(7, 'GA 100 ADR', '2017-12-02 20:34:35', 22, '2017-12-02 20:35:57', 22),
(8, 'GA 110 ADR', '2017-12-02 20:35:49', 22, 'Chưa Có Chỉnh Sửa', 0),
(9, 'Internet Tivi LED Sony 32inch HD - Model KDL-32W600D', '2017-12-03 10:52:37', 22, 'Chưa Có Chỉnh Sửa', 0),
(10, 'Nokia 3310 2017 ', '2017-12-03 14:22:52', 22, 'Chưa Có Chỉnh Sửa', 0),
(11, 'Đồng Hồ Orient Sun & Moon Gen II', '2017-12-03 14:35:32', 22, '2017-12-03 14:38:11', 22),
(12, 'Đồng Hồ Orient Sun & Moon Gen I', '2017-12-03 21:53:54', 22, 'Chưa Có Chỉnh Sửa', 0),
(13, 'iPad Pro 10.5inch 2017 Wifi 64Gb ', '2017-12-03 22:06:51', 22, 'Chưa Có Chỉnh Sửa', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ho` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ten` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sdt` double NOT NULL,
  `diachi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gioitinh` tinyint(1) NOT NULL,
  `hinhmacdinh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hinhuser` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hinhuser_dd` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `roles_id` int(11) NOT NULL,
  `tgtao` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `ho`, `ten`, `sdt`, `diachi`, `gioitinh`, `hinhmacdinh`, `hinhuser`, `hinhuser_dd`, `roles_id`, `tgtao`) VALUES
(22, 'v@gmail.com', '$2y$10$adsNxA3ckjte4xKgGjo3neSwLJ5Zb8XMRZeDpW2vbEFUpdacyl8JW', 'Đặng', 'Việt', 1296853676, '2/110 A Lê Lai, Ninh Kiều, TP. Cần Thơ', 0, '', '2017-11-21105119u3.jpg', 'webroot\\files\\Users\\hinhuser\\', 1, '2017-09-11 09:53:48'),
(25, 'do@gmail.com', '$2y$10$xkU/4V8X8DDMKpeUdIRcNOaih9OuZPsadqMU98Tqt36KWXNKG/M26', ' Nguyễn', 'Đô', 1234567890, '3/2220 A', 0, '', '2017-11-21105240u5.jpg', 'webroot\\files\\Users\\hinhuser\\', 2, '2017-10-28 19:13:47'),
(27, 'giang@gmail.com', '$2y$10$SpSyjOm.6GwDxElgctiXOOHIzqyqp2VYXH8UIW1Ue.IEPfWAz0fNO', 'Châu', 'Giang', 1234567890, 'iw000', 1, '', '2017-11-21105320u2.jpg', 'webroot\\files\\Users\\hinhuser\\', 2, '2017-11-04 13:11:43'),
(28, 'hong@gmail.com', '$2y$10$wby7U3eGo9QqMtmwRZkG/u/KDNg/udN7t34JvyFexitaKi2Qp4nGu', 'Nguyễn', 'Hồng', 1234567890, 'mmm/aac', 1, '', '2017-11-21105415u4.png', 'webroot\\files\\Users\\hinhuser\\', 2, '2017-11-04 13:14:02'),
(29, 'crishenry1995@gmail.com', '$2y$10$NwpYLnZ5zU/nmy0fndso1epyd7ILxOqKMKgVH/hM9p/vV0JWlfKNe', 'Nguyễn', 'Cris', 1296853676, '12/33/ab', 0, '\\user.png', '', 'webroot\\files\\Users\\hinhnd', 1, '2017-12-03 12:37:12');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_id` (`users_id`),
  ADD KEY `sanpham_id` (`sanpham_id`);

--
-- Chỉ mục cho bảng `danhgia`
--
ALTER TABLE `danhgia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `diemdg_id` (`diemdg_id`),
  ADD KEY `sanpham_id` (`sanpham_id`),
  ADD KEY `users_id` (`users_id`);

--
-- Chỉ mục cho bảng `diemdg`
--
ALTER TABLE `diemdg`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idnguoitao` (`idnguoitao`);

--
-- Chỉ mục cho bảng `dong`
--
ALTER TABLE `dong`
  ADD PRIMARY KEY (`id`),
  ADD KEY `loai_id` (`loai_id`),
  ADD KEY `idnguoitao` (`idnguoitao`);

--
-- Chỉ mục cho bảng `hangsx`
--
ALTER TABLE `hangsx`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idnguoitao` (`idnguoitao`);

--
-- Chỉ mục cho bảng `lienhe`
--
ALTER TABLE `lienhe`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_id` (`users_id`);

--
-- Chỉ mục cho bảng `loai`
--
ALTER TABLE `loai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nhom_id` (`nhom_id`),
  ADD KEY `idnguoitao` (`idnguoitao`);

--
-- Chỉ mục cho bảng `mau`
--
ALTER TABLE `mau`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nhacc`
--
ALTER TABLE `nhacc`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idnguoitao` (`idnguoitao`);

--
-- Chỉ mục cho bảng `nhom`
--
ALTER TABLE `nhom`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idnguoitao` (`idnguoitao`);

--
-- Chỉ mục cho bảng `phankhuc`
--
ALTER TABLE `phankhuc`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dong_id` (`dong_id`),
  ADD KEY `idnguoitao` (`idnguoitao`);

--
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hangsx_id` (`hangsx_id`),
  ADD KEY `phankhuc_id` (`phankhuc_id`),
  ADD KEY `sanpham_ibfk_2` (`mau_id`),
  ADD KEY `idnguoitao` (`idnguoitao`),
  ADD KEY `tag_id` (`tag_id`);

--
-- Chỉ mục cho bảng `sanphamcc`
--
ALTER TABLE `sanphamcc`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nhacc_id` (`nhacc_id`),
  ADD KEY `sanpham_id` (`sanpham_id`);

--
-- Chỉ mục cho bảng `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idnguoitao` (`idnguoitao`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `roles_id` (`roles_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT cho bảng `danhgia`
--
ALTER TABLE `danhgia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT cho bảng `diemdg`
--
ALTER TABLE `diemdg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT cho bảng `dong`
--
ALTER TABLE `dong`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT cho bảng `hangsx`
--
ALTER TABLE `hangsx`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT cho bảng `lienhe`
--
ALTER TABLE `lienhe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT cho bảng `loai`
--
ALTER TABLE `loai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT cho bảng `mau`
--
ALTER TABLE `mau`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT cho bảng `nhacc`
--
ALTER TABLE `nhacc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT cho bảng `nhom`
--
ALTER TABLE `nhom`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT cho bảng `phankhuc`
--
ALTER TABLE `phankhuc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT cho bảng `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;
--
-- AUTO_INCREMENT cho bảng `sanphamcc`
--
ALTER TABLE `sanphamcc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT cho bảng `tag`
--
ALTER TABLE `tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD CONSTRAINT `binhluan_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `binhluan_ibfk_2` FOREIGN KEY (`sanpham_id`) REFERENCES `sanpham` (`id`);

--
-- Các ràng buộc cho bảng `danhgia`
--
ALTER TABLE `danhgia`
  ADD CONSTRAINT `danhgia_ibfk_1` FOREIGN KEY (`diemdg_id`) REFERENCES `diemdg` (`id`),
  ADD CONSTRAINT `danhgia_ibfk_2` FOREIGN KEY (`sanpham_id`) REFERENCES `sanpham` (`id`),
  ADD CONSTRAINT `danhgia_ibfk_3` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `diemdg`
--
ALTER TABLE `diemdg`
  ADD CONSTRAINT `diemdg_ibfk_1` FOREIGN KEY (`idnguoitao`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `dong`
--
ALTER TABLE `dong`
  ADD CONSTRAINT `dong_ibfk_1` FOREIGN KEY (`loai_id`) REFERENCES `loai` (`id`),
  ADD CONSTRAINT `dong_ibfk_2` FOREIGN KEY (`idnguoitao`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `hangsx`
--
ALTER TABLE `hangsx`
  ADD CONSTRAINT `hangsx_ibfk_1` FOREIGN KEY (`idnguoitao`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `lienhe`
--
ALTER TABLE `lienhe`
  ADD CONSTRAINT `lienhe_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `loai`
--
ALTER TABLE `loai`
  ADD CONSTRAINT `loai_ibfk_1` FOREIGN KEY (`nhom_id`) REFERENCES `nhom` (`id`),
  ADD CONSTRAINT `loai_ibfk_2` FOREIGN KEY (`idnguoitao`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `nhacc`
--
ALTER TABLE `nhacc`
  ADD CONSTRAINT `nhacc_ibfk_1` FOREIGN KEY (`idnguoitao`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `nhom`
--
ALTER TABLE `nhom`
  ADD CONSTRAINT `nhom_ibfk_1` FOREIGN KEY (`idnguoitao`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `phankhuc`
--
ALTER TABLE `phankhuc`
  ADD CONSTRAINT `phankhuc_ibfk_1` FOREIGN KEY (`dong_id`) REFERENCES `dong` (`id`),
  ADD CONSTRAINT `phankhuc_ibfk_2` FOREIGN KEY (`idnguoitao`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`hangsx_id`) REFERENCES `hangsx` (`id`),
  ADD CONSTRAINT `sanpham_ibfk_2` FOREIGN KEY (`mau_id`) REFERENCES `mau` (`id`),
  ADD CONSTRAINT `sanpham_ibfk_3` FOREIGN KEY (`phankhuc_id`) REFERENCES `phankhuc` (`id`),
  ADD CONSTRAINT `sanpham_ibfk_4` FOREIGN KEY (`idnguoitao`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `sanpham_ibfk_5` FOREIGN KEY (`tag_id`) REFERENCES `tag` (`id`);

--
-- Các ràng buộc cho bảng `sanphamcc`
--
ALTER TABLE `sanphamcc`
  ADD CONSTRAINT `sanphamcc_ibfk_1` FOREIGN KEY (`nhacc_id`) REFERENCES `nhacc` (`id`),
  ADD CONSTRAINT `sanphamcc_ibfk_2` FOREIGN KEY (`sanpham_id`) REFERENCES `sanpham` (`id`);

--
-- Các ràng buộc cho bảng `tag`
--
ALTER TABLE `tag`
  ADD CONSTRAINT `tag_ibfk_1` FOREIGN KEY (`idnguoitao`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`roles_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
