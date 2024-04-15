<?php
include("../../config/connect.php");

$product_id = mysqli_real_escape_string($mysqli, $_POST['product_id']);
$file = $_FILES['file'] ['name'];
$file_tmp = $_FILES['file'] ['tmp_name'];
$file = time() .'.'. $file;

$image_type = mysqli_real_escape_string($mysqli, $_POST['image_type']);
$display_order = mysqli_real_escape_string($mysqli, $_POST['display_order']);


if (isset($_POST['addimage'])) {
    $sql_add = "INSERT INTO `images` (`product_id`, `file`, `image_type`, `display_order`) VALUES ('$product_id', '$file', '$image_type', '$display_order')";
    mysqli_query($mysqli, $sql_add);
    move_uploaded_file($file_tmp,'uploads/'. $file);
    header("Location:../../index.php?action=images&query=them");

} elseif (isset($_POST['updateimage'])) {
    move_uploaded_file($file_tmp,'uploads/'. $file);
    $sql = "SELECT * FROM `images` WHERE `id`= '$_GET[id]' LIMIT 1";
    $query = mysqli_query($mysqli, $sql);
    while ($row = mysqli_fetch_array($query)) {
        unlink('uploads/'. $row['file']);
    }
    $id = $_GET['id'];
   
    $sql_update = "UPDATE `images` SET `product_id`='$product_id', `file`='$file', `image_type`='$image_type', `display_order`='$display_order' WHERE `id`='$id'";
    mysqli_query($mysqli, $sql_update);
    header("Location:../../index.php?action=images&query=them");

} else {
    $id = $_GET['id'];
    $sql = "SELECT * FROM `images` WHERE `id`= '$id' LIMIT 1";
    $query = mysqli_query($mysqli, $sql);
    while ($row = mysqli_fetch_array($query)) {
        unlink('uploads/'. $row['file']);
    }
    $sql_delete = "DELETE FROM `images` WHERE `id`='$id'";
    mysqli_query($mysqli, $sql_delete);
    header("Location:../../index.php?action=images&query=them");
}
?>