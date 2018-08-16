<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @if($page_info)
        <title>{{ $page_info->title }}</title>
        <meta name="description" content="{{ $page_info->description }}" />
    @else
        <title>@yield("PAGE_TITLE")</title>
        <meta name="description" content="@yield("PAGE_DESC")" />
    @endif

    <!-- Styles -->
    <link rel="stylesheet" href="css/app.css">

    <!-- Icons -->
    <link rel="apple-touch-icon-precomposed" sizes="57x57" href="/icons/apple-touch-icon-57x57.png" />
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/icons/apple-touch-icon-114x114.png" />
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/icons/apple-touch-icon-72x72.png" />
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/icons/apple-touch-icon-144x144.png" />
    <link rel="apple-touch-icon-precomposed" sizes="60x60" href="/icons/apple-touch-icon-60x60.png" />
    <link rel="apple-touch-icon-precomposed" sizes="120x120" href="/icons/apple-touch-icon-120x120.png" />
    <link rel="apple-touch-icon-precomposed" sizes="76x76" href="/icons/apple-touch-icon-76x76.png" />
    <link rel="apple-touch-icon-precomposed" sizes="152x152" href="/icons/apple-touch-icon-152x152.png" />
    <link rel="icon" type="image/png" href="/icons/favicon-196x196.png" sizes="196x196" />
    <link rel="icon" type="image/png" href="/icons/favicon-96x96.png" sizes="96x96" />
    <link rel="icon" type="image/png" href="/icons/favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="/icons/favicon-16x16.png" sizes="16x16" />
    <link rel="icon" type="image/png" href="/icons/favicon-128.png" sizes="128x128" />
    <meta name="application-name" content="&nbsp;"/>
    <meta name="msapplication-TileColor" content="#FFFFFF" />
    <meta name="msapplication-TileImage" content="/icons/mstile-144x144.png" />
    <meta name="msapplication-square70x70logo" content="/icons/mstile-70x70.png" />
    <meta name="msapplication-square150x150logo" content="/icons/mstile-150x150.png" />
    <meta name="msapplication-wide310x150logo" content="/icons/mstile-310x150.png" />
    <meta name="msapplication-square310x310logo" content="/icons/mstile-310x310.png" />


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
                        {{ menu('public', 'menu.diskremont_top') }}
                    </div>
                    <ul class="mb-0 header-info text-right d-none d-md-block">
                        <li class="header-info-address">{{ setting('kontakty.address') }}</li>
                        <li class="header-info-phones">
                            <a href="tel:{{ setting('kontakty.phone_1') }}" class="header-info-phone">{{ setting('kontakty.phone_1') }}</a>
                            <a href="tel:{{ setting('kontakty.phone_2') }}" class="header-info-phone">{{ setting('kontakty.phone_2') }}</a>
                        </li>
                        <li>
                            <a class="header-info-call" href="#" data-toggle="modal" data-target="#modalCenter">Перезвоните мне</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </header>

        <main>
            @yield("PAGE_CONTENT")
            <div class="main-destination" id="contacts">
                <div class="container">
                    <div class="main-destination-block d-flex flex-wrap">
                        <div class="col pr-md-0 main-destination-block-map">
                            <div id="map" class="map"></div>
                            <script>
                                var mapData = {
                                    point: '{{ setting('kontakty.map_coord') }}',
                                    address: '{{ setting('kontakty.address') }}'
                                };
                            </script>
                        </div>
                        <div class="col p-0 ">
                            <ul class="main-destination-info">
                                <li class="address destination-info-li"><span class="dest-info-span">{{ setting('kontakty.address') }}</span></li>
                                <li class="phones destination-info-li">
                                    <span class="dest-info-span">
                                    <a href="tel:{{ setting('kontakty.phone_1') }}">{{ setting('kontakty.phone_1') }}</a><br/>
                                    <a href="tel:{{ setting('kontakty.phone_2') }}">{{ setting('kontakty.phone_2') }}</a>
                                    </span>
                                </li>
                                <li class="timetable destination-info-li"><span class="dest-info-span">{{ setting('kontakty.working-time') }}</span></li>
                                <li>
                                    <button class="btn btn-red" data-toggle="modal" data-target="#modalCenter"><span class="btn-text d-flex align-items-center">Оставить заявку</span></button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </main>

    </div>

    <footer class="footer">
        <div class="container footer-container d-flex flex-wrap align-items-center">

            {{ menu('footer_menu', 'menu.diskremont_bottom_line') }}

            {{ menu('public', 'menu.diskremont_bottom') }}

            <div class="payment-wrapper col-lg-4 col-10 my-4 my-mb-0">
                <div class="payment">Любые способы оплаты</div>
            </div>
            <div class="soc-wrapper col-lg-2 col-2 p-0"><a href="{{ setting('kontakty.insta') }}" target="_blank" class="soc mx-md-auto"></a></div>
        </div>
        <div class="all-rights">
            <div class="container">
                <span class="all-rights-text">© 2008 - {{ date('Y') }} Все права защищены</span>
            </div>
        </div>
    </footer>

    <div class="modal fade" id="modalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <form id="callbackForm">
                        <label for="name" class="modal-label">Заказать звонок</label>
                        <input id="name" name="name" class="popup-input" placeholder="Ваше имя" type="text" minlength="2" required/>
                        <input id="phone" name="phone" class="popup-input" placeholder="Ваш телефон" type="text" minlength="16" required/>
                        <button class="btn btn-red" type="submit">
                            <span class="btn-text">Перезвоните мне!</span>
                        </button>
                    </form>
                    <div class="d-none text-danger" id="callbackFormResult"></div>
                </div>
            </div>
        </div>
    </div>

</div>

<script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU"></script>

@yield("PAGE_SCRIPTS")

<script src="js/app.js"></script>
</body>
</html>
