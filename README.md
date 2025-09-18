Malcolm Lismore — Responsive Photographer Website
================================================

What's included
- PHP + HTML frontend and backend (basic, clear structure)
- MySQL schema (db_schema.sql) for XAMPP / phpMyAdmin
- Optional SQL Server T-SQL schema (mssql_schema.sql) and sample connection notes
- Modern responsive CSS (css/style.css) and light JS (js/)
- Admin area with login, CRUD for photos, and enquiries viewer
- Thumbnail generation using GD (PHP)

Quick setup (XAMPP - MySQL) — Recommended for local dev
1. Install XAMPP (Apache + PHP + MySQL).
2. Copy the `malcolm_site` folder into XAMPP's htdocs (e.g. C:\xampp\htdocs\malcolm_site).
3. Start Apache and MySQL from XAMPP control panel.
4. Import `db_schema.sql` using phpMyAdmin (http://localhost/phpmyadmin) — create database `malcolm_db` then import.
5. Edit `includes/db_mysql.php` if your MySQL username/password differs (default uses root with empty password).
6. Make sure `uploads/` and `uploads/thumbs/` are writable by the webserver.
7. Open http://localhost/malcolm_site in your browser.

Optional: Use SQL Server (SSMS)
- If you want to connect PHP to Microsoft SQL Server (server name: DESKTOP-MQ7UI6T using Windows Authentication) you must:
  1. Install Microsoft Drivers for PHP for SQL Server (pdo_sqlsrv / sqlsrv) matching your PHP version.
  2. Enable the extension in php.ini and restart Apache.
  3. Create the database and import `mssql_schema.sql` using SQL Server Management Studio.
  4. Use the provided sample connection `includes/db_sqlsrv.php` (you may need to adapt for Integrated Security).

Notes on security and production:
- This is a development template; for production: use HTTPS, set proper file permissions, use strong admin passwords, use PHPMailer or SMTP for emails, and harden uploads/check EXIF privacy.

Files to review:
- index.php, about.php, gallery.php, photo.php, enquiry.php
- admin/ (login, dashboard, photos CRUD, enquiries)
- includes/ (db_mysql.php, header.php, footer.php)
- css/style.css, js/enquiry.js, js/lightbox.js
- db_schema.sql (MySQL), mssql_schema.sql (SQL Server)

