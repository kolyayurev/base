
import route from 'ziggy';
import { Ziggy } from './routes';

Vue.mixin({
    methods: {
        route: (name, params, absolute) => {
            return route(name, params, absolute, Ziggy);
        }
    },
});
window.route = function (name, params, absolute) {
    return route(name, params, absolute, Ziggy);
}