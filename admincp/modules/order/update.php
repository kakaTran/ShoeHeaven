<?php
$id = $_GET['id'];

$sql_update_order = "SELECT * FROM orders WHERE id='$id' LIMIT 1";
$query_update_order = mysqli_query($mysqli, $sql_update_order);
$row = mysqli_fetch_array($query_update_order);
?>

<p>Update Order</p>
<table class="update-order-table">
  <form method="POST" action="modules/order/processing.php?action=update&id=<?php echo $id ?>">
    <thead>
      <tr>
        <th>User ID</th>
        <th>Order Date</th>
        <th>Total Amount</th>
        <th>Payment Method</th>
        <th>Shipping Method</th>
        <th>Order Status</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><?php echo $row['user_id'] ?></td>
        <td><input type="date" name="order_date" value="<?php echo $row['order_date'] ?>" required></td>
        <td><input type="text" name="total_amount" value="<?php echo $row['total_amount'] ?>" required></td>
        <td>
          <select name="payment_method" required>
            <option value="">Select Payment Method</option>
            <option value="Credit Card" <?php if ($row['payment_method'] == 'Credit Card')
              echo 'selected'; ?>>Credit Card
            </option>
            <option value="PayPal" <?php if ($row['payment_method'] == 'PayPal')
              echo 'selected'; ?>>PayPal</option>
            <!-- Thêm các option khác tương ứng với các phương thức thanh toán khác -->
          </select>
        </td>
        <td>
          <select name="shipping_method" required>
            <option value="">Select Shipping Method</option>
            <option value="Standard Shipping" <?php if ($row['shipping_method'] == 'Standard Shipping')
              echo 'selected'; ?>>Standard Shipping</option>
            <option value="Express Shipping" <?php if ($row['shipping_method'] == 'Express Shipping')
              echo 'selected'; ?>>
              Express Shipping</option>
            <!-- Thêm các option khác tương ứng với các phương thức vận chuyển khác -->
          </select>
        </td>
        <td>
          <select name="order_status" required>
            <option value="">Select Order Status</option>
            <option value="Processing" <?php if ($row['order_status'] == 'Processing')
              echo 'selected'; ?>>Processing
            </option>
            <option value="Shipped" <?php if ($row['order_status'] == 'Shipped')
              echo 'selected'; ?>>Shipped</option>
            <option value="Delivered" <?php if ($row['order_status'] == 'Delivered')
              echo 'selected'; ?>>Delivered
            </option>
            <!-- Thêm các option khác tương ứng với các trạng thái đơn hàng khác -->
          </select>
        </td>
      </tr>
    </tbody>
    <tfoot>
      <tr>
        <td colspan="6"><button type="submit" name="updateorder">Update Order</button></td>
      </tr>
    </tfoot>
  </form>
</table>