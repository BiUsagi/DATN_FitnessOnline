@extends('backend/layouts/app-admin')
@section('main')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Quản lí gói tập</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Admin</a></li>
                <li class="breadcrumb-item">Quản lý gói tập</li>
                <li class="breadcrumb-item active">Danh sách gói tập</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                            <div class="title-top d-flex justify-content-between">
                                <h5 class="card-title text-uppercase">Danh sách gói tập</h5>
                                <a href="{{route('admin.exerciseset-create')}}" class="btn-customize"><i class="bi bi-plus-lg"></i> Thêm mới gói tập</a>
                            </div>
                        <!-- <p>Add lightweight datatables to your project with using the <a
                                href="https://github.com/fiduswriter/Simple-DataTables" target="_blank">Simple
                                DataTables</a> library. Just add <code>.datatable</code> class name to any table you
                            wish to conver to a datatable. Check for <a
                                href="https://fiduswriter.github.io/simple-datatables/demos/" target="_blank">more
                                examples</a>.</p> -->

                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>
                                        <b>Tên gói tập</b>
                                    </th>
                                    <th>Hình ảnh</th>
                                    <th>Cấp độ</th>
                                    <th data-type="date" data-format="YYYY/DD/MM">Ngày đăng</th>
                                    <th>PT</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                               @foreach($all as $s)
                                    <tr>
                                        <td>{{ $s->id }}</td>    
                                        <td>{{ $s->package_name }}</td>
                                        <td>
                                            <img src="uploads/gym_package/{{$s->image}}" style="width:70px; height:70px" alt="">
                                        </td>
                                        <td>{{ $s->level }}</td>
                                        <td>{{ $s->created_at->format('d-m-Y') }}</td>
                                        <td>{{ $s->staff_id }}</td>
                                        <td>
                                            <a href=" " class="btn btn-info text-white">
                                                <i class="ri-eye-fill"></i>
                                            </a>

                                            <a href="{{ route('admin.exerciseset-update', ['id' => $s->id ]) }} " class="btn btn-warning text-white">
                                                <i class="bi bi-pencil-fill"></i>
                                            </a>

                                           <button class="btn btn-danger" id="deleteButton">
                                                 <i class="bi bi-trash3"></i>
                                           </button>

                                        </td>
                                    </tr>
                               @endforeach
                                

                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->

                    </div>
                </div>

            </div>
        </div>
    </section>

    <script>
        
    </script>
</main><!-- End #main -->
@endsection