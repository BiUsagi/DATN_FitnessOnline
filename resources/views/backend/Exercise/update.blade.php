@extends('backend/layouts/app-admin')
@section('main')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Quản lí bài tập</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Admin</a></li>
                <li class="breadcrumb-item">Quản lí bài tập</li>
                <li class="breadcrumb-item active">Cập nhật bài tập</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <form id="form-exercise-update" method="post">
            @csrf
            <div class="row">
                <div class="col-lg-9">
                    
                    <div class="card">
                        <div class="card-header text-uppercase">Cập nhật bài tập</div>
                        <div class="card-body">   

                            <input type="hidden" name="pt_id" value="{{ $pt_id->id }}">

                            <div class="col-12">
                                <label for="exercise_name" class="form-label-customize">Tên bài tập <span class="note">(*)</span></label>
                                <input type="text" class="form-control-customize" name="exercise_name" id="exercise_name" value="{{ $ex->name }}">
                            </div>
                            
                            <div class="col-12 d-flex justify-content-between">
                                <div class="col-5">
                                    <div class="label d-flex justify-content-between">
                                        <label for="exercise_id" class="form-label-customize">Sets <span class="note">(* Số lần lặp lại của một động tác)</span></label>
                                    </div>
                                    <div class="input-group-customize mb-3">
                                        <input type="text" class="form-control-link" value="{{ $ex->sets}}" name="sets" id="sets" aria-describedby="basic-addon3" style="outline: none;" >
                                    </div>
                                </div>
                                <div class="col-5">
                                    <div class="label d-flex justify-content-between">
                                        <label for="exercise_id" class="form-label-customize">Reps <span class="note">(* Số lượt tập của một bài)</span></label>
                                    </div>
                                    <div class="input-group-customize mb-3">
                                        <input type="text" class="form-control-link" value="{{ $ex->reps}}" name="reps" id="reps" aria-describedby="basic-addon3" style="outline: none;">
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <label for="description" class="form-label-customize">Hướng dẫn tập <span class="note">(*)</span></label>
                                <textarea type="text" class="form-control-customize ck-editor" id="description" name="description" data_height="500">{{ $ex->description }}</textarea>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="col-lg-3">
                        <div class="card">
                                <div class="card-header text-uppercase">Trạng thái</div>
                                <div class="card-body">
                                    <select name="exercise-status" id="exercise-status" class="form-control-select2 setupSelect2">
                                    @if ( $ex->status  == 0)
                                        <option value="{{$ex->status}}">Ẩn bài viết</option>
                                    @elseif ( $ex->status  == 1)
                                    <option value="{{$ex->status}}">Công khai bài viết</option>
                                    @else
                                        <option value="0">--Chọn--</option>
                                    @endif
                                        <option value="1">Công khai bài viết</option>
                                        <option value="2">Ẩn bài viết</option>
                                    </select>
                                </div>  
                        </div>

                        <div class="card">
                            <div class="card-header text-uppercase">Video bài tập</div>
                            
                            <!-- Ban đầu hiển thị hình ảnh -->
                            <video id="media-preview" class="img-cover" src="uploads/video_exercise/{{ $ex->video_url }}" alt="Ảnh placeholder" style="width: 100%; cursor: pointer;" onclick="document.getElementById('video-input').click();">
                            
                            <!-- Input để chọn video -->
                            <input type="file" name="video_url" id="video-input" class="form-control" style="display: none;" accept="video/*" onchange="previewMedia(event)">
                        </div>

                        <div class="card">
                            <div class="card-header text-uppercase">Video bài tập 2</div>
                            
                            <!-- Ban đầu hiển thị hình ảnh -->
                            <video id="media-preview" class="img-cover" src="uploads/video_exercise/{{ $ex->video_url_second }}" alt="Ảnh placeholder" style="width: 100%; cursor: pointer;" onclick="document.getElementById('video-input').click();">
                            
                            <!-- Input để chọn video -->
                            <input type="file" name="video_url2" id="video-input2" class="form-control" style="display: none;" accept="video/*" onchange="previewMedia(event)">
                        </div>
                        
                        

                        <div class="btn-add-reset d-flex justify-content-between ms-2 me-2">
                            <input type="submit" class="btn btn-primary mt-3 btn-add-exercise" value="Cập nhật bài tập">
                            <input type="reset" class="btn btn-secondary mt-3" value="Hoàn tác">
                        </div>
                </div>
                </div>
            </div>
        </form>
    </section>

</main><!-- End #main -->

<script>
        $('#form-exercise-update').on('submit', function(e) {
            e.preventDefault();

            let formData = new FormData(this);
            let description = CKEDITOR.instances['description'].getData();
            formData.append('description', description);

            $.ajax({
                url: 'http://127.0.0.1:8000/api/admin/exercises/{{$ex->id}}',
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