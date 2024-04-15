<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/cbaf2427ea.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Home</title>
</head>
<body>
    <div class="slideshow">
        <div class="slides">
            <img src="images/slide01.png" alt="Slide Show 01">
            <img src="images/slide02.png" alt="Slide Show 02">
            <img src="images/slide03.png" alt="Slide Show 03">
            <img src="images/slide04.png" alt="Slide Show 04">
        </div>
    </div>
    <?php
    // Truy vấn toàn bộ sản phẩm từ bảng products
    $sql = "SELECT p.id AS product_id, p.name AS product_name, p.price AS product_price, i.file AS image_file
    FROM products p
    INNER JOIN category c ON p.category_id = c.id
    INNER JOIN images i ON p.id = i.product_id
    WHERE i.image_type = 'main'";
    $result = mysqli_query($mysqli, $sql);

    // Kiểm tra xem có sản phẩm nào hay không
    if (mysqli_num_rows($result) > 0) {
        // Hiển thị sản phẩm trên trang web
        echo "<h2> ALL PRODUCT </h2>";
        echo "<div  class='product-row'>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<div class='product-item'>";
            echo "<a href='index.php?manage=detail&product_id=" . $row['product_id'] . "' class='product-link'>";
            // Lấy hình ảnh từ thư mục uploads trong thư mục images
            echo "<img src='admincp/modules/images/uploads/" . $row['image_file'] . "' alt='" . $row['product_name'] . "'>";
            echo "<h5>" . $row['product_name'] . "</h5>";
            echo "<div class='rating'>
                    <i class='fa-solid fa-star'></i>
                    <i class='fa-solid fa-star'></i>
                    <i class='fa-solid fa-star'></i>
                    <i class='fa-solid fa-star'></i>
                    <i class='fa-solid fa-star-half'></i>
                    <span class='rating-count'>(10)</span>
                </div>";
            echo "<p class='price'> $" . $row['product_price'] . "</p>";
            echo "<p id='sold'>Sold: 100</p>";
            // Có thể thêm các thông tin khác như số lượng đã bán, mô tả, v.v.
            echo "</div>";
        }
        echo "</div>";
    } else {
        // Nếu không có sản phẩm nào
        echo "Không có sản phẩm nào được tìm thấy.";
    }

    // Đóng kết nối
    mysqli_close($mysqli);
    ?>
    <?php
    include ("./pages/category.php");
    ?>
    </div>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</body>
<script src="js/script.js"></script>

</html>