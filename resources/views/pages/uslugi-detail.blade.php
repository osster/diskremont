@extends('layouts.base')

@section('PAGE_TITLE', setting('site.title'))

@section("PAGE_STYLES")
<style>
    {!!  file_get_contents( public_path("/css/uslugi_detail_critical.min.css"))  !!}
</style>
@endsection

@section('PAGE_CONTENT')

    <div class="kind">
        <h1 class="black-header">
            <span class="black-header-span">
                @if($page_info && $page_info->h1 != "")
                    {{ $page_info->h1 }}
                @else
                    {!! $usluga->name !!}
                @endif
            </span>
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
                        <table class="table prices-table d-none d-lg-block">
                            <thead>
                            <tr>
                                <th class="prices-table-th" scope="col"></th>
                                @foreach($transp["titles"] as $k=>$v)
                                    <th class="prices-table-th" scope="col">{{ $v }}</th>
                                @endforeach
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $oneStar = false;
                                $twoStars = false;
                            @endphp
                            @foreach($display_price as $code)
                                @if (isset($transp[$code]))
                                    <tr>
                                        <th class="prices-table-th-left" scope="row">
                                            @php
                                                switch ($code) {
                                                    case "pokraska":
                                                        echo "Порошковая покраска, руб*";
                                                        $oneStar = true;
                                                        break;
                                                    case "prokat":
                                                        echo "Прокат, руб";
                                                        break;
                                                    case "tiremount":
                                                        echo "Шиномонтаж, руб**";
                                                        $twoStars = true;
                                                        break;
                                                    case "akril":
                                                        echo "Акриловая покраска, руб*";
                                                        $oneStar = true;
                                                        break;
                                                    case "grind":
                                                        echo "Полировка дисков, руб*";
                                                        $oneStar = true;
                                                        break;
                                                    case "dimond_grind":
                                                        echo "Алмазная проточка дисков, руб*";
                                                        $oneStar = true;
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

                        <div class="text-center d-block d-lg-none">
                        @foreach($display_price as $code)
                            @if (isset($transp[$code]))
                                <table class="table prices-table table-striped">
                                    <thead>
                                    <tr>
                                        <th colspan="2" class="h3">
                                            @php
                                                switch ($code) {
                                                    case "pokraska":
                                                        echo "Порошковая покраска, руб*";
                                                        $oneStar = true;
                                                        break;
                                                    case "prokat":
                                                        echo "Прокат, руб";
                                                        break;
                                                    case "tiremount":
                                                        echo "Шиномонтаж, руб**";
                                                        $twoStars = true;
                                                        break;
                                                    case "akril":
                                                        echo "Акриловая покраска, руб*";
                                                        $oneStar = true;
                                                        break;
                                                    case "grind":
                                                        echo "Полировка дисков, руб*";
                                                        $oneStar = true;
                                                        break;
                                                    case "dimond_grind":
                                                        echo "Алмазная проточка дисков, руб*";
                                                        $oneStar = true;
                                                        break;
                                                }
                                            @endphp
                                        </th>
                                    </tr>
                                    </thead>
                                    @foreach($transp["titles"] as $k=>$v)
                                        <tr>
                                            <th class="w-50">{{ $v }}</th>
                                            <td class="w-50">{{ $transp[$code][$k] }}</td>
                                        </tr>
                                    @endforeach
                                </table>
                            @endif
                        @endforeach
                        </div>

                        <div class="prices-table-footer">
                            @if($oneStar)
                                <p class="prices-table-footer-first-p">* В цену не входят услуги шиномонтажа</p>
                            @endif
                            @if($twoStars)
                                <p>** Цена за полный шиномонтажный комплекс: снятие и постановка, проверка, шиномонтаж,
                                    балансировка. Для внедорожноков цена комплекса увеличивается на 500 руб.</p>
                            @endif
                        </div>
                    </div>
                </div>

            </section>
            @php
                $priceHTML = ob_get_contents();
                ob_end_clean ();
            @endphp
        @endif

        @php
            $colorsHTML = "";
        @endphp
        @if ($colors->count() > 0)
            @php
                ob_start();
            @endphp
            <div class="container" id="disk-color-samples">
                <section class="main-photoalbum">
                    <div class="main-photoalbum-wrapper text-center">
                        <h1 class="text-center">Цвета покраски</h1>
                        <div class="row main-photoalbum-row">
                            @foreach($colors as $item)
                                <div class="col-lg-2 col-md-4 col-6 thumb">
                                    <a rel="example_group" data-lightbox="image"
                                       href="{{ Voyager::image($item->picture) }}">
                                        <img class="img-fluid"
                                             src="{{ Voyager::image($item->thumbnail('cropped_mid', 'picture')) }}"
                                             alt="{{ $item->name }}">

                                        <strong class="small">{{ $item->name }}</strong>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </section>
            </div>
            @php
                $colorsHTML = ob_get_contents();
                ob_end_clean ();
            @endphp
        @endif

        <section class="why-choose">
            <div class="container">

                @php
                    $detail_text = $usluga->detail_text;
                    $detail_text = preg_replace("/({{PRICES}})/", $priceHTML, $detail_text);
                    $detail_text = preg_replace("/({{COLORS}})/", $colorsHTML, $detail_text);
                @endphp

                {!! $detail_text !!}

            </div>
        </section>

        {{--  Только для покраски --}}
        @if($usluga->id == 1)
        <section class="main-promo-large price-promo-large">
            <div class="card bg-dark text-white" style="background-image: url(./img/promo-service-bg.jpg);">
                <div class="card-img-overlay d-flex flex-column flex-md-row mx-auto">
                    <div class="col-12 col-md-6">
                        <div class="price-promo-large-icon price-promo-large-icon-1"></div>
                        <div class="price-promo-large-description">На цвета чёрный/белый глянец и матовое серебро
                            действует 25% скидка! Цвета покраски Candy рассчитываются с наценкой 50% к базовой
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="price-promo-large-icon price-promo-large-icon-2"></div>
                        <div class="price-promo-large-description">Новая услуга - наш курьер готов в течение дня забрать
                            Ваши диски и доставить готовые всего за 1000 рублей.
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @endif

        @if($gallery->count() > 0)
            <div class="container">
                <section class="main-photoalbum">
                    <div class="main-photoalbum-wrapper text-center">
                        <h1 class="text-center">Примеры</h1>
                        <div class="wch-descr-wrapper d-flex justify-content-center">
                            <div class="col-md-4 col-12">
                                <video class="pr-0 pr-md-3 pb-3" controls="controls" width="100%" height="320">
                                    <source src="storage/disk-uslugi/video/video01.mp4" type="video/mp4">
                                </video>
                            </div>
                            <div class="col-md-4 col-12">
                                <video class="pr-0 pr-md-3 pb-3" controls="controls" width="100%" height="320">
                                    <source src="storage/disk-uslugi/video/video02.mp4" type="video/mp4">
                                </video>
                            </div>
                            <div class="col-md-4 col-12">
                                <video class="pr-0 pr-md-3 pb-3" controls="controls" width="100%" height="320">
                                    <source src="storage/disk-uslugi/video/video03.mp4" type="video/mp4">
                                </video>
                            </div>
                        </div>
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

