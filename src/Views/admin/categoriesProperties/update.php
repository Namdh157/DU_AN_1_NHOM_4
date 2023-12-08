<div class="pcoded-content">

    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-home bg-c-blue"></i>
                    <div class="d-inline">
                        <h5>Cập Nhật thuộc tính sản phẩm</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class=" breadcrumb breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="/addmin/dashboard"><i class="feather icon-home"></i></a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Cập Nhật thuộc tính sản phẩm</a> </li>
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
                                    <h5>Cập nhật Thuộc tính sản phẩm</h5>
                                </div>
                                <div class="card-block">
                                    <div class="dt-responsive table-responsive">
                                        <form action="" method="post">
                                            <label for="name">Size</label>
                                            <input type="text" name="size" class="form-control" value="<?= $categoriesProperties['size'] ?>">

                                            <label for="content" class="mt-3">Màu sắc</label>
                                            <input type="text" name="color" class="form-control" value="<?= $categoriesProperties['color'] ?>">

                                            <label for="content" class="mt-3">Giá tiền</label>
                                            <input type="text" name="price" class="form-control" value="<?= $categoriesProperties['price'] ?>">

                                            <label for="id_user" class="mt-3">Số lượng</label>
                                            <input type="text" name="quantity" class="form-control" value="<?= $categoriesProperties['quantity'] ?>">

                                            <label for="id_user" class="mt-3">Sản phẩm</label>
                                            <select name="idProduct" id="" class="form-select">
                                                <?php foreach ($allProduct as $product) : ?>

                                                    <option value="<?= $product['id'] ?>" <?= $product['id'] == $categoriesProperties['id_product'] ? 'selected' : '' ?>>
                                                        <?= $product['name_product'] ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>


                                            <button type="submit" name="btn-submit" class="btn btn-info mt-3">Thay đổi</button>
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