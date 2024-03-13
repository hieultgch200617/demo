<link rel="stylesheet" type="text/css" href="register.css">

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firtname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    echo "Firstname: $firtname <br>";
    echo "Lastname: $lastname <br>";
    echo "Username: $username <br>";
    echo "Email: $email <br>";
    echo "Password: $password <br>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
</head>
<body>

    <form action="register.php" method="POST">
        <h2>Register</h2>
        <label for="firstname">Firstname:</label><br>
        <input type="text" id="firstname" name="firstname" required><br>

        <label for="lastname">Lastname:</label><br>
        <input type="text" id="lastname" name="lastname" required><br>

        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required><br>
        
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br>
        
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br>
        
        <input type="submit" value="Register">
        <p>Login <a href="login.php">now</a>.</p>
    </form>
</body>
</html>
