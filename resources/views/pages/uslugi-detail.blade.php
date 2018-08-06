@extends('layouts.base')


@section('PAGE_TITLE', setting('site.title'))

@section('PAGE_CONTENT')
    <div class="content">
        <main class="kind">
            <h1 class="black-header">
                <span class="black-header-span">Услуги</span>
            </h1>

            {!! $usluga->detail_text !!}

        </main>
    </div>
@endsection