<style>
    * {
        /* box-shadow: 0 0 5px #000; */
    }

    input[type="number"]::-webkit-inner-spin-button,
    input[type="number"]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    .listImage {
        overflow-x: hidden;
        border: 2px solid #00d2d4;
        border-radius: 8px;
        margin-top: 30px;
        padding: 10px;
        background-color: #00d2d430;
    }

    .listImage img {
        height: 100px;
        object-fit: cover;
        border-radius: 8px;

    }

    #pic-1 img {
        height: 500px;
        object-fit: contain;
        border-radius: 8px;
    }

    .listImage img.active {
        border: 1px solid red;
    }

    #sizes {
        width: 120px;
        height: 40px;
        border: 1px solid #00d2d4;
        border-radius: 8px;
        padding: 5px;
        outline: none;
        background-color: #00d2d430;
    }

    #colors {
        width: 120px;
        height: 40px;
        border: 1px solid #00d2d4;
        border-radius: 8px;
        padding: 5px;
        outline: none;
        background-color: #00d2d430;
    }

    .minus,
    .plus {
        background-color: #00d2d4;
        border-radius: 5px;

    }

    .quantities {
        width: 80px;
        height: 100%;
        border: 1px solid #00d2d4;
        text-align: center;

    }

    .action {
        margin-top: auto;
    }
</style>
<pre>
<!-- <?php print_r($_SESSION) ?> -->
</pre>

<main id="main">
    <div class="container mt-5">
        <h5><a href="/">TRANG CHỦ / </a><a href="Category?id=<?= $productCurrent['id_category'] ?>" class="text-uppercase"><?= $productCurrent['name_category'] ?></a></h5>
        <div class="card m-0">
            <div class="container-fliud">
                <div class="wrapper row">
                    <div class="preview col-md-7">

                        <div class="preview-pic tab-content">
                            <div class="tab-pane active" id="pic-1"><img src="assets/files/assets/images/<?= $productCurrent['image_urls'][0] ?>" alt="Ảnh sản phẩm"></div>
                        </div>
                        <div class="listImage d-flex col-12">
                            <?php foreach ($productCurrent['image_urls'] as $key => $image) : ?>
                                <img class="col-3 mx-0 p-2 <?= $key == 0 ? 'active' : '' ?>" src="assets/files/assets/images/<?= $image ?>" />
                            <?php endforeach; ?>
                        </div>

                    </div>
                    <div class="details col-md-5">
                        <h3 class="product-title"><?= $productCurrent['name_product'] ?></h3>

                        <p class="vote"><strong>Danh mục: </strong><a href="Categories?id=<?= $productCurrent['id_category'] ?>"> <?= $productCurrent['name_category'] ?></a></strong></p>

                        <h4 class="price">Giá hiện tại: <span><?= !empty($productCurrent['prices'][0]) ? number_format($productCurrent['prices'][0], 0, '.', ',') . '₫' : "Giá chưa cập nhật" ?></span></h4>

                        <?php
                        if (!empty($productCurrent['sizes']) && !empty($productCurrent['colors'])) : ?>

                            <div class="modal-size">
                                <img src="assets/files/assets/images/size.jpg" alt="">
                            </div>
                            <div class="properties my-4 d-flex justify-content-between">
                                <select id="sizes">
                                    <option value="">Chọn size</option>
                                    <?php foreach ($productCurrent['sizes'] as $size) : ?>
                                        <option value="<?= $size ?>"><?= $size ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="quantity">
                                    <button class="minus" type="button" class="btn minus">
                                        <i class="fa-solid fa-minus"></i>
                                    </button>
                                    <input class="quantities" type="number" value="1" min="1" step="1">
                                    <button class="plus" type="button" class="btn plus">
                                        <i class="fa-solid fa-plus"></i>
                                    </button>

                                </div>
                                <select id="colors">
                                    <option value="">Chọn màu</option>
                                    <?php foreach ($productCurrent['colors'] as $color) : ?>
                                        <option value="<?= $color ?>"><?= $color ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="totalQuantity">Sản phẩm trong kho:<span class="text-success"></span></div>
                        <?php else : ?>
                            <div class="properties my-4 d-flex justify-content-between">

                                <div class="quantity">
                                    <button class="minus" type="button" class="btn minus">
                                        <i class="fa-solid fa-minus"></i>
                                    </button>
                                    <input class="quantities" type="number" value="1" min="1" step="1">
                                    <button class="plus" type="button" class="btn plus">
                                        <i class="fa-solid fa-plus"></i>
                                    </button>

                                </div>
                            </div>
                            <div class="totalQuantity">Sản phẩm trong kho:<span class="text-success"><?= $productCurrent['quantities'][0] ?></span></div>

                        <?php endif; ?>

                        <div class="action">
                            <input class="add-to-cart btn btn-default" data-id="<?= $productCurrent['product_id'] ?>" data-idUser="<?php echo isset($_SESSION['account']['id_user']) ? $_SESSION['account']['id_user'] : ''; ?>" type="submit" value="Thêm vào giỏ hàng" name="btnSave" style="background-color: #00d2d4;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="product-description container my-4">
        <h3 class=" fw-bolder mt-3">Mô tả sản phẩm </h3>
        <div class="card">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <p><?= empty($productCurrent['description']) ? 'Chưa có mô tả' : $productCurrent['description'] ?></p>
                    </div>
                </div>
            </div>
        </div>
        <h3 class="container my-3 fw-bolder">Nhận xét</h3>
        <section style="background-color: #fff;">
            <div class="container-fluid">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-12 col-lg-10 col-xl-12">
                        <div class="card">
                            <div id="containerComment">
                                <?php if (empty($allComments)) : ?>
                                    <div class="card-body-1">
                                        <h3>Chưa có nhận xét nào </h3>
                                    </div>
                                <?php endif; ?>
                                <?php foreach ($allComments as $value) { ?>
                                    <div class="card-body">
                                        <div class="d-flex flex-start align-items-center">
                                            <img class="rounded-circle shadow-1-strong me-3" src="assets/files/assets/images/<?php echo $value['image']  ?>" alt="avatar" width="60" height="60" />
                                            <div>
                                                <h6 class="fw-bold text-primary mb-1"><?php echo $value['name'] ?></h6>
                                                <p class="text-muted small mb-0">
                                                    <?php echo $value['date_comment'] ?>
                                                </p>
                                            </div>
                                        </div>

                                        <p class="mt-3 mb-4 pb-2">
                                            <?php echo $value['content'] ?>

                                        </p>

                                        <div class="small d-flex justify-content-start">
                                            <a href="#!" class="d-flex align-items-center me-3">
                                                <i class="far fa-thumbs-up me-2"></i>
                                                <p class="mb-0">Like</p>
                                            </a>
                                            <a href="#!" class="d-flex align-items-center me-3">
                                                <i class="far fa-comment-dots me-2"></i>
                                                <p class="mb-0">Comment</p>
                                            </a>
                                            <a href="#!" class="d-flex align-items-center me-3">
                                                <i class="fas fa-share me-2"></i>
                                                <a href="https:facebook.com" target="_blank">
                                                    <p class="mb-0">Share</p>
                                                </a>
                                            </a>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>

                            <div class="card-footer py-3 border-0" style="background-color: #f8f9fa;">
                                <div class="d-flex flex-start w-100">
                                    <img class="rounded-circle shadow-1-strong me-3" src="assets/files/assets/images/<?php echo empty($_SESSION['account']['image_user']) ? 'avatar_trong.jpg' : $_SESSION['account']['image_user'] ?>" alt="avatar" width="40" height="40" />
                                    <div class="form-outline w-100">
                                        <textarea name="comment" class="form-control" id="textAreaExample" rows="4" style="background: #fff;"></textarea>
                                        <label class="form-label" for="textAreaExample">Bình luận</label>
                                    </div>
                                </div>

                                <div class="float-end mt-2 pt-1">
                                    <button type="submit" id="Comment" class="btn btn-primary btn-sm">Đăng tải bình luận</button>
                                    <button type="reset" class="btn btn-outline-primary btn-sm">Hủy bỏ</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</main>

<script>
    const containerImage = document.querySelector(".listImage");
    const btnMinus = document.querySelector(".minus");
    const btnPlus = document.querySelector(".plus");
    const quantity = document.querySelector(".quantities");
    const color = document.querySelector("#colors");
    const size = document.querySelector("#sizes");
    const btnAddCart = document.querySelector(".add-to-cart");
    const btnComment = document.querySelector("#Comment");
    const productId = btnAddCart.dataset.id;
    const userId = btnAddCart.getAttribute("data-idUser");
    const containerComment = document.querySelector("#containerComment");

    btnMinus.addEventListener("click", () => {
        if (quantity.value > 1) {
            quantity.value--;
        }
    })
    btnPlus.addEventListener("click", () => {
        quantity.value++;
    })
    quantity.addEventListener("change", () => {
        if (quantity.value < 1) {
            quantity.value = 1;
        }
    })

    var index = 0;
    (() => {
        const images = document.querySelectorAll(".listImage img");
        if (images.length == 0) return;
        const imageActive = document.querySelector(".preview-pic img");
        images.forEach((image, indexImage) => {
            image.addEventListener("click", () => {
                images.forEach((img) => img.classList.remove("active"));
                image.classList.add("active");
                imageActive.src = image.src;
                index = indexImage;

            })
        })
    })();

    //chuyển ảnh
    setInterval(() => {
        const images = document.querySelectorAll(".listImage img");
        if (images.length == 0) return;
        const imageActive = document.querySelector(".preview-pic img");
        images.forEach((image, indexImage) => {
            image.addEventListener("click", () => {
                images.forEach((img) => img.classList.remove("active"));
                image.classList.add("active");
                imageActive.src = image.src;
                index = indexImage;

            })
        })
        index++;
        if (index >= images.length) {
            index = 0;
        }
        images.forEach((image) => image.classList.remove("active"));
        images[index].classList.add("active");
        imageActive.src = images[index].src;
    }, 3000)

    
    function renderPrice() {
        const properties = <?= ($allCategoriesProperties) ?>;
        properties.forEach((property) => {
            if (property.color == color.value && property.size == size.value) {
                var price = property.price;
                var quantityProduct = property.quantity;
                document.querySelector(".price span").textContent = price.toLocaleString() + '₫';
                document.querySelector(".totalQuantity span").textContent = quantityProduct;
                
                return;
            }
        })
    }
    if (color && size) {
        color.addEventListener("change", renderPrice);
        size.addEventListener("change", renderPrice);
    }


    //thêm vào giỏ hàng
    function addCart() {
        const xhr = new XMLHttpRequest();
        const formData = new FormData();

        xhr.open("POST", "/api/carts", true);
        formData.append("idProduct", productId);
        formData.append("idUser", userId);
        if (size && color) {
            if (size.value == "" || color.value == "") {
                alert("Vui lòng chọn size và màu sắc");
                return;
            }
            
            formData.append("size", size.value);
            formData.append("color", color.value);
        }else {
            formData.append("size", "");
            formData.append("color", "");
        }

        formData.append("quantity", quantity.value);

        xhr.send(formData);
        xhr.onload = () => {
            alert("Thêm vào giỏ hàng thành công");
            const data = JSON.parse(xhr.responseText);
            document.querySelector(".cart_count span").innerHTML = data.countCart;
            document.querySelector(".cart_price").innerHTML = data.totalCart.toLocaleString() + '₫';
        };
    }

    btnAddCart.addEventListener("click", addCart)

    //thêm bình luận
    btnComment.addEventListener("click", () => {
        const xhr = new XMLHttpRequest();
        const formData = new FormData();
        const content = document.querySelector("#textAreaExample").value;
        if (userId == '') {
            alert("Vui lòng đăng nhập để bình luận");
            return;
        }
        if (content == "") {
            alert("Vui lòng nhập nội dung bình luận");
            return;
        }
        xhr.open("POST", "/api/comments", true);
        formData.append("idProduct", productId);
        formData.append("idUser", userId);
        formData.append("content", content);
        formData.append("btnComment", '');

        xhr.send(formData);
        xhr.onload = () => {
            if (xhr.status == 200) {
                const data = JSON.parse(xhr.responseText);
                console.log(data)
                const html = `
                                <div class="card-body">
                                    <div class="d-flex flex-start align-items-center">
                                        <img class="rounded-circle shadow-1-strong me-3" src="assets/files/assets/images/<?= $_SESSION['account']['image_user']  ?>" alt="avatar" width="60" height="60" />
                                        <div>
                                            <h6 class="fw-bold text-primary mb-1"><?= $_SESSION['account']['name'] ?></h6>
                                            <p class="text-muted small mb-0">
                                                ${data.date_comment}
                                            </p>
                                        </div>
                                    </div>

                                    <p class="mt-3 mb-4 pb-2">
                                        ${data.content}
                                    </p>

                                    <div class="small d-flex justify-content-start">
                                        <a href="#!" class="d-flex align-items-center me-3">
                                            <i class="far fa-thumbs-up me-2"></i>
                                            <p class="mb-0">Like</p>
                                        </a>
                                        <a href="#!" class="d-flex align-items-center me-3">
                                            <i class="far fa-comment-dots me-2"></i>
                                            <p class="mb-0">Comment</p>
                                        </a>
                                        <a href="#!" class="d-flex align-items-center me-3">
                                            <i class="fas fa-share me-2"></i>
                                            <a href="https:facebook.com" target="_blank">
                                                <p class="mb-0">Share</p>
                                            </a>
                                        </a>
                                    </div>
                                </div>
                `;
                document.querySelector(".card-body-1").innerHTML = "";
                containerComment.innerHTML += html;
            }
        };
    })
</script>