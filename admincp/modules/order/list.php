<?php
$sql_list_orders = "SELECT * FROM orders ORDER BY order_date DESC";
$query_list_orders = mysqli_query($mysqli, $sql_list_orders);
?>

<p class="order-heading">List Orders</p>
<table class="order-table" style="width:95%" border="1" style="border-collapse: collapse;">
  <tr>
    <th>ID</th>
    <th>User ID</th>
    <th>Order Date</th>
    <th>Total Amount</th>
    <th>Payment Method</th>
    <th>Order Status</th> 
    <th>Operation</th>
  </tr>
  <?php
  while ($row = mysqli_fetch_array($query_list_orders)) {
  ?>
    <tr>
      <td><?php echo $row['id'] ?></td>
      <td><?php echo $row['user_id'] ?></td>
      <td><?php echo $row['order_date'] ?></td>
      <td><?php echo $row['total_amount'] ?></td>
      <td><?php echo $row['payment_method'] ?></td>
      <td><?php echo $row['order_status'] ?></td>
      <td>
        <a class="order-link" href="?action=order&query=update&id=<?php echo $row['id'] ?>">Edit</a> |
        <a class="order-link" href="modules/order/processing.php?action=delete&id=<?php echo $row['id'] ?>">Delete</a>
      </td>
    </tr>
  <?php
  }
  ?>
</table>