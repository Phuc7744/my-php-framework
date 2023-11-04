DROP DATABASE if EXISTS shoes_shop;

CREATE DATABASE shoes_shop;
USE shoes_shop;

CREATE TABLE USR (
	id INT AUTO_INCREMENT PRIMARY KEY,
	`name` VARCHAR(255),
	address VARCHAR(255),
	email VARCHAR(255),
	username VARCHAR(255),
	`password` VARCHAR(255),
	role_id INT
);

CREATE TABLE USR_Role (
	id INT AUTO_INCREMENT PRIMARY KEY,
	`name` VARCHAR(255)
);

CREATE TABLE PRD (
	id INT AUTO_INCREMENT PRIMARY KEY,
	`name` VARCHAR(255),
	type_id INT,
	brand_id INT,
	original_price FLOAT,
	promotion_price FLOAT,
	promotion_id INT,
	img VARCHAR(255),
	description VARCHAR(255),
	created_at DATETIME,
	updated_at DATETIME,
	`status` INT
);

CREATE TABLE PRD_Category (
	id INT AUTO_INCREMENT PRIMARY KEY,
	`name` VARCHAR(255)
);

CREATE TABLE PRD_Type (
	id INT AUTO_INCREMENT PRIMARY KEY,
	`name` VARCHAR(255),
	description VARCHAR(255),
	category_id INT
);

CREATE TABLE PRD_Brand (
	id INT AUTO_INCREMENT PRIMARY KEY,
	`name` VARCHAR(255),
	description VARCHAR(255)
);

CREATE TABLE PRD_Promotion (
	id INT AUTO_INCREMENT PRIMARY KEY,
	`name` VARCHAR(255),
	`code` VARCHAR(255),
	`value` FLOAT,
	value_percent FLOAT,
	create_at DATETIME,
	`status` INT
);

CREATE TABLE PRD_Color (
	id INT AUTO_INCREMENT PRIMARY KEY,
	`name` VARCHAR(255)
);

CREATE TABLE PRD_Img (
	id INT AUTO_INCREMENT PRIMARY KEY,
	color_id INT,
	product_id INT,
	img VARCHAR(255)
);

CREATE TABLE PRD_Banner (
	id INT AUTO_INCREMENT PRIMARY KEY,
	product_id INT,
	img VARCHAR(255)
);

CREATE TABLE ODR (
	id INT AUTO_INCREMENT PRIMARY KEY,
	user_id INT,
	shipping_address VARCHAR(255),
	phone VARCHAR(255),
	total_price FLOAT,
	create_at DATETIME,
	updated_at DATETIME,
	`status` INT
);

CREATE TABLE ODR_Detail (
	id INT AUTO_INCREMENT PRIMARY KEY,
	product_id INT,
	order_id INT,
	total INT,
	total_price FLOAT
);

ALTER TABLE USR
ADD FOREIGN KEY (role_id) REFERENCES USR_Role(id);

ALTER TABLE PRD_Type
ADD FOREIGN KEY (category_id) REFERENCES PRD_Category(id);

ALTER TABLE PRD_Img 
ADD FOREIGN KEY (color_id) REFERENCES PRD_Color(id),
ADD FOREIGN KEY (product_id) REFERENCES PRD(id);

ALTER TABLE PRD_Banner 
ADD FOREIGN KEY (product_id) REFERENCES PRD(id);

ALTER TABLE PRD 
ADD FOREIGN KEY (type_id) REFERENCES PRD_Type(id),
ADD FOREIGN KEY (brand_id) REFERENCES PRD_Brand(id),
ADD FOREIGN KEY (promotion_id) REFERENCES PRD_Promotion(id);

ALTER TABLE ODR
ADD FOREIGN KEY (user_id) REFERENCES USR(id);

ALTER TABLE ODR_Detail
ADD FOREIGN KEY (product_id) REFERENCES PRD(id),
ADD FOREIGN KEY (order_id) REFERENCES ODR(id);


