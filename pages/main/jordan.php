<?php
// Truy vấn các sản phẩm của NIKE từ bảng products
$sql = "SELECT p.name AS product_name, p.price AS product_price, i.file AS image_file
FROM products p
INNER JOIN category c ON p.category_id = c.id
INNER JOIN images i ON p.id = i.product_id
WHERE c.name = 'JORDAN'";
$result = mysqli_query($mysqli, $sql);

// Kiểm tra xem có sản phẩm nào hay không
if (mysqli_num_rows($result) > 0) {
    // Hiển thị sản phẩm trên trang web
    echo "<h2>JORDAN</h2>";
    echo "<div class='product-row'>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<div class='product-item'>";
        // Lấy hình ảnh từ tệp hoặc URL của hình ảnh
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
