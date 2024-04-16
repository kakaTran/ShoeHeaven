<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function getCartCount()
{
    if (isset($_SESSION['product_in_cart']))
        return count($_SESSION['product_in_cart']);
    else
        return 0;
}

function getCartTotal()
{
    $total = 0;
    $cartItems = getCartItems();
    foreach ($cartItems as $item) {
        $total += $item['product_price'] * $_SESSION['carts'][$item['product_id']]['quantity'];
    }
    return $total;
}

function getCartItems()
{

    global $mysqli;
    // Kiểm tra và tạo session 'carts' nếu nó chưa tồn tại
    if (!isset($_SESSION['carts'])) {
        $_SESSION['carts'] = [];
    }

    if (isset($_SESSION['carts'])) {

        $products = [];

        $sql = "SELECT pv.id as variant_id, p.id as product_id, p.name as product_name, 
             p.price as product_price, p.brand,
              p.description,img.file as product_image,
                    s.id as size_id, s.name as size_name,
                    c.id as color_id, c.name     as color_name,
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

        return $products;

    } else {
        return [];
    }
}

function clearCart()
{
    unset($_SESSION['carts']);
    unset($_SESSION['product_in_cart']);
}

function addToCart($productId, $action = 'increase')
{
    if (isset($_SESSION['carts'])) {
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
            $_SESSION['product_in_cart'][] = $productId;
        }
    } else {
        $_SESSION['carts'][$productId] = [
            'quantity' => 1
        ];
        $_SESSION['product_in_cart'][] = $productId;
    }

    if (!in_array($productId, $_SESSION['product_in_cart'])) {
        $_SESSION['product_in_cart'][] = $productId;
    }
    $_SESSION['product_in_cart'] = array_unique($_SESSION['product_in_cart']);
}
