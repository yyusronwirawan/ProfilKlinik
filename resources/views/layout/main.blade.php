<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Basic Page Needs
================================================== -->
    <meta charset="utf-8">
    <title>RSGH - Rumah Sakit Graha Hermine</title>

    <!-- Mobile Specific Metas
================================================== -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Construction Html5 Template">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <meta name=author content="Themefisher">
    <meta name=generator content="Themefisher Constra HTML Template v1.0">

    <!-- Favicon
================================================== -->
    <link rel="icon" type="image/png" href="{{asset('Template')}}/images/favicon.png">

    <!-- CSS
================================================== -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{asset('Template')}}/plugins/bootstrap/bootstrap.min.css">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="{{asset('Template')}}/plugins/fontawesome/css/all.min.css">
    <!-- Animation -->
    <link rel="stylesheet" href="{{asset('Template')}}/plugins/animate-css/animate.css">
    <!-- slick Carousel -->
    <link rel="stylesheet" href="{{asset('Template')}}/plugins/slick/slick.css">
    <link rel="stylesheet" href="{{asset('Template')}}/plugins/slick/slick-theme.css">
    <!-- Colorbox -->
    <link rel="stylesheet" href="{{asset('Template')}}/plugins/colorbox/colorbox.css">
    <!-- Template styles-->
    <link rel="stylesheet" href="{{asset('Template')}}/css/style.css">
    <!-- wa floating btn-->
    <link rel="stylesheet" href="{{asset('Template')}}/css/wabtn.css">


</head>

<body>
    <div class="body-inner">
        <!-- Header start -->
        <header id="header" class="header-two">
            <div class="site-navigation">
                <div class="col-lg-12 top-bar">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8 col-md-12">
                                <ul class="top-info text-center text-md-left mt-2">
                                    <li>
                                        <p class="text-white"><i class="fas fa-headset"></i> Customer Care | <strong>(0778) 363 318</strong> </p>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-lg-4 col-md-4 top-social text-center text-md-right">
                                <ul class="mt-2">
                                    <li>
                                        <p class="text-white"><i class="fas fa-phone"></i> Emergency | <strong>(0778) 363 127</strong> </p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mr-4 ml-4">

                    <div class="col-lg-12">
                        <nav class="navbar navbar-expand-lg navbar-light p-0">

                            <div class="logo">
                                <a class="d-block" href="/">
                                    <img loading="lazy" src="{{asset('Template')}}/images/logo-gh-test.png" alt="Constra">
                                </a>
                            </div><!-- logo end -->

                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>

                            <div id="navbar-collapse" class="collapse navbar-collapse">
                                <ul class="nav navbar-nav ml-auto align-items-center">

                                    <li class="nav-item"><a class="nav-link" href="/">Beranda</a></li>

                                    <li class="nav-item"><a class="nav-link" href="/tentang">Tentang kami</a></li>
                                    <li class="nav-item"><a class="nav-link" href="/dokter/jadwal">Jadwal Dokter</a></li>

                                    <li class="nav-item"><a class="nav-link" href="/services">Layanan Kami</a></li>

                                    <li class="nav-item"><a class="nav-link" href="/artikel">Artikel</a></li>

                                    <li class="nav-item dropdown">
                                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Informasi <i class="fa fa-angle-down"></i></a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="/dokter/profil">Profil Dokter</a></li>
                                            <li><a href="/galeri">Galeri</a></li>
                                            <li><a href="/karir">Karir</a></li>
                                            <li><a href="/partnership">Our Partners</a></li>
                                        </ul>
                                    </li>

                                    <li class="nav-item"><a class="nav-link" href="https://bit.ly/surveikepuasanpasienRSGH">Survei Kepuasan</a></li>

                                    <li class="nav-item"><a class="nav-link" href="/e-library">E-Library</a></li>

                                    <li class="header-get-a-quote">
                                        <a class="btn btn-primary" href="/login">Sign In</a>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                    <!--/ Col end -->
                </div>
                <!--/ Row end -->
                <!--/ Container end -->

            </div>
            <!--/ Navigation end -->
        </header>
        <!--/ Header end -->

        @yield('content')


        <!-- floating wa -->

        <div class="floating-container" id="tooltip">
            <img src="{{asset('Template')}}/images/icon-customer.png" class="floating-button text-dark">
            <div class="element-container">

                <span class="float-element tooltip-left" id="tooltip-linktree">
                    <a href="https://linktr.ee/grahahermine"><i class="fas fa-link"></i></a>
                    <span id="tooltipText-linktree">Linktree</span>
                </span>
                <span class="float-element" id="tooltip-pendaftaran">
                    <a href="https://api.whatsapp.com/send/?phone=%2B6285345432016&text=Assalamualaikum%2C%20Praktek%20Mandiri%20Fisioterapi%20BioPhysio%20siap%20melayani%20anda%2C%0AJadwalkan%20reservasi%20dengan%20mengisi%20data%20berikut%20ini%20%3A%0ANama%20%3A%0AAlamat%20%3A%0AUmur%20%3A%0AKeluhan%20%3A%0ABooking%20%28hari%2C%20tgl%2C%20jam%20terapi%29%20%3A%0A%0ATerimakasih%20banyak%20atas%20perhatianya.%0A%F0%9F%99%8F%F0%9F%99%8F%F0%9F%99%8F%F0%9F%99%8F&type=phone_number&app_absent=0"><i class="fab fa-whatsapp"></i></a>
                    <span id="tooltipText-pendaftaran">Pendaftran Online</span>
                </span>
                <span class="float-element" id="tooltip-kritik">
                    <a href="https://api.whatsapp.com/send?phone=6285274603611"><i class="fab fa-whatsapp"></i></a>
                    <span id="tooltipText-kritik">Kritik & Saran</span>
                </span>
            </div>
            <span id="tooltipText">Hubungi kami</span>
        </div>

        <footer id="footer" class="footer">
            <div class="footer-main">
                <div class="container">
                    <div class="row justify-content-between">
                        <div class="col-lg-4 col-md-6 footer-widget footer-about">
                            <h3 class="widget-title">Tentang Kami</h3>
                            <img loading="lazy" width="200px" class="footer-logo" src="{{ asset('Template') }}/images/logo-gh-test-white.png" alt="Constra">
                            <p class="text-white">Rumah Sakit Graha Hermine adalah salah satu rumah sakit swasta di Batam yang berdiri pada tanggal 3 Desember 2009.</p>
                            <a href="/tentang" class="text-white">Selengkapnya</a>
                            <br>
                            <hr>
                            <p class="text-white">Temukan kami:</p>
                            <div class="footer-social">
                                <ul>
                                    <li><a href="https://www.facebook.com/rumahsakitgrahahermine" aria-label="Facebook"><i class="fab fa-facebook-f text-white"></i></a></li>
                                    <li><a href="https://www.youtube.com/@RumahSakitGrahaHermine" aria-label="Youtube"><i class="fab fa-youtube text-white"></i></a>
                                    </li>
                                    <li><a href="https://www.instagram.com/rs_grahahermine/" aria-label="Instagram"><i class="fab fa-instagram text-white"></i></a></li>
                                </ul>
                            </div><!-- Footer social end -->
                        </div><!-- Col end -->

                        <div class="col-lg-4 col-md-6 footer-widget mt-5 mt-md-0">
                            <h3 class="widget-title">Jam Operasional RS</h3>
                            <div class="working-hours text-white">
                                RS Graha Hermine melayani psien IGD selama 24 jam dan pasien yang membutuhkan konsultasi bisa melihat jadwal dokter pada menu jadwal dokter <br>
                                jam besuk pasien:
                                <br><br> Senin - Minggu: <span class="text-right">10:00 - 16:00 </span>
                                <br> Sabtu: <span class="text-right">12:00 - 15:00</span>
                                <br> Minggu dan tanggal merah: <span class="text-right">09:00 - 12:00</span>
                            </div>
                        </div><!-- Col end -->

                        <div class="col-lg-3 col-md-6 mt-5 mt-lg-0 footer-widget">
                            <h3 class="widget-title">Poliklinik</h3>
                            <ul class="list-arrow">
                                @foreach($lyn as $lyns)
                                <li><a href="/services/detail/{{ $lyns->slug }}" class="text-white">{{ $lyns->poliklinik }} </a></li>
                                @endforeach
                                <li><a href="/services" class="text-white">Selengkapnya <i class="fas fa-arrow-right"></i></a></li>
                            </ul>
                        </div><!-- Col end -->
                    </div><!-- Row end -->
                </div><!-- Container end -->
            </div><!-- Footer main end -->

            <div class="copyright">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div class="copyright-info text-white text-center">
                                <span>Copyright &copy; <script>
                                        document.write(new Date().getFullYear())
                                    </script>, RS Graha Hermine Batam</span>
                            </div>
                        </div>
                    </div><!-- Row end -->

                    <!-- <div id="back-to-top" data-spy="affix" data-offset-top="10" class="back-to-top position-fixed">
                        <button class="btn btn-primary" title="Back to Top">
                            <i class="fa fa-angle-double-up"></i>
                        </button>
                    </div> -->

                </div><!-- Container end -->
            </div><!-- Copyright end -->
        </footer><!-- Footer end -->


        <!-- Javascript Files
  ================================================== -->
        <!-- <script type="text/javascript">
            window.onload = () => {
                $('#onload').modal('show');
            }
        </script> -->

        <!-- initialize jQuery Library -->
        <script src="{{asset('Template')}}/plugins/jQuery/jquery.min.js"></script>
        <!-- Bootstrap jQuery -->
        <script src="{{asset('Template')}}/plugins/bootstrap/bootstrap.min.js" defer></script>
        <!-- Slick Carousel -->
        <script src="{{asset('Template')}}/plugins/slick/slick.min.js"></script>
        <script src="{{asset('Template')}}/plugins/slick/slick-animation.min.js"></script>
        <!-- Color box -->
        <script src="{{asset('Template')}}/plugins/colorbox/jquery.colorbox.js"></script>
        <!-- shuffle -->
        <script src="{{asset('Template')}}/plugins/shuffle/shuffle.min.js" defer></script>


        <!-- Google Map API Key-->
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU" defer></script>
        <!-- Google Map Plugin-->



        <script src="{{asset('Template')}}/plugins/google-map/map.js" defer></script>

        <!-- Template custom -->
        <script src="{{asset('Template')}}/js/script.js"></script>

        <script src="https://apis.google.com/js/platform.js"></script>

    </div><!-- Body inner end -->
</body>

</html>