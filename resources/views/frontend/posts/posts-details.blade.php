@extends('frontend/layouts/app-user')


@section('main')
<section>
<style>
    .single-comment-box {
        display: flex;
        align-items: flex-start;
        padding: 15px;
        border-bottom: 1px solid #444;
        margin-bottom: 10px;
        color: #fff;
    }

    .img-box {
        margin-right: 15px;
        width: 70px;  /* Tăng chiều rộng của hộp chứa */
        height: 70px; /* Tăng chiều cao của hộp chứa */
        overflow: hidden; 
        border-radius: 50%; /* Hình tròn */
    }

    .img-box img {
        width: 100%;          /* Chiếm 100% chiều rộng của phần tử cha */
        height: 100%;         /* Chiếm 100% chiều cao của phần tử cha */
        object-fit: contain;  /* Đảm bảo hình ảnh được thu nhỏ để vừa khung mà không bị cắt */
        display: block;       /* Đảm bảo không có khoảng cách dưới hình ảnh */
    }

    .content-box {
        flex: 1;
    }

    .content-box h3 {
        font-size: 16px;
        color: #00aaff;
        margin: 0;
    }

    .timing {
        font-size: 12px;
        color: #aaa;
        margin-top: 5px;
    }

    .content-box p {
        margin: 10px 0;
        line-height: 1.5;
    }

    .reply_btn {
        margin-top: 5px;
    }

    .reply {
        display: inline-block;
        padding: 5px 10px;
        font-size: 14px;
        color: #fff;
        background-color: #00aaff;
        border-radius: 4px;
        text-decoration: none;
        transition: background-color 0.3s;
    }

    .reply:hover {
        background-color: #0077cc;
    }
</style>
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
                                <img loading='lazy' src="{{ asset('assets/backend/img/' . $posts->image) }}" alt="blog_detail_img.webp">
                            </div>
                            <div class="blog-detail">
                                <div class="blog-desc">
                                    <div class="blog-meta">
                                        <div class="date"><img loading='lazy' src="assets/frontend/images/icons/calendar.svg"><span>{{$posts->created_at}}</span></div>
                                        <div class="date"><img loading='lazy' src="assets/frontend/images/icons/chat.svg"><span>5</span></div>
                                        <div class="date"><img loading='lazy' src="assets/frontend/images/icons/heart.svg"><span>123</span></div>
                                    </div>
                                    <h2 class="blog-title">{{$posts->title}}</h2>
                                    <p>{{$posts->content}}</p>
                                    <p>{{$posts->user->staff_name}}</p>
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




                        <div class="comment-box default-padding">
                            <div class="section-title">
                                <h2>Comments</h2>
                            </div>

                            <div id="comment">
                               @include('frontend.posts.list-comment',['Comments'=>$posts->Comments])
                            </div>


                        </div>



                        {{-- FORM BÌNH LUẬN --}}
                        @if (Auth::guard('web')->check())
                        <div class="form-box">
                            {{-- <div class="heading">
                                <h2>Leave a <span>Comment</span></h2>
                            </div> --}}
                            <form action="" method="POST" class="contact-form">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="form-group comments">
                                            <textarea class="form-control" id="comment-content" name="comments" placeholder="Message*" rows="4"></textarea>
                                            <small id="comment-error" style="color:aliceblue"></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group mb-0 text-center text-md-start pb-0">
                                            <button type="button" class="btn btn-primary" id="btn-comments" class="btn">Gửi bình luận</button>
                                            
                                        </div>
                                    </div>
                                </div>                                   
                                <div class="col-md-12 alert-notification">
                                    <div id="message" class="alert-msg"></div>
                                </div>
                            </form>
                        </div>
                        @else
                        <div class="form-box">
                            {{-- <div class="heading">
                                <h2>Leave a <span>Comment</span></h2>
                            </div> --}}
                            <form class="contact-form">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="form-group comments">
                                            <textarea class="form-control" placeholder="Message*" rows="4"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group mb-0 text-center text-md-start pb-0">
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                                Gửi bình luận
                                            </button>
                                        </div> 
                                    </div>
                                </div>                                   
                            </form>
                        </div>
                        @endif
                        {{-- END FORM BÌNH LUẬN --}}



                    </div>
                </div>
                <div class="col-lg-4 col-md-9">
                    <div class="sidebar">
                        <div class="widget search-widget">
                            <div class="heading">
                                <h5>Search</h5>
                            </div>
                            <div class="sidebar-item search">
                                <form class="input-search">
                                    <input type="text" class="form-control input-lg" placeholder="Search..." required>
                                    <button class="btn-search" type="submit"><img loading='lazy' src="assets/frontend/images/search-btn.svg" alt="icon"></button>
                                </form>
                            </div>
                        </div>
                        <div class="widget categories-widget">
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
                        </div>
                        <div class="widget recentpost-widget">
                            <div class="heading">
                                <h5>Recent Posts</h5>
                            </div>
                            <div class="sidebar-item recent-post text-left">
                                <div class="sidebar-info">
                                    <ul>
                                        <li>
                                            <div class="thumb"> 
                                                <a href="#!"><img loading='lazy' src="assets/frontend/images/blog/article-1.webp" alt="post-1.webp"></a>
                                            </div>
                                            <div class="info">
                                                <a href="#!">Contrary to popular belief,  It is the</a>
                                                <div class="meta-title">
                                                    <span class="post-date">05 Jan, 2022</span>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="thumb"> 
                                                <a href="#!"><img loading='lazy' src="assets/frontend/images/blog/article-2.webp" alt="post-1.webp"></a>
                                            </div>
                                            <div class="info">
                                                <a href="#!">Contrary to popular belief,  It is the</a>
                                                <div class="meta-title">
                                                    <span class="post-date">05 Jan, 2022</span>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="thumb"> 
                                                <a href="#!"><img loading='lazy' src="assets/frontend/images/blog/article-3.webp" alt="post-1.webp"></a>
                                            </div>
                                            <div class="info">
                                                <a href="#!">Contrary to popular belief,  It is the</a>
                                                <div class="meta-title">
                                                    <span class="post-date">05 Jan, 2022</span>
                                                </div>
                                            </div>
                                        </li>
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
                    console.log(res);
                }
            }
        })
    });


    // TRẢ LỜI BÌNH LUẬN
    $(document).on('click', '.btn-rep',function(ev){
        ev.preventDefault();
        let _commentUrl = '{{ route("ajax.comment", $posts->id) }}';
        var id = $(this).data('id');
        var comment_rep_id = '#comment-con-' +id;
        var form_rep = '.form-rep-' +id; 
        var contentRep = $(comment_rep_id).val();
        $('.formRep').slideUp();
        $('.contact-form').slideDown(); // Luôn hiện form bình luận chính

        // Kiểm tra xem form trả lời hiện tại có đang mở không
        if (!$(form_rep).is(':visible')) {
            // Nếu không mở thì hiện form trả lời
            $(form_rep).slideDown();
            $('.contact-form').slideUp(); // Ẩn form bình luận chính
        }
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
                    console.log(res);
                    $('.contact-form').slideDown(); // Hiện lại form bình luận chính
                    $('.formRep').slideUp();
                }
            }
        })
    });
</script>
@endsection

