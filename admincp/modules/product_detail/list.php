<?php
$sql_list_product_detail = "SELECT pd.id, p.name AS product_name, pd.attribute_name, pd.attribute_value, pd.display_order
                            FROM product_detail AS pd
                            INNER JOIN products AS p ON pd.product_id = p.id
                            ORDER BY pd.id DESC";
$query_list_product_detail = mysqli_query($mysqli, $sql_list_product_detail);
?>
<p class="product_detail-heading">List Product Details</p>
<table class="product_detail-table" style="width:80%" border="1" style=" border-collapse: collapse;">
  <tr>
    <th>ID</th>
    <th>Product</th>
    <th>Attribute Name</th>
    <th>Attribute Value</th>
    <th>Display Order</th>
    <th>Operation</th>
  </tr>
  <?php
  $i = 0;
  while ($row = mysqli_fetch_array($query_list_product_detail)) {
    $i++;
  ?>
    <tr>
      <td><?php echo $i ?></td>
      <td><?php echo $row['product_name'] ?></td>
      <td><?php echo $row['attribute_name'] ?></td>
      <td><?php echo $row['attribute_value'] ?></td>
      <td><?php echo $row['display_order'] ?></td>
      <td>
        <a class="product_detail-link" href="?action=product_detail&query=update&idproduct_detail=<?php echo $row['id'] ?>">Edit</a> | 
        <a class="product_detail-link" href="modules/product_detail/processing.php?idproduct_detail=<?php echo $row['id'] ?>">Delete</a>
      </td>
    </tr>
  <?php
  }
  ?>
</table>