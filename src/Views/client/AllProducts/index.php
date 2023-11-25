<?php 
if(empty($allProducts)){ ?>
<p style="text-align: center;">Không có kết quả tìm kiếm cho "<?=$_GET['search'] ?>"</p>
<?php }else{ ?><p style="text-align: center;" class="fs-6">Hiện thị <?php echo $countSearch['products_count'] ?> kết quả của tìm kiếm "<?= $_GET['search'] ?>"</p>

<?php } ?>

<?php listProducts($allProducts) ?>