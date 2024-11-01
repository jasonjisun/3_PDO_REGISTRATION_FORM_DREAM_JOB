<?php
// update.php
require 'db.php';

function updateSoftwareEngineer($pdo, $id, $first_name, $last_name, $email, $phone_number, $specialization, $years_of_experience, $salary_expectation) {
    $sql = "UPDATE softwareengineers SET 
            first_name = :first_name, 
            last_name = :last_name, 
            email = :email, 
            phone_number = :phone_number, 
            specialization = :specialization, 
            years_of_experience = :years_of_experience, 
            salary_expectation = :salary_expectation
            WHERE id = :id";
    
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':first_name', $first_name);
    $stmt->bindParam(':last_name', $last_name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':phone_number', $phone_number);
    $stmt->bindParam(':specialization', $specialization);
    $stmt->bindParam(':years_of_experience', $years_of_experience);
    $stmt->bindParam(':salary_expectation', $salary_expectation);

    if ($stmt->execute()) {
        echo "Software engineer updated successfully!";
    } else {
        echo "Failed to update software engineer.";
    }
}

// Example usage:
updateSoftwareEngineer($pdo, 1, 'John', 'Smith', 'johnsmith@example.com', '0987654321', 'Frontend Development', 7, 90000.00);
?>
