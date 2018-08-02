<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield("PAGE_TITLE")</title>

    <!-- Styles -->
    <link rel="stylesheet" href="css/app.css">

    @yield("PAGE_STYLES")
</head>
<body>

<div class="main-wrapper">
    <div class="content">

        <header>
            <div class="container">
                <nav class="navbar navbar-expand-md pl-0 pr-0 navbar-light">
                    <a class="navbar-brand p-0" href="{{ url("/") }}"><img src="storage/{{ setting('site.logo') }}"
                                                                           alt="logo"></a>
                    <ul class="mb-0 header-info text-right d-block d-md-none">
                        <li class="header-info-phones">
                            <span class="header-info-phone">(812) 972-0-666</span>
                            <span class="header-info-phone">(812) 970-7-958</span>
                        </li>
                    </ul>

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-wrap">
                            <li class="nav-item active">
                                <a class="nav-link pb-0" href="../services.html">Услуги<span
                                            class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link pb-0" href="#contacts">Контакты</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link pb-0" href="../prices.html">Цены</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link pb-0" href="../gallery.html">Галерея</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link pb-0 navbar-insta" href="#"></a>
                            </li>
                        </ul>
                    </div>
                    <ul class="mb-0 header-info text-right d-none d-md-block">
                        <li class="header-info-address">Санкт-Петербург, Митрофаньевское шоссе, д.27</li>
                        <li class="header-info-phones">
                            <span class="header-info-phone">(812) 972-0-666</span>
                            <span class="header-info-phone">(812) 970-7-958</span>
                        </li>
                        <li><a class="header-info-call" href="#" data-toggle="modal" data-target="#modalCenter">Перезвоните
                                мне</a></li>
                    </ul>
                </nav>
            </div>
        </header>

        <main>
            @yield("PAGE_CONTENT")
        </main>

    </div>

    <footer class="footer">
        <div class="container footer-container d-flex flex-wrap align-items-center">
            <nav class="d-flex flex-wrap footer-nav col-lg-6 col-md-12">
                <li class="footer-nav-li"><a href="../services.html" class="footer-nav-a">Услуги</a></li>
                <li class="footer-nav-li"><a href="#contacts" class="footer-nav-a">Контакты</a></li>
                <li class="footer-nav-li"><a href="../prices.html" class="footer-nav-a">Цены</a></li>
                <li class="footer-nav-li"><a href="../gallery.html" class="footer-nav-a">Галерея</a></li>
            </nav>
            <div class="payment-wrapper col-lg-4 col-6">
                <div class="payment"></div>
            </div>
            <div class="soc-wrapper col-lg-2 col-6"><a href="#" class="soc mx-md-auto"></a></div>
        </div>
        <div class="all-rights">
            <div class="container">
                <span class="all-rights-text">© 2018 Все права защищены</span>
            </div>
        </div>
    </footer>

    <div class="modal fade" id="modalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <form action="#">
                        <label for="name" class="modal-label">Заказать звонок</label>
                        <input id="name" type="name" class="popup-input" placeholder="Ваше имя">
                        <input type="phone" class="popup-input" placeholder="Ваш телефон">
                        <button class="btn btn-red" type="submit">
                            <span class="btn-text">Перезвоните мне!</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

@yield("PAGE_SCRIPTS")

<script src="js/app.js"></script>
</body>
</html>
