@extends('backend/layouts/app-admin')
@section('main')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Quản lí gói tập</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Admin</a></li>
                <li class="breadcrumb-item">Quản lí gói tập</li>
                <li class="breadcrumb-item active">Cập nhật gói tập</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <form action= "{{ route('admin.exerciseset-update_', ['id' => $update_id->id ]) }}  " method ="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-lg-9">
                    
                    <div class="card">
                        <div class="card-header text-uppercase">THÔNG TIN CHUNG</div>
                        <div class="card-body">                
                
                            <div class="col-12">
                                <label for="inputNanme4" class="form-label-customize">Tên gói tập <span class="note">(*)</span></label>
                                <input type="text" class="form-control-customize " id="inputNanme4" name="tengoitap" value="{{ $update_id->name_package }}">
                            </div>

                            <div class="col-12">
                                <label for="inputNanme4" class="form-label-customize">Giá tiền gói tập <span class="note">(*)</span></label>
                                <input type="number" class="form-control-customize " id="inputNanme4" name="giatien" value="{{ $update_id->price }}">
                            </div>
                            
                            <div class="col-12">
                                <label for="inputNanme4" class="form-label-customize">Mô tả <span class="note">(*)</span></label>
                                <textarea type="text" class="form-control-customize ck-editor"id="description" data_height="100" name="mota">{{ $update_id->description }}</textarea>
                            </div>

                            <div class="col-12">
                                <label for="inputNanme4" class="form-label-customize">Dụng cụ<span class="note">(*)</span></label>
                                <input type="text" class="form-control-customize " id="inputNanme4" name="dungcu" value="{{ $update_id->tool }}">
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
                                    <input class="form-control mt-3" type="file" id="formFile" name="image">
                                </div>
                        </div>

                        <div class="card">
                            <div class="card-header text-uppercase">CHỌN PT</div>
                                <div class="card-body">
                                    <!-- <select class="form-control-customize setupSelect2" aria-label="Default select example">
                                        <option selected name="pt">--PT--</option>
                                        <option value="1" >PT 1</option>
                                        <option value="2" >PT 2</option>
                                        <option value="3">PT 3</option>
                                    </select> -->
                                    <input type="text" name="pt" value="{{ $update_id->staff_id }}">
                                </div>
                        </div>
                        
                </div>

                </div>
            </div>
        </form>
    </section>
</main><!-- End #main -->
@endsection