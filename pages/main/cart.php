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
          <tr>
            <td><input type="checkbox" class="product-checkbox"></td>
            <td>
              <div class="product-info-cart">
                <img src="images/product01.png" alt="Adidas Running Shoes">
                <p>Adidas Running Shoes for Men/39/Black</p>
              </div>
            </td>
            <td>$109.99</td>
            <td>
              <input type="number" value="1" min="1" onchange="updateTotal(this)">
            </td>
            <td id="total"> $109.99</td>
          </tr>
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

  var productName = localStorage.getItem('productName');
  var productPrice = localStorage.getItem('productPrice');
  var productColor = localStorage.getItem('productColor');
  var productSize = localStorage.getItem('productSize');
  var productImage = localStorage.getItem('productImage');
</script>