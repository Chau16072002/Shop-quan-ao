-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th12 16, 2023 lúc 01:09 PM
-- Phiên bản máy phục vụ: 8.0.31
-- Phiên bản PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `ontap`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

DROP TABLE IF EXISTS `danhmuc`;
CREATE TABLE IF NOT EXISTS `danhmuc` (
  `ma` int NOT NULL AUTO_INCREMENT,
  `ten` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ghichu` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`ma`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`ma`, `ten`, `ghichu`) VALUES
(1, 'Apple', ''),
(2, 'Samsung', ''),
(3, 'Điện thoại', ''),
(4, 'Macbook', ''),
(5, 'Dell', ''),
(6, 'Laptop', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguoidung`
--

DROP TABLE IF EXISTS `nguoidung`;
CREATE TABLE IF NOT EXISTS `nguoidung` (
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `matkhau` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hoten` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quyen` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

DROP TABLE IF EXISTS `sanpham`;
CREATE TABLE IF NOT EXISTS `sanpham` (
  `ma` int NOT NULL AUTO_INCREMENT,
  `ten` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gia` int NOT NULL,
  `mota` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `hinh` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `madanhmuc` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`ma`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`ma`, `ten`, `gia`, `mota`, `hinh`, `madanhmuc`) VALUES
(1, 'Apple iPhone 14 Pro Max', 30000000, 'iPhone 14 Pro Max. Bắt trọn chi tiết ấn tượng với Camera Chính 48MP. Trải nghiệm iPhone theo cách hoàn toàn mới với Dynamic Island và màn hình Luôn Bật. Công nghệ an toàn quan trọng – Phát Hiện Va Chạm1 thay bạn gọi trợ giúp khi cần kíp\r\n\r\nTính năng nổi bật\r\nMàn hình Super Retina XDR 6,7 inch2 với tính năng Luôn Bật và ProMotion\r\nDynamic Island, một cách mới tuyệt diệu để tương tác với iPhone\r\nCamera Chính 48MP cho độ phân giải gấp 4 lần\r\nChế độ Điện Ảnh nay đã hỗ trợ 4K Dolby Vision tốc độ lên đến 30 fps\r\nChế độ Hành Động để quay video cầm tay mượt mà, ổn định\r\nCông nghệ an toàn quan trọng – Phát Hiện Va Chạm1 thay bạn gọi trợ giúp khi cần kíp\r\nThời lượng pin cả ngày và thời gian xem video lên đến 29 giờ3\r\nA16 Bionic, chip điện thoại thông minh tuyệt đỉnh. Mạng di động 5G siêu nhanh4\r\nCác tính năng về độ bền dẫn đầu như Ceramic Shield và khả năng chống nước5\r\niOS 16 đem đến thêm nhiều cách để cá nhân hóa, giao tiếp và chia sẻ6\r\nPháp lý\r\n1SOS Khẩn Cấp sử dụng kết nối mạng di động hoặc Cuộc Gọi Wi-Fi.\r\n2Màn hình có các góc bo tròn. Khi tính theo hình chữ nhật, kích thước màn hình theo đường chéo là 6,69 inch. Diện tích hiển thị thực tế nhỏ hơn.\r\n3Thời lượng pin khác nhau tùy theo cách sử dụng và cấu hình; truy cập apple.com/batteries để biết thêm thông tin.\r\n4Cần có gói cước dữ liệu. Mạng 5G chỉ khả dụng ở một số thị trường và được cung cấp qua một số nhà mạng. Tốc độ có thể thay đổi tùy địa điểm và nhà mạng. Để biết thông tin về hỗ trợ mạng 5G, vui lòng liên hệ nhà mạng và truy cập apple.com/iphone/cellular.\r\n5iPhone 14 Pro Max có khả năng chống tia nước, chống nước và chống bụi. Sản phẩm đã qua kiểm nghiệm trong điều kiện phòng thí nghiệm có kiểm soát đạt mức IP68 theo tiêu chuẩn IEC 60529 (chống nước ở độ sâu tối đa 6 mét trong vòng tối đa 30 phút). Khả năng chống tia nước, chống nước và chống bụi không phải là các điều kiện vĩnh viễn. Khả năng này có thể giảm do hao mòn thông thường. Không sạc pin khi iPhone đang bị ướt. Vui lòng tham khảo hướng dẫn sử dụng để biết cách lau sạch và làm khô máy. Không bảo hành sản phẩm bị hỏng do thấm chất lỏng.\r\n6Một số tính năng không khả dụng tại một số quốc gia hoặc khu vực.\r\n\r\nThông số kỹ thuật\r\nTruy cập apple.com/iphone/compare\r\n\r\nGiá sản phẩm trên Tiki đã bao gồm thuế theo luật hiện hành. Bên cạnh đó, tuỳ vào loại sản phẩm, hình thức và địa chỉ giao hàng mà có thể phát sinh thêm chi phí khác như phí vận chuyển, phụ phí hàng cồng kềnh, thuế nhập khẩu (đối với đơn hàng giao từ nước ngoài có giá trị trên 1 triệu đồng).....\r\n', 'iphone14.jpg', '1'),
(2, 'Samsung Galaxy S22 Ultra 5G (8GB|128GB) USA New Fu', 13900000, 'Đánh giá chi tiết SAMSUNG Galaxy S22 5G Công Ty SSVN Mới Fullbox\r\nĐiện thoại Samsung Galaxy S22 - Sang trọng, hiệu năng khủng\r\nSamsung S22 là một trong những cái tên đáng được mong chờ nhất trong thời điểm hiện tại dự kiến sẽ trình làng trong thời gian sắp tới. Sở hữu thiết kế mỏng cùng hiệu năng mạnh mẽ hứa hẹn đây sẽ là chiếc smartphone làm mưa làm gió trên thị trường ngay từ khi được ra mắt. Đây sẽ là sự lựa chọn không thể nào thích hợp hơn dành cho bạn.\r\n\r\nBên cạnh Galaxy S22 tiêu chuẩn, gã khổng lồ Hàn Quốc còn cho ra mắt thêm 2 phiên bản cao cấp hơn đó là Galaxy S22 Plus và Galaxy S22 Ultra với nhiều cải tiến về thiết kế, cấu hình lẫn camera.\r\n\r\nThiết kế nguyên khối, màn hình Dynamic AMOLED 6.1 sắc nét\r\nĐiện thoại Galaxy S22 sở hữu thiết kế nguyên khối cứng cáp và bền bỉ tuy nhiên mỏng hơn người đàn anh tiền nghiệm của mình là Galaxy S21. Tuy nhiên các đường nét thiết kế được thừa hưởng vẫn không khác nhau là mấy. Các chi tiết được hoàn thiện tỉ mỉ chính xác và trau chuốt từng góc cạnh mang lại một tổng thể sang trọng bắt mắt và tinh tế.\r\n\r\nMặt lưng có thiết kế bóng bẩy dễ dàng thu hút người dùng ngay từ cái nhìn đầu tiên nhìn vào Samsung Galaxy S22.\r\n\r\n', 'samsums22.jpg', '2'),
(3, 'MacBook Air 15 inch (M2, 2023)', 25000000, 'MacBook Air (15 inch) Chip M2\r\n\r\nMacBook Air 15″. Lớn ấn tượng. Mỏng không tưởng.\r\nMacBook Air 15″. Siêu mạnh mẽ với M2.\r\nMacBook Air 15″. Siêu mỏng, siêu nhanh.\r\nMacBook Air. Nay đã có cỡ 15″.\r\nMacBook Air 15 inch mỏng không tưởng và sở hữu màn hình Liquid Retina tuyệt đẹp. Siêu mạnh mẽ với chip M2, cùng thời lượng pin lên đến 18 giờ,1 máy mang đến hiệu năng phi thường trong một thiết kế siêu gọn nhẹ.\r\n\r\nTính năng nổi bật\r\nChip M2 cho hiệu năng phi thường\r\nCPU 8 lõi và GPU lên đến 10 lõi giúp dễ dàng xử lý các tác vụ phức tạp\r\nNeural Engine 16 lõi cho các tác vụ sử dụng công nghệ máy học tiên tiến\r\nBộ nhớ thống nhất lên đến 24GB giúp bạn làm việc gì cũng nhanh chóng và trôi chảy\r\nNhanh hơn đến 20% khi áp dụng bộ lọc và hiệu ứng cho hình ảnh2\r\nNhanh hơn đến 40% khi chỉnh sửa các dòng thời gian video phức tạp2\r\nHoạt động bền bỉ cả ngày dài với thời lượng pin lên đến 18 giờ1\r\nThiết kế không quạt giảm tối đa tiếng ồn khi sử dụng\r\nMàn hình Liquid Retina 15,3 inch với độ sáng 500 nit và dải màu rộng P3 cho hình ảnh sống động và chi tiết ấn tượng3\r\nCamera FaceTime HD 1080p\r\nBộ ba micrô phối hợp tập trung thu giọng nói của bạn, không thu tạp âm môi trường\r\nHệ thống âm thanh sáu loa với Âm Thanh Không Gian cho trải nghiệm nghe sống động\r\nCổng MagSafe 3, hai cổng Thunderbolt và jack cắm tai nghe\r\nBàn phím Magic Keyboard có đèn nền và Touch ID giúp mở khóa và thanh toán an toàn hơn\r\nKết nối không dây nhanh với Wi-Fi 6\r\nỔ lưu trữ SSD siêu nhanh giúp mở các ứng dụng và tập tin chỉ trong tích tắc\r\nMacOS Ventura mang đến cho bạn những phương thức hiệu quả để hoàn thành nhiều việc hơn, chia sẻ và cộng tác, và chạy mượt mà cùng iPhone và iPad4\r\nHiện có màu Đêm Xanh Thẳm, Ánh Sao, Xám Không Gian và Bạc\r\nPháp lý\r\nHiện có sẵn các lựa chọn để nâng cấp.\r\n\r\n(1) Thời lượng pin khác nhau tùy theo cách sử dụng và cấu hình. Truy cập để biết thêm thông tin.\r\n\r\n(2) So với thế hệ trước.\r\n\r\n(3) Màn hình của MacBook Air 15 inch có các góc trên được bo tròn. Khi tính theo hình chữ nhật chuẩn, kích thước màn hình theo đường chéo là 15,3 inch (diện tích hiển thị thực tế nhỏ hơn).\r\n\r\n(4) Yêu cầu có iCloud và kết nối internet.\r\n\r\nThông số kỹ thuật\r\nTruy cập để xem cấu hình đầy đủ.\r\n\r\nGiá sản phẩm trên Tiki đã bao gồm thuế theo luật hiện hành. Bên cạnh đó, tuỳ vào loại sản phẩm, hình thức và địa chỉ giao hàng mà có thể phát sinh thêm chi phí khác như phí vận chuyển, phụ phí hàng cồng kềnh, thuế nhập khẩu (đối với đơn hàng giao từ nước ngoài có giá trị trên 1 triệu đồng).....', 'macbookair15.jpg', '4'),
(4, 'Dell XPS 13 Plus 9320 (2023) - I7/32GB/1TB/UHD 4K ', 20000000, 'Dell XPS 13 9380 - phiên bản mới nhất, hoàn thiện nhất của Dell năm 2019 ! Sau thành công vang dội của Dell XPS 9370 phiên bản năm 2018, Dell tiếp tục xây dựng thương hiệu đẳng cấp của mình khi tung ra thị trường phiên bản mới nhất năm 2019 có tên đầy đủ là Laptop Dell XPS 13 9380. Thuộc dòng sản phẩm laptop mỏng nhẹ nổi tiếng nhất của Dell, Dell XPS 13 9380 thật sự đã mang lại một trải nghiệm hoàn hảo cho người dùng. Không đột phá to lớn, những cải tiến nhỏ nhưng hữu ích mới là thứ giúp Dell XPS 9380 trở thành một trong những ultrabook đáng mua nhất đầu năm 2019. Cùng tìm hiểu thêm về chiếc máy này ngay phần bên dưới bạn nhé.\r\nĐánh giá Dell XPS 13 9380 chiếc laptop hoàn hảo của năm 2019', 'dellxps13.jpg', '5');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
