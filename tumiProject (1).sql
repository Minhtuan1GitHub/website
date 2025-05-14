-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th5 14, 2025 lúc 07:38 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `tumiProject`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill`
--

CREATE TABLE `bill` (
  `id_bill` varchar(100) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tongtien` double DEFAULT NULL,
  `sdt` varchar(20) DEFAULT NULL,
  `dc` varchar(100) DEFAULT NULL,
  `thanhtoan` tinyint(1) DEFAULT 0,
  `ten` varchar(100) DEFAULT NULL,
  `soluong` int(11) DEFAULT NULL,
  `ngaytao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `voucher` int(11) DEFAULT NULL,
  `tienbandau` double DEFAULT NULL,
  `trangthaithanhtoan` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `bill`
--

INSERT INTO `bill` (`id_bill`, `id_user`, `tongtien`, `sdt`, `dc`, `thanhtoan`, `ten`, `soluong`, `ngaytao`, `voucher`, `tienbandau`, `trangthaithanhtoan`) VALUES
('5703551746862293', 57, 100, '0101', 'An GIang', 6, 'Tuan', NULL, '2025-05-10 13:17:18', 6, 100, 0),
('5718EB1747115767', 57, 111, '0101', 'An GIang', 0, 'Tuan', NULL, '2025-05-13 05:56:10', 6, 111, 0),
('572AB71747117034', 57, 72, '0101', 'An GIang', 0, 'Tuan', NULL, '2025-05-13 06:17:16', 4, 120, 0),
('5763F31746883013', 57, 60, '0101', 'An GIang', 0, 'Tumi', NULL, '2025-05-10 13:16:56', 6, 60, 0),
('5790EF1747112443', 57, 300, '0101', 'An GIang', 0, 'Tuan', NULL, '2025-05-13 05:01:22', 6, 300, 1),
('57CD791746862320', 57, 60, '0101', 'An GIang', 8, 'Tuan', NULL, '2025-05-10 08:02:21', 6, 60, 7),
('57DC801746863969', 57, 36, '0382494117', 'An GIang', 7, 'Tu', NULL, '2025-05-10 08:00:07', 4, 60, 0),
('57E1F51746861501', 57, 30, '0101', 'An GIang', 5, 'Tuan', NULL, '2025-05-10 07:38:02', 9, 60, 0),
('965A091747199907', 96, 100, '0382494117', 'An Giang', 0, 'Nguyễn Minh Tuấn', NULL, '2025-05-14 05:19:08', 6, 100, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill_details`
--

CREATE TABLE `bill_details` (
  `id` int(11) NOT NULL,
  `id_bill` varchar(100) NOT NULL,
  `id_item` int(11) DEFAULT NULL,
  `soluong` int(100) DEFAULT NULL,
  `tien` double DEFAULT NULL,
  `size` int(11) DEFAULT NULL,
  `color` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `bill_details`
--

INSERT INTO `bill_details` (`id`, `id_bill`, `id_item`, `soluong`, `tien`, `size`, `color`) VALUES
(369, '57E1F51746861501', 13, 1, 0, 8, 11),
(370, '5703551746862293', 1, 1, 0, 8, 11),
(371, '57CD791746862320', 13, 1, 0, 8, 11),
(372, '57DC801746863969', 13, 1, 0, 8, 11),
(373, '5763F31746883013', 13, 1, 0, 8, 11),
(374, '5790EF1747112443', 14, 1, 0, 8, 12),
(375, '5790EF1747112443', 121, 1, 0, 9, 11),
(376, '5790EF1747112443', 12, 1, 0, 8, 11),
(377, '5718EB1747115767', 16, 1, 0, 10, 12),
(378, '572AB71747117034', 106, 1, 0, 15, 12),
(379, '965A091747199907', 14, 1, 0, 8, 12);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binhluan`
--

CREATE TABLE `binhluan` (
  `id_binhluan` int(11) NOT NULL,
  `id_user` int(10) NOT NULL,
  `id` int(11) NOT NULL,
  `noidung` text NOT NULL,
  `size` varchar(10) NOT NULL,
  `color` varchar(10) NOT NULL,
  `sao` int(5) NOT NULL,
  `nickname` varchar(30) NOT NULL,
  `date` text NOT NULL,
  `view` tinyint(1) NOT NULL DEFAULT 1,
  `ten` varchar(100) NOT NULL,
  `age` int(11) NOT NULL,
  `diachi` varchar(100) NOT NULL,
  `huuich` int(100) DEFAULT NULL,
  `tocao` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `binhluan`
--

INSERT INTO `binhluan` (`id_binhluan`, `id_user`, `id`, `noidung`, `size`, `color`, `sao`, `nickname`, `date`, `view`, `ten`, `age`, `diachi`, `huuich`, `tocao`) VALUES
(108, 60, 11, 'Sản phẩm nhìn chất quá shop ơi', 'Big', 'Black', 4, 'Susu', 'Tuesday 15th of April 2025 03:09:35 PM', 1, 'Minh', 19, 'Vĩnh Lộc, Vĩnh Phước, An Phú, An Giang', 3, NULL),
(109, 57, 11, 'Cái cặp này nhìn xấu quá', 'Big', 'Black', 1, 'Mimi', 'Tuesday 15th of April 2025 03:10:54 PM', 1, 'Thu', 18, 'An GIang', 2, NULL),
(110, 57, 11, 'aha', 'bid', 'red', 4, 'Tumi', 'Tuesday 15th of April 2025 03:50:17 PM', 1, 'Thu', 18, 'An GIang', NULL, NULL),
(111, 57, 11, 'San pham nhu dau buoi', 'Big', 'White', 1, 'Mim', 'Tuesday 15th of April 2025 04:26:04 PM', 1, 'Thu', 18, 'An GIang', NULL, NULL),
(112, 57, 1, 'Sản phẩm tốt quá', 'XL', 'Red', 3, 'Tumi', 'Wednesday 16th of April 2025 11:51:54 PM', 1, 'Thu', 18, 'An GIang', NULL, NULL),
(113, 60, 12, 'a', 'a', 'a', 3, 'Mimi', 'Thursday 17th of April 2025 06:57:49 AM', 1, 'Minh', 19, 'Vĩnh Lộc, Vĩnh Phước, An Phú, An Giang', NULL, NULL),
(114, 60, 12, 'b', 'b', 'b', 2, 'M', 'Thursday 17th of April 2025 06:57:57 AM', 1, 'Minh', 19, 'Vĩnh Lộc, Vĩnh Phước, An Phú, An Giang', NULL, NULL),
(115, 60, 12, 'a', 'a', 'a', 1, 'a', 'Thursday 17th of April 2025 06:58:06 AM', 1, 'Minh', 19, 'Vĩnh Lộc, Vĩnh Phước, An Phú, An Giang', NULL, NULL),
(116, 60, 12, 'a', 'a', '8', 4, 'Mimi', 'Thursday 17th of April 2025 06:58:29 AM', 1, 'Minh', 19, 'Vĩnh Lộc, Vĩnh Phước, An Phú, An Giang', NULL, NULL),
(117, 60, 12, 'a', 'a', 'as', 3, 'a', 'Thursday 17th of April 2025 06:58:40 AM', 1, 'Minh', 19, 'Vĩnh Lộc, Vĩnh Phước, An Phú, An Giang', NULL, NULL),
(118, 60, 14, 'Áo này sáng quá shop ơi', 'Xl', 'White', 3, 'mimi', 'Thursday 17th of April 2025 08:25:04 AM', 1, 'Minh', 19, 'Vĩnh Lộc, Vĩnh Phước, An Phú, An Giang', NULL, NULL),
(119, 69, 12, 'Màu này nhìn tuyệt quá', 'Big', 'White', 5, 'Sumi', 'Thursday 17th of April 2025 08:46:58 AM', 1, 'Kartori', 0, 'Ho Chi Minh City', NULL, NULL),
(120, 60, 14, 'haha', 'ha', 'ah', 5, 'aa', 'Saturday 19th of April 2025 08:08:13 AM', 1, 'Minh', 19, 'Vĩnh Lộc, Vĩnh Phước, An Phú, An Giang', NULL, NULL),
(121, 60, 17, 'Túi này đẹp quá', 'XL', 'Ref', 2, 'Mimi', 'Saturday 19th of April 2025 11:58:10 PM', 1, 'Minh', 19, 'Vĩnh Lộc, Vĩnh Phước, An Phú, An Giang', NULL, NULL),
(122, 60, 1, 'â', 'â', 'â', 3, 'â', 'Tuesday 29th of April 2025 04:15:26 PM', 1, 'Minh', 19, 'Vĩnh Lộc, Vĩnh Phước, An Phú, An Giang', NULL, NULL),
(123, 57, 14, 'a\r\n', 'XL', 'Red', 3, 'SUsu', 'Saturday 3rd of May 2025 11:10:17 AM', 1, 'Tuan', 18, 'An GIang', NULL, NULL),
(124, 57, 121, 'msclcsc', 'aas', 'asas', 3, 'asa', 'Thursday 8th of May 2025 05:47:03 AM', 1, '', 18, 'An GIang', NULL, NULL),
(125, 57, 126, 'soijfjnasfnaowenf', 'aondkasnd', 'andkansd', 3, 'Sumi', 'Thursday 8th of May 2025 07:29:29 AM', 1, 'Tuan', 18, 'An GIang', NULL, NULL),
(126, 57, 121, 'đâsdasfs', 'sf', 'ấ', 3, 'ầ', 'Friday 9th of May 2025 08:18:52 PM', 1, '', 18, 'An GIang', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietbill`
--

CREATE TABLE `chitietbill` (
  `id` tinyint(1) NOT NULL,
  `trangthai` varchar(200) NOT NULL,
  `icon` varchar(100) NOT NULL,
  `background` varchar(10) NOT NULL,
  `color` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietbill`
--

INSERT INTO `chitietbill` (`id`, `trangthai`, `icon`, `background`, `color`) VALUES
(0, 'Người bán đang xử lí\r\n', '<i class=\"bi bi-bookmark-check\"></i>', '#fefbbe', '#bf8832'),
(1, 'Thanh toán không thành công', '<i class=\"bi bi-exclamation-triangle-fill\"></i>', '#fed8d5', '#ee545e\r\n'),
(2, 'Thanh toán thành công', '<i class=\"bi bi-check2-circle\"></i>', '#f0fff4', '#46a773'),
(3, 'Người bán đang chuẩn bị hàng', '<i class=\"bi bi-box2-heart-fill\"></i>', '#c97b84', '#f9e6e6'),
(4, 'Đơn hàng đã chuyển cho đơn vị vận chuyển', '<i class=\"bi bi-truck\"></i>', '#3b5998', '#e6f0ff'),
(5, 'Đơn hàng đang trên đường đến bạn', '<i class=\"bi bi-phone-vibrate\"></i>\r\n', '#6e4f35', '#f5e9e1'),
(6, 'Đã nhận hàng', '<i class=\"bi bi-emoji-laughing\"></i>', '#e67e22', '#fff4e6'),
(7, 'Hủy đơn hàng', '<i class = \"bi bi-x\"></i>', '#8b0000', '#fff0f0'),
(8, 'Hoàn tiền', 'a', 'black', 'white');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `color`
--

CREATE TABLE `color` (
  `id` int(11) NOT NULL,
  `color` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `color`
--

INSERT INTO `color` (`id`, `color`) VALUES
(11, 'Black'),
(12, 'White'),
(13, 'Red');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

CREATE TABLE `danhmuc` (
  `dm_id` int(4) NOT NULL,
  `name` varchar(100) NOT NULL,
  `stt` int(11) DEFAULT NULL,
  `img` varchar(50) NOT NULL,
  `id_phanloai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`dm_id`, `name`, `stt`, `img`, `id_phanloai`) VALUES
(1, 'Outerwear', 0, 'item.avif', 1),
(2, 'T-Shirt', 1, 'item5.avif', 1),
(3, 'Swearter', 3, 'item6.avif', 1),
(4, 'Bag', 4, 'item7.avif', 1),
(5, 'Pants', 5, 'item4.avif', 1),
(10, 'Skirts', 6, 'vay.avif', 0),
(11, 'Underwear', 7, 'bikini.avif', 0),
(12, 'T-Shirt', 8, 'women-shirt.avif', 0),
(13, 'Cardigan', 9, 'cardigan.avif', 0),
(14, 'Bag', 10, 'bag.avif', 0),
(15, 'Pant', NULL, 'pant.avif', 2),
(16, 'Wearter', NULL, 'wearter.avif', 2),
(17, 'Top', NULL, 'top.avif', 2),
(18, 'Outerwear', NULL, 'outerwear.avif', 2),
(19, 'Jacket', NULL, 'jacket.avif', 2),
(20, 'Newborn', NULL, 'newborn.avif', 3),
(21, 'Tooder', NULL, 'todder.avif', 3),
(22, 'Pants', NULL, 'bbpant.avif', 3),
(23, 'Sock', NULL, 'bbsock.avif', 3),
(24, 'Dress', NULL, 'bbdress.avif', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `image_item`
--

CREATE TABLE `image_item` (
  `id_anhLienQuan` int(100) NOT NULL,
  `hinh2` varchar(100) DEFAULT NULL,
  `hinh3` varchar(100) DEFAULT NULL,
  `hinh4` varchar(100) DEFAULT NULL,
  `id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `image_item`
--

INSERT INTO `image_item` (`id_anhLienQuan`, `hinh2`, `hinh3`, `hinh4`, `id`) VALUES
(1, 'item171.avif', 'item172.avif', 'item173.avif', 13),
(2, 'item61.avif', 'item62.avif', 'item63.avif', 6),
(3, 'item11.avif', 'item12.avif', 'item13.avif', 1),
(4, 'item21.avif', 'item22.avif', 'item23.avif', 2),
(5, 'item31.avif', 'item32.avif', 'item33.avif', 3),
(6, 'item41.avif', 'item42.avif', 'item43.avif', 4),
(7, 'item51.avif', 'item52.avif', 'item53.avif', 5),
(8, 'item71.avif', 'item72.avif', 'item73.avif', 7),
(9, 'item81.avif', 'item82.avif', 'item83.avif', 8),
(10, 'item91.avif', 'item92.avif', 'item93.avif', 9),
(11, 'item101.avif', 'item102.avif', 'item103.avif', 10),
(12, 'item111.avif', 'item112.avif', 'item113.avif', 11),
(13, 'item121.avif', 'item122.avif', 'item123.avif', 12),
(14, 'ts11.avif', '', '', 14),
(15, '', '', '', 15),
(17, NULL, NULL, NULL, 17),
(18, NULL, NULL, NULL, 18),
(56, NULL, NULL, NULL, 19),
(57, NULL, NULL, NULL, 20),
(58, NULL, NULL, NULL, 20),
(59, NULL, NULL, NULL, 21),
(60, NULL, NULL, NULL, 21),
(61, NULL, NULL, NULL, 22),
(62, NULL, NULL, NULL, 23),
(63, NULL, NULL, NULL, 24),
(64, NULL, NULL, NULL, 25),
(65, NULL, NULL, NULL, 26),
(66, NULL, NULL, NULL, 27),
(67, NULL, NULL, NULL, 28),
(68, NULL, NULL, NULL, 29),
(69, NULL, NULL, NULL, 30),
(70, NULL, NULL, NULL, 31),
(71, NULL, NULL, NULL, 32),
(72, NULL, NULL, NULL, 33),
(73, NULL, NULL, NULL, 34),
(74, NULL, NULL, NULL, 35),
(75, NULL, NULL, NULL, 36),
(76, NULL, NULL, NULL, 37),
(77, NULL, NULL, NULL, 38),
(78, NULL, NULL, NULL, 39),
(79, NULL, NULL, NULL, 40),
(80, NULL, NULL, NULL, 41),
(81, NULL, NULL, NULL, 42),
(82, NULL, NULL, NULL, 43),
(90, NULL, NULL, NULL, 44),
(91, NULL, NULL, NULL, 45),
(96, NULL, NULL, NULL, 44),
(97, NULL, NULL, NULL, 45),
(125, NULL, NULL, NULL, 51),
(126, NULL, NULL, NULL, 52),
(127, NULL, NULL, NULL, 53),
(128, NULL, NULL, NULL, 54),
(129, NULL, NULL, NULL, 55),
(130, NULL, NULL, NULL, 56),
(131, NULL, NULL, NULL, 57),
(132, NULL, NULL, NULL, 58),
(133, NULL, NULL, NULL, 59),
(134, NULL, NULL, NULL, 60),
(135, NULL, NULL, NULL, 66),
(136, NULL, NULL, NULL, 67),
(137, NULL, NULL, NULL, 68),
(138, NULL, NULL, NULL, 69),
(139, NULL, NULL, NULL, 70),
(140, NULL, NULL, NULL, 71),
(141, NULL, NULL, NULL, 72),
(142, NULL, NULL, NULL, 73),
(143, NULL, NULL, NULL, 74),
(144, NULL, NULL, NULL, 75),
(145, NULL, NULL, NULL, 105),
(146, NULL, NULL, NULL, 106),
(149, NULL, NULL, NULL, 121),
(154, NULL, NULL, NULL, 126),
(155, NULL, NULL, NULL, 16);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `item`
--

CREATE TABLE `item` (
  `id` int(11) NOT NULL,
  `img` varchar(100) DEFAULT NULL,
  `view` int(1) DEFAULT NULL,
  `dm_id` int(4) NOT NULL,
  `love` int(11) DEFAULT NULL,
  `new` tinyint(1) DEFAULT NULL,
  `sale` tinyint(4) DEFAULT NULL,
  `name_item` varchar(200) DEFAULT NULL,
  `id_phanloai` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `item`
--

INSERT INTO `item` (`id`, `img`, `view`, `dm_id`, `love`, `new`, `sale`, `name_item`, `id_phanloai`, `created_at`) VALUES
(1, 'item1.avif', 100, 1, 100, 1, 0, 'Outerwear', 1, '2025-05-12 12:07:40'),
(2, 'item2.avif', 99, 1, 101, 1, 0, '', 1, '2025-05-01 12:07:51'),
(3, 'item3.avif', 102, 1, 172, 0, 1, 'Outerwear', 1, '2025-05-13 12:12:49'),
(4, 'item4.avif', 1, 1, 143, 0, 1, '', 1, NULL),
(5, 'item5.avif', 1, 2, 88, 1, 0, '', 1, NULL),
(6, 'item6.avif', 66, 2, 162, 1, 0, '', 1, NULL),
(7, 'item7.avif', 1, 2, 136, 0, 1, '', 1, NULL),
(8, 'item8.avif', 1, 2, 121, 0, 1, '', 1, NULL),
(9, 'item9.avif', 1, 3, 182, 1, 0, 'cainay', 1, NULL),
(10, 'item10.avif', 1, 3, 261, 0, 1, '', 1, NULL),
(11, 'item13.avif', 10, 4, 261, 1, 0, 'Black bag\r\n', 1, NULL),
(12, 'item15.avif', 13, 4, 271, 0, 1, 'White bag ', 1, NULL),
(13, 'item17.avif', 123, 4, 121, 0, 0, 'blue bag', 1, NULL),
(14, 'ts1.avif', 123, 2, 123, 0, 0, 'White T-Shirt', 1, NULL),
(15, 'ts2.avif', NULL, 2, NULL, NULL, NULL, NULL, 1, NULL),
(16, 'vay1.avif', NULL, 10, NULL, NULL, NULL, 'www\r\n', 0, NULL),
(17, 'bag1.avif', 3, 14, NULL, NULL, NULL, NULL, 0, NULL),
(18, 'bag2.avif', 5, 14, NULL, NULL, NULL, 'bag2\r\n', 0, NULL),
(19, 'bag3.avif', 1, 14, NULL, NULL, NULL, NULL, 0, NULL),
(20, 'bag4.avif', 6, 14, NULL, NULL, NULL, NULL, 0, NULL),
(21, 'bag5.avif', 12, 14, NULL, NULL, NULL, NULL, 0, NULL),
(22, 'vay2.avif', NULL, 10, NULL, NULL, NULL, NULL, 0, NULL),
(23, 'vay3.avif', NULL, 10, NULL, NULL, NULL, NULL, 0, NULL),
(24, 'vay4.avif', NULL, 10, NULL, NULL, NULL, NULL, 0, NULL),
(25, 'vay5.avif', NULL, 10, NULL, NULL, NULL, NULL, 0, NULL),
(26, 'udw1.avif', NULL, 11, NULL, NULL, NULL, NULL, 0, NULL),
(27, 'udw2.avif', NULL, 11, NULL, NULL, NULL, 'udw2', 0, NULL),
(28, 'udw3.avif', NULL, 11, NULL, NULL, NULL, NULL, 0, NULL),
(29, 'udw4.avif', NULL, 11, NULL, NULL, NULL, NULL, 0, NULL),
(30, 'udw5.avif', NULL, 11, NULL, NULL, NULL, NULL, 0, NULL),
(31, 't1.avif', NULL, 12, NULL, NULL, NULL, NULL, 0, NULL),
(32, 't2.avif', NULL, 12, NULL, NULL, NULL, 't2', 0, NULL),
(33, 't3.avif', NULL, 12, NULL, NULL, NULL, NULL, 0, NULL),
(34, 't4.avif', NULL, 12, NULL, NULL, NULL, NULL, 0, NULL),
(35, 't5.avif', NULL, 12, NULL, NULL, NULL, NULL, 0, NULL),
(36, 'cdg1.avif', NULL, 13, NULL, NULL, NULL, NULL, 0, NULL),
(37, 'cdg2.avif', NULL, 13, NULL, NULL, NULL, NULL, 0, NULL),
(38, 'cdg3.avif', NULL, 13, NULL, NULL, NULL, 'cdg3', 0, NULL),
(39, 'cdg4.avif', NULL, 13, NULL, NULL, NULL, NULL, 0, NULL),
(40, 'cdg5.avif', NULL, 13, NULL, NULL, NULL, NULL, 0, NULL),
(41, 'p1.avif', NULL, 15, NULL, NULL, NULL, NULL, 2, NULL),
(42, 'p2.avif', NULL, 15, NULL, NULL, NULL, 'p2\r\n', 2, NULL),
(43, 'p3.avif', NULL, 15, NULL, NULL, NULL, NULL, 2, NULL),
(44, 'p4.avif', NULL, 15, NULL, NULL, NULL, NULL, 2, NULL),
(45, 'p5.avif', NULL, 15, NULL, NULL, NULL, NULL, 2, NULL),
(51, 'wt1.avif', NULL, 16, NULL, NULL, NULL, 'wt1', 2, NULL),
(52, 'wt2.avif', NULL, 16, NULL, NULL, NULL, NULL, 2, NULL),
(53, 'wt3.avif', NULL, 16, NULL, NULL, NULL, NULL, 2, NULL),
(54, 'wt4.avif', NULL, 16, NULL, NULL, NULL, NULL, 2, NULL),
(55, 'wt5.avif', NULL, 16, NULL, NULL, NULL, NULL, 2, NULL),
(56, 'top1.avif', NULL, 17, NULL, NULL, NULL, NULL, 2, NULL),
(57, 'top2.avif', NULL, 17, NULL, NULL, NULL, 'top2', 2, NULL),
(58, 'top3.avif', NULL, 17, NULL, NULL, NULL, NULL, 2, NULL),
(59, 'top4.avif', NULL, 17, NULL, NULL, NULL, NULL, 2, NULL),
(60, 'top5.avif', NULL, 17, NULL, NULL, NULL, NULL, 2, NULL),
(66, 'otw1.avif', NULL, 18, NULL, NULL, NULL, NULL, 2, NULL),
(67, 'otw2.avif', NULL, 18, NULL, NULL, NULL, NULL, 2, NULL),
(68, 'otw3.avif', NULL, 18, NULL, NULL, NULL, 'otw3', 2, NULL),
(69, 'otw4.avif', NULL, 18, NULL, NULL, NULL, NULL, 2, NULL),
(70, 'otw5.avif', NULL, 18, NULL, NULL, NULL, NULL, 2, NULL),
(71, 'jk1.avif', NULL, 19, NULL, NULL, NULL, 'jk1', 2, NULL),
(72, 'jk2.avif', NULL, 19, NULL, NULL, NULL, NULL, 2, NULL),
(73, 'jk3.avif', NULL, 19, NULL, NULL, NULL, NULL, 2, NULL),
(74, 'jk4.avif', NULL, 19, NULL, NULL, NULL, NULL, 2, NULL),
(75, 'jk5.avif', NULL, 19, NULL, NULL, NULL, NULL, 2, NULL),
(105, 'sock.avif', NULL, 23, NULL, NULL, NULL, 'Baby sock', 3, NULL),
(106, 'babyouterwear.avif', NULL, 20, NULL, NULL, NULL, 'Baby outerwear', 3, NULL),
(107, 'babyouterwear1.avif', NULL, 20, NULL, NULL, NULL, 'Baby outerwear yellow', 3, NULL),
(109, 'babytop.avif', NULL, 20, NULL, NULL, NULL, 'Baby top', 3, '2025-05-07 16:27:55'),
(121, 'menpaints.avif', NULL, 5, NULL, NULL, NULL, 'Pants', 1, '2025-05-07 17:17:13'),
(126, 'baby_tee.avif', NULL, 20, NULL, NULL, NULL, '<p><strong>Baby tee</strong></p>\r\n', 3, '2025-05-08 07:28:28'),
(127, 'top3.avif', NULL, 17, NULL, NULL, NULL, 'top3', 2, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `img` varchar(100) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `view` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `news`
--

INSERT INTO `news` (`id`, `img`, `content`, `date`, `view`) VALUES
(1, 'news1.png\r\n', 'Giới thiệu sản phẩm mới: áo khoác chống nắng', '2025-05-13 13:41:39', 111),
(2, 'news1.png', 'Đợt giảm giá đặc biệt cho khách hàng thân thiết', '2025-05-13 13:41:39', 13),
(3, 'news1.png', 'Sản phẩm mới vừa về kho, số lượng có hạn!', '2025-05-13 13:41:39', 2),
(4, 'news1.png', 'Hình ảnh sản phẩm được khách hàng đánh giá 5 sao', '2025-05-13 13:41:39', 45),
(5, 'news1.png', 'Ưu đãi combo mua 1 tặng 1 cực hot hôm nay', '2025-05-13 13:41:39', 78),
(6, 'news1.png', 'Sản phẩm được sản xuất theo công nghệ Nhật Bản', '2025-05-13 13:41:39', 29),
(7, 'news1.png', 'Đặt trước sản phẩm mới nhất để nhận ưu đãi', '2025-05-13 13:41:39', 91),
(8, 'news1.png', 'Hình ảnh chi tiết của sản phẩm đang bán chạy', '2025-05-13 13:41:39', 17),
(9, 'news1.png', 'Thông tin chi tiết về chất liệu và kích thước sản phẩm', '2025-05-13 13:41:39', 36),
(10, 'news1.png', 'Hàng mới về, số lượng giới hạn – đặt ngay!', '2025-05-13 13:41:39', 55);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phanloai`
--

CREATE TABLE `phanloai` (
  `id_phanloai` int(11) NOT NULL,
  `name_phanloai` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `phanloai`
--

INSERT INTO `phanloai` (`id_phanloai`, `name_phanloai`) VALUES
(0, 'women'),
(1, 'men'),
(2, 'kid'),
(3, 'baby');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `id_item` int(11) NOT NULL,
  `id_size` int(11) NOT NULL,
  `id_color` int(11) NOT NULL,
  `price` double(10,2) DEFAULT NULL,
  `stock` int(100) DEFAULT NULL,
  `limit_date_sale` date DEFAULT NULL,
  `price_sale` double(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `id_item`, `id_size`, `id_color`, `price`, `stock`, `limit_date_sale`, `price_sale`) VALUES
(33, 75, 8, 11, 56.00, 3, '2025-04-23', 0.00),
(34, 20, 9, 12, 122.00, 3, '2025-04-23', 0.00),
(41, 56, 11, 11, 100.00, 3, '2025-04-24', 0.00),
(45, 12, 8, 11, 100.00, 1000, '2025-04-24', 0.00),
(46, 14, 8, 12, 100.00, 999999, '2025-04-30', 0.00),
(53, 1, 8, 11, 100.00, 2, '2025-05-04', 0.00),
(55, 13, 8, 11, 100.00, 10, '2025-05-31', 60.00),
(56, 105, 15, 11, 50.00, 100, '2025-05-08', 25.00),
(57, 106, 15, 12, 120.00, 10, '2025-05-07', 0.00),
(58, 121, 9, 11, 100.00, 10, '2025-05-07', 0.00),
(59, 126, 15, 12, 100.00, 10, '2025-05-09', 50.00),
(60, 3, 8, 12, 100.00, 100, '2025-05-13', 0.00),
(61, 9, 8, 12, 100.00, 1, '2025-05-13', 0.00),
(62, 16, 10, 12, 111.00, 1, '2025-05-13', 0.00),
(63, 18, 15, 11, 100.00, 1, '2025-05-13', 0.00),
(64, 27, 10, 11, 120.00, 10, '2025-05-13', 0.00),
(65, 38, 9, 12, 100.00, 10, '2025-05-13', 0.00),
(66, 32, 10, 11, 100.00, 20, '2025-05-13', 0.00),
(67, 42, 9, 12, 100.00, 10, '2025-05-13', 0.00),
(68, 51, 9, 11, 100.00, 10, '2025-05-13', 0.00),
(69, 71, 8, 12, 120.00, 10, '2025-05-13', 0.00),
(70, 57, 8, 11, 170.00, 10, '2025-05-13', 0.00),
(71, 68, 9, 11, 300.00, 10, '2025-05-13', 0.00);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `id` int(4) NOT NULL,
  `name` varchar(100) NOT NULL,
  `img` varchar(200) NOT NULL,
  `view` tinyint(1) NOT NULL,
  `logo` varchar(100) NOT NULL,
  `brand` text NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`id`, `name`, `img`, `view`, `logo`, `brand`, `description`) VALUES
(1, 'abc', 'bg.jpg', 1, 'cute.jpg', 'Uniqlo', 'asnfjnsfknkdnvksnkvcnksnkcsnckcskmk'),
(2, 'xyz', 'bg1.jpg', 1, 'cute.jpg', 'Uniqlo', 'asnfjnsfknkdnvksnkvcnksnkcsnckcskmk'),
(3, 'mnp', 'bg2.jpg', 1, 'cute.jpg', 'Uniqlo', 'asnfjnsfknkdnvksnkvcnksnkcsnckcskmk'),
(4, 'hik', 'bg3.jpg', 1, 'cute.jpg', 'Uniqlo', 'asnfjnsfknkdnvksnkvcnksnkcsnckcskmk'),
(5, 'ert', 'bg4.jpg', 1, '', '', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `size`
--

CREATE TABLE `size` (
  `id` int(11) NOT NULL,
  `size` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `size`
--

INSERT INTO `size` (`id`, `size`) VALUES
(8, 'M'),
(9, 'L'),
(10, 'XL'),
(11, '2XL'),
(12, '3XL'),
(13, '5XL'),
(14, 'Big'),
(15, 'Small');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `style`
--

CREATE TABLE `style` (
  `id_style` int(100) NOT NULL,
  `img_style_1` varchar(100) DEFAULT NULL,
  `avt` varchar(100) DEFAULT NULL,
  `name_style_1` varchar(100) DEFAULT NULL,
  `id` int(100) NOT NULL,
  `size_style_1` char(4) DEFAULT NULL,
  `name_style_2` varchar(100) DEFAULT NULL,
  `name_style_3` varchar(100) DEFAULT NULL,
  `size_style_2` varchar(4) DEFAULT NULL,
  `size_style_3` varchar(4) DEFAULT NULL,
  `img_style_2` varchar(100) DEFAULT NULL,
  `img_style_3` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `style`
--

INSERT INTO `style` (`id_style`, `img_style_1`, `avt`, `name_style_1`, `id`, `size_style_1`, `name_style_2`, `name_style_3`, `size_style_2`, `size_style_3`, `img_style_2`, `img_style_3`) VALUES
(1, 'item51.png', '', 'Tuan', 5, 'L', 'Tam', '', 'M', '', 'item51.png', 'item51.png\r\n'),
(2, '', '', '', 5, 'L', '', '', '', '', '', ''),
(3, '', '', '', 1, '', '', '', '', '', '', ''),
(4, '', '', '', 2, '', '', '', '', '', '', ''),
(5, '', '', '', 3, '', '', '', '', '', '', ''),
(6, '', '', '', 4, '', '', '', '', '', '', ''),
(7, '', '', '', 6, '', '', '', '', '', '', ''),
(8, '', '', '', 7, '', '', '', '', '', '', ''),
(9, '', '', '', 8, '', '', '', '', '', '', ''),
(10, '', '', '', 9, '', '', '', '', '', '', ''),
(11, '', '', '', 10, '', '', '', '', '', '', ''),
(12, '', '', '', 11, '', '', '', '', '', '', ''),
(13, '', '', '', 12, '', '', '', '', '', '', ''),
(14, '', '', '', 13, '', '', '', '', '', '', ''),
(15, '', '', '', 14, '', '', '', '', '', '', ''),
(16, '', '', '', 15, '', '', '', '', '', '', ''),
(17, '', '', '', 17, '', '', '', '', '', '', ''),
(18, '', '', '', 18, '', '', '', '', '', '', ''),
(19, '', '', '', 19, '', '', '', '', '', '', ''),
(20, '', '', '', 20, '', '', '', '', '', '', ''),
(21, NULL, NULL, NULL, 20, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(22, NULL, NULL, NULL, 21, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(23, NULL, NULL, NULL, 21, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(24, NULL, NULL, NULL, 22, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(25, NULL, NULL, NULL, 23, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26, NULL, NULL, NULL, 24, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27, NULL, NULL, NULL, 25, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(28, NULL, NULL, NULL, 26, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(29, NULL, NULL, NULL, 27, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(30, NULL, NULL, NULL, 28, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(31, NULL, NULL, NULL, 29, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(32, NULL, NULL, NULL, 30, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(33, NULL, NULL, NULL, 31, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(34, NULL, NULL, NULL, 32, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(35, NULL, NULL, NULL, 33, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(36, NULL, NULL, NULL, 34, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(37, NULL, NULL, NULL, 35, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(38, NULL, NULL, NULL, 36, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(39, NULL, NULL, NULL, 37, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(40, NULL, NULL, NULL, 38, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(41, NULL, NULL, NULL, 39, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(42, NULL, NULL, NULL, 40, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(78, NULL, NULL, NULL, 41, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(121, NULL, NULL, NULL, 42, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(122, NULL, NULL, NULL, 43, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(126, NULL, NULL, NULL, 44, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(127, NULL, NULL, NULL, 45, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(128, NULL, NULL, NULL, 51, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(129, NULL, NULL, NULL, 52, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(130, NULL, NULL, NULL, 53, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(131, NULL, NULL, NULL, 54, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(132, NULL, NULL, NULL, 55, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(133, NULL, NULL, NULL, 56, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(134, NULL, NULL, NULL, 57, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(135, NULL, NULL, NULL, 58, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(136, NULL, NULL, NULL, 59, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(137, NULL, NULL, NULL, 60, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(138, NULL, NULL, NULL, 66, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(139, NULL, NULL, NULL, 67, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(140, NULL, NULL, NULL, 68, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(141, NULL, NULL, NULL, 69, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(142, NULL, NULL, NULL, 70, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(143, NULL, NULL, NULL, 71, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(144, NULL, NULL, NULL, 72, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(145, NULL, NULL, NULL, 73, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(146, NULL, NULL, NULL, 74, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(147, NULL, NULL, NULL, 75, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(148, NULL, NULL, NULL, 105, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(149, NULL, NULL, NULL, 106, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(157, NULL, NULL, NULL, 121, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(162, NULL, NULL, NULL, 126, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(163, NULL, NULL, NULL, 16, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `id` tinyint(1) NOT NULL,
  `trangthai` varchar(30) DEFAULT NULL,
  `background` varchar(20) DEFAULT NULL,
  `color` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`id`, `trangthai`, `background`, `color`) VALUES
(1, 'Mở', '#46a773	 ', '#f0fff4'),
(2, 'Khóa', '#8b0000', '#fff0f0');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thanhtoan`
--

CREATE TABLE `thanhtoan` (
  `id` tinyint(1) NOT NULL,
  `name` varchar(30) NOT NULL,
  `mau` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `thanhtoan`
--

INSERT INTO `thanhtoan` (`id`, `name`, `mau`) VALUES
(0, 'Thanh toán khi nhận hàng', 'rgba(76, 175, 80, 0.8)'),
(1, 'Đã thanh toán', 'rgba(33, 150, 243, 0.8)'),
(2, 'Đã hủy', 'rgba(158, 158, 158, 0.8)'),
(4, 'Thanh toán không thành công', 'rgba(244, 67, 54, 0.8)'),
(5, 'Chờ', 'red'),
(6, 'Chấp nhận', 'red'),
(7, 'Từ chối', 'red');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tinnhan`
--

CREATE TABLE `tinnhan` (
  `id` int(11) NOT NULL,
  `id_user` int(10) NOT NULL,
  `content` text NOT NULL,
  `created_at` datetime NOT NULL,
  `trangthai` tinyint(1) DEFAULT 0,
  `admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tinnhan`
--

INSERT INTO `tinnhan` (`id`, `id_user`, `content`, `created_at`, `trangthai`, `admin`) VALUES
(32, 57, 'Dung khoa acc em nua ma\r\n', '2025-05-06 14:14:51', 1, 0),
(33, 57, 'may co mo acc cho tao khong con cho \r\n', '2025-05-06 14:33:16', 1, 0),
(34, 57, 'hhiahahasas', '2025-05-06 14:33:25', 1, 0),
(35, 60, 'shop ncc\r\n', '2025-05-06 14:44:35', 1, 83),
(36, 60, 'em yeu shop', '2025-05-06 14:44:44', 1, 83),
(37, 57, 'Mo khoa dum e shop oi', '2025-05-06 15:57:39', 1, 0),
(38, 57, 'Shop nay gia ao qua', '2025-05-06 20:18:38', 1, 0),
(39, 57, 'shop nhu cai dau buoi \r\n', '2025-05-07 18:38:00', 1, 0),
(40, 57, 'Shop nhu cac\r\n', '2025-05-07 18:41:34', 1, 83),
(41, 57, 'm la thg dau buoi ', '2025-05-07 14:08:22', 1, 83),
(42, 83, 'shop thuong e', '2025-05-07 14:09:07', 1, 60),
(43, 60, 'shop nhu dau buoi', '2025-05-07 19:16:10', 1, 83),
(44, 60, 'cam on em', '2025-05-07 14:45:22', 1, 60),
(45, 60, 'as', '2025-05-07 14:46:00', 1, 57),
(46, 60, 'asda', '2025-05-07 14:46:07', 1, 57),
(47, 60, 'shop thuong e', '2025-05-07 14:53:16', 1, 60),
(48, 83, 'shop thuong e', '2025-05-07 14:54:30', 1, 57),
(49, 83, 'shop yeu em', '2025-05-07 19:56:33', 1, 60),
(50, 60, 'shop oi khoa e em di\r\n', '2025-05-07 19:57:43', 1, 83),
(51, 60, 'mo khoa mac cho em voi\r\n', '2025-05-07 21:30:18', 1, 83),
(52, 83, 'shop yeu em', '2025-05-07 21:31:57', 1, 60),
(53, 60, 'sadsadasfsd', '2025-05-07 22:01:16', 1, 83),
(54, 60, 'aas', '2025-05-07 22:01:21', 1, 83),
(55, 60, 'wfwefrev', '2025-05-07 22:01:25', 1, 83),
(56, 60, 'shop dung dong cua nhe', '2025-05-07 22:01:44', 1, 83),
(57, 83, 'ok be', '2025-05-07 22:02:11', 1, 60),
(58, 60, 'ok anh', '2025-05-07 22:13:38', 1, 83),
(59, 60, '', '2025-05-07 22:40:52', 1, 83),
(60, 60, 'hello', '2025-05-07 22:58:36', 1, 83),
(61, 60, '', '2025-05-07 22:58:43', 1, 83),
(62, 60, '', '2025-05-07 23:01:35', 1, 83),
(63, 60, '', '2025-05-07 23:01:55', 1, 83),
(64, 60, 'as', '2025-05-07 23:02:32', 1, 83),
(65, 60, 'ok bes ', '2025-05-07 23:54:46', 1, 60),
(66, 60, 'ok be', '2025-05-07 23:55:08', 1, 60),
(67, 60, 'safdsf', '2025-05-07 23:55:20', 1, 57),
(68, 83, 'ok be iu ', '2025-05-07 23:56:23', 1, 60),
(69, 83, 'ok be iuuuu ', '2025-05-08 00:01:12', 1, 83),
(70, 83, 'ok ', '2025-05-08 00:02:19', 1, 83),
(71, 83, 'podnisadncsa', '2025-05-08 00:02:54', 1, 83),
(72, 83, 'ok e', '2025-05-08 00:05:37', 1, 57),
(73, 83, 'm la thg dau buoi ', '2025-05-08 00:05:52', 1, 83),
(74, 83, 'ok', '2025-05-08 00:06:23', 1, 83),
(75, 83, 'oke', '2025-05-08 00:10:58', 1, 57),
(76, 83, 'asdasfdas', '2025-05-08 00:11:08', 1, 57),
(77, 83, 'ok be', '2025-05-08 00:19:34', 1, 60),
(78, 83, 'dasdsaD', '2025-05-08 00:19:54', 1, 60),
(79, 83, 'wqdqw', '2025-05-08 00:23:32', 1, 60),
(80, 83, 'ádasdsadasda', '2025-05-08 00:34:30', 1, 60),
(81, 83, 'con cho ', '2025-05-08 00:34:43', 1, 57),
(82, 83, 'Cảm ơn em', '2025-05-08 00:35:27', 1, 60),
(83, 57, 'as', '2025-05-08 00:37:19', 1, 57),
(84, 83, 'ok ', '2025-05-08 00:54:13', 1, 57),
(85, 57, 'ok ', '2025-05-08 01:06:12', 1, 83),
(86, 83, 'ok em ', '2025-05-08 01:07:54', 1, 57),
(87, 57, 'ok baby', '2025-05-08 01:09:07', 1, 83),
(88, 83, 'gui em ', '2025-05-08 01:10:40', 1, 57),
(89, 57, 'fsafdsa', '2025-05-08 04:30:23', 1, 83),
(90, 57, 'mo khoa tai khoan giup toi voi ', '2025-05-08 05:51:29', 1, 83),
(91, 57, 'mo khoa tai khoan dum em voi anh oi', '2025-05-08 06:57:05', 1, 83),
(92, 83, 'ok em', '2025-05-08 06:57:37', 1, 57),
(93, 57, 'mo khoa tai khoan giup e voi ', '2025-05-08 07:14:25', 1, 83),
(94, 57, 'nmt', '2025-05-08 07:35:25', 1, 83),
(95, 83, 'ok em', '2025-05-08 15:15:49', 1, 57),
(96, 57, 'sao don hang cua minh khong duoc hoan tien vay?\r\n', '2025-05-10 15:02:53', 1, 83),
(97, 57, 'ai biet ??? ', '2025-05-10 15:07:10', 1, 57),
(98, 57, 'asnjinadnkjxanksnakndkasdnlaJXNBASjcnjls cjx sjnxckjsnjcnskjxnksanxkasnxknsakxnkasnxkasm xkmsanxksankxmakslnmxkasnmxknaskxnaskmxnm,asmnxlksamxkasmlxkmaskxmksaklxklmasmklxas', '2025-05-13 12:58:59', 0, 83);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `trangthaitinnhan`
--

CREATE TABLE `trangthaitinnhan` (
  `id` tinyint(1) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `trangthaitinnhan`
--

INSERT INTO `trangthaitinnhan` (`id`, `name`) VALUES
(0, 'Chưa xem'),
(1, 'Đã xem');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id_user` int(10) NOT NULL,
  `password` varchar(50) DEFAULT '123',
  `ten` varchar(50) DEFAULT NULL,
  `diachi` varchar(100) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `dienthoai` varchar(20) DEFAULT NULL,
  `role` tinyint(1) DEFAULT 0,
  `sinhnhat` date DEFAULT current_timestamp(),
  `gioitinh` varchar(3) DEFAULT 'Nam',
  `age` int(11) DEFAULT NULL,
  `ngaydangki` datetime DEFAULT NULL,
  `trangthai` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id_user`, `password`, `ten`, `diachi`, `email`, `dienthoai`, `role`, `sinhnhat`, `gioitinh`, `age`, `ngaydangki`, `trangthai`) VALUES
(57, 'Minhtuan2@', 'Tua', 'An GIang', 'minhtuank27tdtu@gmail.com', '0101', 0, '2006-12-06', 'Nam', 18, '2025-03-31 08:33:55', 1),
(60, 'Minhtuan2@', 'Minh Tuan', 'Vĩnh Lộc, Vĩnh Phước, An Phú, An Giang', 'khainbk2005@gmail.com', '+84 382494117', 0, '2005-12-06', 'Nam', 19, '2024-12-31 08:34:22', 1),
(69, '88745d92', 'Kartori', 'Ho Chi Minh City', 'kartori2765@gmail.com', '+84 382 494 117', 0, '2025-04-14', 'Nam', 0, '2025-04-23 08:34:56', 1),
(83, 'admin', 'admin', 'admin', 'admin@gmail.com', 'admin', 1, '2025-05-06', 'Nam', NULL, NULL, 1),
(84, 'admin', 'admin', 'admin', 'admin', 'admin', 1, '2025-05-06', 'Nam', NULL, NULL, 1),
(94, '123', 'nguyen tuan', NULL, 'nguyenminhtuanokok612@gmail.com', NULL, 0, '2025-05-14', 'Nam', NULL, '2025-05-14 12:08:25', 1),
(96, '123', 'Nguyễn Minh Tuấn', NULL, '52300079@student.tdtu.edu.vn', NULL, 0, '2025-05-14', 'Nam', NULL, '2025-05-14 12:16:55', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `voucher`
--

CREATE TABLE `voucher` (
  `id_voucher` int(11) NOT NULL,
  `voucher_img` varchar(100) DEFAULT NULL,
  `voucher_name` text DEFAULT NULL,
  `voucher_giam` int(3) DEFAULT NULL,
  `voucher_code` varchar(100) DEFAULT NULL,
  `startDay` datetime NOT NULL DEFAULT current_timestamp(),
  `endDate` datetime NOT NULL DEFAULT current_timestamp(),
  `quality` int(100) NOT NULL DEFAULT 100,
  `status` tinyint(1) DEFAULT 0,
  `voucher_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `voucher`
--

INSERT INTO `voucher` (`id_voucher`, `voucher_img`, `voucher_name`, `voucher_giam`, `voucher_code`, `startDay`, `endDate`, `quality`, `status`, `voucher_date`) VALUES
(1, 'voucher1.png', 'Haha', 10, 'welcome', '2025-04-26 13:56:43', '2025-04-26 13:56:43', 100, 0, NULL),
(3, 'voucher1.png', 'Welcome haha', 30, 'welcomewelcome', '2025-04-26 13:56:43', '2025-04-26 13:56:43', 100, 0, NULL),
(4, 'voucher2.jpg', 'Welcome', 40, 'chucbanvuive', '2025-04-26 13:56:43', '2025-05-26 13:56:43', 100, 0, NULL),
(5, 'voucher2.jpg', 'Welcome', 10, 'chucbanvuive', '2025-04-26 13:56:43', '2025-04-26 13:56:43', 100, 0, NULL),
(6, NULL, NULL, NULL, NULL, '2025-05-10 14:31:31', '2025-05-10 14:31:31', 100, 0, NULL),
(9, 'voucher1.png', 'Ok', 50, 'ok50', '2025-05-10 14:09:10', '2025-05-31 14:09:00', 100, 0, NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id_bill`),
  ADD KEY `fk_bill` (`id_user`),
  ADD KEY `idx_thanhtoan` (`thanhtoan`),
  ADD KEY `fk_bill_voucher` (`voucher`),
  ADD KEY `fk_thanhtoan_trangthai` (`trangthaithanhtoan`);

--
-- Chỉ mục cho bảng `bill_details`
--
ALTER TABLE `bill_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_bill_item` (`id_item`),
  ADD KEY `fk_billdetails_size` (`size`),
  ADD KEY `fk_billdetails_color` (`color`),
  ADD KEY `fk_bill_details` (`id_bill`);

--
-- Chỉ mục cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`id_binhluan`),
  ADD KEY `fk_binhluan_user` (`id_user`),
  ADD KEY `fk_binhluan_item` (`id`);

--
-- Chỉ mục cho bảng `chitietbill`
--
ALTER TABLE `chitietbill`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`dm_id`),
  ADD KEY `fk_danhmuc` (`id_phanloai`);

--
-- Chỉ mục cho bảng `image_item`
--
ALTER TABLE `image_item`
  ADD PRIMARY KEY (`id_anhLienQuan`),
  ADD KEY `fk_image_item_item` (`id`);

--
-- Chỉ mục cho bảng `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_item_danhmuc` (`dm_id`),
  ADD KEY `fk_phanloai` (`id_phanloai`);

--
-- Chỉ mục cho bảng `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `phanloai`
--
ALTER TABLE `phanloai`
  ADD PRIMARY KEY (`id_phanloai`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_item` (`id_item`),
  ADD KEY `idx_size` (`id_size`),
  ADD KEY `idx_color` (`id_color`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `style`
--
ALTER TABLE `style`
  ADD PRIMARY KEY (`id_style`),
  ADD KEY `fk_style_item` (`id`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `thanhtoan`
--
ALTER TABLE `thanhtoan`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tinnhan`
--
ALTER TABLE `tinnhan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tinnhan_user` (`id_user`),
  ADD KEY `fk_trangthaitinnhan_tinnhan` (`trangthai`);

--
-- Chỉ mục cho bảng `trangthaitinnhan`
--
ALTER TABLE `trangthaitinnhan`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `fk_user_taikhoan` (`trangthai`);

--
-- Chỉ mục cho bảng `voucher`
--
ALTER TABLE `voucher`
  ADD PRIMARY KEY (`id_voucher`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bill_details`
--
ALTER TABLE `bill_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=380;

--
-- AUTO_INCREMENT cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `id_binhluan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT cho bảng `color`
--
ALTER TABLE `color`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `dm_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `image_item`
--
ALTER TABLE `image_item`
  MODIFY `id_anhLienQuan` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=156;

--
-- AUTO_INCREMENT cho bảng `item`
--
ALTER TABLE `item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT cho bảng `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `size`
--
ALTER TABLE `size`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `style`
--
ALTER TABLE `style`
  MODIFY `id_style` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=164;

--
-- AUTO_INCREMENT cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `id` tinyint(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `tinnhan`
--
ALTER TABLE `tinnhan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT cho bảng `voucher`
--
ALTER TABLE `voucher`
  MODIFY `id_voucher` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `bill_ibfk_1` FOREIGN KEY (`thanhtoan`) REFERENCES `chitietbill` (`id`),
  ADD CONSTRAINT `fk_bill` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `fk_bill_voucher` FOREIGN KEY (`voucher`) REFERENCES `voucher` (`id_voucher`),
  ADD CONSTRAINT `fk_thanhtoan_trangthai` FOREIGN KEY (`trangthaithanhtoan`) REFERENCES `thanhtoan` (`id`);

--
-- Các ràng buộc cho bảng `bill_details`
--
ALTER TABLE `bill_details`
  ADD CONSTRAINT `fk_bill_details` FOREIGN KEY (`id_bill`) REFERENCES `bill` (`id_bill`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_bill_item` FOREIGN KEY (`id_item`) REFERENCES `item` (`id`),
  ADD CONSTRAINT `fk_billdetails_color` FOREIGN KEY (`color`) REFERENCES `color` (`id`),
  ADD CONSTRAINT `fk_billdetails_size` FOREIGN KEY (`size`) REFERENCES `size` (`id`);

--
-- Các ràng buộc cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD CONSTRAINT `fk_binhluan_item` FOREIGN KEY (`id`) REFERENCES `item` (`id`),
  ADD CONSTRAINT `fk_binhluan_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Các ràng buộc cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD CONSTRAINT `fk_danhmuc` FOREIGN KEY (`id_phanloai`) REFERENCES `phanloai` (`id_phanloai`);

--
-- Các ràng buộc cho bảng `image_item`
--
ALTER TABLE `image_item`
  ADD CONSTRAINT `fk_image_item` FOREIGN KEY (`id`) REFERENCES `item` (`id`),
  ADD CONSTRAINT `fk_image_item_item` FOREIGN KEY (`id`) REFERENCES `item` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `fk_item_danhmuc` FOREIGN KEY (`dm_id`) REFERENCES `danhmuc` (`dm_id`),
  ADD CONSTRAINT `fk_phanloai` FOREIGN KEY (`id_phanloai`) REFERENCES `phanloai` (`id_phanloai`);

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`id_size`) REFERENCES `size` (`id`),
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`id_color`) REFERENCES `color` (`id`),
  ADD CONSTRAINT `product_ibfk_3` FOREIGN KEY (`id_item`) REFERENCES `item` (`id`);

--
-- Các ràng buộc cho bảng `style`
--
ALTER TABLE `style`
  ADD CONSTRAINT `fk_style_item` FOREIGN KEY (`id`) REFERENCES `item` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fl_style` FOREIGN KEY (`id`) REFERENCES `item` (`id`);

--
-- Các ràng buộc cho bảng `tinnhan`
--
ALTER TABLE `tinnhan`
  ADD CONSTRAINT `fk_tinnhan_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `fk_trangthaitinnhan_tinnhan` FOREIGN KEY (`trangthai`) REFERENCES `trangthaitinnhan` (`id`);

--
-- Các ràng buộc cho bảng `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_user_taikhoan` FOREIGN KEY (`trangthai`) REFERENCES `taikhoan` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
