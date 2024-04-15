<?php
$id = $_GET['id'];

$sql_get_image = "SELECT * FROM images WHERE id='$id'";
$query_get_image = mysqli_query($mysqli, $sql_get_image);
$row = mysqli_fetch_assoc($query_get_image);
?>
<h2 class="h2image">Update Image</h2>

<form method="POST" action="modules/images/processing.php?id=<?php echo $id ?>" enctype="multipart/form-data">
    <label for="product_id">Product:</label>
    <select name="product_id">
        <?php
        $sql_products = "SELECT id, name FROM products";
        $result_products = mysqli_query($mysqli, $sql_products);
        while ($product = mysqli_fetch_assoc($result_products)) {
            $selected = ($product['id'] == $row['product_id']) ? "selected" : "";
            echo "<option value='" . $product['id'] . "' $selected>" . $product['name'] . "</option>";
        }
        ?>
    </select><br>
    <label for="file">Image File:</label>
    <input type="file" name="file">
    <?php if ($row['file']) { ?>
        <img src="modules/images/uploads/<?php echo $row['file'] ?>" width="150px" height="200px">
    <?php } ?><br>

    <label for="image_type">Image Type:</label>
    <input type="text" name="image_type" value="<?php echo $row['image_type'] ?>"><br>

    <label for="display_order">Display Order:</label>
    <input type="number" name="display_order" value="<?php echo $row['display_order'] ?>"><br>

    <button type="submit" name="updateimage">Update Image</button>
</form>

<hr class="divider">