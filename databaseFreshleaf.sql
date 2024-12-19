create database freshleaf_website;
use freshleaf_website;


create table users(
	user_id int primary key auto_increment,
    user_name varchar(100) not null,
    password char(100) not null,
    email varchar(100) unique not null,
    phone char(10) not null,
    role enum('User', 'Admin') default 'User',
    avatar varchar(200),
    address text
);
create table categories(
	category_id int(11) primary key auto_increment,
    category_name varchar(255) unique not null
);
create table products(
	product_id int primary key auto_increment,
    product_name varchar(255) unique not null,
    description text,
    price decimal(10,2) not null,
    stock_quantity int(11) default 0,
    product_image text,
    category_id int(11),
    FOREIGN KEY (category_id) REFERENCES categories(category_id)
);
create table reviews(
	review_id int primary key auto_increment,
    rating int check(rating >= 1 and rating <= 5),
    comment text,
    review_date timestamp default current_timestamp,
    user_id int,
    product_id int,
    FOREIGN KEY (user_id) REFERENCES users(user_id),
    FOREIGN KEY (product_id) REFERENCES products(product_id)
    
);
-- drop database freshleaf_website;
select * from users;
select * from categories;
select * from products;
insert into categories(category_name) values('cải');
insert into products(product_name, description, price, stock_quantity, product_image, category_id) 
values('Cải Thìa','Bok choy is a vegetable very close to Vietnamese and Chinese dishes... It is easy to eat, not too flavorful like other vegetables... Bok choy is known by other names: bok choy, bok choy. Because each leaf sheath bends to look like a spoon. Cabbage has a beautiful green color in the leaves, the stem is fat, a bit short but the sheath is large, the base of the sheath is white. Bok choy is easy to eat, not too flavorful like other vegetables, so it is very popular. Furthermore, this is not an expensive food, but it is good for the body.','25000',20,'https://lalanh.com/wp-content/uploads/2021/11/caithia.jpg',1),
('Cải Ngọt', 'Cải ngọt có lá mỏng, thân mềm và vị ngọt tự nhiên. Thường được dùng để xào, nấu canh hoặc luộc, mang lại vị thanh mát cho bữa ăn.', '18000', 25, 'https://st.quantrimang.com/photos/image/2020/11/11/rau-cai-3.jpg', 1),
('Cải Thảo', 'Cải thảo là loại rau có lá mềm và bẹ trắng, thường được sử dụng trong các món kimchi, canh, hoặc lẩu, mang lại hương vị thanh ngọt.', '26000', 30, 'https://img.lovepik.com/free-png/20210919/lovepik-chinese-cabbage-png-image_400288432_wh1200.png', 1),
('Cải Bó Xôi', 'Cải bó xôi chứa nhiều vitamin và khoáng chất, rất tốt cho sức khỏe. Thường được chế biến trong các món xào, canh hoặc sinh tố.', '22000', 15, 'https://image-us.eva.vn/upload/3-2021/images/2021-09-11/image1-1631355146-889-width770height627.png', 1),
('Cải Xanh', 'Cải xanh có vị hơi đắng nhẹ, thường được sử dụng để làm các món canh, xào, đặc biệt phù hợp với các món ăn trong mùa lạnh.', '20000', 20, 'https://www.mediplus.vn/wp-content/uploads/2021/07/ba-bau-3-thang-dau-hoan-toan-co-the-an-cai-xanh-1.jpg', 1),
('Cải Chíp', 'Cải chíp là loại rau có thân dày và giòn, lá xanh mướt. Thường được sử dụng trong các món xào và canh, rất được ưa chuộng.', '21000', 18, 'https://hungyenfarm.com/wp-content/uploads/2019/05/10-Calcium-Rich-Foods-That-Are-Natural-Fat-Burners.jpg', 1);
