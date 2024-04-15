<?php
include("../../config/connect.php");
$sizename = $_POST['name'];

if(isset($_POST['addsize'])){
    $sql_them = "INSERT INTO `size` (`name`) VALUES ('".$sizename."')";
    mysqli_query($mysqli, $sql_them);
    header("Location:../../index.php?action=size&query=them");

}elseif(isset($_POST['updatesize'])){
    $sql_update = "UPDATE `size` SET `name`=? WHERE `id`=?";
    $stmt = mysqli_prepare($mysqli, $sql_update);
    mysqli_stmt_bind_param($stmt, "si", $sizename, $_GET['idsize']);
    mysqli_stmt_execute($stmt);
    header("Location:../../index.php?action=size&query=them");
}else{
    $id = $_GET['idsize'];

    $sql_delete = "DELETE FROM `size` WHERE `id`=?";
    $stmt = mysqli_prepare($mysqli, $sql_delete);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    header("Location:../../index.php?action=size&query=them");
}

?>