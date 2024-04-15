<?php
include("../../config/connect.php");

if(isset($_POST['addproduct_detail'])){
    $product_id = $_POST['product_id'];
    $attribute_name = $_POST['attribute_name'];
    $attribute_value = $_POST['attribute_value'];
    $display_order = $_POST['display_order'];

    $sql_them = "INSERT INTO `product_detail` (`product_id`, `attribute_name`, `attribute_value`, `display_order`) 
                 VALUES ('$product_id', '$attribute_name', '$attribute_value', '$display_order')";
    mysqli_query($mysqli, $sql_them);
    header("Location:../../index.php?action=product_detail&query=them");

}elseif(isset($_POST['updateproduct_detail'])){
    $id = $_GET['idproduct_detail'];
    $attribute_name = $_POST['attribute_name'];
    $attribute_value = $_POST['attribute_value'];
    $display_order = $_POST['display_order'];

    $sql_update = "UPDATE `product_detail` SET `attribute_name`='$attribute_name', `attribute_value`='$attribute_value', `display_order`='$display_order' WHERE `id`='$id'";
    mysqli_query($mysqli, $sql_update);
    header("Location:../../index.php?action=product_detail&query=them");

}else{
    $id = $_GET['idproduct_detail'];

    $sql_delete = "DELETE FROM `product_detail` WHERE `id`='$id'";
    mysqli_query($mysqli, $sql_delete);
    header("Location:../../index.php?action=product_detail&query=them");
}
?>
