
<div class="main">
    <div class="maincontent">
        <?php
        if(isset($_GET["manage"])){
            $tam = $_GET["manage"];
        }else{
            $tam = "";
        }
        if($tam=="nike"){
            include("main/nike.php");
        } elseif($tam=="jordan"){
            include("main/jordan.php");
        } elseif($tam=="adidas"){
            include("main/adidas.php");
        } elseif($tam=="puma"){
            include("main/puma.php");
        } elseif($tam=="shopall"){
            include("main/shopall.php");
        } elseif($tam=="accessories"){
            include("main/accessories.php");
        } elseif($tam=="user"){
            include("main/login/login.php");
        } elseif($tam=="register"){
            include("main/login/register.php");
        } elseif($tam=="login2"){
            include("main/login/login.php");
        } elseif($tam=="cart"){
            include("main/cart.php");
        } elseif($tam=="continue-shopping"){
            include("main/index.php");
        } elseif($tam=="payment"){
            include("main/payment.php");
        } elseif($tam=="contact"){
            include("main/contact.php");
        } elseif($tam=="profile"){
            include("main/profile/profile.php");
        } elseif($tam=="logout"){
            include("main/login/logout.php");
        } elseif($tam=="detail"){
            include("main/detail.php");
        } elseif($tam=="search"){
            include("main/search.php");

        }else{
            include("main/index.php");
        }
        ?>
    </div>
</div>
