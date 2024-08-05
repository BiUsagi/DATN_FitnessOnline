@extends('backend/layouts/app-admin')
@section('main')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Chăm sóc khách hàng</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Admin</a></li>
                <!-- <li class="breadcrumb-item"></li> -->
                <li class="breadcrumb-item active">Chăm sóc khách hàng</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <div class="title-top d-flex justify-content-between">
                            <h5 class="card-title text-uppercase">Danh sách câu hỏi</h5>
                        </div>

                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nội dung</th>
                                    <th>Bài tập</th>
                                    <th>Khách hàng</th>
                                    <th data-type="date" data-format="YYYY/DD/MM">Ngày đăng</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($supportExercises as $sp)
                                    <tr>
                                        <td>{{ $sp['id'] }}</td>
                                        <td>{{ $sp['content'] }}</td>
                                        <td>{{ $sp['name_exercise'] }}</td>
                                        <td>{{ $sp['name_user'] }}</td>
                                        <td>{{ $sp['created_at'] }}</td>
                                    </tr>
                                @endforeach

                                <!-- @for ($i = 1; $i <= 100; $i++)
                                    <tr>
                                        <td>{{$i}}</td>
                                        <td>Bài này có khó quá không</td>
                                        <td>Tập tay</td>
                                        <td>Phước Luân</td>
                                        <td>2005/02/11</td>
                                    </tr>
                                @endfor -->


                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->

                    </div>
                </div>

            </div>
        </div>
    </section>

</main><!-- End #main -->
@endsection