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
                                                    <th>Chi tiết sản phẩm</th>
                                                    <th>Tên danh mục</th>
                                                    <th>Hành động</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php foreach ($products as $key => $value) : ?>
                                                    <!-- <pre>
                                                        <?php print_r($value) ?>
                                                    </pre> -->
                                                    <tr>
                                                        <td><?= $key + 1 ?></td>
                                                        <td><?= $value['product_id'] ?></td>
                                                        <td><?= $value['name_product'] ?></td>
                                                        <td>
                                                            <button data-product-id="<?= $value['product_id'] ?>" data-nameProduct="<?= $value['name_product'] ?>" id="btnModal<?= $value['product_id'] ?>" class="rounded w-100" onclick=loadModel(this)>Hiện thị chi tiết</button>
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
    <div class="modal" style="background-color:#00000080">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 id="nameProduct" class="modal-title">Thông tin sản phẩm</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="modal-body">
                    <span>Hình ảnh </span>
                    <button id="addImages" onclick="addImages(this)">
                        <i class="fa fa-plus-circle text-info fs-3"></i>
                    </button>
                    <input id="inputUpload" type="file" hidden multiple accept="image/*">
                    <div id="containerDetail-image" class="d-flex flex-wrap p-3">
                    </div>
                    <span>Thuộc tính </span>
                    <button id="addProperties" onclick="addProperties(this)">
                        <i class="fa fa-plus-square  text-info fs-3 "></i>
                    </button>
                    <div id="modal-2" class="card" style="display:none">
                        <div class="card-block">
                            <div class="form-group row">
                                <label for="color">Thêm thuộc tính cho sản phẩm</label>
                                <input id="color" class="form-group" type="text" placeholder="Màu sắc">
                                <input id="size" class="form-group" type="text" placeholder="kích thước">
                                <input id="price" class="form-group" type="number" placeholder="Giá tiền">
                                <input id="quantity" class="form-group" type="number" placeholder="Số lượng">
                            </div>
                            <button id="btn-add-properties" type="button" class="btn btn-primary p-b-0">Xác nhận</button>
                        </div>
                    </div>
                    <div id="containerDetail-properties" class="d-flex flex-column  p-3">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const modal = document.querySelector(".modal");
        const btnClose = document.querySelector(".close");
        const containerImages = document.querySelector("#containerDetail-image");
        const containerProperties = document.querySelector("#containerDetail-properties");
        const btnAddImages = document.querySelector("#addImages");
        const btnAddProperties = document.querySelector("#addProperties");
        const inputImg = document.querySelector("#inputUpload");
        const modal2 = document.querySelector("#modal-2");



        function loadModel(button) {
            //modal hiện thị chi tiết sản phẩm
            const nameProduct =button.getAttribute("data-nameProduct");
            const productId = button.getAttribute("data-product-id");
            const title =document.getElementById("nameProduct");
            modal.style.display = "block";
            title.innerHTML = "Thông tin chi tiết " + nameProduct;
            // tạo đối tượng ajax
            const xhr = new XMLHttpRequest();
            const formData = new FormData();
            // Thêm dữ liệu vào FormData
            formData.append("productId", productId);
            formData.append("renderData", "");
            // Gửi yêu cầu Ajax đến server và nhận lại kết quả
            xhr.open("POST", "/api/products");
            xhr.send(formData);
            xhr.onload = () => {
                // Kiểm tra kết quả trả về
                if (xhr.status === 200) {
                    btnAddImages.setAttribute("data-product-id", productId);
                    btnAddProperties.setAttribute("data-product-id", productId);
                    //lấy data về từ server
                    const data = JSON.parse(xhr.responseText);
                    console.log(data);
                    let allImages = data.allImages;
                    let allProductProperties = data.allProductProperties;
                    let isImages = false;
                    let isProperties = false;
                    containerImages.innerHTML = "";
                    //Hiện thị các ảnh
                    allImages.forEach(image => {
                        isImages = true;
                        var html = `<div class="position-relative border rounded border-primary">
                                        <img src="/assets/files/assets/images/${image.image_url}" width="100" class="p-3" style="height:100px"> 
                                        <button id-image = "${image.id}"  type="button" class="btn-close position-absolute top-0 end-0" id="deleteImage" onclick="deleteImage(this)" aria-label="Close"></button>
                                    </div>
                        `
                        containerImages.innerHTML += html;
                    });
                    if (!isImages) {
                        containerImages.innerHTML = "Sản phẩm không có ảnh nào";
                    }
                    containerProperties.innerHTML = "";
                    //Hiện thị các thuộc tính
                    allProductProperties.forEach(item => {
                        isProperties = true;
                        var html = `
                            <div class="position-relative border m-2 rounded border-primary">
                                <p class="p-2">Màu sắc: ${item.color}, Kích cỡ: ${item.size}, Giá tiền: ${item.price}đ số lượng:${item.quantity}</p>
                                <button id-item = "${item.idProperties}" type="button" class="btn-close position-absolute top-0 end-0" id="deleteProperties" onclick="deleteProperties(this)" aria-label="Close"></button>
                            </div>
                        `
                        containerProperties.innerHTML += html;
                    });

                    if (!isProperties) {
                        containerProperties.innerHTML = "Sản phẩm không có thuộc tính nào";
                    }

                }
            }

        }

        //hàm thêm ảnh
        function addImages(button) {
            // lấy id sản phẩm và input upload ảnh
            const productId = button.getAttribute("data-product-id");
            inputImg.click();

        }

        inputImg.onchange = () => {

            const productId = btnAddImages.getAttribute("data-product-id");
            // tạo đối tượng ajax
            const xhr = new XMLHttpRequest();
            const formData = new FormData();
            // Thêm dữ liệu vào FormData
            formData.append("productId", productId);
            formData.append("addImages", "");
            const images = inputImg.files;
            for (const file of images) {
                formData.append("imageUrls[]", file);
            }
            // Gửi yêu cầu Ajax đến server và nhận lại kết quả
            xhr.open("POST", "/api/products");
            xhr.send(formData);
            xhr.onload = () => {
                if (xhr.status === 200) {
                    // lấy data về từ server
                    const data = JSON.parse(xhr.responseText);
                    var image_url = data.name;
                    //check xem có ảnh nào chưa
                    if (!containerImages.querySelector("img")) {
                        containerImages.innerHTML = "";
                    }
                    //Hiện thị các ảnh
                    image_url.forEach(image => {
                        var html = `<div class="position-relative  border rounded border-primary">
                                            <img src="/assets/files/assets/images/${image}" width="100" class="p-3" style="height:100px">
                                            <button type="button" class="btn-close position-absolute top-0 end-0 id="deleteImage" onclick="deleteImage(this)" aria-label="Close"></button>
                                        </div>
                                        `
                        containerImages.innerHTML += html;
                    });
                }
            }

        }


        //hàm xóa ảnh
        function deleteImage(button) {
            idImage = button.getAttribute("id-image");
            //tạo đối tượng ajax
            const xhr = new XMLHttpRequest();
            const formData = new FormData();
            // thêm dữ liệu vào formData
            formData.append("idImage", idImage);
            formData.append("deleteImage", "");

            //gửi yêu cầu ajax đến server và nhận lại kết quả
            xhr.open("POST", "/api/products");
            xhr.send(formData);
            xhr.onload = () => {
                if (xhr.status === 200) {
                    button.closest(".position-relative")?.remove();
                }
            }
        }

        //hàm thêm thuộc tính
        function addProperties(button) {
            modal2.style.display = "block";
            const productId = button.getAttribute("data-product-id");
            const color = document.getElementById("color");
            const size =document.getElementById("size");
            const price =document.getElementById("price");
            const quantity = document.getElementById("quantity");
            const btnAddProperties = document.querySelector("#btn-add-properties");

            btnAddProperties.onclick = () => {
                //tạo đối tượng ajax
                const xhr = new XMLHttpRequest();
                const formData = new FormData();
                // thêm dữ liệu vào formData
                formData.append("productId", productId);
                formData.append("color", color.value);
                formData.append("size", size.value);
                formData.append("price", price.value);
                formData.append("quantity", quantity.value);
                formData.append("addProperties", "");
                //gửi yêu cầu ajax đến server và nhận lại kết quả
                xhr.open("POST", "/api/products");
                xhr.send(formData);
                xhr.onload = () => {
                    if (xhr.status === 200) {
                        const data = JSON.parse(xhr.responseText);
                        console.log(data)
                        if (data === "error") {
                            alert("Thuộc tính đã tồn tại");
                            return;
                        }
                        if (!containerProperties.querySelector("#deleteProperties")) {
                            containerProperties.innerHTML = "";
                        }
                        var html = `
                                                <div class="position-relative border m-2 rounded border-primary">
                                                    <p class="p-2">Màu sắc: ${data.color}, Kích cỡ: ${data.size}, Giá tiền: ${data.price}đ  số lượng:${data
                                                        .quantity}</p>
                                                    <button id-item = "${data.id}" type="button" class="btn-close position-absolute top-0 end-0" id="deleteProperties" onclick="deleteProperties(this)" aria-label="Close"></button>
                                                </div>
                                            `
                        containerProperties.innerHTML += html;

                    }
                }
            }
        }

        //Xóa thuộc tính
        function deleteProperties(button) {
            idProperties = button.getAttribute("id-item");
            //tạo đối tượng ajax
            const xhr = new XMLHttpRequest();
            const formData = new FormData();
            // thêm dữ liệu vào formData
            formData.append("idProperties", idProperties);
            formData.append("deleteProperties", "");

            //gửi yêu cầu ajax đến server và nhận lại kết quả
            xhr.open("POST", "/api/products");
            xhr.send(formData);
            xhr.onload = () => {
                if (xhr.status === 200) {
                    button.closest(".position-relative")?.remove();
                }
            }
        }
        //đóng modal
        btnClose.addEventListener("click", () => {
            modal.style.display = "none";
            modal2.style.display = "none";
        })
    </script>