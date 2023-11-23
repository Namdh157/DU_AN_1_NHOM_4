<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin Web</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <link rel="icon" href="/assets/files/assets/images/favicon.ico" type="image/x-icon">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:500,700" rel="stylesheet">

    <?php require_once 'src/views/admin/components/head.php' ?>
</head>
<section class="vh-lg-100 " style="background-color: #95a5a6;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-xl-10">
                <div class="card" style="border-radius: 1rem;">
                    <div class="row g-0">
                        <div class="col-md-6 col-lg-5 d-none d-md-block">
                            <img src="assets/files/assets/images/avatar.jpg" alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem; height: 100%!important;" />
                        </div>
                        <div class="col-md-6 col-lg-7 d-flex align-items-center">
                            <div class="card-body p-4 p-lg-5 text-black">

                                <form method="post">

                                    <div class="d-flex align-items-center mb-3 pb-1">
                                        <img src="assets/files/assets/images/logo-mixi-tét.png" alt="" width="200px">
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
                                    <p class="mb-5 pb-lg-2" style="color: #393f81;">Bạn chưa có tài khoản? <a href="Register" style="color: #393f81;">Đăng ký ngay</a></p>
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
<script type="text/javascript" src="/assets/files/bower_components/jquery/js/jquery.min.js"></script>
<script type="text/javascript" src="/assets/files/bower_components/jquery-ui/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="/assets/files/bower_components/popper.js/js/popper.min.js"></script>
<script type="text/javascript" src="/assets/files/bower_components/bootstrap/js/bootstrap.min.js"></script>

<script src="/assets/files/assets/pages/waves/js/waves.min.js"></script>

<script type="text/javascript" src="/assets/files/bower_components/jquery-slimscroll/js/jquery.slimscroll.js"></script>

<script src="/assets/files/assets/pages/chart/float/jquery.flot.js"></script>
<script src="/assets/files/assets/pages/chart/float/jquery.flot.categories.js"></script>
<script src="/assets/files/assets/pages/chart/float/curvedLines.js"></script>
<script src="/assets/files/assets/pages/chart/float/jquery.flot.tooltip.min.js"></script>

<script src="/assets/files/bower_components/chartist/js/chartist.js"></script>

<script src="/assets/files/assets/pages/widget/amchart/amcharts.js"></script>
<script src="/assets/files/assets/pages/widget/amchart/serial.js"></script>
<script src="/assets/files/assets/pages/widget/amchart/light.js"></script>

<script src="/assets/files/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="/assets/files/bower_components/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="/assets/files/bower_components/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="/assets/files/bower_components/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

<script src="/assets/files/assets/js/pcoded.min.js"></script>
<script src="/assets/files/assets/js/vertical/vertical-layout.min.js"></script>
<!-- <script type="text/javascript" src="/assets/files/assets/js/script.min.js"></script> -->
<script src="/assets/files/assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script type="text/javascript" src="/assets/files/assets/js/script.js"></script>
<script>
    $(function () {
        $('#simpletable').DataTable();
    });
</script>
