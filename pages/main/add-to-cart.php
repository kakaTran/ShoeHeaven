    <?php
    include("admincp/config/connect.php");
    include("cart-function.php");
    if(isset($_POST['variant_id']))
    {

        $productId = $_POST['variant_id'];
        addToCart($productId);
        header('Location: ../../index.php?manage=cart');

    }
