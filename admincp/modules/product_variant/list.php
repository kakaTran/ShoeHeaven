<?php
$sql_list_product_variant = "SELECT pv.id, p.name AS product_name, s.name AS size_name, c.name AS color_name, pv.quantity, pv.price 
                             FROM product_variant AS pv
                             INNER JOIN products AS p ON pv.product_id = p.id
                             INNER JOIN size AS s ON pv.size_id = s.id
                             INNER JOIN color AS c ON pv.color_id = c.id
                             ORDER BY pv.id DESC";
$query_list_product_variant = mysqli_query($mysqli, $sql_list_product_variant);
?>
<p class="product_variant-heading">List Product Variants</p>
<table class="product_variant-table" style="width:80%" border="1" style=" border-collapse: collapse;">
  <tr>
    <th>ID</th>
    <th>Product</th>
    <th>Size</th>
    <th>Color</th>
    <th>Quantity</th>
    <th>Price</th>
    <th>Operation</th>
  </tr>
  <?php
  $i = 0;
  while ($row = mysqli_fetch_array($query_list_product_variant)) {
    $i++;
  ?>
    <tr>
      <td><?php echo $i ?></td>
      <td><?php echo $row['product_name'] ?></td>
      <td><?php echo $row['size_name'] ?></td>
      <td><?php echo $row['color_name'] ?></td>
      <td><?php echo $row['quantity'] ?></td>
      <td><?php echo $row['price'] ?></td>
      <td>
        <a class="product_variant-link" href="?action=product_variant&query=update&idproduct_variant=<?php echo $row['id'] ?>">Edit</a> | 
        <a class="product_variant-link" href="modules/product_variant/processing.php?idproduct_variant=<?php echo $row['id'] ?>">Delete</a>
      </td>
    </tr>
  <?php
  }
  ?>
</table>