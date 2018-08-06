@extends('layouts.base')


@section('PAGE_TITLE', setting('site.title'))

@section('PAGE_CONTENT')
    <h1 class="black-header">
        <span class="black-header-span">Фотогалерея</span>
    </h1>
    <div class="container">
        <section class="gallery">
            <div class="col-lg-6">
                <div class="select first-select">
                    <div class="select-label-wr">
                        <span class="select-label">Выберите раздел</span>
                    </div>
                    <div class="select-body select-body-kind">
                        <button class="dropdown-toggle choice-color-btn select-item"  type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="color-preview"></span>
                            Черный
                        </button>
                        <div class="can-select dropdown-menu">
                            <a class="select-item color color-black">
                                <span class="color-preview"></span>
                                Черный
                            </a>
                            <a class="select-item color color-yellow">
                                <span class="color-preview"></span>
                                Желтый
                            </a>
                            <a class="select-item color color-green">
                                <span class="color-preview"></span>
                                Зеленый
                            </a>
                        </div>
                    </div>
                    <div class="select-item-btn" id="btn-kind"></div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="select">
                    <div class="select-label-wr">
                        <span class="select-label">Выберите цвет</span>
                    </div>
                    <div class="select-body select-body-color">
                        <div class="selected" id="selectColor">
                            <button class="dropdown-toggle choice-color-btn select-item"  type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="color-preview"></span>
                                Черный
                            </button>
                            <div class="can-select dropdown-menu">
                                <a class="select-item color color-black">
                                    <span class="color-preview"></span>
                                    Черный
                                </a>
                                <a class="select-item color color-yellow">
                                    <span class="color-preview"></span>
                                    Желтый
                                </a>
                                <a class="select-item color color-green">
                                    <span class="color-preview"></span>
                                    Зеленый
                                </a>
                            </div>
                        </div>
                    </div>
                    {{--<div class="select-item-btn" id="btn-color"></div>--}}
                </div>
            </div>
            <div class="gal-row">
                <a class="gal-pic" href="./img/galpic1.png" data-lightbox="image">
                    <img src="./img/galpic1.png" alt="gal1">
                </a>
                <a class="gal-pic" href="./img/galpic2.png" data-lightbox="image">
                    <img src="./img/galpic2.png" alt="gal2">
                </a>
                <a class="gal-pic" href="./img/galpic3.png" data-lightbox="image">
                    <img src="./img/galpic3.png" alt="gal3">
                </a>
                <a class="gal-pic" href="./img/galpic4.png" data-lightbox="image">
                    <img src="./img/galpic4.png" alt="gal4">
                </a>
                <a class="gal-pic" href="./img/galpic1.png" data-lightbox="image">
                    <img src="./img/galpic1.png" alt="gal5">
                </a>
                <a class="gal-pic" href="./img/galpic2.png" data-lightbox="image">
                    <img src="./img/galpic2.png" alt="gal6">
                </a>
                <a class="gal-pic" href="./img/galpic3.png" data-lightbox="image">
                    <img src="./img/galpic3.png" alt="gal7">
                </a>
                <a class="gal-pic" href="./img/galpic4.png" data-lightbox="image">
                    <img src="./img/galpic4.png" alt="gal8">
                </a>
                <a class="gal-pic" href="./img/galpic1.png" data-lightbox="image">
                    <img src="./img/galpic1.png" alt="gal9">
                </a>
                <a class="gal-pic" href="./img/galpic2.png" data-lightbox="image">
                    <img src="./img/galpic2.png" alt="gal10">
                </a>
                <a class="gal-pic" href="./img/galpic3.png" data-lightbox="image">
                    <img src="./img/galpic3.png" alt="gal11">
                </a>
                <a class="gal-pic" href="./img/galpic4.png" data-lightbox="image">
                    <img src="./img/galpic4.png" alt="gal12">
                </a>
                <a class="gal-pic" href="./img/galpic1.png" data-lightbox="image">
                    <img src="./img/galpic1.png" alt="gal13">
                </a>
                <a class="gal-pic" href="./img/galpic2.png" data-lightbox="image">
                    <img src="./img/galpic2.png" alt="gal14">
                </a>
                <a class="gal-pic" href="./img/galpic3.png" data-lightbox="image">
                    <img src="./img/galpic3.png" alt="gal15">
                </a>
                <a class="gal-pic" href="./img/galpic4.png" data-lightbox="image">
                    <img src="./img/galpic4.png" alt="gal16">
                </a>
                <a class="gal-pic" href="./img/galpic1.png" data-lightbox="image">
                    <img src="./img/galpic1.png" alt="gal17">
                </a>
                <a class="gal-pic" href="./img/galpic2.png" data-lightbox="image">
                    <img src="./img/galpic2.png" alt="gal18">
                </a>
                <a class="gal-pic" href="./img/galpic3.png" data-lightbox="image">
                    <img src="./img/galpic3.png" alt="gal19">
                </a>
                <a class="gal-pic" href="./img/galpic4.png" data-lightbox="image">
                    <img src="./img/galpic4.png" alt="gal20">
                </a>
                <a class="gal-pic" href="./img/galpic1.png" data-lightbox="image">
                    <img src="./img/galpic1.png" alt="gal21">
                </a>
                <a class="gal-pic" href="./img/galpic2.png" data-lightbox="image">
                    <img src="./img/galpic2.png" alt="gal22">
                </a>
                <a class="gal-pic" href="./img/galpic3.png" data-lightbox="image">
                    <img src="./img/galpic3.png" alt="gal23">
                </a>
                <a class="gal-pic" href="./img/galpic1.png" data-lightbox="image">
                    <img src="./img/galpic1.png" alt="gal24">
                </a>
            </div>
            <nav class="gal-pagination" aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1"></a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#"></a>
                    </li>
                </ul>
            </nav>
        </section>
    </div>
@endsection