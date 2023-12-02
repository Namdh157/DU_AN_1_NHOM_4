
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

    .comment {
        display: flex;
        align-items: flex-start;
        margin-bottom: 15px;
        font-family: Arial, sans-serif;/
    }

    .comment-avatar {
        margin-right: 10px;
        flex-shrink: 0;
    }

    .comment-avatar img {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        object-fit: cover;
    }

    .comment-content {
        flex: 1;
    }

    .comment-content>strong {
        display: block;
        margin-bottom: 5px;
    }

    .comment-content>p {
        margin-bottom: 5px;
    }

    .comment-date {
        font-size: 0.8em;
        color: #777;
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
    <div class="commentUsers container">
        <h3 class="fw-bolder mt-3">Nhận xét sản phẩm từ khách hàng</h3>
        <br>
        <div class="show_comment">
            <? $comments = getComments($_GET['id']); ?>
            <?php if (empty($comments)) : ?>    
                <p>Chưa có bình luận nào.</p>
            <?php else : ?>
                <div class="comments">
                    <?php foreach ($comments as $comment) : ?>
                        <div class="comment">
                            <div class="comment-avatar">
                                <img src="assets/files/assets/images/<?= $comment['image'] ?>" alt="Avatar" style="width: 50px; height: 50px; border-radius: 50%;"> <!-- Hiển thị ảnh người dùng -->
                            </div>
                            <div class="comment-content">
                                <strong><?= $comment["name"] ?></strong>
                                <p><?= $comment['content'] ?></p>
                                <span class="comment-date"><?= $comment['date_comment'] ?></span>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
        <div class="insert_comment">
            <?php if (isset($_SESSION['account']) && $_SESSION['account']) : ?>
                <form id="commentForm" action="" method="post">
                    <textarea name="commentContent" required class="form-control" placeholder="Để lại bình luận của bạn..."></textarea>
                    <input type="hidden" name="idpro" value="<?= $_GET['id'] ?>">
                    <button type="submit" class="btn btn-primary mt-2">Gửi Bình Luận</button>
                </form>
            <?php else : ?>
                <p>Bạn cần phải <a href="Login">đăng nhập</a> để bình luận.</p>
            <?php endif;?>
        </div>
    </div>
</main>