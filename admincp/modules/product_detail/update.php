<?php
$id = $_GET['idproduct_detail'];
$sql_update_product_detail = "SELECT pd.id, p.name AS product_name, pd.attribute_name, pd.attribute_value, pd.display_order
                              FROM product_detail AS pd
                              INNER JOIN products AS p ON pd.product_id = p.id
                              WHERE pd.id='$id' LIMIT 1 ";
$query_update_product_detail = mysqli_query($mysqli, $sql_update_product_detail);
?>
<p>Update Product Detail</p>
<table class="update-product_detail-table">
  <form method="POST" action="modules/product_detail/processing.php?idproduct_detail=<?php echo $id ?>">
    <?php
    while ($row = mysqli_fetch_array($query_update_product_detail)){
    ?>
      <thead>
        <tr>
          <th>Product</th>
          <th>Attribute Name</th>
          <th>Attribute Value</th>
          <th>Display Order</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><?php echo $row['product_name']?></td>
          <td><input type="text" value="<?php echo $row['attribute_name']?>" name="attribute_name" placeholder="Enter attribute name" required></td>
          <td><input type="text" value="<?php echo $row['attribute_value']?>" name="attribute_value" placeholder="Enter attribute value" required></td>
          <td><input type="number" value="<?php echo $row['display_order']?>" name="display_order" placeholder="Enter display order" required></td>
        </tr>
      </tbody>
      <tfoot>
        <tr>
          <td colspan="4"><button type="submit" name="updateproduct_detail">Update Product Detail</button></td>
        </tr>
      </tfoot>
    <?php
    }
    ?>
  </form>
</table>
