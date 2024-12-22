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
        <form id="form-exercise" method="post">
            @csrf
            <div class="row">
                <div class="col-lg-9">
                    
                    <div class="card">
                        <div class="card-header text-uppercase">THÔNG TIN CHUNG</div>
                        <div class="card-body">   

                            <input type="hidden" name="pt_id" value="{{ $pt_id->id }}">

                            <div class="col-12">
                                <label for="exercise_name" class="form-label-customize">Tên bài tập <span class="note">(*)</span></label>
                                <input type="text" class="form-control-customize" name="name" id="exercise_name">
                            </div>
                            
                            <div class="col-12 d-flex justify-content-between">
                                <div class="col-5">
                                    <div class="label d-flex justify-content-between">
                                        <label for="exercise_id" class="form-label-customize">Sets <span class="note">(* Số lần lặp lại của một động tác)</span></label>
                                    </div>
                                    <div class="input-group-customize mb-3">
                                        <input type="text" class="form-control-link" name="sets" id="sets" aria-describedby="basic-addon3" style="outline: none;">
                                    </div>
                                </div>
                                <div class="col-5">
                                    <div class="label d-flex justify-content-between">
                                        <label for="exercise_id" class="form-label-customize">Reps <span class="note">(* Số lượt tập của một bài)</span></label>
                                    </div>
                                    <div class="input-group-customize mb-3">
                                        <input type="text" class="form-control-link" name="reps" id="reps" aria-describedby="basic-addon3" style="outline: none;">
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <label for="description" class="form-label-customize">Hướng dẫn tập <span class="note">(*)</span></label>
                                <input type="text" class="form-control-customize ck-editor" id="description" name="description" data_height="500">
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="col-lg-3">
                        <div class="card">
                                <div class="card-header text-uppercase">Trạng thái</div>
                                <div class="card-body">
                                    <select name="exercise-status" id="exercise-status" class="form-control-select2 setupSelect2">
                                        <option value="1">Công khai bài viết</option>
                                        <option value="2">Ẩn bài viết</option>
                                    </select>
                                </div>  
                        </div>

                        <div class="card">
                            <div class="card-header text-uppercase">Video bài tập</div>
                            
                            <!-- Ban đầu hiển thị hình ảnh -->
                            <img id="media-preview" class="img-cover" src="assets/backend/img/no-video.jpg" alt="Ảnh placeholder" style="width: 100%; cursor: pointer;" onclick="document.getElementById('video-input').click();">
                            
                            <!-- Input để chọn video -->
                            <input type="file" name="video_url" id="video-input" class="form-control" style="display: none;" accept="video/*" onchange="previewMedia(event)">
                        </div>
                        <div class="card">
                            <div class="card-header text-uppercase">Video bài tập 2</div>
                            
                            <!-- Ban đầu hiển thị hình ảnh -->
                            <img id="media-preview2" class="img-cover" src="assets/backend/img/no-video.jpg" alt="Ảnh placeholder" style="width: 100%; cursor: pointer;" onclick="document.getElementById('video-input2').click();">
                            
                            <!-- Input để chọn video -->
                            <input type="file" name="video_url2" id="video-input2" class="form-control" style="display: none;" accept="video/*" onchange="previewMedia2(event)">
                        </div>
                        
                        

                        <div class="btn-add-reset d-flex justify-content-between ms-2 me-2">
                            <input type="submit" class="btn btn-primary mt-3 btn-add-exercise" value="+ Thêm bài tập">
                            <input type="reset" class="btn btn-secondary mt-3" value="Hoàn tác">
                        </div>
                </div>
                </div>
            </div>
        </form>
    </section>

</main><!-- End #main -->

<script>
    function previewMedia(event) {
        const file = event.target.files[0];
        const previewElement = document.getElementById('media-preview');

        if (file) {
            if (file.type.startsWith('video/')) {
                const video = document.createElement('video');
                video.id = 'media-preview';
                video.controls = true;
                video.style.width = '100%';
                video.src = URL.createObjectURL(file);
                
                previewElement.replaceWith(video);
            } else {
                previewElement.src = URL.createObjectURL(file);
            }
        }
    }
    function previewMedia2(event) {
        const file = event.target.files[0];
        const previewElement2 = document.getElementById('media-preview2');

        if (file) {
            if (file.type.startsWith('video/')) {
                const video = document.createElement('video');
                video.id = 'media-preview2';
                video.controls = true;
                video.style.width = '100%';
                video.src = URL.createObjectURL(file);
                
                previewElement2.replaceWith(video);
            } else {
                previewElement2.src = URL.createObjectURL(file);
            }
        }
    }

    $('#form-exercise').on('submit', function(e) {
        e.preventDefault();

        let formData = new FormData(this);

        let description = CKEDITOR.instances['description'].getData();
        formData.append('description', description);

        const videoFile = document.getElementById('video-input').files[0];
        const videoFile2 = document.getElementById('video-input2').files[0];
        if (videoFile) {
            formData.append('video_url', videoFile);
        }
        formData.append('video_url_second', videoFile2);

        $.ajax({
            url: 'http://127.0.0.1:8000/api/admin/exercises',
            type: 'POST',
            data: formData,
            contentType: false, 
            processData: false, 
            success: function(res) {
                Swal.fire({
                    title: "Thành công!",
                    text: "Thêm thành công bài tập!",
                    icon: "success"
                });

                $('#form-exercise')[0].reset();
                CKEDITOR.instances['description'].setData('');
                $('#media-preview').replaceWith('<img id="media-preview" class="img-cover" src="assets/backend/img/no-video.jpg" alt="Ảnh placeholder" style="width: 100%; cursor: pointer;" onclick="document.getElementById(\'video-input\').click();">');
                $('#media-preview2').replaceWith('<img id="media-preview2" class="img-cover" src="assets/backend/img/no-video.jpg" alt="Ảnh placeholder" style="width: 100%; cursor: pointer;" onclick="document.getElementById(\'video-input2\').click();">');
            },
            error: function(err) {
                    if (err.status === 422) { // Nếu lỗi validate
                        let errors = err.responseJSON.errors; // Lấy danh sách lỗi từ response
                        
                        // Lấy lỗi đầu tiên
                        let firstField = Object.keys(errors)[0]; // Lấy key đầu tiên
                        let firstErrorMessage = errors[firstField][0]; // Lấy lỗi đầu tiên từ key đó

                        // Hiển thị SweetAlert với lỗi đầu tiên
                        Swal.fire({
                            title: "Lỗi xác thực!",
                            text: firstErrorMessage, // Chỉ hiển thị lỗi đầu tiên
                            icon: "error"
                        });
                    } else {
                        // Các lỗi khác
                        Swal.fire({
                            title: "Lỗi!",
                            text: "Có lỗi xảy ra khi thêm bài tập!",
                            icon: "error"
                        });
                    }
                }
        });
    });


</script>

@endsection