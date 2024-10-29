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
                        <div class="card-body mt-3">
                            <!-- Row start -->
                            <div class="row">
                                <div class="col-xxl-3 col-sm-3 col-12">
                                    <img src="assets/frontend/images/logo.svg" alt="Bootstrap Admin Dashboard"
                                        class="img-fluid bg-black">
                                </div>
                                <div class="col-sm-9 col-12">
                                    <div class="text-end">
                                        <p class="mb-2">
                                            Đơn hàng số. - <span class="text-danger"> #{{ $data->id }}</span>
                                        </p>
                                        <p class="mb-2"><span id="currentMonth"></span>2024</p>
                                        <span class="badge bg-success">Paid</span>
                                    </div>
                                </div>
                                <div class="col-12 mb-5"></div>
                            </div>
                            <!-- Row end -->

                            <!-- Row start -->
                            <div class="row justify-content-between">
                                <div class="col-lg-6 col-12">
                                    <h6 class="fw-semibold">Employee Details :</h6>
                                    <p class="m-0">
                                        Dr. Hamspire Jordan,<br>
                                        Surgeon,<br>
                                        8900 Gilsion Ave,<br>
                                        San Francisco, California(CA), 66700
                                    </p>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="text-end">
                                        <h6 class="fw-semibold">Hospital Address :</h6>
                                        <p class="text-end m-0">
                                            Workout LTD, 76890 St. <br>
                                            5000 thomos Street, Suite 980<br>
                                            Huntsville, Alabama, 87890
                                        </p>
                                    </div>
                                </div>
                                <div class="col-12 mb-3"></div>
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
                                                        <th>Details</th>
                                                        <th>No. Of Working Days</th>
                                                        <th>Basic</th>
                                                        <th>HRA</th>
                                                        <th>Bonus</th>
                                                        <th>Tax</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <p>
                                                                Salary details in detail.
                                                            </p>
                                                        </td>
                                                        <td>25</td>
                                                        <td>
                                                            <h6>$5000</h6>
                                                        </td>
                                                        <td>
                                                            <h6>$2000</h6>
                                                        </td>
                                                        <td>
                                                            <h6>$500</h6>
                                                        </td>
                                                        <td>
                                                            <h6>$300</h6>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="4">&nbsp;</td>
                                                        <td>
                                                            <p>Subtotal</p>
                                                            <p>Deductions</p>
                                                            <h5 class="text-primary">Earnings</h5>
                                                        </td>
                                                        <td>
                                                            <p>$7800.00</p>
                                                            <p>$300.00</p>
                                                            <h5 class="text-primary">$7500.00</h5>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="6">
                                                            <h6 class="text-info">Importannt Note:</h6>
                                                            <p class="small m-0">
                                                                We really appreciate your business and
                                                                if
                                                                there’s anything else we can do, please
                                                                let us know! Also, should you need us to
                                                                add VAT or anything else to this order,
                                                                it’s super easy since this is a
                                                                template,
                                                                so just ask!
                                                            </p>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Row end -->

                            <!-- Row start -->
                            <div class="row">
                                <div class="col-sm-12 col-12">
                                    <div class="d-flex justify-content-end gap-2">
                                        <button class="btn btn-outline-secondary">
                                            Download
                                        </button>
                                        <button class="btn btn-primary">
                                            Print
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <!-- Row end -->
                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main><!-- End #main -->
@endsection
