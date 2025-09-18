-- SQL Server schema (T-SQL) for Malcolm Lismore website
IF DB_ID('malcolm_db') IS NULL
BEGIN
  CREATE DATABASE malcolm_db;
END
GO
USE malcolm_db;
GO

CREATE TABLE admins (
  id INT IDENTITY(1,1) PRIMARY KEY,
  username NVARCHAR(50) NOT NULL UNIQUE,
  password_hash NVARCHAR(255) NOT NULL,
  email NVARCHAR(100),
  created_at DATETIME2 DEFAULT SYSUTCDATETIME()
);
CREATE TABLE categories (
  id INT IDENTITY(1,1) PRIMARY KEY,
  name NVARCHAR(100) NOT NULL UNIQUE,
  slug NVARCHAR(120) NOT NULL UNIQUE
);
CREATE TABLE photos (
  id INT IDENTITY(1,1) PRIMARY KEY,
  filename NVARCHAR(255) NOT NULL,
  thumbnail NVARCHAR(255) NOT NULL,
  title NVARCHAR(255),
  caption NVARCHAR(MAX),
  category_id INT NULL,
  taken_at DATE NULL,
  exif NVARCHAR(MAX) NULL,
  is_published BIT DEFAULT 1,
  uploaded_by INT NULL,
  uploaded_at DATETIME2 DEFAULT SYSUTCDATETIME()
);
CREATE TABLE enquiries (
  id INT IDENTITY(1,1) PRIMARY KEY,
  full_name NVARCHAR(150) NOT NULL,
  email NVARCHAR(255) NOT NULL,
  phone NVARCHAR(40),
  event_type NVARCHAR(100),
  event_date DATE NULL,
  location NVARCHAR(255),
  message NVARCHAR(MAX),
  attachment NVARCHAR(255) NULL,
  status NVARCHAR(20) DEFAULT 'new',
  created_at DATETIME2 DEFAULT SYSUTCDATETIME()
);
CREATE TABLE packages (
  id INT IDENTITY(1,1) PRIMARY KEY,
  name NVARCHAR(120) NOT NULL,
  price DECIMAL(10,2) NOT NULL,
  description NVARCHAR(MAX),
  duration_hours INT DEFAULT 0
);
GO
