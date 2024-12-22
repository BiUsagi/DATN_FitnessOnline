<!DOCTYPE html>
<html lang="en">

<head>
    <base href="http://127.0.0.1:8000/">
    <!-- ------------- META TAG START HERE ------------- -->
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
    <meta property="og:image" content="https://site_url.com/assets/frontend/images/thumbnail.webp">
    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://site_url.com">
    <meta property="twitter:title" content="FITNESS ONLINE">
    <meta property="twitter:description"
        content="We craft website in a way which improves the web experience. We take pride in treating all customers with the highest degree of care, understanding, services, and support.">
    <meta property="twitter:image" content="https://site_url.com/assets/frontend/images/thumbnail.webp">
    <!-- ------------- META TAG END'S HERE ------------- -->
    <title>FITNESS ONLINE</title>
    <!-- FAVICON -->
    <link rel="icon" type="image/png" href="logo/icon_title-removebg.png">

    <!-- LOCAL LINK ATTACHMENT -->
    <link rel='stylesheet' type='text/css' media='screen' href='assets/frontend/css/bootstrap.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='assets/frontend/css/swiper.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='assets/frontend/css/app.css'>
    <link rel="stylesheet" href="assets/frontend/css/profile.css">
    <link rel="stylesheet" href="assets/frontend/css/login.css">
    <link rel="stylesheet" href="assets/frontend/css/workout_bought.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="assets/frontend/css/customize.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>



    <!-- icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">

    <!-- css -->
    <link rel='stylesheet' href='assets/frontend/css/bell.css'>
    <link rel='stylesheet' href='assets/frontend/css/avata.css'>
    <link rel='stylesheet' href='assets/frontend/css/bell2.css'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">

    {{-- Thông báo --}}
    <!-- Thêm Toastr CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <!-- Thêm Toastr JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>



    @yield('custom_css')


    <script>
        const hasSupport = 'loading' in HTMLImageElement.prototype;
        document.documentElement.className = hasSupport ? 'pass' : 'fail';
    </script>
</head>

<body>
    <!-- LOADER START HERE -->
    <div class="page_loader">
        <img loading='lazy' src="assets/frontend/images/loader.svg" alt="img">
    </div>
    <!-- LOADER END HERE -->
    <!-- HEADER START HERE -->
