@extends('backend/layouts/app-admin')

@section('main')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Quản lý bài viết</h1>
            <nav>
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Quản lý bài viết</li>
                <li class="breadcrumb-item active">Chỉnh sửa bài viết</li>
              </ol>
            </nav>
          </div><!-- End Page Title -->

          <section class="section">
            <form action="#" id="form_post_update" method ="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-9">
                        {{-- Thông tin chung --}}
                        <div class="card">
                            <div class="card-header text-uppercase">Chỉnh sửa bài viết</div>
                                <div class="card-body">

                                    <input type="hidden" name="staff_id" value="{{ $pt_id->id }}">
                                    
                                    <div class="col-12">
                                        <label for="inputNanme4" class="form-label-customize">Tiêu đề <span class="note">(*)</span></label>
                                        <input type="text" class="form-control-customize" name="title" id="inputNanme4" value="{{ $post->title }}">
                                    </div>

                                    <div class="col-12">
                                        <label for="inputNanme4" class="form-label-customize">Mô tả <span class="note">(*)</span></label>
                                        <input type="text" class="form-control-customize" name="description" id="description" value="{{ $post->description }}">
                                    </div>

                                    <div class="col-12">
                                        <label for="inputNanme4" class="form-label-customize">Nội dung <span class="note">(*)</span></label>
                                        <textarea type="text" class="form-control-customize ck-editor" id="content" data_height="500">{{ $post->content }}</textarea>
                                    </div>

                                    <input type="submit" class="btn btn-primary mt-3" value="Cập nhật bài viết">
                                </div>
                        </div>
                    
                    </div>

                    <div class="col-lg-3">
                        <div class="card">
                            <div class="card-header text-uppercase">HÌNH ẢNH</div>
                            <img class="img-cover" src="uploads/post_image/{{ $post->image }}" alt="Avatar" id="avatar-image"
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
                                    <select name="" id="select2" class="form-control-select2 setupSelect2">
                                        <option value="1">Công khai bài viết</option>
                                        <option value="2">Ẩn bài viết</option>
                                    </select>
                                    {{-- <img class="img-cover" src="assets/backend/img/no-image.jpg" alt=""> --}}
                                </div>
                        </div>
                    </div>
                </div>
            </form>
        </section>

    </main>

    <script>
        $('#form_post_update').on('submit', function(e) {
            e.preventDefault();

            let formData = new FormData(this);
            let content = CKEDITOR.instances['content'].getData();
            formData.append('content', content);

            $.ajax({
                url: 'http://127.0.0.1:8000/api/admin/post/{{$post->id}}',
                type: 'POST',
                data: formData,
                contentType: false, 
                processData: false, 
                success: function(res) {
                    Swal.fire({
                        title: "Thành công!",
                        text: "Cập nhật thành công bài viết!",
                        icon: "success"
                    });
                    $('#form_post_update')[0].reset();
                    CKEDITOR.instances['content'].setData('');
                    $('#avatar-image').attr('src',
                    'assets/backend/img/no-image.jpg');
                },
                error: function(err) {
                    Swal.fire({
                        title: "Lỗi!",
                        text: "Có lỗi xảy ra khi Cập nhật bài viết!",
                        icon: "error"
                    });
                }
            });
        });
    </script>
@endsection