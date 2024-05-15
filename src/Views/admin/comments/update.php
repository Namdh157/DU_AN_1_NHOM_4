<div class="pcoded-content">

    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-home bg-c-blue"></i>
                    <div class="d-inline">
                        <h5>Cập Nhật Bình Luận</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class=" breadcrumb breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="/addmin/dashboard"><i class="feather icon-home"></i></a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Cập Nhật Bình Luận</a> </li>
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
                                    <h5>Cập nhật Bình Luận</h5>
                                </div>
                                <div class="card-block">
                                    <div class="dt-responsive table-responsive">
                                        <form action="" method="post">
                                            <label for="name">ID</label>
                                            <input type="text" name="id" class="form-control" value="<?= $comment['id'] ?>" readonly>

                                            <label for="content" class="mt-3">Nội Dung</label>
                                            <input type="text" name="content" class="form-control" value="<?= $comment['content'] ?>">

                                            <label for="id_user" class="mt-3">ID_USER</label>
                                            <input type="text" name="id_user" class="form-control" value="<?= $comment['id_user'] ?>" readonly>

                                            <label for="id_pro" class="mt-3">ID_PRO</label>
                                            <input type="text" name="id_pro" class="form-control" value="<?= $comment['id_pro'] ?>" readonly>

                                            <label for="date_comment" class="mt-3">Thời gian</label>
                                            <input type="text" name="date_comment" class="form-control" value="<?= $comment['date_comment'] ?>" readonly>

                                            <button type="submit" name="btn-submit" class="btn btn-info mt-3">Submit</button>
                                            <a href="/admin/comments" class="btn btn-primary mt-3">Quay lại d/s</a>
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
</div>