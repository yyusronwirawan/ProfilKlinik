<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Admin RSGH - {{ $tittle }} </title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{asset('TemplateAdmin')}}/assets/img/favicon.png" rel="icon">
    <link href="{{asset('TemplateAdmin')}}/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{asset('TemplateAdmin')}}/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{asset('TemplateAdmin')}}/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="{{asset('TemplateAdmin')}}/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="{{asset('TemplateAdmin')}}/assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="{{asset('TemplateAdmin')}}/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="{{asset('TemplateAdmin')}}/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="{{asset('TemplateAdmin')}}/assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{asset('TemplateAdmin')}}/assets/css/signin.css" rel="stylesheet">
</head>

<body class="text-center">
    @yield('content')

    <!-- Vendor JS Files -->
    <script src="{{asset('TemplateAdmin')}}/assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="{{asset('TemplateAdmin')}}/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('TemplateAdmin')}}/assets/vendor/chart.js/chart.min.js"></script>
    <script src="{{asset('TemplateAdmin')}}/assets/vendor/echarts/echarts.min.js"></script>
    <script src="{{asset('TemplateAdmin')}}/assets/vendor/quill/quill.min.js"></script>
    <script src="{{asset('TemplateAdmin')}}/assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="{{asset('TemplateAdmin')}}/assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="{{asset('TemplateAdmin')}}/assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="{{asset('TemplateAdmin')}}/assets/js/main.js"></script>

</body>

</html>