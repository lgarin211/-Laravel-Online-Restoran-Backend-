<!doctype html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="theme-color" content="#000000">
    <title>Mobilekit Mobile UI Kit</title>
    <meta name="description" content="Mobilekit HTML Mobile UI Kit">
    <meta name="keywords" content="bootstrap 4, mobile template, cordova, phonegap, mobile, html" />
    <link rel="icon" type="image/png" href="https://trykasir.lgarin211.my.id/assets/img/favicon.png" sizes="32x32">
    <link rel="apple-touch-icon" sizes="180x180" href="https://trykasir.lgarin211.my.id/assets/img/icon/192x192.png">
    <link rel="stylesheet" href="https://trykasir.lgarin211.my.id/assets/css/style.css">
    <!-- <link rel="manifest" href="__manifest.json"> -->
</head>

<body>

    <!-- loader -->
    <div id="loader">
        <div class="spinner-border text-primary" role="status"></div>
    </div>
    <!-- * loader -->

    <!-- App Header -->
    <div class="appHeader bg-primary text-light">
        <div class="left">
            <a href="javascript:;" class="headerButton goBack">
                <ion-icon name="chevron-back-outline"></ion-icon>
            </a>
        </div>
        <div class="pageTitle">Lt Resto</div>
        <div class="right">
        </div>
    </div>
    <!-- * App Header -->

    <!-- App Capsule -->
    <div id="appCapsule">
        @yield('content')
    </div>
    <!-- * App Capsule -->

    @include('kasir2.bnav')

    <!-- App Sidebar -->
    @include('kasir2.bsidebar')
    <!-- Button trigger modal -->
    <!-- * App Sidebar -->

    <!-- ///////////// Js Files ////////////////////  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Jquery -->
    <script src="https://trykasir.lgarin211.my.id/assets/js/lib/jquery-3.4.1.min.js"></script>
    <!-- Bootstrap-->
    <script src="https://trykasir.lgarin211.my.id/assets/js/lib/popper.min.js"></script>
    <script src="https://trykasir.lgarin211.my.id/assets/js/lib/bootstrap.min.js"></script>
    <!-- Ionicons -->
    <script type="module" src="https://unpkg.com/ionicons@5.0.0/dist/ionicons/ionicons.js"></script>
    <!-- Owl Carousel -->
    <script src="https://trykasir.lgarin211.my.id/assets/js/plugins/owl-carousel/owl.carousel.min.js"></script>
    <!-- jQuery Circle Progress -->
    <script src="https://trykasir.lgarin211.my.id/assets/js/plugins/jquery-circle-progress/circle-progress.min.js"></script>
    <!-- Base Js File -->
    <script src="https://trykasir.lgarin211.my.id/assets/js/base.js"></script>


</body>

</html>