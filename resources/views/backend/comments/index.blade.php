@extends('backend/layouts/app-admin')
@section('main')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin')}}">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>
        </nav>
      </div><!-- End Page Title -->
  
      <section class="section">
        <div class="row">
          <div class="col-lg-12">
  
            <div class="card">
              <div class="card-body">
                <!-- Table with stripped rows -->
                <table class="table datatable">
                  <thead>
                    <tr>
                      <th>
                        <b>T</b>ên tài khoản
                      </th>
                      <th>Bài viết</th>
                      <th>Nội dung</th>
                      <th data-type="date" data-format="YYYY/DD/MM">Ngày đăng</th>
                      <th>Thao tác</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                        <td>Thanh Rin</td>
                        <td>Gym</td>
                        <td class="" style="white-space: nowrap;
                                        overflow: hidden;
                                        text-overflow: ellipsis;
                                        max-width: 200px">
                                            IRGC cho hay một cận vệ của ông Haniyeh cũng thiệt mạng trong vụ ám sát. Cơ quan này đang tiến hành điều tra và sẽ công bố kết quả cuối ngày hôm nay.
                                            Hamas xác nhận Haniyeh bị "người theo chủ nghĩa phục quốc Do Thái" ám sát ở Iran sau khi dự lễ nhậm chức của tân Tổng thống Pezeshkian, nhưng không nêu chi tiết. Thuật ngữ "người theo chủ nghĩa phục quốc Do Thái" thường được Hamas sử dụng để chỉ Israel.
                        </td>
                        <td>2005/02/11</td>
                        <td style=" display: flex; justify-content: center;align-items: center;">
                            <button class="btn btn-danger"><i class="bi bi-trash3-fill"></i></button>
                        </td>
                    </tr>
                  </tbody>
                </table>
                <!-- End Table with stripped rows -->
  
              </div>
            </div>
  
          </div>
        </div>
      </section>
</main>
@endsection