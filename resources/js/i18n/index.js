
import Lang from 'lang.js';
import * as messages from './messages.json';


var lang = new Lang({
    messages: messages,
    locale: locale,
    fallback: fallbackLocale
});

Vue.prototype.lang = lang;
global.lang = lang;




