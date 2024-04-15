<h2 class="h2category">Category</h2>

  <table class="add-category-table">
    <form method="POST" action="modules/category/processing.php">
      <thead>
        <tr>
          <th>Name Category</th>
          <th>Number Order (Optional)</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><input type="text" name="name" placeholder="Enter category name" required></td>
          <td><input type="number" name="number-order" placeholder="Order (e.g., 1, 2, 3)"></td>
        </tr>
      </tbody>
      <tfoot>
        <tr>
          <td colspan="2"><button type="submit" name="addcategory">Add Category Product</button></td>
        </tr>
      </tfoot>
    </form>
  </table>
  <hr class="divider">

