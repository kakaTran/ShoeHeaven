
    <div class="menu-admincp">
        <ul>
        <div class="logoadmin">
            <h2>SHOE HEAVEN</h2>
        </div>
            <li><a href="index.php?action=dashboard&query=them">Dashboard</a></li>
            <li><a href="index.php?action=category&query=them">Category</a></li>
            <li><a href="index.php?action=products&query=them">Manage Products</a></li>
            <li class="mini-product"><a href="index.php?action=product_variant&query=them">Products Variant</a></li>
            <li class="mini-product"><a href="index.php?action=product_detail&query=them">Products Details</a></li>
            <li class="mini-product"><a href="index.php?action=images&query=them">Images</a></li>
            <li class="mini-product"><a href="index.php?action=size&query=them">Size</a></li>
            <li class="mini-product"><a href="index.php?action=color&query=them">Color</a></li>
            <li><a href="index.php?action=order&query=list">Order</a></li>
            <li><a href="index.php?action=customer&query=them">Customer</a></li>
        </ul>
    </div>
    <div class="main-content">
    <?php
        if(isset($_GET["action"]) && $_GET['query']){
            $tam = $_GET["action"];
            $query = $_GET["query"];
        }else{
            $tam = "";
            $query = "";
        }
        if($tam=='category' && $query== 'them'){
            include("modules/category/add.php");
            include("modules/category/list.php");
        }elseif($tam=='category' && $query== 'update'){
            include("modules/category/update.php");
        /*----------------Products-------------------*/    
        }elseif($tam=='products' && $query== 'them'){
            include("modules/products/add.php");
            include("modules/products/list.php");
        }elseif($tam=='products' && $query== 'update'){
            include("modules/products/update.php");
        /*----------------size-------------------*/
        }elseif($tam=='size' && $query== 'them'){
            include("modules/size/add.php");
            include("modules/size/list.php");
        }elseif($tam=='size' && $query== 'update'){
            include("modules/size/update.php");
        /*----------------color-------------------*/
        }elseif($tam=='color' && $query== 'them'){
            include("modules/color/add.php");
            include("modules/color/list.php");
        }elseif($tam=='color' && $query== 'update'){
            include("modules/color/update.php");

        }elseif($tam=='images' && $query== 'them'){
            include("modules/images/add.php");
            include("modules/images/list.php");
        }elseif($tam=='images' && $query== 'update'){
            include("modules/images/update.php");

        }elseif($tam=='product_variant' && $query== 'them'){
            include("modules/product_variant/add.php");
            include("modules/product_variant/list.php");
        }elseif($tam=='product_variant' && $query== 'update'){
            include("modules/product_variant/update.php");
            
        }elseif($tam=='product_detail' && $query== 'them'){
            include("modules/product_detail/add.php");
            include("modules/product_detail/list.php");
        }elseif($tam=='product_detail' && $query== 'update'){
            include("modules/product_detail/update.php");

        }elseif($tam=='order' && $query== 'list'){
            include("modules/order/list.php");
        }elseif($tam=='order' && $query== 'update'){
            include("modules/order/update.php");
            
        }else{
            include("modules/dashboard.php");
        }
        ?>
    </div>
    </div>
<div class='clear'></div>