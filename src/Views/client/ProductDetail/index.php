<?php
include 'CommentFunctions.php';
$productId = $_GET['id']; 
$comments = getComments($productId);
?>
<style>
    .preview-thumbnail li a img {
        height: 180px;
        object-fit: cover;
    }

    .preview-pic .tab-pane.active img {
        height: 600px;
        object-fit: cover;

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
        <h5><a href="/">TRANG CHỦ / </a><a href="Category?id=<?= $productCurrent[0]['id_category'] ?>" class="text-uppercase"><?= $productCurrent[0]['name_category'] ?></a></h5>
        <div class="card">
            <div class="container-fliud">
                <div class="wrapper row">
                    <div class="preview col-md-6">

                        <div class="preview-pic tab-content">
                            <div class="tab-pane active" id="pic-1"><img src="assets/files/assets/images/<?= $productCurrent[0]['img'] ?>" alt="Ảnh sản phẩm"></div>
                        </div>
                        <ul class="preview-thumbnail nav nav-tabs">
                            <li><a><img src="assets/files/assets/images/<?= $productCurrent[0]['img'] ?>" /></a></li>
                            <li><a><img src="assets/files/assets/images/avatar.jpg" /></a></li>
                            <li><a><img src="assets/files/assets/images/avatar (2).jpg" /></a></li>
                            <li><a><img src="assets/files/assets/images/background3.jpg" /></a></li>
                            <li><a><img src="assets/files/assets/images/background5.jpg" /></a></li>
                        </ul>

                    </div>
                    <div class="details col-md-6">
                        <h3 class="product-title"><?php echo $productCurrent[0]['name_product'] ?></h3>
                        <div class="rating">
                            <div class="stars">
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                            </div>
                            <span class="review-no">41 đánh giá</span>
                        </div>
                        <p class="product-description"><?php echo empty($productCurrent['description']) ? 'Chưa có mô tả' :  $productCurrent['description'] ?></p>
                        <h4 class="price">Giá hiện tại: <span><?php echo number_format($productCurrent[0]['price'], 0, '.', ',') ?>₫</span></h4>
                        <p class="vote"><strong>Danh mục: </strong><a href="Categories?id=<?= $productCurrent[0]['id_category'] ?>"> <?= $productCurrent[0]['name_category'] ?></a></strong></p>
                        <h5 class="sizes">

                        </h5>
                        <h5 class="colors">

                        </h5>
                        <div class="action">
                            <form method="post">
                                <input class="add-to-cart btn btn-default" type="submit" value="Thêm vào giỏ hàng" name="btnSave" style="background-color: #00d2d4;">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Nhận xét  -->
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
            <?php endif;
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['account']) && $_SESSION['account']) {
                $id_user = $_SESSION['account']['id_user'];
                $id_pro = $_POST['idpro'];
                $content = $_POST['commentContent'];

                $isInserted = insertComment($id_user, $id_pro, $content);

                if ($isInserted) {
                    echo "Bình luận đã được gửi thành công.";
                    
                } else {
                    echo "Có lỗi xảy ra khi gửi bình luận.";
                }
            }
            ?>
        </div>
    </div>
</main>