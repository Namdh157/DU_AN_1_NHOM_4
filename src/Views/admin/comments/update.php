<div class="pcoded-content">
    <div class="page-header card">

    </div>

    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Cập Nhật Bình Luận</h5>
                                </div>
                                <div class="card-block">
                                    <div class="dt-responsive table-responsive">
                                        <form action="" method="post">
                                            <label for="id">ID</label>
                                            <input type="text" name="id" class="form-control" value="<?= $comment['commentid'] ?? '' ?>" readonly>

                                            <label for="name" class="mt-3">Tên Tài Khoản</label>
                                            <input type="text" name="name" class="form-control" value="<?= $comment['user_name'] ?? '' ?>" readonly>

                                            <label for="name" class="mt-3">Tên người dùng</label>
                                            <input type="text" name="name" class="form-control" value="<?= $comment['name'] ?? '' ?>" readonly>

                                            <label for="product_name">Tên Sản phẩm</label>
                                            <input type="text" name="product_name" class="form-control" value="<?= $comment['name_product'] ?? '' ?>" readonly>

                                            <label for="content" class="mt-3">Nội dung</label>
                                            <textarea id="content" name="content" class="form-control" rows="5"><?= $comment['content'] ?? '' ?></textarea>


                                            <label for="date_comment" class="mt-3">Ngày bình luận</label>
                                            <input type="text" name="date_comment" class="form-control" value="<?= $comment['date_comment'] ?? '' ?>" readonly>

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