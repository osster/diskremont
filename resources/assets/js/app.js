
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('form-component', require('./components/FormComponent.vue'));
Vue.component('stage-component', require('./components/StageComponent.vue'));
Vue.component('car-component', require('./components/CarComponent.vue'));
Vue.component('wheel-component', require('./components/WheelComponent.vue'));

import bFormSlider from 'vue-bootstrap-slider';
Vue.use(bFormSlider);

import store from './store/store';
import hlp from 'hlp';

const app = new Vue({
    el: '#calc-app',
    store,
    template:
    '    <div id="calc-app-body">\n' +
    '        <form-component></form-component>\n' +
    '    </div>',
    mounted: function () {
        if (hlp.isObject(calcConfig) && hlp.isObject(calcConfig.values)) {
            this.$store.commit('setValues', calcConfig.values)
        }
        if (hlp.isObject(calcConfig) && parseInt(calcConfig.moveDuration) > 0) {
            this.$store.commit('setMoveDuration', calcConfig.moveDuration)
        }
    },
});