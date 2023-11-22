<?php
function footerPage($category)
{ ?>

  <!-- Remove the container if you want to extend the Footer to full width. -->
  <div class=" my-5">
    <!-- Footer -->
    <footer class="text-center text-lg-start text-dark" style="background-color: #ECEFF1">
      <!-- Section: Social media -->
      <section class="d-flex justify-content-between p-4 text-white" style="background-color: #00d2d4">
        <!-- Left -->
        <div class="me-5">
          <span>Hoặc liên hệ với chung tôi thông qua các mạng xã hội cạnh bên:</span>
        </div>
        <!-- Left -->

        <!-- Right -->
        <div>
          <a href="" class="text-white me-4">
            <i class="fab fa-facebook-f"></i>
          </a>
          <a href="" class="text-white me-4">
            <i class="fab fa-twitter"></i>
          </a>
          <a href="" class="text-white me-4">
            <i class="fab fa-google"></i>
          </a>
          <a href="" class="text-white me-4">
            <i class="fab fa-instagram"></i>
          </a>
          <a href="" class="text-white me-4">
            <i class="fab fa-linkedin"></i>
          </a>
          <a href="" class="text-white me-4">
            <i class="fab fa-github"></i>
          </a>
        </div>
        <!-- Right -->
      </section>
      <!-- Section: Social media -->

      <!-- Section: Links  -->
      <section class="">
        <div class="container text-center text-md-start mt-5">
          <!-- Grid row -->
          <div class="row mt-3">
            <!-- Grid column -->
            <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
              <!-- Content -->
              <h6 class="text-uppercase fw-bold">THE SOURTHDANG</h6>
              <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #7c4dff; height: 2px" />
              <p>
                The SouthDang là thương hiệu đồ áo và đồ lưu niệm độc đáo, ra đời từ miền Nam nhiệt đới. Những thiết kế
                của họ kết hợp sự sáng tạo và tình yêu với vùng đất này. Đồ áo của The SouthDang không chỉ là trang phục
                mà còn là biểu tượng văn hóa độc đáo của miền Nam.
              </p>
            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
              <!-- Links -->
              <h6 class="text-uppercase fw-bold">Tất cả sản phẩm</h6>
              <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #7c4dff; height: 2px" />
              <?php foreach($category as $value) { ?>
                  <p>
                  <a href="../category/?id= <?php echo $value['id'] ?>" class="text-dark"><?php echo $value['name_category'] ?></a>
                </p>
              <?php } ?>
            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
              <!-- Links -->
              <h6 class="text-uppercase fw-bold">Liên kết hữu ích</h6>
              <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #7c4dff; height: 2px" />
              <p>
                <a href="#!" class="text-dark">Tài khoản của bạn</a>
              </p>
              <p>
                <a href="#!" class="text-dark">Trờ thành thành viên</a>
              </p>
              <p>
                <a href="#!" class="text-dark">Giá cả giao hàng</a>
              </p>
              <p>
                <a href="#!" class="text-dark">Giúp đỡ</a>
              </p>
            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
              <!-- Links -->
              <h6 class="text-uppercase fw-bold">Liên hệ</h6>
              <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #7c4dff; height: 2px" />
              <p><i class="fas fa-home mr-3"></i> Trịnh Văn Bô, Hà Nội, Việt Nam</p>
              <p><i class="fas fa-envelope mr-3"></i> namkoj1507@gmail.com</p>
              <p><i class="fas fa-phone mr-3"></i> + 84 978 930 985</p>
              <p><i class="fas fa-print mr-3"></i> + 84 978 930 985</p>
            </div>
            <!-- Grid column -->
          </div>
          <!-- Grid row -->
        </div>
      </section>
      <!-- Section: Links  -->

      <!-- Copyright -->
      <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
        © 2023 Copyright:
        <a class="text-dark" href="https://mdbootstrap.com/">THE SOURTDANG</a>
      </div>
      <!-- Copyright -->
    </footer>
    <!-- Footer -->
  </div>
  <!-- End of .container -->
<?php } ?>