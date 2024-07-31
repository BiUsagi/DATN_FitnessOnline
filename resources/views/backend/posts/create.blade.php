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
                                    <input type="text" class="form-control-customize" id="inputNanme4">
                                </div>
                                <div class="col-12">
                                    <label for="inputNanme4" class="form-label-customize">Mô tả <span class="note">(*)</span></label>
                                    <input type="text" class="form-control-customize" id="inputNanme4">
                                </div>
                                <div class="col-12">
                                    <label for="inputNanme4" class="form-label-customize">Nội dung <span class="note">(*)</span></label>
                                    <input type="text" class="form-control-customize" id="inputNanme4">
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
                                            <div class="name-seo">BachhoaXANH.com</div>
                                            <span class="url-seo">https://www.bachhoaxanh.com/...</span>
                                        </div>  
                                    </div>
                                    <div class="title-seo">
                                        <span class="title-customize mt-2">Du lịch Gia Lai: Cẩm nang du lịch và 32 địa điểm đẹp, hấp ...</span>
                                        <p class="title-customize-small">Gia Lai là một trong những danh lam thắng cảnh tại Việt Nam. Cẩm nang du lịch Gia Lai và 32 địa điểm du lịch đẹp, hấp dẫn chi tiết nhất.</p>
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
                                        <label for="inputNanme4" class="form-label-customize">Cụm từ khóa chính</label>
                                        <span class="form-label-customize">0 ký tự</span>
                                    </div>
                                    <input type="text" class="form-control-customize" id="inputNanme4">
                                </div>
                                <div class="col-12">
                                    <div class="label d-flex justify-content-between">
                                        <label for="inputNanme4" class="form-label-customize">Thẻ mô tả</label>
                                        <span class="form-label-customize">0 ký tự</span>
                                    </div>
                                    {{-- <template type="text" class="form-control-customize" id="inputNanme4"></template> --}}
                                    <textarea name="" id="" class="form-control-customize" cols="20" rows="10"></textarea>
                                </div>
                                
                                <div class="col-12">
                                    <div class="label d-flex justify-content-between">
                                        <label for="inputNanme4" class="form-label-customize">Đường dẫn</label>
                                        {{-- <span class="form-label-customize">0 ký tự</span> --}}
                                    </div>
                                    <input type="text" class="form-control-customize" id="inputNanme4">
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
                    <div class="card">
                        <div class="card-header text-uppercase">Trạng thái</div>
                            <div class="card-body">
                                {{-- <select name="" id="">
                                    <option value="0">Trạng thái</option>
                                    <option value="1">Công khai bài viết</option>
                                    <option value="2">Ẩn bài viết</option>
                                </select> --}}
                                {{-- <img class="img-cover" src="assets/backend/img/no-image.jpg" alt=""> --}}
                            </div>
                    </div>
                </div>
            </div>
        </section>

    </main>
@endsection