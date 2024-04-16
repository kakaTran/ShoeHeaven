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
                <td></td>
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
              </tr>
              <?php
            }
          } else {
            echo "<tr><td colspan='5'>Không có sản phẩm nào.</td></tr>";
          }
          ?>

        </tbody>
      </table>
      <span class="total-price">Total price: $109.99</span>
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
  }

  function calculateTotalPrice() {
    let total = 0;
    const totalCells = document.querySelectorAll('.productcart tbody tr td#total');

    totalCells.forEach(cell => {
      const totalPriceText = cell.textContent.trim().substring(1); // Loại bỏ ký tự '$' ở đầu và cắt khoảng trắng ở hai bên
      const totalPrice = parseFloat(totalPriceText);
      total += totalPrice;
    });

    const totalPriceElement = document.querySelector('.total-price');
    totalPriceElement.textContent = `Total price: $${total.toFixed(2)}`;
  }

  // Gọi hàm calculateTotalPrice khi có sự thay đổi số lượng của sản phẩm
  document.querySelectorAll('.productcart tbody tr input[type="number"]').forEach(input => {
    input.addEventListener('change', function () {
      updateTotal(this); // Cập nhật giá cho sản phẩm
      calculateTotalPrice(); // Tính toán lại tổng số tiền
    });
  });

  // Gọi hàm calculateTotalPrice khi thêm/xóa sản phẩm
  calculateTotalPrice();
</script>