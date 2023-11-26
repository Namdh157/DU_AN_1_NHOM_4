<div class="pcoded-content">

    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-home bg-c-blue"></i>
                    <div class="d-inline">
                        <h5>Khách hàng</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class=" breadcrumb breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="/addmin/dashboard"><i class="feather icon-home"></i></a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Khách hàng</a> </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-body">

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Thêm mới </h5>
                                </div>
                                <div class="card-block">
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <label for="nameUser">Tên đăng nhập</label>
                                        <input type="text" name="nameUser" class="form-control" required>

                                        <label for="password" class="mt-3">Password</label>
                                        <input type="password" name="password" class="form-control" required>

                                        <label for="name">Tên Khách hàng</label>
                                        <input type="text" name="name" class="form-control" required>

                                        <label for="image">Hình ảnh</label>
                                        <input type="file" name="image" class="form-control">

                                        <label for="email" class="mt-3">Email</label required>
                                        <input type="email" name="email" class="form-control">

                                        <label for="address" class="mt-3">Địa chỉ</label>
                                        <input type="text" name="address" class="form-control">

                                        <label for="phone" class="mt-3">Số điện thoại</label>
                                        <input type="text" name="phone" class="form-control">

                                        <button type="submit" name="btn-submit" class="btn btn-info mt-3">Thêm mới</button>
                                        <a href="/admin/users" class="btn btn-primary mt-3">Quay lại d/s</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
</div>