import Vue from 'vue';
import Vuex from 'vuex';
import _ from 'lodash';

Vue.use(Vuex);

export default new Vuex.Store({
    state: {
        isReady: false,
        isInProgress: true,
        app: {
            car: {
                bodyColor: null,
                diskColorSection: null,
                diskColor: null,
                diskSize: null,
                isPolished: false,
                isMounted: false,
                isLights: false,
                isMove: false,
                moveDirection: 'IN',
            }
        },
        data: {
            values: {
                carColorList: [],
                diskColorList: [],
                diskSizeList: [],
                diskColorSections: []
            },
            moveDuration: 4
        },
        calcFunction: undefined
    },
    getters: {
        isReady: (state) => state.isReady,
        defaults: (state) => state.data.defaults,
        values: (state) => state.data.values,
        car: (state) => state.app.car,
        moveDuration: (state) => parseInt(state.data.moveDuration),
        calcFunction: (state) => state.calcFunction,
    },
    mutations: {
        setReady: function (state) {
            state.isReady = true;
        },
        setValues(state, val) {
            state.data.values = val;
            state.app.car.bodyColor = _.first(state.data.values.carColorList);
            state.app.car.diskColor = _.first(state.data.values.diskColorList);
            state.app.car.diskColorSection = _.first(state.data.values.diskColorSections);
            state.app.car.diskSize = _.first(state.data.values.diskSizeList);
        },
        setCalcFunction(state, f) {
            if (typeof f === 'function') {
                state.calcFunction = f;
            }
        },
        setMoveDuration(state, val) {
            state.data.moveDuration = parseInt(val);
        },
        // Цвет автомобиля
        setCarColor(state, val) {
            state.app.car.bodyColor = val;
        },
        // Цвет диска
        setDiskColor(state, val) {
            state.app.car.diskColor = val;
        },
        // Размер диска
        setDiskSize(state, val) {
            state.app.car.diskSize = val;
        },
        // Алмазная полировка
        setDiskPolished(state, val) {
            state.app.car.isPolished = val;
        },
        // Шиномонтаж
        setDiskMounted(state, val) {
            state.app.car.isMounted = val;
        },
        // Включить фары
        switchOnLigt(state) {
            state.app.car.isLights = true;
        },
        // Выключить фары
        switchOffLigt(state) {
            state.app.car.isLights = false;
        },
        // Автомобиль приезжает
        moveInCar(state) {
            state.app.car.moveDirection = 'IN';
            state.app.car.isMove = true;
        },
        // Автомобиль уезжает
        moveOutCar(state) {
            state.app.car.moveDirection = 'OUT';
            state.app.car.isMove = true;
        },
        // Автомобиль останавливается
        stopMovingCar(state) {
            state.app.car.isMove = false;
        }
    }
})