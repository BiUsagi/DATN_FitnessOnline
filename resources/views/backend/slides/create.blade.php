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
                                        <label for="inputNanme4" class="form-label-customize">Mô tả:<span class="note">(*)</span></label>
                                        <input type="text" class="form-control-customize"name="title" id="inputNanme4" value="{{ old('title') }}" required>
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
                </div>
            </form>
        </section>

    </main>
@endsection