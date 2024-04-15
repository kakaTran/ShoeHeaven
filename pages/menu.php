<?php
session_start();
$sql_categories = "SELECT id, name FROM category";
$result_categories = mysqli_query($mysqli, $sql_categories);
?>

<div id="menu">
    <div class="listmenu">
        <li><a href="index.php"><i class="fa-solid fa-house"></i></a></li>
        <?php
        while ($row = mysqli_fetch_assoc($result_categories)) {
            echo "<li><a href='index.php?manage=" . strtolower($row['name']) . "'>" . strtoupper($row['name']) . "</a></li>";
        }
        ?>
    </div>
    <div class="others">
        <?php if (isset($_SESSION['email'])): ?>
            <li>
                <div class="dropdown">
                    <a id="user-icon" onclick="toggleUserMenu()">
                        <i class="fa-solid fa-user"></i>
                    </a>
                    <div id="user-menu" style="display: none;">
                        <a class="dropdown-item" href="index.php?manage=profile">Profile</a>
                        <a class="dropdown-item" href="index.php?manage=logout">Log Out</a>
                    </div>
                </div>
            </li>
        <?php else: ?>
            <li><a href="index.php?manage=user" id="user-icon"><i class="fa-solid fa-user"></i></a></li>
        <?php endif; ?>
        <li><a href="index.php?manage=cart"><i class="fa-solid fa-cart-shopping"></i></a></li>
        <li><input style="height: 40px;" placeholder="Search" type="text"><i class="fa-solid fa-magnifying-glass"></i>
        </li>
    </div>
</div>
<div class="clear"></div>

<script>
    window.addEventListener('scroll', function () {
        var menu = document.getElementById('menu');
        if (window.scrollY > 0) {
            menu.classList.add('sticky');
        } else {
            menu.classList.remove('sticky');
        }
    });

    function toggleUserMenu() {
        var userMenu = document.getElementById("user-menu");
        if (userMenu.style.display === "none") {
            userMenu.style.display = "block";
        } else {
            userMenu.style.display = "none";
        }
    }
</script>
