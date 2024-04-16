<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function getCartCount()
{
    if (isset($_SESSION['product_in_cart']) && is_array($_SESSION['product_in_cart'])) {
        return count($_SESSION['product_in_cart']);
    } else {
        return 0;
    }
}

function getCartTotal()
{
    $total = 0;
    $cartItems = getCartItems();
    foreach ($cartItems as $item) {
        if (isset($_SESSION['carts'][$item['product_id']]['quantity'])) {
            $total += $item['product_price'] * $_SESSION['carts'][$item['product_id']]['quantity'];
        }
    }
    return $total;
}

function getCartItems()
{
    global $mysqli;

    // Initialize session 'carts' and 'product_in_cart' if not already set
    if (!isset($_SESSION['carts']) || !is_array($_SESSION['carts'])) {
        $_SESSION['carts'] = [];
    }
    if (!isset($_SESSION['product_in_cart']) || !is_array($_SESSION['product_in_cart'])) {
        $_SESSION['product_in_cart'] = [];
    }

    $products = [];

    // Only fetch cart items if 'product_in_cart' is not empty
    if (!empty($_SESSION['product_in_cart'])) {
        $sql = "SELECT pv.id as variant_id, p.id as product_id, p.name as product_name, 
                 p.price as product_price, p.brand,
                 p.description, img.file as product_image,
                 s.id as size_id, s.name as size_name,
                 c.id as color_id, c.name as color_name,
                 pv.quantity, pv.price as variant_price
                FROM product_variant pv
                JOIN size s ON pv.size_id = s.id
                JOIN color c ON pv.color_id = c.id
                JOIN products p ON pv.product_id = p.id
                JOIN images img ON p.id = img.product_id
                WHERE pv.id = ? AND img.image_type=?";

        $stmt = mysqli_prepare($mysqli, $sql);
        $type = "main";

        foreach ($_SESSION['product_in_cart'] as $product_variant_id) {
            mysqli_stmt_bind_param($stmt, "is", $product_variant_id, $type);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if ($result && mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $products[] = $row;
            }
        }
    }

    return $products;
}

function clearCart()
{
    unset($_SESSION['carts']);
    unset($_SESSION['product_in_cart']);
}

function addToCart($productId, $action = 'increase')
{
    // Initialize session 'carts' and 'product_in_cart' if not already set
    if (!isset($_SESSION['carts']) || !is_array($_SESSION['carts'])) {
        $_SESSION['carts'] = [];
    }
    if (!isset($_SESSION['product_in_cart']) || !is_array($_SESSION['product_in_cart'])) {
        $_SESSION['product_in_cart'] = [];
    }

    $_SESSION['product_in_cart'][] = $productId;

    if (isset($_SESSION['carts'][$productId])) {
        if ($action === 'increase') {
            $_SESSION['carts'][$productId]['quantity']++;
        } elseif ($action === 'decrease') {
            if ($_SESSION['carts'][$productId]['quantity'] > 1) {
                $_SESSION['carts'][$productId]['quantity']--;
            } else {
                unset($_SESSION['carts'][$productId]);
                $_SESSION['product_in_cart'] = array_diff($_SESSION['product_in_cart'], [$productId]);
            }
        }
    } else {
        $_SESSION['carts'][$productId] = [
            'quantity' => 1
        ];
    }
}
