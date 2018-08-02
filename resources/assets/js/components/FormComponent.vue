<template>
    <div class="form">
        <div class="row">
            <div class="col-12 col-lg-4">
                <label class="car-menu-label">Цвет автомобиля:</label><br>
                <div class="btn-group btn-car-group">
                    <button type="button" class="btn dropdown-toggle car-menu-btn" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                        <span v-if="carColor !== null" class="color-preview"
                              :style="'background-color: #' + carColor.hash + ';'"></span>
                        {{ carColor !== null ? carColor.name : 'Выбрать цвет' }}
                    </button>
                    <div class="dropdown-menu">
                        <a v-for="color in $store.getters.values.carColorList"
                           class="dropdown-item"
                           :class="(carColor.hash == color.hash ? 'active' : '')"
                           href="javascript:void(0)"
                           @click="setCarColor(color)"><span class="color-preview"
                                                             :style="'background-color: #' + color.hash + ';'"></span>{{color.name}}</a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-4 offset-lg-4 text-right car-form-cost">
                Стоимость за комплект:<br>
                {{ totalPrice }} руб
            </div>
        </div>
        <stage-component></stage-component>
        <div class="row">
            <div class="col-12 col-lg-3">
                <label class="car-menu-label">Цвет дисков:</label><br>
                <div class="btn-group btn-car-group">
                    <button type="button" class="btn dropdown-toggle car-menu-btn" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                        <span v-if="diskColor !== null" class="color-preview"
                              :style="'background-color: #' + diskColor.hash + ';'"></span>
                        {{ diskColor !== null ? diskColor.name : 'Выбрать цвет' }}
                    </button>
                    <div class="dropdown-menu">
                        <a v-for="color in $store.getters.values.diskColorList"
                           class="dropdown-item"
                           :class="(diskColor.hash == color.hash ? 'active' : '')"
                           href="javascript:void(0)"
                           @click="setDiskColor(color)">
                            <span class="color-preview" :style="'background-color: #' + color.hash + ';'"></span>
                            {{color.name}}
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-4 b-slider">
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
            <div class="col-12 col-lg-3">
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="polish" v-model="isDiskPolishedValue"
                           :checked="isDiskPolished">
                    <label class="form-check-label" for="polish">Алмазная полировка</label>
                </div>
            </div>
            <div class="col-12 col-lg-2">
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="mount" v-model="isDiskMountedValue"
                           :checked="isDiskMounted">
                    <label class="form-check-label" for="mount">Шиномонтаж</label>
                </div>
            </div>
        </div>
    </div>
</template>

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
                totalPrice: 0
            }
        },
        mounted: function () {
        },
        computed: {
            carColor: function () {
                return this.$store.getters.car.bodyColor;
            },
            diskColor: function () {
                return this.$store.getters.car.diskColor;
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
            }
        }
    }
</script>