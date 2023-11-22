<?php
function commentPage($id, $users)
{ ?>

    <section style="background-color: #fff;">
        <div class="container-fluid">
            <div class="row d-flex justify-content-center">
                <div class="col-md-12 col-lg-10 col-xl-12">
                    <div class="card">
                        <?php foreach (getAllCommentId('id_pro', $id) as $value) { ?>
                            <div class="card-body">
                                <div class="d-flex flex-start align-items-center">
                                    <img class="rounded-circle shadow-1-strong me-3" src="assets/image/<?php echo $value['image']  ?>" alt="avatar" width="60" height="60" />
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
                                        <a href="https:facebook.com" target="_blank"><p class="mb-0">Share</p></a>
                                    </a>
                                </div>
                            </div>
                        <?php } ?>

                        <div class="card-footer py-3 border-0" style="background-color: #f8f9fa;">
                            <form action="" method="post">
                                <div class="d-flex flex-start w-100">
                                    <img class="rounded-circle shadow-1-strong me-3" src="assets/image/<?php echo empty($users['image']) ? 'assets/image/avatar_trong.jpg' : $users['image'] ?>" alt="avatar" width="40" height="40" />
                                    <div class="form-outline w-100">
                                        <textarea name="comment" class="form-control" id="textAreaExample" rows="4" style="background: #fff;"></textarea>
                                        <label class="form-label" for="textAreaExample">Bình luận</label>
                                    </div>
                                </div>

                                <div class="float-end mt-2 pt-1">
                                    <input type="submit" class="btn btn-primary btn-sm" value="Đăng tải bình luận" name="btnComment"></input>
                                    <input type="reset" class="btn btn-outline-primary btn-sm" value="Hủy bỏ"></input>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php } ?>