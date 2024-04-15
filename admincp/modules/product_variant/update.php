<?php
$id = $_GET['idproduct_variant'];
$sql_update_product_variant = "SELECT pv.id, p.name AS product_name, s.name AS size_name, c.name AS color_name, pv.quantity, pv.price 
                                FROM product_variant AS pv
                                INNER JOIN products AS p ON pv.product_id = p.id
                                INNER JOIN size AS s ON pv.size_id = s.id
                                INNER JOIN color AS c ON pv.color_id = c.id
                                WHERE pv.id='$id' LIMIT 1 ";
$query_update_product_variant = mysqli_query($mysqli, $sql_update_product_variant);
?>
<p>Update Product Variant</p>
<table class="update-product_variant-table">
  <form method="POST" action="modules/product_variant/processing.php?idproduct_variant=<?php echo $id ?>">
    <?php
    while ($row = mysqli_fetch_array($query_update_product_variant)){
    ?>
      <thead>
        <tr>
          <th>Product</th>
          <th>Size</th>
          <th>Color</th>
          <th>Quantity</th>
          <th>Price</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><?php echo $row['product_name']?></td>
          <td><?php echo $row['size_name']?></td>
          <td><?php echo $row['color_name']?></td>
          <td><input type="number" value="<?php echo $row['quantity']?>" name="quantity" placeholder="Enter quantity" required></td>
          <td><input type="number" value="<?php echo $row['price']?>" name="price" placeholder="Enter price" required></td>
        </tr>
      </tbody>
      <tfoot>
        <tr>
          <td colspan="5"><button type="submit" name="updateproduct_variant">Update Product Variant</button></td>
        </tr>
      </tfoot>
    <?php
    }
    ?>
  </form>
</table>