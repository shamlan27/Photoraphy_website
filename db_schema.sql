-- MySQL schema for Malcolm Lismore website
CREATE DATABASE IF NOT EXISTS malcolm_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE malcolm_db;

CREATE TABLE admins (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50) NOT NULL UNIQUE,
  password_hash VARCHAR(255) NOT NULL,
  email VARCHAR(100),
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE categories (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL UNIQUE,
  slug VARCHAR(120) NOT NULL UNIQUE
);

CREATE TABLE photos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  filename VARCHAR(255) NOT NULL,
  thumbnail VARCHAR(255) NOT NULL,
  title VARCHAR(255),
  caption TEXT,
  category_id INT,
  taken_at DATE,
  exif JSON NULL,
  is_published TINYINT(1) DEFAULT 1,
  uploaded_by INT,
  uploaded_at DATETIME DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE SET NULL,
  FOREIGN KEY (uploaded_by) REFERENCES admins(id) ON DELETE SET NULL
);

CREATE TABLE enquiries (
  id INT AUTO_INCREMENT PRIMARY KEY,
  full_name VARCHAR(150) NOT NULL,
  email VARCHAR(255) NOT NULL,
  phone VARCHAR(40),
  event_type VARCHAR(100),
  event_date DATE NULL,
  location VARCHAR(255),
  message TEXT,
  attachment VARCHAR(255) NULL,
  status ENUM('new','contacted','closed') DEFAULT 'new',
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE packages (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(120) NOT NULL,
  price DECIMAL(10,2) NOT NULL,
  description TEXT,
  duration_hours INT DEFAULT 0
);

-- Insert sample admin (password: ChangeMe123!)
INSERT INTO admins (username, password_hash, email)
VALUES ('admin', '$2y$10$eImiTXuWVxfM37uY4JANj.QZQ2e', 'malcolm@example.com'); -- replace hash with password_hash('ChangeMe123!', PASSWORD_DEFAULT)

-- Sample categories
INSERT INTO categories (name, slug) VALUES ('Landscapes','landscapes'),('Wildlife','wildlife'),('Weddings','weddings');

-- Sample packages
INSERT INTO packages (name, price, description, duration_hours) VALUES
('Basic Wedding', 450.00, 'Ceremony + 1 hour photography', 3),
('Deluxe Wedding', 1200.00, 'Full day coverage + album', 10);
