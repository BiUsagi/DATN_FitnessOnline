<!DOCTYPE html>
<html lang="en">

<head>
    <!--------------- META TAG START HERE --------------->
    <meta charset="UTF-8" />
    <meta name="title" content="FITNESS ONLINE">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no" />
    <meta name=theme-color content="#1face1" />
    <meta name="description"
        content="We craft website in a way which improves the web experience. We take pride in treating all customers with the highest degree of care, understanding, services, and support.">
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="site_url">
    <meta property="og:title" content="FITNESS ONLINE">
    <meta property="og:description"
        content="We craft website in a way which improves the web experience. We take pride in treating all customers with the highest degree of care, understanding, services, and support.">
    <meta property="og:image" content="https://site_url.com/assets/images/thumbnail.webp">
    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://site_url.com">
    <meta property="twitter:title" content="FITNESS ONLINE">
    <meta property="twitter:description"
        content="We craft website in a way which improves the web experience. We take pride in treating all customers with the highest degree of care, understanding, services, and support.">
    <meta property="twitter:image" content="https://site_url.com/assets/images/thumbnail.webp">
    <!--------------- META TAG END'S HERE --------------->
    <title>FITNESS ONLINE</title>

    <!-- FAVICON -->
    <link rel="icon" type="image/png" href="assets/images/favicon.svg">

    <!-- LIVE LINK ATTACHMENT -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;900&display=swap"
        rel="stylesheet">

    <!-- LOCAL LINK ATTACHMENT -->
    <link rel='stylesheet' type='text/css' media='screen' href='assets/frontend/css/bootstrap.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='assets/frontend/css/swiper.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='assets/frontend/css/app.css'>
    <script>
        const hasSupport = 'loading' in HTMLImageElement.prototype;
        document.documentElement.className = hasSupport ? 'pass' : 'fail';
    </script>
</head>

<body class="error-page">
    <!-- LOADER START HERE -->
    <div class="page_loader">
        <img loading='lazy' src="assets/images/loader.svg" alt="img">
    </div>
    <!-- LOADER END HERE -->
    <!-- HEADER START HERE -->
    <header>
        <div class="navigation-wrap start-style">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <nav class="navbar navbar-expand-lg">
                            <a class="navbar-brand" href="{{ route('index') }}">
                                <img loading='lazy' src="logo/fitness-online light.png" alt="logo" width="139">
                            </a>
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav ms-auto">
                                    <li class="nav-item">
                                        <a class="nav-link btn" href="#contact">Contact Us</a>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- HEADER START HERE -->

    <!-- SECTION START HERE -->
    <section class="not-found-section">
        <!-- error section START HERE -->
        <div class="container">
            <div class="row">
                <div class="col-md-12 m-auto">
                    <div class="main-content">
                        <img loading='lazy' src="assets/frontend/images/404.svg" alt="">
                        <h2>OOOPSS!....xin lỗi...KHÔNG TÌM THẤY TRANG</h2>
                        <p>TRANG BẠN ĐANG TÌM KIẾM KHÔNG THỂ TÌM THẤY</p>
                        <a href="{{ route('index') }}" class="btn"> về trang chủ</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- error section END'S HERE -->

    </section>
    <!-- SECTION END'S HERE -->

    <!-- FOOTER START HERE -->
    <footer>
        <p>© 2022 FITNESS ONLINE reserved.</p>
    </footer>
    <!-- FOOTER END HERE -->

    <!-- LOCAL SCRIPT ATTACHMENT -->
    <script src='assets/frontend/js/jquery.min.js'></script>
    <script src='assets/frontend/js/bootstrap.js'></script>
    <script src='assets/frontend/js/swiper.js'></script>
    <script src='assets/frontend/js/main.js'></script>
</body>

</html>
