-- Connect to the destination database
DROP DATABASE IF EXISTS `dev_degoudendraak`;
CREATE DATABASE IF NOT EXISTS `dev_degoudendraak`;
USE dev_degoudendraak;

-- Create a temporary table to hold the data
CREATE TEMPORARY TABLE temp_users
SELECT * FROM gouden_draak.gebruiker;

CREATE TEMPORARY TABLE temp_dishes
SELECT * FROM gouden_draak.menu;

CREATE TEMPORARY TABLE temp_sales
SELECT * FROM gouden_draak.sales;

-- Insert the data into the destination table

-- Users
CREATE TABLE roles (
	id INT PRIMARY KEY AUTO_INCREMENT,
	name VARCHAR(255) UNIQUE
);
CREATE TABLE users (
	id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) UNIQUE,
    email VARCHAR(50) UNIQUE,
    email_verified_at DATETIME NULL,
    password VARCHAR(255),
    remember_token VARCHAR(100),
    created_at DATETIME,
    updated_at DATETIME,
    role INT,
    FOREIGN KEY (role) REFERENCES roles (id) ON DELETE CASCADE
);

-- Dishes
CREATE TABLE dish_types (
	id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50) UNIQUE
);

CREATE TABLE dishes (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100),
    price DOUBLE,
    description VARCHAR(999) NULL,
    addition VARCHAR(50) NULL,
    created_at DATETIME,
    updated_at DATETIME,
    dish_type_id INT,
    FOREIGN KEY (dish_type_id) REFERENCES dish_types (id) ON DELETE CASCADE
);

-- Orders
DROP TABLE IF EXISTS `orders`;

CREATE TABLE orders (
    id INT PRIMARY KEY AUTO_INCREMENT,
    paid_at DATETIME NULL,
	price DOUBLE,
    table_number INT,
    created_at DATETIME,
    updated_at DATETIME
);

CREATE TABLE dish_in_order (
    dish_id INT,
    FOREIGN KEY (dish_id) REFERENCES dishes (id) ON DELETE CASCADE,
    order_id INT,
    FOREIGN KEY (order_id) REFERENCES orders (id) ON DELETE CASCADE,
    amount INT,
    remark VARCHAR(999) NULL
);

-- Specialties
CREATE TABLE specialty_additions (
	id INT PRIMARY KEY AUTO_INCREMENT,
    description VARCHAR(999) NULL,
    price DOUBLE
);

CREATE TABLE specialties (
	id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50),
    price DOUBLE,
    description VARCHAR(999) NULL,
    created_at DATETIME,
    updated_at DATETIME,
    addition_id INT,
    FOREIGN KEY (addition_id) REFERENCES specialty_additions (id) ON DELETE CASCADE 
);

CREATE TABLE dish_in_specialty (
    dish_id INT,
    FOREIGN KEY (dish_id) REFERENCES dishes (id) ON DELETE CASCADE,
    specialty_id INT,
    FOREIGN KEY (specialty_id) REFERENCES specialties (id) ON DELETE CASCADE
);

CREATE TABLE specialty_in_order (
    specialty_id INT,
    FOREIGN KEY (specialty_id) REFERENCES specialties (id) ON DELETE CASCADE,
    order_id INT,
    FOREIGN KEY (order_id) REFERENCES orders (id) ON DELETE CASCADE,
    amount INT,
    remark VARCHAR(999) NULL
);

-- News
CREATE TABLE news_articles (
	id INT PRIMARY KEY AUTO_INCREMENT,
	body VARCHAR(999),
    title VARCHAR(50),
    created_at DATETIME,
    updated_at DATETIME
);

-- INSERTING DATA

-- Users
INSERT INTO roles (id, name)
VALUES ("1", "admin"), ("2", "register"), ("3", "customer");

INSERT INTO users (id, name, email, password, role)
SELECT temp.id, "admin", "admin@admin.nl", wachtwoord, role.id FROM temp_users AS temp
INNER JOIN roles AS role
ON temp.isAdmin = role.id;

-- Dishes
INSERT INTO dish_types (name)
SELECT DISTINCT soortgerecht FROM temp_dishes;

INSERT INTO dishes (id, name, price, description, addition, dish_type_id)
SELECT temp.id, naam, ROUND(price, 1), beschrijving, menu_toevoeging, type.id FROM temp_dishes AS temp
INNER JOIN dish_types AS type
ON type.name = temp.soortgerecht;

-- Orders
INSERT INTO orders (id, paid_at, table_number, price)
SELECT temp_sales.id, saleDate, null, ROUND(amount * temp_dishes.price, 2) FROM temp_sales
INNER JOIN temp_dishes ON temp_sales.itemId = temp_dishes.id;

INSERT INTO dish_in_order (dish_id, order_id, amount, remark)
SELECT itemId, id, amount, null FROM temp_sales;

-- Drop the temporary table
DROP TEMPORARY TABLE temp_users;
DROP TEMPORARY TABLE temp_dishes;
DROP TEMPORARY TABLE temp_sales;