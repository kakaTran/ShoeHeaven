<?php
include("../../config/connect.php");
$colorname = $_POST['name'];

if(isset($_POST['addcolor'])){
    $sql_them = "INSERT INTO `color` (`name`) VALUES ('".$colorname."')";
    mysqli_query($mysqli, $sql_them);
    header("Location:../../index.php?action=color&query=them");

}elseif(isset($_POST['updatecolor'])){
    $sql_update = "UPDATE `color` SET `name`=? WHERE `id`=?";
    $stmt = mysqli_prepare($mysqli, $sql_update);
    mysqli_stmt_bind_param($stmt, "si", $colorname, $_GET['idcolor']);
    mysqli_stmt_execute($stmt);
    header("Location:../../index.php?action=color&query=them");
}else{
    $id = $_GET['idcolor'];

    $sql_delete = "DELETE FROM `color` WHERE `id`=?";
    $stmt = mysqli_prepare($mysqli, $sql_delete);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    header("Location:../../index.php?action=color&query=them");
}

?>