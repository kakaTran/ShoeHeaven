<?php
include "../../../admincp/config/connect.php";
$defaultRoleId = 1;
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phonenumber = $_POST['phonenumber'];
    $sql = "INSERT INTO `users` (`fullname`, `email`, `password`, `phonenumber`, `role_id`) 
    VALUES ('$fullname', '$email', '$password', '$phonenumber', $defaultRoleId)";
    var_dump($mysqli->query($sql));

    if ($mysqli->query($sql) === TRUE) {
        header("Location:../../../index.php?manage=user");
    } else {
        echo "Error: " . $sql . "<br>" . $mysqli->error;
    }
    $mysqli->close();
}
?>

