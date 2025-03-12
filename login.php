<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include('db.php');
    
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['role'] = $row['role'];
            header("Location: index.php"); // Redirect to the homepage after login
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "User not found.";
    }
    
    $conn->close();
}
?>

<form method="POST">
    <label for="email">Email:</label>
    <input type="email" name="email" required><br>
    
    <label for="password">Password:</label>
    <input type="password" name="password" required><br>
    
    <button type="submit">Login</button>
</form>
