<?php
$sql_update_product = "SELECT * FROM products WHERE id='$_GET[id]' LIMIT 1";
$query_update_product = mysqli_query($mysqli, $sql_update_product);
?>

<p>Update Product</p>
<table class="update-product-table">
  <form method="POST" action="modules/products/processing.php?id=<?php echo $_GET['id'] ?>">
    <?php
    while ($row = mysqli_fetch_array($query_update_product)) {
    ?>
      <thead>
        <tr>
          <th>Name</th>
          <th>Product Code</th>
          <th>Price</th>
          <th>Brand</th>
          <th>Description</th>
          <th>Category</th>
          <th>Quantity</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><input type="text" value="<?php echo $row['name'] ?>" name="name" placeholder="Enter product name" required></td>
          <td><input type="text" value="<?php echo $row['product-codes'] ?>" name="product-codes" placeholder="Enter product code" required></td>
          <td><input type="number" value="<?php echo $row['price'] ?>" name="price" placeholder="Enter product price" required></td>
          <td><input type="text" value="<?php echo $row['brand'] ?>" name="brand" placeholder="Enter product brand" required></td>
          <td><textarea name="description" placeholder="Enter product description"><?php echo $row['description'] ?></textarea></td>
          <td>
            <select name="category_id">
              <?php
              $sql_categories = "SELECT id, name FROM category";
              $result_categories = mysqli_query($mysqli, $sql_categories);
              while ($category = mysqli_fetch_assoc($result_categories)) {
                $selected = ($category['id'] == $row['category_id']) ? "selected" : "";
                echo "<option value='" . $category['id'] . "' $selected>" . $category['name'] . "</option>";
              }
              ?>
            </select>
          </td>
          <td><input type="number" value="<?php echo $row['quantity'] ?>" name="quantity" placeholder="Enter product quantity" required></td>
        </tr>
      </tbody>
      <tfoot>
        <tr>
          <td colspan="7"><button type="submit" name="updateproduct">Update Product</button></td>
        </tr>
      </tfoot>
    <?php
    }
    ?>
  </form>
</table>