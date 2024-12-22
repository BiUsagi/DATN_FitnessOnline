@extends('backend/layouts/app-admin')
@section('main')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Đơn Hàng</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                    <li class="breadcrumb-item">Đơn hàng</li>
                    <li class="breadcrumb-item">Danh sách đơn hàng</li>
                    <li class="breadcrumb-item active">Chi tiết đơn hàng</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div id="invoice" class=" card-body mt-3">
                            <!-- Row start -->
                            <div class="row">
                                <div class="col-xxl-3 col-sm-3 col-12">
                                    <img src="logo/fitness-online dark.png" alt="Bootstrap Admin Dashboard"
                                        class="img-fluid">
                                </div>
                                <div class="col-sm-9 col-12">
                                    <div class="text-end">
                                        <p class="mb-2">
                                            Đơn hàng số. - <span class="text-danger"> #{{ $data->id }}</span>
                                        </p>
                                        <p class="mb-2"><span id="currentMonth"></span>{{ $data->created_at }}</p>
                                        <span class="badge bg-success">Thành Công</span>
                                    </div>
                                </div>
                                <div class="col-12 mb-5"></div>
                            </div>
                            <!-- Row end -->


                            <!-- Row start -->
                            <div class="row">
                                <div class="col-12">
                                    <div class="table-outer mb-2 border rounded">
                                        <div class="table-responsive">
                                            <table class="table m-0 ">
                                                <thead>
                                                    <tr>
                                                        <th>Gói Tập</th>
                                                        <th>Khách Hàng</th>
                                                        <th>Giá Tiền (VND)</th>
                                                        <th>Giảm Giá (VND)</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <p>
                                                                #{{ $data->workout_package_id }} -
                                                                {{ $data->getWorkoutPackageName() }}
                                                            </p>
                                                        </td>
                                                        <td>{{ $data->getUserName() }}</td>
                                                        <td>
                                                            <h6> {{ number_format($data->original_price, 0, ',', '.') }}
                                                            </h6>
                                                        </td>

                                                        <td>
                                                            <h6>{{ number_format($data->purchase_price, 0, ',', '.') }}</h6>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2">&nbsp;</td>
                                                        <td>
                                                            <p>Tồng Thu</p>
                                                            <p>Giảm Giá</p>
                                                            <h5 class="text-primary">Thanh Toán</h5>
                                                        </td>
                                                        <td>
                                                            <p> {{ number_format($data->original_price, 0, ',', '.') }}
                                                            </p>
                                                            <p>{{ number_format($data->original_price - $data->purchase_price, 0, ',', '.') }}
                                                            </p>
                                                            <h5 class="text-primary">
                                                                {{ number_format($data->purchase_price, 0, ',', '.') }} VND
                                                            </h5>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="6">
                                                            <h6 class="note">Chú Thích:</h6>
                                                            <p class="small m-0">
                                                                Nếu có bất kỳ điều gì khác chúng tôi có thể làm, vui lòng
                                                                cho chúng tôi biết!
                                                            </p>
                                                            <p class="small m-0">Email: fitnessonline@gmail.com</p>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Row end -->


                        </div>
                        <!-- Row start -->
                        <div class="row mt-3 me-2 mb-4">
                            <div class="col-sm-12 col-12">
                                <div class="d-flex justify-content-end gap-2">
                                    <button class="btn btn-outline-secondary">
                                        Tải xuống
                                    </button>
                                    <button class="btn btn-primary">
                                        In ra
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- Row end -->
                    </div>

                </div>
            </div>
        </section>

    </main><!-- End #main -->
@endsection


@section('custom_js')
    <!-- jsPDF library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <!-- html2canvas library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>

    <script>
        // Tải xuống
        document.querySelector('.btn-outline-secondary').addEventListener('click', function() {
            // Lấy phần hóa đơn
            const invoice = document.getElementById('invoice');

            // Sử dụng html2canvas để chụp màn hình nội dung
            html2canvas(invoice).then(canvas => {
                const imgData = canvas.toDataURL('image/png');
                const {
                    jsPDF
                } = window.jspdf;
                const pdf = new jsPDF('p', 'mm', 'a4');

                const imgWidth = 190; // Độ rộng hình ảnh
                const pageHeight = pdf.internal.pageSize.height;
                const imgHeight = (canvas.height * imgWidth) / canvas.width;
                let heightLeft = imgHeight;
                let position = 10;

                pdf.addImage(imgData, 'PNG', 10, position, imgWidth, imgHeight);
                heightLeft -= pageHeight;

                while (heightLeft >= 0) {
                    position = heightLeft - imgHeight;
                    pdf.addPage();
                    pdf.addImage(imgData, 'PNG', 10, position, imgWidth, imgHeight);
                    heightLeft -= pageHeight;
                }

                pdf.save(`Đơn Hàng_{{ $data->id }}.pdf`);
            });
        });
    </script>


    <script>
        // In
        document.querySelector('.btn-primary').addEventListener('click', function() {
            const printContent = document.getElementById('invoice').innerHTML;
            const originalContent = document.body.innerHTML;

            // Đổi nội dung của body thành chỉ phần hóa đơn
            document.body.innerHTML = printContent;

            // Kích hoạt chức năng in
            window.print();

            // Khôi phục lại nội dung ban đầu của body
            document.body.innerHTML = originalContent;
        });
    </script>
@endsection
