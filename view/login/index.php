<?php
require_once '../../model/pdo.php';
require_once '../../model/user.php';
if (isset($_POST['btnSave']) && $_POST['btnSave']) {
    $userName = $_POST['user_name'];
    $password = $_POST['password'];

   $user = login($userName, $password);
   if (!empty($user)) {
        setcookie('userName', $userName, time() +36000, '/');
        setcookie('password', base64_encode($password), time() +36000, '/');
        header("location:../../index.php");
        exit();
    } else {
        echo "<script>alert('tài khoản mật khẩu không chính xác')</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập tài khoản</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>

<body>
    <main id="main">
        <section class="vh-lg-100 " style="background-color: #95a5a6;">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col col-xl-10">
                        <div class="card" style="border-radius: 1rem;">
                            <div class="row g-0">
                                <div class="col-md-6 col-lg-5 d-none d-md-block">
                                    <img src="../../assets/image/avatar.jpg" alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem; height: 100%!important;" />
                                </div>
                                <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                    <div class="card-body p-4 p-lg-5 text-black">

                                        <form method="post">

                                            <div class="d-flex align-items-center mb-3 pb-1">
                                                <img src="../../assets/image/logo-mixi-tét.png" alt="" width="200px">
                                            </div>

                                            <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Đăng Nhập tài khoản</h5>

                                            <div class="form-outline mb-4">
                                                <label class="form-label" for="form2Example17">Tên đăng nhập</label>
                                                <input type="text" name="user_name" id="form2Example17" class="form-control form-control-lg" />
                                            </div>

                                            <div class="form-outline mb-4">
                                                <label class="form-label" for="form2Example27">Password</label>
                                                <input type="password" autocomplete="current-password" name="password" id="form2Example27" class="form-control form-control-lg" />
                                            </div>

                                            <div class="pt-1 mb-4">
                                                <input class="btn btn-lg btn-block" name="btnSave" type="submit" value="Đăng nhập" style="background-color: #00d2d4;"></input>
                                            </div>

                                            <a class="small text-muted" href="https://www.facebook.com/profile.php?id=100011643516649">Quên mật khẩu</a>
                                            <p class="mb-5 pb-lg-2" style="color: #393f81;">Bạn chưa có tài khoản? <a href="../register/" style="color: #393f81;">Đăng ký ngay</a></p>
                                            <a href="#!" class="small text-muted">Điều khoản sử dụng.</a>
                                            <a href="#!" class="small text-muted">Chính sách bảo mật</a>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</body>

</html>