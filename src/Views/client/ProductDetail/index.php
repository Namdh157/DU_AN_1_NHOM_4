<style>
    * {
        /* box-shadow: 0 0 5px #000; */
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
        object-fit: cover;
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

    #minus,
    #plus {
        background-color: #00d2d4;
    }

    #quantity {
        width: 80px;
        height: 100%;
        outline: none;
        border: none;
        text-align: center;

    }

    .action {
        margin-top: auto;
    }
</style>


<main id="main">
    <div class="container mt-5">
        <h5><a href="/">TRANG CHỦ / </a><a href="Category?id=<?= $productCurrent['id_category'] ?>" class="text-uppercase"><?= $productCurrent['name_category'] ?></a></h5>
        <div class="card m-0">
            <div class="container-fliud">
                <div class="wrapper row">
                    <pre>
                        <?php
                        // print_r($productCurrent);
                        // var_dump($_SESSION['account']['id_user']);
                        ?>
                    </pre>
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
                                <button id="minus" type="button" class="btn minus">
                                    <i class="fa-solid fa-minus"></i>
                                </button>
                                <input id="quantity" type="number" value="1" min="1" step="1">
                                <button id="plus" type="button" class="btn plus">
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
        <?= empty($productCurrent['description']) ? 'Chưa có mô tả' :  $productCurrent['description'] ?>
    </div>
    <div class="commentUsers container">
        <h3 class=" fw-bolder mt-3">Nhận xét sản phẩm từ khách hàng</h3>
        <?php
        // commentPage($id, $users);
        ?>
    </div>
</main>

<script>
    const containerImage = document.querySelector(".listImage");
    const btnMinus = document.querySelector("#minus");
    const btnPlus = document.querySelector("#plus");
    const quantity = document.querySelector("#quantity");
    const color = document.querySelector("#colors");
    const size = document.querySelector("#sizes");
    const btnAddCart = document.querySelector(".add-to-cart");

    var index = 0;
    (() => {
        const images = document.querySelectorAll(".listImage img");
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
    btnAddCart.addEventListener("click", () => {
        const productId = btnAddCart.dataset.id;
        const userId = btnAddCart.getAttribute("data-idUser");
        if (size.value == "" || color.value == "") {
            alert("Vui lòng chọn size và màu sắc");
            return;
        }
        const xhr = new XMLHttpRequest();
        const formData = new FormData();

        xhr.open("POST", "/api/carts", true);
        formData.append("idProduct", productId);
        formData.append("idUser", userId);
        formData.append("size", size.value);
        formData.append("color", color.value);
        formData.append("quantity", quantity.value);

        xhr.send(formData);
        xhr.onload = () => {
            alert("Thêm vào giỏ hàng thành công");
            const data =JSON.parse(xhr.responseText);
            document.querySelector(".cart_count").innerHTML = data;
        };
    })
</script>