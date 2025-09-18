<?php
// includes/db_sqlsrv.php
// Sample connection using SQL Server (requires Microsoft Drivers for PHP)
// This is a *sample* — your environment may need different options.
$serverName = 'DESKTOP-MQ7UI6T'; // change if needed
$database = 'malcolm_db';
// Using sqlsrv extension (procedural). For PDO, enable pdo_sqlsrv and adapt.
$connectionOptions = [
  "Database" => $database,
  // For Windows Authentication (Integrated), omit UID/PWD and configure appropriately.
  // "UID" => "sa",
  // "PWD" => "your_password"
];
$conn = sqlsrv_connect($serverName, $connectionOptions);
if (!$conn) {
  die("SQL Server connection failed. Install/enable sqlsrv driver and check credentials.");
}
?>