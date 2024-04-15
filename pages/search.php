<?php
include "../admincp/config/connect.php"; // Kết nối đến cơ sở dữ liệu

if(isset($_POST['search'])) {
    $search = $_POST['search'];

    // Truy vấn tìm kiếm sản phẩm
    $sql_search_product = "SELECT * FROM products WHERE name LIKE '%$search%'";
    $result_search_product = mysqli_query($connection, $sql_search_product);

    // Hiển thị kết quả gợi ý
    if(mysqli_num_rows($result_search_product) > 0) {
        while($row = mysqli_fetch_assoc($result_search_product)) {
            echo "<div>" . $row['name'] . "</div>"; // Hiển thị tên sản phẩm
            // Hiển thị các thông tin khác của sản phẩm
        }
    } else {
        echo "<div>No results found</div>"; // Hiển thị thông báo nếu không có kết quả
    }
}
?>