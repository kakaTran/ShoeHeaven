<?php


// Kiểm tra xem người dùng đã đăng nhập chưa
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}



$email = $_SESSION['email'];
$sql = "SELECT * FROM users WHERE email = ?";
$stmt = $mysqli->prepare($sql);

// Kiểm tra lỗi khi chuẩn bị truy vấn
if (!$stmt) {
    exit("Error: Prepare failed");
}

$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();


if (!$result) {
    exit("Error: Query failed");
}

$row = $result->fetch_assoc();


if (empty($row['fullname'])) {
    $row['fullname'] = "John Doe"; 
}
if (empty($row['date_of_birth'])) {
    $row['date_of_birth'] = "2000-01-01"; 
}
if (empty($row['gender'])) {
    $row['gender'] = "Male"; 
}
if (empty($row['phonenumber'])) {
    $row['phonenumber'] = "1234567890"; 
}
?>

<div class="container_profile">
    <div class="info_profile">
        <h2>User Information</h2>
        <form id="infoForm">
            <p><strong>Name:</strong> <span id="name"><?php echo $row['fullname']; ?></span></p>
            <p><strong>Date of Birth:</strong> <span id="dob"><?php echo $row['date_of_birth']; ?></span></p>
            <p><strong>Gender:</strong> <span id="gender"><?php echo $row['gender']; ?></span></p>
            <p><strong>Email:</strong> <span id="email"><?php echo $row['email']; ?></span></p>
            <p><strong>Phone:</strong> <span id="phone"><?php echo $row['phonenumber']; ?></span></p>
        
            <button type="button" onclick="editInfo()">Edit</button>
            <button type="button" onclick="saveInfo()" style="display: none;">Save</button>
        </form>
    </div>
    <div class="image_profile">
    <div class="avatar_user">
        <?php
        if (empty($row['image'])) {
            $defaultImage = "pages/main/profile/images/user.png"; 
            echo '<img id="avatarImg" src="' . $defaultImage . '" alt="User Avatar">';
        } else {
            echo '<img id="avatarImg" src="pages/main/profile/'.$row['image'] . '" alt="User Avatar">';
        }
        ?>
        <input type="file" id="avatarInput" accept="image/*" onchange="previewImage(event)">
    </div>
    <p id="avatarName"><?php echo $row['fullname']; ?></p>
</div>
</div>

<script>
    function editInfo() {
        document.querySelectorAll('#infoForm span').forEach(span => {
            const input = document.createElement('input');
            input.value = span.innerText;
            input.setAttribute('data-value', span.id);
            span.replaceWith(input);
        });
        document.querySelector('#infoForm button:last-of-type').style.display = 'inline-block';
        document.querySelector('#infoForm button:first-of-type').style.display = 'none';
    }

    function saveInfo() {
        
        var name = document.getElementById("name").innerText;
        var dob = document.getElementById("dob").innerText;
        var gender = document.getElementById("gender").innerText;
        
        
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "save_profile.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
               
                console.log(xhr.responseText);
            }
        };
        var data = "name=" + encodeURIComponent(name) + "&dob=" + encodeURIComponent(dob) + "&gender=" + encodeURIComponent(gender);
        xhr.send(data);
        
        
        document.querySelector('#infoForm button:first-of-type').style.display = 'inline-block';
        document.querySelector('#infoForm button:last-of-type').style.display = 'none';
    }

    function previewImage(event) {
        const avatarImg = document.getElementById('avatarImg');
        const avatarName = document.getElementById('avatarName');
        const file = event.target.files[0];
        const reader = new FileReader();

        reader.onloadend = function () {
            avatarImg.src = reader.result;
            avatarName.innerText = file.name;
        }

        if (file) {
            reader.readAsDataURL(file);
        } else {
            avatarImg.src = "";
            avatarName.innerText = "No file chosen";
        }
    }
</script>