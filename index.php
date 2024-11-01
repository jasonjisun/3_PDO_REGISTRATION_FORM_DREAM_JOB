<?php
// Include the database connection and CRUD functions
require 'db.php';
require 'create.php';
require 'update.php';
require 'delete.php';
require 'read.php'; // Include the read function

// Handle form submissions
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['create'])) {
        // Create new software engineer
        createSoftwareEngineer(
            $pdo, 
            $_POST['first_name'], 
            $_POST['last_name'], 
            $_POST['email'], 
            $_POST['phone_number'], 
            $_POST['specialization'], 
            $_POST['years_of_experience'], 
            $_POST['salary_expectation']
        );
    } elseif (isset($_POST['update'])) {
        // Update existing software engineer
        updateSoftwareEngineer(
            $pdo, 
            $_POST['id'], 
            $_POST['first_name'], 
            $_POST['last_name'], 
            $_POST['email'], 
            $_POST['phone_number'], 
            $_POST['specialization'], 
            $_POST['years_of_experience'], 
            $_POST['salary_expectation']
        );
    }
}

// Handle delete requests
if (isset($_GET['delete'])) {
    deleteSoftwareEngineer($pdo, $_GET['delete']);
}

// Fetch all software engineers
$engineers = getAllSoftwareEngineers($pdo);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Software Engineers CRUD</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        table, th, td { border: 1px solid #ccc; padding: 10px; text-align: left; }
        th { background-color: #f4f4f4; }
        form { margin-bottom: 20px; }
        .actions { text-align: center; }
    </style>
</head>
<body>

<h1>Software Engineers CRUD Application</h1>

<!-- Form to add or update a software engineer -->
<h2>Add / Update Software Engineer</h2>
<form method="POST" action="index.php">
    <input type="hidden" name="id" value="<?php echo isset($_GET['edit']) ? $_GET['edit'] : ''; ?>">
    <label for="first_name">First Name:</label>
    <input type="text" name="first_name" required><br>
    
    <label for="last_name">Last Name:</label>
    <input type="text" name="last_name" required><br>
    
    <label for="email">Email:</label>
    <input type="email" name="email" required><br>
    
    <label for="phone_number">Phone Number:</label>
    <input type="text" name="phone_number"><br>
    
    <label for="specialization">Specialization:</label>
    <input type="text" name="specialization"><br>
    
    <label for="years_of_experience">Years of Experience:</label>
    <input type="number" name="years_of_experience"><br>
    
    <label for="salary_expectation">Salary Expectation:</label>
    <input type="number" step="0.01" name="salary_expectation"><br><br>
    
    <button type="submit" name="create">Add Software Engineer</button>
    <?php if (isset($_GET['edit'])): ?>
        <button type="submit" name="update">Update Software Engineer</button>
    <?php endif; ?>
</form>

<!-- Display list of software engineers -->
<h2>Software Engineers List</h2>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Phone Number</th>
            <th>Specialization</th>
            <th>Experience</th>
            <th>Salary Expectation</th>
            <th class="actions">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($engineers as $engineer): ?>
            <tr>
                <td><?php echo htmlspecialchars($engineer['id']); ?></td>
                <td><?php echo htmlspecialchars($engineer['first_name']); ?></td>
                <td><?php echo htmlspecialchars($engineer['last_name']); ?></td>
                <td><?php echo htmlspecialchars($engineer['email']); ?></td>
                <td><?php echo htmlspecialchars($engineer['phone_number']); ?></td>
                <td><?php echo htmlspecialchars($engineer['specialization']); ?></td>
                <td><?php echo htmlspecialchars($engineer['years_of_experience']); ?> years</td>
                <td>$<?php echo htmlspecialchars($engineer['salary_expectation']); ?></td>
                <td class="actions">
                    <a href="index.php?edit=<?php echo $engineer['id']; ?>">Edit</a> |
                    <a href="index.php?delete=<?php echo $engineer['id']; ?>" onclick="return confirm('Are you sure you want to delete this record?');">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

</body>
</html>
