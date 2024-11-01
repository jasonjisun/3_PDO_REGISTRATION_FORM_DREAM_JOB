<?php
// read.php - Retrieve all records
require 'db.php';

function getAllSoftwareEngineers($pdo) {
    $sql = "SELECT * FROM softwareengineers";
    $stmt = $pdo->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>