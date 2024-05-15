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
                                                            <a href="/admin/users/update?id=<?= $value['id'] ?>" class="btn btn-primary btn-sm">Cập nhật</a>

                                                            <form action="/admin/users/delete?id=<?= $value['id'] ?>" method="post">
                                                                <button type="submit" onclick="return confirm('Bạn có chắc chắn xóa?');" class="btn btn-danger btn-sm mt-2">Xóa</button>
                                                            </form>
                                                        </td>

                                                        <!-- <td data-details="detail<?= $key ?>" class="text-center containerDetail" colspan="8">
                                                            <div class="container d-flex w-100 justify-content-around">
                                                                <div class="containerDetail-image d-flex  align-items-center p-3 border rounded border-primary-subtle">
                                                                    <?php if (!empty($value['image_urls'])) { ?>
                                                                        <h4>Tất cả ảnh sản phẩm: </h4>
                                                                        <?php foreach ($value['image_urls'] as $imageUrl) : ?>
                                                                            <img src="/assets/files/assets/images/<?= $imageUrl ?>" alt="Ảnh sản phẩm" width="100">
                                                                        <?php endforeach; ?>
                                                                    <?php } else { ?>
                                                                        <h4>Sản phẩm chưa có ảnh nào cả</h4>
                                                                    <?php } ?>
                                                                </div>


                                                                <div class="containerDetail-color d-flex flex-wrap justify-content-center p-3 rounded border border-primary-subtle">
                                                                    <p>
                                                                        <?php if (!empty($value['colors'])) { ?>
                                                                    <h4>Màu sắc: </h4>
                                                                    <?php foreach ($value['colors'] as $color) : ?>
                                                                        <span><?= $color ?>; </span>
                                                                    <?php endforeach; ?>
                                                                <?php } else { ?>
                                                                    <h4>Sản phẩm không có màu sắc</h4>
                                                                <?php } ?>
                                                                </p>
                                                                <br>
                                                                <p>
                                                                    <?php if (!empty($value['sizes'])) { ?>
                                                                <h4>Kích cỡ: </h4>
                                                                <?php foreach ($value['sizes'] as $size) : ?>
                                                                    <span><?= $size ?>; </span>
                                                                <?php endforeach; ?>
                                                            <?php } else { ?>
                                                                <h4>Sản phẩm không có kích cỡ</h4>
                                                            <?php } ?>
                                                            </p>

                                                                </div>
                                                            </div>
                                                        </td> -->
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
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><?= $modal['title'] ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="closeModal()">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="containerDetail-image" class="d-flex  align-items-center p-3 border rounded border-primary-subtle">

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
    function Delete(button) {

    }

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
                        <img src="/assets/files/assets/images/${imgUrl}" width="150"> `
                        containerImage.innerHTML += html;
                    }
                });
                
                if(!isExistImage) {
                    containerImage.innerHTML = "<span>Sản phẩm không có ảnh nào</span>"
                }

                propertiesArray.forEach(item => {
                    const color = item.color;
                    const size = item.size;
                    if(color ) {
                        isExistProperties = true;
                        const html = `
                        <p>Màu sắc:${color}</p>`
                    }
                    containerProperties.innerHTML += html;

                    // if(size || size !== null) {
                    //     isExistProperties = true;
                    //     const html = `
                    //     <p>kích cỡ: ${size}</p>`
                    // }
                    //     containerProperties.innerHTML += html;

                        
                    });
                    // console.log(color, size);
                
                if(!isExistProperties) {
                   containerProperties.innerHTML = "<span>Sản phẩm chưa có size hay color nào</span>"
                }
                console.log(propertiesArray)
            };
        };


    }

    function closeModal() {
        const modal = document.querySelector(".modal");
        modal.style.display = 'none';
    }
</script>