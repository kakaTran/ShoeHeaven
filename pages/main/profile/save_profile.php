<?php
session_start();
include "../../../admincp/config/connect.php";


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['user_id'])) {
    
    $name = $_POST['name'] ?? '';
    $dob = $_POST['dob'] ?? '';
    $gender = $_POST['gender'] ?? '';
    $user_id = $_SESSION['user_id'];

    
    if (!empty($name) && !empty($dob) && !empty($gender)) {
        try {
            
            $sql = "UPDATE users SET fullname=?, date_of_birth=?, gender=? WHERE id=?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$name, $dob, $gender, $user_id]);

            
            if ($stmt->rowCount() > 0) {
                
                header("Location: profile.php");
                exit();
            } else {
                
                exit("No rows affected");
            }
        } catch (PDOException $e) {
            
            exit("Error: " . $e->getMessage());
        }
    } else {
        
        exit("Error: Incomplete data");
    }
} else {
    
    exit("Error: Invalid request");
}
?>
