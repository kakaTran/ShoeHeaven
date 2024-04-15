<?php
    $sql_list_color = "SELECT * FROM color ORDER BY id DESC";
    $query_list_color = mysqli_query($mysqli,$sql_list_color);
?>
<p class="color-heading">List Color</p>
<table class="color-table" style="width:80%" border="1" style=" border-collap: collapse;">
  <tr>
    <th>ID</th>
    <th>Name Color</th>
    <th>Operation</th>
  </tr>
  <?php
  $i=0;
  while($row = mysqli_fetch_array($query_list_color)) {
    $i++;
  ?>
  <tr>
    <td><?php echo $i ?></td>
    <td><?php echo $row['name']?></td>
    <td>
        <a class="color-link" href="?action=color&query=update&idcolor=<?php echo $row['id'] ?>">Edit</a> | 
        <a class="color-link" href="modules/color/processing.php?idcolor=<?php echo $row['id'] ?>">Delete</a>
    </td>
  </tr>
  <?php 
  }
  ?>
</table>