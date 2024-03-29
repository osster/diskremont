@extends('layouts.base')


@section('PAGE_TITLE', setting('site.title'))

@section("PAGE_STYLES")
    <style>
        {!!  file_get_contents( public_path("/css/price_critical.min.css"))  !!}
    </style>
@endsection

@section('PAGE_CONTENT')
    <section class="prices">
        <h1 class="black-header">
            <span class="black-header-span">
                @if($page_info && $page_info->h1 != "")
                    {{ $page_info->h1 }}
                @else
                    Цены
                @endif
            </span>
        </h1>

        @if(setting('aktsii.additional-offers-2') != '')
        <section class="main-promo-large price-promo-large price-promo-one">
            <div class="card bg-dark text-white" style="background-image: url(./img/banner-akcya-feb.jpg);">
                <div class="card-img-overlay d-flex flex-column mx-auto">
                    <div class="price-promo-large-icon price-promo-large-icon-3"></div>
                    <div class="price-promo-large-description">
                        <h3>Акция</h3>
                        {{ setting('aktsii.additional-offers-2') }}
                    </div>
                </div>
            </div>
        </section>
        @endif

        <div class="container">
            <div class="prices-table-header">
                <span class="prices-table-header-text btn-text">Цены на ремонт/покраску литых дисков, шиномонтажные и другие работы</span>
            </div>
            <div class="table-responsive-lg table-border">
                <table class="table prices-table table-striped d-none d-lg-block">
                    <thead>
                    <tr>
                        <th class="prices-table-th" scope="col"></th>
                        @foreach($transp["titles"] as $k=>$v)
                            <th class="prices-table-th" scope="col">{{ $v }}</th>
                        @endforeach
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th class="prices-table-th-left" scope="row">Порошковая покраска, руб*</th>
                        @foreach($transp["pokraska"] as $k=>$v)
                            <td>{{ $v }}</td>
                        @endforeach
                    </tr>
                    <tr>
                        <th class="prices-table-th-left" scope="row">Прокат, руб**</th>
                        @foreach($transp["prokat"] as $k=>$v)
                            <td>{{ $v }}</td>
                        @endforeach
                    </tr>
                    <tr>
                        <th class="prices-table-th-left" scope="row">Шиномонтаж, руб***</th>
                        @foreach($transp["tiremount"] as $k=>$v)
                            <td>{{ $v }}</td>
                        @endforeach
                    </tr>
                    {{--
                    <tr>
                        <th class="prices-table-th-left" scope="row">Акриловая покраска, руб*</th>
                        @foreach($transp["akril"] as $k=>$v)
                            <td>{{ $v }}</td>
                        @endforeach
                    </tr>
                    --}}
                    <tr>
                        <th class="prices-table-th-left" scope="row">Полировка дисков, руб*</th>
                        @foreach($transp["grind"] as $k=>$v)
                            <td>{{ $v }}</td>
                        @endforeach
                    </tr>
                    <tr>
                        <th class="prices-table-th-left" scope="row">Алмазная проточка дисков, руб*</th>
                        @foreach($transp["dimond_grind"] as $k=>$v)
                            <td>{{ $v }}</td>
                        @endforeach
                    </tr>
                    </tbody>
                </table>

                <div class="m-4 text-center d-block d-lg-none">
                    <table class="table prices-table table-striped w-100">
                        <thead>
                        <tr>
                            <th colspan="2" class="h3">Порошковая покраска, руб*</th>
                        </tr>
                        </thead>
                        @foreach($transp["titles"] as $k=>$v)
                            <tr>
                                <th class="w-50">{{ $v }}</th>
                                <td class="w-50">{{ $transp["pokraska"][$k] }}</td>
                            </tr>
                        @endforeach
                    </table>
                    <table class="table prices-table table-striped">
                        <thead>
                        <tr>
                            <th colspan="2" class="h3">Прокат, руб**</th>
                        </tr>
                        </thead>
                        @foreach($transp["titles"] as $k=>$v)
                            <tr>
                                <th class="w-50">{{ $v }}</th>
                                <td class="w-50">{{ $transp["prokat"][$k] }}</td>
                            </tr>
                        @endforeach
                    </table>
                    <table class="table prices-table table-striped">
                        <thead>
                        <tr>
                            <th colspan="2" class="h3">Шиномонтаж, руб***</th>
                        </tr>
                        </thead>
                        @foreach($transp["titles"] as $k=>$v)
                            <tr>
                                <th class="w-50">{{ $v }}</th>
                                <td class="w-50">{{ $transp["tiremount"][$k] }}</td>
                            </tr>
                        @endforeach
                    </table>
                    {{--
                    <table class="table prices-table table-striped">
                        <thead>
                        <tr>
                            <th colspan="2" class="h3">Акриловая покраска, руб*</th>
                        </tr>
                        </thead>
                        @foreach($transp["titles"] as $k=>$v)
                            <tr>
                                <th class="w-50">{{ $v }}</th>
                                <td class="w-50">{{ $transp["akril"][$k] }}</td>
                            </tr>
                        @endforeach
                    </table>
                    --}}
                    <table class="table prices-table table-striped">
                        <thead>
                        <tr>
                            <th colspan="2" class="h3">Полировка дисков, руб*</th>
                        </tr>
                        </thead>
                        @foreach($transp["titles"] as $k=>$v)
                            <tr>
                                <th class="w-50">{{ $v }}</th>
                                <td class="w-50">{{ $transp["grind"][$k] }}</td>
                            </tr>
                        @endforeach
                    </table>
                    <table class="table prices-table table-striped">
                        <thead>
                        <tr>
                            <th colspan="2" class="h3">Алмазная проточка дисков, руб*</th>
                        </tr>
                        </thead>
                        @foreach($transp["titles"] as $k=>$v)
                            <tr>
                                <th class="w-50">{{ $v }}</th>
                                <td class="w-50">{{ $transp["dimond_grind"][$k] }}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>

                <div class="prices-table-footer">
					<p><span style="color: #ff0000;">Цены указаны  без  учета скидки 15% по акции, действующей до 15 февраля</span></p>
                    <p class="prices-table-footer-first-p">* В цену не входят услуги шиномонтажа</p>
					<p>** Указана ориентировочная цена. Точная стоимость определяется мастером после проверки геометрии диска.</p>
                    <p>*** Цена за полный шиномонтажный комплекс: снятие и постановка, проверка, шиномонтаж,
                        балансировка. Для внедорожноков цена комплекса увеличивается на 500 руб.</p>                    
                    <p><span style="color: #000000;">Цвета покраски Candy рассчитываются с наценкой 50% к базовой</span></p>
					
                </div>
            </div>
        </div>

    </section>

    <section class="main-promo-large price-promo-large">
        <div class="card bg-dark text-white" style="background-image: url(./img/promo-service-bg.jpg);">
            <div class="card-img-overlay d-flex flex-column flex-md-row mx-auto">
                <div class="col-12 col-md-6">
                    <div class="price-promo-large-icon price-promo-large-icon-1"></div>

                    <div class="price-promo-large-description">
                        {{ setting('aktsii.additional-offers') }}
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

    <section class="prices-kinds">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="left-high">
                        <div class="left-high-header ">
                            <span class="left-high-header-span">Цены порошковую покраску дисков</span>
                        </div>
                        <div class="left-high-body">
                            @foreach($transp["pokraska"] as $k=>$v)
                                <div class="left-high-body-tr">
                                    <div class="left-high-body-th">{{ $transp["titles"][$k] }}</div>
                                    <div class="left-high-body-th">{{ $v }}</div>
                                </div>
                            @endforeach
                            {{--
                            <div class="left-high-body-tr">
                                <div class="left-high-body-th">Зеркало</div>
                                <div class="left-high-body-th">{{ setting('tseny-na-khromirovanie-i-zolochenie.mirror') }}</div>
                            </div>
                            <div class="left-high-body-tr">
                                <div class="left-high-body-th">Ручка дверная</div>
                                <div class="left-high-body-th">{{ setting('tseny-na-khromirovanie-i-zolochenie.door') }}</div>
                            </div>
                            <div class="left-high-body-tr">
                                <div class="left-high-body-th">Облицовочная передняя решетка</div>
                                <div class="left-high-body-th">{{ setting('tseny-na-khromirovanie-i-zolochenie.bumper') }}</div>
                            </div>
                            <div class="left-high-body-tr">
                                <div class="left-high-body-th">Дуга верхняя - 2 шт</div>
                                <div class="left-high-body-th">{{ setting('tseny-na-khromirovanie-i-zolochenie.arc') }}</div>
                            </div>
                            <div class="left-high-body-tr">
                                <div class="left-high-body-th">Диск мотоцикла</div>
                                <div class="left-high-body-th">{{ setting('tseny-na-khromirovanie-i-zolochenie.motorcicle') }}</div>
                            </div>
                            <div class="left-high-body-tr">
                                <div class="left-high-body-th">Шлем</div>
                                <div class="left-high-body-th">{{ setting('tseny-na-khromirovanie-i-zolochenie.helmet') }}</div>
                            </div>
                            --}}
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 pl-md-0">
                    <div class="price-kind-block">
                        <div class="price-kind-block-header">
                                    <span class="price-kind-block-header-span">
                                        Сварка Аргоном
                                    </span>
                        </div>
                        <div class="price-kind-block-text argon">
                            <p>Цена за 1 см. сварки литого диска - <span class="red-big">110 руб.</span></p>
                            <p>Минимальная сумма работ - <span class="red-big">500 руб.</span></p>
                            <p>Снятие сломанных секреток - <span class="red-big">750 руб./шт</span></p>
                            <p>Сварка других изделий из алюминия - цена договорная.</p>
                        </div>
                    </div>
                    <div class="price-kind-block">
                        <div class="price-kind-block-header">
                                    <span class="price-kind-block-header-span">
                                        Восстановление внешнего вида
                                    </span>
                        </div>
                        <div class="price-kind-block-text">
                            <p>Цена на работы определяется мастером и составляет от <span
                                        class="red-big">300 руб.</span> за 1 диск.</p>
                        </div>
                    </div>
                    <div class="price-kind-block">
                        <div class="price-kind-block-header">
                                    <span class="price-kind-block-header-span">
                                        Реставрация недостающих частей литого диска
                                    </span>
                        </div>
                        <div class="price-kind-block-text">
                            <p>Цена на работы определяется мастером и составляет от <span
                                        class="red-big">1000 руб.</span> за 1 диск.</p>
                        </div>
                    </div>
                    <div class="price-kind-block">
                        <div class="price-kind-block-header">
                                    <span class="price-kind-block-header-span">
                                        Ошиповка зимних шин
                                    </span>
                        </div>
                        <div class="price-kind-block-text">
                            <p>Стоимость повторной ошиповки зимних шин составляет <span class="red-big">20 руб.</span>
                                за 1 шип.</p>
                        </div>
                    </div>
                    <div class="price-kind-block">
                        <div class="price-kind-block-header">
                                    <span class="price-kind-block-header-span">
                                        Забор - доставка дисков
                                    </span>
                        </div>
                        <div class="price-kind-block-text">
                            <p>Стоимость забора и доставки дисков курьером из любой точки Санкт-Петербурга - <span class="red-big">1000&nbsp;руб.</span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection