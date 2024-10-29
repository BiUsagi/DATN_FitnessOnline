@extends('backend/layouts/app-admin')

@section('main')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Quản lý bài viết</h1>
            <nav>
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Quản lý bài viết</li>
                <li class="breadcrumb-item active">Danh sách bài viết</li>
              </ol>
            </nav>
          </div><!-- End Page Title -->

          <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="title-top d-flex justify-content-between">
                                <h5 class="card-title text-uppercase">Danh sách bài viết</h5>
                                <a href="{{ route('admin.post-create') }}" class="btn-customize"><i class="bi bi-plus-lg"></i> Thêm bài viết</a>
                            </div>
                            
                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th>
                                            ID
                                        </th>
                                        <th>Tiêu đề</th>
                                        <th>Tóm tắt</th>
                                        <th>Hình ảnh</th>
                                        <th>Nội dung</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                              
                                <tbody class="show-data">
                                  
    
                                </tbody>
                            </table>
                            <!-- End Table with stripped rows -->
    
                        </div>
                    </div>
    
                </div>
            </div>
        </section>

    </main>
    <script>
        $.get('http://127.0.0.1:8000/api/admin/post', function(res){
            let data = res;
            let returnData = '';
            data.forEach(item =>{
            returnData += `
            <tr>
                <th scope="row">${item.id}</th>
                <td>${item.title}</td>
                <td>${item.description}</td>
                <td>${item.image}</td>
                <td>content</td>
                <td>
                <a class="btn btn-outline-success" data-bs-placement="top" 
                data-bs-title="Xem Chi Tiết">
                    <i class="ri-eye-fill"></i>
                </a>
                <a class="btn btn-outline-primary" data-bs-placement="top" 
                data-bs-title="Xem Chi Tiết">
                    <i class="ri-edit-line"></i>
                </a>
                <a class="btn btn-outline-danger" data-bs-placement="top" 
                data-bs-title="Xem Chi Tiết">
                    <i class="ri-error-warning-line"></i>
                </a>
                </td>
            </tr>
             `;
            });
            $('.show-data').html(returnData);
        });
    </script>
@endsection