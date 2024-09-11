<?php
session_start();
require 'inc/config.php';  // Include the database configuration

$message = '';  // Variable to store error messages

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query to check for user credentials and role
    $stmt = $conn->prepare("SELECT username, password, role FROM users WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if user exists and retrieve their role
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $_SESSION['username'] = $row['username'];
        $_SESSION['role'] = $row['role'];

        // Redirect based on the user's role
        if ($row['role'] == 'admin') {
            header('Location: admin.php');
        } elseif ($row['role'] == 'vendor') {
            header('Location: vendor.php');
        } elseif ($row['role'] == 'user') {
            header('Location: user.php');
        }
        exit();
    } else {
        $message = 'Invalid username or password!';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <form action="index.php" method="POST">
            <div class="input-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Login</button>
            <?php if ($message): ?>
                <p class="error"><?= $message ?></p>
            <?php endif; ?>
        </form>
    </div>
</body>
</html>
