<h2 class="h2product">Product</h2>
<table class="add-product-table">
  <form method="POST" action="modules/products/processing.php">
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
        <td><input type="text" name="name" placeholder="Enter product name" required></td>
        <td><input type="text" name="product-code" placeholder="Enter product code" required></td>
        <td><input type="number" name="price" placeholder="Enter price" required></td>
        <td><input type="text" name="brand" placeholder="Enter brand"></td>
        <td><textarea name="description" placeholder="Enter description"></textarea></td>
        <td>
          <select name="category_id">
            <?php
            $sql_categories = "SELECT id, name FROM category";
            $result_categories = mysqli_query($mysqli, $sql_categories);
            while ($row = mysqli_fetch_assoc($result_categories)) {
              echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
            }
            ?>
          </select>
        </td>
        <td><input type="number" name="quantity" placeholder="Enter quantity" required></td>
      </tr>
    </tbody>
    <tfoot>
      <tr>
        <td colspan="7"><button type="submit" name="addproduct">Add Product</button></td>
      </tr>
    </tfoot>
  </form>
</table>
<hr class="divider">