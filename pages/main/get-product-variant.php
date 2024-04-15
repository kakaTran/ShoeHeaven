<?php
include("../../admincp/config/connect.php");
if(isset($_GET['color']) && isset( $_GET['size']) && isset( $_GET['product'] ))
{
$size = $_GET['size'];
$color = $_GET['color'];
$product = $_GET['product'];
$sql = "SELECT * FROM `product_variant` WHERE `size_id` = '$size' AND `color_id`='$color' AND `product_id`='$product'";
$result = $mysqli->query($sql);
if($result && $result->num_rows>0){    
    while($row = $result->fetch_assoc()){   
        $product = $row;
    }
    echo json_encode($product);
}
}