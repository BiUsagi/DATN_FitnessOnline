{{-- VIEW COMMENT CHA --}}
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
@foreach ($Comments as $item)

    @if (Auth::guard('web')->check())
        <div class="single-comment-box">
            <div class="img-box">
                <img loading='lazy' class="img-fluid" src="{{ asset('assets/backend/img/' . $item->user->avatar)}}" alt="">
            </div>
            <div class="content-box">
                <h3>{{$item->user->user_name}}</h3>
                <p>{{$item->content}}</p>
                <p class="timing"> {{ $item->created_at->locale('vi')->diffForHumans() }}</p>
                <div class="reply_btn">
                    <a href="" class="reply btn-rep" data-id="{{$item->id}}">Trả lời</a>
                </div>
            </div>
        </div>
    @else
        <div class="single-comment-box">
            <div class="img-box">
                <img loading='lazy' class="img-fluid" src="{{ asset('assets/backend/img/' . $item->user->avatar)}}" alt="">
            </div>
            <div class="content-box">
                <h3>{{$item->user->user_name}}</h3>
                <p>{{$item->content}}</p>
                <p class="timing"> {{ $item->created_at->locale('vi')->diffForHumans() }}</p>
                <div class="reply_btn">
                    <a class="reply" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Trả lời</a>
                </div>
            </div>
        </div>
    @endif


    
    {{-- END VIEW COMMENT CHA --}}


    {{-- VIEW COMMENT CON --}}
    @foreach ($item->replies as $con)
    @if (Auth::guard('web')->check())
        <div class="reply-box">
            <div class="single-comment-box">
                <div class="img-box"> <img loading='lazy' class="img-fluid" src="assets/images/blog/user2.webp" alt="">
                </div>
                <div class="content-box">
                    <h3>{{$con->user->name_user}}</h3>
                    <p class="timing">{{  $con->created_at->locale('vi')->diffForHumans() }}</p    >
                    <p>{{$con->content}}</p>
                    <div class="reply_btn">
                        <a href="" class="reply btn-rep" data-id="{{$item->id}}">Trả lời</a>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="reply-box">
            <div class="single-comment-box">
                <div class="img-box"> <img loading='lazy' class="img-fluid" src="assets/images/blog/user2.webp" alt="">
                </div>
                <div class="content-box">
                    <h3>{{$con->user->name_user}}</h3>
                    <p class="timing">19 August 2022, 10:00AM</p    >
                    <div class="reply_btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><a class="reply">Trả lời</a></div>
                    {{-- <div class="reply_btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><a>Trả lời</a></div> --}}
                    <p>{{$con->content}}</p>
                </div>
            </div>
        </div>
    @endif
    @endforeach
    {{-- FORM TRẢ LỜI BÌNH LUẬN --}}
    <form action="" method="POST" class="formRep form-rep-{{$item->id}}" style="display: none">
        <div class="col-md-12">
            <div class="row">
                <div class="form-group comments">
                    <textarea class="form-control" name="comments" placeholder="Message*" rows="4" id="comment-con-{{$item->id}}"></textarea>
                    <small id="comment-error" style="color:aliceblue"></small>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group mb-0 text-center text-md-start pb-0">
                    <button type="button" data-id="{{$item->id}}" class="btn btn-primary btn-send-rep"  class="btn">Gửi bình luận</button>
                    
                </div>
            </div>
        </div>                                   
        <div class="col-md-12 alert-notification">
            <div id="message" class="alert-msg"></div>
        </div>
    </form>
@endforeach

    {{-- END VIEW COMMENT CON --}}