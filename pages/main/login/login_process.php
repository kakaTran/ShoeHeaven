<?php
session_start();
include "../../../admincp/config/connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT u.*, r.name AS role_name 
            FROM users u 
            INNER JOIN role r ON u.role_id = r.id 
            WHERE u.email='$email' AND u.password='$password'";
    $result = mysqli_query($mysqli, $sql);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['email'] = $email;
        if ($row['role_name'] == 'admin') {
            $_SESSION['success_message'] = "Login successful!";
            header("Location:../../../admincp/index.php");
            exit;
        } else {
            $_SESSION['success_message'] = "Login successful!";
            header("Location:../../../index.php");
            exit;
        }
    } else {
        $_SESSION['error_message'] = "Invalid email or password. Please try again.";
        header("Location:../../../index.php?manage=user");
        exit;
    }
}
$_SESSION['login_success'] = true;
?>
