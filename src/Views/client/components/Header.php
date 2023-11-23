<header class="header">
    <!-- Header Main -->

    <div class="header_main">
        <div class="container text-center">
            <div class="row">

                <!-- Logo -->
                <div class="col-lg-2 col-sm-3 col-3 order-1">
                    <div class="logo_container">
                        <div class="logo">
                            <a href="/"><img src="assets/files/assets/images/logo-mixi-tét.png" width="130px" alt=""></a>
                        </div>
                    </div>
                </div>

                <!-- Search -->
                <div class="col-lg-6 col-12 order-lg-2 order-3 text-lg-left text-right">
                    <div class="header_search">
                        <div class="header_search_content">
                            <div class="header_search_form_container">
                                <form method="get" class="d-flex justify-content-between align-items-center">
                                    <input type="search" name="search" required="required" class="header_search_input col-11" placeholder="Tìm kiếm sản phẩm...">
                                    <div class="button col-1 position-relative">
                                        <input type="submit" class="col-12 h-100 border-0 rounded" value="" style="background-color:#00d2d4">
                                        <i class="fa fa-search position-absolute" style="top:50%;left:50%;transform: translate(-50%,-50%);font-size:1.3rem"></i>
                                    </div>
                                </form>
                                <!-- <div class="menuMb d-none">
                                        <i class="fa-solid fa-bars"></i>
                                        <ul class="standard_dropdown main_nav_dropdown">
                                            <li class="hassubs">
                                                <ul class="standard_dropdown main_nav_dropdown>
                                            <?php foreach ($category as $value) { ?>
                                                <li class=" d-flex align-items-center"><i class="fa-solid fa-caret-right"></i> &ensp;<a href="index.php?type=Category&id=<?php echo $value['id'] ?>"><?php echo $value['name_category'] ?></a>
                                            </li>
                                        <?php } ?>
                                        </ul>
                                    </div> -->

                            </div>
                        </div>
                    </div>
                </div>

                <!-- Wishlist -->
                <div class="col-lg-4 col-9 order-lg-3 order-2 text-lg-left text-right">
                    <div class="wishlist_cart d-flex flex-row align-items-center justify-content-end" style="gap:1em">

                        <!-- Cart -->
                        <div class="cart">
                            <div class="cart_container d-flex flex-row align-items-center justify-content-end">
                                <div class="cart_icon">
                                    <img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1560918704/cart.png" alt="">
                                    <div class="cart_count"><span><?php echo 0 ?></span></div>
                                </div>
                                <div class="cart_content">
                                    <a href="index.php?type=Cart&id=<?php echo empty($users) ? 0 : $users['id'] ?>">
                                        <div class="cart_text">Giỏ hàng</div>
                                        <div class="cart_price"><?php echo empty($users) ? 0 : 0 ?> ₫</div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="top_bar_content ml-auto align-items-start">
                            <?php
                            if (!empty($users)) {
                            ?>
                                <div class="users-logout position-relative">
                                    <div class="d-flex align-items-center">
                                        <img class="mx-3 rounded-circle" src="assets/image/<?php echo $users['image'] ?>" alt="" width="25px">
                                        <span class="fw-bold"><?php echo $users['name'] ?></span>
                                    </div>
                                    <div class="logout position-absolute rounded " style="display:none; background-color: #00d2d4;">
                                        <div class="fw-bolder border-bottom fs-5"><a href="view/logout/"> <button>Đăng xuất</button></a></div>
                                        <?php if ($users['role'] == 10) { ?>
                                            <div class="fw-bolder"><a href="admin/"> <button> Quản trị website</button></a></div>
                                        <?php } ?>
                                    </div>
                                </div>

                            <?php  } else { ?>
                                <div class="top_bar_user">
                                    <div class="user_icon"><img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1560918647/user.svg" alt=""></div>
                                    <div><a href="Register">Đăng ký</a></div>
                                    <div><a href="Login">Đăng nhập</a></div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Navigation -->

    <nav class="main_nav d-none d-lg-block">
        <div class="container">
            <div class="row">
                <div class="col">

                    <div class="main_nav_content d-flex flex-row">

                        <!-- Categories Menu -->



                        <!-- Main Nav Menu -->

                        <div class="main_nav_menu">
                            <ul class="standard_dropdown main_nav_dropdown">
                                <li><a href="/">Trang chủ<i class="fas fa-chevron-down"></i></a></li>
                                <li class="hassubs">
                                    <a href="#">Tất cả danh mục<i class="fas fa-chevron-down"></i></a>
                                    <ul>
                                        <?php foreach ($allCategories as $item) { ?>
                                            <li class="d-flex align-items-center"><i class="fa-solid fa-caret-right"></i> &ensp;<a href="Categories?id=<?=$item['id'] ?>"><?= $item['name_category'] ?></a></li>
                                        <?php } ?>
                                    </ul>
                                </li>
                                <li class="hassubs">
                                    <a href="#">Trang khác<i class="fas fa-chevron-down"></i></a>
                                    <ul>
                                        <li class="d-flex align-items-center"><i class="fa-solid fa-caret-right"><a href=""></i> &ensp;Không Bấm</a></li>
                                        <li class="d-flex align-items-center"><i class="fa-solid fa-caret-right"><a href=""></i> &ensp;Được Đâu</a></li>
                                        <li class="d-flex align-items-center"><i class="fa-solid fa-caret-right"><a href=""></i> &ensp;Đừng Chọn</a></li>
                                        <li class="d-flex align-items-center"><i class="fa-solid fa-caret-right"><a href=""></i> &ensp;Cảm Ơn</a></li>
                                    </ul>
                                </li>
                                <li><a href="?type=Alert">Thông báo<i class="fas fa-chevron-down"></i></a></li>
                                <li><a href="?type=Alert">Contact<i class="fas fa-chevron-down"></i></a></li>
                            </ul>
                        </div>

                        <!-- Menu Trigger -->

                        <div class="menu_trigger_container ml-auto">
                            <div class="menu_trigger d-flex flex-row align-items-center justify-content-end">
                                <div class="menu_burger">
                                    <div class="menu_trigger_text">menu</div>
                                    <div class="cat_burger menu_burger_inner"><span></span><span></span><span></span></div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>