@extends('backend/layouts/app-admin')

@section('main')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Quản lý bài viết</h1>
            <nav>
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Quản lý bài viết</li>
                <li class="breadcrumb-item active">Thêm bài viết</li>
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
                                    <label for="inputNanme4" class="form-label-customize">Tiêu đề <span class="note">(*)</span></label>
                                    <input type="text" class="form-control-customize" name="title" id="inputNanme4">
                                </div>
                                <div class="col-12">
                                    <label for="inputNanme4" class="form-label-customize">Mô tả <span class="note">(*)</span></label>
                                    <textarea type="text" class="form-control-customize"id="description" data_height="100"></textarea>
                                </div>
                                <div class="col-12">
                                    <label for="inputNanme4" class="form-label-customize">Nội dung <span class="note">(*)</span></label>
                                    <textarea type="text" class="form-control-customize ck-editor" id="content" data_height="500"></textarea>
                                </div>
                            </div>
                    </div>
                    {{-- Cấu hình SEO --}}
                    <div class="card">
                        <div class="card-header text-uppercase">Cấu hình SEO</div>
                            <div class="card-body">
                                <div class="col-9">
                                    <div class="box-seo d-flex mt-3">
                                        <img class="img-seo" src="assets/backend/img/no-image.jpg" alt="">
                                        <div class="title-top-seo">
                                            <div class="name-seo">GymFit.com</div>
                                            <span class="url-seo">{{ config('app.url') }}</span>
                                        </div>  
                                    </div>
                                    <div class="title-seo">
                                        <span class="title-customize mt-2 meta-title">GymFit</span>
                                        <p class="title-customize-small meta-description">Cung cấp 1 thẻ mô tả bằng cách sửa đoạn trích dẫn bên dưới. Nếu bạn không có thẻ mô tả, Google sẽ thử tìm 1 phần thích hợp trong bài viết của bạn để hiển thị cho kết quả tìm kiếm.</p>
                                    </div>
                                    
                                </div>


                                <div class="col-12">
                                    <div class="label d-flex justify-content-between">
                                        <label for="inputNanme4" class="form-label-customize">Tiêu đề SEO</label>
                                        <span class="form-label-customize">0 ký tự</span>
                                    </div>
                                    <input type="text" class="form-control-customize" id="inputNanme4">
                                </div>
                                <div class="col-12">
                                    <div class="label d-flex justify-content-between">
                                        <label for="inputNanme4" class="form-label-customize">Từ khóa SEO</label>
                                        <span class="form-label-customize">0 ký tự</span>
                                    </div>
                                    <input type="text" class="form-control-customize" id="inputNanme4">
                                </div>
                                <div class="col-12">
                                    <div class="label d-flex justify-content-between">
                                        <label for="inputNanme4" class="form-label-customize">Mô tả SEO</label>
                                        <span class="form-label-customize">0 ký tự</span>
                                    </div>
                                    <textarea class="form-control-customize" name="description" cols="20" rows="10"></textarea>
                                </div>
                                
                                <div class="col-12">
                                    <div class="label d-flex justify-content-between">
                                        <label for="inputNanme4" class="form-label-customize">Đường dẫn</label>
                                        {{-- <span class="form-label-customize">0 ký tự</span> --}}
                                    </div>
                                    <div class="input-group-customize mb-3">
                                        <span class="input-group-text baseURL" id="basic-addon3" style="font-size: 14px">{{ config('app.url') }}</span>
                                        <input type="text" class="form-control-link" name="link" id="basic-url" aria-describedby="basic-addon3" style="outline: none;">
                                    </div>
                                </div>
                                
                            </div>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="card">
                        <div class="card-header text-uppercase">Ảnh đại diện</div>
                            <div class="upload-img">
                                <span class="image-target">
                                    <img src="{{ old('image_posts', 'assets/backend/img/no-image.jpg') }}" alt="" class="upload-image img-cover">
                                </span>
                                <input type="hidden" name="image_posts">
                            </div>  

                    </div>
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
                </div>
            </div>
        </section>

    </main>
@endsection