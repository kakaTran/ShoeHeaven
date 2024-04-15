<?php
include("../../config/connect.php");

if ($_GET['action'] == 'delete' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql_delete_order = "DELETE FROM orders WHERE id=?";
    $stmt = mysqli_prepare($mysqli, $sql_delete_order);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    header("Location:../../index.php?action=order&query=list");
} elseif ($_GET['action'] == 'update' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $order_date = $_POST['order_date'];
    $total_amount = $_POST['total_amount'];
    $payment_method = $_POST['payment_method'];
    $shipping_method = $_POST['shipping_method'];
    $order_status = $_POST['order_status'];

    $sql_update_order = "UPDATE orders SET order_date=?, total_amount=?, payment_method=?, shipping_method=?, order_status=? WHERE id=?";
    $stmt = mysqli_prepare($mysqli, $sql_update_order);
    mysqli_stmt_bind_param($stmt, "sissii", $order_date, $total_amount, $payment_method, $shipping_method, $order_status, $id);
    mysqli_stmt_execute($stmt);
    header("Location:../../index.php?action=order&query=list");
}
?>