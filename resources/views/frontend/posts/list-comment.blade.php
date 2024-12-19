{{-- VIEW COMMENT CHA --}}
@foreach ($Comments as $item)

    @if (Auth::guard('web')->check())
        <div id="deletecomment-{{ $item->id }}" class="single-comment-box" style="position: relative;">
            <div class="single-comment-box">
                <div class="css-img">
                    <img loading='lazy' src="{{ asset('assets/backend/img/accounts/' . $item->user->avatar)}}" alt="">
                </div>
            </div>
            <div class="content-box">
                <strong class="css-name"><span></span>{{$item->user->user_name}}</strong><span class="timing"> {{ $item->created_at->locale('vi')->diffForHumans() }}</span>
                <div class="options-menu">
                    @if ($item->user_id === Auth::id())
                        <span class="three-dots" onclick="toggleMenu({{ $item->id }})" style="color: white">⋮</span>
                        <div class="menu" id="menu-{{ $item->id }}">
                            <span class="menu-item edit-comment" data-id="{{ $item->id }}" data-content="{{$item->content}}">Sửa</span>
                            <span class="menu-item delete-comment" data-id="{{ $item->id }}">Xóa</span>                            
                        </div>
                    @endif
                </div>
                <div class="comment-text">{{$item->content}}</div>
                <div class="comment-actions">
                    <i class="fas fa-thumbs-up" style="color: white" ></i><span class="reply-button btn-rep" data-id="{{$item->id}}" data-username="{{$item->user->user_name}}">Phản hồi</span> 
                    <span class="reply-button report-comment" style="color: red" data-id="{{$item->id}}" onclick="openModal({{ $item->id }})">Report</span>
                </div>
            </div>
        </div>
        
        {{-- MODAL BÁO CÁO --}}
        <div id="reportModal" style="display: none;" data-comment-id="">
            <div class="modal-content">
                <h3>Báo cáo bình luận</h3>
                <textarea id="reportContent" placeholder="Nhập lý do báo cáo..."></textarea>
                <button onclick="submitReport()">Gửi báo cáo</button>
                <button onclick="closeModal()">Đóng</button>
            </div>
        </div>
        {{-- MODAL BÁO CÁO --}}
    @else
    <div class="single-comment-box">
        <div class="css-img">
            <img loading='lazy' src="{{ asset('assets/backend/img/accounts/' . $item->user->avatar)}}" alt="">
        </div>
        <div class="content-box">
            <strong class="css-name"><span></span>{{$item->user->user_name}}</strong><span class="timing"> {{ $item->created_at->locale('vi')->diffForHumans() }}</span>
            <div class="options-menu">
                @if ($item->user_id === Auth::id())
                <span class="three-dots" onclick="toggleMenu()" style="color: white">⋮</span>
                    <div class="menu" id="menu">
                        <span class="menu-item edit-comment" data-id="{{$item->id}}" data-content="{{$item->content}}">Sửa</span>
                        <span class="menu-item delete-comment" data-id="{{$item->id}}">Xóa</span>
                    </div>
                @endif
            </div>
            <div class="comment-text">{{$item->content}}</div>
            <div class="comment-actions">
                <i class="fas fa-thumbs-up" style="color: white" ></i>
                <a href="{{ route('login_.index') }}">
                    <span class="reply-button">Phản hồi</span>
                </a>
                <a href="{{ route('login_.index') }}">
                    <span class="reply-button" style="color: red">Report</span>
                </a>
               
            </div>
            
        </div>
    </div>
    @endif
    {{-- END VIEW COMMENT CHA --}}


    {{-- VIEW COMMENT CON --}}
    @foreach ($item->replies as $con)
    @if (Auth::guard('web')->check())
        <div class="reply-box" data-parent-id="{{ $item->id }}" style="position: relative;" id="reply-{{ $con->id }}" >
            <div class="single-comment-box">
                <div class="css-img">
                    <img loading='lazy' src="{{ asset('assets/backend/img/accounts/' . $con->user->avatar)}}" alt="">
                </div>
            </div>
            <div class="content-box">
                    <strong class="css-name"><span></span>{{$con->user->user_name}}</strong><span class="timing"> {{ $con->created_at->locale('vi')->diffForHumans() }}</span>
                    
                    <div class="options-menu">
                        @if ($con->user_id === Auth::id())
                            <span class="three-dots" onclick="toggleMenu({{ $con->id }})"  style="color: white">⋮</span>
                            <div class="menu" id="menu-{{ $con->id }}">
                                <span class="menu-item edit-reply" data-id="{{ $con->id }}" data-content="{{ $con->content }}">Sửa</span>
                                <span class="menu-item delete-reply" data-id="{{ $con->id }}">Xóa</span>
                            </div>
                        @endif
                    </div>
                <div class="comment-text">{{$con->content}}</div>
                <div class="comment-actions">
                    <i class="fas fa-thumbs-up" style="color: white" ></i><span class="reply-button btn-rep" data-id="{{$item->id}}" data-username="{{$con->user->user_name}}">Phản hồi</span>
                    <span class="reply-button report-comment" style="color: red" data-id="{{$con->id}}" onclick="openModal({{ $con->id }})">Report</span>
                </div>
            </div>
        </div>
    @else
    <div class="reply-box">
        <div class="single-comment-box">
            <div class="css-img">
                <img loading='lazy' src="{{ asset('assets/backend/img/accounts/' . $con->user->avatar)}}" alt="">
            </div>
        </div>
        <div class="content-box">
                <strong class="css-name"><span>@</span>{{$con->user->user_name}}</strong><span class="timing"> {{ $con->created_at->locale('vi')->diffForHumans() }}</span>
            <div class="comment-text">{{$con->content}}</div>
            <div class="comment-actions">
                <a href="{{ route('login_.index') }}">
                    <span class="reply-button">Phản hồi</span>
                </a>
                <a href="{{ route('login_.index') }}">
                    <span class="reply-button" style="color: red">Report</span>
                </a>
            </div>
        </div>
    </div>
    @endif
    @endforeach
        {{-- FORM TRẢ LỜI BÌNH LUẬN --}}
        <form action="" method="POST" class="formRep form-rep-{{$item->id}}" style="display: none">
            <div class="col-md-11" style="margin-left: 50px;">
                <div class="">
                    <div class="form-group comments">
                        <textarea class="form-control" name="comments" placeholder="Message*" rows="1" id="comment-con-{{$item->id}}"></textarea>
                        <div class="col-md-1" style="float: right;">
                            <button type="button" data-id="{{$item->id}}" class="css-button btn-send-rep">Gửi</button> 
                        </div>
                    </div>
                </div>
            </div>                             
        </form>
    @endforeach

{{-- END VIEW COMMENT CON --}}
<script>
    function toggleMenu(commentId) {
        const menu = document.getElementById(`menu-${commentId}`);
        if (menu) {
            menu.style.display = menu.style.display === "none" || menu.style.display === "" ? "block" : "none";
        }
    }

    // Đóng menu khi nhấp ra ngoài
    document.addEventListener("click", function (event) {
        const menus = document.querySelectorAll(".menu");
        const threeDots = document.querySelectorAll(".three-dots");
        // Kiểm tra nếu sự kiện xảy ra không nằm trong nút hoặc menu
        let isClickOutside = true;
        threeDots.forEach(dot => {
            if (dot.contains(event.target)) isClickOutside = false;
        });

        if (isClickOutside) {
            menus.forEach(menu => {
                menu.style.display = "none";
            });
        }
    });

</script>