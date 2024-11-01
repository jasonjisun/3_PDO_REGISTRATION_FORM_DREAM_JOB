<?php
// db.php - Database connection file

$host = 'localhost';
$dbname = 'crud_operation';  // Change to your database name
$username = 'root';           // Default username for XAMPP
$password = '';               // Default password for XAMPP is empty

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>
