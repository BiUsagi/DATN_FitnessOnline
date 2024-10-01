@extends('backend/layouts/app-admin')
@section('main')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Quản lí gói tập</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Admin</a></li>
                <li class="breadcrumb-item">Quản lí gói tập</li>
                <li class="breadcrumb-item active">Thêm mới gói tập</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <form action= "{{ route('admin.exerciseset-create_') }}" method ="POST">
            @csrf
            <div class="row">
                <div class="col-lg-9">
                    
                    <div class="card">
                        <div class="card-header text-uppercase">THÔNG TIN CHUNG</div>
                        <div class="card-body">                
                
                            <div class="col-12">
                                <label for="inputNanme4" class="form-label-customize">Tên gói tập <span class="note">(*)</span></label>
                                <input type="text" class="form-control-customize " id="inputNanme4" name="tengoitap">
                            </div>

                            <div class="col-12">
                                <label for="inputNanme4" class="form-label-customize">Giá tiền gói tập <span class="note">(*)</span></label>
                                <input type="text" class="form-control-customize " id="inputNanme4">
                            </div>
                            
                            <div class="col-12">
                                <label for="inputNanme4" class="form-label-customize">Mô tả <span class="note">(*)</span></label>
                                <textarea type="text" class="form-control-customize ck-editor"id="description" data_height="100"></textarea>
                            </div>

                            <div class="col-12">
                                <label for="inputNanme4" class="form-label-customize">Dụng cụ<span class="note">(*)</span></label>
                                <input type="text" class="form-control-customize " id="inputNanme4">
                            </div>

                            <input type="submit" class="btn btn-primary mt-3" value="Thêm gói tập">

                        </div>
                    </div>

                    <div class="card">
                            <div class="card-header text-uppercase">GÓI TẬP VỪA THÊM</div>
                                <div class="card-body">                   
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Tên gói tập</th>
                                                <th>PT</th>
                                                <th>Giá gói tập</th>
                                            </tr>
                                        </thead>
                                        @for( $i=1; $i<=5; $i++)
                                            <tr>
                                                <td>{{$i}}</td>
                                                <td>Bài tập số {{$i}} </td>
                                                <td>PT {{$i}} </td>
                                                <td>200.000 VND</td>
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
                            <div class="card-header text-uppercase">HÌNH ẢNH</div>
                                <div class="card-body">
                                    <img class="img-cover" src="assets/backend/img/no-image.jpg" alt="">
                                </div>
                        </div>

                        <div class="card">
                            <div class="card-header text-uppercase">CHỌN PT</div>
                                <div class="card-body">
                                    <select class="form-control-customize setupSelect2" aria-label="Default select example">
                                        <option selected>--PT--</option>
                                        <option value="1">PT 1</option>
                                        <option value="2">PT 2</option>
                                        <option value="3">PT 3</option>
                                    </select>
                                </div>
                        </div>
                        
                </div>

                </div>
            </div>
        </form>
    </section>

</main><!-- End #main -->
@endsection