window._ = require('lodash');

window.Vue = require('vue').default;

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios').default;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Next we will register the CSRF Token as a common header with Axios so that
 * all outgoing HTTP requests automatically have it attached. This is just
 * a simple convenience so we don't have to attach every token manually.
 */

let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('car-to-png-component', require('./components/Car2PngComponent.vue').default);
Vue.component('wheel-to-png-component', require('./components/Wheel2PngComponent.vue').default);
Vue.component('disk-gallery-upload-component', require('./components/DiskGalleryUploadComponent.vue').default);

import store from './store/store';

var isCarExists = document.querySelector('#car-to-png'),
    isLeftWheelExists = document.querySelector('#wheel-to-png'),
    isDiskGalleryUploadExists = document.querySelector('#disk-gallery-upload');

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

if (isDiskGalleryUploadExists) {
    const app_disk_gallery_upload = new Vue({
        el: '#disk-gallery-upload',
        store,
        template: '<disk-gallery-upload-component/>'
    });
}
