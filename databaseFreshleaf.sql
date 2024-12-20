create database freshleaf_website;
use freshleaf_website;

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `password` char(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` char(10) NOT NULL,
  `role` enum('User','Admin') DEFAULT 'User',
  `avatar` varchar(200) DEFAULT NULL,
  `address` text DEFAULT NULL
);

INSERT INTO `users` (`user_id`, `user_name`, `password`, `email`, `phone`, `role`, `avatar`, `address`) VALUES
(1, 'nguyenvandat', '$2y$10$sFGmXdL2NrteioGCkDncKOl1qa2Mka48jT1u7eHaUa8e2HbPJbzG2', 'ngaichi2004@gmail.com', '383225512', 'Admin', NULL, 'QB'),
(2, 'Bẹp', '$2y$10$jlq4IUTDeBva.QqClIsBleeAPGSQC8a.dmoXWy3CeoXd05jddFdKy', 'ngaichi204@gmail.com', '383225512', 'User', NULL, 'QB'),
(3, 'Tố Nga', '$2y$10$E.wxWv1jFN4qdwI.xwC9AuhvhvcwEqGsyC/zGb63XSJeYeS25seje', 'ngaichi24@gmail.com', '383225512', 'User', NULL, 'QB'),
(4, 'Minh Khiêm', '$2y$10$lIhF1OeLmuQelY73LstsH.3zbLwn.Ac9J/rSEQfO.OT3kc1IR8w5m', 'minhkhiem@gmail.com', '387287713', 'User', NULL, 'TPHCM'),
(5, 'Minh Vũ', '$2y$10$sT.cZuxli8vCZLPolGclf./dj2T1ejVU1sc5jyGF3pAEIcdFL/l4W', 'minhvu42@gmail.com', '388474414', 'User', NULL, 'QB');


CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL
);

INSERT INTO `categories` (`category_id`, `category_name`) VALUES
(2, 'Củ'),
(4, 'Hạt'),
(1, 'Rau'),
(5, 'Thực phẩm khô'),
(3, 'Trái cây');

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `stock_quantity` int(11) DEFAULT 0,
  `product_image` text DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL
);

INSERT INTO `products` (`product_id`, `product_name`, `description`, `price`, `stock_quantity`, `product_image`, `category_id`) VALUES
(1, 'Cải Thìa', 'Bok choy is a vegetable very close to Vietnamese and Chinese dishes... It is easy to eat, not too flavorful like other vegetables... Bok choy is known by other names: bok choy, bok choy. Because each leaf sheath bends to look like a spoon. Cabbage has a beautiful green color in the leaves, the stem is fat, a bit short but the sheath is large, the base of the sheath is white. Bok choy is easy to eat, not too flavorful like other vegetables, so it is very popular. Furthermore, this is not an expensive food, but it is good for the body.', 25000.00, 20, 'https://lalanh.com/wp-content/uploads/2021/11/caithia.jpg', 1),
(2, 'Cải Ngọt', 'Cải ngọt có lá mỏng, thân mềm và vị ngọt tự nhiên. Thường được dùng để xào, nấu canh hoặc luộc, mang lại vị thanh mát cho bữa ăn.', 18000.00, 25, 'https://st.quantrimang.com/photos/image/2020/11/11/rau-cai-3.jpg', 1),
(3, 'Cải Thảo', 'Cải thảo là loại rau có lá mềm và bẹ trắng, thường được sử dụng trong các món kimchi, canh, hoặc lẩu, mang lại hương vị thanh ngọt.', 26000.00, 30, 'https://i.pinimg.com/736x/92/72/4c/92724ccad1927d0caf05118f56590e0b.jpg', 1),
(4, 'Cải Bó Xôi', 'Cải bó xôi chứa nhiều vitamin và khoáng chất, rất tốt cho sức khỏe. Thường được chế biến trong các món xào, canh hoặc sinh tố.', 22000.00, 15, 'https://image-us.eva.vn/upload/3-2021/images/2021-09-11/image1-1631355146-889-width770height627.png', 1),
(5, 'Cải Xanh', 'Cải xanh có vị hơi đắng nhẹ, thường được sử dụng để làm các món canh, xào, đặc biệt phù hợp với các món ăn trong mùa lạnh.', 20000.00, 20, 'https://www.mediplus.vn/wp-content/uploads/2021/07/ba-bau-3-thang-dau-hoan-toan-co-the-an-cai-xanh-1.jpg', 1),
(6, 'Cải Chíp', 'Cải chíp là loại rau có thân dày và giòn, lá xanh mướt. Thường được sử dụng trong các món xào và canh, rất được ưa chuộng.', 21000.00, 18, 'https://hungyenfarm.com/wp-content/uploads/2019/05/10-Calcium-Rich-Foods-That-Are-Natural-Fat-Burners.jpg', 1),
(7, 'Cà rốt Hàn Quốc', 'Cà rốt Hàn Quốc giàu beta-carotene, vitamin A, và chất chống oxy hóa, giúp tăng cường thị lực, làm đẹp da và hỗ trợ sức khỏe tim mạch. Được trồng trong điều kiện khí hậu lý tưởng, cà rốt Hàn Quốc có vị ngọt thanh tự nhiên và kết cấu giòn ngon.', 50000.00, 100, 'https://i.pinimg.com/736x/2b/39/a3/2b39a367156d1a57ff11f9137ff92991.jpg', 2),
(8, 'Củ dền đỏ', 'Củ rền đỏ - loại củ giàu dinh dưỡng với màu đỏ đậm tự nhiên, chứa nhiều vitamin, khoáng chất và chất chống oxy hóa. Vị ngọt thanh, dễ dàng chế biến trong các món ăn như salad, nước ép, súp hoặc món xào, mang đến sức khỏe và hương vị tuyệt vời cho gia đình bạn.', 15000.00, 20, 'https://th.bing.com/th/id/OIP.jOAKHg8QvNftdCdrWejrrAHaGv?rs=1&pid=ImgDetMain', 2),
(9, 'Bắp ngô Nếp vàng', 'Bắp ngô tươi - loại ngũ cốc giàu dinh dưỡng, với hạt vàng óng, vị ngọt tự nhiên và giàu chất xơ. Phù hợp để chế biến các món ăn như luộc, nướng, súp, hoặc làm nguyên liệu cho món bánh và đồ ăn nhẹ bổ dưỡng.', 20000.00, 20, 'https://i.pinimg.com/736x/e7/7f/7f/e77f7f6719e5d3579ed9f2abbd178880.jpg', 5),
(10, 'Chanh tươi', 'Chanh tươi - loại quả nhỏ với vỏ mỏng, màu xanh tươi sáng, giàu vitamin C và hương thơm tự nhiên. Hoàn hảo để pha nước giải khát, làm gia vị cho món ăn, hoặc tạo điểm nhấn trong các món tráng miệng.', 50000.00, 100, 'https://i.pinimg.com/736x/83/02/cb/8302cb21c646b117e03ca4a51552f4dc.jpg', 3),
(11, 'Cà tím', 'Cà tím - loại quả màu tím bóng bẩy, thịt mềm, giàu chất xơ và các chất chống oxy hóa. Dễ dàng chế biến thành các món xào, nướng, hầm, hoặc làm nguyên liệu cho các món ăn chay ngon miệng và bổ dưỡng.', 25000.00, 30, 'https://i.pinimg.com/736x/94/fa/d6/94fad6b5326ee97c4b6f4f8056bdd9c7.jpg', 2),
(12, 'Ớt chuông', 'Ớt chuông - loại quả với màu sắc rực rỡ (đỏ, vàng, xanh), giàu vitamin C, chất chống oxy hóa và hương vị ngọt dịu. Thích hợp để chế biến các món xào, nướng, salad hoặc dùng làm nguyên liệu trang trí món ăn, mang lại hương vị và màu sắc hấp dẫn.', 25000.00, 10, 'https://i.pinimg.com/736x/5c/1f/26/5c1f264d86169921b83e0c40bcdb1c81.jpg', 3),
(13, 'Rau muống', 'Rau muống - loại rau xanh quen thuộc, giòn ngon, giàu chất xơ, sắt và các vitamin thiết yếu. Phù hợp để chế biến các món xào, luộc, hoặc nấu canh, mang đến bữa ăn bổ dưỡng và thanh mát cho gia đình.', 20000.00, 20, 'https://i.pinimg.com/736x/76/f9/ab/76f9abe279692dbc323cc7a732c2ff1e.jpg', 1),
(14, 'Súp lơ xanh', 'Súp lơ xanh - loại rau giàu dinh dưỡng với hình dáng đẹp mắt, chứa nhiều vitamin C, chất xơ và chất chống oxy hóa. Vị ngọt tự nhiên, giòn ngon, phù hợp để chế biến các món xào, luộc, hấp hoặc làm nguyên liệu trong món salad và súp bổ dưỡng', 25000.00, 8, 'https://i.pinimg.com/736x/60/f9/fd/60f9fd2eb0df2fe442cf91d56b831704.jpg', 1),
(15, 'Rau xà lách Nhật', 'Rau xà lách - loại rau lá mềm, xanh mướt, giàu vitamin và khoáng chất, mang hương vị thanh nhẹ và tươi mát. Thích hợp để ăn sống, làm salad, cuốn gỏi hoặc trang trí món ăn, mang đến sự tươi ngon và dinh dưỡng cho bữa ăn của bạn.', 15000.00, 45, 'https://i.pinimg.com/736x/39/19/7b/39197bca31001122a4b7752f71b57f4e.jpg', 1);

CREATE TABLE `reviews` (
  `review_id` int(11) NOT NULL,
  `rating` int(11) DEFAULT NULL CHECK (`rating` >= 1 and `rating` <= 5),
  `comment` text DEFAULT NULL,
  `review_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL
);

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` enum('pending','completed','shipped','cancelled') NOT NULL DEFAULT 'pending',
  `user_id` int(11) NOT NULL
);

INSERT INTO `orders` (`order_id`, `order_date`, `status`, `user_id`) VALUES
(1, '2024-12-18 18:39:55', 'pending', 1),
(2, '2024-12-18 18:39:55', 'completed', 2),
(3, '2024-12-18 18:39:55', 'completed', 4),
(4, '2024-12-18 18:39:55', 'cancelled', 3),
(5, '2024-12-18 18:39:55', 'pending', 5);

CREATE TABLE `order_detail` (
  `order_detail_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
);

INSERT INTO `order_detail` (`order_detail_id`, `quantity`, `price`, `order_id`, `product_id`) VALUES
(1, 6, 15000, 1, 15),
(2, 1, 25000, 1, 14),
(3, 5, 20000, 2, 13),
(4, 5, 25000, 3, 11),
(5, 4, 50000, 4, 10),
(6, 1, 50000, 5, 7),
(7, 4, 20000, 5, 9),
(8, 2, 25000, 5, 1),
(9, 3, 50000, 2, 7),
(10, 8, 25000, 4, 12),
(11, 3, 15000, 5, 3),
(12, 4, 20000, 1, 6);

ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`),
  ADD UNIQUE KEY `category_name` (`category_name`);


ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`);

ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`order_detail_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD UNIQUE KEY `product_name` (`product_name`),
  ADD KEY `category_id` (`category_id`);


ALTER TABLE `reviews`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);


ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);


ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

ALTER TABLE `reviews`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

ALTER TABLE `order_detail`
  ADD CONSTRAINT `order_detail_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `order_detail_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`);

ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);
COMMIT;
