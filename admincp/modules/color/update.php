<?php
    $sql_update_color = "SELECT * FROM color WHERE id='$_GET[idcolor]' LIMIT 1 ";
    $query_update_color = mysqli_query($mysqli,$sql_update_color);
?>
<p>Update Color</p>
<table class="update-color-table">
  <form method="POST" action="modules/color/processing.php?idcolor=<?php echo $_GET['idcolor']?>">
      <?php
      while ($dong = mysqli_fetch_array($query_update_color)){
      ?>
    <thead>
      <tr>
        <th>Name Color</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><input type="text" value="<?php echo $dong['name']?>" name="name" placeholder="Enter color name" required></td>
      </tr>
    </tbody>
    <tfoot>
      <tr>
        <td colspan="2"><button type="submit" name="updatecolor">Update Color</button></td>
      </tr>
    </tfoot>
    <?php
      }
    ?>
  </form>
</table>