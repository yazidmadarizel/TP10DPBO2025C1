CREATE DATABASE restaurant;
USE restaurant;

CREATE TABLE menu_category (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    description VARCHAR(255)
);

CREATE TABLE menu_item (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    price DECIMAL(10,2) NOT NULL,
    category_id INT NOT NULL,
    is_available BOOLEAN DEFAULT TRUE,
    FOREIGN KEY (category_id) REFERENCES menu_category(id)
);

CREATE TABLE `order` (
    id INT AUTO_INCREMENT PRIMARY KEY,
    customer_name VARCHAR(100) NOT NULL,
    table_number INT NOT NULL,
    menu_item_id INT NOT NULL,
    quantity INT NOT NULL DEFAULT 1,
    order_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    status ENUM('pending', 'preparing', 'served', 'paid') DEFAULT 'pending',
    FOREIGN KEY (menu_item_id) REFERENCES menu_item(id)
);

-- Masukkan data awal
INSERT INTO menu_category (name, description) VALUES 
('Makanan Utama', 'Menu hidangan utama'),
('Minuman', 'Menu minuman segar');

INSERT INTO menu_item (name, description, price, category_id, is_available) VALUES
('Nasi Goreng Spesial', 'Nasi goreng dengan telur, ayam, dan sayuran', 25000, 1, true),
('Es Teh Manis', 'Teh manis dingin', 8000, 2, true),
('Mie Goreng', 'Mie goreng dengan telur dan sayuran', 22000, 1, true),
('Jus Alpukat', 'Jus alpukat segar dengan susu', 15000, 2, true);