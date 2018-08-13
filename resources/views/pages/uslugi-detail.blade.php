@extends('layouts.base')

@section('PAGE_TITLE', setting('site.title'))

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