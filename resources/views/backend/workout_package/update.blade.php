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
        <form action= "" method ="POST" id="form-workout_package_update" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-lg-9">
                    
                    <div class="card">
                        <div class="card-header text-uppercase">THÔNG TIN CHUNG</div>
                        <div class="card-body">                

                            <input type="hidden" name="staff_id" value="{{ $pt_id->id }}">

                            <div class="col-12">    
                                <label for="inputNanme4" class="form-label-customize">Tên gói tập <span class="note">(*)</span></label>
                                <input type="text" class="form-control-customize " id="inputNanme4" name="package_name" value="{{ $update_id->package_name }}">
                            </div>

                            <div class="col-12">
                                <label for="inputNanme4" class="form-label-customize">Thời gian<span class="note">(* Ngày)</span></label>
                                <input type="text" class="form-control-customize " id="inputNanme4" name="duration_days" value="{{ $update_id->duration_days }}">
                            </div>

                            <div class="col-12">
                                <label for="inputNanme4" class="form-label-customize">Giá tiền gói tập <span class="note">(* VND)</span></label>
                                <input type="number" class="form-control-customize " id="inputNanme4" name="price" value="{{ $update_id->price }}">
                            </div>
                            
                            <div class="col-12">
                                <label for="inputNanme4" class="form-label-customize">Mô tả <span class="note">(*)</span></label>
                                <textarea type="text" class="form-control-customize ck-editor"id="description" data_height="100" name="description">{{ $update_id->description}}</textarea>
                            </div>


                            <input type="submit" class="btn btn-primary mt-3" value="Cập nhật gói tập">

                        </div>
                    </div>

                    


                </div>

                <div class="col-lg-3">
                <div class="card">
                            <div class="card-header text-uppercase">HÌNH ẢNH</div>
                            <img class="img-cover" src="uploads/gym_package/{{ $update_id->image }}" alt="Avatar" id="avatar-image"
                                onclick="document.getElementById('avatar-input').click();">
                            <input type="file" name="image" id="avatar-input" class="form-control"
                                style="display: none;" onchange="previewImage(event)">
                        </div>
                        <script>
                            function previewImage(event) {
                                const image = document.getElementById('avatar-image');
                                image.src = URL.createObjectURL(event.target.files[0]);
                            }
                        </script>


                        <div class="card">
                            <div class="card-header text-uppercase">Trạng thái</div>
                            <div class="card-body">
                                <select name="status" id="select2" class="form-control-select2 setupSelect2">
                                    @if ( $update_id->status  == 0)
                                        <option value="{{$update_id->status}}">Ẩn bài viết</option>
                                    @elseif ( $update_id->status  == 1)
                                    <option value="{{$update_id->status}}">Công khai bài viết</option>
                                    @else
                                        <option value="0">--Chọn--</option>
                                    @endif
                                    <option value="0">Ẩn bài viết</option>
                                    <option value="1">Công khai bài viết</option>
                                </select>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header text-uppercase">Cấp độ</div>
                            <div class="card-body">
                                <select name="level" id="level" class="form-control-select2 setupSelect2">\
                                    @if ( $update_id->level  == 'Người Mới Bắt Đầu')
                                        <option value="{{$update_id->level}}">Người Mới Bắt Đầu</option>
                                    @elseif ( $update_id->level  == 'Trung Cấp')
                                        <option value="{{$update_id->level}}">Trung Cấp</option>
                                    @elseif ( $update_id->level  == 'Nâng Cao')
                                        <option value="{{$update_id->level}}">Nâng Cao</option>
                                    @else
                                        <option value="0">Chọn cấp độ</option>
                                    @endif
                                    <option value="Người Mới Bắt Đầu">Người Mới Bắt Đầu</option>
                                    <option value="Trung Cấp">Trung Cấp</option>
                                    <option value="Nâng Cao">Nâng Cao</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="card">
                            <div class="card-header text-uppercase">Cấp độ đặc biệt</div>
                            <div class="card-body">
                                <select name="special_level" id="special_level" class="form-control-select2 setupSelect2">
                                    @if ( $update_id->special_level  == 'Giảm cân')
                                        <option value="{{$update_id->special_level }}">Giảm cân</option>
                                    @elseif ( $update_id->special_level  == 'Tăng cơ')
                                        <option value="{{$update_id->special_level }}">Tăng cơ</option>
                                    @elseif ( $update_id->special_level  == 'Thể lực và sức bền')
                                        <option value="{{$update_id->special_level }}">Thể lực và sức bền</option>
                                    @else
                                        <option value="0">Chọn cấp độ</option>
                                    @endif
                                    <option value="Giảm cân">Giảm cân</option>
                                    <option value="Tăng cơ">Tăng cơ</option>
                                    <option value="Thể lực và sức bền">Thể lực và sức bền</option>
                                </select>
                            </div>
                        </div>
                        
                </div>

                </div>
            </div>
        </form>
    </section>
</main><!-- End #main -->

<script>
        $('#form-workout_package_update').on('submit', function(e) {
            e.preventDefault();

            let formData = new FormData(this);
            let description = CKEDITOR.instances['description'].getData();
            formData.append('description', description);

            $.ajax({
                url: 'http://127.0.0.1:8000/api/admin/workout_package/{{$update_id->id}}',
                type: 'POST',
                data: formData,
                contentType: false, 
                processData: false, 
                success: function(res) {
                    Swal.fire({
                        title: "Thành công!",
                        text: "Cập nhật gói tập thành công!",
                        icon: "success"
                    });
                    $('#form-workout_package')[0].reset();
                    CKEDITOR.instances['description'].setData('');
                    $('#avatar-image').attr('src',
                    'assets/backend/img/no-image.jpg');
                },
                error: function(err) {
                    Swal.fire({
                        title: "Lỗi!",
                        text: "Có lỗi xảy ra khi cập nhật gói tập!",
                        icon: "error"
                    });
                }
            });
        });
</script>
@endsection