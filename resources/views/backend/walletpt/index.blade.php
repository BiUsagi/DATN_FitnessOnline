@extends('backend/layouts/app-admin')


@section('main')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">

            <!-- Left side columns -->
            <div class="col-lg-8">
                <div class="row">
                    <!-- Customers Card -->
                    <div class="col-xxl-12 col-xl-12">

                        <div class="card info-card revenue-card">



                            <div class="card-body">
                                <h5 class="card-title">Số dư của bạn<span></span></h5>

                                <div class="d-flex align-items-center">
                                    <div
                                        class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-currency-dollar"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6><span
                                                class="text-danger small pt-1 fw-bold"><?php echo number_format($sodu, 0, ',', '.'); ?>
                                            </span> VNĐ</h6>
                                    </div>
                                    <a class="btn-customize ms-3" href="/admin/walletpt/ruttien">Rút tiền</a>
                                </div>

                            </div>
                        </div>

                    </div> <!-- End Customers Card -->

                    <!-- Sales Card -->
                    <div class="col-xxl-6 col-md-6">
                        <div class="card info-card sales-card">

                            <div class="card-body">
                                <h5 class="card-title">Tổng gói tập<span></span></h5>

                                <div class="d-flex align-items-center">
                                    <div
                                        class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-cart"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6><?php echo $tonggt ?> gói tập</h6>


                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Sales Card -->

                    <!-- Revenue Card -->
                    <div class="col-xxl-6 col-md-6">
                        <div class="card info-card revenue-card">



                            <div class="card-body">
                                <h5 class="card-title">Doanh thu tháng này<span></span></h5>

                                <div class="d-flex align-items-center">
                                    <div
                                        class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-currency-dollar"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6><?php echo number_format($tongdt, 0, ',', '.'); ?>
                                            VNĐ</h6>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- End Revenue Card -->





                    <div class="col-12">
                        <div class="card top-selling overflow-auto">

                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                            </div>

                            <div class="card-body pb-0">
                                <h5 class="card-title">Lịch sử rút tiền<span></span></h5>

                                <!-- table -->
                                <table class="table datatable">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Giá</th>
                                            <th>Nội dung</th>
                                            <th class="text-center">Mã giao dịch</th>
                                            <th class="text-center">Thời gian</th>
                                            <th class="text-center">Trạng thái</th>
                                            <!-- <th></th> -->
                                        </tr>
                                    </thead>

                                    <tbody class="show-data">
                                        <?php
                                            foreach ($Deposit_histories->reverse() as $item) {
                                                $status = $item->status === 1 
                                                ? '<i class="bx bx-check text-success">Hoàn tất</i>' 
                                                : ($item->status === 0 
                                                    ? '<i class="bx bx-time text-warning"> Chờ</i>' 
                                                    : '<i class="ri-close-circle-line text-danger"> Đã hủy</i>');

                                                if ($item->amount == 10000) {
                                                    $amountClass = 'money-10k';
                                                } elseif ($item->amount == 20000) {
                                                    $amountClass = 'money-20k';
                                                } elseif ($item->amount == 50000) {
                                                    $amountClass = 'money-50k';
                                                } elseif ($item->amount == 100000) {
                                                    $amountClass = 'money-100k';
                                                } elseif ($item->amount == 200000) {
                                                    $amountClass = 'money-200k';
                                                } elseif ($item->amount == 500000) {
                                                    $amountClass = 'money-500k';
                                                } elseif ($item->amount == 1000000) {
                                                    $amountClass = 'money-1tr';
                                                } elseif ($item->amount == 2000000) {
                                                    $amountClass = 'money-2tr';
                                                } else {
                                                    $amountClass = 'money-other';
                                                }

                                                echo'
                                                    <tr>
                                                        <td class="text-center" id="'.$amountClass.'"><strong>'.number_format($item->amount, 0, ',', '.').'</strong></td>
                                                        <td>'.$item->description.'</td>
                                                        <td class="text-center">'.$item->transaction_id.'</td>
                                                        <td class="text-center">'.$item->created_at.'</td>
                                                        <td class="text-center">'.$status.'</td>
                                                    </tr>
                                                ';
                                            }
                                        ?>

                                    </tbody>
                                </table>

                            </div>

                        </div>
                    </div><!-- End Top Selling -->

                </div>
            </div><!-- End Left side columns -->

            <!-- Right side columns -->
            <div class="col-lg-4">

                <!-- Recent Activity -->
                <div class="card">

                    <div class="card-body">
                        <h5 class="card-title">Hoạt động gần đây <span>| Hôm nay</span></h5>

                        <div class="activity">
                            <?php
                                foreach ($notifications as $tb) {
                                    echo'
                                        <div class="activity-item d-flex">
                                            <div class="activite-label">'. $tb->created_at->setTimezone('Asia/Ho_Chi_Minh')->format('H:i') .'</div>

                                            <i class="bi bi-circle-fill activity-badge text-success align-self-start"></i>
                                            <div class="activity-content">
                                                <a href="#" class="fw-bold text-dark">'.$tb->message.'</a>
                                            </div>
                                        </div>
                                    ';
                                }
                            ?>

                            
                            <!-- <div class="activity-item d-flex">
                                <div class="activite-label">15:03</div>
                                <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>
                                <div class="activity-content">
                                    <a href="#" class="fw-bold text-dark">Luân đã mua gói tập cấp tốc.</a>
                                </div>
                            </div>

                            <div class="activity-item d-flex">
                                <div class="activite-label">09:05</div>
                                <i class='bi bi-circle-fill activity-badge text-danger align-self-start'></i>
                                <div class="activity-content">
                                    <a href="#" class="fw-bold text-dark">Tuấn pro đã mua gói tập cơ bản.</a>
                                </div>
                            </div>

                            <div class="activity-item d-flex">
                                <div class="activite-label">07:03</div>
                                <i class='bi bi-circle-fill activity-badge text-primary align-self-start'></i>
                                <div class="activity-content">
                                    <a href="#" class="fw-bold text-dark">Rin đã nộp 1 video.</a>
                                </div>
                            </div> -->

                        </div>

                    </div>
                </div><!-- End Recent Activity -->






            </div>

        </div>
    </section>

</main>
<!-- End #main -->

@endsection