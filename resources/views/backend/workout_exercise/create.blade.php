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
        <form action= "{{ route('admin.workout_exercise-create_') }}" id="form-workout_exercise" method ="POST" enctype="multipart/form-data" >
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
                                <label for="inputNanme4" class="form-label-customize">Cấp độ <span class="note">(*)</span></label>
                                <input type="text" class="form-control-customize " id="inputNanme4" name="capdo">
                            </div>

                            <div class="col-12">
                                <label for="inputNanme4" class="form-label-customize">Thời gian<span class="note">(* Tháng)</span></label>
                                <input type="text" class="form-control-customize " id="inputNanme4" name="thoigian">
                            </div>


                            <div class="col-12">
                                <label for="inputNanme4" class="form-label-customize">Giá tiền gói tập <span class="note">(* VND)</span></label>
                                <input type="number" class="form-control-customize " id="inputNanme4" name="giatien">
                            </div>
                            
                            <div class="col-12">
                                <label for="inputNanme4" class="form-label-customize">Mô tả <span class="note">(*)</span></label>
                                <textarea type="text" class="form-control-customize ck-editor"id="description" data_height="100" name="description"></textarea>
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
                                <!-- <div class="card-body">
                                    <img class="img-cover" src="assets/backend/img/no-image.jpg" alt="">
                                    <input class="form-control mt-3" type="file" id="formFile" name="image">
                                </div> -->

                            <div class="card">
                                <!-- <div class="card-header text-uppercase">Ảnh đại diện</div> -->
                                    <div class="card-body">
                                        <img 
                                            class="img-cover" 
                                            src="assets/backend/img/no-image.jpg" 
                                            alt="Avatar" 
                                            id="avatar-image" 
                                            style="cursor: pointer; max-width: 100%; height: 170px; object-fit: cover;" 
                                            onclick="document.getElementById('avatar-input').click();" 
                                        >
                                        <input type="file" name="image" id="avatar-input" class="form-control" style="display: none;" onchange="previewImage(event)">
                                    </div>
                                    <script>
                                        function previewImage(event) {
                                            const image = document.getElementById('avatar-image');
                                            image.src = URL.createObjectURL(event.target.files[0]);
                                        }
                                    </script>
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
                                    <input type="text" name="pt">
                                </div>
                        </div>
                        
                </div>

                </div>
            </div>
        </form>
    </section>

</main><!-- End #main -->

<script>
   
    $('#form-workout_exercise').on('submit', function(e) {
        e.preventDefault();

        let description = CKEDITOR.instances['description'].getData();

        let formData = $(this).serialize() + '&description=' + encodeURIComponent(description);
        
        $.post('http://127.0.0.1:8000/api/admin/workout_exercise', formData, function(res) {
            Swal.fire({
                title: "Thành công!",
                text: "Thêm thành công bài tập!",
                icon: "success"
                });
        })
        $('#form-workout_exercise')[0].reset();
        CKEDITOR.instances['description'].setData('');
    });


</script>
@endsection