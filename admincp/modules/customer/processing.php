<?php
include("../../config/connect.php");
$namecategory = $_POST['name'];
$numberorder = $_POST['number-order'];

if(isset($_POST['addcategory'])){
    $sql_them = "INSERT INTO `category` (`name`, `number-order`) VALUES ('".$namecategory."', '".$numberorder."')";
    mysqli_query($mysqli, $sql_them);
    header("Location:../../index.php?action=category&query=them");

}elseif(isset($_POST['updatecategory'])){

    $sql_update = "UPDATE `category` SET `name`=?, `number-order`=? WHERE `id`=?";
    $stmt = mysqli_prepare($mysqli, $sql_update);
    mysqli_stmt_bind_param($stmt, "ssi", $namecategory, $numberorder, $_GET['idcategory']);
    mysqli_stmt_execute($stmt);
    header("Location:../../index.php?action=category&query=them");
}else{
    $id = $_GET['idcategory'];

    $sql_delete = "DELETE FROM `category` WHERE `id`=?";
    $stmt = mysqli_prepare($mysqli, $sql_delete);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    header("Location:../../index.php?action=category&query=them");
}
?>  