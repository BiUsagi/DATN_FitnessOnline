<footer>
        <div class="website-footer">
            <div class="container">
                <div id="foot-accordion">
                    <div class="row justify-content-between">
                        <div class="col-xl-4 d-xl-flex justify-content-xl-start">
                            <div class="our-information">
                                <a href="index.html" class="website-logo"><img loading='lazy' src="assets/frontend/images/footer-logo.svg" alt="logo" width="140" height="30"></a>
                                <p class="web-about">ligula sed porta cursus, lectus ligula interdum tortor, vitae
                                    tempor leo
                                    eros lobortis ante. Integer semper, metus in tincidunt euismod.</p>
                                <div class="social-icon">
                                    <a href="#!" aria-label="Facebook"><img loading='lazy' src="assets/frontend/images/icons/facebook.svg" alt="Facebook Icon"></a>
                                    <a href="#!" aria-label="Twitter"><img loading='lazy' src="assets/frontend/images/icons/twitter.svg" alt="Twitter Icon"></a>
                                    <a href="#!" aria-label="Instagram"><img loading='lazy' src="assets/frontend/images/icons/instagram.svg" alt="Instagram Icon"></a>
                                    <a href="#!" aria-label="Google Plus"><img loading='lazy' src="assets/frontend/images/icons/google-plus.svg" alt="Google Plus Icon"></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-3 d-lg-flex justify-content-xl-start justify-content-lg-start">
                            <div class="footer-links">
                                <h2 class="footer-title mob" data-bs-target="#links" data-bs-toggle="collapse">
                                    Links
                                    <div class="footer-toggler">
                                    </div>
                                </h2>
                                <ul id="links" class="collapse foot-mob" data-bs-parent="#foot-accordion">
                                    <li><a href="{{ route('index') }}"class="text">Home</a></li>
                                    <li><a href="{{ route('about.index') }}" class="text">About Us</a></li>
                                    <li><a href="#courses" class="text">Courses</a></li>
                                    <li><a href="schedule.html" class="text">Schedule</a></li>
                                    <li><a href="{{ route('posts.index') }}"class="text">Blog</a></li>
                                    <li><a href="contact-us.html" class="text">Contact Us</a></li>
                                </ul>
                            </div>
                        </div>
                        <div
                            class="col-xl-3 col-lg-5 d-lg-flex justify-content-xl-start d-none justify-content-lg-center">
                            <div class="footer-links">
                                <h2 class="footer-title">
                                    Recent Post
                                </h2>
                                <div class="recent-posts">
                                    {{-- @isset($topPost)
                                        @foreach ($topPost->take(3) as $Post)
                                            <div class="post">
                                                <img loading='lazy' src="{{ asset('assets/backend/img/' . $Post->image) }}" alt="post" class="post-img">
                                                <a href={{ route('posts-details.index', $Post->id) }}>
                                                    <p class="post-content">{{$Post->title}}</p>
                                                </a>
                                            </div>
                                        @endforeach
                                    @endisset --}}
                                    <div class="post">
                                        <img loading='lazy' src="assets/frontend/images/blog/blog-2.webp" alt="post" class="post-img">
                                        <a href="blog-details.html">
                                            <p class="post-content">Etiam venenatis nisl in orci posuere ultricies.</p>
                                        </a>
                                    </div>
                                    <div class="post">
                                        <img loading='lazy' src="assets/frontend/images/blog/blog-3.webp" alt="post" class="post-img">
                                        <a href="blog-details.html">
                                            <p class="post-content">Etiam venenatis nisl in orci posuere ultricies.</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 d-lg-flex justify-content-xl-end justify-content-lg-end">
                            <div class="footer-links">
                                <h2 class="footer-title mob" data-bs-target="#contactus" data-bs-toggle="collapse">
                                    Get In Touch
                                    <div class="footer-toggler">
                                    </div>
                                </h2>
                                <ul id="contactus" class="collapse foot-mob" data-bs-parent="#foot-accordion">
                                    <div class="contacts">
                                        <img loading='lazy' src="assets/frontend/images/icons/foot-call.svg" alt="call" class="support-icon">
                                        <div class="details">
                                            <p class="text"><a href="tel:+123-1234-123">123-1234-123</a></p>
                                            <p class="text"><a href="tel:+003-1234-123">003-1234-123</a></p>
                                        </div>
                                    </div>
                                    <div class="contacts">
                                        <img loading='lazy' src="assets/frontend/images/icons/foot-mail.svg" alt="mail" class="support-icon">
                                        <div class="details">
                                            <p class="text"><a
                                                    href="mailto:fitness@yourdomain.com">fitness@yourdomain.com</a></p>
                                            <p class="text"><a href="mailto:fc@yourdomain.com">fc@yourdomain.com</a></p>
                                        </div>
                                    </div>
                                    <div class="contacts">
                                        <img loading='lazy' src="assets/frontend/images/icons/foot-location.svg" alt="location"
                                            class="support-icon">
                                        <div class="details">
                                            <p class="text location">1011Santa Monica boulevard <br>
                                                Los Angeles</p>
                                        </div>
                                    </div>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="social-icon-mob">
                                <a href="#!" aria-label="Facebook"><img loading='lazy' src="assets/frontend/images/icons/facebook.svg" alt="Facebook Icon"></a>
                                <a href="#!" aria-label="Twitter"><img loading='lazy' src="assets/frontend/images/icons/twitter.svg" alt="Twitter Icon"></a>
                                <a href="#!" aria-label="Instagram"><img loading='lazy' src="assets/frontend/images/icons/instagram.svg" alt="Instagram Icon"></a>
                                <a href="#!" aria-label="Google Plus"><img loading='lazy' src="assets/frontend/images/icons/google-plus.svg" alt="Google Plus Icon"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copy-right">
            <div class="container">
                <p class="copy-content">© 2022 <a class="web-name" href="#!">GYMFIT</a>. All rights reserved.
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
</body>

</html>