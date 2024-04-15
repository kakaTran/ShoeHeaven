<?php
    $sql_update_category = "SELECT * FROM category WHERE id='$_GET[idcategory]' LIMIT 1 ";
    $query_update_category = mysqli_query($mysqli,$sql_update_category);

?>
<p>Update Category</p>
  <table class="update-category-table">
    <form method="POST" action="modules/category/processing.php?idcategory=<?php echo $_GET['idcategory']?>">
        <?php
        while ($dong = mysqli_fetch_array($query_update_category)){
        ?>
      <thead>
        <tr>
          <th>Name Category</th>
          <th>Number Order (Optional)</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><input type="text" value="<?php echo $dong['name']?>" name="name" placeholder="Enter category name" required></td>
          <td><input type="number" value="<?php echo $dong['number-order']?>" name="number-order" placeholder="Order (e.g., 1, 2, 3)"></td>
        </tr>
      </tbody>
      <tfoot>
        <tr>
          <td colspan="2"><button type="submit" name="updatecategory">Update Category Product</button></td>
        </tr>
      </tfoot>
      <?php
        }
      ?>
    </form>
  </table>