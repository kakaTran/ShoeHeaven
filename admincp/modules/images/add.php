<h2 class="h2image">Add Image</h2>
<form method="POST" action="modules/images/processing.php" enctype="multipart/form-data">
    <label for="product_id">Product:</label>
    <select name="product_id">
        <?php
        $sql_products = "SELECT id, name FROM products";
        $result_products = mysqli_query($mysqli, $sql_products);
        while ($row = mysqli_fetch_assoc($result_products)) {
            echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
        }
        ?>
    </select><br>

    <label for="file">Image File</label>
    <input type="file" id="file" name="file" accept="image/*" required><br>
    <div id="imagePreview"></div>


    <label for="image_type">Image Type:</label>
    <input type="text" name="image_type"><br>

    <label for="display_order">Display Order:</label>
    <input type="number" name="display_order"><br>

    <button type="submit" name="addimage">Add Image</button>
</form>
<hr class="divider">
<script>
    // Lắng nghe sự kiện khi có sự thay đổi trong phần tử input file
    document.getElementById('file').addEventListener('change', function() {
        var file = this.files[0]; // Lấy tệp đã chọn

        // Kiểm tra xem tệp đã chọn có phải là hình ảnh hay không
        if (file && file.type.startsWith('image')) {
            var reader = new FileReader(); // Tạo một FileReader object

            // Xử lý sự kiện khi đọc tệp hoàn tất
            reader.onload = function(e) {
                var img = document.createElement('img'); // Tạo một phần tử <img>
                img.src = e.target.result; // Thiết lập src của ảnh bằng dữ liệu base64 đã đọc
                img.style.maxWidth = '200px'; // Thiết lập kích thước tối đa cho ảnh
                document.getElementById('imagePreview').innerHTML = ''; // Xóa bất kỳ hình ảnh trước đó nào
                document.getElementById('imagePreview').appendChild(img); // Thêm ảnh vào phần tử div với id là imagePreview
            };

            // Đọc tệp dưới dạng Data URL
            reader.readAsDataURL(file);
        }
    });
</script>
