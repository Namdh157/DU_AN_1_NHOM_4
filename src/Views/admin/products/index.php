<style>
    .containerDetail {
        display: none;
    }

    .containerDetail.show {
        display: table-cell;
    }
</style>
<div class="pcoded-content">

    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-home bg-c-blue"></i>
                    <div class="d-inline">
                        <h5>Sản phẩm</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class=" breadcrumb breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="/admin/dashboard"><i class="feather icon-home"></i></a>
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
                                    <h5>Danh sách Sản phẩm</h5>

                                    <a href="/admin/products/create" class="btn btn-info btn-sm">Tạo mới</a>

                                </div>
                                <div class="card-block">
                                    <div class="dt-responsive table-responsive">
                                        <table id="simpletable" class="table table-striped table-bordered nowrap">
                                            <thead>
                                                <tr>
                                                    <th>STT</th>
                                                    <th>ID</th>
                                                    <th>Tên sản phẩm</th>
                                                    <th>Giá</th>
                                                    <th>Chi tiết sản phẩm</th>
                                                    <th>Tên danh mục</th>
                                                    <th>Hành động</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php foreach ($products as $key => $value) : ?>
                                                    <tr>
                                                        <td><?= $key + 1 ?></td>
                                                        <td><?= $value['id'] ?></td>
                                                        <td><?= $value['name_product'] ?></td>
                                                        <td><?= number_format($value['price']) . 'đ'  ?></td>
                                                        <td>
                                                            <button data-button="detail<?= $key ?>" class="rounded w-100">Hiện thị chi tiết</button>
                                                        </td>
                                                        <td><?= $value['name_category'] ?></td>
                                                        <td>
                                                            <a href="/admin/users/update?id=<?= $value['id'] ?>" class="btn btn-primary btn-sm">Cập nhật</a>

                                                            <form action="/admin/users/delete?id=<?= $value['id'] ?>" method="post">
                                                                <button type="submit" onclick="return confirm('Bạn có chắc chắn xóa?');" class="btn btn-danger btn-sm mt-2">Xóa</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                    <tr data-details="detail<?= $key ?>">
                                                        <td class="text-center containerDetail" colspan="8"  >
                                                            <div class="container d-flex w-100">
                                                                <div class="containerDetail-image">
                                                                    <span>Tất cả ảnh sản phẩm: </span>
                                                                    <?php if (!empty($value['image_urls'])) {
                                                                        foreach ($value['image_urls'] as $imageUrl) : ?>
                                                                            <img src="/assets/files/assets/images/<?= $imageUrl ?>" alt="Ảnh sản phẩm" width="100">
                                                                        <?php endforeach; ?>
                                                                    <?php } else { ?>
                                                                        <span>Sản phẩm chưa có ảnh nào cả</span>
                                                                    <?php } ?>
                                                                </div>


                                                                <div class="containerDetail-color-size">
                                                                    <p>
                                                                        <span>Màu sắc: </span>
                                                                        <?php if (!empty($value['colors'])) {
                                                                            foreach ($value['colors'] as $color) : ?>
                                                                                <span><?= $color ?>, </span>
                                                                            <?php endforeach; ?>
                                                                        <?php } else { ?>
                                                                            <span>Sản phẩm không có màu sắc</span>
                                                                        <?php } ?>
                                                                    </p>

                                                                    <p>
                                                                        <span>Kích cỡ: </span>
                                                                        <?php if (!empty($value['sizes'])) {
                                                                            foreach ($value['sizes'] as $size) : ?>
                                                                                <span><?= $size ?>, </span>
                                                                            <?php endforeach; ?>
                                                                        <?php } else { ?>
                                                                            <span>Sản phẩm không có kích cỡ</span>
                                                                        <?php } ?>
                                                                    </p>

                                                                </div>
                                                            </div>
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

<script>
    const detailProperties = document.querySelectorAll("button.rounded");
    detailProperties.forEach((item) => {
        item.addEventListener("click", () => {
            const dataDetail = item.getAttribute("data-button");
            document.querySelector("tr[data-details=" + dataDetail + "]>td").classList.toggle("show");
            item.textContent = document.querySelector("tr[data-details=" + dataDetail + "]>td").classList.contains("show") ? "Ẩn chi tiết" : 'Hiện thị chi tiết'
        })
    })
</script>