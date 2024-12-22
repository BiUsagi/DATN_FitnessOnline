@extends('frontend/layouts/app-user')


@section('main')
<section>
        <div class="breadcrumb_wrapper">
            <div class="container">
                <div class="breadcrumb_block">
                    <h1><span>Tin tức</span></h1>
                    <div class="trackPage">
                        <a href="{{ route('index') }}">Trang chủ</a>
                        <span>Blog</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="blog_wrapper default-padding blog_page">
            <div class="container">
                <div class="row justify-content-center ">
                    <div class="col-lg-8">
                        <div class="inner-content">

                            {{-- Show bài viết --}}

                            @foreach ($TopBlog as $TopBlogs)
                                <div class="single-blog-post">
                                    <div class="blog-image">
                                        <a href="{{ route('posts-details.index', $TopBlogs->id) }}">
                                        <img loading='lazy' src="{{ asset('uploads/post_image/' . $TopBlogs->image) }}" alt="blog_detail_img.webp"></a>
                                    </div>
                                    <div class="blog-detail">
                                        <div class="blog-desc">
                                            <div class="blog-meta">
                                                <div class="date"><img loading='lazy' src="assets/frontend/images/icons/calendar.svg"><span>{{$TopBlogs->created_at->locale('vi')->diffForHumans()}}</span></div>
                                                <div class="date"><img loading='lazy' src="assets/frontend/images/icons/chat.svg"><span>5</span></div>
                                                <div class="date"><img loading='lazy' src="assets/frontend/images/icons/heart.svg"><span>123</span></div>
                                            </div>
                                            <a href="{{ route('posts-details.index', $TopBlogs->id) }}">
                                                <h2 class="blog-title">{{$TopBlogs->title}}</h2>
                                            </a>
                                            <p>{{$TopBlogs->description}}</p>
                                        
                                            <div class="tags">
                                                <ul>
                                                    <li><a href="{{ route('posts-details.index', $TopBlogs->id) }}">Chi tiết</a>
                                                        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                            viewBox="0 0 500 279" style="enable-background:new 0 0 500 279;" xml:space="preserve">
                                                        <style type="text/css">
                                                            .st0{fill:#1face1;}
                                                        </style>
                                                        <path class="st0" d="M495,141.4c-1.4,1.1-3,2.1-4.3,3.4c-41.9,41.8-83.8,83.7-125.6,125.6c-1.3,1.3-2.2,3.1-3.1,4.5
                                                            c-8.1-8.1-15.2-15.1-22.4-22.4c31.8-31.7,63.7-63.6,96.6-96.4c-144,0-286.7,0-429.8,0c0-10.5,0-20.4,0-30.8c142.8,0,285.6,0,429,0
                                                            c-32.5-32.5-64.5-64.4-96.3-96.2c7.9-7.9,14.9-14.9,23-23c0.9,1.4,1.8,3.2,3.1,4.5c41.8,41.9,83.7,83.8,125.6,125.6
                                                            c1.3,1.3,2.9,2.3,4.3,3.4C495,140.2,495,140.8,495,141.4z"/>
                                                        </svg>
                                                    </li>
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
                            @endforeach 

                            {{-- end Show bài viết --}}
                        </div>
                    {{-- phân trang --}}
                        <div class="pagination-container d-flex justify-content-center">
                            <ul class="pagination">
                                {{-- Nút Previous --}}
                                @if ($TopBlog->onFirstPage())
                                    <li class="pagination-item--wide first">
                                        <a class="pagination-link--wide text-secondary disabled" href="#">&lt;
                                            Trước</a>
                                    </li>
                                @else
                                    <li class="pagination-item--wide first">
                                        <a class="pagination-link--wide text-white" href="{{ $TopBlog->previousPageUrl() }}">&lt;
                                            Trước</a>
                                    </li>
                                @endif
                                <li class="pagination-item first-number"></li>
                                {{-- Danh sách các trang --}}
                                @foreach ($TopBlog->getUrlRange(1, $TopBlog->lastPage()) as $page => $url)
                                    <li class="pagination-item {{ $page == $TopBlog->currentPage() ? 'is-active' : '' }}">
                                        <a class="pagination-link text-white" href="{{ $url }}">{{ $page }}</a>
                                    </li>
                                @endforeach

                                {{-- Nút Next --}}
                                @if ($TopBlog->hasMorePages())
                                    <li class="pagination-item--wide last">
                                        <a class="pagination-link--wide text-white" href="{{ $TopBlog->nextPageUrl() }}">Tiếp
                                            &gt;</a>
                                    </li>
                                @else
                                    <li class="pagination-item--wide last">
                                        <a class="pagination-link--wide text-secondary disabled" href="#">Tiếp
                                            &gt;</a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-9">
                        <div class="sidebar">
                            <div class="widget search-widget">
                                <div class="heading">
                                    <h5>Tìm kiếm</h5>
                                </div>
                                <div class="sidebar-item search">
                                    <form class="input-search" id="search-form">
                                        <input type="text" class="form-control input-lg" id="search-input" placeholder="Search..." required>
                                        <button class="btn-search" type="submit"><img loading='lazy' src="assets/frontend/images/search-btn.svg" alt="icon"></button>
                                    </form>
                                </div>
                                <div class="widget recentpost-widget">
                                    <div class="heading">
                                    </div>
                                    <div class="sidebar-item recent-post text-left" id="search-results">
                                        
                                        {{-- LIST TÌM KIẾM --}}

                                    </div>
                                </div>
                            </div>
                            <div class="widget recentpost-widget">
                                <div class="heading">
                                    <h5>Blog mới nhất</h5>
                                </div>
                                <div class="sidebar-item recent-post text-left">
                                    <div class="sidebar-info">
                                        <ul>
                                            @foreach ($onlyBlog->take(3) as $only)
                                                <li>
                                                    <div class="thumb"> 
                                                        <a href="#!"><img loading='lazy' src="{{ asset('uploads/post_image/' . $only->image) }}" alt="post-1.webp"></a>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
<script>
    $(document).ready(function() {
        // Xử lý sự kiện khi người dùng nhập vào ô tìm kiếm
        $('#search-input').on('input', function() {
            var query = $(this).val(); 

            if (query.length > 2) { 
                $.ajax({
                    url: '{{ route('posts.search') }}',
                    method: 'GET',
                    data: { query: query },
                    success: function(response) {
                        // Xử lý kết quả trả về từ API
                        var resultsHTML = '';
                        if (response.length > 0) {
                            response.forEach(function(post) {
                                resultsHTML += `
                                    <div class="sidebar-info">
                                        <ul>
                                            <li>
                                                <div class="thumb">
                                                    <a href="#"><img loading='lazy' src="{{ asset('uploads/post_image') }}/${post.image}" alt="post-1.webp"></a>
                                                </div>
                                                <div class="info">
                                                    <a href="{{ route('posts-details.index', '') }}/${post.id}">${post.title}</a>
                                                    <div class="meta-title">
                                                        <span class="post-date">${new Date(post.created_at).toLocaleDateString('vi-VN')}</span>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                `;
                            });
                        } else {
                            resultsHTML = '<p>Không có bài viết nào.</p>';
                        }

                        $('#search-results').html(resultsHTML);
                    },
                    error: function(xhr, status, error) {
                        console.log("Error: " + error);
                    }
                });
            } else {
                $('#search-results').html(''); 
            }
        });
    });
</script>
@endsection