
CREATE DATABASE IF NOT EXISTS easyrent;

USE easyrent;

CREATE TABLE IF NOT EXISTS orders (
    order_id VARCHAR(32) NOT NULL PRIMARY KEY,
    user_email VARCHAR(255) NOT NULL,
    rent_start_date DATE NOT NULL,
    rent_end_date DATE NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    status VARCHAR(50) NOT NULL
);


