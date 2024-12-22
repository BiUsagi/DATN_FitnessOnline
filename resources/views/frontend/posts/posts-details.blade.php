@extends('frontend/layouts/app-user')

@section('custom_css')
    <link rel="stylesheet" href="assets/frontend/css/comment.css">
@endsection

@section('main')
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
                                        <div class="col-md-1" style="float: right;">
                                            <button type="button" class="css-button" id="btn-comments">Gửi</button>
                                        </div>
                                    </div>  
                                </div>   
                                <small id="comment-error" style="font-weight: 500  !important; font-size: 13px !important; font-style: italic !important; color: red !important; padding: 10px 10px !important;"></small>                             
                            </form>
                        @else
                        <form action="" method="POST" class="contact-form">
                            <div class="col-md-12">
                                    <div class="form-group comments">
                                        <textarea class="form-control" id="comment-content" name="comments" placeholder="Message*" rows="1"></textarea>
                                        <small id="comment-error" style="color:aliceblue"></small>
                                        <div class="col-md-1" style="float: right;">
                                            <a href="{{ route('login_.index') }}">
                                                <button type="button" class="css-button">
                                                    Gửi
                                                </button>
                                            </a>
                                        </div>
                                    </div>
                            </div>                                
                        </form>
                        @endif
                        {{-- END FORM BÌNH LUẬN --}}
                                <div id="comment" style=" margin-top: 20px; ">
                                    @include('frontend.posts.list-comment',['Comments'=>$posts->Comments])
                                </div> {{--END LIST BÌNH LUẬN--}}
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-9">
                    <div class="sidebar">
                        <div class="widget recentpost-widget">
                            <div class="heading">
                                <h5>Blog liên quan</h5>
                            </div>
                            <div class="sidebar-item recent-post text-left">
                                <div class="sidebar-info">
                                    @if($onlyBlog->isEmpty())
                                        <p>Không có bài viết nào</p>
                                    @else
                                        <ul>
                                            @foreach ($onlyBlog as $only)
                                                <li>
                                                    <div class="thumb">
                                                        <a href="{{ route('posts-details.index', $only->id) }}" class="title-link">
                                                            <img loading='lazy' src="{{ asset('uploads/post_image/' . $only->image) }}" alt="post-1.webp" style="width:70px; height:50px; object-fit: cover;">
                                                        </a>
                                                    </div>
                                                    <div class="info">
                                                        <a href="{{ route('posts-details.index', $only->id) }}">{{ $only->title }}</a>
                                                        <div class="meta-title">
                                                            <span class="post-date">{{ $only->created_at->locale('vi')->diffForHumans() }}</span>
                                                        </div>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
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
        {{-- <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
        </div> --}}
</section>
<script>
    // $(document).ready(function() {
    //     $('#ajaxlogin').click(function() {
    //         var email = $('#email').val();
    //         var password = $('#password').val();

    //         $.ajax({
    //             url: '{{ route('ajax.login') }}',
    //             type: 'POST',
    //             data: {
    //                 email: email,
    //                 password: password,
    //                 _token: '{{ csrf_token() }}'
    //             },
    //             success: function(response) {
    //                 if (response.success) {
    //                     alert(response.message);
    //                     location.reload();
    //                 } else {
    //                     alert(response.message);
    //                 }
    //             },
    //             error: function(xhr) {
    //                 alert('Có lỗi xảy ra! Vui lòng thử lại.');
    //             }
    //         });
    //     });
    // });


    //SUBMIT BÌNH LUẬN
    $('#btn-comments').click(function(ev) {
        ev.preventDefault();
        let content = $('#comment-content').val();
        let _commentUrl = '{{ route("ajax.comment", $posts->id) }}';
        
        $.ajax({
            url: _commentUrl,
            type: 'POST',
            data: {
                content: content,
                _token: '{{ csrf_token() }}'
            },
            success: function(res) {
                if (res.error) {
                    $('#comment-error').html(res.error);
                } else {
                    $('#comment-error').html('');
                    $('#comment-content').val('');
                    $('#comment').html(res);

                    toastr.success('Bình luận đã được gửi thành công!');

                    attachReportEvent();
                }
            }
        });
    });



    // TRẢ LỜI BÌNH LUẬN
    $(document).on('click', function (event) {
        if (!isEditing && !$(event.target).closest('.formRep, .btn-rep, .contact-form').length) {
            $('.formRep').slideUp();
            $('.contact-form').slideDown();
        }
    });
    $(document).on('click', '.btn-rep',function(ev){
        ev.preventDefault();
        let _commentUrl = '{{ route("ajax.comment", $posts->id) }}';

        var id = $(this).data('id');
        var comment_rep_id = '#comment-con-' +id;
        var form_rep = '.form-rep-' +id; 
        var contentRep = $(comment_rep_id).val();

        $('.formRep').slideUp();
        $('.contact-form').slideDown();
        

        if (!$(form_rep).is(':visible')) {
            $(form_rep).slideDown();
        }

        var userName = $(this).data('username');

        $(comment_rep_id).val(''); 
        $(comment_rep_id).val('@' + userName + ' ');

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
                _token: '{{ csrf_token() }}'
            },
            success: function (res) {
                if (res.error) {
                    $('#comment-error').html(res.error);
                } else {
                    $('#comment-error').html('');
                    $('#comment-content').val('');
                    $('#comment').html(res);
                    toastr.success('Bình luận đã được gửi thành công!');
                    attachReportEvent();
                    
                    $('.formRep').slideUp();
                    $('.contact-form').slideDown();
                }
            }
        })
    });
    //Report
    let commentId = null;

    function openModal(commentId) {
        const modal = document.getElementById('reportModal');
        modal.dataset.commentId = commentId; // Gán `comment_id` vào modal
        modal.style.display = 'flex';
    }
    // Đóng modal
    function closeModal() {
        document.getElementById('reportModal').style.display = 'none';
        document.getElementById('reportContent').value = '';
    }
    function submitReport() {
        const commentId = document.getElementById('reportModal').dataset.commentId;
        const reportContent = document.getElementById('reportContent').value;

        if (!reportContent.trim()) {
            alert('Nội dung báo cáo không được để trống!');
            return;
        }

        $.ajax({
            url: 'ajax/report-comment',
            type: 'POST',
            data: {
                comment_id: commentId,
                report_content: reportContent,
                _token: '{{ csrf_token() }}'
            },
            success: function (response) {
                
                toastr.success('Báo cáo đã được gửi thành công!');
                closeModal();
            },
            error: function (xhr) {
                alert('Có lỗi xảy ra: ' + xhr.responseJSON.message);
            }
        });
    }
    //Update comments cha
    $(document).on('click', '.edit-comment', function() {
      
        isEditing = true;
        $('.contact-form').slideUp();
        $('.formRep').slideUp();
        $('.edit-reply').slideUp();
        const commentId = $(this).data('id');
        const currentContent = $(this).data('content');

        // Hiển thị input để sửa nội dung bình luận
        const editHtml = `<textarea class="form-controll" id="edit-content-${commentId}" rows="1" cols="85">${currentContent}</textarea>
                        <button type="button" class="btn-save-edit" data-id="${commentId}"  style="color: #1E90FF;">Lưu</button>
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

                    const commentBox = $(`#edit-content-${commentId}`).closest('.single-comment-box');
                    commentBox.find('.comment-text').text(newContent);
                    commentBox.find('.edit-comment').data('content', newContent);

                    toastr.success('Bình luận đã được cập nhật thành công!');

                    isEditing = false;
                    $('.contact-form').slideDown();
                } else {
                    alert('Có lỗi xảy ra khi cập nhật bình luận.');
                }
            }
        });
    });
    //Xóa comment cha
    $(document).on('click', '.delete-comment', function (ev) {
        ev.preventDefault();
        let commentId = $(this).data('id');
        $.ajax({
            url: `ajax/comment/${commentId}`,  
            type: 'DELETE',
            data: {
                _token: '{{ csrf_token() }}'  
            },
            success: function (response) {
                if (response.success) {
                    
                    $(`#deletecomment-${commentId}`).remove();
                    
                    // Xóa tất cả bình luận con nếu có
                    $(`.reply-box[data-parent-id="${commentId}"]`).remove();
                    
                    toastr.success('Xóa bình luận thành công!');
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
       
        isEditing = true;
        
        $('.formRep').slideUp();
        ev.preventDefault();
        let replyId = $(this).data('id');
        let currentContent = $(this).data('content');

        console.log('Reply ID:', replyId);
        console.log('Current Content:', currentContent);

        const editHtml = `
                        <textarea class="form-controll" id="edit-content-${replyId}" rows="1" cols="75"> ${currentContent}</textarea> <br>
                        <button type="button" class="btn-save-edit-reply" data-id="${replyId}" style="color: #1E90FF;">Lưu</button>
                        `;

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

                    const replyBox = $(`#reply-${replyId}`);
                    replyBox.find('.comment-text').text(newContent);

                    replyBox.find('.edit-reply').data('content', newContent);

                    toastr.success('Bình luận con đã được cập nhật thành công!');

                    isEditing = false;
                    $('.contact-form').slideDown();
                } else {
                    alert('Có lỗi xảy ra khi sửa bình luận con.');
                }
            },
            error: function(xhr, status, error) {
                alert('Có lỗi xảy ra khi sửa bình luận con.');
            },
            complete: function () {

                isEditing = false;
            }
        });
    });



    //xóa comment con
    $(document).on('click', '.delete-reply', function (ev) {
        ev.preventDefault();
        let replyId = $(this).data('id'); 

        $.ajax({
            url: `ajax/comment/reply/${replyId}`,
            type: 'DELETE',
            data: {
                _token: '{{ csrf_token() }}'
            },
            success: function (response) {
                if (response.success) {
                    $(`#reply-${replyId}`).remove();
                    toastr.success('Xóa bình luận con thành công!');
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

