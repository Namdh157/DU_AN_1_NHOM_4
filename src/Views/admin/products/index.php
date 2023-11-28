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
                                                        <td><?= $value['product_id'] ?></td>
                                                        <td><?= $value['name_product'] ?></td>
                                                        <td><?= number_format($value['price']) . 'đ'  ?></td>
                                                        <td>
                                                            <button data-product-id="<?= $value['product_id'] ?>" class="rounded w-100" onclick=loadModel(this)>Hiện thị chi tiết</button>
                                                        </td>
                                                        <td><?= $value['name_category'] ?></td>
                                                        <td>
                                                            <a href="/admin/products/update?id=<?= $value['product_id'] ?>" class="btn btn-primary btn-sm">Cập nhật</a>

                                                            <form action="/admin/products/delete?id=<?= $value['product_id'] ?>" method="post">
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
    <div class="modal">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Thông tin chi tiết sản phẩm</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="closeModal()">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="containerDetail-image" class="d-flex  align-items-center justify-content-center p-3 border rounded border-primary-subtle">

                    </div>
                    <div id="containerDetail-properties" class="d-flex flex-wrap justify-content-center p-3 rounded border border-primary-subtle">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>
</div>

<script>
    function loadModel(button) {
        const modal = document.querySelector(".modal");
        const productId = button.getAttribute("data-product-id");
        var containerImage = document.querySelector("#containerDetail-image");
        var containerProperties = document.querySelector("#containerDetail-properties");
        containerProperties.innerHTML = '';
        containerImage.innerHTML = '';
        modal.style.display = "block";

        const xhr = new XMLHttpRequest();
        const formData = new FormData();
        formData.append("productId", productId);
        formData.append("getImages", '');
        xhr.open("POST", "/api/products");
        xhr.send(formData);
        xhr.onload = () => {
            if (xhr.status == 200) {
                const data = JSON.parse(xhr.responseText);
                var isExistImage = false;
                var isExistProperties = false;
                const imageArray = data.allImages;
                const propertiesArray = data.allProperties;

                imageArray.forEach(img => {
                    const imgUrl = img.image_url;
                    if (imgUrl) {
                        isExistImage = true;
                        const html = `
                        <p><img src="/assets/files/assets/images/${imgUrl}" width="100" style="height:100px" class="p-2"><span aria-hidden="true"><i class="fa-solid fa-xmark"></i></span></p> `
                        containerImage.innerHTML += html;
                    }
                });

                if (!isExistImage) {
                    containerImage.innerHTML = "<span>Sản phẩm không có ảnh nào</span>"
                }

                let htmlArray = [];
                propertiesArray.forEach(item => {
                    const color = item.color;
                    const size = item.size;
                    let html = '';

                    if (color) {
                        isExistProperties = true;
                        html += `<p>Màu sắc: ${color}</p>`;
                    }

                    if (size) {
                        isExistProperties = true;
                        html += `<p>Kích cỡ: ${size}</p>`;
                    }

                    if (html) {
                        htmlArray.push(html);
                    }
                });

                if (!isExistProperties) {
                    containerProperties.innerHTML = "<span>Sản phẩm chưa có size hay color nào</span>"
                } else {
                    containerProperties.innerHTML = htmlArray.join("");
                }
            };
        };


    }

    function closeModal() {
        const modal = document.querySelector(".modal");
        modal.style.display = 'none';
    }
</script>