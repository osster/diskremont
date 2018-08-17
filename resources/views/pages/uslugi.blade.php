@extends('layouts.base')


@section('PAGE_TITLE', setting('site.title'))

@section("PAGE_STYLES")
    <link rel="stylesheet" href="/css/uslugi_critical.min.css">
@endsection

@section('PAGE_CONTENT')
    <div class="content">
        <main>
            <section class="services-blocks">
                <h1 class="black-header">
                    <span class="black-header-span">Услуги</span>
                </h1>
                <div class="container">
                    @php
                        $direction = "right";
                    @endphp
                    @foreach($uslugi as $k => $usluga)
                        <article class="services-blocks-info services-blocks-info-{{$direction}}-img">
                            <div class="services-blocks-col services-blocks-info-text col-lg-6 col-md-12">
                                <a href="{{ url("/{$usluga->slug}.html") }}">
                                    <h2 class="services-blocks-info-text-header">{{ $usluga->name }}</h2>
                                </a>
                                <p class="services-blocks-info-text-p">{{ $usluga->preview_text }}</p>
                                <a class="btn btn-black" href="{{ url("/{$usluga->slug}.html") }}"><span
                                            class="btn-text">Подробнее</span></a>
                            </div>
                            <div class="col-lg-6 col-md-12 p-0">
                                <a href="{{ url("/{$usluga->slug}.html") }}">
                                    <img class="services-blocks-col services-blocks-info-img"
                                         src="{{Voyager::image($usluga->thumbnail('cropped')) }}" alt="service">
                                </a>
                            </div>
                        </article>
                        @php
                            $direction = ($direction != "right") ? "right" : "left";
                        @endphp
                    @endforeach

                </div>
            </section>

@endsection