<?php
require_once '../../model/pdo.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['btnSave']) && $_POST['btnSave']) {
        $name =  $_POST['name'];
        $userName = $_POST['user_name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $password = $_POST['password'];
        $saveImage = "../../assets/image/" . $_FILES['image']['name'];
        $image = $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], $saveImage);


        pdo_execute("INSERT INTO users (user_name, password, name, image, email, address, phone) VALUES
                ('$userName', '$password', '$name', '$image', '$email', '$address', '$phone') ");
        
        header("Location:../login");
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>
<style>
    main img {
        border-top-left-radius: .25rem;
        border-bottom-left-radius: .25rem;
        height: 100% !important;
        object-fit: cover;
    }

    .logo-form {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        align-items: center;
        margin-bottom: 2em;
    }

    main .error {
        color: red;
        position: absolute;
    }
</style>

<body>
    <main id="main">
        <section class="h-100 bg-dark">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col">
                        <form method="POST" enctype="multipart/form-data" onclick="checkForm()" id="formMain">
                            <div class="card card-registration">
                                <div class="row g-0">
                                    <div class="col-xl-6 d-none d-xl-block ">
                                        <img src="../../assets/image/background3.jpg" alt="Ảnh logo" class="img-fluid" />
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="card-body p-md-5 text-black">
                                            <div class="logo-form">
                                                <img src="../../assets/image/logo-mixi-tét.png" width="150px" alt="">
                                                <h3 class="mb-5 text-uppercase">Đăng ký tài khoản</h3>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6 mb-4">
                                                    <div class="form-outline">
                                                        <label class="form-label" for="form3Example1m">Tên tài khoản</label>
                                                        <input type="text" id="form3Example1m" class="form-control form-control-lg" name="name" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-4">
                                                    <div class="form-outline">
                                                        <label class="form-label" for="form3Example1n">Tên đăng nhập</label>
                                                        <input type="text" id="form3Example1n" class="form-control form-control-lg" name="user_name" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6 mb-4">
                                                    <div class="form-outline">
                                                        <label class="form-label" for="form3Example1m1">Email</label>
                                                        <input type="email" autocomplete="username" id="form3Example1m1" class="form-control form-control-lg" name="email" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-4">
                                                    <div class="form-outline">
                                                        <label class="form-label" for="form3Example1n2">Số điện thoại</label>
                                                        <input type="number" id="form3Example1n2" class="form-control form-control-lg" name="phone" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 mb-4">
                                                    <div class="form-outline">
                                                        <label class="form-label" for="form3Example99">Mật khẩu</label>
                                                        <input type="password" autocomplete="new-password" id="form3Example99" class="form-control form-control-lg" name="password" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-4">
                                                    <div class="form-outline">
                                                        <label class="form-label" for="form3Example97">Nhập lại mật khẩu</label>
                                                        <input type="password" autocomplete="new-password" id="form3Example97" class="form-control form-control-lg" name="repeatPassword" />
                                                        <span class="error"></span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6 mb-4">
                                                    <div class="form-outline">
                                                        <label class="form-label" for="form3Example8">Địa chỉ</label>
                                                        <input type="text" id="form3Example8" class="form-control form-control-lg" name="address" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6 fs-9 mb-4">
                                                    <div class="form-outline">
                                                        <label class="form-label" for="form3Example1n1">Ảnh đại diện</label>
                                                        <input type="file" id="form3Example1n1" class="form-control form-control-lg" name="image" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="d-flex justify-content-around align-items-center pt-2">
                                                <p style="color: #393f81;">Bạn đã có tài khoản? <a href="../login/" style="color: #393f81;">Đăng nhập ngay</a></p>
                                                <button type="reset" class="btn btn-light btn-lg">Cài lại</button>
                                                <input type="submit" class="btn  btn-lg ms-2" style="background-color:#00d2d4" name="btnSave" value="Đăng ký">                                              
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </section>
    </main>
</body>
<script>
    var password = document.getElementById("form3Example99");
    var password2 = document.getElementById("form3Example97");
    var error = document.querySelector(".error");

    function checkForm() {
        password2.addEventListener("input", function() {
            if (password.value !== password2.value) {
                error.innerHTML = 'Mật khẩu nhập lại chưa chính xác!'
            } else {
                error.innerHTML = ''
            }
        })
    }
</script>

</html>