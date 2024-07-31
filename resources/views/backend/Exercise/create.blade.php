@extends('backend/layouts/app-admin')
@section('main')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Quản lí bài tập</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Admin</a></li>
                <li class="breadcrumb-item">Quản lí bài tập</li>
                <li class="breadcrumb-item active">Thêm mới bài tập</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-9">
                
                <div class="card">
                    <div class="card-body">                
                        <h5 class="card-title">Thêm mới bài tập</h5>      
                                       
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Tên bài tập</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Tên bài tập">
                         </div>
                        
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Chọn gói tập</label>
                            <select class="form-select" aria-label="Default select example">
                                <option selected>--Gói Tập--</option>
                                <option value="1">Gói 3 tháng</option>
                                <option value="2">Gói 6 tháng</option>
                                <option value="3">Gói 12 tháng</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="formFile" class="form-label">Video</label>
                            <input class="form-control" type="file" id="formFile">
                        </div>
                        
                        <input type="submit" class="btn btn-primary" value="Thêm bài tập">

                    </div>
                </div>

            </div>

            <div class="col-lg-3">
                
                <div class="card">
                    <div class="card-body">                
                            <h5 class="card-title">Video bài tập</h5>    
                            <img src="..." class="img-fluid" alt="...">    

                            <div class="mb-3">
                                <label for="formFile" class="form-label">Video</label>
                                <input class="form-control" type="file" id="formFile">
                            </div>               
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">                
                                <h5 class="card-title">Bài tập vừa thêm</h5>      
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Tên bài tập</th>
                                        </tr>
                                    </thead>
                                    @for( $i=1; $i<=5; $i++)
                                        <tr>
                                            <td>{{$i}}</td>
                                            <td>Bài tập số {{$i}} </td>
                                        </tr>
                                    @endfor
                                    <tbody>

                                    </tbody>
                                </table>     

                            </div>
                        </div>
                    </div>    
                </div>

            </div>
        </div>
    </section>

</main><!-- End #main -->
@endsection