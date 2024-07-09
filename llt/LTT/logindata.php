<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sdb";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST["login"])) {
    $user = "";
    $password = "";

    if (!empty($_POST["user"])) {
        $user = mysqli_real_escape_string($conn, $_POST["user"]);
    } else {
        echo "Please enter a username.";
        exit();
    }

    if (!empty($_POST["pass1"])) {
        $password = mysqli_real_escape_string($conn, $_POST["pass1"]);
    } else {
        echo "Please enter a password.";
        exit();
    }

    $sql = "SELECT * FROM newsignup WHERE user = '$user'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        if ($password == $row["pass1"]) {
            $_SESSION["user"] = $user;
            echo "<script>alert('Login successfully!')</script>";
            echo "<script>window.location.href='index.html';</script>";
            exit;
            header("Location: index.html");
        } else {
            echo "Password is incorrect.";
        }
    } else {
        echo "User does not exist.";
    }
}

mysqli_close($conn);
?>