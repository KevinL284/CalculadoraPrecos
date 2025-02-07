<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <form action="" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        <input type="submit" value="Login">
    </form>
</body>
</html>
<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Include the database connection file
        require_once '../../config/db_connection.php';

        try {
            // Prepare and execute the query
            $stmt = $pdo->prepare("SELECT password FROM users WHERE username = :username");
            $stmt->bindParam(':username', $username);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                $hashed_password = $row['password'];

                // Verify password
                if (password_verify($password, $hashed_password)) {
                    echo 'Login successful!';
                } else {
                    echo 'Invalid username or password.';
                }
            } else {
                echo 'Invalid username or password.';
            }
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    ?>