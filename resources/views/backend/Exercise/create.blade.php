@extends('backend/layouts/app-admin')
@section('main')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Quản lí bài tập</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Admin</a></li>
                <li class="breadcrumb-item">Quản lí bài tập</li>
                <li class="breadcrumb-item active">Thêm mới bài tập</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <form action="{{route('admin.exercise-add')}}" method="post">
            @csrf
            <div class="row">
                <div class="col-lg-9">
                    
                    <div class="card">
                        <div class="card-header text-uppercase">THÔNG TIN CHUNG</div>
                        <div class="card-body">   
                            <div class="col-12">
                                <label for="inputNanme4" class="form-label-customize">Tên bài tập <span class="note">(*)</span></label>
                                <input type="text" class="form-control-customize" name="exercise-name" id="inputNanme4">
                            </div>
                            
                            <div class="col-12">
                                <div class="label d-flex justify-content-between">
                                    <label for="inputNanme4" class="form-label-customize">Video ID <span class="note">(*)</span></label>
                                </div>
                                <div class="input-group-customize mb-3">
                                    <span class="input-group-text baseURL" id="basic-addon3" style="font-size: 14px">https://www.youtube.com/watch?v=</span>
                                    <input type="text" class="form-control-link" name="exercise-id" id="basic-url" aria-describedby="basic-addon3" style="outline: none;">
                                </div>
                            </div>

                            <div class="col-12">
                                <label for="inputNanme4" class="form-label-customize">Mô tả <span class="note">(*)</span></label>
                                <textarea type="text" class="form-control-customize ck-editor" id="description" name="exercise-description" data_height="100"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                            <div class="card-header text-uppercase">BÀI TẬP VỪA THÊM</div>
                                <div class="card-body">                   
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Tên bài tập</th>
                                            </tr>
                                        </thead>
                                        @for( $i=1; $i<=5; $i++)
                                            <tr>
                                                <td>{{$i}}</td>
                                                <td>Bài tập số {{$i}} </td>
                                            </tr>
                                        @endfor
                                        <tbody>

                                        </tbody>
                                    </table>     
                                </div>
                        </div>
                </div>
                <div class="col-lg-3">
                        <div class="card">
                                <div class="card-header text-uppercase">Trạng thái</div>
                                <div class="card-body">
                                    <select name="exercise-status" id="select2" class="form-control-select2 setupSelect2">
                                        <option value="0">Trạng thái</option>
                                        <option value="1">Công khai bài viết</option>
                                        <option value="2">Ẩn bài viết</option>
                                    </select>
                                        {{-- <img class="img-cover" src="assets/backend/img/no-image.jpg" alt=""> --}}
                                </div>  
                        </div>

                        <div class="card">
                            <div class="card-header text-uppercase">GÓI TẬP</div>
                                <div class="card-body">
                                    <select class="form-control-customize setupSelect2" aria-label="Default select example">
                                        <option selected>--Gói Tập--</option>
                                        <option value="1">Gói 3 tháng</option>
                                        <option value="2">Gói 6 tháng</option>
                                        <option value="3">Gói 12 tháng</option>
                                    </select>
                                </div>
                        </div>
                        <div class="btn-add-reset d-flex justify-content-between ms-2 me-2">
                            <input type="submit" class="btn btn-primary mt-3" value="+ Thêm bài tập">
                            <input type="reset" class="btn btn-secondary mt-3" value="Hoàn tác">
                        </div>
                </div>
                </div>
            </div>
        </form>
    </section>

</main><!-- End #main -->
@endsection