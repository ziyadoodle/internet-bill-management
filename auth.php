<?php
require 'functions.php';

if (isset($_POST['login'])) {
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password = $_POST['password'];

    $sql = "SELECT * FROM account WHERE username = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $user = mysqli_fetch_assoc($result);

    
    if ($user) {
       
        if (password_verify($password, $user["password"])) {
            // buat Session
            session_start();
            $_SESSION["username"] = $user["username"]; 
           
            header("Location: index.php");
            exit();
        } else {
            
            echo '<script>alert("Password atau username salah."); window.location.href="login.php";</script>';
        }
    } else {
       
        echo '<script>alert("Password atau username salah."); window.location.href="login.php";</script>';
    }
}
?>
