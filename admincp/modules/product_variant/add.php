<h2 class="h2product_variant">Product Variant</h2>

<table class="add-product_variant-table">
  <form method="POST" action="modules/product_variant/processing.php">
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
        <td>
          <select name="product_id">
          <?php
            $sql_products = "SELECT id, name FROM products";
            $result_products = mysqli_query($mysqli, $sql_products);
            while ($row = mysqli_fetch_assoc($result_products)) {
            echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
            }
           ?>
          </select>
        </td>
        <td>
          <select name="size_id">
          <?php
              $sql_sizes = "SELECT id, name FROM size";
              $result_sizes = mysqli_query($mysqli, $sql_sizes);
              while ($row = mysqli_fetch_assoc($result_sizes)) {
                  echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
              }
            ?>
          </select>
        </td>
        <td>
          <select name="color_id">
          <?php
            $sql_colors = "SELECT id, name FROM color";
            $result_colors = mysqli_query($mysqli, $sql_colors);
            while ($row = mysqli_fetch_assoc($result_colors)) {
                echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
            }
          ?>
          </select>
        </td>
        <td><input type="number" name="quantity" placeholder="Enter quantity" required></td>
        <td><input type="number" name="price" placeholder="Enter price" required></td>
      </tr>
    </tbody>
    <tfoot>
      <tr>
        <td colspan="5"><button type="submit" name="addproduct_variant">Add Product Variant</button></td>
      </tr>
    </tfoot>
  </form>
</table>
<hr class="divider">
