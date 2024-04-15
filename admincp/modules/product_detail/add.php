<h2 class="h2product_detail">Product Detail</h2>

<table class="add-product_detail-table">
  <form method="POST" action="modules/product_detail/processing.php">
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
        <td><input type="text" name="attribute_name" placeholder="Enter attribute name" required></td>
        <td><input type="text" name="attribute_value" placeholder="Enter attribute value" required></td>
        <td><input type="number" name="display_order" placeholder="Enter display order" required></td>
      </tr>
    </tbody>
    <tfoot>
      <tr>
        <td colspan="4"><button type="submit" name="addproduct_detail">Add Product Detail</button></td>
      </tr>
    </tfoot>
  </form>
</table>
<hr class="divider">

