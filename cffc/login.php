<?php
session_start();
$conn = new mysqli("localhost", "root", "recmaster", "CFFC");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user && password_verify($password, $user["password"])) {
        $_SESSION["admin"] = $user["username"];
        header("Location: admin.php");
        exit();
    } else {
        // Send back to main page with error
        header("Location: index.php?login=failed");
        exit();
    }
}
?>