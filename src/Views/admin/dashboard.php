<div class="pcoded-content">

    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-home bg-c-blue"></i>
                    <div class="d-inline">
                        <h5>Thống kê</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class=" breadcrumb breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="/addmin/dashboard"><i class="feather icon-home"></i></a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Thống kê</a> </li>
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
                                    <h5>Thống kê các loại sản phẩm</h5>
                                </div>
                                <div class="card-block d-flex">
                                    <div class="col-6">
                                        <canvas id="myChart" width="400" height="200"></canvas>
                                    </div>
                                    <div class="col-6">
                                        <div class="col-12">
                                            <div class="card comp-card">
                                                <div class="card-body">
                                                    <div class="row align-items-center">
                                                        <div class="col">
                                                            <h6 class="m-b-25">Số lượng đơn hàng</h6>
                                                            <h3 class="f-w-700 text-c-blue"><?= $countOrder?> đơn</h3>
                                                            <p class="m-b-0"><?=$time?></p>
                                                        </div>
                                                        <div class="col-auto">
                                                            <i class="fas fa-eye bg-c-blue"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card comp-card">
                                                <div class="card-body">
                                                    <div class="row align-items-center">
                                                        <div class="col">
                                                            <h6 class="m-b-25">Mục tiêu</h6>
                                                            <h3 class="f-w-700 text-c-green">100 đơn/ ngày</h3>
                                                            <p class="m-b-0"><?=$time?></p>
                                                        </div>
                                                        <div class="col-auto">
                                                            <i class="fas fa-bullseye bg-c-green"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card comp-card">
                                                <div class="card-body">
                                                    <div class="row align-items-center">
                                                        <div class="col">
                                                            <h6 class="m-b-25">Impact</h6>
                                                            <h3 class="f-w-700 text-c-yellow">42.6%</h3>
                                                            <p class="m-b-0">May 23 - June 01 (2017)</p>
                                                        </div>
                                                        <div class="col-auto">
                                                            <i class="fas fa-hand-paper bg-c-yellow"></i>
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

            </div>
        </div>
    </div>

</div>



<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: <?php echo json_encode($label, JSON_UNESCAPED_UNICODE) ?>,
            datasets: [{
                label: 'Thống kê về loại sản phẩm',
                data: <?php echo json_encode($datas, JSON_UNESCAPED_UNICODE) ?>,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            // Các tùy chọn khác có thể được thêm vào tùy theo nhu cầu của bạn
        }
    });
</script>