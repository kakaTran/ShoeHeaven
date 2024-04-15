<?php

$sql_list_product = "SELECT p.*, c.name AS category_name 
                     FROM products p 
                     LEFT JOIN category c ON p.category_id = c.id 
                     ORDER BY p.id DESC";
$query_list_product = mysqli_query($mysqli, $sql_list_product);

?>
<p class="product-heading">List Products</p>
<table class="product-table" style="width:95%" border="1" style=" border-collapse: collapse;">
  <tr>
    <th>ID</th>
    <th>Name</th>
    <th>Product Code</th>
    <th>Price</th>
    <th>Brand</th>
    <th>Description</th>
    <th>Category</th>
    <th>Quantity</th>
    <th>Operation</th>
  </tr>
  <?php
  $i=0;
  while ($row = mysqli_fetch_array($query_list_product)) {
  $i++;
  ?>
    <tr>
      <td><?php echo $i ?></td>
      <td><?php echo $row['name'] ?></td>
      <td><?php echo $row['product-codes'] ?></td>
      <td><?php echo $row['price'] ?></td>
      <td><?php echo $row['brand'] ?></td>
      <td class="description-list"><?php echo $row['description'] ?></td>
      <td><?php echo $row['category_name'] ?></td> <!-- Hiển thị tên danh mục -->
      <td><?php echo $row['quantity'] ?></td>
      <td>
        <a class="product-link" href="?action=products&query=update&id=<?php echo $row['id'] ?>">Edit</a> |
        <a class="product-link" href="modules/products/processing.php?id=<?php echo $row['id'] ?>">Delete</a>
      </td>
    </tr>
  <?php
  }
  ?>
</table>