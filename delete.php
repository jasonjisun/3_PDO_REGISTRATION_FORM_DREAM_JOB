<?php
// delete.php
require 'db.php';

function deleteSoftwareEngineer($pdo, $id) {
    $sql = "DELETE FROM softwareengineers WHERE id = :id";
    
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id);

    if ($stmt->execute()) {
        echo "Software engineer deleted successfully!";
    } else {
        echo "Failed to delete software engineer.";
    }
}

// Example usage:
deleteSoftwareEngineer($pdo, 1);
?>
