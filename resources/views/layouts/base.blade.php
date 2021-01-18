<!doctype html>

<html lang="{{ app()->getLocale() }}">

<head>

    <!-- Google Tag Manager -->

    <script>(function (w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start':

                    new Date().getTime(), event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],

                j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =

                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);

        })(window, document, 'script', 'dataLayer', 'GTM-NBBDMM2');</script>

    <!-- End Google Tag Manager -->


    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">


    @if($page_info)

        <title>{{ $page_info->title }}</title>

        <meta name="description" content="{{ $page_info->description }}"/>

    @else

        <title>@yield("PAGE_TITLE")</title>

        <meta name="description" content="@yield("PAGE_DESC")"/>

    @endif



<!-- Icons -->

    <link rel="apple-touch-icon-precomposed" sizes="57x57" href="/icons/apple-touch-icon-57x57.png"/>

    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/icons/apple-touch-icon-114x114.png"/>

    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/icons/apple-touch-icon-72x72.png"/>

    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/icons/apple-touch-icon-144x144.png"/>

    <link rel="apple-touch-icon-precomposed" sizes="60x60" href="/icons/apple-touch-icon-60x60.png"/>

    <link rel="apple-touch-icon-precomposed" sizes="120x120" href="/icons/apple-touch-icon-120x120.png"/>

    <link rel="apple-touch-icon-precomposed" sizes="76x76" href="/icons/apple-touch-icon-76x76.png"/>

    <link rel="apple-touch-icon-precomposed" sizes="152x152" href="/icons/apple-touch-icon-152x152.png"/>

    <link rel="icon" type="image/png" href="/icons/favicon-196x196.png" sizes="196x196"/>

    <link rel="icon" type="image/png" href="/icons/favicon-96x96.png" sizes="96x96"/>

    <link rel="icon" type="image/png" href="/icons/favicon-32x32.png" sizes="32x32"/>

    <link rel="icon" type="image/png" href="/icons/favicon-16x16.png" sizes="16x16"/>

    <link rel="icon" type="image/png" href="/icons/favicon-128.png" sizes="128x128"/>

    <meta name="application-name" content="&nbsp;"/>

    <meta name="msapplication-TileColor" content="#FFFFFF"/>

    <meta name="msapplication-TileImage" content="/icons/mstile-144x144.png"/>

    <meta name="msapplication-square70x70logo" content="/icons/mstile-70x70.png"/>

    <meta name="msapplication-square150x150logo" content="/icons/mstile-150x150.png"/>

    <meta name="msapplication-wide310x150logo" content="/icons/mstile-310x150.png"/>

    <meta name="msapplication-square310x310logo" content="/icons/mstile-310x310.png"/>


    <script type="application/ld+json">

        {!! setting('site.ld-json') !!}

    </script>


    @yield("PAGE_STYLES")
    <script src="//code.jivosite.com/widget/RK3SVj2R2R" async></script>
</head>

<body>


<!-- Google Tag Manager (noscript) -->

<noscript>
    <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NBBDMM2" height="0" width="0"
            style="display:none;visibility:hidden"></iframe>
</noscript>

<!-- End Google Tag Manager (noscript) -->

{{--<div class="desclaimer">--}}
{{--    <div class="container">--}}
{{--        <p>9 января мастерская не работает</p>--}}
{{--    </div>--}}
{{--</div>--}}


<div class="main-wrapper">

    <div class="content">


        <header>

            <div class="container">

                <nav class="navbar navbar-expand-md pl-0 pr-0 navbar-light">

                    <a class="navbar-brand p-0" href="{{ url("/") }}">

                        <img src="{{ Voyager::image(setting('site.logo')) }}" alt="logo">

                    </a>

                    <ul class="mb-0 header-info text-right d-block d-md-none">

                        <li class="header-info-phones d-flex justify-content-between">

                            <a class="header-info-phone"
                               href="tel:{{ str_replace(" ", "", setting('kontakty.phone_1')) }}" onclick="dataLayer.push({'event': 'tel'});">{{ setting('kontakty.phone_1') }}</a>

                            <a class="header-info-phone"
                               href="tel:{{ str_replace(" ", "", setting('kontakty.phone_3')) }}" onclick="dataLayer.push({'event': 'tel'});">{{ setting('kontakty.phone_3') }}</a>

                        </li>
                        <li class="header-info-address d-flex justify-content-between">
                            <span>{{ setting('kontakty.address') }}</span>
                            <span>{{ setting('kontakty.address2') }}</span>
                        </li>
                        <li class="header-soc">
                            <a href="viber://chat?number={{ setting('kontakty.viber') }}" title="Viber" class="soc soc-viber"></a>
                            <a href="whatsapp://send?phone={{ setting('kontakty.Watsapp') }}" title="Watsapp" class="soc soc-watsapp"></a>
                        </li>
                    </ul>


                    <button id="showCallbackForm" class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarNav"

                            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">

                        <span class="navbar-toggler-icon"></span>

                    </button>


                    <div class="collapse navbar-collapse" id="navbarNav">

                        {{ menu('public', 'menu.diskremont_top') }}

                    </div>

                    <ul class="mb-0 header-info text-right d-none d-md-block">

                        <li class="header-info-address d-flex justify-content-between pl-3">
                            <span>{{ setting('kontakty.address') }}</span>
                            <span>{{ setting('kontakty.address2') }}</span></li>

                        <li class="header-info-phones d-flex justify-content-between">

                            <a href="tel:{{ setting('kontakty.phone_1') }}"

                               class="header-info-phone" onclick="dataLayer.push({'event': 'tel'});">{{ setting('kontakty.phone_1') }}</a>

                            <a href="tel:{{ setting('kontakty.phone_3') }}"

                               class="header-info-phone" onclick="dataLayer.push({'event': 'tel'});">{{ setting('kontakty.phone_3') }}</a>

                        </li>

                        <li class="header-soc">
                            <a href="viber://chat?number={{ setting('kontakty.viber') }}" target="_blank" class="soc soc-viber"></a>
                            <a href="whatsapp://send?phone={{ setting('kontakty.Watsapp') }}" target="_blank" class="soc soc-watsapp"></a>
                        </li>

                        <li>

                            <button class="header-info-call btn btn-red"  href="#" data-toggle="modal" data-target="#modalCenter" onclick="dataLayer.push({'event': 'open'});">Заказать обратный звонок</button>

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

                        <div class="col-md-4 pr-md-0 main-destination-block-map">

                            {{--<div id="map" class="map"></div>--}}

                            <script type="text/javascript" charset="utf-8" async
                                    src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A6ec6d46aa4f96e11eb76b2fd8171f1f3474572a9ffa24332372db71d7e8c4517&amp;width=100%&amp;height=100%&amp;lang=ru_RU&amp;scroll=false"></script>

                            {{--<script>--}}

                            {{--var mapData = {--}}

                            {{--point: '{{ setting('kontakty.map_coord') }}',--}}

                            {{--address: '{{ setting('kontakty.address') }}'--}}

                            {{--};--}}

                            {{--</script>--}}

                        </div>

                        <div class="col-md-8">
                            <div class="row">
                                <div class="col p-0 ">

                                    <img src="{{ '/storage/' . setting('kontakty.entanse-photo') }}"/>
                                </div>
                                <div class="col p-0 " style="border-bottom: 1px solid #6e6e6e;">
                                    <ul class="main-destination-info">

                                        <li class="address destination-info-li"><span

                                                    class="dest-info-span">Санкт-Петербург, {{ setting('kontakty.address') }}</span>
                                        </li>

                                        <li class="phones destination-info-li">

                                    <span class="dest-info-span">

                                    <a href="tel:{{ str_replace(" ", "", setting('kontakty.phone_1')) }}" onclick="dataLayer.push({'event': 'tel'});">{{ setting('kontakty.phone_1') }}</a><br/>

                                    <a href="tel:{{ str_replace(" ", "", setting('kontakty.phone_2')) }}" onclick="dataLayer.push({'event': 'tel'});">{{ setting('kontakty.phone_2') }}</a>

                                    </span>

                                        </li>
                                        <li class="timetable destination-info-li">
                                    <span class="dest-info-span">{{ setting('kontakty.working-time') }}
                                    </span>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col p-0 ">

                                    <img src="{{ '/storage/' . setting('kontakty.entanse-photo_2') }}"/>
                                </div>
                                <div class="col p-0 ">

                                    <ul class="main-destination-info">
                                        <li class="address destination-info-li">
                                            <span class="dest-info-span">Санкт-Петербург, {{ setting('kontakty.address2') }}</span>
                                        </li>
                                        <li class="phones destination-info-li">
                                    <span class="dest-info-span">

                                    <a href="tel:{{ str_replace(" ", "", setting('kontakty.phone_3')) }}" onclick="dataLayer.push({'event': 'tel'});">{{ setting('kontakty.phone_3') }}</a>

                                    </span>
                                        </li>

                                        <li class="timetable destination-info-li">
                                    <span class="dest-info-span">{{ setting('kontakty.working-time-2') }}
                                    </span>
                                        </li>

                                        <li>

                                            <button class="btn btn-red" data-toggle="modal"
                                                    data-target="#modalCenter" onclick="dataLayer.push({'event': 'open'});"><span

                                                        class="btn-text d-flex align-items-center">Оставить заявку</span>

                                            </button>

                                        </li>

                                    </ul>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </main>


    </div>


    <footer class="footer">

        <div class="container footer-container d-flex flex-wrap align-items-center">


        {{ menu('footer_menu', 'menu.diskremont_bottom_line') }}



        {{-- menu('public', 'menu.diskremont_bottom') --}}



        <!--

            <div class="payment-wrapper col-lg-4 col-10 my-4 my-mb-0">

                <div class="payment">Visa, Master Card</div>

            </div>

            <div class="soc-wrapper col-lg-2 col-2 p-0"><a href="{{ setting('kontakty.insta') }}" target="_blank"

                                                           class="soc mx-md-auto"></a></div>

            -->

            <div class="col-lg-12 d-flex justify-content-center align-items-center">

                <a href="{{ setting('kontakty.insta') }}" target="_blank" class="soc mx-4"></a>
                <a href="{{ setting('kontakty.vkontakte') }}" target="_blank" class="soc soc-vk mx-4"></a>
                <a href="viber://chat?number={{ setting('kontakty.viber') }}" title="Viber" class="soc soc-viber mx-4"></a>
                <a href="whatsapp://send?phone={{ setting('kontakty.Watsapp') }}" title="Watsapp" class="soc soc-watsapp mx-4"></a>
            </div>

        </div>

        <div class="all-rights">

            <div class="container text-center">

                <span class="all-rights-text">© 2006 - {{ date('Y') }} Все права защищены</span>

            </div>

        </div>

    </footer>


    <div class="modal fade" id="modalCenter" tabindex="-1" role="dialog" aria-labelledby="showCallbackForm"

         aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered" role="document">

            <div class="modal-content">

                <div class="modal-header">

                    <h5 class="modal-title">Заказать звонок</h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                        <span aria-hidden="true">&times;</span>

                    </button>

                </div>

                <div class="modal-body">

                    <form id="callbackForm">

                        <!--

                        <label for="name" class="modal-label">Заказать звонок</label>

                        -->

                        <input id="name" name="name" class="popup-input" placeholder="Ваше имя" type="text"

                               minlength="2" required/>

                        <input id="phone" name="phone" class="popup-input" placeholder="Ваш телефон" type="text"

                               minlength="16" required/>

                        <button class="btn btn-red"  type="submit">

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



{{--

<script>

    !function (a) {

        "use strict";

        var b = function (b, c, d) {

            var g, e = a.document, f = e.createElement("link");

            if (c) g = c; else {

                var h = (e.body || e.getElementsByTagName("head")[0]).childNodes;

                g = h[h.length - 1]

            }

            var i = e.styleSheets;

            f.rel = "stylesheet", f.href = b, f.media = "only x", g.parentNode.insertBefore(f, c ? g : g.nextSibling);

            var j = function (a) {

                for (var b = f.href, c = i.length; c--;) if (i[c].href === b) return a();

                setTimeout(function () {

                    j(a)

                })

            };

            return f.onloadcssdefined = j, j(function () {

                f.media = d || "all"

            }), f

        };

        "undefined" != typeof module ? module.exports = b : a.loadCSS = b

    }("undefined" != typeof global ? global : this);

    loadCSS('css/app.css');

</script>

--}}



<!-- Styles -->

<link rel="stylesheet" href="{{ asset("css/app.css") }}">


<script src="{{ asset("js/app.js") }}"></script>



</body>

</html>

