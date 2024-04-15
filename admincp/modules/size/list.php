<?php
    $sql_list_size = "SELECT * FROM size ORDER BY id DESC";
    $query_list_size = mysqli_query($mysqli,$sql_list_size);
?>
<p class="size-heading">List Size</p>
<table class="size-table" style="width:80%" border="1" style=" border-collap: collapse;">
  <tr>
    <th>ID</th>
    <th>Name Size</th>
    <th>Operation</th>
  </tr>
  <?php
  $i=0;
  while($row = mysqli_fetch_array($query_list_size)) {
    $i++;
  ?>
  <tr>
    <td><?php echo $i ?></td>
    <td><?php echo $row['name']?></td>
    <td>
        <a class="size-link" href="?action=size&query=update&idsize=<?php echo $row['id'] ?>">Edit</a> | 
        <a class="size-link" href="modules/size/processing.php?idsize=<?php echo $row['id'] ?>">Delete</a>
    </td>
  </tr>
  <?php 
  }
  ?>
</table>