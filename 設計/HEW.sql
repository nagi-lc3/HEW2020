SET SESSION FOREIGN_KEY_CHECKS=0;

/* Drop Tables */

DROP TABLE IF EXISTS my_aquarium_accessories;
DROP TABLE IF EXISTS my_aquarium_fish;
DROP TABLE IF EXISTS my_aquariums;
DROP TABLE IF EXISTS aquariums;
DROP TABLE IF EXISTS carts;
DROP TABLE IF EXISTS product_images;
DROP TABLE IF EXISTS purchase_details;
DROP TABLE IF EXISTS wish;
DROP TABLE IF EXISTS products;
DROP TABLE IF EXISTS categories;
DROP TABLE IF EXISTS fishes;
DROP TABLE IF EXISTS purchase_history;
DROP TABLE IF EXISTS freight_companies;
DROP TABLE IF EXISTS inquiries;
DROP TABLE IF EXISTS inquiry_categories;
DROP TABLE IF EXISTS inquiry_status;
DROP TABLE IF EXISTS users;
DROP TABLE IF EXISTS questions;




/* Create Tables */

CREATE TABLE aquariums
(
	aquarium_id int NOT NULL AUTO_INCREMENT,
	aquarium_name varchar(50) NOT NULL,
	aquarium_image varchar(255) NOT NULL,
	aquarium_3D varchar(255) NOT NULL,
	PRIMARY KEY (aquarium_id)
);


CREATE TABLE carts
(
	cart_id int NOT NULL AUTO_INCREMENT,
	user_id int NOT NULL,
	product_id int NOT NULL,
	cart_quantity int(2) NOT NULL,
	PRIMARY KEY (cart_id)
);


CREATE TABLE categories
(
	category_id int NOT NULL AUTO_INCREMENT,
	category_name varchar(50) NOT NULL,
	PRIMARY KEY (category_id)
);


CREATE TABLE fishes
(
	fish_id int NOT NULL AUTO_INCREMENT,
	fish_name varchar(50) NOT NULL,
	fish_image varchar(255) NOT NULL,
	fish_3D varchar(255) NOT NULL,
	PRIMARY KEY (fish_id)
);


CREATE TABLE freight_companies
(
	freight_company_id int NOT NULL AUTO_INCREMENT,
	freight_company_name varchar(50) NOT NULL,
	PRIMARY KEY (freight_company_id)
);


CREATE TABLE inquiries
(
	inquiry_id int NOT NULL AUTO_INCREMENT,
	inquiry_subject varchar(50) NOT NULL,
	user_id int NOT NULL,
	inquiry_mail_address varchar(255) NOT NULL,
	inquiry_category_id int NOT NULL,
	inquiry_content varchar(2000) NOT NULL,
	inquiry_status_id int NOT NULL,
	inquiry_datetime datetime NOT NULL,
	PRIMARY KEY (inquiry_id)
);


CREATE TABLE inquiry_categories
(
	inquiry_category_id int NOT NULL AUTO_INCREMENT,
	inquiry_category_name varchar(50) NOT NULL,
	PRIMARY KEY (inquiry_category_id)
);


CREATE TABLE inquiry_status
(
	inquiry_status_id int NOT NULL AUTO_INCREMENT,
	inquiry_status_name varchar(25) NOT NULL,
	PRIMARY KEY (inquiry_status_id)
);


CREATE TABLE my_aquariums
(
	my_aquarium_id int NOT NULL AUTO_INCREMENT,
	my_aquarium_name varchar(50) NOT NULL,
	user_id int NOT NULL,
	aquarium_id int NOT NULL,
	my_aquarium_created_at datetime NOT NULL,
	my_aruarium_updated_at datetime,
	PRIMARY KEY (my_aquarium_id)
);


CREATE TABLE my_aquarium_accessories
(
	my_aquarium_id int NOT NULL,
	product_id int NOT NULL,
	accessory_number int NOT NULL UNIQUE AUTO_INCREMENT,
	accessory_coordinate varchar(50) NOT NULL,
	PRIMARY KEY (my_aquarium_id, product_id, accessory_number)
);


CREATE TABLE my_aquarium_fish
(
	fish_id int NOT NULL,
	my_aquarium_id int NOT NULL,
	my_fish_name varchar(50) NOT NULL,
	fish_created_at datetime NOT NULL,
	PRIMARY KEY (fish_id, my_aquarium_id, my_fish_name)
);


CREATE TABLE products
(
	product_id int NOT NULL AUTO_INCREMENT,
	category_id int NOT NULL,
	product_name varchar(50) NOT NULL,
	product_price int(10) NOT NULL,
	product_description varchar(500) NOT NULL,
	accessory_3D varchar(255),
	product_created_at datetime NOT NULL,
	product_deleted_at datetime,
	product_updated_at datetime,
	PRIMARY KEY (product_id)
);


CREATE TABLE product_images
(
	product_image_id int NOT NULL AUTO_INCREMENT,
	product_image varchar(255) NOT NULL,
	product_id int NOT NULL,
	PRIMARY KEY (product_image_id)
);


CREATE TABLE purchase_details
(
	purchase_history int NOT NULL,
	product_id int NOT NULL,
	product_quantity int(2) NOT NULL,
	product_unit_price int(10) NOT NULL,
	PRIMARY KEY (purchase_history, product_id)
);


CREATE TABLE purchase_history
(
	purchase_history int NOT NULL AUTO_INCREMENT,
	user_id int NOT NULL,
	payment enum('���������', '�N���W�b�g�J�[�h����', '�R���r�j����') NOT NULL,
	purchase_datetime datetime NOT NULL,
	freight_company_id int NOT NULL,
	tracking_id int(25),
	PRIMARY KEY (purchase_history)
);


CREATE TABLE questions
(
	question_id int NOT NULL AUTO_INCREMENT,
	question varchar(25) NOT NULL,
	PRIMARY KEY (question_id)
);


CREATE TABLE users
(
	user_id int NOT NULL AUTO_INCREMENT,
	mail_address varchar(255) NOT NULL,
	user_name varchar(50) NOT NULL,
	password varchar(255) NOT NULL,
	last_name varchar(25) NOT NULL,
	first_name varchar(25) NOT NULL,
	postal_code char(7) NOT NULL,
	address varchar(100) NOT NULL,
	birthday date NOT NULL,
	phone_number varchar(15) NOT NULL,
	question_id int NOT NULL,
	answer varchar(25) NOT NULL,
	user_created_at datetime NOT NULL,
	user_deleted_at datetime,
	PRIMARY KEY (user_id),
	UNIQUE (mail_address)
);


CREATE TABLE wish
(
	wish_id int NOT NULL,
	user_id int NOT NULL,
	product_id int NOT NULL,
	wish_created_at datetime NOT NULL,
	PRIMARY KEY (wish_id)
);



/* Create Foreign Keys */

ALTER TABLE my_aquariums
	ADD FOREIGN KEY (aquarium_id)
	REFERENCES aquariums (aquarium_id)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE products
	ADD FOREIGN KEY (category_id)
	REFERENCES categories (category_id)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE my_aquarium_fish
	ADD FOREIGN KEY (fish_id)
	REFERENCES fishes (fish_id)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE purchase_history
	ADD FOREIGN KEY (freight_company_id)
	REFERENCES freight_companies (freight_company_id)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE inquiries
	ADD FOREIGN KEY (inquiry_category_id)
	REFERENCES inquiry_categories (inquiry_category_id)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE inquiries
	ADD FOREIGN KEY (inquiry_status_id)
	REFERENCES inquiry_status (inquiry_status_id)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE my_aquarium_accessories
	ADD FOREIGN KEY (my_aquarium_id)
	REFERENCES my_aquariums (my_aquarium_id)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE my_aquarium_fish
	ADD FOREIGN KEY (my_aquarium_id)
	REFERENCES my_aquariums (my_aquarium_id)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE carts
	ADD FOREIGN KEY (product_id)
	REFERENCES products (product_id)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE my_aquarium_accessories
	ADD FOREIGN KEY (product_id)
	REFERENCES products (product_id)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE product_images
	ADD FOREIGN KEY (product_id)
	REFERENCES products (product_id)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE purchase_details
	ADD FOREIGN KEY (product_id)
	REFERENCES products (product_id)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE wish
	ADD FOREIGN KEY (product_id)
	REFERENCES products (product_id)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE purchase_details
	ADD FOREIGN KEY (purchase_history)
	REFERENCES purchase_history (purchase_history)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE users
	ADD FOREIGN KEY (question_id)
	REFERENCES questions (question_id)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE carts
	ADD FOREIGN KEY (user_id)
	REFERENCES users (user_id)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE inquiries
	ADD FOREIGN KEY (user_id)
	REFERENCES users (user_id)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE my_aquariums
	ADD FOREIGN KEY (user_id)
	REFERENCES users (user_id)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE purchase_history
	ADD FOREIGN KEY (user_id)
	REFERENCES users (user_id)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE wish
	ADD FOREIGN KEY (user_id)
	REFERENCES users (user_id)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;
