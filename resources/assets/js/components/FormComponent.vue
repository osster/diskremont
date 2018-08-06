<template>
    <div class="form mt-3 mt-md-0">
        <div class="row mb-0">
            <div class="col-12 col-md-6 mb-3 text-center text-md-left">
                <label class="car-menu-label">Цвет автомобиля:</label><br>
                <div class="btn-group btn-car-group">
                    <button type="button" class="btn dropdown-toggle car-menu-btn" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                        <span v-if="carColor !== null" class="color-preview"
                              :style="'background-color: #' + carColor.hash + ';'"></span>
                        {{ carColor !== null ? carColor.name : 'Выбрать цвет' }}
                    </button>
                    <div class="dropdown-menu car-dropdown-menu">
                        <a v-for="color in $store.getters.values.carColorList"
                           class="dropdown-item"
                           :class="(carColor.hash == color.hash ? 'active' : '')"
                           href="javascript:void(0)"
                           @click="setCarColor(color)"><span class="color-preview"
                                                             :style="'background-color: #' + color.hash + ';'"></span>{{color.name}}</a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 mb-3 text-center text-md-right car-form-cost">
                Стоимость за комплект:<br>
                {{ totalPrice }} руб
            </div>
        </div>
        <car-component></car-component>
        <div class="row mt-3">
            <div class="col-12 col-md-6 mb-3 col-xl-4 text-center text-md-left">
                <label class="car-menu-label">Цвет дисков:</label><br>
                <div class="btn-group btn-car-group">
                    <button type="button" class="btn dropdown-toggle car-menu-btn" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                        <!--
                            <span v-if="diskColor !== null" class="color-preview"
                              :style="'background-color: #' + diskColor.hash + ';'"></span>
                        -->
                        {{ diskColorSection != null ? diskColorSection.name : 'Выбрать цвет' }}
                    </button>
                    <div class="dropdown-menu car-dropdown-menu">
                        <a v-for="(section) in diskColorSections"
                           v-if="diskSectionHasColors(section)"
                           class="dropdown-item"
                           :class="(diskColor.section == section.key ? 'active' : '')"
                           href="javascript:void(0)"
                           @click="diskColorSection = section">
                            <!--<span class="color-preview" :style="'background-color: #' + color.hash + ';'"></span>-->
                            {{section.name}}
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 mb-3 col-xl-3 b-slider text-center text-md-right text-xl-center">
                <label class="car-menu-label">Размер дисков:</label><br>
                <b-form-slider
                    v-if="diskSize !== null"
                    :min="diskSizeValues.min"
                    :max="diskSizeValues.max"
                    :step="1"
                    :ticks="diskSizeValues.ticks"
                    :ticks-labels="diskSizeValues.ticksLabels"
                    :value="diskSizeValue"
                    :trigger-change-event="true"
                    @change="setDiskSize"
                ></b-form-slider>
            </div>
            <div class="col-12 col-md-6 mb-3 col-xl-3 d-flex align-items-center justify-content-center justify-content-md-start justify-content-xl-end">
                <div class="form-group form-check">
                    <input type="checkbox" class="car-form-checkbox form-check-input" id="polish" v-model="isDiskPolishedValue"
                           :checked="isDiskPolished">
                    <label class="form-check-label car-form-label" for="polish">Алмазная полировка</label>
                </div>
            </div>
            <div class="col-12 col-md-6 mb-3 justify-content-center justify-content-md-end col-xl-2 d-flex align-items-center">
                <div class="form-group form-check">
                    <input type="checkbox" class="car-form-checkbox form-check-input" id="mount" v-model="isDiskMountedValue"
                           :checked="isDiskMounted">
                    <label class="form-check-label car-form-label" for="mount">Шиномонтаж</label>
                </div>
            </div>
        </div>

        <section class="row second-block" v-if="diskColorSection != null">
            <div id="swiper-disk-color-slides" class="d-none">
                <div class="swiper-slide" v-for="color in diskColorList" v-if="color.section == diskColorSection.key" @click="setDiskColor(color)">
                    <img class="main-gallery-img" :src="'/storage/' + color.picture" :alt="color.name">
                </div>
            </div>
            <div class="col-lg-7 col-md-12 d-flex main-gallery-wrapper">
                <div class="swiper-button swiper-button-prev">
                    <span class="main-gallery-control main-gallery-control-prev"></span>
                </div>
                <div id="main-gallery" class="main-gallery swiper-container">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide"
                             :class="(diskColor.hash == color.hash) ? 'active' : ''"
                             v-for="color in diskColorList"
                             v-if="color.section == diskColorSection.key">
                            <img class="main-gallery-img"
                                 @click="setDiskColor(color)"
                                 :src="'/storage/' + color.picture"
                                 :alt="color.name"
                                 :title="color.name"
                                 :data-original-title="color.name"
                                 data-toggle="tooltip" data-placement="bottom">
                        </div>
                    </div>
                </div>
                <div class="swiper-button swiper-button-next">
                    <span class="main-gallery-control main-gallery-control-next"></span>
                </div>
            </div>

            <div class="col-lg-5 col-md-12 d-flex justify-content-end">
                <div class="main-promo-block">
                    <img class="main-promo-img" :src="'/storage/' + diskColor.picture" :alt="diskColor.name">
                    <div class="main-promo-block-name">{{ diskColor.name }}</div>
                    <button class="btn btn-black">
                        <span class="btn-text d-flex align-items-center">Примеры работ</span>
                    </button>
                </div>
            </div>
        </section>

        <section class="main-info">
            <div class="container d-flex align-items-center p-0 flex-sm-nowrap flex-wrap">
                <div class="main-info-col">
                    <p class="main-info-cost">
                        <span>Стоимость за комплект :</span><span class="main-info-cost-val">6 500 Р.</span>
                    </p>
                    <p class="main-info-phone">Узнайте точную стоимость по телефону: <span class="main-info-phone-nowrap">(812) 970-7-958</span></p>
                </div>
                <div class="main-info-col col">
                    <form class="form-inline">
                        <div class="form-group mb-2">
                            <input type="text" class="form-control" id="inputName" placeholder="Ваше имя">
                        </div>
                        <div class="form-group form-group-tel mb-2">
                            <input type="tel" class="form-control" id="inputPhone" placeholder="Ваш телефон">
                        </div>
                        <button type="submit" class="btn btn-red mb-2 "><span class="btn-text d-flex justify-content-center">Оформить</span></button>
                    </form>
                </div>
            </div>
        </section>
    </div>
</template>

<style>
    #main-gallery {
        min-width: 100%;
    }
</style>

<script>
    import _ from 'lodash';

    export default {
        name: 'form-component',
        data: function () {
            return {
                isDiskPolishedValue: false,
                isDiskMountedValue: false,
                diskSizeValue: 0,
                diskSizeValues: {
                    min: 0,
                    max: 0,
                    ticks: [],
                    ticksLabels: []
                },
                diskColorSection: null,
                totalPrice: 0,
                diskColorGallerySwiper: null
            }
        },
        mounted: function () {
            var that = this;
        },
        computed: {
            isReady: function () {
                return this.$store.getters.isReady;
            },
            carColor: function () {
                return this.$store.getters.car.bodyColor;
            },
            diskColor: function () {
                return this.$store.getters.car.diskColor;
            },
            diskColorSections: function () {
                return this.$store.getters.values.diskColorSections;
            },
            diskColorList: function () {
                return this.$store.getters.values.diskColorList;
            },
            diskSize: function () {
                return this.$store.getters.car.diskSize;
            },
            isDiskPolished: function () {
                return this.$store.getters.car.isPolished;
            },
            isDiskMounted: function () {
                return this.$store.getters.car.isMounted;
            },
        },
        watch: {
            isReady: function (val) {
                var that = this;
                if (val) {
                    that.diskColorSection = _.first(that.diskColorSections);

                    that.$nextTick(function () {
                        that.initDiskColorGallery();
                    });
                }
            },
            diskSize: function (val) {
                var that = this;
                var diskSizeList = that.$store.getters.values.diskSizeList;

                that.diskSizeValues.ticks = [];
                that.diskSizeValues.ticksLabels = [];
                diskSizeList.map(function (item) {
                    that.diskSizeValues.ticks[that.diskSizeValues.ticks.length] = item.size;
                    that.diskSizeValues.ticksLabels[that.diskSizeValues.ticksLabels.length] = item.label;
                });
                that.diskSizeValues.min = _.min(that.diskSizeValues.ticks);
                that.diskSizeValues.max = _.max(that.diskSizeValues.ticks);
                that.diskSizeValue = val.size;

                that.flashLights();
                that.totalPrice = (typeof that.$store.getters.calcFunction === 'function')
                    ? that.$store.getters.calcFunction(that.diskSize, that.diskColor, that.isDiskPolished, that.isDiskMounted)
                    : 0;
            },
            diskColor: function (val) {
                var that = this;
                that.flashLights();
                that.totalPrice = (typeof that.$store.getters.calcFunction === 'function')
                    ? that.$store.getters.calcFunction(that.diskSize, that.diskColor, that.isDiskPolished, that.isDiskMounted)
                    : 0;
            },
            diskColorSection: function (val) {
                var that = this;
                var color = _.find(that.diskColorList, {'section': val.key});
                if (typeof color !== 'undefined') {
                    that.setDiskColor(color);
                    that.$nextTick(function () {
                        that.initDiskColorGallery();
                    });
                }
            },
            carColor: function (val) {
                var that = this;
                that.flashLights();
            },
            isDiskPolishedValue: function (val) {
                var that = this;
                that.$store.commit('setDiskPolished', val);
                that.flashLights();
                that.totalPrice = (typeof that.$store.getters.calcFunction === 'function')
                    ? that.$store.getters.calcFunction(that.diskSize, that.diskColor, that.isDiskPolished, that.isDiskMounted)
                    : 0;
            },
            isDiskMountedValue: function (val) {
                var that = this;
                that.$store.commit('setDiskMounted', val);
                that.flashLights();
                that.totalPrice = (typeof that.$store.getters.calcFunction === 'function')
                    ? that.$store.getters.calcFunction(that.diskSize, that.diskColor, that.isDiskPolished, that.isDiskMounted)
                    : 0;
            }
        },
        methods: {
            setCarColor: function (color) {
                var that = this;
                that.$store.commit('setCarColor', color);
                that.$store.commit('moveOutCar');
                setTimeout(function () {
                    that.$store.commit('moveInCar');
                    setTimeout(function () {
                        that.$store.commit('stopMovingCar');
                    }, that.$store.getters.moveDuration);
                }, that.$store.getters.moveDuration);
            },
            setDiskColor: function (color) {
                var that = this;
                that.$store.commit('setDiskColor', color);
                that.$store.commit('moveOutCar');
                setTimeout(function () {
                    that.$store.commit('moveInCar');
                    setTimeout(function () {
                        that.$store.commit('stopMovingCar');
                    }, that.$store.getters.moveDuration);
                }, that.$store.getters.moveDuration);
            },
            diskSectionHasColors: function (section) {
                var that = this;
                var color = _.find(that.diskColorList, {'section': section.key});
                if (typeof color !== 'undefined') {
                    return true;
                }
                return false;
            },
            setDiskSize: function (data) {
                var diskSizeList = this.$store.getters.values.diskSizeList;
                var newSize = diskSizeList[_.findIndex(diskSizeList, {size: data.newValue})];

                if (typeof newSize === 'object') {
                    this.$store.commit('setDiskSize', newSize);
                }
            },
            flashLights: function () {
                var that = this;
                that.$store.commit('switchOnLigt');
                setTimeout(function () {
                    that.$store.commit('switchOffLigt');
                    setTimeout(function () {
                        that.$store.commit('switchOnLigt');
                        setTimeout(function () {
                            that.$store.commit('switchOffLigt');
                        }, 100);
                    }, 100);
                }, 200);
            },
            initDiskColorGallery: function () {
                var that = this;
                var container = document.querySelector('.main-gallery.swiper-container');
                if (container) {
                    if (that.diskColorGallerySwiper == null) {
                        //that.diskColorGallerySwiper.destroy();
                        that.diskColorGallerySwiper = new Swiper(container, {
                            slidesPerView: 4,
                            slidesPerColumn: 2,
                            spaceBetween: 10,
                            loopFillGroupWithBlank: false,
                            loop: false,
                            navigation: {
                                nextEl: container.parentNode.querySelector('.swiper-button-next'),
                                prevEl: container.parentNode.querySelector('.swiper-button-prev'),
                            },
                            breakpoints: {
                                480: {
                                    slidesPerView: 1,
                                    slidesPerColumn: 1,
                                },
                                767: {
                                    slidesPerView: 3,
                                },
                            }
                        });
                    }
                    if (that.diskColorGallerySwiper) {
//                        var slides = document.querySelector('#swiper-disk-color-slides > *');
//                        that.diskColorGallerySwiper.removeAllSlides();
//                        that.diskColorGallerySwiper.appendSlide(slides);
                        that.diskColorGallerySwiper.update();
                        $('[data-toggle="tooltip"]').tooltip();
                    }
                };
            }
        }
    }
</script>