@extends('backend/layouts/app-admin')
@section('main')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Quản lí bài tập</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Admin</a></li>
                    <li class="breadcrumb-item">Quản lí bài tập</li>
                    <li class="breadcrumb-item active">Danh sách bài tập</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->


        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="title-top d-flex justify-content-between">
                                <h5 class="card-title text-uppercase">Danh sách bài tập</h5>
                                <a href="{{ route('admin.exercise-create') }}" class="btn-customize"><i
                                        class="bi bi-plus-lg"></i> Thêm bài tập</a>
                            </div>

                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Tên bài tập</th>
                                        <th>Mô tả</th>
                                        <th>Thời gian tập</th>
                                        <th data-type="date" data-format="YYYY/DD/MM">Ngày đăng</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody id="list-items"></tbody>
                            </table>
                            <!-- End Table with stripped rows -->

                        </div>
                    </div>

                </div>
            </div>
        </section>
        {{-- <div class="video-container">
            <iframe id="video-frame" width="560" height="315"
                src="https://www.youtube.com/embed/TUQQCM9o1Ls?controls=0&modestbranding=1&rel=0&mute=1"
                title="YouTube video player"
                frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                referrerpolicy="strict-origin-when-cross-origin"
                allowfullscreen
                style="pointer-events: none;">
            </iframe>
        </div>

        <button id="play-button" class="btn-customize">Play Video</button> --}}
        
        </main><!-- End #main -->
    <script>
        
        $.get('http://127.0.0.1:8000/api/admin/exercises', function(res) {
                let data = res;                
                console.log(res);
                let returnData = '';

                
                data.forEach(item => {
                    returnData += `
                     <tr>

                        <td>${item.id}</td>
                                    <td>${item.name}</td>
                                    <td>${item.description}</td>
                                    <td>${item.duration} Phút</td>
                                    <td><iframe width="560" height="315" src="https://www.youtube.com/embed/TUQQCM9o1Ls?si=nzFaL6JX_ziBN4Wr" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe></td>
                                    <td class="customize-width">
                                        <a href="" class="btn-custom primary" ><i class="bi bi-eye-fill"></i></a>    
                                        <a href="" class="btn-custom success" ><i class="bi bi-pencil-square"></i></a>   
                                        <a href="" class="btn-custom danger" ><i class="bi bi-trash"></i></a>    
                                    </td>
                                </tr>
               `;
                });
                $('#list-items').html(returnData);
            }
        )
    </script>
@endsection
