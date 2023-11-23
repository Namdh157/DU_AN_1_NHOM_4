<div class="container">
    <h3 class="m-5"><?php echo searchProduct($search)[0]['count'] ?> sản phẩm với tìm kiếm "<?php echo $search ?>"</h3>
    <?php
        listProducts(searchProduct($search));
    ?>
</div>