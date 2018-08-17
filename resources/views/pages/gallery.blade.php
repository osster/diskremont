@extends('layouts.base')


@section('PAGE_TITLE', setting('site.title'))

@section("PAGE_STYLES")
    <link rel="stylesheet" href="/css/galmenu_critical.min.css">
@endsection

@section('PAGE_CONTENT')
    <h1 class="black-header">
        <span class="black-header-span">Фотогалерея</span>
    </h1>
    <div class="container">
        <section class="gallery">
            <div class="col-lg-6">
                @if($filterData["serviceList"]->count() > 0)
                <div class="select first-select">
                    <div class="select-label-wr">
                        <span class="select-label">Выберите раздел</span>
                    </div>
                    <div class="select-body select-body-kind">
                        <button class="dropdown-toggle choice-color-btn select-item"  type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="color-preview"></span>
                            {{ $filterData["serviceList"]->where("id", $filterData["selectedService"])->first()->name }}
                        </button>
                        <div class="can-select dropdown-menu">
                            @foreach($filterData["serviceList"] as $service)
                                @php
                                $arProps = ["service_id" => $service->id];
                                if ($filterData["page"] > 1) {
                                    $arProps["page"] = $filterData["page"];
                                }
                                @endphp
                                <a class="select-item color color-black @if($filterData["selectedService"] == $service->id) active @endif" href="{{ route("gallery", $arProps) }}">
                                    <span class="color-preview"></span>
                                    {{ $service->name }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                    <div class="select-item-btn" id="btn-kind"></div>
                </div>
                @endif
            </div>


            <div class="col-lg-6">
                @if($filterData["colorList"]->count() > 0)
                <div class="select">
                    <div class="select-label-wr">
                        <span class="select-label">Выберите цвет</span>
                    </div>
                    <div class="select-body select-body-color">
                        <div class="selected" id="selectColor">
                            <button class="dropdown-toggle choice-color-btn select-item"  type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="color-preview"></span>
                                @php
                                    $obColor = $filterData["colorList"]->where("id", $filterData["selectedColor"])->first();
                                    //dd($filterData["selectedColor"])
                                @endphp
                                {{ ($obColor) ? $obColor->name : "" }}
                            </button>
                            <div class="can-select dropdown-menu">
                                @foreach($filterData["colorList"] as $color)
                                    @php
                                        $arProps = ["service_id" => $filterData["selectedService"], "color_id" => $color->id];
                                        if ($filterData["page"] > 1) {
                                            $arProps["page"] = $filterData["page"];
                                        }
                                    @endphp
                                    <a class="select-item color color-black @if($obColor && $obColor->id == $color->id) active @endif" href="{{ route("gallery", $arProps) }}">
                                        <span class="color-preview"></span>
                                        {{ $color->name }}
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    {{--<div class="select-item-btn" id="btn-color"></div>--}}
                </div>
                @endif
            </div>


            <div class="gal-row">
                @foreach($galleryList as $item)
                    <a class="gal-pic" href="{{ Voyager::image($item->picture) }}" data-lightbox="image" data-id="{{ $item->id }}" data-title="{{ $item->name }}">
                        <img src="{{ Voyager::image($item->thumbnail('cropped', 'picture')) }}" alt="{{ $item->name }}">
                    </a>
                    {{ print_r($item->thumbnail('resize')) }}
                @endforeach
            </div>

            @php
                $arProps = [
                    "service_id" => $filterData["selectedService"],
                    "color_id" => $filterData["selectedColor"]
                ];
                if ($filterData["page"] > 1) {
                    $arProps["page"] = $filterData["page"];
                }
            @endphp
            {{ $galleryList->links("vendor.pagination.diskremont", $arProps) }}

        </section>
    </div>
@endsection