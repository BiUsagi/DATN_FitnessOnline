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
        <div class="row">
            <div class="col-lg-9">
                
                <div class="card">
                    <div class="card-header text-uppercase">THÔNG TIN CHUNG</div>
                    <div class="card-body">                

                        <div class="col-12">
                            <label for="inputNanme4" class="form-label-customize">Tên bài tập <span class="note">(*)</span></label>
                            <input type="text" class="form-control-customize " id="inputNanme4">
                        </div>
                        
                        <div class="col-12">
                            <label for="inputNanme4" class="form-label-customize">Mô tả <span class="note">(*)</span></label>
                            <textarea type="text" class="form-control-customize ck-editor"id="description" data_height="100"></textarea>
                        </div>
                        
                        <input type="submit" class="btn btn-primary mt-3" value="Thêm bài tập">

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
                                <select name="" id="select2" class="form-control-select2 setupSelect2">
                                    <option value="0">Trạng thái</option>
                                    <option value="1">Công khai bài viết</option>
                                    <option value="2">Ẩn bài viết</option>
                                </select>
                                    {{-- <img class="img-cover" src="assets/backend/img/no-image.jpg" alt=""> --}}
                            </div>  
                    </div>

                    <div class="card">
                        <div class="card-header text-uppercase">VIDEO</div>
                            <div class="card-body">
                                <img class="img-cover" src="assets/backend/img/no-video.jpg" alt="">
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
                    
            </div>

            </div>
        </div>
    </section>

</main><!-- End #main -->
@endsection