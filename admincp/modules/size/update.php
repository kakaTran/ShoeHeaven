<?php
    $sql_update_size = "SELECT * FROM size WHERE id='$_GET[idsize]' LIMIT 1 ";
    $query_update_size = mysqli_query($mysqli,$sql_update_size);
?>
<p>Update Size</p>
<table class="update-size-table">
  <form method="POST" action="modules/size/processing.php?idsize=<?php echo $_GET['idsize']?>">
      <?php
      while ($dong = mysqli_fetch_array($query_update_size)){
      ?>
    <thead>
      <tr>
        <th>Name Size</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><input type="text" value="<?php echo $dong['name']?>" name="name" placeholder="Enter size name" required></td>
      </tr>
    </tbody>
    <tfoot>
      <tr>
        <td colspan="2"><button type="submit" name="updatesize">Update Size</button></td>
      </tr>
    </tfoot>
    <?php
      }
    ?>
  </form>
</table>