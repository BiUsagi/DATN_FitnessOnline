<footer>
    <div class="website-footer">
        <div class="container">
            <div id="foot-accordion">
                <div class="row justify-content-between">
                    <div class="col-xl-4 d-xl-flex justify-content-xl-start">
                        <div class="our-information">
                            <a href="index.html" class="website-logo"><img loading='lazy'
                                    src="logo/fitness-online light.png" alt="logo" width="140"
                                    height="30"></a>
                            <p class="web-about">Tập gym là một hoạt động thể dục giúp cải thiện sức khỏe và vóc dáng 
                                thông qua các bài tập với tạ, máy tập, và các bài cardio. Việc tập gym không chỉ giúp tăng cường cơ bắp, 
                                đốt cháy mỡ thừa mà còn giúp nâng cao sức bền, cải thiện tinh thần, và giảm căng thẳng.</p>
                            <div class="social-icon">
                                <a href="#!" aria-label="Facebook"><img loading='lazy'
                                        src="assets/frontend/images/icons/facebook.svg" alt="Facebook Icon"></a>
                                <a href="#!" aria-label="Twitter"><img loading='lazy'
                                        src="assets/frontend/images/icons/twitter.svg" alt="Twitter Icon"></a>
                                <a href="#!" aria-label="Instagram"><img loading='lazy'
                                        src="assets/frontend/images/icons/instagram.svg" alt="Instagram Icon"></a>
                                <a href="#!" aria-label="Google Plus"><img loading='lazy'
                                        src="assets/frontend/images/icons/google-plus.svg" alt="Google Plus Icon"></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-3 d-lg-flex justify-content-xl-start justify-content-lg-start">
                        <div class="footer-links">
                            <h2 class="footer-title mob" data-bs-target="#links" data-bs-toggle="collapse">
                                Liên kết
                                <div class="footer-toggler">
                                </div>
                            </h2>
                            <ul id="links" class="collapse foot-mob" data-bs-parent="#foot-accordion">
                                <li><a href="{{ route('index') }}"class="text-footer">Trang chủ</a></li>
                                <li><a href="{{ route('about.index') }}" class="text-footer">Giới thiệu</a></li>
                                <li><a href="#courses" class="text-footer">Gói tập</a></li>
                                <li><a href="{{ route('trainers.index') }}" class="text-footer">Trainers</a></li>
                                <li><a href="{{ route('posts.index') }}"class="text-footer">Blog</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-5 d-lg-flex justify-content-xl-start d-none justify-content-lg-center">
                        <div class="footer-links">
                            <h2 class="footer-title">
                                Bài viết
                            </h2>
                            <div class="recent-posts">
                                @foreach ($topPosts as $post)
                                    <div class="post">
                                        <img loading="lazy" src="{{ asset('uploads/post_image/' . $post->image) }}" alt="{{ $post->title }}" class="post-img">
                                        <a href="{{ route('posts-details.index', $post->id) }}">
                                            <p class="post-content">{{ $post->title }}</p>
                                        </a>
                                    </div>
                                @endforeach
                                {{-- <div class="post">
                                        <img loading='lazy' src="uploads/post_image/1732654484.jpg" alt="post" class="post-img">
                                        <a href="blog-details.html">
                                            <p class="post-content">Lý do nên ăn chuối trước và sau khi tập luyện</p>
                                        </a>
                                    </div>
                                    <div class="post">
                                        <img loading='lazy' src="uploads/post_image/1731569262.png" alt="post" class="post-img">
                                        <a href="blog-details.html">
                                            <p class="post-content">Nữ giáo sư khoe cơ bắp để tuyển sinh</p>
                                        </a>
                                    </div>
                                    <div class="post">
                                        <img loading='lazy' src="uploads/post_image/1732138834.jpg" alt="post" class="post-img">
                                        <a href="blog-details.html">
                                            <p class="post-content">HLV thể hình nhồi máu cơ tim sau tập cường độ cao</p>
                                        </a>
                                    </div> --}}
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 d-lg-flex justify-content-xl-end justify-content-lg-end">
                        <div class="footer-links">
                            <h2 class="footer-title mob" data-bs-target="#contactus" data-bs-toggle="collapse">
                                Liên hệ
                                <div class="footer-toggler">
                                </div>
                            </h2>
                            
                            <ul id="contactus" class="collapse foot-mob" data-bs-parent="#foot-accordion">
                                <div class="contacts">
                                    <img loading='lazy' src="assets/frontend/images/icons/foot-call.svg" alt="call"
                                        class="support-icon">
                                    <div class="details">
                                        <p class="text location" style="font-size: 16px"><a href="tel:+123-1234-123">0987-654-321</a></p>
                                        {{-- <p class="text location" style="font-size: 16px"><a href="tel:+003-1234-123">003-1234-123</a></p> --}}
                                    </div>
                                </div>
                                <div class="contacts">
                                    <img loading='lazy' src="assets/frontend/images/icons/foot-mail.svg" alt="mail"
                                        class="support-icon">
                                    <div class="details">
                                        <p class="text location" style="font-size: 16px"><a
                                                href="mailto:fitness@yourdomain.com">fitness@yourdomain.com</a></p>
                                        {{-- <p class="text-footer"><a href="mailto:fc@yourdomain.com">fc@yourdomain.com</a></p> --}}
                                    </div>
                                </div>
                                <div class="contacts">
                                    <img loading='lazy' src="assets/frontend/images/icons/foot-location.svg"
                                        alt="location" class="support-icon">
                                    <div class="details">
                                        <p class="text location" style="font-size: 16px">Nguyễn Lương Bằng, Hòa Khánh Bắc, Liên Chiểu</p>
                                    </div>
                                </div>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="social-icon-mob">
                            <a href="#!" aria-label="Facebook"><img loading='lazy'
                                    src="assets/frontend/images/icons/facebook.svg" alt="Facebook Icon"></a>
                            <a href="#!" aria-label="Twitter"><img loading='lazy'
                                    src="assets/frontend/images/icons/twitter.svg" alt="Twitter Icon"></a>
                            <a href="#!" aria-label="Instagram"><img loading='lazy'
                                    src="assets/frontend/images/icons/instagram.svg" alt="Instagram Icon"></a>
                            <a href="#!" aria-label="Google Plus"><img loading='lazy'
                                    src="assets/frontend/images/icons/google-plus.svg" alt="Google Plus Icon"></a>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </div>
    <div class="copy-right">
        <div class="container">
            <p class="copy-content">© 2024 <a class="web-name" href="#!">Fitness Online</a>. Mọi quyền được bảo lưu.
            </p>
        </div>
    </div>
</footer>
<!-- FOOTER END HERE -->

<!-- LOCAL SCRIPT ATTACHMENT -->
<script src='assets/frontend/js/jquery.min.js'></script>
<script src='assets/frontend/js/bootstrap.js'></script>
<script src='assets/frontend/js/swiper.js'></script>
<script src='assets/frontend/js/main.js'></script>

@yield('custom_js')
</body>

</html>
