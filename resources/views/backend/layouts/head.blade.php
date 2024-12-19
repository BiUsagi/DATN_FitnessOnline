<!DOCTYPE html>
<html lang="en">

<head>
    <base href='{{ config('app.url') }}'>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <title>FITNESS ONLINE</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- money style -->
    <link rel="stylesheet" href="assets/frontend/css/money.css">


  

    <link rel="icon" type="image/png" href="logo/icon_title-removebg.png">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/backend/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/backend/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/backend/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/backend/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="assets/backend/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="assets/backend/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/backend/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/backend/css/style.css" rel="stylesheet">
    <link href="assets/backend/css/style2.css" rel="stylesheet">
    <link href="assets/backend/css/customize.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.3/dist/sweetalert2.min.css" rel="stylesheet">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css">


    <script>
        var BASE_URL = '{{ config('app.url') }}'
    </script>

    @yield('custom_css')
</head>

<body>