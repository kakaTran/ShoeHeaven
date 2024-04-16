<?php
    $searchKeyword = ""; // Biến lưu từ khóa tìm kiếm, bạn có thể lấy từ form hoặc yêu cầu từ người dùng

    $sql = "SELECT p.id AS product_id, p.name AS product_name, p.price AS product_price, i.file AS image_file
            FROM products p
            INNER JOIN category c ON p.category_id = c.id
            INNER JOIN images i ON p.id = i.product_id
            WHERE i.image_type = 'main'";
    
    // Kiểm tra xem có sản phẩm nào được tìm thấy hay không
if (mysqli_num_rows($result) > 0) {
    // Hiển thị sản phẩm trên trang web
    echo "<h2> SEARCH RESULTS </h2>";
    echo "<div  class='product-row'>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<div class='product-item'>";
        echo "<a href='index.php?manage=detail&product_id=" . $row['product_id'] . "' class='product-link'>";
        // Lấy hình ảnh từ thư mục uploads trong thư mục images
        echo "<img src='admincp/modules/images/uploads/" . $row['image_file'] . "' alt='" . $row['product_name'] . "'>";
        echo "<h5>" . $row['product_name'] . "</h5>";
        // Các thông tin khác về sản phẩm
        echo "<p class='price'> $" . $row['product_price'] . "</p>";
        echo "<p id='sold'>Sold: 100</p>";
        echo "</div>";
    }
    echo "</div>";
} else {
    // Nếu không có sản phẩm nào được tìm thấy
    echo "Không có kết quả tìm kiếm phù hợp.";
}
    ?>