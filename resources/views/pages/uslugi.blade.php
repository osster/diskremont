@extends('layouts.base')


@section('PAGE_TITLE', setting('site.title'))

@section('PAGE_CONTENT')
    <div class="content">
        <main>
            <section class="services-blocks">
                <h1 class="black-header">
                    <span class="black-header-span">Услуги</span>
                </h1>
                <div class="container">
                    @foreach($uslugi as $usluga)
                    <article class="services-blocks-info services-blocks-info-right-img">
                        <div class="services-blocks-col services-blocks-info-text col-lg-6 col-md-12">
                            <h2 class="services-blocks-info-text-header">{{ $usluga->name }}</h2>
                            <p class="services-blocks-info-text-p">{{ $usluga->preview_text }}</p>
                            <a class="btn btn-black" href="{{ url("/{$usluga->slug}.html") }}"><span class="btn-text">Подробнее</span></a>
                        </div>
                        <div class="col-lg-6 col-md-12 p-0">
                            <img class="services-blocks-col services-blocks-info-img" src="{{Voyager::image($usluga->thumbnail('cropped')) }}" alt="service">
                        </div>
                    </article>
                    @endforeach

                    <article class="services-blocks-info services-blocks-info-left-img">
                        <div class="services-blocks-col services-blocks-info-text col-lg-6 col-md-12">
                            <h2 class="services-blocks-info-text-header">Покраска дисков</h2>
                            <p class="services-blocks-info-text-p">Компания предлагает необыкновенно широкую палитру оттенков, открывающую перед клиентами бесконечность просторов для полета фантазии. Компания осуществляет порошковую окраску литых дисков за 24 часа. После проведенных работ сотрудники компании гарантируют идеальное состояние дисков в течение 3-х лет. Своими руками произвести данный объем работ достаточно сложно, поэтому лучше доверить это дело специалистам.</p>
                            <a class="btn btn-black" href="servicekind.html"><span class="btn-text">Подробнее</span></a>
                        </div>
                        <div class="col-lg-6 col-md-12 p-0">
                            <img class="services-blocks-col services-blocks-info-img" src="./img/serv2.jpg" alt="service">
                        </div>

            </article>
            <article class="services-blocks-info services-blocks-info-right-img">
                <div class="services-blocks-col services-blocks-info-text col-lg-6 col-md-12">
                    <h2 class="services-blocks-info-text-header">Покраска дисков</h2>
                    <p class="services-blocks-info-text-p">Компания предлагает необыкновенно широкую палитру оттенков, открывающую перед клиентами бесконечность просторов для полета фантазии. Компания осуществляет порошковую окраску литых дисков за 24 часа. После проведенных работ сотрудники компании гарантируют идеальное состояние дисков в течение 3-х лет. Своими руками произвести данный объем работ достаточно сложно, поэтому лучше доверить это дело специалистам.</p>
                    <a class="btn btn-black" href="servicekind.html"><span class="btn-text">Подробнее</span></a>
                </div>
                <div class="col-lg-6 col-md-12 p-0">
                    <img class="services-blocks-col services-blocks-info-img" src="./img/serv3.jpg" alt="service">
                </div>
            </article>
        </div>
    </section>
@endsection