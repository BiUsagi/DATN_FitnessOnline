{{-- VIEW COMMENT CHA --}}
<style>
/* General styles */
.reply-box {
    display: flex; /* Căn ngang các phần tử */
    align-items: flex-start; /* Căn trên cho các phần tử con */
    gap: 10px; /* Khoảng cách giữa ảnh và nội dung */
}

.css-img {
    width: 70px;
    height: 70px;
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
    font-size: 15px;
    color: #1FACE1;
}

.timing {
    color: white;
    font-size: 12px;
    padding-left: 30px;
}

.comment-text {
    color: white;
    margin-top: 5px;
    margin-bottom: 8px;
}

.comment-actions {
    display: flex;
    align-items: center;
    gap: 10px;
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
    padding-right: 10px;
}

.form-group.comments {
    display: flex;
    flex-direction: row;
    align-items: center;
    gap: 10px;
}

.form-control {
    width: 100%;
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

</style>
@foreach ($Comments as $item)

    @if (Auth::guard('web')->check())
        <div class="single-comment-box">
            <div class="css-img">
                <img loading='lazy' src="{{ asset('assets/backend/img/' . $item->user->avatar)}}" alt="">
            </div>
            <div class="content-box">
                <strong class="css-name"><span>@</span>{{$item->user->user_name}}</strong><span class="timing"> {{ $item->created_at->locale('vi')->diffForHumans() }}</span>
                <div class="comment-text">{{$item->content}}</div>
                <div class="comment-actions">
                    <i class="fas fa-thumbs-up" style="color: white" ></i><span class="reply-button btn-rep" data-id="{{$item->id}}" data-username="{{$item->user->user_name}}">Phản hồi</span> 
                     <span class="reply-button report-comment" style="color: red" data-id="{{$item->id}}">Report</span>
                </div>
            </div>
        </div>
    @else
    <div class="single-comment-box">
        <div class="css-img">
            <img loading='lazy' src="{{ asset('assets/backend/img/' . $item->user->avatar)}}" alt="">
        </div>
        <div class="content-box">
            <strong class="css-name"><span>@</span>{{$item->user->user_name}}</strong><span class="timing"> {{ $item->created_at->locale('vi')->diffForHumans() }}</span>
            {{-- <p>{{$item->content}}</p>
            <a href="" class="btn-rep" data-id="{{$item->id}}">Trả lời</a> --}}
            <div class="comment-text">{{$item->content}}</div>
            <div class="comment-actions">
                <span class="reply-button" data-bs-toggle="modal" data-bs-target="#staticBackdrop" >Phản hồi</span>
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
                <div class="css-img">
                    <img loading='lazy' src="{{ asset('assets/backend/img/' . $con->user->avatar)}}" alt="">
                </div>
            </div>
            <div class="content-box">
                    <strong class="css-name"><span>@</span>{{$con->user->user_name}}</strong><span class="timing"> {{ $con->created_at->locale('vi')->diffForHumans() }}</span>
                <div class="comment-text">{{$con->content}}</div>
                <div class="comment-actions">
                    <i class="fas fa-thumbs-up" style="color: white" ></i><span class="reply-button btn-rep" data-id="{{$item->id}}" >Phản hồi</span> <span class="reply-button report-comment"  style="color: red" data-id="{{$item->id}}">Report</span>
                </div>
            </div>
        </div>
    @else
    <div class="reply-box">
        <div class="single-comment-box">
            <div class="css-img">
                <img loading='lazy' src="{{ asset('assets/backend/img/' . $con->user->avatar)}}" alt="">
            </div>
        </div>
        <div class="content-box">
                <strong class="css-name"><span>@</span>{{$con->user->user_name}}</strong><span class="timing"> {{ $con->created_at->locale('vi')->diffForHumans() }}</span>
            <div class="comment-text">{{$item->content}}</div>
            <div class="comment-actions">
                <span class="reply-button" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Phản hồi</span>
            </div>
        </div>
    </div>
    @endif
    @endforeach
    {{-- FORM TRẢ LỜI BÌNH LUẬN --}}
    <form action="" method="POST" class="formRep form-rep-{{$item->id}}" style="display: none">
        <div class="col-md-11" style="float: right;">
            <div class="">
                <div class="form-group comments">
                    <textarea class="form-control" name="comments" placeholder="Message*" rows="1" id="comment-con-{{$item->id}}"></textarea>
                    <small id="comment-error" style="color:aliceblue"></small>
                    <div class="col-md-1" style="float: right;">
                        <button type="button" data-id="{{$item->id}}" class="css-button btn-send-rep">Gửi</button> 
                    </div>
                </div>
            </div>
        </div>                             
    </form>
@endforeach

    {{-- END VIEW COMMENT CON --}}