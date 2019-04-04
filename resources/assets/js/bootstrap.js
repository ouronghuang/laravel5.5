// lodash
window._ = require('lodash');

// popper
window.Popper = require('popper.js').default;

// jquery && bootstrap
try {
    window.$ = window.jQuery = require('jquery');

    require('bootstrap');
} catch (e) {
}

// toastr
window.toastr = require('toastr');

window.toastr.options = {
    progressBar: true,
    newestOnTop: true,
};

// axios
window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;

    window.Vue.prototype.$csrf_token = token.content;

    window.$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': token.content,
        },
        dataType: 'json',
        error: (error) => {
            if (error.status === 419) {
                window.location.reload();
            } else {
                iView.LoadingBar.error();

                let msg = _.defaultTo(error.responseJSON.message) || _.defaultTo(error.statusText) || error.status;

                toastr.error(msg);
            }
        },
    });
}

window.axios.interceptors.request.use((config) => {
    iView.LoadingBar.start();

    return config;
}, function (error) {
    return Promise.reject(error);
});

window.axios.interceptors.response.use((response) => {
    iView.LoadingBar.finish();

    return response;
}, function (error) {
    if (error.response.status === 419) {
        window.location.reload();
    } else {
        iView.LoadingBar.error();

        let msg = _.defaultTo(error.response.data.message) || _.defaultTo(error.response.statusText) || error.response.status;

        toastr.error(msg);
    }

    return Promise.reject(error);
});

// cdn
window.Vue.prototype.$cdn = process.env.MIX_APP_CDN;
