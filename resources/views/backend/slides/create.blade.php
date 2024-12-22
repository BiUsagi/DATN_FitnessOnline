@extends('backend/layouts/app-admin')

@section('main')
    <main id="main" class="main" style="min-height: 100vh">
        <div class="pagetitle">
            <h1>Quản lý giao diện</h1>
            <nav>
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Quản lý giao diện</li>
                <li class="breadcrumb-item active">Thêm giao diện</li>
              </ol>
            </nav>
          </div><!-- End Page Title -->

          <section class="section">
            <form action="{{ route('admin.slide.create') }}" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="row">
                    <div class="col-lg-9">
                        {{-- Thông tin chung --}}
                        <div class="card">
                            <div class="card-header text-uppercase">Thông tin chung</div>

                                <div class="card-body">

                                    {{-- Thẻ input Name --}}
                                    <div class="col-12">
                                        <label for="inputNanme1" class="form-label-customize">Name:<span class="note">(*)</span></label>
                                        <input type="text" class="form-control-customize"name="name" id="inputNanme1" value="{{ old('name') }}">

                                        {{-- Kiểm tra form name --}}
                                        @error('name')
                                            <span class="text-danger" style="font-family:sans-serif; font-size: 13px;">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    {{-- Thẻ input Mô tả --}}
                                    <div class="col-12">
                                        <label for="inputNanme4" class="form-label-customize">Mô tả:<span class="note">(*)</span></label>
                                        <input type="text" class="form-control-customize"name="description" id="inputNanme4" value="{{ old('description') }}">

                                        {{-- Kiểm tra lỗi form mô tả --}}
                                        @error('description')
                                            <span class="text-danger" style="font-family:sans-serif; font-size: 13px;">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <input type="submit" class="btn btn-primary mt-3" value="Thêm" onclick="create()">
                                </div>
                        </div>
                    </div>
                    {{-- Hình ảnh --}}
                    <div class="col-lg-3">
                        <div class="card">
                            <div class="card-header text-uppercase">Ảnh đại diện</div>
                                <div class="card-body">
                                    <img 
                                        class="img-cover" 
                                        src="assets/backend/img/no-image.jpg" 
                                        alt="Avatar" 
                                        id="avatar-image" 
                                        style="cursor: pointer; max-width: 100%; object-fit: cover;" 
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
                            <script>
                                // THÔNG BÁO NÚT thêm
                                function create(slideId) {
                                    Swal.fire({
                                                title: "Thành công!",
                                                text: "Thêm thành công!",
                                                icon: "success"
                                            });
                                                window.location.href = "{{ url('admin/slides/create/') }}/" + slideId;
                                            }
                            </script>
                    </div>
                </div>
            </form>
        </section>

    </main>
@endsection
