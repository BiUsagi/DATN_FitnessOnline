@extends('backend/layouts/app-admin')
@section('main')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Quản lí gói tập</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Admin</a></li>
                <li class="breadcrumb-item">Quản lí gói tập</li>
                <li class="breadcrumb-item active">Thêm mới gói tập</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-9">
                
                <div class="card">
                    <div class="card-header text-uppercase">Thêm mới gói tập</div>
                    <div class="card-body">                

                        <div class="col-12">
                            <label for="inputNanme4" class="form-label-customize">Tên bài tập <span class="note">(*)</span></label>
                            <input type="text" class="form-control-customize " id="inputNanme4">
                        </div>
                        
                        <div class="mb-3">
                            <label for="inputNanme4" class="form-label-customize">Chọn gói tập <span class="note">(*)</span></label>
                            <select class="form-control-customize" aria-label="Default select example">
                                <option selected>--Gói Tập--</option>
                                <option value="1">Gói 3 tháng</option>
                                <option value="2">Gói 6 tháng</option>
                                <option value="3">Gói 12 tháng</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="inputNanme4" class="form-label-customize">Video <span class="note">(*)</span></label>
                            <input class="form-control-customize" type="file" id="formFile">
                        </div>
                        
                        <input type="submit" class="btn btn-primary" value="Thêm bài tập">

                    </div>
                </div>

            </div>

            <div class="col-lg-3">
                
                <div class="card">
                    <div class="card-header text-uppercase">Video bài tập</div>
                    <div class="card-body">                   
                            <img src="..." class="img-fluid" alt="...">    

                            <div class="mb-3">
                                <label for="inputNanme4" class="form-label-customize">Video <span class="note">(*)</span></label>
                                <input class="form-control-customize" type="file" id="formFile">
                            </div>             
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-header text-uppercase">Bài tập vừa thêm</div>

                            <div class="card-body">                   
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