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
            <div class="row">
                <div class="col-lg-9">
                    {{-- Thông tin chung --}}
                    <div class="card">
                        <div class="card-header text-uppercase">Thông tin chung</div>
                            <div class="card-body">
                                <div class="col-12">
                                    <label for="inputNanme4" class="form-label-customize">Tên:<span class="note">(*)</span></label>
                                    <input type="text" class="form-control-customize" name="title" id="inputNanme4">
                                </div>
                                <div class="col-12">
                                    <label for="inputNanme4" class="form-label-customize">Mô tả <span class="note">(*)</span></label>
                                    <textarea type="text" class="form-control-customize ck-editor"id="description" data_height="100"></textarea>
                                </div>
                            </div>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="card">
                        <div class="card-header text-uppercase">Ảnh đại diện</div>
                            <div class="card-body">
                                <img class="img-cover" src="assets/backend/img/no-image.jpg" alt="">
                            </div>
                    </div>
                </div>
            </div>
        </section>

    </main>
@endsection