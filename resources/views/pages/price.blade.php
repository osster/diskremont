@extends('layouts.base')


@section('PAGE_TITLE', setting('site.title'))

@section('PAGE_CONTENT')
    <section class="prices">
        <h1 class="black-header">
            <span class="black-header-span">Цены</span>
        </h1>

        <div class="container">
            <div class="prices-table-header">
                <span class="prices-table-header-text btn-text">Цены на ремонт/покраску литых дисков, шиномонтажные и другие работы</span>
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
                    <tr>
                        <th class="prices-table-th-left" scope="row">Порошковая покраска*</th>
                        @foreach($transp["pokraska"] as $k=>$v)
                            <td>{{ $v }}</td>
                        @endforeach
                    </tr>
                    <tr>
                        <th class="prices-table-th-left" scope="row">Прокат</th>
                        @foreach($transp["prokat"] as $k=>$v)
                            <td>{{ $v }}</td>
                        @endforeach
                    </tr>
                    <tr>
                        <th class="prices-table-th-left" scope="row">Шиномонтаж**</th>
                        @foreach($transp["tiremount"] as $k=>$v)
                            <td>{{ $v }}</td>
                        @endforeach
                    </tr>
                    <tr>
                        <th class="prices-table-th-left" scope="row">Акриловая покраска*</th>
                        @foreach($transp["akril"] as $k=>$v)
                            <td>{{ $v }}</td>
                        @endforeach
                    </tr>
                    <tr>
                        <th class="prices-table-th-left" scope="row">Полировка дисков*</th>
                        @foreach($transp["grind"] as $k=>$v)
                            <td>{{ $v }}</td>
                        @endforeach
                    </tr>
                    <tr>
                        <th class="prices-table-th-left" scope="row">Алмазная проточка дисков*</th>
                        @foreach($transp["dimond_grind"] as $k=>$v)
                            <td>{{ $v }}</td>
                        @endforeach
                    </tr>
                    </tbody>
                </table>
                <div class="prices-table-footer">
                    <p class="prices-table-footer-first-p">* В цену не входят услуги шиномонтажа</p>
                    <p>** Цена за полный шиномонтажный комплекс: снятие и постановка, проверка, шиномонтаж,
                        балансировка. Для внедорожноков цена комплекса увеличивается на 500 руб.</p>
                </div>
            </div>
            <!--<div class="table-responsive-md table-border">-->
            <!--<table class="table prices-table">-->
            <!--<thead>-->
            <!--<tr>-->
            <!--<th class="prices-table-th" scope="col"></th>-->
            <!--<th class="prices-table-th" scope="col">Порошковая покраска*</th>-->
            <!--<th class="prices-table-th" scope="col">Прокат</th>-->
            <!--<th class="prices-table-th" scope="col">Шиномонтаж**</th>-->
            <!--<th class="prices-table-th" scope="col">Акриловая покраска*</th>-->
            <!--</tr>-->
            <!--</thead>-->
            <!--<tbody>-->
            <!--<tr>-->
            <!--<th class="prices-table-th-left" scope="row">13''</th>-->
            <!--<td>900</td>-->
            <!--<td>900</td>-->
            <!--<td>900</td>-->
            <!--<td>900</td>-->
            <!--</tr>-->
            <!--<tr>-->
            <!--<th class="prices-table-th-left" scope="row">14''</th>-->
            <!--<td>1000</td>-->
            <!--<td>1000</td>-->
            <!--<td>1000</td>-->
            <!--<td>1000</td>-->
            <!--</tr>-->
            <!--<tr>-->
            <!--<th class="prices-table-th-left" scope="row">15''</th>-->
            <!--<td>1000</td>-->
            <!--<td>1000</td>-->
            <!--<td>1000</td>-->
            <!--<td>1000</td>-->
            <!--</tr>-->
            <!--<tr>-->
            <!--<th class="prices-table-th-left" scope="row">16''</th>-->
            <!--<td>1000</td>-->
            <!--<td>1000</td>-->
            <!--<td>1000</td>-->
            <!--<td>1000</td>-->
            <!--</tr>-->
            <!--<tr>-->
            <!--<th class="prices-table-th-left" scope="row">17''</th>-->
            <!--<td>1000</td>-->
            <!--<td>1000</td>-->
            <!--<td>1000</td>-->
            <!--<td>1000</td>-->
            <!--</tr>-->
            <!--<tr>-->
            <!--<th class="prices-table-th-left" scope="row">18''</th>-->
            <!--<td>1000</td>-->
            <!--<td>1000</td>-->
            <!--<td>1000</td>-->
            <!--<td>1000</td>-->
            <!--</tr>-->
            <!--<tr>-->
            <!--<th class="prices-table-th-left" scope="row">19''</th>-->
            <!--<td>1000</td>-->
            <!--<td>1000</td>-->
            <!--<td>1000</td>-->
            <!--<td>1000</td>-->
            <!--</tr>-->
            <!--<tr>-->
            <!--<th class="prices-table-th-left" scope="row">20-24''</th>-->
            <!--<td>1000</td>-->
            <!--<td>1000</td>-->
            <!--<td>1000</td>-->
            <!--<td>1000</td>-->
            <!--</tr>-->
            <!--</tbody>-->
            <!--</table>-->
            <!--<div class="prices-table-footer">-->
            <!--<p class="prices-table-footer-first-p">* В цену не входят услуги шиномонтажа</p>-->
            <!--<p>** Цена за полный шиномонтажный комплекс: снятие и постановка, проверка, шиномонтаж, балансировка. Для внедорожноков цена комплекса увеличивается на 500 руб.</p>-->
            <!--</div>-->
            <!--</div>-->
        </div>

    </section>

    <section class="main-promo-large price-promo-large">
        <div class="card bg-dark text-white">
            <img class="card-img" src="./img/promo-service-bg.jpg" alt="Card image">
            <div class="card-img-overlay mx-auto d-flex flex-wrap">
                <div class="col">
                    <div class="price-promo-large-icon price-promo-large-icon-1"></div>
                    <div class="price-promo-large-description">На цвета чёрный/белый глянец и матовое серебро действует
                        25% скидка! Цвета покраски Candy рассчитываются с наценкой 50% к базовой
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

    <section class="prices-kinds">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="left-high">
                        <div class="left-high-header ">
                            <span class="left-high-header-span">Цены на хромирование и золочение дисков и других деталей</span>
                        </div>
                        <div class="left-high-body">
                            <div class="left-high-body-tr">
                                <div class="left-high-body-th">Порошковая покраска*</div>
                                <div class="left-high-body-th">900</div>
                            </div>
                            <div class="left-high-body-tr">
                                <div class="left-high-body-th">Порошковая покраска*</div>
                                <div class="left-high-body-th">900</div>
                            </div>
                            <div class="left-high-body-tr">
                                <div class="left-high-body-th">Порошковая покраска*</div>
                                <div class="left-high-body-th">900</div>
                            </div>
                            <div class="left-high-body-tr">
                                <div class="left-high-body-th">Порошковая покраска*</div>
                                <div class="left-high-body-th">900</div>
                            </div>
                            <div class="left-high-body-tr">
                                <div class="left-high-body-th">Порошковая покраска*</div>
                                <div class="left-high-body-th">900</div>
                            </div>
                            <div class="left-high-body-tr">
                                <div class="left-high-body-th">Порошковая покраска*</div>
                                <div class="left-high-body-th">900</div>
                            </div>
                            <div class="left-high-body-tr">
                                <div class="left-high-body-th">Порошковая покраска*</div>
                                <div class="left-high-body-th">900</div>
                            </div>
                            <div class="left-high-body-tr">
                                <div class="left-high-body-th">Порошковая покраска*</div>
                                <div class="left-high-body-th">900</div>
                            </div>
                            <div class="left-high-body-tr">
                                <div class="left-high-body-th">Порошковая покраска*</div>
                                <div class="left-high-body-th">900</div>
                            </div>
                            <div class="left-high-body-tr">
                                <div class="left-high-body-th">Порошковая покраска*</div>
                                <div class="left-high-body-th">900</div>
                            </div>
                            <div class="left-high-body-tr">
                                <div class="left-high-body-th">Порошковая покраска*</div>
                                <div class="left-high-body-th">900</div>
                            </div>
                            <div class="left-high-body-tr">
                                <div class="left-high-body-th">Порошковая покраска*</div>
                                <div class="left-high-body-th">900</div>
                            </div>
                            <div class="left-high-body-tr">
                                <div class="left-high-body-th">Порошковая покраска*</div>
                                <div class="left-high-body-th">900</div>
                            </div>
                            <div class="left-high-body-tr">
                                <div class="left-high-body-th">Порошковая покраска*</div>
                                <div class="left-high-body-th">900</div>
                            </div>
                            <div class="left-high-body-tr">
                                <div class="left-high-body-th">Порошковая покраска*</div>
                                <div class="left-high-body-th">900</div>
                            </div>
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
                </div>
            </div>
        </div>
    </section>
@endsection