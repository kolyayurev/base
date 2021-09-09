
require('./bootstrap');

// import Cookies from 'js-cookie'
// window.Cookies = Cookies

window.AOS = require('aos');

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

window.Vue = require('vue').default;

Vue.mixin(require('./mixins/base').default);

import DialogFeedback from './components/DialogFeedback'
Vue.component('v-dialog-feedback',DialogFeedback)

// import { validePhone } from './validators'
// window.validePhone = validePhone

require('./element-ui');

require('./lang');
