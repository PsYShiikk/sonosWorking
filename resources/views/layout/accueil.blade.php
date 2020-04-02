<!DOCTYPE html>
<html>
<head>
    <meta charset='UTF-8'>
    <title>Sonos - The brand new music platform</title>
    <link rel="stylesheet" href="/css/master.css">
    <link rel="stylesheet" href="/css/main.css">
    <link
        href="https://fonts.googleapis.com/css?family=Montserrat+Alternates:200,300,400,500,600,700,800,900&display=swap"
        rel="stylesheet">
</head>
<body data-barba="wrapper">
<div class="loading-container">
    <div class="loading-screen">
    </div>
</div>
<main data-barba="container" data-barba-namespace="home">
<nav class="all">
    <div class="overlay_home"></div>
    <div class="overlay_home_top">

        <img src="/images/logo/logo_blanc.png" alt="logo Sonos" class="logo_accueil">

        <div class="home_btn">

            <a class="btn" href="{{ route('login') }}">{{ __('Log in') }}</a>
            <a class="btn" href="{{ route('register') }}">{{ __('Register') }}</a>

        </div>

        <div class="discover_btn">
            <a class="btn invert" href="#home_bottom">Discover Sonos</a>
        </div>

    </div>


</nav>
<div class="home_bottom" id="home_bottom">
    <div class="container">

            @yield('contenu')

    </div>
</div>

<div class="footer no-margin">
    <div class="topfooter">
        <a class="footer_text" href="/legalnotice">Legal Notices</a><span class="footer_text pipe"> | </span><a class="footer_text" href="#">Contact us</a><span class="footer_text pipe"> | </span><a class="footer_text" href="#">Social Medias</a>
    </div>
    <div class="bottomfooter">
        <span class="footer_text">Copyright &copy - sonos.com - All right reserved</span>
    </div>

</div>


</main>
</body>
<script src="/js/jquery.js"></script>
<script src="/js/divers.js"></script>



<!-- JQuery -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<!-- Barba Core -->
<script src="https://unpkg.com/@barba/core"></script>
<!-- GSAP for animation -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.2.4/gsap.min.js"></script>
<!-- Some basic helper functions -->
<script src="/js/helper.js"></script>
<!-- Main JS file -->
<script src="/js/main.js"></script>
</html>

