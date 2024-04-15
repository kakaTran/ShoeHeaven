<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/cbaf2427ea.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>ShoeHeaven</title>
</head>
<body>
    <div class="wrapper">
         <?php 
            include("admincp/config/connect.php");
            include("pages/header.php");
            include("pages/menu.php");
            include("pages/main.php");  
            include("pages/footer.php");
         ?>  
    </div>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</body>
<script src="js/script.js"></script>
<script>
    <?php
    if (isset($_SESSION['login_success'])) {
        echo 'alert("Đăng nhập thành công!");';
        unset($_SESSION['login_success']);
    }
    ?>
    $('.variant').on('change',function(){
        var size = $('#size').val();
        var product = $('#product').val();
        var color = $('#color').val();
        
        $.ajax({
            url:"pages/main/get-product-variant.php",
            data:{
                product,size,color
            },
            success:function(response)
            {
                if(response)
                {
                    var data = JSON.parse(response);
                if(data)
                    {
                        $('#price').html(data.price)
                        $('#addToCart').show()
                    }
                }
                else
                $('#addToCart').hide()

               
            }
        })
    })
</script>
</html>