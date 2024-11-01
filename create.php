<?php
// create.php - Insert operation
require 'db.php';

function createSoftwareEngineer($pdo, $first_name, $last_name, $email, $phone_number, $specialization, $years_of_experience, $salary_expectation) {
    $sql = "INSERT INTO softwareengineers (first_name, last_name, email, phone_number, specialization, years_of_experience, salary_expectation) 
            VALUES (:first_name, :last_name, :email, :phone_number, :specialization, :years_of_experience, :salary_expectation)";
    
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':first_name', $first_name);
    $stmt->bindParam(':last_name', $last_name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':phone_number', $phone_number);
    $stmt->bindParam(':specialization', $specialization);
    $stmt->bindParam(':years_of_experience', $years_of_experience);
    $stmt->bindParam(':salary_expectation', $salary_expectation);
    
    if ($stmt->execute()) {
        echo "New software engineer added successfully!";
    } else {
        echo "Failed to add software engineer.";
    }
}
?>
