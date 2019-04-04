// babel-polyfill
import 'babel-polyfill';

// vue
window.Vue = require('vue');

// iview
import iView from 'iview';

Vue.use(iView);

// bootstrap
require('./bootstrap');

// components
require('./components');

// app
const app = new Vue({
    el: '#app'
});
