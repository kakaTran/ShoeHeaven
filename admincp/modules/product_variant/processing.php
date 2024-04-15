<?php
include("../../config/connect.php");

if(isset($_POST['addproduct_variant'])){
    $product_id = $_POST['product_id'];
    $size_id = $_POST['size_id'];
    $color_id = $_POST['color_id'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];

    $sql_them = "INSERT INTO `product_variant` (`product_id`, `size_id`, `color_id`, `quantity`, `price`) 
                 VALUES ('$product_id', '$size_id', '$color_id', '$quantity', '$price')";
    mysqli_query($mysqli, $sql_them);
    header("Location:../../index.php?action=product_variant&query=them");

}elseif(isset($_POST['updateproduct_variant'])){
    $id = $_GET['idproduct_variant'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];

    $sql_update = "UPDATE `product_variant` SET `quantity`='$quantity', `price`='$price' WHERE `id`='$id'";
    mysqli_query($mysqli, $sql_update);
    header("Location:../../index.php?action=product_variant&query=them");

}else{
    $id = $_GET['idproduct_variant'];

    $sql_delete = "DELETE FROM `product_variant` WHERE `id`='$id'";
    mysqli_query($mysqli, $sql_delete);
    header("Location:../../index.php?action=product_variant&query=them");
}
?>