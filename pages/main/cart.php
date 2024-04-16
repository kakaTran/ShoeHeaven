<?php include "cart-function.php" ?>
<?php
$products = getCartItems();
?>

<div class="shoppingcart">
  <div class="headercart">
    <h1 class="namecart">Shopping Cart</h1>
  </div>
  <div class="productcart">
    <section class="cart">
      <table>
        <thead>
          <tr>
            <th> </th>
            <th>Product</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Total</th>
          </tr>
        </thead>
        <tbody>
          <?php
          if (count($products) > 0) {
            foreach ($products as $product) {
              ?>
              <tr>
                <td>
                  <input type="checkbox" class="product-checkbox" onchange="updateTotalPrice(this)">
                </td>
                <td>
                  <div class="product-info-cart">
                    <img src="admincp/modules/images/uploads/<?php echo $product['product_image']; ?>"
                      alt="<?php echo $product['product_name']; ?>">
                    <p><?php echo $product['product_name']; ?> for
                      <?php echo isset($product['gender']) ? $product['gender'] : 'Unisex'; ?>/<?php echo $product['size_name']; ?>/<?php echo $product['color_name']; ?>
                    </p>
                  </div>
                </td>
                <td>$<?php echo $product['product_price']; ?></td>
                <td>
                  <input type="number"
                    value="<?php echo isset($_SESSION['carts'][$product['variant_id']]['quantity']) ? $_SESSION['carts'][$product['variant_id']]['quantity'] : 1; ?>"
                    min="1" onchange="updateTotal(this)">
                </td>
                <td id="total_<?php echo $product['variant_id']; ?>">
                  $<?php echo isset($_SESSION['carts'][$product['variant_id']]['quantity']) ? $_SESSION['carts'][$product['variant_id']]['quantity'] * $product['product_price'] : $product['product_price']; ?>
                </td>
                <td>
                  <button class="delete-product-button" onclick="deleteProduct(this)">Delete</button>
                </td>
              </tr>
              <?php
            }
          } else {
            echo "<tr><td colspan='5'>Không có sản phẩm nào.</td></tr>";
          }
          ?>

        </tbody>
      </table>
      <span class="total-price">Total price: $ </span>
    </section>
  </div>
  <div class="cart-buttons">
    <a href="index.php?manage=continue-shopping" class="btn btn-primary">Continue Shopping</a>
    <a href="index.php?manage=payment" class="btn btn-success">Process to Checkout</a>
  </div>
</div>
<script>
  function updateTotal(quantityInput) {
    const priceCell = quantityInput.parentElement.previousElementSibling;
    const price = parseFloat(priceCell.textContent.substring(1)); // Remove '$'
    const quantity = quantityInput.value;
    const totalPrice = price * quantity;
    const totalCell = quantityInput.parentElement.nextElementSibling;
    totalCell.textContent = `$${totalPrice.toFixed(2)}`; // Format to 2 decimal places
    calculateTotalPrice(); // Update total price when quantity changes
}

  function calculateTotalPrice() {
    let total = 0;
    const totalCells = document.querySelectorAll('.productcart tbody tr');

    totalCells.forEach(row => {
      const checkbox = row.querySelector('.product-checkbox');
      const totalPriceCell = row.querySelector('td#total_<?php echo $product['variant_id']; ?>');
      const totalPriceText = totalPriceCell.textContent.trim().substring(1);
      const totalPrice = parseFloat(totalPriceText);

      if (checkbox.checked) {
        total += totalPrice;
      }
    });

    const totalPriceElement = document.querySelector('.total-price');
    totalPriceElement.textContent = `Total price: $${total.toFixed(2)}`;
  }

  // Call calculateTotalPrice() when the page loads to initially display the correct total price
  calculateTotalPrice();

  // Call updateTotal() when the quantity of a product changes
  document.querySelectorAll('.productcart tbody tr input[type="number"]').forEach(input => {
    input.addEventListener('change', function () {
      updateTotal(this); // Update price for the changed product
    });
  });

  // Call calculateTotalPrice() when a product checkbox is changed
  document.querySelectorAll('.productcart tbody tr input[type="checkbox"]').forEach(checkbox => {
    checkbox.addEventListener('change', function () {
      calculateTotalPrice(); // Recalculate total price when a product is checked/unchecked
    });
  });
  function updateTotal(quantityInput) {
    // Code cập nhật giá trị sản phẩm khi số lượng thay đổi
}

function deleteProduct(button) {
    const row = button.closest('tr'); // Lấy dòng (row) chứa nút "Delete" được click
    const checkbox = row.querySelector('.product-checkbox');

    // Lấy giá trị của ô tổng tiền hiện tại
    let currentTotalPriceElement = document.querySelector('.total-price');
    let currentTotalPriceText = currentTotalPriceElement.textContent.trim();
    let currentTotalPrice = parseFloat(currentTotalPriceText.substring(currentTotalPriceText.indexOf('$') + 1));

    if (checkbox.checked) {
        // Nếu checkbox được chọn, thực hiện xóa sản phẩm
        const totalPriceCell = row.querySelector('td:last-child'); // Lấy cell cuối cùng trong hàng
        const totalPriceText = totalPriceCell.textContent.trim().substring(1);
        const totalPrice = parseFloat(totalPriceText);

        currentTotalPrice -= totalPrice; // Trừ giá tiền của sản phẩm khỏi tổng tiền hiện tại
    }

    // Xóa dòng sản phẩm khỏi DOM
    row.remove();

    // Kiểm tra nếu không có sản phẩm nào được chọn (checked), reset tổng tiền về 0.00
    const anyProductChecked = document.querySelector('.productcart tbody tr input[type="checkbox"]:checked');
    if (!anyProductChecked) {
        currentTotalPrice = 0; // Reset tổng tiền về 0
    }

    // Cập nhật lại hiển thị tổng tiền sau khi xóa sản phẩm
    currentTotalPriceElement.textContent = `Total price: $${currentTotalPrice.toFixed(2)}`;
}

// Gọi hàm deleteProduct(button) khi nút "Delete" được click
document.querySelectorAll('.productcart tbody tr .delete-product-button').forEach(button => {
    button.addEventListener('click', function () {
        deleteProduct(this); // Xóa sản phẩm khi nút "Delete" được click
    });
});

// Cập nhật tổng giá trị ban đầu khi trang được load
calculateTotalPrice();

// Gọi hàm calculateTotalPrice khi checkbox của sản phẩm thay đổi trạng thái
document.querySelectorAll('.productcart tbody tr input[type="checkbox"]').forEach(checkbox => {
    checkbox.addEventListener('change', function () {
        calculateTotalPrice(); // Cập nhật tổng giá trị khi checkbox thay đổi trạng thái
    });
});
</script>