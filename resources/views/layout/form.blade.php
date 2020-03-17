<!DOCTYPE html>
<html>
<head>
    <meta charset='UTF-8'>
    <title>Sonos - The brand new music platform</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="/css/master.css">
    <link
        href="https://fonts.googleapis.com/css?family=Montserrat+Alternates:200,300,400,500,600,700,800,900&display=swap"
        rel="stylesheet">
</head>
<body>

<div class="form_page">

    <nav class="container_all">
        <div class="header">
            <a href="#" class="logo"><img src="/images/logo/logo_noir.png" class="logo"></a>

            <div class="rightheader">
                <a href="/"><div class="btn home">
                        <svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M2.82326 12.1807L3.03316 12.0114V19.5C3.03316 19.737 3.22951 19.9333 3.46649 19.9333C3.70347 19.9333 3.89982 19.737 3.89982 19.5V11.3073L12.9998 3.96093L22.0998 11.3073V22.9667C22.0998 24.1651 21.1316 25.1333 19.9332 25.1333H16.8998V16.9C16.8998 16.1823 16.3175 15.6 15.5998 15.6H10.3998C9.68211 15.6 9.09982 16.1823 9.09982 16.9V25.1333H6.06649C4.86805 25.1333 3.89982 24.1651 3.89982 22.9667C3.89982 22.7297 3.70347 22.5333 3.46649 22.5333C3.22951 22.5333 3.03316 22.7297 3.03316 22.9667C3.03316 24.6391 4.39409 26 6.06649 26H19.9332C21.6056 26 22.9665 24.6391 22.9665 22.9667V12.0114L23.1764 12.1807C23.9212 12.7833 25.0113 12.6682 25.6139 11.9234C26.2165 11.1786 26.1014 10.0885 25.3566 9.48593L14.0899 0.385925C13.4535 -0.121887 12.5462 -0.121887 11.9097 0.385925L0.643051 9.48593C-0.10174 10.0885 -0.216845 11.1786 0.38576 11.9234C0.988364 12.6682 2.07847 12.7833 2.82326 12.1807ZM9.96649 25.1333V16.9C9.96649 16.663 10.1628 16.4667 10.3998 16.4667H15.5998C15.8368 16.4667 16.0332 16.663 16.0332 16.9V25.1333H9.96649ZM1.19149 10.1562L12.4582 1.05624C12.7764 0.798946 13.23 0.798946 13.5483 1.05624L24.8082 10.1562C24.9842 10.2984 25.0993 10.5083 25.1264 10.7385C25.1535 10.9687 25.0858 11.1989 24.9368 11.375C24.6321 11.7406 24.0904 11.7948 23.7181 11.5036L13.2707 3.06718C13.1149 2.93853 12.8847 2.93853 12.729 3.06718L2.27482 11.5104C2.03107 11.7068 1.70607 11.7542 1.4217 11.6458C1.13055 11.5375 0.927426 11.2802 0.88003 10.9687C0.825864 10.6641 0.947739 10.3526 1.19149 10.1562Z" fill="url(#paint0_linear)"/>
                            <defs>
                                <linearGradient id="paint0_linear" x1="-0.000177943" y1="13.0015" x2="26.0001" y2="13.0015" gradientUnits="userSpaceOnUse">
                                    <stop offset="0.00446941" stop-color="#BF85ED"/>
                                    <stop offset="1" stop-color="#428DFF"/>
                                </linearGradient>
                            </defs>
                        </svg>
                    </div></a>
                </a>
                @if(Route::is('login'))
                    <a class="btn" href="{{ route('register') }}">{{ __('Register') }}</a>
                @endif

                @if (Route::is('register'))
                    <a class="btn" href="{{ route('login') }}">{{ __('Login') }}</a>
                @endif
            </div>

        </div>



        <div class="div_form">

            @yield('contenu')


        </div>
    </nav>
</div>




</body>
<script src="/js/jquery.js"></script>
<script src="/js/divers.js"></script>
</html>

