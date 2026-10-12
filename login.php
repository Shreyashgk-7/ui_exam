<?php
include "db.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST["username"];
    $pass = $_POST["password"];

    $sql = $conn->prepare(
        "SELECT password FROM users WHERE username = ?"
    );


    $sql->bind_param("s", $username);
    $sql->execute();

    $sql->bind_result($password);

    if ($sql->fetch()) {

        if (password_verify($pass, $password)) {

            $_SESSION["username"] = $username;

            header("Location: dashboard.php");
            exit();

        } else {
            echo "Invalid password.";
        }

    } else {
        echo "Username not found.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>

<body>

<h2>Login</h2>

<form method="POST">

    Username:
    <input type="text" name="username">
    <br><br>

    Password:
    <input type="password" name="password">
    <br><br>

    <input type="submit" value="Login">

</form>

</body>
</html>