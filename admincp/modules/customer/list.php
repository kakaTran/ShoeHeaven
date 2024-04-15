<?php

    $sql_list_categoty = "SELECT * FROM category ORDER BY 'number-oder' DESC";
    $query_list_category = mysqli_query($mysqli,$sql_list_categoty);

?>
<p class="category-heading">List Category</p>
<table class="category-table" style="width:80%" border="1" style=" border-collap: collapse;">
  <tr>
    <th>ID</th>
    <th>Name Category</th>
    <th>Operation</th>
  </tr>
  <?php
  $i=0;
  while($row = mysqli_fetch_array($query_list_category)) {
    $i++;
  ?>
  <tr>
    <td><?php echo $i ?></td>
    <td><?php echo $row['name']?></td>
    <td>
        <a class="category-link" href="?action=category&query=update&idcategory=<?php echo $row['id'] ?>">Edit</a> | 
        <a class="category-link" href="modules/category/processing.php?idcategory=<?php echo $row['id'] ?>">Delete</a>
    </td>
  </tr>
  <?php 
  }
  ?>
</table>