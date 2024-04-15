<?php
include ("../../config/connect.php");
$name = mysqli_real_escape_string($mysqli, $_POST['name']);
$product_code = mysqli_real_escape_string($mysqli, $_POST['product-codes']);
$price = mysqli_real_escape_string($mysqli, $_POST['price']);
$brand = mysqli_real_escape_string($mysqli, $_POST['brand']);
$description = mysqli_real_escape_string($mysqli, $_POST['description']);
$category_id = mysqli_real_escape_string($mysqli, $_POST['category_id']);
$quantity = mysqli_real_escape_string($mysqli, $_POST['quantity']);

if (isset($_POST['addproduct'])) {
  $sql_add = "INSERT INTO `products` 
  (`name`, `product-codes`, `price`, `brand`, `description`, `category_id`, `quantity`) 
  VALUES ('$name', '$product_code', '$price', '$brand', '$description', '$category_id', '$quantity')";
  
  mysqli_query($mysqli, $sql_add);
  header("Location:../../index.php?action=products&query=them");
} elseif (isset($_POST['updateproduct'])) {
  $sql_update = "UPDATE `products` SET `name`='$name', `product-codes`='$product_code', `price`='$price', 
  `brand`='$brand', `description`='$description', `category_id`='$category_id', `quantity`='$quantity' 
  WHERE `id`='$_GET[id]'";

  mysqli_query($mysqli, $sql_update);
  header("Location:../../index.php?action=products&query=them");
} else {
  $id = $_POST['id'];
  $sql_delete = "DELETE FROM `products` WHERE `id`='$id'";
  mysqli_query($mysqli, $sql_delete);
  header("Location:../../index.php?action=products&query=them");
}
?>