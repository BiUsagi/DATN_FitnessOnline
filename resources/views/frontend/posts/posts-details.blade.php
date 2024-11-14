@extends('frontend/layouts/app-user')

@section('main')
<style>
    /* General styles */
    .reply-box {
        display: flex; /* Căn ngang các phần tử */
        align-items: flex-start; /* Căn trên cho các phần tử con */
        gap: 10px; /* Khoảng cách giữa ảnh và nội dung */
    }
    
    .css-img {
        width: 50px;
        height: 50px;
        border: 1px solid white;
        overflow: hidden;
        border-radius: 50%; /* Để hình dạng tròn */
        justify-content: center;
        align-items: center;
    }
    
    .css-img img {
        width: 100%;
        height: 100%;
        object-fit: contain; /* Đảm bảo ảnh được crop đúng khung */
    }
    
    .css-name {
        font-size: 15.5px;
        font-weight: 500;
        color: #1FACE1;
    }
    
    .timing {
        color: white;
        font-size: 12px;
        padding-left: 10px;
    }
    
    .comment-text {
        color: white;
        margin-top: 5px;
        margin-bottom: 2px;
        font-size: 15px;
        width: 665px;
    }
    
    .comment-actions {
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: 13px;
    }
    
    .reply-button {
        color: white;
        cursor: pointer;
        font-weight: 500;
    }
    
    /* Styles for the reply form */
    .formRep {
        width: 100%;
        margin-top: 10px;
        display: flex;
        flex-direction: column;
    }
    
    .formRep .col-md-11 {
        width: 100%; /* Đảm bảo textarea rộng toàn bộ */
        padding-right: 60px;
    }
    
    .form-group.comments {
        display: flex;
        flex-direction: row;
        align-items: center;
        gap: 10px;
    }
    
    .form-control {
        width: 78%;
        border: none;
        background-color: #242529;
        border-bottom: 2px solid #ccc;
        color: white;
        border-radius: 0;
    }
    
    .form-control:focus {
        border-bottom: 2px solid #007bff;
        background-color: #242529;
        color: white;
    }
    
    .css-button {
        background-color: #007bff;
        color: white;
        padding: 10px 20px;
        margin-top: 10px;
        border-radius: 10px;
    }
    
    /* Responsive adjustments */
    @media (max-width: 768px) {
        .reply-box {
            flex-direction: column; /* Xếp dọc các phần tử */
            align-items: flex-start;
        }
    
        .css-img {
            width: 50px;
            height: 50px;
        }
    
        .css-name {
            font-size: 14px;
        }
    
        .comment-text {
            font-size: 14px;
        }
    
        .timing {
            padding-left: 10px;
            font-size: 11px;
        }
    
        .comment-actions {
            gap: 5px;
            flex-wrap: wrap;
        }
    
        .reply-button {
            font-size: 12px;
        }
    
        .formRep .form-control {
            font-size: 14px;
        }
    
        .css-button {
            padding: 8px 16px;
            font-size: 14px;
        }
    }
    
    @media (max-width: 480px) {
        .css-img {
            width: 40px;
            height: 40px;
        }
    
        .css-name, .timing, .comment-text, .reply-button {
            font-size: 12px;
        }
    
        .css-button {
            padding: 6px 12px;
            font-size: 12px;
        }
    
        .formRep .form-control {
            font-size: 12px;
        }
    }
        /* CSS NÚT BA CHẤM */
        .options-menu {
            position: absolute;
            top: 5px;
            right: 100px;
        }
    
        .three-dots {
            cursor: pointer;
            font-size: 18px;
            color: white;
            display: inline-block; 
        }
    
        .menu {
            display: none;
            position: absolute;
            right: 0;
            background-color: #444;
            color: white;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            min-width: 80px; /* Chiều rộng của menu */
            z-index: 100;
        }
    
        .menu-item {
            padding: 8px 15px;
            cursor: pointer;
            font-size: 14px;
            color: #f0f0f0;
            transition: all 0.3s ease;
            display: block;
            width: 100%; /* Để mục menu chiếm toàn bộ chiều rộng */
            box-sizing: border-box;
        }
    
        .menu-item:hover {
            background-color: #555;
            color: #ffffff;
            font-weight: bold;
            border-left: 3px solid #3498db;
            padding-left: 12px;
            width: calc(100% - 3px); /* Đảm bảo nó vừa với menu khi có border */
        }
        /* CSS MODAL REPORT */
        #reportModal {
            display: none; /* Ẩn modal mặc định */
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5); /* Làm mờ nền phía sau */
            z-index: 1000;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* Nội dung chính của modal */
        #reportModal .modal-content {
            background-color: #fff;
            border-radius: 8px;
            padding: 20px;
            width: 90%;
            max-width: 400px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
            animation: fadeIn 0.3s ease; /* Hiệu ứng mở modal */
        }

        /* Tiêu đề modal */
        #reportModal h3 {
            margin: 0 0 15px;
            font-size: 18px;
            color: #333;
        }

        /* Textarea để nhập lý do báo cáo */
        #reportContent {
            width: 100%;
            height: 100px;
            margin-bottom: 15px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            resize: vertical;
            font-size: 14px;
        }

        /* Nút gửi và đóng modal */
        #reportModal button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 14px;
            cursor: pointer;
            margin: 5px;
            transition: background-color 0.3s ease;
        }

        /* Nút gửi báo cáo */
        #reportModal button:first-of-type {
            background-color: #28a745;
            color: white;
        }

        #reportModal button:first-of-type:hover {
            background-color: #218838;
        }

        /* Nút đóng modal */
        #reportModal button:last-of-type {
            background-color: #dc3545;
            color: white;
        }

        #reportModal button:last-of-type:hover {
            background-color: #c82333;
        }

        /* Hiệu ứng mở modal */
        @keyframes fadeIn {
            from { opacity: 0; transform: scale(0.9); }
            to { opacity: 1; transform: scale(1); }
        }

    </style>
<section>
    <div class="breadcrumb_wrapper">
        <div class="container"> 
            <div class="breadcrumb_block">
                {{-- <h1 style="font-size: 40px" >Chi tiết<span> bài viết</span></h1> --}}
                <div class="trackPage">
                    <a href="index.html">HOME</a>
                    <span>Chi tiết bài viết</span>
                </div>
            </div>
        </div>
    </div>
    <div class="blog_wrapper default-padding blog_details">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    
                    <div class="inner-content">
                        
                        <div class="single-blog-post">
                            <div class="blog-image">
                                <img loading='lazy' src="{{ asset('uploads/post_image/' . $posts->image) }}" alt="blog_detail_img.webp" style="width:90%">
                            </div>
                            <div class="blog-detail">
                                <div class="blog-desc">
                                    <div class="blog-meta">
                                        <div class="date"><img loading='lazy' src="assets/frontend/images/icons/calendar.svg"><span>{{$posts->created_at->locale('vi')->diffForHumans()}}</span></div>
                                        <div class="date"><img loading='lazy' src="assets/frontend/images/icons/chat.svg"><span>5</span></div>
                                        <div class="date"><img loading='lazy' src="assets/frontend/images/icons/heart.svg"><span>123</span></div>
                                    </div>
                                    <h2 class="blog-title">{{$posts->title}}</h2>
                                    <p>{!!$posts->content!!}</p>
                                    <p style="font-weight: bold; co">Tác giả: {{$posts->user->staff_name}}</p>
                                    <div class="tags">
                                        <ul>
                                            <li>Tags:</li>
                                            <li><a href="#!">Gym</a></li>
                                            <li><a href="#!">Fat Loss</a></li>
                                            <li><a href="#!">Bicep</a></li>
                                        </ul>
                                        <ul class="social">
                                            <li>Share:</li>
                                            <li><a href="#!"aria-label="Facebook"><img loading='lazy' src="assets/frontend/images/icons/facebook-blue.svg" alt="icon"></a></li>
                                            <li><a href="#!" aria-label="Twitter"><img loading='lazy' src="assets/frontend/images/icons/twitter-blue.svg" alt="icon"></a></li>
                                            <li class="me-0"><a href="#!" aria-label="Instagram"><img loading='lazy' src="assets/frontend/images/icons/instagram-blue.svg" alt="icon"></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>




                        <div class="comment-box default-padding" style="padding-bottom: 20px">
                            <div class="section-title">
                                <h3 style="color: white">Comments (*)</h3>
                            </div>
                            {{-- FORM BÌNH LUẬN --}}
                        @if (Auth::guard('web')->check())
                       
                        <form action="" method="POST" class="contact-form">
                            <div class="col-md-12">
                                    <div class="form-group comments">
                                        <textarea class="form-control" id="comment-content" name="comments" placeholder="Message*" rows="1"></textarea>
                                        <small id="comment-error" style="color:aliceblue"></small>
                                        <div class="col-md-1" style="float: right;">
                                            <button type="button" class="css-button" id="btn-comments">Gửi</button>
                                        </div>
                                    </div>
                            </div>                                
                        </form>
                    @else
                    <form action="" method="POST" class="contact-form">
                        <div class="col-md-12">
                                <div class="form-group comments">
                                    <textarea class="form-control" id="comment-content" name="comments" placeholder="Message*" rows="1"></textarea>
                                    <small id="comment-error" style="color:aliceblue"></small>
                                    <div class="col-md-1" style="float: right;">
                                        <button type="button" class="css-button" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Gửi</button>
                                    </div>
                                </div>
                        </div>                                
                    </form>
                    @endif
                    {{-- END FORM BÌNH LUẬN --}}
                            <div id="comment">
                               @include('frontend.posts.list-comment',['Comments'=>$posts->Comments])
                            </div>


                        </div>



                        



                    </div>
                </div>
                <div class="col-lg-4 col-md-9">
                    <div class="sidebar">
                        {{-- <div class="widget search-widget">
                            <div class="heading">
                                <h5>Tìm kiếm</h5>
                            </div>
                            <div class="sidebar-item search">
                                <form class="input-search">
                                    <input type="text" class="form-control input-lg" placeholder="Search..." required>
                                    <button class="btn-search" type="submit"><img loading='lazy' src="assets/frontend/images/search-btn.svg" alt="icon"></button>
                                </form>
                            </div>
                        </div> --}}
                        {{-- <div class="widget categories-widget">
                            <div class="heading">
                                <h5>Categories</h5>
                            </div>
                            <div class="sidebar-item category">
                                <div class="sidebar-info">
                                    <ul>
                                        <li><a href="#!">Fitness</a></li>
                                        <li><a href="#!">Yoga</a></li>
                                        <li><a href="#!">Fat Loss</a></li>
                                        <li><a href="#!">Weight Gain</a></li>
                                        <li><a href="#!">Cardio</a></li>
                                        <li><a href="#!">Running</a></li>
                                        <li><a href="#!">Goal</a></li>
                                        <li><a href="#!">Body Building</a></li>
                                        <li><a href="#!">Gym</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div> --}}
                        <div class="widget recentpost-widget">
                            <div class="heading">
                                <h5>Blog liên quan</h5>
                            </div>
                            <div class="sidebar-item recent-post text-left">
                                <div class="sidebar-info">
                                    <ul>
                                        @foreach ($onlyBlog->take(3) as $only)
                                                <li>
                                                    <div class="thumb"> 
                                                        <a href="{{ route('posts-details.index', $only->id) }}" class="title-link">><img loading='lazy' src="{{ asset('uploads/post_image/' . $only->image) }}" alt="post-1.webp" style="width:70px; height:50px; object-fit: cover;" ></a>
                                                    </div>
                                                    <div class="info">
                                                        <a href="{{ route('posts-details.index', $only->id) }}">{{$only->title}}</a>
                                                        <div class="meta-title">
                                                            <span class="post-date">{{$only->created_at->locale('vi')->diffForHumans()}}</span>
                                                        </div>
                                                    </div>
                                                </li>
                                            @endforeach
                                        
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="widget tags-widget">
                            <div class="heading">
                                <h5>Tags</h5>
                            </div>
                            <div class="sidebar-item tags">
                                <div class="sidebar-info">
                                    <ul>
                                        <li><a href="#!">Fitness</a></li>
                                        <li><a href="#!">Lifestyle</a></li>
                                        <li><a href="#!">Food</a></li>
                                        <li><a href="#!">Training</a></li>
                                        <li><a href="#!">Health</a></li>
                                        <li><a href="#!">Diet</a></li>
                                        <li><a href="#!">Boxing</a></li>
                                        <li><a href="#!">Food</a></li>
                                        <li><a href="#!">Cardio</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Đăng nhập</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="">
                        <div class="form-group">
                            <label for="">Email:</label>
                            <input type="text" name="email" id="email" class="form-control">
                            <label for="">Password:</label>
                            <input type="text" name="password" id="password" class="form-control">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="ajaxlogin">Đăng nhập</button>
                </div>
            </div>
            </div>
        </div>
</section>
<script>
    $(document).ready(function() {
        $('#ajaxlogin').click(function() {
            var email = $('#email').val();
            var password = $('#password').val();

            $.ajax({
                url: '{{ route('ajax.login') }}',
                type: 'POST',
                data: {
                    email: email,
                    password: password,
                    _token: '{{ csrf_token() }}' // cần token CSRF
                },
                success: function(response) {
                    if (response.success) {
                        alert(response.message);
                        location.reload();
                        // Có thể thực hiện thêm hành động sau khi đăng nhập thành công
                    } else {
                        alert(response.message);
                    }
                },
                error: function(xhr) {
                    alert('Có lỗi xảy ra! Vui lòng thử lại.');
                }
            });
        });
    });


    //SUBMIT BÌNH LUẬN
    $('#btn-comments').click(function(ev) {
        ev.preventDefault();
        let content = $('#comment-content').val();
        let _commentUrl = '{{ route("ajax.comment", $posts->id) }}';
        
        $.ajax({
            url:_commentUrl,
            type : 'POST',
            data:{
                content: content,
                _token: '{{ csrf_token() }}' // cần token CSRF
            },
            success: function (res){
                if (res.error){
                    $('#comment-error').html(res.error)
                }else{
                    $('#comment-error').html('');
                    $('#comment-content').val('');
                    $('#comment').html(res);
                    // console.log(res);
                    // Gọi hàm để gắn sự kiện "Báo cáo" cho các bình luận mới
                    attachReportEvent();
                }
            }
        })
    });


    // TRẢ LỜI BÌNH LUẬN
    $(document).on('click', function(event) {
        // Kiểm tra nếu click vào ngoài form trả lời và nút "Phản hồi"
        if (!$(event.target).closest('.formRep, .btn-rep, ').length) {
            // Đóng tất cả các form trả lời
            $('.formRep').slideUp();
            $('.edit-comment').slideUp();
            $('.edit-reply').slideUp();
            // Hiển thị lại form bình luận chính
            $('.contact-form').slideDown();
        }
    });

    $(document).on('click', '.btn-rep',function(ev){
        ev.preventDefault();
        let _commentUrl = '{{ route("ajax.comment", $posts->id) }}';
        // Lấy ID và phần tử textarea của bình luận cần trả lời
        var id = $(this).data('id');
        var comment_rep_id = '#comment-con-' +id;
        var form_rep = '.form-rep-' +id; 
        var contentRep = $(comment_rep_id).val();
         // Ẩn tất cả các form trả lời trước khi hiển thị form hiện tại
        $('.formRep').slideUp();
        $('.contact-form').slideDown(); // Luôn hiện form bình luận chính
        
        // Kiểm tra xem form trả lời hiện tại có đang mở không
        if (!$(form_rep).is(':visible')) {
            $(form_rep).slideDown();
            $('.contact-form').slideUp(); // Ẩn form bình luận chính
        }
        // Lấy tên người dùng từ data-username
        var userName = $(this).data('username');
        $(comment_rep_id).val('@' + userName + ' ' + contentRep);

    });
    
    $(document).on('click', '.btn-send-rep',function(ev){
        ev.preventDefault();
        var id = $(this).data('id');
        var comment_rep_id = '#comment-con-' +id;
        var form_rep = '.form-rep-' +id; 
        var contentRep = $(comment_rep_id).val();
        var _commentUrl = '{{ route("ajax.comment", $posts->id) }}';
        
        $.ajax({
            url:_commentUrl,
            type : 'POST',
            data:{
                content:  contentRep,
                rep: id,
                _token: '{{ csrf_token() }}' // cần token CSRF
            },
            success: function (res){
                if (res.error){
                    $('#comment-error').html(res.error)
                }else{
                    $('#comment-error').html('');
                    $('#comment-content').val('');
                    $('#comment').html(res);
                    attachReportEvent();
                    // console.log(res);
                    $('.contact-form').slideDown(); // Hiện lại form bình luận chính
                    $('.formRep').slideUp();
                }
            }
        })
    });
    //Report
    let commentId = null;

    // Mở modal và lưu lại ID bình luận
    function openModal(id) {
        commentId = id;
        document.getElementById('reportModal').style.display = 'flex';
    }

    // Đóng modal
    function closeModal() {
        document.getElementById('reportModal').style.display = 'none';
    }

    // Gửi báo cáo bằng AJAX
    function submitReport() {
        const reportContent = document.getElementById('reportContent').value;
        if (!reportContent) {
            alert("Vui lòng nhập nội dung báo cáo.");
            return;
        }
        
        // Sử dụng AJAX để gửi báo cáo đến server
        $.ajax({
            url: 'ajax/report-comment',
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                comment_id: commentId,
                report: reportContent
            },
            success: function(response) {
                alert("Báo cáo của bạn đã được gửi.");
                closeModal();
            },
            error: function(error) {
                alert("Đã xảy ra lỗi khi gửi báo cáo.");
            }
        });
    }


    //Update comments cha
    $(document).on('click', '.edit-comment', function() {
        $('.contact-form').slideUp();
        $('.formRep').slideUp();
        // $('.edit-reply').slideUp();
        const commentId = $(this).data('id');
        const currentContent = $(this).data('content');

        // Hiển thị input để sửa nội dung bình luận
        const editHtml = `<textarea class="form-control" id="edit-content-${commentId}" rows="1" cols="95px">${currentContent}</textarea>
                        <button type="button" class="btn-save-edit" data-id="${commentId}"  style="color: #1E90FF;margin-left: 550px;">Lưu</button>
                        `;
        
        $(this).closest('.single-comment-box').find('.comment-text').html(editHtml);
    });

    $(document).on('click', '.btn-save-edit', function() {
        const commentId = $(this).data('id');
        const newContent = $(`#edit-content-${commentId}`).val();

        $.ajax({
            url: `{{ route('ajax.comment.update', '') }}/${commentId}`,
            type: 'PUT',
            data: {
                content: newContent,
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                if (response.success) {
                    $(`#edit-content-${commentId}`).closest('.comment-text').text(newContent);
                    alert('Bình luận đã được cập nhật.');
                } else {
                    alert('Có lỗi xảy ra khi cập nhật bình luận.');
                }
            }
        });
    });
    //Xóa comment
    $(document).on('click', '.delete-comment', function (ev) {
        ev.preventDefault();
        let commentId = $(this).data('id'); // Lấy ID của bình luận cần xóa

        $.ajax({
            url: `ajax/comment/${commentId}`,  // URL của route xóa bình luận
            type: 'DELETE',
            data: {
                _token: '{{ csrf_token() }}'  // CSRF token để bảo mật
            },
            success: function (response) {
                if (response.success) {
                    // Xóa bình luận cha và bình luận con khỏi giao diện
                    $(`#deletecomment-${commentId}`).remove();
                    
                    // Xóa tất cả bình luận con nếu có
                    $(`.reply-box[data-parent-id="${commentId}"]`).remove();
                    
                    alert("Bình luận và bình luận con đã được xóa.");
                } else {
                    alert("Có lỗi xảy ra khi xóa bình luận.");
                }
            },
            error: function (xhr, status, error) {
                alert("Có lỗi xảy ra khi xóa bình luận.");
            }
        });
    });

    //update comment con
    $(document).on('click', '.edit-reply', function (ev) {
        $('.contact-form').slideUp();
        $('.formRep').slideUp();
        // $('.edit-comment').slideUp();
        
        ev.preventDefault();
        let replyId = $(this).data('id');
        let currentContent = $(this).data('content');

        // Kiểm tra xem phần tử comment-text có tồn tại không
        console.log('Reply ID:', replyId);
        console.log('Current Content:', currentContent);

        const editHtml = `
                        <textarea class="form-control" id="edit-content-${replyId}" rows="1" cols="75px"> ${currentContent}</textarea>
                        <button type="button" class="btn-save-edit-reply" data-id="${replyId}" style="color: #1E90FF;">Lưu</button>
                        `;

        // Kiểm tra xem phần tử comment-text có tồn tại trước khi thay thế nội dung
        const commentTextElem = $(`#reply-${replyId} .comment-text`);
        if (commentTextElem.length > 0) {
            commentTextElem.html(editHtml);
        } else {
            console.error('Không tìm thấy phần tử comment-text');
        }
    });

    $(document).on('click', '.btn-save-edit-reply', function() {
        const replyId = $(this).data('id');
        const newContent = $(`#edit-content-${replyId}`).val();
        $.ajax({
            url: `ajax/comment/reply/${replyId}`,
            type: 'PUT',
            data: {
                _token: '{{ csrf_token() }}',
                content: newContent
            },
            success: function(response) {
                if (response.success) {
                    // Cập nhật lại nội dung bình luận con trên giao diện
                    $(`#reply-${replyId} .comment-text`).text(newContent);
                    alert('Bình luận con đã được sửa.');
                } else {
                    alert('Có lỗi xảy ra khi sửa bình luận con.');
                }
            },
            error: function(xhr, status, error) {
                alert('Có lỗi xảy ra khi sửa bình luận con.');
            }
        });
    });



    //xóa comment con
    $(document).on('click', '.delete-reply', function (ev) {
        ev.preventDefault();
        let replyId = $(this).data('id'); // Lấy ID của bình luận con cần xóa

        $.ajax({
            url: `ajax/comment/reply/${replyId}`,
            type: 'DELETE',
            data: {
                _token: '{{ csrf_token() }}'  // CSRF token để bảo mật
            },
            success: function (response) {
                if (response.success) {
                    // Xóa bình luận con khỏi giao diện ngay lập tức
                    $(`#reply-${replyId}`).remove();
                    alert("Bình luận con đã được xóa.");
                } else {
                    alert("Có lỗi xảy ra khi xóa bình luận con.");
                }
            },
            error: function (xhr, status, error) {
                alert("Có lỗi xảy ra khi xóa bình luận con.");
            }
        });
    });

</script>
@endsection

