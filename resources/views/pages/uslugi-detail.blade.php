@extends('layouts.base')

@section('PAGE_TITLE', setting('site.title'))

@section("PAGE_STYLES")
    <link rel="stylesheet" href="/css/uslugi_detail_critical.min.css">
@endsection

@section('PAGE_CONTENT')

    <div class="kind">
        <h1 class="black-header">
            <span class="black-header-span">{!! $usluga->name !!}</span>
        </h1>

        @php
            $priceHTML = "";
        @endphp

        @if($usluga->display_price != "")
            @php
                ob_start();
                $display_price = json_decode($usluga->display_price, true);
            @endphp
            <section class="prices">

                <div class="container">
                    <div class="prices-table-header">
                        <span class="prices-table-header-text btn-text">Цены</span>
                    </div>
                    <div class="table-responsive-lg table-border">
                        <table class="table prices-table">
                            <thead>
                            <tr>
                                <th class="prices-table-th" scope="col"></th>
                                @foreach($transp["titles"] as $k=>$v)
                                    <th class="prices-table-th" scope="col">{{ $v }}</th>
                                @endforeach
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($display_price as $code)
                                @if (isset($transp[$code]))
                                    <tr>
                                        <th class="prices-table-th-left" scope="row">
                                            @php
                                                switch ($code) {
                                                    case "pokraska":
                                                        echo "Порошковая покраска*";
                                                        break;
                                                    case "prokat":
                                                        echo "Прокат";
                                                        break;
                                                    case "tiremount":
                                                        echo "Шиномонтаж**";
                                                        break;
                                                    case "akril":
                                                        echo "Акриловая покраска*";
                                                        break;
                                                    case "grind":
                                                        echo "Полировка дисков*";
                                                        break;
                                                    case "dimond_grind":
                                                        echo "Алмазная проточка дисков*";
                                                        break;
                                                }
                                            @endphp
                                        </th>
                                        @foreach($transp[$code] as $k=>$v)
                                            <td>{{ $v }}</td>
                                        @endforeach
                                    </tr>
                                @endif
                            @endforeach
                            </tbody>
                        </table>
                        <div class="prices-table-footer">
                            <p class="prices-table-footer-first-p">* В цену не входят услуги шиномонтажа</p>
                            <p>** Цена за полный шиномонтажный комплекс: снятие и постановка, проверка, шиномонтаж,
                                балансировка. Для внедорожноков цена комплекса увеличивается на 500 руб.</p>
                        </div>
                    </div>
                </div>

            </section>
            @php
                $priceHTML = ob_get_contents();
                ob_end_clean ();
            @endphp
        @endif

        <section class="why-choose">
            <div class="container">

                @php
                    $detail_text = $usluga->detail_text;
                    $detail_text = preg_replace("/({{PRICES}})/", $priceHTML, $detail_text);
                @endphp

                {!! $detail_text !!}

            </div>
        </section>

        <section class="main-promo-large price-promo-large">
            <div class="card bg-dark text-white">
                <img class="card-img" src="./img/promo-service-bg.jpg" alt="Card image">
                <div class="card-img-overlay mx-auto d-flex flex-wrap">
                    <div class="col">
                        <div class="price-promo-large-icon price-promo-large-icon-1"></div>
                        <div class="price-promo-large-description">На цвета чёрный/белый глянец и матовое серебро
                            действует 25% скидка! Цвета покраски Candy рассчитываются с наценкой 50% к базовой
                        </div>
                    </div>
                    <div class="col">
                        <div class="price-promo-large-icon price-promo-large-icon-2"></div>
                        <div class="price-promo-large-description">Новая услуга - наш курьер готов в течение дня забрать
                            Ваши диски и доставить готовые всего за 1000 рублей.
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-4 offset-md-4">
                    <div class="price-kind-block block-shaddow m-0">
                        <div class="price-kind-block-header">
                                    <span class="price-kind-block-header-span">
                                        Наши телефоны:
                                    </span>
                        </div>
                        <div class="price-kind-block-text pb-4">
                            <a href="tel:(812) 970-7-958">(812) 970-7-958</a><br>
                            <a href="tel:(812) 972-0-666">(812) 972-0-666</a>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->

        @if($gallery->count() > 0)

            <div class="container">
                <section class="main-photoalbum">
                    <div class="main-photoalbum-wrapper text-center">
                        <h1 class="text-center">Примеры</h1>
                        <div class="row main-photoalbum-row">
                            @foreach($gallery as $item)
                                <div class="col-lg-3 col-md-4 col-6 thumb">
                                    <a rel="example_group" data-lightbox="image"
                                       href="{{ Voyager::image($item->picture) }}">
                                        <img class="img-fluid"
                                             src="{{ Voyager::image($item->thumbnail('cropped', 'picture')) }}"
                                             alt="{{ $item->name }}">
                                    </a>
                                </div>
                            @endforeach
                        </div>
                        <a href="{{ url("/galmenu.html") }}" class="btn btn-red">
                            <span class="btn-text">Вся галерея</span>
                        </a>
                    </div>
                </section>
            </div>
        @endif

    </div>

    <!--


        <section class="main-promo-large kind-promo-large">
            <div class="card bg-dark text-white">
                <img class="card-img" src="./img/promo-service-bg.jpg" alt="Card image">
                <div class="card-img-overlay mx-auto text-center">
                    <h5 class="card-title">Мы рады предложить Вам услугу профессиональной порошковой покраски дисков в
                        Санкт-Петербурге!</h5>
                    <p class="card-text">
                    </p>
                    <p class="card-text">

                    </p>
                </div>
            </div>
        </section>

    -->

@endsection


