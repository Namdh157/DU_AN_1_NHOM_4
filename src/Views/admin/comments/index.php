<div class="pcoded-content">

    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-home bg-c-blue"></i>
                    <div class="d-inline">
                        <h5>Bình Luận</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class=" breadcrumb breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="/addmin/dashboard"><i class="feather icon-home"></i></a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Bình Luận</a> </li>
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
                                    <h5>Danh sách Bình Luận</h5>
                                </div>
                                <div class="card-block">
                                    <div class="dt-responsive table-responsive">
                                        <table id="simpletable" class="table table-striped table-bordered nowrap">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Người dùng</th>
                                                    <th>Sản Phẩm</th>
                                                    <th>Nội Dung</th>
                                                    <th>Thời gian</th>
                                                    <th>Thao tác</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php foreach ($comments as $comment) : ?>
                                                    <?php
                                                    $imgPath = "/assets/files/assets/images/";
                                                    ?>
                                                    <tr>
                                                        <td><?= $comment['commentid'] ?></td>
                                                        <td><?= $comment['name'] ?><br><img src="<?= $imgPath . $comment['image'] ?>" alt="Ảnh Người dùng" style="max-width: 120px; max-height: 120px;"></td>
                                                        <td><?= $comment['name_product'] ?><br>
                                                            <img src="<?= $imgPath . $comment['img'] ?>" alt="Ảnh sản phẩm" style="max-width: 120px; max-height: 120px;">

                                                        </td>
                                                        <td><?= $comment['content'] ?></td>
                                                        <td><?= $comment['date_comment'] ?></td>
                                                        <td>
                                                            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#feedbackForm<?= $comment['commentid'] ?>">Phản hồi</button>
                                                            <a href="/admin/comments/update?id=<?= $comment['commentid'] ?>" class="btn btn-primary btn-sm">Cập nhật</a><br>
                                                            <input type="hidden" name="commentid" value="<?= $comment['commentid'] ?>">
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


<!-- Phản hồi  bình luận-->
<?php foreach ($comments as $comment) : ?>
    <div class="modal fade" id="feedbackForm<?= $comment['commentid'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" mr-20>
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel ">Phản Hồi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="false">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <textarea id="feedbackText<?= $comment['commentid'] ?>" class="form-control" placeholder="Nhập nội dung phản hồi" rows="5"></textarea>
                    <button class="btn btn-primary mt-2" onclick="submitFeedback(<?= $comment['commentid'] ?>)">Gửi phản hồi</button>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<script>
    function submitFeedback(commentId) {
        var feedbackText = document.getElementById('feedbackText' + commentId).value;
        console.log('Bình luận ID:', commentId, 'Nội dung phản hồi:', feedbackText);
    }
</script>