@extends('layouts.base')


@section('PAGE_TITLE', setting('site.title'))

@section('PAGE_CONTENT')
<div class="kind">
    <h1 class="black-header">
        <span class="black-header-span">Услуги</span>
    </h1>
    <section class="main-promo-large kind-promo-large">
        <div class="card bg-dark text-white">
            <img class="card-img" src="./img/promo-service-bg.jpg" alt="Card image">
            <div class="card-img-overlay mx-auto text-center">
                <h5 class="card-title">Мы рады предложить Вам услугу профессиональной порошковой покраски дисков в Санкт-Петербурге!</h5>
                <p class="card-text">Покраска дисков порошковой краской - это наиболее надёжный и недорогой способ восстановить внешний вид диска, придать ему внешний вид и свойства нового. К тому же, выбор нестандартных цветов при окраске дисков поможет преобразить внешний вид Вашего автомобиля.</p>
            </div>
        </div>
    </section>

    <section class="why-choose">
        <div class="container">
            <h1 class="why-choose-header">Всё, что нужно знать о покраске дисков:</h1>
            <div class="wch-text">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem delectus earum hic in modi, perferendis placeat praesentium quo, reiciendis sint soluta velit voluptates! Cumque, dolore fuga laboriosam laudantium modi omnis.</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem delectus earum hic in modi, perferendis placeat praesentium quo, reiciendis sint soluta velit voluptates! Cumque, dolore fuga laboriosam laudantium modi omnis.</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem delectus earum hic in modi, perferendis placeat praesentium quo, reiciendis sint soluta velit voluptates! Cumque, dolore fuga laboriosam laudantium modi omnis.</p>
            </div>
            <div class="wch-block-head" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                <div class="wch-block-head-text wch-block-head-1">
                    <h3 class="h3">Полный комплекс услуг</h3>
                    <p class="p">Наша мастерская осуществляет, помимо покраски дисков порошковой краской, все виды шиномонтажных работ, а также любые работы по ремонту и покраске литых дисков.</p>
                </div>
                <div class="wch-block-head-stripe"></div>
            </div>
            <div class="wch-descr collapse show" id="collapseOne" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="wch-descr-head ">
                    <div class="wch-descr-head-text wch-descr-head-1">
                        <h3 class="h3">Сроки выполнения работ</h3>
                        <p class="p">Наша мастерская осуществляет, помимо покраски дисков порошковой краской, все виды шиномонтажных работ, а также любые работы по ремонту и покраске литых дисков.</p>
                    </div>
                </div>
                <div class="wch-descr-wrapper d-flex justify-content-center">
                    <div class="col-lg-4 col-md-6">
                        <div class="descr-block">
                            <div class="descr-block-name">Стандартный</div>
                            <div class="descr-block-text">3 рабочих дня. Мы стараемся идти навстречу пожеланиям клиентов и, при наличие технической возможности, красим диски быстрее.</div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="descr-block">
                            <div class="descr-block-name">Срочный</div>
                            <div class="descr-block-text">1 сутки. По предварительной записи! Стоимость покраски возрастает на 15%</div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="descr-block">
                            <div class="descr-block-name">Сверхсрочный</div>
                            <div class="descr-block-text">Осуществляется в течение рабочего дня. Занимает от 8 часов. На практике это выглядит следующим образом: Вы привозите нам диски, либо оставляете автомобиль до 11 часов утра, и после 20.00 вечера сможете забрать заказ.</div>
                        </div>
                    </div>
                </div>
                <div class="wch-new ">
                    <div class="wch-new-icon"></div>
                    <div class="wch-new-text">
                        <div class="wch-new-text-name">Новая услуга!!!</div>
                        <div class="wch-new-text-descr">Наш сотрудник готов в течение дня забрать Ваши диски в пределах КАД. Выезд курьера с доставкой готовых дисков стоит всего 500 рублей.</div>
                    </div>
                </div>
                <div class="wch-descr-stripe"></div>
            </div>
            <div class="wch-block-head" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseOne">
                <div class="wch-block-head-text wch-block-head-2">
                    <h3 class="h3">Качество и гарантия</h3>
                    <p class="p">Наша мастерская осуществляет, помимо покраски дисков порошковой краской, все виды шиномонтажных работ, а также любые работы по ремонту и покраске литых дисков.</p>
                </div>
                <div class="wch-block-head-stripe"></div>
            </div>
            <div class="wch-block-head" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseOne" >
                <div class="wch-block-head-text wch-block-head-3">
                    <h3 class="h3">Цвета покраски</h3>
                    <p class="p">Наша мастерская осуществляет, помимо покраски дисков порошковой краской, все виды шиномонтажных работ, а также любые работы по ремонту и покраске литых дисков.</p>
                </div>
                <div class="wch-block-head-stripe"></div>
            </div>
            <div class="wch-block-head" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseOne">
                <div class="wch-block-head-text wch-block-head-4">
                    <h3 class="h3">Скидки на окраску штампованных дисков.</h3>
                    <p class="p">Наша мастерская осуществляет, помимо покраски дисков порошковой краской, все виды шиномонтажных работ, а также любые работы по ремонту и покраске литых дисков.</p>
                </div>
                <div class="wch-block-head-stripe"></div>
            </div>
            <div class="wch-block-head" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseOne">
                <div class="wch-block-head-text wch-block-head-5">
                    <h3 class="h3">Пескоструйная очистка (дробеструй).</h3>
                    <p class="p">Наша мастерская осуществляет, помимо покраски дисков порошковой краской, все виды шиномонтажных работ, а также любые работы по ремонту и покраске литых дисков.</p>
                </div>
                <div class="wch-block-head-stripe"></div>
            </div>
            <div class="wch-block-head" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseOne">
                <div class="wch-block-head-text wch-block-head-6">
                    <h3 class="h3">Охраняемая парковка.</h3>
                    <p class="p">Наша мастерская осуществляет, помимо покраски дисков порошковой краской, все виды шиномонтажных работ, а также любые работы по ремонту и покраске литых дисков.</p>
                </div>
                <div class="wch-block-head-stripe"></div>
            </div>
        </div>
    </section>
</div>
@endsection