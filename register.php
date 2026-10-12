<?php
include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST["name"];
    $username = $_POST["username"];
    $password = $_POST["password"];

    
    $password = password_hash($password, PASSWORD_DEFAULT);

    $sql = $conn->prepare(
        "INSERT INTO users (name, username, password)
         VALUES (?, ?, ?)"
    );

  
    $sql->bind_param("sss", $name, $username, $password);

    if ($sql->execute()) {
        header("Location: login.php");
        exit();
    } else {
        echo "Registration failed: ";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
</head>

<body>

<h2>Registration</h2>

<form method="POST">

    Name:
    <input type="text" name="name">
    <br><br>

    Username:
    <input type="text" name="username">
    <br><br>

    Password:
    <input type="password" name="password">
    <br><br>

    <input type="submit" value="Register">

</form>

</body>
</html>