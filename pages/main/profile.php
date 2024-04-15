
<div class="container_profile">
    <div class="info_profile">
        <h2>User Information</h2>
        <form id="infoForm">
            <p><strong>Name:</strong> <span id="name">Tran Vu Ca</span></p>
            <p><strong>Date of Birth:</strong> <span id="dob">January 1, 2004</span></p>
            <p><strong>Gender:</strong> <span id="gender">Male</span></p>
            <p><strong>Email:</strong> <span id="email">kaka@example.com</span></p>
            <p><strong>Phone:</strong> <span id="phone">+1234567890</span></p>
            <button type="button" onclick="editInfo()">Edit</button>
            <button type="button" onclick="saveInfo()" style="display: none;">Save</button>
        </form>
    </div>
    <div class="image_profile">
        <div class="avatar_user">
            <img id="avatarImg" src="images/User-avatar.png" alt="User Avatar">
            <input type="file" id="avatarInput" accept="image/*" onchange="previewImage(event)">
        </div>
        <p id="avatarName">Tran Vu Ca</p>
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
        document.querySelectorAll('#infoForm input').forEach(input => {
            const span = document.createElement('span');
            span.id = input.getAttribute('data-value');
            span.innerText = input.value;
            input.replaceWith(span);
        });
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