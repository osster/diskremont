@extends('layouts.base')


@section('PAGE_TITLE', setting('site.title'))

@section("PAGE_STYLES")
    <style>
    {{ file_get_contents( public_path("/css/home_critical.min.css")) }}
    </style>
@endsection

@section('PAGE_CONTENT')
    <section class="found404">
        <h1 class="black-header">
            <span class="black-header-span">Увы такой страницы у нас не нашлось</span>
        </h1>

        <div class="container">
            <h2 class="display-1 text-danger" style="font-size: 12rem;">404</h2>
            <div class="wch-text">
                <p>
                    Попробуйте ещё раз начать с <a href="{{ url("/") }}">Главной страницы</a>
                </p>
                <p></p>
            </div>
        </div>

    </section>
@endsection