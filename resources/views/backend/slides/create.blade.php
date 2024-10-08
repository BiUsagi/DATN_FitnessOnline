@extends('backend/layouts/app-admin')

@section('main')
    <main id="main" class="main">
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
            <form action="{{route('admin.create')}}" method="POST" enctype="multipart/form-data">
                {{-- @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif --}}
            @csrf
                <div class="row">
                    <div class="col-lg-9">
                        {{-- Thông tin chung --}}
                        <div class="card">
                            <div class="card-header text-uppercase">Thông tin chung</div>
                                <div class="card-body">
                                    <div class="col-12">
                                        <label for="inputNanme4" class="form-label-customize">Tên:<span class="note">(*)</span></label>
                                        <input type="text" class="form-control-customize" name="name_user" id="inputNanme1" value="{{ old('name_user') }}">
                                        @error('name_user')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <label for="inputNanme4" class="form-label-customize">Email:<span class="note">(*)</span></label>
                                        <input type="email" class="form-control-customize" name="email" id="inputNanme2" value="{{ old('email') }}" required>
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <label for="inputNanme4" class="form-label-customize">Địa chỉ:<span class="note">(*)</span></label>
                                        <input type="text" class="form-control-customize" name="address" id="inputNanme3" value="{{ old('address') }}" required>
                                        @error('address')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <label for="inputNanme4" class="form-label-customize">SĐT:<span class="note">(*)</span></label>
                                        <input type="text" class="form-control-customize" name="phone_number" id="inputNanme4" value="{{ old('phone_number') }}" required>
                                        @error('phone_number')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <label for="inputNanme5" class="form-label-customize">Mô tả: <span class="note">(*)</span></label>
                                        <textarea type="text" class="form-control-customize ck-editor"id="description" data_height="100" name="title" value="{{ old('title') }}" required></textarea>
                                        @error('title')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <input type="submit" class="btn btn-primary mt-3" value="Thêm">
                                </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card">
                            <div class="card-header text-uppercase">Ảnh đại diện</div>
                                <div class="card-body">
                                    <img 
                                        class="img-cover" 
                                        src="assets/backend/img/no-image.jpg" 
                                        alt="Avatar" 
                                        id="avatar-image" 
                                        style="cursor: pointer;" 
                                        onclick="document.getElementById('avatar-input').click();" 
                                    >
                                    <input type="file" name="avatar" id="avatar-input" class="form-control" style="display: none;" onchange="previewImage(event)">
                                </div>
                                <script>
                                    function previewImage(event) {
                                        const image = document.getElementById('avatar-image');
                                        image.src = URL.createObjectURL(event.target.files[0]);
                                    }
                                </script>
                            </div>
                        
                    </div>
                </div>
            </form>
        </section>

    </main>
@endsection