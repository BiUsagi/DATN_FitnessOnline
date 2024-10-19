@extends('backend/layouts/app-admin')
@section('main')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Lộ trình gói: Lão luyện</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Admin</a></li>
                    <li class="breadcrumb-item">Quản lí lộ trình tập</li>
                    <li class="breadcrumb-item active">Lộ trình gói: Lão luyện</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">  
                        <p class="modal-title fs-6 text-uppercase fw-bold" id="staticBackdropLabel">Ngày 1</p>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-add">
                            <div class="row">
                                <div class="col-6">
                                    <label for="#" class="fw-bold">Lựa chọn bài tập: <span class="note">(*)</span></label>
                                    <select name="" id="" class="form-control-select2 setupSelect2">
                                        <option value="0">Lựa chọn</option>
                                        <option value="1">Bài tập tay</option>
                                        <option value="2">Bài tập lưng</option>
                                        <option value="3">Bài tập ngực</option>
                                        <option value="4">Bài tập chân</option>
                                        <option value="1">Bài tập tay</option>
                                        <option value="2">Bài tập lưng</option>
                                        <option value="3">Bài tập ngực</option>
                                        <option value="4">Bài tập chân</option>
                                        <option value="1">Bài tập tay</option>
                                        <option value="2">Bài tập lưng</option>
                                        <option value="3">Bài tập ngực</option>
                                        <option value="4">Bài tập chân</option>
                                    </select>
                                  
                                    <label for="#" class="fw-bold mt-2 mb-2">Bài tập đã chọn:</label>
                                    <div class="show-data-select">
                                        <p class="data-select mb-2 d-flex justify-content-between">Bài tập chân <i class="bi bi-x-circle ms-1"></i></p>
                                        <p class="data-select mb-2 d-flex justify-content-between">Bài tập tay <i class="bi bi-x-circle ms-1"></i></p>
                                        <p class="data-select mb-2 d-flex justify-content-between">Bài tập tay <i class="bi bi-x-circle ms-1"></i></p>

                                    </div>
                                    

                                </div>
                                <div class="col-6">
                                    132123
                                </div>
                            </div>
                            
                        </div>
                    </div>
                
                </div>
            </div>
        </div>


        <section class="section">
            <div class="row">
                <div class="col-lg-9">
                    {{-- Thông tin chung --}}
                    <div class="card">
                        <div class="card-header text-uppercase">Danh sách số ngày tập</div>
                        <div class="card-body">
                            <div class="row list-detail-exercise">
                                <div class="col detail-exercise">
                                    <div class="overflow">
                                        <a class="btn-action btn-detail" data-bs-title="Chi tiết ngày tập ngày 1" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="bi bi-eye-fill"></i></a>
                                    </div>
                                    <div class="number-day">
                                        <h4>Ngày 1</h4>
                                    </div>
                                    <div class="description-day">
                                        <p>Số bài tập: 4</p>
                                    </div>
                                </div>
                                
                                <div class="col detail-exercise">
                                    <div class="overflow">
                                        <a href="#" class="btn-action btn-detail" data-bs-toggle="tooltip" data-bs-title="Chi tiết ngày tập ngày 2"><i class="bi bi-eye-fill"></i></a>
                                    </div>
                                    <div class="number-day">
                                        <h4>Ngày 2</h4>
                                    </div>
                                    <div class="description-day">
                                        <p>Số bài tập: 5</p>
                                    </div>
                                </div>
                                
                                <div class="col detail-exercise">
                                    <div class="overflow">
                                        <a href="#" class="btn-action btn-detail" data-bs-toggle="tooltip" data-bs-title="Chi tiết ngày tập ngày 3"><i class="bi bi-eye-fill"></i></a>
                                    </div>
                                    <div class="number-day">
                                        <h4>Ngày 3</h4>
                                    </div>
                                    <div class="description-day">
                                        <p>Số bài tập: 3</p>
                                    </div>
                                </div>
                                
                                <div class="col detail-exercise">
                                    <div class="overflow">
                                        <a href="#" class="btn-action btn-detail" data-bs-toggle="tooltip" data-bs-title="Chi tiết ngày tập ngày 4"><i class="bi bi-eye-fill"></i></a>
                                    </div>
                                    <div class="number-day">
                                        <h4>Ngày 4</h4>
                                    </div>
                                    <div class="description-day">
                                        <p>Số bài tập: 5</p>
                                    </div>
                                </div>
                                
                                <div class="col detail-exercise">
                                    <div class="overflow">
                                        <a href="#" class="btn-action btn-detail" data-bs-toggle="tooltip" data-bs-title="Chi tiết ngày tập ngày 5"><i class="bi bi-eye-fill"></i></a>
                                    </div>
                                    <div class="number-day">
                                        <h4>Ngày 5</h4>
                                    </div>
                                    <div class="description-day">
                                        <p>Số bài tập: 4</p>
                                    </div>
                                </div>
                                
                                <div class="col detail-exercise">
                                    <div class="overflow">
                                        <a href="#" class="btn-action btn-detail" data-bs-toggle="tooltip" data-bs-title="Chi tiết ngày tập ngày 6"><i class="bi bi-eye-fill"></i></a>
                                    </div>
                                    <div class="number-day">
                                        <h4>Ngày 6</h4>
                                    </div>
                                    <div class="description-day">
                                        <p>Số bài tập: 3</p>
                                    </div>
                                </div>
                                
                                <div class="col detail-exercise">
                                    <div class="overflow">
                                        <a href="#" class="btn-action btn-detail" data-bs-toggle="tooltip" data-bs-title="Chi tiết ngày tập"><i class="bi bi-eye-fill"></i></a>
                                    </div>
                                    <div class="number-day">
                                        <h4>Ngày 7</h4>
                                    </div>
                                    <div class="description-day">
                                        <p>Số bài tập: 5</p>
                                    </div>
                                </div>
                                
                                <div class="col detail-exercise">
                                    <div class="overflow">
                                        <a href="#" class="btn-action btn-detail" data-bs-toggle="tooltip" data-bs-title="Chi tiết ngày tập"><i class="bi bi-eye-fill"></i></a>
                                    </div>
                                    <div class="number-day">
                                        <h4>Ngày 8</h4>
                                    </div>
                                    <div class="description-day">
                                        <p>Số bài tập: 3</p>
                                    </div>
                                </div>
                                
                                <div class="col detail-exercise">
                                    <div class="overflow">
                                        <a href="#" class="btn-action btn-detail" data-bs-toggle="tooltip" data-bs-title="Chi tiết ngày tập"><i class="bi bi-eye-fill"></i></a>
                                    </div>
                                    <div class="number-day">
                                        <h4>Ngày 9</h4>
                                    </div>
                                    <div class="description-day">
                                        <p>Số bài tập: 4</p>
                                    </div>
                                </div>
                                
                                <div class="col detail-exercise">
                                    <div class="overflow">
                                        <a href="#" class="btn-action btn-detail" data-bs-toggle="tooltip" data-bs-title="Chi tiết ngày tập"><i class="bi bi-eye-fill"></i></a>
                                    </div>
                                    <div class="number-day">
                                        <h4>Ngày 10</h4>
                                    </div>
                                    <div class="description-day">
                                        <p>Số bài tập: 5</p>
                                    </div>
                                </div>
                                
                                <div class="col detail-exercise">
                                    <div class="overflow">
                                        <a href="#" class="btn-action btn-detail" data-bs-toggle="tooltip" data-bs-title="Chi tiết ngày tập"><i class="bi bi-eye-fill"></i></a>
                                    </div>
                                    <div class="number-day">
                                        <h4>Ngày 11</h4>
                                    </div>
                                    <div class="description-day">
                                        <p>Số bài tập: 4</p>
                                    </div>
                                </div>
                                
                                <div class="col detail-exercise">
                                    <div class="overflow">
                                        <a href="#" class="btn-action btn-detail" data-bs-toggle="tooltip" data-bs-title="Chi tiết ngày tập"><i class="bi bi-eye-fill"></i></a>
                                    </div>
                                    <div class="number-day">
                                        <h4>Ngày 12</h4>
                                    </div>
                                    <div class="description-day">
                                        <p>Số bài tập: 3</p>
                                    </div>
                                </div>
                                
                                <div class="col detail-exercise">
                                    <div class="overflow">
                                        <a href="#" class="btn-action btn-detail" data-bs-toggle="tooltip" data-bs-title="Chi tiết ngày tập"><i class="bi bi-eye-fill"></i></a>
                                    </div>
                                    <div class="number-day">
                                        <h4>Ngày 13</h4>
                                    </div>
                                    <div class="description-day">
                                        <p>Số bài tập: 5</p>
                                    </div>
                                </div>
                                
                                <div class="col detail-exercise">
                                    <div class="overflow">
                                        <a href="#" class="btn-action btn-detail" data-bs-toggle="tooltip" data-bs-title="Chi tiết ngày tập"><i class="bi bi-eye-fill"></i></a>
                                    </div>
                                    <div class="number-day">
                                        <h4>Ngày 14</h4>
                                    </div>
                                    <div class="description-day">
                                        <p>Số bài tập: 4</p>
                                    </div>
                                </div>
                                
                                <div class="col detail-exercise">
                                    <div class="overflow">
                                        <a href="#" class="btn-action btn-detail" data-bs-toggle="tooltip" data-bs-title="Chi tiết ngày tập"><i class="bi bi-eye-fill"></i></a>
                                    </div>
                                    <div class="number-day">
                                        <h4>Ngày 15</h4>
                                    </div>
                                    <div class="description-day">
                                        <p>Số bài tập: 3</p>
                                    </div>
                                </div>
                                
                                <div class="col detail-exercise">
                                    <div class="overflow">
                                        <a href="#" class="btn-action btn-detail" data-bs-toggle="tooltip" data-bs-title="Chi tiết ngày tập"><i class="bi bi-eye-fill"></i></a>
                                    </div>
                                    <div class="number-day">
                                        <h4>Ngày 16</h4>
                                    </div>
                                    <div class="description-day">
                                        <p>Số bài tập: 5</p>
                                    </div>
                                </div>
                                
                                <div class="col detail-exercise">
                                    <div class="overflow">
                                        <a href="#" class="btn-action btn-detail" data-bs-toggle="tooltip" data-bs-title="Chi tiết ngày tập"><i class="bi bi-eye-fill"></i></a>
                                    </div>
                                    <div class="number-day">
                                        <h4>Ngày 17</h4>
                                    </div>
                                    <div class="description-day">
                                        <p>Số bài tập: 4</p>
                                    </div>
                                </div>
                                
                                <div class="col detail-exercise">
                                    <div class="overflow">
                                        <a href="#" class="btn-action btn-detail" data-bs-toggle="tooltip" data-bs-title="Chi tiết ngày tập"><i class="bi bi-eye-fill"></i></a>
                                    </div>
                                    <div class="number-day">
                                        <h4>Ngày 18</h4>
                                    </div>
                                    <div class="description-day">
                                        <p>Số bài tập: 3</p>
                                    </div>
                                </div>
                                
                                <div class="col detail-exercise">
                                    <div class="overflow">
                                        <a href="#" class="btn-action btn-detail" data-bs-toggle="tooltip" data-bs-title="Chi tiết ngày tập"><i class="bi bi-eye-fill"></i></a>
                                    </div>
                                    <div class="number-day">
                                        <h4>Ngày 19</h4>
                                    </div>
                                    <div class="description-day">
                                        <p>Số bài tập: 5</p>
                                    </div>
                                </div>
                                
                                <div class="col detail-exercise">
                                    <div class="overflow">
                                        <a href="#" class="btn-action btn-detail" data-bs-toggle="tooltip" data-bs-title="Chi tiết ngày tập"><i class="bi bi-eye-fill"></i></a>
                                    </div>
                                    <div class="number-day">
                                        <h4>Ngày 20</h4>
                                    </div>
                                    <div class="description-day">
                                        <p>Số bài tập: 4</p>
                                    </div>
                                </div>
                                
                                <div class="col detail-exercise">
                                    <div class="overflow">
                                        <a href="#" class="btn-action btn-detail" data-bs-toggle="tooltip" data-bs-title="Chi tiết ngày tập"><i class="bi bi-eye-fill"></i></a>
                                    </div>
                                    <div class="number-day">
                                        <h4>Ngày 21</h4>
                                    </div>
                                    <div class="description-day">
                                        <p>Số bài tập: 3</p>
                                    </div>
                                </div>
                                
                                <div class="col detail-exercise">
                                    <div class="overflow">
                                        <a href="#" class="btn-action btn-detail" data-bs-toggle="tooltip" data-bs-title="Chi tiết ngày tập"><i class="bi bi-eye-fill"></i></a>
                                    </div>
                                    <div class="number-day">
                                        <h4>Ngày 22</h4>
                                    </div>
                                    <div class="description-day">
                                <p>Số bài tập: 5</p>
                                    </div>
                                </div>
                                
                                <div class="col detail-exercise">
                                    <div class="overflow">
                                        <a href="#" class="btn-action btn-detail" data-bs-toggle="tooltip" data-bs-title="Chi tiết ngày tập"><i class="bi bi-eye-fill"></i></a>
                                    </div>
                                    <div class="number-day">
                                        <h4>Ngày 23</h4>
                                    </div>
                                    <div class="description-day">
                                        <p>Số bài tập: 4</p>
                                    </div>
                                </div>
                                
                                <div class="col detail-exercise">
                                    <div class="overflow">
                                        <a href="#" class="btn-action btn-detail" data-bs-toggle="tooltip" data-bs-title="Chi tiết ngày tập"><i class="bi bi-eye-fill"></i></a>
                                    </div>
                                    <div class="number-day">
                                        <h4>Ngày 24</h4>
                                    </div>
                                    <div class="description-day">
                                        <p>Số bài tập: 3</p>
                                    </div>
                                </div>
                                
                                <div class="col detail-exercise">
                                    <div class="overflow">
                                        <a href="#" class="btn-action btn-detail" data-bs-toggle="tooltip" data-bs-title="Chi tiết ngày tập"><i class="bi bi-eye-fill"></i></a>
                                    </div>
                                    <div class="number-day">
                                        <h4>Ngày 25</h4>
                                    </div>
                                    <div class="description-day">
                                        <p>Số bài tập: 5</p>
                                    </div>
                                </div>
                                
                                <div class="col detail-exercise">
                                    <div class="overflow">
                                        <a href="#" class="btn-action btn-detail" data-bs-toggle="tooltip" data-bs-title="Chi tiết ngày tập"><i class="bi bi-eye-fill"></i></a>
                                    </div>
                                    <div class="number-day">
                                        <h4>Ngày 26</h4>
                                    </div>
                                    <div class="description-day">
                                        <p>Số bài tập: 4</p>
                                    </div>
                                </div>
                                
                                <div class="col detail-exercise">
                                    <div class="overflow">
                                        <a href="#" class="btn-action btn-detail" data-bs-toggle="tooltip" data-bs-title="Chi tiết ngày tập"><i class="bi bi-eye-fill"></i></a>
                                    </div>
                                    <div class="number-day">
                                        <h4>Ngày 27</h4>
                                    </div>
                                    <div class="description-day">
                                        <p>Số bài tập: 3</p>
                                    </div>
                                </div>
                                
                                <div class="col detail-exercise">
                                    <div class="overflow">
                                        <a href="#" class="btn-action btn-detail" data-bs-toggle="tooltip" data-bs-title="Chi tiết ngày tập"><i class="bi bi-eye-fill"></i></a>
                                    </div>
                                    <div class="number-day">
                                        <h4>Ngày 28</h4>
                                    </div>
                                    <div class="description-day">
                                        <p>Số bài tập: 5</p>
                                    </div>
                                </div>
                                
                                <div class="col detail-exercise">
                                    <div class="overflow">
                                        <a href="#" class="btn-action btn-detail" data-bs-toggle="tooltip" data-bs-title="Chi tiết ngày tập"><i class="bi bi-eye-fill"></i></a>
                                    </div>
                                    <div class="number-day">
                                        <h4>Ngày 29</h4>
                                    </div>
                                    <div class="description-day">
                                        <p>Số bài tập: 4</p>
                                    </div>
                                </div>
                                
                                <div class="col detail-exercise">
                                    <div class="overflow">
                                        <a href="#" class="btn-action btn-detail" data-bs-toggle="tooltip" data-bs-title="Chi tiết ngày tập"><i class="bi bi-eye-fill"></i></a>
                                    </div>
                                    <div class="number-day">
                                        <h4>Ngày 30</h4>
                                    </div>
                                    <div class="description-day">
                                        <p>Số bài tập: 3</p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="card">
                        <div class="card-header text-uppercase">Thông tin gói tập</div>
                        <div class="card-body">
                            <div class="infor-package-exercise">
                                <p>Tên gói tập: <span>Gói tập cơ bản cho người mới</span></p>
                                <p>Loại gói: <span>Lão luyện</span></p>
                                <p>Giá: <span>$150</span></p>
                                <p>Tổng số ngày: <span>30 ngày</span></p>
                                <p>Tổng số bài tập: <span>90 bài</span></p>
                                <p>Tổng số người sử dụng: <span>190 người</span></p>
                                <p>Tác giả: <span>MT</span></p>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header text-uppercase">Hành động</div>
                        <div class="card-body">
                            <div class="action-package-exercise">
                                <div class="action-online">
                                    <input type="radio" checked name="status" id="status-online">
                                    <label for="status-online"><a>Hoạt động</a></label>
                                </div>
                                <div class="action-offline">
                                    <input type="radio" name="status" id="status-offline">
                                    <label for="status-offline"><a>Ngừng hoạt động</a></label>
                                </div>
                            </div>

                            <div class="box-action">
                                <div class="box-btn-save">
                                    <a href="#">Lưu</a>
                                </div>
                                <div class="box-btn-delete">
                                    <a href="#">Xóa tất cả</a>
                                </div>

                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </section>

    </main><!-- End #main -->
@endsection
