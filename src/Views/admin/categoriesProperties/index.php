<div class="pcoded-content">

    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-home bg-c-blue"></i>
                    <div class="d-inline">
                        <h5>Loại thuộc tính sản phẩm</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class=" breadcrumb breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="/admin/dashboard"><i class="feather icon-home"></i></a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Loại thuộc tính sản phẩm</a> </li>
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
                                    <h5>Danh sách các loại thuộc tính sản phẩm</h5>

                                    <a href="/admin/categoriesProductsProperties/create" class="btn btn-info btn-sm">Tạo mới</a>
                                </div>
                                <div class="card-block">
                                    <div class="dt-responsive table-responsive">
                                        <table id="simpletable" class="table table-striped table-bordered nowrap">
                                            <thead>
                                                <tr>
                                                    <th>STT</th>
                                                    <th>Sản phẩm</th>
                                                    <th>Kích thước</th>
                                                    <th>Màu sắc</th>
                                                    <th>Giá tiền</th>
                                                    <th>Số lượng</th>
                                                    <th>Hành động</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php foreach ($allCategories_Properties as $key => $value) : ?>
                                                    <tr>
                                                        <td><?= $key + 1 ?></td>
                                                        <td><?= $value['name_product'] ?></td>
                                                        <td>
                                                            <?= empty($value['size']) ? "Không có màu sắc" : $value['size'] ?>
                                                        </td>
                                                        <td>
                                                            <?= empty($value['color']) ? "Không có màu sắc" : $value['color'] ?>
                                                        </td>
                                                        <td><?= number_format($value['price']) ?> VNĐ</td>
                                                        <td><?= $value['quantity'] ?> sản phẩm</td>
                                                        <td>
                                                            <a href="/admin/categoriesProductsProperties/update?id=<?= $value['id'] ?>">
                                                                <button class="btn btn-primary btn-sm">Cập nhật</button>
                                                            </a>

                                                            <form action="/admin/categoriesProductsProperties/delete?id=<?= $value['id'] ?>" method="post">
                                                                <button type="submit" onclick="return confirm('Bạn có chắc chắn xóa?');" class="btn btn-danger btn-sm mt-2">Xóa</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>

                                        </table>
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
</table>
</div>