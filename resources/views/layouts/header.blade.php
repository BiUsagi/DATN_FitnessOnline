<!DOCTYPE html>
<html lang="en">

<head>
    <base href="http://127.0.0.1:8000/">
    <!-- ------------- META TAG START HERE ------------- -->
    <meta charset="UTF-8" />
    <meta name="title" content="Gymfit.com">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no" />
    <meta name=theme-color content="#1face1" />
    <meta name="description"
        content="We craft website in a way which improves the web experience. We take pride in treating all customers with the highest degree of care, understanding, services, and support.">
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="site_url">
    <meta property="og:title" content="Gymfit.com">
    <meta property="og:description"
        content="We craft website in a way which improves the web experience. We take pride in treating all customers with the highest degree of care, understanding, services, and support.">
    <meta property="og:image" content="https://site_url.com/assets/images/thumbnail.webp">
    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://site_url.com">
    <meta property="twitter:title" content="Gymfit.com">
    <meta property="twitter:description"
        content="We craft website in a way which improves the web experience. We take pride in treating all customers with the highest degree of care, understanding, services, and support.">
    <meta property="twitter:image" content="https://site_url.com/assets/images/thumbnail.webp">
    <!-- ------------- META TAG END'S HERE ------------- -->
    <title>Gymfit.com</title>
    <!-- FAVICON -->
    <link rel="icon" type="image/png" href="assets/images/favicon.svg">

    <!-- LOCAL LINK ATTACHMENT -->
    <link rel='stylesheet' type='text/css' media='screen' href='assets/css/bootstrap.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='assets/css/swiper.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='assets/css/app.css'>

	<script>
		const hasSupport = 'loading' in HTMLImageElement.prototype;
		document.documentElement.className = hasSupport ? 'pass' : 'fail';
	</script>
</head>

<body>
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
                        <nav class="navbar navbar-expand-lg ">
                            <a class="navbar-brand" href="index.html">
                                <img loading='lazy' src="assets/images/logo.svg" alt="logo" width="139" height="30">
                            </a>
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse tabActive" id="navbarSupportedContent">
                                <ul class="navbar-nav ms-auto">
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('index')}}">TRANG CHỦ</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('about.index')}}">GIỚI THIỆU</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#courses">Courses</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="schedule.html">schedule</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="team.html">Team</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="blog.html">Blog</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link btn" href="{{route('contact.index')}}">Contact Us</a>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>

   