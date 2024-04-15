<?php
$product_id = $_GET['product_id'];

$sql_images = "SELECT * FROM images WHERE product_id = ? AND image_type = ?";
$stmt_images = mysqli_prepare($mysqli, $sql_images);
$type = "second";
mysqli_stmt_bind_param($stmt_images, "is", $product_id, $type);
mysqli_stmt_execute($stmt_images);
$result_images = mysqli_stmt_get_result($stmt_images);

// laasy hinfh chinh
$sql_images = "SELECT * FROM images WHERE product_id = ? AND image_type = ?";
$stmt_images = mysqli_prepare($mysqli, $sql_images);
$type = "main";
mysqli_stmt_bind_param($stmt_images, "is", $product_id, $type);
mysqli_stmt_execute($stmt_images);
$result_images_main = mysqli_stmt_get_result($stmt_images);
$mainImages = [];
if ($result_images_main && $result_images_main->num_rows > 0) {
    while ($row = mysqli_fetch_assoc($result_images_main)) {
        $mainImages = $row;
    }
}
// Bước 4: Lấy thông tin sản phẩm từ bảng products
$sql_product = "SELECT * FROM products WHERE id = ?";
$stmt_product = mysqli_prepare($mysqli, $sql_product);
mysqli_stmt_bind_param($stmt_product, "i", $product_id);
mysqli_stmt_execute($stmt_product);
$result_product = mysqli_stmt_get_result($stmt_product);
$row_product = mysqli_fetch_assoc($result_product);
$brand = $row_product['brand'];
$price = $row_product['price'];

// Truy vấn để lấy mô tả sản phẩm từ cột "description" của bảng "products"
$sql_description = "SELECT description FROM products WHERE id = ?";
$stmt_description = mysqli_prepare($mysqli, $sql_description);
mysqli_stmt_bind_param($stmt_description, "i", $product_id);
mysqli_stmt_execute($stmt_description);
$result_description = mysqli_stmt_get_result($stmt_description);
$row_description = mysqli_fetch_assoc($result_description);
$description = $row_description['description'];

// Bước 6: Lấy chi tiết sản phẩm từ bảng product_detail
$sql_detail = "SELECT attribute_name, attribute_value FROM product_detail WHERE product_id = ?";
$stmt_detail = mysqli_prepare($mysqli, $sql_detail);
mysqli_stmt_bind_param($stmt_detail, "i", $product_id);
mysqli_stmt_execute($stmt_detail);
$result_detail = mysqli_stmt_get_result($stmt_detail);

// lay size
$sql_sizes = "SELECT size.id, name FROM size JOIN `product_variant` ON product_variant.size_id = size.id WHERE product_id = '$product_id' GROUP BY size.id";
$result_sizes = mysqli_query($mysqli, $sql_sizes);

// lay color
$sql_colors = "SELECT color.id, name FROM color JOIN `product_variant` ON product_variant.color_id = color.id WHERE product_id = '$product_id' GROUP BY color.id";
$result_colors = mysqli_query($mysqli, $sql_colors);

// Bước 7: Hiển thị dữ liệu sản phẩm trên trang
?>
<div class="product-detail-container">
    <div class="product-images-detail">
        <?php
        if (empty($mainImages)) { ?>
            <img class="main-image" src="product-main-image.jpg" alt="Product Main Image">
            <?php
        } else {
            ?>
            <img class="main-image" src="admincp/modules/images/uploads/<?php echo $mainImages["file"] ?>"
                alt="Product Main Image">

        <?php }
        ?>

        <div class="thumbnail-container">
            <?php while ($row_image = mysqli_fetch_assoc($result_images)) { ?>
                <img class="thumbnail-image" src="admincp/modules/images/uploads/<?php echo $row_image['file']; ?>"
                    alt="Thumbnail Image">
            <?php } ?>
        </div>
    </div>
    <?php
    ?>
    <div class="product-info">
        <div class="brand-name">
            <h8 class="product-brand">Brand:
                <?php echo $brand; ?>
            </h8>
            <h3 class="product-title">
                <?php echo $row_product['name'] ?>
            </h3>
        </div>
        <hr>
        <input type="hidden" id="product" value="<?php echo $product_id ?>">
        <div class="product-price-detail">Price: <span id="price">$
                <?php echo $price; ?>
            </span></div>
        <div class="product-options-detail">
            <select class="variant form-select w-100" name="size" id="size">
                <option value="">Choose size</option>
                <?php
                while ($row = mysqli_fetch_assoc($result_sizes)) {
                    echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
                }
                ?>

            </select>
            <select class="variant form-select w-100" name="color" id="color">
                <option value="">Choose color</option>
                <?php
                while ($row = mysqli_fetch_assoc($result_colors)) {
                    echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
                }
                ?>
            </select>
            <input class="form-control w-100" type="number" name="quantity" value="1" min="1">
        </div>
        <div class="action-buttons-detail">
            <button style="display: none;" id="addToCart" onclick="addToCart()">Add to Cart</button>
            <button>Buy Now</button>
        </div>
        <hr>
        <div class="product-details">
            <h3 class="h2-detail">Product Details</h3>
            <?php while ($row_detail = mysqli_fetch_assoc($result_detail)) { ?>
                <p class='p-detail-01'><strong>
                        <?php echo $row_detail['attribute_name']; ?>:
                    </strong>
                    <?php echo $row_detail['attribute_value']; ?>
                </p>
            <?php } ?>
        </div>
    </div>
</div>
<div class="product-description">
    <h3 class="h2-detail">Product Description</h3>
    <p class='p-description'><?php echo $description; ?></p>
</div>
<hr>
<div class="customer-reviews">
    <h3 class="h2-detail">Customer Reviews</h3>
</div>

<script>
    function addToCart() {
        localStorage.setItem('productName', productName);
        localStorage.setItem('productPrice', productPrice);
        localStorage.setItem('productColor', productColor);
        localStorage.setItem('productSize', productSize);
        localStorage.setItem('productImage', productImage);
    }
</script>