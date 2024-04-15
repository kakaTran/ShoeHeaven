<?php
$sql_list_images = "SELECT * FROM images ORDER BY id DESC";
$query_list_images = mysqli_query($mysqli, $sql_list_images);
?>
<p class="image-heading">List Images</p>
<table class="image-table" style="width:80%" border="1" style=" border-collapse: collapse;">
    <tr>
        <th>ID</th>
        <th>Product ID</th>
        <th>Image File</th>
        <th>Image Type</th>
        <th>Display Order</th>
        <th>Operation</th>
    </tr>
    <?php
    $i = 0;
    while ($row = mysqli_fetch_array($query_list_images)) {
        $i++;
    ?>
        <tr>
            <td><?php echo $i ?></td>
            <td><?php echo $row['product_id'] ?></td>
            <td><img src="modules/images/uploads/<?php echo $row['file'] ?>" width="150px" height="200px"></td>
            <td><?php echo $row['image_type'] ?></td>
            <td><?php echo $row['display_order'] ?></td>
            <td>
                <a class="image-link" href="?action=images&query=update&id=<?php echo $row['id'] ?>">Edit</a> |
                <a class="image-link" href="modules/images/processing.php?id=<?php echo $row['id'] ?>">Delete</a>
            </td>
        </tr>
    <?php
    }
    ?>
</table>