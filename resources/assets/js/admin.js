window._ = require('lodash');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('car-to-png-component', require('./components/Car2PngComponent.vue'));
Vue.component('wheel-to-png-component', require('./components/Wheel2PngComponent.vue'));

import store from './store/store';

var isCarExists = document.querySelector('#car-to-png'),
    isLeftWheelExists = document.querySelector('#wheel-to-png');

if (isCarExists) {
    const app = new Vue({
        el: '#car-to-png',
        store,
        template:
        '    <div id="car-to-png-app-body">\n' +
        '        <car-to-png-component/>\n' +
        '    </div>'
    });
}

if (isLeftWheelExists) {
    const app_left_wheel = new Vue({
        el: '#wheel-to-png',
        store,
        template:
        '    <div id="car-to-png-app-body">\n' +
        '        <wheel-to-png-component/>\n' +
        '    </div>'
    });
}