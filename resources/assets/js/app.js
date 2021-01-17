/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('./template/main');

window.Vue = require('vue').default;

// import Vue from 'vue';

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('form-component', require('./components/FormComponent.vue').default);
Vue.component('car-component', require('./components/CarComponent.vue').default);

import bFormSlider from 'vue-bootstrap-slider';

Vue.use(bFormSlider);

import store from './store/store';
// import hlp from 'hlp';

var appElement = document.querySelector('#calc-app');

if (appElement) {

    $(window).on('load', function () {
        const app = new Vue({
            el: '#calc-app',
            store,
            template:
            '    <div id="calc-app-body">\n' +
            '        <form-component></form-component>\n' +
            '    </div>',
            mounted: function () {
                var that = this;
                if (calcConfig && typeof calcConfig.values === 'object') {
                    that.$store.commit('setValues', calcConfig.values);
                }
                if (calcConfig && typeof calcConfig.moveDuration === 'number' && calcConfig.moveDuration > 0) {
                    that.$store.commit('setMoveDuration', calcConfig.moveDuration);
                }
                if (calcConfig && typeof calcConfig.calcFunction === 'function') {
                    that.$store.commit('setCalcFunction', calcConfig.calcFunction);
                }
            },
            computed: {
                isReady: function () {
                    var that = this;
                    return (
                        that.$store.getters.car.bodyColor !== null &&
                        that.$store.getters.car.diskColor !== null &&
                        that.$store.getters.car.diskSize !== null &&
                        that.$store.getters.values.carColorList.length > 0 &&
                        that.$store.getters.values.diskColorList.length > 0 &&
                        that.$store.getters.values.diskSizeList.length > 0
                    );
                }
            },
            watch: {
                isReady: function (val) {
                    var that = this;
                    if (val) {
                        that.$store.commit('setReady');
                    }
                }
            }
        });
    })
}
