<div class="pcoded-content">

    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-home bg-c-blue"></i>
                    <div class="d-inline">
                        <h5>User</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class=" breadcrumb breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="/addmin/dashboard"><i class="feather icon-home"></i></a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Sản phẩm</a> </li>
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
                                    <h5>Thêm mới sản phẩm</h5>
                                </div>
                                <div class="card-block">
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <label for="name">Tên sản phẩm</label>
                                        <input type="text" name="nameProduct" class="form-control">

                                        <div class="col-12 m-b-30">
                                            <label for="name">Danh mục</label>
                                            <select name="categories" class="form-control form-control-primary">
                                                <option value="">Chọn danh mục sản phẩm</option>
                                                <?php foreach ($allCategories as $category) : ?>
                                                    <option value="<?= $category['id'] ?>"><?= $category['name_category'] ?></option>

                                                <?php endforeach; ?>
                                            </select>
                                        </div>

                                        <label for="price" class="mt-3">Giá</label>
                                        <input type="text" name="price" class="form-control">

                                        <label for="image" class="mt-3">Ảnh</label>
                                        <input type="file" name="image_urls[]" multiple class="form-control" />

                                        <label for="color" class="mt-3">Màu sắc</label>
                                        <input type="text" name="color" class="form-control">

                                        <label for="size" class="mt-3">Size</label>
                                        <input type="text" name="size" class="form-control">

                                        <label for="description" class="mt-3">Mô tả</label>
                                        <input type="text" name="description" class="form-control">

                                        <label for="discount" class="mt-3">Giảm giá</label>
                                        <input type="text" name="discount" class="form-control">


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