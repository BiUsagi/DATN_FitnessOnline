@extends('frontend/layouts/app-user')


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
                                <img loading='lazy' src="{{ asset('assets/backend/img/' . $posts->image) }}" alt="blog_detail_img.webp">
                            </div>
                            <div class="blog-detail">
                                <div class="blog-desc">
                                    <div class="blog-meta">
                                        <div class="date"><img loading='lazy' src="assets/frontend/images/icons/calendar.svg"><span>{{$posts->created_at->diffForHumans()}}</span></div>
                                        <div class="date"><img loading='lazy' src="assets/frontend/images/icons/chat.svg"><span>5</span></div>
                                        <div class="date"><img loading='lazy' src="assets/frontend/images/icons/heart.svg"><span>123</span></div>
                                    </div>
                                    <h2 class="blog-title">{{$posts->title}}</h2>
                                    <p>{{$posts->content}}</p>
                                    <p>{{$posts->user->staff_name}}</p>
                                    {{-- <blockquote>         
                                        Mattis lorem class sapien taciti inceptos at ultrices quis risus nulla rutrum tempor.
                                    </blockquote>                                   --}}
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




                        {{-- COMMENT --}}

                        <div class="comment-box default-padding">
                            <div class="section-title">
                                <h2 style="font-size: 30px" >Comments</h2>
                            </div>

                            <div>

                                {{-- BÌNH LUẬN CHA --}}
                                @if (Auth::guard('web')->check())
                                    <div class="single-comment-box">
                                        <div class="img-box"> <img loading='lazy' class="img-fluid" src="https://upload.wikimedia.org/wikipedia/vi/b/b0/Avatar-Teaser-Poster.jpg" alt="">
                                        </div>
                                        <div class="content-box">
                                            <h3>Carl Lira</h3>
                                            <p class="timing">18 August 2022, 10:00AM</p>
                                            <div class="reply_btn"><a href="#!" class="reply"> Trả lời</a></div>
                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium explicabo.</p>
                                        </div>
                                    </div>
                                @else
                                    <div class="single-comment-box">
                                        <div class="img-box"> <img loading='lazy' class="img-fluid" src="https://upload.wikimedia.org/wikipedia/vi/b/b0/Avatar-Teaser-Poster.jpg" alt="">
                                        </div>
                                        <div class="content-box">
                                            <h3>Carl Lira</h3>
                                            <p class="timing">18 August 2022, 10:00AM</p>
                                            <div class="reply_btn"><a id="login-comments" class="reply">Vui lòng đăng nhập để trả lời</a></div>
                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium explicabo.</p>
                                        </div>
                                    </div>
                                @endif



                                {{-- FORM TRẢ LỜI BÌNH LUẬN CON --}}
                                <div class="form-box"  style="display: none" >
                                    <form action="" method="POST" class="contact-form">
                                                <div class="form-group comments">
                                                    <input type="hidden" value="{{$posts->id}}" name="posts_id">
                                                    <textarea class="form-control" id="comments" name="comments" placeholder="Nhập nội dung*" rows="4" required></textarea>
                                                </div>
                                            <div class="col-md-12">
                                                <div class="form-group mb-0 text-center text-md-start pb-0">
                                                    <button type="submit" name="submit" id="submit" class="btn">Gửi bình luận</button>
                                                </div>
                                            </div>
                                    </form>
                                </div>

                                {{-- BÌNH LUẬN CON --}}
                                @if (Auth::guard('web')->check())
                                    <div class="reply-box">
                                        <div class="single-comment-box">
                                            <div class="img-box"> <img loading='lazy' class="img-fluid" src="https://upload.wikimedia.org/wikipedia/vi/b/b0/Avatar-Teaser-Poster.jpg" alt="">
                                            </div>
                                            <div class="content-box">
                                                <h3>Greta Cramer</h3>
                                                <p class="timing">19 August 2022, 10:00AM</p>
                                                <div class="reply_btn"><a href="#!" class="reply"> Trả lời</a></div>
                                                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium explicabo.</p>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="reply-box">
                                        <div class="single-comment-box">
                                            <div class="img-box"> <img loading='lazy' class="img-fluid" src="https://upload.wikimedia.org/wikipedia/vi/b/b0/Avatar-Teaser-Poster.jpg" alt="">
                                            </div>
                                            <div class="content-box">
                                                <h3>Greta Cramer</h3>
                                                <p class="timing">19 August 2022, 10:00AM</p>
                                                <div class="reply_btn"><a id="login-comments" class="reply">Vui lòng đăng nhập để trả lời</a></div>
                                                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium explicabo.</p>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>


                        {{-- END COMMENT --}}


                        {{-- FORM BÌNH LUẬN --}}
                        @if (Auth::guard('web')->check())
                            
                            <div class="form-box">
                                <div class="heading">
                                    <h2>Leave a <span>Comment</span></h2>
                                </div>
                                <form action="" method="POST" class="contact-form">
                                    <div class="row">
                                        {{-- <div class="col-md-4">
                                            <div class="form-group">
                                                <input class="form-control" id="name" name="name" placeholder="Name*" type="text" required>
                                                <span class="alert-error"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <input class="form-control" id="email" name="email" placeholder="Email*" type="email" required>
                                                <span class="alert-error"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <input class="form-control" id="phone" name="phone" placeholder="Phone No.*" type="number" required>
                                                <span class="alert-error"></span>
                                            </div>
                                        </div> --}}
                                    </div>
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="form-group comments">
                                                <input type="hidden" value="{{$posts->id}}" name="posts_id">
                                                <textarea class="form-control" id="comments" name="comments" placeholder="Nhập nội dung*" rows="4" required></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group mb-0 text-center text-md-start pb-0">
                                                <button type="submit" name="submit" id="submit" class="btn">Gửi bình luận</button>
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
                                <form class="contact-form">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="form-group comments">
                                                <input type="text" class="form-control" id="comments" name="comments" placeholder="Nhập nội dung (*)"required disabled>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group mb-0 text-center text-md-start pb-0">
                                                <a id="login-comments" class="btn">Vui lòng đăng nhập</a>
                                            </div>
                                        </div>
                                    </div>                                   
                                    <div class="col-md-12 alert-notification">
                                        <div id="message" class="alert-msg"></div>
                                    </div>
                                </form>
                            </div>

                        @endif
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
    <script>
        $("#login-comments").click(function() {
        var currentUrl = window.location.href;
    
        // Chuyển hướng người dùng đến trang đăng nhập, truyền URL hiện tại
        window.location.href = "/login?redirect_url=" + encodeURIComponent(currentUrl);
    });
    </script>
</section>
@endsection
@section('js')
    {{-- <script>
        $(#btn-login).click(function(ev){
            ev.preventDefaul();
            var _csrf = '{{crsf_token()}}';
            var _loginUrl = '{{route("login.index")}}'
            var email=$('#email').val();
            var password = $('#password-input-login').val();
            $.ajax({
                url:_loginUrl,
                type: 'POST',
                data;{
                    email :email;
                    password :password;
                    _token:_csrf
                },
                success:function(res){
                    console.log(res);
                }
            })
            console.log(eemail,ppassword,_csrf);
        })
    </script> --}}
@endsection